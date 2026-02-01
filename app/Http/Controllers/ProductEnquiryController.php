<?php

namespace App\Http\Controllers;

use App\Models\ProductEnquiry;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductEnquiryController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $isGuest = !Auth::check();
        
        $rules = [
            'message' => 'required|string|max:1000',
        ];

        if ($isGuest) {
            $rules['name'] = 'required|string|max:255';
            $rules['email'] = 'required|email|max:255';
            $rules['phone'] = 'nullable|string|max:20';
        }

        $request->validate($rules);

        ProductEnquiry::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'name' => $isGuest ? $request->name : Auth::user()->name,
            'email' => $isGuest ? $request->email : Auth::user()->email,
            'phone' => $request->phone,
            'product_url' => url()->previous(), // Save the URL the user came from
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return redirect()->route('products.show', $product->hashid)
            ->with('success', 'Your enquiry has been submitted successfully!');
    }

    public function index()
    {
        return view('enquiries.index');
    }

    public function show(ProductEnquiry $enquiry)
    {
        // Ensure user can only view their own enquiries
        if ($enquiry->user_id !== Auth::id()) {
            abort(403);
        }

        $enquiry->load('product');

        return view('enquiries.show', compact('enquiry'));
    }

    /**
     * Get user enquiries for DataTables (Server-side processing)
     */
    public function datatable(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start', 0);
        $length = $request->get('length', 10);
        $search = $request->get('search')['value'] ?? '';
        $orderColumn = $request->get('order')[0]['column'] ?? 0;
        $orderDir = $request->get('order')[0]['dir'] ?? 'desc';

        // Map column index to database column name
        $columnMap = [
            0 => 'product_id',
            1 => 'message',
            2 => 'status',
            3 => 'created_at',
            4 => null, // actions - not sortable
        ];

        $orderColumnName = $columnMap[$orderColumn] ?? 'created_at';

        $query = ProductEnquiry::where('user_id', Auth::id())
            ->with('product');

        // Apply search
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('message', 'like', '%' . $search . '%')
                  ->orWhere('status', 'like', '%' . $search . '%')
                  ->orWhereHas('product', function($q) use ($search) {
                      $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('brand', 'like', '%' . $search . '%');
                  });
            });
        }

        // Get total count
        $totalRecords = ProductEnquiry::where('user_id', Auth::id())->count();
        $filteredRecords = $query->count();

        // Apply ordering and pagination
        if ($orderColumnName === 'product_id') {
            $query->join('products', 'product_enquiries.product_id', '=', 'products.id')
                  ->orderBy('products.name', $orderDir)
                  ->select('product_enquiries.*');
        } elseif ($orderColumnName) {
            $query->orderBy($orderColumnName, $orderDir);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $enquiries = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($enquiries as $enquiry) {
            // Status badge HTML
            $statusBadges = [
                'pending' => ['bg-yellow-100', 'text-yellow-800', 'Pending', 'fa-clock'],
                'reserved' => ['bg-purple-100', 'text-purple-800', 'Reserved', 'fa-bookmark'],
                'dealers_stock' => ['bg-blue-100', 'text-blue-800', 'Dealers Stock', 'fa-warehouse'],
                'sold' => ['bg-red-100', 'text-red-800', 'Sold', 'fa-times-circle'],
                'stock' => ['bg-green-100', 'text-green-800', 'Stock', 'fa-check'],
                'shipped' => ['bg-indigo-100', 'text-indigo-800', 'Shipped', 'fa-shipping-fast'],
                'delivered' => ['bg-emerald-100', 'text-emerald-800', 'Delivered', 'fa-check-circle'],
            ];
            $statusBadge = $statusBadges[$enquiry->status] ?? ['bg-gray-100', 'text-gray-800', ucfirst($enquiry->status), 'fa-circle'];
            
            $statusHtml = '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ' . $statusBadge[0] . ' ' . $statusBadge[1] . '">' .
                         '<i class="fas ' . $statusBadge[3] . ' mr-1"></i> ' . $statusBadge[2] . '</span>';

            $data[] = [
                'product' => '<div class="flex items-center">
                    <img src="' . $enquiry->product->image_url . '" alt="' . e($enquiry->product->name) . '" class="w-12 h-12 object-cover rounded-lg mr-3">
                    <div>
                        <div class="text-sm font-medium text-gray-900">' . e($enquiry->product->name) . '</div>
                        <div class="text-sm text-gray-500">' . e($enquiry->product->brand) . '</div>
                    </div>
                </div>',
                'message' => '<div class="text-sm text-gray-900">' . e(Str::limit($enquiry->message ?? 'No message', 50)) . '</div>',
                'status' => $statusHtml,
                'date' => '<div class="text-sm text-gray-500">' . $enquiry->created_at->format('M d, Y') . '</div>',
                'actions' => '<a href="' . route('enquiries.show', $enquiry->hashid) . '" class="text-indigo-600 hover:text-indigo-900 font-medium">View Details</a>',
            ];
        }

        return response()->json([
            'draw' => intval($draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data,
        ]);
    }
}

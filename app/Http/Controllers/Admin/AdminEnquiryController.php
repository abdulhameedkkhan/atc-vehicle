<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminEnquiryController extends Controller
{
    /**
     * Display a listing of all enquiries.
     */
    public function index()
    {
        return view('admin.enquiries.index');
    }

    /**
     * Get enquiries for DataTables (Server-side processing)
     */
    public function datatable(Request $request)
    {
        try {
            $draw = $request->get('draw', 1);
            $start = $request->get('start', 0);
            $length = $request->get('length', 10);
            $search = $request->get('search')['value'] ?? '';
            $order = $request->get('order', []);
            $orderColumn = isset($order[0]['column']) ? $order[0]['column'] : 0;
            $orderDir = isset($order[0]['dir']) ? $order[0]['dir'] : 'desc';

            // Map column index to database column name
            $columnMap = [
                0 => 'id',
                1 => 'user_id',
                2 => 'product_id',
                3 => 'message',
                4 => 'status',
                5 => 'created_at',
                6 => null, // actions - not sortable
            ];

            $orderColumnName = $columnMap[$orderColumn] ?? 'created_at';

            $query = ProductEnquiry::with(['user', 'product']);

            // Apply search
            if (!empty($search)) {
                $query->where(function($q) use ($search) {
                    $q->where('id', 'like', '%' . $search . '%')
                      ->orWhere('message', 'like', '%' . $search . '%')
                      ->orWhere('status', 'like', '%' . $search . '%')
                      ->orWhereHas('user', function($q) use ($search) {
                          $q->where('name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                      })
                      ->orWhereHas('product', function($q) use ($search) {
                          $q->where('name', 'like', '%' . $search . '%')
                            ->orWhere('brand', 'like', '%' . $search . '%');
                      });
                });
            }

            // Get total count
            $totalRecords = ProductEnquiry::count();
            $filteredRecords = $query->count();

            // Apply ordering and pagination
            // Note: Ordering by related columns (user_id, product_id) is disabled for simplicity
            // You can enable it later with proper join/subquery if needed
            if ($orderColumnName && $orderColumnName !== 'user_id' && $orderColumnName !== 'product_id') {
                $query->orderBy($orderColumnName, $orderDir);
            } else {
                $query->orderBy('created_at', 'desc');
            }

            $enquiries = $query->skip($start)->take($length)->get();

            $data = [];
            foreach ($enquiries as $enquiry) {
                // Status badge HTML
                $statusOptions = [
                    'pending' => ['bg-yellow-50', 'text-yellow-800', 'border-yellow-300', 'Pending'],
                    'reserved' => ['bg-purple-50', 'text-purple-800', 'border-purple-300', 'Reserved'],
                    'dealers_stock' => ['bg-blue-50', 'text-blue-800', 'border-blue-300', 'Dealers Stock'],
                    'sold' => ['bg-red-50', 'text-red-800', 'border-red-300', 'Sold'],
                    'stock' => ['bg-green-50', 'text-green-800', 'border-green-300', 'Stock'],
                    'shipped' => ['bg-indigo-50', 'text-indigo-800', 'border-indigo-300', 'Shipped'],
                    'delivered' => ['bg-emerald-50', 'text-emerald-800', 'border-emerald-300', 'Delivered'],
                ];
                $statusClass = $statusOptions[$enquiry->status] ?? ['bg-gray-50', 'text-gray-800', 'border-gray-300', ucfirst($enquiry->status)];

                $statusSelect = '<form action="' . route('admin.enquiries.update-status', $enquiry->hashid) . '" method="POST" class="inline">' .
                    '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
                    '<input type="hidden" name="_method" value="PUT">' .
                    '<select name="status" onchange="this.form.submit()" class="text-sm rounded-lg border focus:border-indigo-500 focus:ring-indigo-500 ' . $statusClass[0] . ' ' . $statusClass[1] . ' border ' . $statusClass[2] . '">' .
                    '<option value="pending" ' . ($enquiry->status === 'pending' ? 'selected' : '') . '>Pending</option>' .
                    '<option value="reserved" ' . ($enquiry->status === 'reserved' ? 'selected' : '') . '>Reserved</option>' .
                    '<option value="dealers_stock" ' . ($enquiry->status === 'dealers_stock' ? 'selected' : '') . '>Dealers Stock</option>' .
                    '<option value="sold" ' . ($enquiry->status === 'sold' ? 'selected' : '') . '>Sold</option>' .
                    '<option value="stock" ' . ($enquiry->status === 'stock' ? 'selected' : '') . '>Stock</option>' .
                    '<option value="shipped" ' . ($enquiry->status === 'shipped' ? 'selected' : '') . '>Shipped</option>' .
                    '<option value="delivered" ' . ($enquiry->status === 'delivered' ? 'selected' : '') . '>Delivered</option>' .
                    '</select></form>';

                // Handle guest vs registered user info
                $userName = e($enquiry->name ?? ($enquiry->user ? $enquiry->user->name : 'N/A'));
                $userEmail = e($enquiry->email ?? ($enquiry->user ? $enquiry->user->email : 'N/A'));
                $productName = $enquiry->product ? e(Str::limit($enquiry->product->name, 30)) : 'Deleted Product';
                $productBrand = $enquiry->product ? e($enquiry->product->brand) : 'N/A';
                $productImage = $enquiry->product ? $enquiry->product->image_url : asset('images/placeholder.jpg');

                $data[] = [
                    'id' => '#' . $enquiry->id,
                    'user' => '<div class="text-sm font-medium text-gray-900">' . $userName . '</div>' .
                             '<div class="text-sm text-gray-500">' . $userEmail . '</div>',
                    'product' => '<div class="flex items-center">
                        <img src="' . $productImage . '" alt="' . $productName . '" class="w-12 h-12 object-cover rounded-lg mr-3">
                        <div>
                            <div class="text-sm font-medium text-gray-900">' . $productName . '</div>
                            <div class="text-sm text-gray-500">' . $productBrand . '</div>
                        </div>
                    </div>',
                    'message' => '<div class="text-sm text-gray-900">' . e(Str::limit($enquiry->message ?? 'No message', 50)) . '</div>',
                    'status' => $statusSelect,
                    'date' => '<div class="text-sm text-gray-500">' . $enquiry->created_at->format('M d, Y') . '</div>' .
                             '<div class="text-xs text-gray-400">' . $enquiry->created_at->format('h:i A') . '</div>',
                    'actions' => '<a href="' . route('admin.enquiries.show', $enquiry->hashid) . '" class="text-indigo-600 hover:text-indigo-900 font-medium">View</a>',
                ];
            }

            return response()->json([
                'draw' => intval($draw),
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $filteredRecords,
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            \Log::error('Admin Enquiries Datatable Error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            
            return response()->json([
                'draw' => intval($request->get('draw', 1)),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => [],
                'error' => 'An error occurred while loading enquiries. Please check the logs.',
            ], 500);
        }
    }

    /**
     * Display the specified enquiry.
     */
    public function show(ProductEnquiry $enquiry)
    {
        $enquiry->load(['user', 'product']);
        return view('admin.enquiries.show', compact('enquiry'));
    }

    /**
     * Update the status of an enquiry.
     */
    public function updateStatus(Request $request, ProductEnquiry $enquiry)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,reserved,dealers_stock,sold,stock,shipped,delivered',
        ]);

        $enquiry->update([
            'status' => $validated['status'],
        ]);

        return redirect()->back()
            ->with('success', 'Enquiry status updated successfully.');
    }
}

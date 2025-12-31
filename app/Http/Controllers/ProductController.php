<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if admin is viewing (for admin management view)
        if (auth()->check() && auth()->user()->hasRole('admin') && request()->has('admin')) {
            return view('products.admin-index');
        }
        
        // Public view - Livewire handles the products
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'brand' => 'required|string',
            'category' => 'required|string',
            'model' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,ico,tiff,tif|max:5120',
            'images' => 'nullable|array|max:10',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,ico,tiff,tif|max:5120',
            'video' => 'nullable|mimes:mp4,avi,mov|max:10240',
            'condition' => 'nullable|string',
            'part_number' => 'nullable|string',
            'stock_quantity' => 'nullable|integer',
            'stock_id' => 'nullable|string|max:255',
            'chassis_number' => 'nullable|string|max:255',
            'model_code' => 'nullable|string|max:255',
            'year_month' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:255',
            'body_style' => 'nullable|string|max:255',
            'mileage' => 'nullable|integer|min:0',
            'transmission' => 'nullable|string|max:255',
            'engine_cc' => 'nullable|integer|min:0',
            'fuel_type' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'doors' => 'nullable|integer|min:0',
            'seats' => 'nullable|integer|min:0',
            'dimension' => 'nullable|string|max:255',
            'additional_features' => 'nullable|array',
            'additional_features.*' => 'nullable|string|max:255',
        ], [
            'images.max' => 'You can upload a maximum of 10 additional images.',
            'images.*.image' => 'Each file must be an image.',
            'images.*.mimes' => 'Each image must be a file of type: jpeg, png, jpg, gif, svg, webp, bmp, ico, tiff, tif.',
            'images.*.max' => 'Each image must not be larger than 5MB.',
        ]);

        // Upload main image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products/images', 'public');
        }

        // Upload multiple images (limit to 10)
        if ($request->hasFile('images')) {
            $images = [];
            $uploadedFiles = $request->file('images');
            // Limit to first 10 files
            $filesToProcess = array_slice($uploadedFiles, 0, 10);
            foreach ($filesToProcess as $image) {
                if ($image->isValid()) {
                    $images[] = $image->store('products/images', 'public');
                }
            }
            if (!empty($images)) {
                $validated['images'] = $images;
            }
        }

        // Upload video
        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('products/videos', 'public');
        }

        Product::create($validated);

        return redirect()->route('products.index', ['admin' => 1])
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'brand' => 'required|string',
            'category' => 'required|string',
            'model' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,ico,tiff,tif|max:5120',
            'images' => 'nullable|array|max:10',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,ico,tiff,tif|max:5120',
            'video' => 'nullable|mimes:mp4,avi,mov|max:10240',
            'condition' => 'nullable|string',
            'part_number' => 'nullable|string',
            'stock_quantity' => 'nullable|integer',
            'is_available' => 'nullable|boolean',
            'stock_id' => 'nullable|string|max:255',
            'chassis_number' => 'nullable|string|max:255',
            'model_code' => 'nullable|string|max:255',
            'year_month' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:255',
            'body_style' => 'nullable|string|max:255',
            'mileage' => 'nullable|integer|min:0',
            'transmission' => 'nullable|string|max:255',
            'engine_cc' => 'nullable|integer|min:0',
            'fuel_type' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'doors' => 'nullable|integer|min:0',
            'seats' => 'nullable|integer|min:0',
            'dimension' => 'nullable|string|max:255',
            'additional_features' => 'nullable|array',
            'additional_features.*' => 'nullable|string|max:255',
        ], [
            'images.max' => 'You can upload a maximum of 10 additional images.',
            'images.*.image' => 'Each file must be an image.',
            'images.*.mimes' => 'Each image must be a file of type: jpeg, png, jpg, gif, svg, webp, bmp, ico, tiff, tif.',
            'images.*.max' => 'Each image must not be larger than 5MB.',
        ]);

        // Update main image
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products/images', 'public');
        }

        // Update multiple images
        if ($request->hasFile('images')) {
            // Delete old images
            if ($product->images && is_array($product->images)) {
                foreach ($product->images as $oldImage) {
                    if ($oldImage) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }
            $images = [];
            $uploadedFiles = $request->file('images');
            // Limit to first 10 files
            $filesToProcess = array_slice($uploadedFiles, 0, 10);
            foreach ($filesToProcess as $image) {
                if ($image->isValid()) {
                    $images[] = $image->store('products/images', 'public');
                }
            }
            if (!empty($images)) {
                $validated['images'] = $images;
            }
        }

        // Update video
        if ($request->hasFile('video')) {
            if ($product->video) {
                Storage::disk('public')->delete($product->video);
            }
            $validated['video'] = $request->file('video')->store('products/videos', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index', ['admin' => 1])
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete main image
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        // Delete multiple images
        if ($product->images && is_array($product->images)) {
            foreach ($product->images as $image) {
                if ($image) {
                    Storage::disk('public')->delete($image);
                }
            }
        }
        // Delete video
        if ($product->video) {
            Storage::disk('public')->delete($product->video);
        }

        $product->delete();

        return redirect()->route('products.index', ['admin' => 1])
            ->with('success', 'Product deleted successfully.');
    }

    /**
     * Get products for DataTables (Server-side processing)
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
            0 => null, // image - not sortable
            1 => 'name',
            2 => 'brand',
            3 => 'category',
            4 => 'price',
            5 => 'stock_quantity',
            6 => 'is_available',
            7 => null, // actions - not sortable
        ];

        $orderColumnName = $columnMap[$orderColumn] ?? 'created_at';

        $query = Product::query();

        // Apply search
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('brand', 'like', '%' . $search . '%')
                  ->orWhere('category', 'like', '%' . $search . '%')
                  ->orWhere('part_number', 'like', '%' . $search . '%')
                  ->orWhere('model', 'like', '%' . $search . '%');
            });
        }

        // Get total count
        $totalRecords = Product::count();
        $filteredRecords = $query->count();

        // Apply ordering and pagination
        if ($orderColumnName) {
            $query->orderBy($orderColumnName, $orderDir);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'image' => '<div class="relative group">
                    <img src="' . $product->image_url . '" alt="' . e($product->name) . '" 
                         class="w-20 h-20 object-cover rounded-xl shadow-md border-2 border-gray-100">
                    ' . ($product->video ? '<div class="absolute top-1 right-1 bg-red-500 rounded-full p-1"><i class="fas fa-video text-white text-xs"></i></div>' : '') . '
                </div>',
                'name' => '<div class="text-sm font-bold text-gray-900">' . e($product->name) . '</div>' .
                    ($product->part_number ? '<div class="text-xs text-gray-500 mt-1"><i class="fas fa-barcode"></i> ' . e($product->part_number) . '</div>' : ''),
                'brand' => '<span class="px-3 py-1.5 text-xs font-bold rounded-lg bg-gradient-to-r from-indigo-100 to-purple-100 text-indigo-800 border border-indigo-200">' . e($product->brand) . '</span>',
                'category' => '<span class="text-sm text-gray-700 font-medium">' . e($product->category) . '</span>',
                'price' => $product->price ? '<span class="text-sm font-bold text-green-600">$' . number_format($product->price, 2) . '</span>' : '<span class="text-sm text-gray-400 italic">N/A</span>',
                'stock' => '<span class="px-2 py-1 text-xs font-semibold rounded-lg ' . ($product->stock_quantity > 0 ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-600') . '">' . $product->stock_quantity . ' units</span>',
                'status' => $product->is_available 
                    ? '<span class="px-3 py-1.5 text-xs font-bold rounded-lg bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200 flex items-center gap-1 w-fit"><i class="fas fa-check-circle"></i> Available</span>'
                    : '<span class="px-3 py-1.5 text-xs font-bold rounded-lg bg-gradient-to-r from-red-100 to-pink-100 text-red-800 border border-red-200 flex items-center gap-1 w-fit"><i class="fas fa-times-circle"></i> Unavailable</span>',
                'actions' => '<div class="flex items-center justify-end gap-2">
                    <a href="' . route('products.show', $product->hashid) . '" class="px-3 py-1.5 bg-indigo-100 text-indigo-700 hover:bg-indigo-200 rounded-lg transition-colors duration-200 flex items-center gap-1 text-xs font-semibold"><i class="fas fa-eye"></i> View</a>
                    <a href="' . route('admin.products.edit', $product->hashid) . '" class="px-3 py-1.5 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg transition-colors duration-200 flex items-center gap-1 text-xs font-semibold"><i class="fas fa-edit"></i> Edit</a>
                    <form action="' . route('admin.products.destroy', $product->hashid) . '" method="POST" class="inline" onsubmit="return confirm(\'Are you sure?\');">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="px-3 py-1.5 bg-red-100 text-red-700 hover:bg-red-200 rounded-lg transition-colors duration-200 flex items-center gap-1 text-xs font-semibold"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                </div>',
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

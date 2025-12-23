<?php

namespace App\Http\Controllers;

use App\Models\CarPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarPartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if admin is viewing (for admin management view)
        if (auth()->check() && auth()->user()->hasRole('admin') && request()->has('admin')) {
            return view('car-parts.admin-index');
        }
        
        // Public view - Livewire handles the car parts
        return view('car-parts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car-parts.create');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimes:mp4,avi,mov|max:10240',
            'condition' => 'nullable|string',
            'part_number' => 'nullable|string',
            'stock_quantity' => 'nullable|integer',
        ]);

        // Upload main image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('car-parts/images', 'public');
        }

        // Upload multiple images
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('car-parts/images', 'public');
            }
            $validated['images'] = $images;
        }

        // Upload video
        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('car-parts/videos', 'public');
        }

        CarPart::create($validated);

        return redirect()->route('car-parts.index', ['admin' => 1])
            ->with('success', 'Car part created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CarPart $carPart)
    {
        return view('car-parts.show', compact('carPart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarPart $carPart)
    {
        return view('car-parts.edit', compact('carPart'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarPart $carPart)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'brand' => 'required|string',
            'category' => 'required|string',
            'model' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimes:mp4,avi,mov|max:10240',
            'condition' => 'nullable|string',
            'part_number' => 'nullable|string',
            'stock_quantity' => 'nullable|integer',
            'is_available' => 'nullable|boolean',
        ]);

        // Update main image
        if ($request->hasFile('image')) {
            if ($carPart->image) {
                Storage::disk('public')->delete($carPart->image);
            }
            $validated['image'] = $request->file('image')->store('car-parts/images', 'public');
        }

        // Update multiple images
        if ($request->hasFile('images')) {
            // Delete old images
            if ($carPart->images) {
                foreach ($carPart->images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('car-parts/images', 'public');
            }
            $validated['images'] = $images;
        }

        // Update video
        if ($request->hasFile('video')) {
            if ($carPart->video) {
                Storage::disk('public')->delete($carPart->video);
            }
            $validated['video'] = $request->file('video')->store('car-parts/videos', 'public');
        }

        $carPart->update($validated);

        return redirect()->route('car-parts.index', ['admin' => 1])
            ->with('success', 'Car part updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarPart $carPart)
    {
        // Delete images
        if ($carPart->image) {
            Storage::disk('public')->delete($carPart->image);
        }
        if ($carPart->images) {
            foreach ($carPart->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        if ($carPart->video) {
            Storage::disk('public')->delete($carPart->video);
        }

        $carPart->delete();

        return redirect()->route('car-parts.index', ['admin' => 1])
            ->with('success', 'Car part deleted successfully.');
    }

    /**
     * Get car parts for DataTables (Server-side processing)
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

        $query = CarPart::query();

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
        $totalRecords = CarPart::count();
        $filteredRecords = $query->count();

        // Apply ordering and pagination
        if ($orderColumnName) {
            $query->orderBy($orderColumnName, $orderDir);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $carParts = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($carParts as $carPart) {
            $data[] = [
                'image' => '<div class="relative group">
                    <img src="' . $carPart->image_url . '" alt="' . e($carPart->name) . '" 
                         class="w-20 h-20 object-cover rounded-xl shadow-md border-2 border-gray-100">
                    ' . ($carPart->video ? '<div class="absolute top-1 right-1 bg-red-500 rounded-full p-1"><i class="fas fa-video text-white text-xs"></i></div>' : '') . '
                </div>',
                'name' => '<div class="text-sm font-bold text-gray-900">' . e($carPart->name) . '</div>' .
                    ($carPart->part_number ? '<div class="text-xs text-gray-500 mt-1"><i class="fas fa-barcode"></i> ' . e($carPart->part_number) . '</div>' : ''),
                'brand' => '<span class="px-3 py-1.5 text-xs font-bold rounded-lg bg-gradient-to-r from-indigo-100 to-purple-100 text-indigo-800 border border-indigo-200">' . e($carPart->brand) . '</span>',
                'category' => '<span class="text-sm text-gray-700 font-medium">' . e($carPart->category) . '</span>',
                'price' => $carPart->price ? '<span class="text-sm font-bold text-green-600">$' . number_format($carPart->price, 2) . '</span>' : '<span class="text-sm text-gray-400 italic">N/A</span>',
                'stock' => '<span class="px-2 py-1 text-xs font-semibold rounded-lg ' . ($carPart->stock_quantity > 0 ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-600') . '">' . $carPart->stock_quantity . ' units</span>',
                'status' => $carPart->is_available 
                    ? '<span class="px-3 py-1.5 text-xs font-bold rounded-lg bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200 flex items-center gap-1 w-fit"><i class="fas fa-check-circle"></i> Available</span>'
                    : '<span class="px-3 py-1.5 text-xs font-bold rounded-lg bg-gradient-to-r from-red-100 to-pink-100 text-red-800 border border-red-200 flex items-center gap-1 w-fit"><i class="fas fa-times-circle"></i> Unavailable</span>',
                'actions' => '<div class="flex items-center justify-end gap-2">
                    <a href="' . route('car-parts.show', $carPart->hashid) . '" class="px-3 py-1.5 bg-indigo-100 text-indigo-700 hover:bg-indigo-200 rounded-lg transition-colors duration-200 flex items-center gap-1 text-xs font-semibold"><i class="fas fa-eye"></i> View</a>
                    <a href="' . route('admin.car-parts.edit', $carPart->hashid) . '" class="px-3 py-1.5 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg transition-colors duration-200 flex items-center gap-1 text-xs font-semibold"><i class="fas fa-edit"></i> Edit</a>
                    <form action="' . route('admin.car-parts.destroy', $carPart->hashid) . '" method="POST" class="inline" onsubmit="return confirm(\'Are you sure?\');">
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


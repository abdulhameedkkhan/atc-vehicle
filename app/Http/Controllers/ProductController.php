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
            $products = Product::latest()->paginate(15);
            return view('products.admin-index', compact('products'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimes:mp4,avi,mov|max:10240',
            'condition' => 'nullable|string',
            'part_number' => 'nullable|string',
            'stock_quantity' => 'nullable|integer',
        ]);

        // Upload main image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products/images', 'public');
        }

        // Upload multiple images
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('products/images', 'public');
            }
            $validated['images'] = $images;
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
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products/images', 'public');
        }

        // Update multiple images
        if ($request->hasFile('images')) {
            // Delete old images
            if ($product->images) {
                foreach ($product->images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('products/images', 'public');
            }
            $validated['images'] = $images;
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
        // Delete images
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        if ($product->images) {
            foreach ($product->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        if ($product->video) {
            Storage::disk('public')->delete($product->video);
        }

        $product->delete();

        return redirect()->route('products.index', ['admin' => 1])
            ->with('success', 'Product deleted successfully.');
    }
}

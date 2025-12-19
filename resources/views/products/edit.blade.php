@extends('layouts.admin')

@section('title', 'Edit Product - ATC Japan')
@section('page-subtitle', 'Edit Product')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('products.index', ['admin' => 1]) }}" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-800 font-medium">
            <i class="fas fa-arrow-left"></i> Back to Products Management
        </a>
    </div>
    <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent mb-2 flex items-center gap-3">
        <i class="fas fa-edit text-blue-600"></i>
        Edit Product
    </h1>
    <p class="text-gray-600 mb-8">Update product information, images, and videos</p>

    <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-8">

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Brand -->
                <div>
                    <label for="brand" class="block text-sm font-medium text-gray-700 mb-2">Brand *</label>
                    <input type="text" name="brand" id="brand" value="{{ old('brand', $product->brand) }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <select name="category" id="category" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Category</option>
                        <option value="Parts" {{ old('category', $product->category) == 'Parts' ? 'selected' : '' }}>Parts</option>
                        <option value="Vehicles" {{ old('category', $product->category) == 'Vehicles' ? 'selected' : '' }}>Vehicles</option>
                        <option value="Engines" {{ old('category', $product->category) == 'Engines' ? 'selected' : '' }}>Engines</option>
                        <option value="Transmissions" {{ old('category', $product->category) == 'Transmissions' ? 'selected' : '' }}>Transmissions</option>
                        <option value="Body Parts" {{ old('category', $product->category) == 'Body Parts' ? 'selected' : '' }}>Body Parts</option>
                        <option value="Interior" {{ old('category', $product->category) == 'Interior' ? 'selected' : '' }}>Interior</option>
                        <option value="Other" {{ old('category', $product->category) == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Model -->
                <div>
                    <label for="model" class="block text-sm font-medium text-gray-700 mb-2">Model</label>
                    <input type="text" name="model" id="model" value="{{ old('model', $product->model) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                    <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Part Number -->
                <div>
                    <label for="part_number" class="block text-sm font-medium text-gray-700 mb-2">Part Number</label>
                    <input type="text" name="part_number" id="part_number" value="{{ old('part_number', $product->part_number) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Condition -->
                <div>
                    <label for="condition" class="block text-sm font-medium text-gray-700 mb-2">Condition</label>
                    <select name="condition" id="condition"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Condition</option>
                        <option value="Used" {{ old('condition', $product->condition) == 'Used' ? 'selected' : '' }}>Used</option>
                        <option value="New" {{ old('condition', $product->condition) == 'New' ? 'selected' : '' }}>New</option>
                        <option value="Refurbished" {{ old('condition', $product->condition) == 'Refurbished' ? 'selected' : '' }}>Refurbished</option>
                    </select>
                </div>
            </div>

            <!-- Stock Quantity -->
            <div class="mb-6">
                <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity</label>
                <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Is Available -->
            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_available" value="1" {{ old('is_available', $product->is_available) ? 'checked' : '' }}
                           class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-700">Product is available</span>
                </label>
            </div>

            <!-- Current Main Image -->
            @if($product->image)
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Main Image</label>
                <img src="{{ $product->image_url }}" alt="Current image" class="w-32 h-32 object-cover rounded-lg">
            </div>
            @endif

            <!-- Main Image -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Update Main Image</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <p class="mt-1 text-sm text-gray-500">Leave blank to keep current image. Max size: 2MB</p>
            </div>

            <!-- Current Additional Images -->
            @if($product->images_urls && count($product->images_urls) > 0)
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Additional Images</label>
                <div class="grid grid-cols-4 gap-2">
                    @foreach($product->images_urls as $image)
                    <img src="{{ $image }}" alt="Product image" class="w-full h-24 object-cover rounded">
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Multiple Images -->
            <div class="mb-6">
                <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Update Additional Images</label>
                <input type="file" name="images[]" id="images" accept="image/*" multiple
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <p class="mt-1 text-sm text-gray-500">Leave blank to keep current images. You can select multiple images</p>
            </div>

            <!-- Current Video -->
            @if($product->video)
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Video</label>
                <video controls class="w-full max-w-md rounded-lg">
                    <source src="{{ $product->video_url }}" type="video/mp4">
                </video>
            </div>
            @endif

            <!-- Video -->
            <div class="mb-6">
                <label for="video" class="block text-sm font-medium text-gray-700 mb-2">Update Product Video</label>
                <input type="file" name="video" id="video" accept="video/*"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <p class="mt-1 text-sm text-gray-500">Leave blank to keep current video. Max size: 10MB</p>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('products.index', ['admin' => 1]) }}" 
                   class="px-8 py-3 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 font-semibold transition-all flex items-center gap-2">
                    <i class="fas fa-times"></i> Cancel
                </a>
                <button type="submit" 
                        class="px-8 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-xl hover:from-blue-700 hover:to-cyan-700 font-semibold shadow-lg hover:shadow-xl transition-all flex items-center gap-2">
                    <i class="fas fa-save"></i> Update Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection


@extends('layouts.admin')

@section('title', 'Edit Slider')

@section('content')
<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Edit Slider</h1>
        <p class="text-gray-600 mt-2">Update slider information</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-heading mr-2"></i>Title *
                    </label>
                    <input type="text" name="title" value="{{ old('title', $slider->title) }}" required
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror">
                    @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-align-left mr-2"></i>Description *
                    </label>
                    <textarea name="description" rows="3" required
                              class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $slider->description) }}</textarea>
                    @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image -->
                @if($slider->image)
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Current Image</label>
                    <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}" class="w-64 h-40 object-cover rounded-lg shadow-md">
                </div>
                @endif

                <!-- Image -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-image mr-2"></i>New Slider Image (1920x600px recommended, max 5MB)
                    </label>
                    <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp,image/bmp,image/x-icon,image/tiff"
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('image') border-red-500 @enderror">
                    <p class="text-xs text-gray-500 mt-1">Supported formats: JPEG, PNG, JPG, GIF, SVG, WebP, BMP, ICO, TIFF</p>
                    @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Button 1 Text -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-mouse-pointer mr-2"></i>Button 1 Text
                    </label>
                    <input type="text" name="button_text_1" value="{{ old('button_text_1', $slider->button_text_1) }}"
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Button 1 Link -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-link mr-2"></i>Button 1 Link
                    </label>
                    <input type="text" name="button_link_1" value="{{ old('button_link_1', $slider->button_link_1) }}"
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Button 2 Text -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-mouse-pointer mr-2"></i>Button 2 Text
                    </label>
                    <input type="text" name="button_text_2" value="{{ old('button_text_2', $slider->button_text_2) }}"
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Button 2 Link -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-link mr-2"></i>Button 2 Link
                    </label>
                    <input type="text" name="button_link_2" value="{{ old('button_link_2', $slider->button_link_2) }}"
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Order -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-sort mr-2"></i>Order *
                    </label>
                    <input type="number" name="order" value="{{ old('order', $slider->order) }}" min="1" required
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-toggle-on mr-2"></i>Status
                    </label>
                    <div class="flex items-center gap-4 mt-3">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $slider->is_active) ? 'checked' : '' }} class="w-5 h-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-500">
                            <span class="ml-2 text-gray-700">Active</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 mt-8">
                <button type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-8 py-3 rounded-lg font-semibold shadow-lg transition flex items-center gap-2">
                    <i class="fas fa-save"></i> Update Slider
                </button>
                <a href="{{ route('admin.sliders.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-3 rounded-lg font-semibold transition flex items-center gap-2">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection


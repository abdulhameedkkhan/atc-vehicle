@extends('layouts.admin')

@section('title', 'Edit Car Part - ATC Japan')
@section('page-subtitle', 'Edit Car Part')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('car-parts.index', ['admin' => 1]) }}" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-800 font-medium">
            <i class="fas fa-arrow-left"></i> Back to Car Parts Management
        </a>
    </div>
    <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent mb-2 flex items-center gap-3">
        <i class="fas fa-edit text-blue-600"></i>
        Edit Car Part
    </h1>
    <p class="text-gray-600 mb-8">Update car part information, images, and videos</p>

    <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-8">

        <form action="{{ route('admin.car-parts.update', $carPart) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Car Part Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $carPart->name) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $carPart->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Brand -->
                <div>
                    <label for="brand" class="block text-sm font-medium text-gray-700 mb-2">Brand *</label>
                    <select name="brand" id="brand" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Brand</option>
                        @php $currentBrand = old('brand', $carPart->brand); @endphp
                        @foreach($brands as $brand)
                            <option value="{{ $brand->name }}" {{ $currentBrand == $brand->name ? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                        @if($currentBrand && !$brands->pluck('name')->contains($currentBrand))
                            <option value="{{ $currentBrand }}" selected>{{ $currentBrand }} (current)</option>
                        @endif
                    </select>
                </div>

                <!-- Category (Part Category) -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <select name="category" id="category" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Category</option>
                        @php $currentCategory = old('category', $carPart->category); @endphp
                        @foreach($partCategories as $partCategory)
                            <option value="{{ $partCategory->name }}" {{ $currentCategory == $partCategory->name ? 'selected' : '' }}>{{ $partCategory->name }}</option>
                        @endforeach
                        @if($currentCategory && !$partCategories->pluck('name')->contains($currentCategory))
                            <option value="{{ $currentCategory }}" selected>{{ $currentCategory }} (current)</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Model -->
                <div>
                    <label for="model" class="block text-sm font-medium text-gray-700 mb-2">Model</label>
                    <input type="text" name="model" id="model" value="{{ old('model', $carPart->model) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                    <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $carPart->price) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Part Number -->
                <div>
                    <label for="part_number" class="block text-sm font-medium text-gray-700 mb-2">Part Number</label>
                    <input type="text" name="part_number" id="part_number" value="{{ old('part_number', $carPart->part_number) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Condition -->
                <div>
                    <label for="condition" class="block text-sm font-medium text-gray-700 mb-2">Condition</label>
                    <select name="condition" id="condition"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Condition</option>
                        <option value="Used" {{ old('condition', $carPart->condition) == 'Used' ? 'selected' : '' }}>Used</option>
                        <option value="New" {{ old('condition', $carPart->condition) == 'New' ? 'selected' : '' }}>New</option>
                        <option value="Refurbished" {{ old('condition', $carPart->condition) == 'Refurbished' ? 'selected' : '' }}>Refurbished</option>
                    </select>
                </div>
            </div>

            <!-- Stock Quantity -->
            <div class="mb-6">
                <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity</label>
                <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', $carPart->stock_quantity) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Is Available -->
            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_available" value="1" {{ old('is_available', $carPart->is_available) ? 'checked' : '' }}
                           class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-700">Car part is available</span>
                </label>
            </div>

            <!-- Deal Settings -->
            <div class="mb-6 p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                <h3 class="text-sm font-semibold text-yellow-800 mb-3 flex items-center gap-2">
                    <i class="fas fa-bolt"></i> Deal Settings (optional)
                </h3>
                <div class="space-y-3">
                    <label class="inline-flex items-center gap-2 text-sm text-gray-800">
                        <input type="checkbox" name="is_deal" value="1" {{ old('is_deal', $carPart->is_deal) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-yellow-600 focus:ring-yellow-500">
                        <span>Put this car part on deal for a specific time</span>
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="deal_starts_at" class="block text-xs font-medium text-gray-600 mb-1">Deal Start</label>
                            <input type="datetime-local" name="deal_starts_at" id="deal_starts_at"
                                   value="{{ old('deal_starts_at', optional($carPart->deal_starts_at)->format('Y-m-d\\TH:i')) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                        </div>
                        <div>
                            <label for="deal_ends_at" class="block text-xs font-medium text-gray-600 mb-1">Deal End</label>
                            <input type="datetime-local" name="deal_ends_at" id="deal_ends_at"
                                   value="{{ old('deal_ends_at', optional($carPart->deal_ends_at)->format('Y-m-d\\TH:i')) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                        </div>
                    </div>
                    <p class="text-xs text-gray-500">After deal end time, this car part will automatically disappear from the website (still visible in admin).</p>
                </div>
            </div>

            <!-- Current Main Image -->
            @if($carPart->image)
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Main Image</label>
                <img src="{{ $carPart->image_url }}" alt="Current image" class="w-32 h-32 object-cover rounded-lg">
            </div>
            @endif

            <!-- Main Image -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Update Main Image</label>
                <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp,image/bmp,image/x-icon,image/tiff"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                       onchange="previewMainImage(this)">
                <p class="mt-1 text-sm text-gray-500">Leave blank to keep current image. Max size: 5MB</p>
                <div id="mainImagePreview" class="mt-3 hidden">
                    <p class="text-sm font-medium text-gray-700 mb-2">New Image Preview:</p>
                    <img id="mainImagePreviewImg" src="" alt="Preview" class="w-32 h-32 object-cover rounded-lg border-2 border-gray-200">
                </div>
            </div>

            <!-- Current Additional Images -->
            @if($carPart->images_urls && count($carPart->images_urls) > 0)
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Additional Images ({{ count($carPart->images_urls) }})</label>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                    @foreach($carPart->images_urls as $index => $image)
                    <div class="relative group">
                        <img src="{{ $image }}" alt="Car part image {{ $index + 1 }}" class="w-full h-24 object-cover rounded-lg border-2 border-gray-200">
                        <div class="absolute top-1 right-1 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded">{{ $index + 1 }}</div>
                    </div>
                    @endforeach
                </div>
                <p class="mt-2 text-sm text-orange-600 font-medium">⚠️ Note: Uploading new images will replace all current additional images.</p>
            </div>
            @endif

            <!-- Multiple Images -->
            <div class="mb-6">
                <label for="images" class="block text-sm font-medium text-gray-700 mb-2">
                    Update Additional Images (Maximum 10 images)
                </label>
                <input type="file" name="images[]" id="images" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp,image/bmp,image/x-icon,image/tiff" multiple
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                       onchange="previewMultipleImages(this)">
                <p class="mt-1 text-sm text-gray-500">Leave blank to keep current images. Max size per image: 5MB</p>
                <p class="mt-1 text-xs text-orange-600 font-medium" id="imageCountWarning"></p>
                <div id="imagesPreview" class="mt-4 grid grid-cols-2 md:grid-cols-5 gap-3"></div>
            </div>

            <script>
                function previewMainImage(input) {
                    const preview = document.getElementById('mainImagePreview');
                    const img = document.getElementById('mainImagePreviewImg');
                    if (input.files && input.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            img.src = e.target.result;
                            preview.classList.remove('hidden');
                        }
                        reader.readAsDataURL(input.files[0]);
                    } else {
                        preview.classList.add('hidden');
                    }
                }

                function previewMultipleImages(input) {
                    const preview = document.getElementById('imagesPreview');
                    const warning = document.getElementById('imageCountWarning');
                    preview.innerHTML = '';
                    
                    if (input.files.length > 10) {
                        warning.textContent = `⚠️ You selected ${input.files.length} images. Only the first 10 will be uploaded.`;
                        warning.classList.remove('hidden');
                    } else {
                        warning.textContent = '';
                        warning.classList.add('hidden');
                    }

                    const maxFiles = Math.min(input.files.length, 10);
                    for (let i = 0; i < maxFiles; i++) {
                        const file = input.files[i];
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const div = document.createElement('div');
                            div.className = 'relative group';
                            div.innerHTML = `
                                <img src="${e.target.result}" alt="Preview ${i + 1}" class="w-full h-24 object-cover rounded-lg border-2 border-gray-200">
                                <div class="absolute top-1 right-1 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded">${i + 1}</div>
                            `;
                            preview.appendChild(div);
                        }
                        reader.readAsDataURL(file);
                    }
                }

                function validateVideoSize(input) {
                    const maxSize = 10 * 1024 * 1024; // 10MB
                    const warning = document.getElementById('videoSizeWarning');
                    if (input.files && input.files[0]) {
                        if (input.files[0].size > maxSize) {
                            warning.textContent = '❌ Error: Video is too large! Maximum allowed size is 10MB.';
                            warning.classList.remove('hidden');
                            input.value = ''; // Clear input to prevent submission
                        } else {
                            warning.classList.add('hidden');
                            warning.textContent = '';
                        }
                    }
                }
            </script>

            <!-- Current Video -->
            @if($carPart->video)
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Video</label>
                <video controls class="w-full max-w-md rounded-lg">
                    <source src="{{ $carPart->video_url }}" type="video/mp4">
                </video>
            </div>
            @endif

            <!-- Video -->
            <div class="mb-6">
                <label for="video" class="block text-sm font-medium text-gray-700 mb-2">Update Car Part Video</label>
                <input type="file" name="video" id="video" accept="video/*"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                       onchange="validateVideoSize(this)">
                @error('video')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p id="videoSizeWarning" class="mt-1 text-sm text-red-600 font-bold hidden"></p>
                <p class="mt-1 text-sm text-gray-500">Leave blank to keep current video. Max size: 10MB</p>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('car-parts.index', ['admin' => 1]) }}" 
                   class="px-8 py-3 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 font-semibold transition-all flex items-center gap-2">
                    <i class="fas fa-times"></i> Cancel
                </a>
                <button type="submit" 
                        class="px-8 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-xl hover:from-blue-700 hover:to-cyan-700 font-semibold shadow-lg hover:shadow-xl transition-all flex items-center gap-2">
                    <i class="fas fa-save"></i> Update Car Part
                </button>
            </div>
        </form>
    </div>
</div>
@endsection


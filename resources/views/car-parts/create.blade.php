@extends('layouts.admin')

@section('title', 'Create Car Part - ATC Japan')
@section('page-subtitle', 'Create Car Part')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('car-parts.index', ['admin' => 1]) }}" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-800 font-medium">
            <i class="fas fa-arrow-left"></i> Back to Car Parts Management
        </a>
    </div>
    <h1 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-2 flex items-center gap-3">
        <i class="fas fa-plus-circle text-purple-600"></i>
        Create New Car Part
    </h1>
    <p class="text-gray-600 mb-8">Add a new car part with images and videos</p>

    <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-8">

        <form action="{{ route('admin.car-parts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Car Part Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Brand -->
                <div>
                    <label for="brand" class="block text-sm font-medium text-gray-700 mb-2">Brand *</label>
                    <select name="brand" id="brand" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Brand</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->name }}" {{ old('brand') == $brand->name ? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Category (Part Category) -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <select name="category" id="category" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Category</option>
                        @foreach($partCategories as $partCategory)
                            <option value="{{ $partCategory->name }}" {{ old('category') == $partCategory->name ? 'selected' : '' }}>{{ $partCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Model -->
                <div>
                    <label for="model" class="block text-sm font-medium text-gray-700 mb-2">Model</label>
                    <input type="text" name="model" id="model" value="{{ old('model') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                    <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Part Number -->
                <div>
                    <label for="part_number" class="block text-sm font-medium text-gray-700 mb-2">Part Number</label>
                    <input type="text" name="part_number" id="part_number" value="{{ old('part_number') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Condition -->
                <div>
                    <label for="condition" class="block text-sm font-medium text-gray-700 mb-2">Condition</label>
                    <select name="condition" id="condition"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Condition</option>
                        <option value="Used">Used</option>
                        <option value="New">New</option>
                        <option value="Refurbished">Refurbished</option>
                    </select>
                </div>
            </div>

            <!-- Stock Quantity -->
            <div class="mb-6">
                <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity</label>
                <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', 0) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Deal Settings -->
            <div class="mb-6 p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                <h3 class="text-sm font-semibold text-yellow-800 mb-3 flex items-center gap-2">
                    <i class="fas fa-bolt"></i> Deal Settings (optional)
                </h3>
                <div class="space-y-3">
                    <label class="inline-flex items-center gap-2 text-sm text-gray-800">
                        <input type="checkbox" name="is_deal" value="1" {{ old('is_deal') ? 'checked' : '' }}
                               class="rounded border-gray-300 text-yellow-600 focus:ring-yellow-500">
                        <span>Put this car part on deal for a specific time</span>
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="deal_starts_at" class="block text-xs font-medium text-gray-600 mb-1">Deal Start</label>
                            <input type="datetime-local" name="deal_starts_at" id="deal_starts_at"
                                   value="{{ old('deal_starts_at') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                        </div>
                        <div>
                            <label for="deal_ends_at" class="block text-xs font-medium text-gray-600 mb-1">Deal End</label>
                            <input type="datetime-local" name="deal_ends_at" id="deal_ends_at"
                                   value="{{ old('deal_ends_at') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                        </div>
                    </div>
                    <p class="text-xs text-gray-500">After deal end time, this car part will automatically disappear from the website (still visible in admin).</p>
                </div>
            </div>

            <!-- Main Image -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Main Image</label>
                <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp,image/bmp,image/x-icon,image/tiff"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                       onchange="previewMainImage(this)">
                <p class="mt-1 text-sm text-gray-500">Max size: 5MB (JPEG, PNG, JPG, GIF, SVG, WEBP, BMP, ICO, TIFF)</p>
                <div id="mainImagePreview" class="mt-3 hidden">
                    <img id="mainImagePreviewImg" src="" alt="Preview" class="w-32 h-32 object-cover rounded-lg border-2 border-gray-200">
                </div>
            </div>

            <!-- Multiple Images -->
            <div class="mb-6">
                <label for="images" class="block text-sm font-medium text-gray-700 mb-2">
                    Additional Images (Maximum 10 images)
                </label>
                <input type="file" name="images[]" id="images" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp,image/bmp,image/x-icon,image/tiff" multiple
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                       onchange="previewMultipleImages(this)">
                <p class="mt-1 text-sm text-gray-500">You can select up to 10 images. Max size per image: 5MB</p>
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

            <!-- Video -->
            <div class="mb-6">
                <label for="video" class="block text-sm font-medium text-gray-700 mb-2">Car Part Video</label>
                <input type="file" name="video" id="video" accept="video/*"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                       onchange="validateVideoSize(this)">
                @error('video')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p id="videoSizeWarning" class="mt-1 text-sm text-red-600 font-bold hidden"></p>
                <p class="mt-1 text-sm text-gray-500">Max size: 10MB (MP4, AVI, MOV)</p>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('car-parts.index', ['admin' => 1]) }}" 
                   class="px-8 py-3 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 font-semibold transition-all flex items-center gap-2">
                    <i class="fas fa-times"></i> Cancel
                </a>
                <button type="submit" 
                        class="px-8 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl hover:from-purple-700 hover:to-pink-700 font-semibold shadow-lg hover:shadow-xl transition-all flex items-center gap-2">
                    <i class="fas fa-check"></i> Create Car Part
                </button>
            </div>
        </form>
    </div>
</div>
@endsection


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

            <!-- Vehicle Specifications Section -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-car text-indigo-600"></i>
                    Vehicle Specifications
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Stock ID -->
                    <div>
                        <label for="stock_id" class="block text-sm font-medium text-gray-700 mb-2">Stock ID</label>
                        <input type="text" name="stock_id" id="stock_id" value="{{ old('stock_id', $product->stock_id) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., 82406">
                    </div>

                    <!-- Chassis Number -->
                    <div>
                        <label for="chassis_number" class="block text-sm font-medium text-gray-700 mb-2">Chassis Number</label>
                        <input type="text" name="chassis_number" id="chassis_number" value="{{ old('chassis_number', $product->chassis_number) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., JF3-528****">
                    </div>

                    <!-- Model Code -->
                    <div>
                        <label for="model_code" class="block text-sm font-medium text-gray-700 mb-2">Model Code</label>
                        <input type="text" name="model_code" id="model_code" value="{{ old('model_code', $product->model_code) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., 68A-JF3">
                    </div>

                    <!-- Year/Month -->
                    <div>
                        <label for="year_month" class="block text-sm font-medium text-gray-700 mb-2">Year/Month</label>
                        <input type="text" name="year_month" id="year_month" value="{{ old('year_month', $product->year_month) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., 2023/4">
                    </div>

                    <!-- Grade -->
                    <div>
                        <label for="grade" class="block text-sm font-medium text-gray-700 mb-2">Grade</label>
                        <input type="text" name="grade" id="grade" value="{{ old('grade', $product->grade) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., G SENSING">
                    </div>

                    <!-- Body Style -->
                    <div>
                        <label for="body_style" class="block text-sm font-medium text-gray-700 mb-2">Body Style</label>
                        <input type="text" name="body_style" id="body_style" value="{{ old('body_style', $product->body_style) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., HATCHBACK">
                    </div>

                    <!-- Mileage -->
                    <div>
                        <label for="mileage" class="block text-sm font-medium text-gray-700 mb-2">Mileage</label>
                        <input type="number" name="mileage" id="mileage" value="{{ old('mileage', $product->mileage) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., 8000">
                    </div>

                    <!-- Transmission -->
                    <div>
                        <label for="transmission" class="block text-sm font-medium text-gray-700 mb-2">Transmission</label>
                        <select name="transmission" id="transmission"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Select Transmission</option>
                            <option value="AUTOMATIC" {{ old('transmission', $product->transmission) == 'AUTOMATIC' ? 'selected' : '' }}>Automatic</option>
                            <option value="MANUAL" {{ old('transmission', $product->transmission) == 'MANUAL' ? 'selected' : '' }}>Manual</option>
                            <option value="CVT" {{ old('transmission', $product->transmission) == 'CVT' ? 'selected' : '' }}>CVT</option>
                        </select>
                    </div>

                    <!-- Engine CC -->
                    <div>
                        <label for="engine_cc" class="block text-sm font-medium text-gray-700 mb-2">Engine CC</label>
                        <input type="number" name="engine_cc" id="engine_cc" value="{{ old('engine_cc', $product->engine_cc) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., 660">
                    </div>

                    <!-- Fuel Type -->
                    <div>
                        <label for="fuel_type" class="block text-sm font-medium text-gray-700 mb-2">Fuel Type</label>
                        <select name="fuel_type" id="fuel_type"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Select Fuel Type</option>
                            <option value="GASOLINE" {{ old('fuel_type', $product->fuel_type) == 'GASOLINE' ? 'selected' : '' }}>Gasoline</option>
                            <option value="DIESEL" {{ old('fuel_type', $product->fuel_type) == 'DIESEL' ? 'selected' : '' }}>Diesel</option>
                            <option value="HYBRID" {{ old('fuel_type', $product->fuel_type) == 'HYBRID' ? 'selected' : '' }}>Hybrid</option>
                            <option value="ELECTRIC" {{ old('fuel_type', $product->fuel_type) == 'ELECTRIC' ? 'selected' : '' }}>Electric</option>
                        </select>
                    </div>

                    <!-- Color -->
                    <div>
                        <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                        <input type="text" name="color" id="color" value="{{ old('color', $product->color) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., BLACK">
                    </div>

                    <!-- Doors -->
                    <div>
                        <label for="doors" class="block text-sm font-medium text-gray-700 mb-2">Doors</label>
                        <input type="number" name="doors" id="doors" value="{{ old('doors', $product->doors) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., 4">
                    </div>

                    <!-- Seats -->
                    <div>
                        <label for="seats" class="block text-sm font-medium text-gray-700 mb-2">Seats</label>
                        <input type="number" name="seats" id="seats" value="{{ old('seats', $product->seats) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., 4">
                    </div>

                    <!-- Dimension -->
                    <div>
                        <label for="dimension" class="block text-sm font-medium text-gray-700 mb-2">Dimension</label>
                        <input type="text" name="dimension" id="dimension" value="{{ old('dimension', $product->dimension) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., 339 X 147 X 179">
                    </div>
                </div>

                <!-- Additional Features -->
                <div class="mb-4">
                    <label for="additional_features" class="block text-sm font-medium text-gray-700 mb-2">Additional Features</label>
                    <div id="additionalFeaturesContainer" class="space-y-2">
                        @if(old('additional_features', $product->additional_features))
                            @foreach(old('additional_features', $product->additional_features) as $feature)
                            <div class="flex gap-2">
                                <input type="text" name="additional_features[]" value="{{ $feature }}"
                                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                       placeholder="e.g., Power Window">
                                <button type="button" onclick="removeFeature(this)" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-feature-btn">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            @endforeach
                        @else
                            <div class="flex gap-2">
                                <input type="text" name="additional_features[]" 
                                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                       placeholder="e.g., Power Window">
                                <button type="button" onclick="removeFeature(this)" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 hidden remove-feature-btn">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                    <button type="button" onclick="addFeature()" class="mt-2 px-4 py-2 bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200 text-sm font-medium">
                        <i class="fas fa-plus mr-1"></i> Add Feature
                    </button>
                    <p class="mt-1 text-xs text-gray-500">Add features like Power Window, Sun Roof, 4 Wheel Drive, etc.</p>
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
            @if($product->images_urls && count($product->images_urls) > 0)
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Additional Images ({{ count($product->images_urls) }})</label>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                    @foreach($product->images_urls as $index => $image)
                    <div class="relative group">
                        <img src="{{ $image }}" alt="Product image {{ $index + 1 }}" class="w-full h-24 object-cover rounded-lg border-2 border-gray-200">
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

                function addFeature() {
                    const container = document.getElementById('additionalFeaturesContainer');
                    const div = document.createElement('div');
                    div.className = 'flex gap-2';
                    div.innerHTML = `
                        <input type="text" name="additional_features[]" 
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., Power Window">
                        <button type="button" onclick="removeFeature(this)" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-feature-btn">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    container.appendChild(div);
                    updateRemoveButtons();
                }

                function removeFeature(button) {
                    button.parentElement.remove();
                    updateRemoveButtons();
                }

                function updateRemoveButtons() {
                    const containers = document.querySelectorAll('#additionalFeaturesContainer > div');
                    containers.forEach((container, index) => {
                        const removeBtn = container.querySelector('.remove-feature-btn');
                        if (containers.length > 1) {
                            removeBtn.classList.remove('hidden');
                        } else {
                            removeBtn.classList.add('hidden');
                        }
                    });
                }

                // Initialize on page load
                document.addEventListener('DOMContentLoaded', function() {
                    updateRemoveButtons();
                });
            </script>

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


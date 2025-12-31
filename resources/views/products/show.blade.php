@extends('layouts.app')

@section('title', $product->name . ' - ATC Japan')

@section('content')
<!-- Product Detail Section -->
<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-4">
            <a href="{{ route('products.index') }}" class="text-indigo-600 hover:text-indigo-800">
                ← Back to Products
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Images & Video -->
            <div>
                <!-- Image Slider -->
                <div class="mb-4">
                    @php
                        $allImages = [$product->image_url];
                        if($product->images_urls && count($product->images_urls) > 0) {
                            $allImages = array_merge($allImages, $product->images_urls);
                        }
                    @endphp
                    
                    <div class="relative" id="productImageSlider">
                        <!-- Main Image Display -->
                        <div class="relative overflow-hidden rounded-lg shadow-lg bg-gray-100 cursor-zoom-in group" style="padding-top: 75%;">
                            @foreach($allImages as $index => $image)
                            <img src="{{ $image }}" 
                                 alt="{{ $product->name }}" 
                                 class="absolute inset-0 w-full h-full object-contain transition-all duration-300 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }} group-hover:scale-110 cursor-zoom-in"
                                 data-slide-index="{{ $index }}"
                                 data-image-src="{{ $image }}"
                                 id="mainImage{{ $index }}"
                                 onclick="openImageModal({{ $index }})">
                            @endforeach
                        </div>
                        
                        <!-- Navigation Arrows -->
                        @if(count($allImages) > 1)
                        <button onclick="changeSlide(-1)" 
                                class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-75 text-white p-3 rounded-full transition-all z-10">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button onclick="changeSlide(1)" 
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-75 text-white p-3 rounded-full transition-all z-10">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        
                        <!-- Slide Indicators -->
                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2 z-10">
                            @foreach($allImages as $index => $image)
                            <button onclick="goToSlide({{ $index }})" 
                                    class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all {{ $index === 0 ? 'bg-opacity-100' : '' }}"
                                    id="indicator{{ $index }}"></button>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    
                    <!-- Thumbnail Images -->
                    @if(count($allImages) > 1)
                    <div class="grid grid-cols-4 gap-2 mt-4">
                        @foreach($allImages as $index => $image)
                        <button onclick="goToSlide({{ $index }}); openImageModal({{ $index }});" 
                                class="relative overflow-hidden rounded-lg border-2 transition-all {{ $index === 0 ? 'border-indigo-600' : 'border-transparent hover:border-gray-300' }} cursor-pointer"
                                id="thumbnail{{ $index }}"
                                style="padding-top: 100%;">
                            <img src="{{ $image }}" 
                                 alt="Thumbnail {{ $index + 1 }}" 
                                 class="absolute inset-0 w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                        </button>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Video -->
                @if($product->video_url)
                <div class="mt-4">
                    <h3 class="font-semibold mb-2">Product Video</h3>
                    <video controls class="w-full rounded-lg shadow-lg">
                        <source src="{{ $product->video_url }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div>
                <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                <div class="flex items-center gap-4 mb-4">
                    <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm font-semibold">
                        {{ $product->brand }}
                    </span>
                    @if($product->condition)
                    <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">
                        {{ $product->condition }}
                    </span>
                    @endif
                </div>
                
                @if($product->price)
                <p class="text-3xl font-bold text-indigo-600 mb-6">
                    ${{ number_format($product->price, 2) }}
                </p>
                @else
                <p class="text-xl text-gray-600 mb-6">Price on inquiry</p>
                @endif

                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h3 class="font-semibold text-lg mb-4">Product Details</h3>
                    <div class="space-y-3">
                        @if($product->part_number)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Part Number:</span>
                            <span class="font-medium">{{ $product->part_number }}</span>
                        </div>
                        @endif
                        @if($product->model)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Model:</span>
                            <span class="font-medium">{{ $product->model }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between">
                            <span class="text-gray-600">Category:</span>
                            <span class="font-medium">{{ $product->category }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Stock:</span>
                            <span class="font-medium {{ $product->stock_quantity > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $product->stock_quantity > 0 ? $product->stock_quantity . ' available' : 'Out of stock' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Vehicle Specifications -->
                @if($product->stock_id || $product->chassis_number || $product->model_code || $product->year_month || $product->grade || $product->body_style || $product->mileage || $product->transmission || $product->engine_cc || $product->fuel_type || $product->color || $product->doors || $product->seats || $product->dimension)
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h3 class="font-semibold text-lg mb-4 flex items-center gap-2">
                        <i class="fas fa-car text-indigo-600"></i>
                        Vehicle Specifications
                    </h3>
                    <div class="space-y-3">
                        @if($product->stock_id)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Stock ID:</span>
                            <span class="font-medium">{{ $product->stock_id }}</span>
                        </div>
                        @endif
                        @if($product->chassis_number)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Chassis Number:</span>
                            <span class="font-medium">{{ $product->chassis_number }}</span>
                        </div>
                        @endif
                        @if($product->model_code)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Model Code:</span>
                            <span class="font-medium">{{ $product->model_code }}</span>
                        </div>
                        @endif
                        @if($product->year_month)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Year/Month:</span>
                            <span class="font-medium">{{ $product->year_month }}</span>
                        </div>
                        @endif
                        @if($product->grade)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Grade:</span>
                            <span class="font-medium">{{ $product->grade }}</span>
                        </div>
                        @endif
                        @if($product->body_style)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Body Style:</span>
                            <span class="font-medium">{{ $product->body_style }}</span>
                        </div>
                        @endif
                        @if($product->mileage)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Mileage:</span>
                            <span class="font-medium">{{ number_format($product->mileage) }} km</span>
                        </div>
                        @endif
                        @if($product->transmission)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Transmission:</span>
                            <span class="font-medium">{{ $product->transmission }}</span>
                        </div>
                        @endif
                        @if($product->engine_cc)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Engine CC:</span>
                            <span class="font-medium">{{ number_format($product->engine_cc) }} cc</span>
                        </div>
                        @endif
                        @if($product->fuel_type)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Fuel Type:</span>
                            <span class="font-medium">{{ $product->fuel_type }}</span>
                        </div>
                        @endif
                        @if($product->color)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Color:</span>
                            <span class="font-medium">{{ $product->color }}</span>
                        </div>
                        @endif
                        @if($product->doors || $product->seats)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Doors / Seats:</span>
                            <span class="font-medium">{{ $product->doors ?? 'N/A' }} / {{ $product->seats ?? 'N/A' }}</span>
                        </div>
                        @endif
                        @if($product->dimension)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Dimension:</span>
                            <span class="font-medium">{{ $product->dimension }}</span>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Additional Features -->
                @if($product->additional_features && count($product->additional_features) > 0)
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h3 class="font-semibold text-lg mb-4">Additional Features</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($product->additional_features as $feature)
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium">
                            <i class="fas fa-check-circle mr-1"></i>{{ $feature }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($product->description)
                <div class="mb-6">
                    <h3 class="font-semibold text-lg mb-2">Description</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                </div>
                @endif

                @auth
                    <!-- Enquiry Form -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <h3 class="font-semibold text-lg mb-4">Submit Enquiry</h3>
                        @if(session('success'))
                        <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form action="{{ route('products.enquiry.store', $product->hashid) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message (Optional)</label>
                                <textarea id="message" name="message" rows="4" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                          placeholder="Tell us about your requirements..."></textarea>
                            </div>
                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition">
                                <i class="fas fa-paper-plane mr-2"></i> Submit Enquiry
                            </button>
                        </form>
                    </div>

                    <div class="flex gap-4">
                        <a href="{{ route('enquiries.index') }}" 
                           class="flex-1 bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold text-center hover:bg-gray-700 transition flex items-center justify-center gap-2">
                            <i class="fas fa-list"></i> My Enquiries
                        </a>
                        <a href="https://wa.me/819048043444?text=Hi, I'm interested in {{ urlencode($product->name) }}. Product ID: {{ $product->hashid }}" 
                           target="_blank"
                           class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-700 transition flex items-center gap-2 shadow-lg">
                            <i class="fab fa-whatsapp text-xl"></i> WhatsApp
                        </a>
                    </div>
                @else
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 mb-6">
                        <p class="text-yellow-800 mb-4">Please login to submit an enquiry for this product.</p>
                        <a href="{{ route('login') }}" 
                           class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold text-center hover:from-indigo-700 hover:to-purple-700 transition flex items-center justify-center gap-2">
                            <i class="fas fa-sign-in-alt"></i> Login to Enquire
                        </a>
                    </div>
                    <div class="flex gap-4">
                        <a href="https://wa.me/819048043444?text=Hi, I'm interested in {{ urlencode($product->name) }}. Product ID: {{ $product->hashid }}" 
                           target="_blank"
                           class="flex-1 bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-700 transition flex items-center justify-center gap-2 shadow-lg">
                            <i class="fab fa-whatsapp text-xl"></i> WhatsApp
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</section>

<!-- Image Modal/Lightbox -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden items-center justify-center p-4" onclick="closeImageModal()">
    <div class="relative max-w-7xl w-full h-full flex items-center justify-center">
        <!-- Close Button -->
        <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white hover:text-gray-300 z-10 bg-black bg-opacity-50 rounded-full p-3 transition-all">
            <i class="fas fa-times text-2xl"></i>
        </button>
        
        <!-- Previous Button -->
        <button onclick="changeModalSlide(-1); event.stopPropagation();" class="absolute left-4 text-white hover:text-gray-300 z-10 bg-black bg-opacity-50 rounded-full p-4 transition-all">
            <i class="fas fa-chevron-left text-xl"></i>
        </button>
        
        <!-- Next Button -->
        <button onclick="changeModalSlide(1); event.stopPropagation();" class="absolute right-4 text-white hover:text-gray-300 z-10 bg-black bg-opacity-50 rounded-full p-4 transition-all">
            <i class="fas fa-chevron-right text-xl"></i>
        </button>
        
        <!-- Image Container -->
        <div class="max-w-full max-h-full flex items-center justify-center" onclick="event.stopPropagation();">
            @foreach($allImages as $index => $image)
            <img src="{{ $image }}" 
                 alt="{{ $product->name }} - Image {{ $index + 1 }}" 
                 class="max-w-full max-h-full object-contain {{ $index === 0 ? 'block' : 'hidden' }}"
                 id="modalImage{{ $index }}"
                 onclick="event.stopPropagation();">
            @endforeach
        </div>
        
        <!-- Image Counter -->
        @if(count($allImages) > 1)
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white bg-black bg-opacity-50 px-4 py-2 rounded-full text-sm">
            <span id="imageCounter">1</span> / {{ count($allImages) }}
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
let currentSlide = 0;
@php
    $allImagesForJs = [$product->image_url];
    if($product->images_urls && count($product->images_urls) > 0) {
        $allImagesForJs = array_merge($allImagesForJs, $product->images_urls);
    }
@endphp
const totalSlides = {{ count($allImagesForJs) }};

function changeSlide(direction) {
    currentSlide += direction;
    if (currentSlide < 0) {
        currentSlide = totalSlides - 1;
    } else if (currentSlide >= totalSlides) {
        currentSlide = 0;
    }
    goToSlide(currentSlide);
}

function goToSlide(index) {
    currentSlide = index;
    
    // Hide all main images
    document.querySelectorAll('[id^="mainImage"]').forEach(img => {
        img.classList.remove('opacity-100');
        img.classList.add('opacity-0');
    });
    
    // Show selected image
    const mainImage = document.getElementById('mainImage' + index);
    if (mainImage) {
        mainImage.classList.remove('opacity-0');
        mainImage.classList.add('opacity-100');
    }
    
    // Update indicators
    document.querySelectorAll('[id^="indicator"]').forEach((indicator, i) => {
        if (i === index) {
            indicator.classList.remove('bg-opacity-50');
            indicator.classList.add('bg-opacity-100');
        } else {
            indicator.classList.remove('bg-opacity-100');
            indicator.classList.add('bg-opacity-50');
        }
    });
    
    // Update thumbnails
    document.querySelectorAll('[id^="thumbnail"]').forEach((thumbnail, i) => {
        if (i === index) {
            thumbnail.classList.remove('border-transparent', 'border-gray-300');
            thumbnail.classList.add('border-indigo-600');
        } else {
            thumbnail.classList.remove('border-indigo-600');
            thumbnail.classList.add('border-transparent');
        }
    });
}

// Image Modal Functions
function openImageModal(index) {
    const modal = document.getElementById('imageModal');
    const allModalImages = document.querySelectorAll('[id^="modalImage"]');
    
    // Hide all modal images
    allModalImages.forEach(img => {
        img.classList.add('hidden');
        img.classList.remove('block');
    });
    
    // Show selected image
    const selectedImage = document.getElementById('modalImage' + index);
    if (selectedImage) {
        selectedImage.classList.remove('hidden');
        selectedImage.classList.add('block');
    }
    
    // Update counter
    const counter = document.getElementById('imageCounter');
    if (counter) {
        counter.textContent = (index + 1);
    }
    
    // Show modal
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
    
    // Update current slide for modal
    currentSlide = index;
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = 'auto';
}

function changeModalSlide(direction) {
    const newIndex = currentSlide + direction;
    if (newIndex < 0) {
        openImageModal(totalSlides - 1);
    } else if (newIndex >= totalSlides) {
        openImageModal(0);
    } else {
        openImageModal(newIndex);
    }
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    const modal = document.getElementById('imageModal');
    const isModalOpen = !modal.classList.contains('hidden');
    
    if (isModalOpen) {
        // Modal is open - navigate within modal
        if (e.key === 'ArrowLeft') {
            changeModalSlide(-1);
        } else if (e.key === 'ArrowRight') {
            changeModalSlide(1);
        } else if (e.key === 'Escape') {
            closeImageModal();
        }
    } else {
        // Modal is closed - navigate main slider
        if (e.key === 'ArrowLeft') {
            changeSlide(-1);
        } else if (e.key === 'ArrowRight') {
            changeSlide(1);
        }
    }
});
</script>
@endpush
@endsection


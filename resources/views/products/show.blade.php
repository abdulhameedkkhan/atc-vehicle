@extends('layouts.app')

@section('title', $product->name . ' - ATC Japan')

@section('content')
<!-- Product Detail Section -->
<section class="py-12">
    @php
        $allImages = [$product->image_url];
        if($product->images_urls && count($product->images_urls) > 0) {
            $allImages = array_merge($allImages, $product->images_urls);
        }
    @endphp
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
                    
                    <!-- Thumbnail strip - single row with slider -->
                    @if(count($allImages) > 1)
                    <div class="mt-4 relative">
                        <button type="button" onclick="scrollThumbs(-1)" aria-label="Previous thumbnails"
                                class="absolute left-0 top-1/2 -translate-y-1/2 z-10 w-8 h-8 flex items-center justify-center rounded-full bg-gray-800 text-white hover:bg-gray-700 shadow-lg">
                            <i class="fas fa-chevron-left text-sm"></i>
                        </button>
                        <button type="button" onclick="scrollThumbs(1)" aria-label="Next thumbnails"
                                class="absolute right-0 top-1/2 -translate-y-1/2 z-10 w-8 h-8 flex items-center justify-center rounded-full bg-gray-800 text-white hover:bg-gray-700 shadow-lg">
                            <i class="fas fa-chevron-right text-sm"></i>
                        </button>
                        <div id="thumbStrip" class="flex gap-2 overflow-x-auto scroll-smooth snap-x snap-mandatory py-1 px-10 scrollbar-hide" style="scrollbar-width: none; -ms-overflow-style: none;">
                            @foreach($allImages as $index => $image)
                            <button onclick="goToSlide({{ $index }}); openImageModal({{ $index }});" 
                                    class="flex-shrink-0 w-20 h-20 snap-center relative overflow-hidden rounded-lg border-2 transition-all {{ $index === 0 ? 'border-indigo-600' : 'border-transparent hover:border-gray-400' }} cursor-pointer"
                                    id="thumbnail{{ $index }}">
                                <img src="{{ $image }}" 
                                     alt="Thumbnail {{ $index + 1 }}" 
                                     class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                            </button>
                            @endforeach
                        </div>
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
                <div class="flex flex-wrap items-center gap-4 mb-4">
                    <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm font-semibold">
                        {{ $product->brand }}
                    </span>
                    @if($product->condition)
                    <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">
                        {{ $product->condition }}
                    </span>
                    @endif
                    @php
                        $status = $product->status ?? 'stock';
                        $statusClasses = [
                            'reserved' => 'bg-amber-100 text-amber-800 border-amber-200',
                            'sold' => 'bg-red-100 text-red-800 border-red-200',
                            'stock' => 'bg-green-100 text-green-800 border-green-200',
                            'ship' => 'bg-blue-100 text-blue-800 border-blue-200',
                        ];
                        $statusClass = $statusClasses[$status] ?? $statusClasses['stock'];
                    @endphp
                    <span class="px-3 py-1 rounded-full text-sm font-semibold border {{ $statusClass }}">
                        {{ ucfirst($status) }}
                    </span>
                </div>
                
                <div class="flex flex-wrap items-end gap-6 mb-8 bg-blue-50/50 p-6 rounded-2xl border border-blue-100">
                    <div>
                        <h4 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Product Vehicle Cost</h4>
                        @if($product->price)
                        <p class="text-4xl font-black text-[#1e3a8a]">
                            ${{ number_format($product->price, 2) }}
                        </p>
                        @else
                        <p class="text-xl font-bold text-gray-600">Price on inquiry</p>
                        @endif
                    </div>
                    @if($product->cnf_fob_type && $product->cnf_fob_price)
                    <div>
                        <h4 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">CNF/FOB Price</h4>
                        <p class="text-xl font-bold text-[#1e3a8a]">
                            {{ $product->cnf_fob_type }}: ${{ number_format($product->cnf_fob_price, 2) }}
                        </p>
                    </div>
                    @endif
                    <a href="https://wa.me/819048043444?text=Hi, I'm interested in {{ urlencode($product->name) }}. Product ID: {{ $product->hashid }}. View Product: {{ urlencode(url()->current()) }}" 
                       target="_blank"
                       class="bg-[#25D366] hover:bg-[#128C7E] text-white px-6 py-3 rounded-xl font-bold transition-all flex items-center gap-2 shadow-lg hover:shadow-green-200/50 transform hover:-translate-y-1 mb-1">
                        <i class="fab fa-whatsapp text-xl"></i>
                        <span>More Info</span>
                    </a>
                </div>

                <!-- Enquiry Form (in sidebar on large screens) -->
                <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden mb-8 lg:mb-0">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                        <h3 class="font-bold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-paper-plane text-[#1e3a8a]"></i> Quick Enquiry
                        </h3>
                    </div>
                    <div class="p-6">
                        @if(session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('products.enquiry.store', $product->hashid) }}" method="POST" class="space-y-4">
                            @csrf
                            
                            @guest
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1 tracking-wider">Full Name *</label>
                                    <input type="text" name="name" required 
                                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-transparent transition text-sm"
                                           placeholder="Enter your name">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1 tracking-wider">Email Address *</label>
                                    <input type="email" name="email" required 
                                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-transparent transition text-sm"
                                           placeholder="Enter your email">
                                </div>
                            </div>
                            @endguest

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1 tracking-wider">Phone Number (Optional)</label>
                                <input type="text" name="phone" 
                                       class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-transparent transition text-sm"
                                       placeholder="e.g. +81 90-1234-5678">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1 tracking-wider">Message *</label>
                                <textarea name="message" rows="4" required 
                                          class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-transparent transition text-sm"
                                          placeholder="I'm interested in this vehicle. Please provide more details about shipping and final price."></textarea>
                            </div>

                            <button type="submit"
                                    class="w-full bg-[#1e3a8a] hover:bg-blue-900 text-white px-6 py-4 rounded-xl font-bold transition-all shadow-lg flex items-center justify-center gap-2 transform active:scale-95">
                                <i class="fas fa-paper-plane"></i> Submit Enquiry
                            </button>
                        </form>
                        
                        @guest
                        <p class="mt-4 text-center text-sm text-gray-500">
                            <!-- Already have an account? <a href="{{ route('login') }}" class="text-[#1e3a8a] font-bold hover:underline">Login here</a> -->
                        </p>
                        @else
                        <div class="mt-4 flex justify-center">
                            <a href="{{ route('enquiries.index') }}" class="text-sm font-bold text-gray-500 hover:text-[#1e3a8a] transition flex items-center gap-2">
                                <!-- <i class="fas fa-list"></i> View My Previous Enquiries -->
                            </a>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs: Details (one tab) + Description (below) -->
        <div class="mt-10 bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
            <div class="flex border-b border-gray-200">
                <button type="button" id="tabDetails" onclick="switchProductTab('details')"
                        class="tab-btn px-6 py-4 font-semibold text-gray-700 border-b-2 border-[#1e3a8a] bg-blue-50/50 text-[#1e3a8a] transition">
                    <i class="fas fa-info-circle mr-2"></i> Details
                </button>
                <button type="button" id="tabDescription" onclick="switchProductTab('description')"
                        class="tab-btn px-6 py-4 font-semibold text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:bg-gray-50/50 transition">
                    <i class="fas fa-align-left mr-2"></i> Description
                </button>
            </div>

            <!-- Tab panel: Details (Product Info + Vehicle Specs + Additional Features) -->
            <div id="panelDetails" class="tab-panel p-6 md:p-8">
                <div class="space-y-8">
                    <!-- Product Information -->
                    <div class="rounded-lg border border-gray-100 overflow-hidden">
                        <div class="bg-gray-50 px-6 py-3 border-b border-gray-100">
                            <h3 class="font-bold text-gray-800 flex items-center gap-2">
                                <i class="fas fa-info-circle text-[#1e3a8a]"></i> Product Information
                            </h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <tbody class="divide-y divide-gray-100">
                                    <tr class="hover:bg-gray-50 transition">
                                        <th class="py-3 px-6 bg-gray-50/50 text-gray-600 font-semibold w-1/3">Category</th>
                                        <td class="py-3 px-6 text-gray-800 font-medium">{{ $product->category }}</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition">
                                        <th class="py-3 px-6 bg-gray-50/50 text-gray-600 font-semibold">Brand</th>
                                        <td class="py-3 px-6">
                                            <span class="px-3 py-1 bg-blue-50 text-[#1e3a8a] rounded-full text-xs font-bold border border-blue-100">{{ $product->brand }}</span>
                                        </td>
                                    </tr>
                                    @if($product->model)
                                    <tr class="hover:bg-gray-50 transition">
                                        <th class="py-3 px-6 bg-gray-50/50 text-gray-600 font-semibold">Model</th>
                                        <td class="py-3 px-6 text-gray-800 font-medium">{{ $product->model }}</td>
                                    </tr>
                                    @endif
                                    @if($product->part_number)
                                    <tr class="hover:bg-gray-50 transition">
                                        <th class="py-3 px-6 bg-gray-50/50 text-gray-600 font-semibold">Part Number</th>
                                        <td class="py-3 px-6 text-gray-800 font-mono text-blue-600">{{ $product->part_number }}</td>
                                    </tr>
                                    @endif
                                    <tr class="hover:bg-gray-50 transition">
                                        <th class="py-3 px-6 bg-gray-50/50 text-gray-600 font-semibold">Status</th>
                                        <td class="py-3 px-6">
                                            <span class="inline-flex items-center gap-1.5 {{ $product->stock_quantity > 0 ? 'text-green-600' : 'text-red-600' }} font-bold">
                                                <span class="w-2 h-2 rounded-full {{ $product->stock_quantity > 0 ? 'bg-green-500 animate-pulse' : 'bg-red-500' }}"></span>
                                                {{ $product->stock_quantity > 0 ? $product->stock_quantity . ' In Stock' : 'Out of Stock' }}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Vehicle Specifications -->
                    @if($product->stock_id || $product->chassis_number || $product->model_code || $product->year_month || $product->grade || $product->body_style || $product->mileage || $product->transmission || $product->engine_cc || $product->fuel_type || $product->color || $product->doors || $product->seats || $product->dimension)
                    <div class="rounded-lg border border-gray-100 overflow-hidden">
                        <div class="bg-gray-50 px-6 py-3 border-b border-gray-100">
                            <h3 class="font-bold text-gray-800 flex items-center gap-2">
                                <i class="fas fa-car text-[#1e3a8a]"></i> Vehicle Specifications
                            </h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <tbody class="divide-y divide-gray-100">
                                    @php
                                        $specs = [
                                            'Stock ID' => $product->stock_id,
                                            'Chassis Number' => $product->chassis_number,
                                            'Model Code' => $product->model_code,
                                            'Year/Month' => $product->year_month,
                                            'Grade' => $product->grade,
                                            'Body Style' => $product->body_style,
                                            'Mileage' => $product->mileage ? number_format($product->mileage) . ' km' : null,
                                            'Transmission' => $product->transmission,
                                            'Engine CC' => $product->engine_cc ? number_format($product->engine_cc) . ' cc' : null,
                                            'Fuel Type' => $product->fuel_type,
                                            'Color' => $product->color,
                                            'Doors / Seats' => ($product->doors || $product->seats) ? ($product->doors ?? 'N/A') . ' / ' . ($product->seats ?? 'N/A') : null,
                                            'Dimension' => $product->dimension,
                                        ];
                                    @endphp
                                    @foreach($specs as $label => $value)
                                        @if($value)
                                        <tr class="hover:bg-gray-50 transition">
                                            <th class="py-3 px-6 bg-gray-50/50 text-gray-500 font-semibold text-xs uppercase tracking-wider w-1/3">{{ $label }}</th>
                                            <td class="py-3 px-6 text-gray-800 font-bold text-sm">{{ $value }}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif

                    <!-- Additional Features -->
                    @if($product->additional_features && count($product->additional_features) > 0)
                    <div class="rounded-lg border border-gray-100 overflow-hidden">
                        <div class="bg-gray-50 px-6 py-3 border-b border-gray-100">
                            <h3 class="font-bold text-gray-800 flex items-center gap-2">
                                <i class="fas fa-list-check text-[#1e3a8a]"></i> Additional Features
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="flex flex-wrap gap-2">
                                @foreach($product->additional_features as $feature)
                                <span class="px-3 py-1.5 bg-blue-50 text-[#1e3a8a] rounded-full text-sm font-medium border border-blue-100">
                                    <i class="fas fa-check-circle mr-1 text-green-500"></i>{{ $feature }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Tab panel: Description (below Details) -->
            <div id="panelDescription" class="tab-panel hidden p-6 md:p-8">
                @if($product->description)
                <div class="text-gray-700 leading-relaxed break-words whitespace-pre-line max-w-full text-base md:text-lg">{{ $product->description }}</div>
                @else
                <p class="text-gray-500 italic">No description available.</p>
                @endif
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

// Thumbnail strip horizontal scroll
function scrollThumbs(direction) {
    const strip = document.getElementById('thumbStrip');
    if (!strip) return;
    const step = 100;
    strip.scrollBy({ left: direction * step, behavior: 'smooth' });
}

// Product tabs: Details | Description
function switchProductTab(tab) {
    const tabDetails = document.getElementById('tabDetails');
    const tabDescription = document.getElementById('tabDescription');
    const panelDetails = document.getElementById('panelDetails');
    const panelDescription = document.getElementById('panelDescription');
    if (!tabDetails || !tabDescription || !panelDetails || !panelDescription) return;

    if (tab === 'details') {
        tabDetails.classList.add('border-[#1e3a8a]', 'bg-blue-50/50', 'text-[#1e3a8a]');
        tabDetails.classList.remove('border-transparent');
        tabDescription.classList.remove('border-[#1e3a8a]', 'bg-blue-50/50', 'text-[#1e3a8a]');
        tabDescription.classList.add('border-transparent', 'text-gray-500');
        panelDetails.classList.remove('hidden');
        panelDescription.classList.add('hidden');
    } else {
        tabDescription.classList.add('border-[#1e3a8a]', 'bg-blue-50/50', 'text-[#1e3a8a]');
        tabDescription.classList.remove('border-transparent', 'text-gray-500');
        tabDetails.classList.remove('border-[#1e3a8a]', 'bg-blue-50/50', 'text-[#1e3a8a]');
        tabDetails.classList.add('border-transparent', 'text-gray-500');
        panelDescription.classList.remove('hidden');
        panelDetails.classList.add('hidden');
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


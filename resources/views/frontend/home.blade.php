@extends('layouts.app')

@section('title', 'Home - ATC Japan | Japanese Used Vehicles & Auto Parts Export')

@section('content')
<!-- Hero Slider Section -->
<section class="relative text-white overflow-hidden">
    <div class="w-full px-4 sm:px-6 lg:px-8 py-10 md:py-14 relative z-10">
        <!-- Slider Container -->
        <div class="relative">
            <!-- Slider Wrapper -->
            <div class="slider-container overflow-hidden relative rounded-2xl">
                @php
                    $sliders = \App\Models\Slider::where('is_active', true)->orderBy('order')->get();
                @endphp

                @forelse($sliders as $index => $slider)
                <!-- Slide {{ $index + 1 }} -->
                <div class="slider-slide {{ $index === 0 ? 'active' : '' }} relative">
                    <!-- Background Image -->
                    <div class="absolute inset-0 z-0">
                        <img src="{{ $slider->image_url }}" 
                             alt="{{ $slider->title }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-red-900/50 to-black/60"></div>
                    </div>
                    <!-- Content -->
                    <div class="relative z-10 text-center py-24 md:py-32 lg:py-40 px-4">
                        <h1 class="text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold mb-4 leading-tight drop-shadow-2xl">
                            {{ $slider->title }}
                        </h1>
                        <p class="text-base md:text-lg lg:text-xl mb-6 text-white max-w-4xl mx-auto drop-shadow-xl font-medium">
                            {{ $slider->description }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3 justify-center">
                            @if($slider->button_text_1 && $slider->button_link_1)
                            <a href="{{ $slider->button_link_1 }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-bold text-sm transition shadow-2xl flex items-center justify-center gap-2 hover:scale-105 transform border border-red-500"
                               @if(str_contains($slider->button_link_1, 'http')) target="_blank" @endif>
                                <i class="fas fa-search text-base"></i> {{ $slider->button_text_1 }}
                            </a>
                            @endif
                            @if($slider->button_text_2 && $slider->button_link_2)
                            <a href="{{ $slider->button_link_2 }}" class="{{ str_contains($slider->button_link_2, 'whatsapp') ? 'bg-green-600 hover:bg-green-700' : 'bg-white hover:bg-gray-100 text-black' }} text-white px-6 py-3 rounded-lg font-bold text-sm transition shadow-2xl flex items-center justify-center gap-2 hover:scale-105 transform"
                               @if(str_contains($slider->button_link_2, 'http')) target="_blank" @endif>
                                <i class="{{ str_contains($slider->button_link_2, 'whatsapp') ? 'fab fa-whatsapp text-base' : 'fas fa-envelope text-base' }}"></i> {{ $slider->button_text_2 }}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <!-- Default Slide if no sliders -->
                <div class="slider-slide active relative">
                    <div class="absolute inset-0 z-0">
                        <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=1920&h=600&fit=crop" 
                             alt="Japanese Vehicles" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-red-900/50 to-black/60"></div>
                    </div>
                    <div class="relative z-10 text-center py-24 md:py-32 lg:py-40 px-4">
                        <h1 class="text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold mb-4 leading-tight drop-shadow-2xl">
                            Japanese Used Vehicles & Auto Parts Export
                        </h1>
                        <p class="text-base md:text-lg lg:text-xl mb-6 text-white max-w-4xl mx-auto drop-shadow-xl font-medium">
                            Sourcing Quality Japanese Vehicles and Genuine Parts Worldwide Since 2016
                        </p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Slider Controls -->
            <button id="prevSlide" class="absolute left-3 md:left-6 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-red-600/80 text-white p-3 md:p-4 rounded-full transition backdrop-blur-sm hover:scale-110 transform shadow-xl z-50 cursor-pointer border border-red-900">
                <i class="fas fa-chevron-left text-base md:text-lg"></i>
            </button>
            <button id="nextSlide" class="absolute right-3 md:right-6 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-red-600/80 text-white p-3 md:p-4 rounded-full transition backdrop-blur-sm hover:scale-110 transform shadow-xl z-50 cursor-pointer border border-red-900">
                <i class="fas fa-chevron-right text-base md:text-lg"></i>
            </button>

            <!-- Slider Indicators -->
            <div class="flex justify-center gap-2 mt-6">
                @php
                    $sliders = \App\Models\Slider::where('is_active', true)->orderBy('order')->get();
                @endphp
                @foreach($sliders as $index => $slider)
                <button class="slider-indicator {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}"></button>
                @endforeach
            </div>
        </div>

        <!-- Stats Bar -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-6 bg-black/40 backdrop-blur-lg rounded-xl p-4 border border-red-900/50">
            <div class="text-center">
                <div class="text-xl md:text-2xl font-bold text-red-500 mb-1">350+</div>
                <div class="text-xs text-gray-300">Vehicles in Stock</div>
            </div>
            <div class="text-center">
                <div class="text-xl md:text-2xl font-bold text-red-500 mb-1">10+</div>
                <div class="text-xs text-gray-300">Years Experience</div>
            </div>
            <div class="text-center">
                <div class="text-xl md:text-2xl font-bold text-red-500 mb-1">80+</div>
                <div class="text-xs text-gray-300">Japanese Brands</div>
            </div>
            <div class="text-center">
                <div class="text-xl md:text-2xl font-bold text-red-500 mb-1">100%</div>
                <div class="text-xs text-gray-300">Quality Guaranteed</div>
            </div>
        </div>
    </div>
</section>

<!-- Slider JavaScript -->
<style>
.slider-slide {
    display: none;
    animation: fadeIn 0.5s ease-in-out;
}
.slider-slide.active {
    display: block;
}
.slider-indicator {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(220, 38, 38, 0.4);
    border: 2px solid rgba(220, 38, 38, 0.6);
    cursor: pointer;
    transition: all 0.3s;
}
.slider-indicator.active {
    width: 32px;
    border-radius: 6px;
    background: rgba(220, 38, 38, 1);
    border-color: rgba(220, 38, 38, 1);
    box-shadow: 0 0 12px rgba(220, 38, 38, 0.8);
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slider-slide');
    const indicators = document.querySelectorAll('.slider-indicator');
    const nextBtn = document.getElementById('nextSlide');
    const prevBtn = document.getElementById('prevSlide');
    let currentSlide = 0;
    let autoplayInterval;

    // Check if slider exists
    if (slides.length === 0) {
        console.error('No slides found');
        return;
    }

    console.log('Slider initialized with', slides.length, 'slides');

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        if (indicators.length > 0) {
            indicators.forEach(indicator => indicator.classList.remove('active'));
        }
        
        if (slides[index]) {
            slides[index].classList.add('active');
        }
        if (indicators[index]) {
            indicators[index].classList.add('active');
        }
        currentSlide = index;
    }

    function nextSlide() {
        if (slides.length <= 1) return;
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
        console.log('Next slide:', currentSlide);
    }

    function prevSlide() {
        if (slides.length <= 1) return;
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
        console.log('Previous slide:', currentSlide);
    }

    // Auto-play slider (only if more than 1 slide)
    function startAutoplay() {
        if (slides.length <= 1) return;
        clearInterval(autoplayInterval);
        autoplayInterval = setInterval(nextSlide, 5000);
    }

    function stopAutoplay() {
        clearInterval(autoplayInterval);
    }

    // Event listeners
    if (nextBtn) {
        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Next button clicked');
            stopAutoplay();
            nextSlide();
            startAutoplay();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Previous button clicked');
            stopAutoplay();
            prevSlide();
            startAutoplay();
        });
    }

    if (indicators.length > 0) {
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Indicator clicked:', index);
                stopAutoplay();
                showSlide(index);
                startAutoplay();
            });
        });
    }

    // Start autoplay
    startAutoplay();

    // Pause on hover
    const sliderContainer = document.querySelector('.slider-container');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', stopAutoplay);
        sliderContainer.addEventListener('mouseleave', startAutoplay);
    }

    // Hide controls if only 1 slide
    if (slides.length <= 1) {
        if (nextBtn) nextBtn.style.display = 'none';
        if (prevBtn) prevBtn.style.display = 'none';
    }
});
</script>

<!-- Featured Brands Section -->
<section class="py-12 bg-white border-t border-gray-200 border-b border-gray-200">
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-red-600 mb-2">
                Featured Japanese Brands
            </h2>
            <p class="text-sm text-gray-600">
                We Deal with All Major Japanese Automotive Brands
            </p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <!-- Toyota -->
            <div class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-red-500 transition text-center group">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="https://logos-world.net/wp-content/uploads/2021/04/Toyota-Logo.png" alt="Toyota Logo" class="h-12 object-contain filter group-hover:scale-110 transition-transform" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-16 h-16 bg-red-600 rounded-lg flex items-center justify-center text-white font-bold text-lg" style="display:none;">TOY</div>
                </div>
                <div class="text-xs font-bold text-gray-800">TOYOTA</div>
            </div>
            <!-- Nissan -->
            <div class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-red-500 transition text-center group">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="https://logos-world.net/wp-content/uploads/2021/03/Nissan-Logo.png" alt="Nissan Logo" class="h-12 object-contain filter group-hover:scale-110 transition-transform" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-16 h-16 bg-red-700 rounded-lg flex items-center justify-center text-white font-bold text-lg" style="display:none;">NIS</div>
                </div>
                <div class="text-xs font-bold text-gray-800">NISSAN</div>
            </div>
            <!-- Honda -->
            <div class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-red-500 transition text-center group">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="https://logos-world.net/wp-content/uploads/2021/03/Honda-Logo.png" alt="Honda Logo" class="h-12 object-contain filter group-hover:scale-110 transition-transform" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-16 h-16 bg-red-500 rounded-lg flex items-center justify-center text-white font-bold text-lg" style="display:none;">HON</div>
                </div>
                <div class="text-xs font-bold text-gray-800">HONDA</div>
            </div>
            <!-- Mazda -->
            <div class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-red-500 transition text-center group">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="https://logos-world.net/wp-content/uploads/2021/03/Mazda-Logo.png" alt="Mazda Logo" class="h-12 object-contain filter group-hover:scale-110 transition-transform" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-16 h-16 bg-blue-700 rounded-lg flex items-center justify-center text-white font-bold text-lg" style="display:none;">MAZ</div>
                </div>
                <div class="text-xs font-bold text-gray-800">MAZDA</div>
            </div>
            <!-- Mitsubishi -->
            <div class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-red-500 transition text-center group">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="https://logos-world.net/wp-content/uploads/2021/03/Mitsubishi-Logo.png" alt="Mitsubishi Logo" class="h-12 object-contain filter group-hover:scale-110 transition-transform" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-16 h-16 bg-red-800 rounded-lg flex items-center justify-center text-white font-bold text-sm" style="display:none;">MIT</div>
                </div>
                <div class="text-xs font-bold text-gray-800">MITSUBISHI</div>
            </div>
            <!-- Suzuki -->
            <div class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-red-500 transition text-center group">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="https://logos-world.net/wp-content/uploads/2021/03/Suzuki-Logo.png" alt="Suzuki Logo" class="h-12 object-contain filter group-hover:scale-110 transition-transform" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-16 h-16 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-lg" style="display:none;">SUZ</div>
                </div>
                <div class="text-xs font-bold text-gray-800">SUZUKI</div>
            </div>
            <!-- Subaru -->
            <div class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-red-500 transition text-center group">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="https://logos-world.net/wp-content/uploads/2021/03/Subaru-Logo.png" alt="Subaru Logo" class="h-12 object-contain filter group-hover:scale-110 transition-transform" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-16 h-16 bg-blue-700 rounded-lg flex items-center justify-center text-white font-bold text-lg" style="display:none;">SUB</div>
                </div>
                <div class="text-xs font-bold text-gray-800">SUBARU</div>
            </div>
            <!-- Isuzu -->
            <div class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-red-500 transition text-center group">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="https://logos-world.net/wp-content/uploads/2021/04/Isuzu-Logo.png" alt="Isuzu Logo" class="h-12 object-contain filter group-hover:scale-110 transition-transform" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-16 h-16 bg-red-600 rounded-lg flex items-center justify-center text-white font-bold text-lg" style="display:none;">ISU</div>
                </div>
                <div class="text-xs font-bold text-gray-800">ISUZU</div>
            </div>
            <!-- Daihatsu -->
            <div class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-red-500 transition text-center group">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="https://logos-world.net/wp-content/uploads/2021/04/Daihatsu-Logo.png" alt="Daihatsu Logo" class="h-12 object-contain filter group-hover:scale-110 transition-transform" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-16 h-16 bg-gray-700 rounded-lg flex items-center justify-center text-white font-bold text-sm" style="display:none;">DAI</div>
                </div>
                <div class="text-xs font-bold text-gray-800">DAIHATSU</div>
            </div>
            <!-- Lexus -->
            <div class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-red-500 transition text-center group">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="https://logos-world.net/wp-content/uploads/2021/03/Lexus-Logo.png" alt="Lexus Logo" class="h-12 object-contain filter group-hover:scale-110 transition-transform" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-16 h-16 bg-black rounded-lg flex items-center justify-center text-white font-bold text-lg" style="display:none;">LEX</div>
                </div>
                <div class="text-xs font-bold text-gray-800">LEXUS</div>
            </div>
            <!-- Hino -->
            <div class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-red-500 transition text-center group">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="https://logos-world.net/wp-content/uploads/2021/04/Hino-Logo.png" alt="Hino Logo" class="h-12 object-contain filter group-hover:scale-110 transition-transform" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-16 h-16 bg-blue-700 rounded-lg flex items-center justify-center text-white font-bold text-lg" style="display:none;">HIN</div>
                </div>
                <div class="text-xs font-bold text-gray-800">HINO</div>
            </div>
            <!-- More -->
            <div class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-red-500 transition text-center group">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-lg flex items-center justify-center text-white font-bold text-2xl">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
                <div class="text-xs font-bold text-gray-600">& 70+ More</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="py-12 bg-gray-50">
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-red-500 mb-2">
                <i class="fas fa-star text-red-500 mr-2"></i>
                Featured Products
            </h2>
            <p class="text-sm text-gray-400">
                Browse Our Latest Vehicles & Auto Parts from Japan
            </p>
        </div>

        <!-- Search and Products Layout -->
        <div class="flex flex-col lg:flex-row gap-6 mb-8">
            <!-- Left Sidebar - Search & Filters -->
            <aside class="w-full lg:w-80 flex-shrink-0">
                <div class="bg-white border border-gray-200 rounded-xl shadow-xl p-5 sticky top-4">
                    <!-- Search Bar -->
                    <div class="mb-5">
                        <label class="block text-xs font-semibold text-red-600 mb-2">
                            <i class="fas fa-search mr-1.5 text-red-500 text-xs"></i>Search Products
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   id="searchInput" 
                                   placeholder="Search products..." 
                                   class="w-full px-3 py-2 pl-10 text-sm bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-900 placeholder-gray-400"
                                   onkeyup="applyFilters()">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-xs"></i>
                            <button onclick="clearSearch()" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-red-600 transition">
                                <i class="fas fa-times-circle text-xs"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Filters Section -->
                    <div class="space-y-4">
                        <h3 class="text-xs font-bold text-red-600 uppercase tracking-wider border-b border-gray-200 pb-2">
                            <i class="fas fa-filter mr-1.5 text-red-500 text-xs"></i>Filters
                        </h3>

                        <!-- Brand Filter -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5">
                                <i class="fas fa-car mr-1.5 text-xs"></i>Brand
                            </label>
                            <select id="brandFilter" class="w-full px-3 py-2 text-xs bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-900" onchange="applyFilters()">
                                <option value="">All Brands</option>
                                <option value="TOYOTA">TOYOTA</option>
                                <option value="NISSAN">NISSAN</option>
                                <option value="HONDA">HONDA</option>
                                <option value="MAZDA">MAZDA</option>
                                <option value="MITSUBISHI">MITSUBISHI</option>
                                <option value="SUZUKI">SUZUKI</option>
                                <option value="SUBARU">SUBARU</option>
                                <option value="ISUZU">ISUZU</option>
                                <option value="LEXUS">LEXUS</option>
                                <option value="DAIHATSU">DAIHATSU</option>
                            </select>
                        </div>

                        <!-- Category Filter -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5">
                                <i class="fas fa-th-large mr-1.5 text-xs"></i>Category
                            </label>
                            <select id="categoryFilter" class="w-full px-3 py-2 text-xs bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-900" onchange="applyFilters()">
                                <option value="">All Categories</option>
                                <option value="Vehicles">Vehicles</option>
                                <option value="Parts">Parts</option>
                                <option value="Engines">Engines</option>
                                <option value="Transmissions">Transmissions</option>
                                <option value="Body Parts">Body Parts</option>
                                <option value="Interior">Interior</option>
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5">
                                <i class="fas fa-dollar-sign mr-1.5 text-xs"></i>Price Range
                            </label>
                            <select id="priceFilter" class="w-full px-3 py-2 text-xs bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-900" onchange="applyFilters()">
                                <option value="">All Prices</option>
                                <option value="0-500">Under $500</option>
                                <option value="500-1000">$500 - $1,000</option>
                                <option value="1000-2000">$1,000 - $2,000</option>
                                <option value="2000-5000">$2,000 - $5,000</option>
                                <option value="5000+">$5,000+</option>
                            </select>
                        </div>

                        <!-- Reset Button -->
                        <button onclick="clearAllFilters()" class="w-full bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg font-semibold transition shadow-lg flex items-center justify-center gap-1.5 text-xs border border-red-700">
                            <i class="fas fa-redo text-xs"></i> Reset Filters
                        </button>

                        <!-- Active Filters Display -->
                        <div id="activeFilters" class="pt-3 border-t border-gray-200"></div>
                    </div>
                </div>
            </aside>

            <!-- Main Content Area - Products Grid -->
            <div class="flex-1">
                <div id="productsGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @php
                $featuredProducts = \App\Models\Product::where('is_available', true)->latest()->take(10)->get();
            @endphp
            
            @forelse($featuredProducts as $product)
            <div class="product-card bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden hover:shadow-xl hover:border-red-500 transition-all group" 
                 data-brand="{{ $product->brand }}" 
                 data-category="{{ $product->category }}" 
                 data-price="{{ $product->price ?? 0 }}"
                 data-name="{{ strtolower($product->name) }}"
                 data-model="{{ strtolower($product->model ?? '') }}"
                 data-partnumber="{{ strtolower($product->part_number ?? '') }}">
                <a href="{{ route('products.show', $product->hashid) }}">
                    <div class="relative overflow-hidden h-32">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        @if($product->video)
                        <div class="absolute top-1.5 right-1.5 bg-red-600 text-white px-1.5 py-0.5 rounded-full text-xs font-bold flex items-center gap-0.5 shadow-lg">
                            <i class="fas fa-video text-xs"></i>
                        </div>
                        @endif
                        <div class="absolute top-1.5 left-1.5 bg-red-600 text-white px-1.5 py-0.5 rounded-full text-xs font-bold shadow-lg">
                            {{ $product->brand }}
                        </div>
                    </div>
                </a>
                <div class="p-2.5">
                    <div class="mb-1">
                        <span class="text-xs font-semibold text-gray-500">{{ $product->category }}</span>
                    </div>
                    <h3 class="font-bold text-xs mb-1.5 line-clamp-2 hover:text-red-600 transition">
                        <a href="{{ route('products.show', $product->hashid) }}">{{ $product->name }}</a>
                    </h3>
                    <div class="mb-1.5">
                        @if($product->price)
                        <span class="text-sm font-bold text-red-600">${{ number_format($product->price, 2) }}</span>
                        @else
                        <span class="text-xs text-gray-500 font-semibold">Price on Request</span>
                        @endif
                    </div>
                    <a href="{{ route('products.show', $product->hashid) }}" 
                       class="block w-full bg-red-600 hover:bg-red-700 text-white text-center px-2 py-1.5 rounded-lg font-semibold transition text-xs border border-red-700">
                        <i class="fas fa-eye mr-1 text-xs"></i>View
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-2 sm:col-span-3 md:col-span-4 lg:col-span-5 text-center py-10">
                <i class="fas fa-box-open text-gray-400 text-4xl mb-3"></i>
                <p class="text-gray-600 text-sm">No products available</p>
            </div>
            @endforelse
                </div>
            </div>
        </div>

        <!-- View All Button -->
        <div class="text-center mt-8">
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-bold text-sm border border-red-700 transition shadow-lg hover:shadow-xl">
                <i class="fas fa-th text-xs"></i> <span>View All Products</span>
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</section>

<!-- JavaScript for Search and Filters -->
<script>
function applyFilters() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const brand = document.getElementById('brandFilter').value.toUpperCase();
    const category = document.getElementById('categoryFilter').value;
    const priceRange = document.getElementById('priceFilter').value;
    
    const products = document.querySelectorAll('.product-card');
    let visibleCount = 0;
    
    products.forEach(product => {
        const productBrand = product.getAttribute('data-brand').toUpperCase();
        const productCategory = product.getAttribute('data-category');
        const productPrice = parseFloat(product.getAttribute('data-price'));
        const productName = product.getAttribute('data-name');
        const productModel = product.getAttribute('data-model');
        const productPartNumber = product.getAttribute('data-partnumber');
        
        let showProduct = true;
        
        // Search filter
        if (searchTerm) {
            const searchMatch = productName.includes(searchTerm) || 
                              productBrand.toLowerCase().includes(searchTerm) ||
                              productModel.includes(searchTerm) ||
                              productPartNumber.includes(searchTerm);
            if (!searchMatch) {
                showProduct = false;
            }
        }
        
        // Brand filter
        if (brand && productBrand !== brand) {
            showProduct = false;
        }
        
        // Category filter
        if (category && productCategory !== category) {
            showProduct = false;
        }
        
        // Price filter
        if (priceRange) {
            if (priceRange === '0-500' && productPrice > 500) showProduct = false;
            if (priceRange === '500-1000' && (productPrice < 500 || productPrice > 1000)) showProduct = false;
            if (priceRange === '1000-2000' && (productPrice < 1000 || productPrice > 2000)) showProduct = false;
            if (priceRange === '2000-5000' && (productPrice < 2000 || productPrice > 5000)) showProduct = false;
            if (priceRange === '5000+' && productPrice < 5000) showProduct = false;
        }
        
        if (showProduct) {
            product.style.display = 'block';
            visibleCount++;
        } else {
            product.style.display = 'none';
        }
    });
    
    // Update active filters display
    updateActiveFilters(searchTerm, brand, category, priceRange, visibleCount);
}

function updateActiveFilters(search, brand, category, price, count) {
    const container = document.getElementById('activeFilters');
    let html = '';
    
    if (search || brand || category || price) {
        html = '<h4 class="text-xs font-bold text-red-600 uppercase mb-2">Active Filters</h4>';
        html += '<div class="flex flex-col gap-2">';
        
        if (search) {
            html += `<span class="bg-red-100 text-red-700 border border-red-300 px-2.5 py-1 rounded-full text-xs font-semibold flex items-center justify-between">
                <span class="flex items-center gap-1.5">
                    <i class="fas fa-search text-xs"></i> "${search}"
                </span>
                <button onclick="clearSearch()" class="hover:text-red-900"><i class="fas fa-times text-xs"></i></button>
            </span>`;
        }
        if (brand) {
            html += `<span class="bg-red-100 text-red-700 border border-red-300 px-2.5 py-1 rounded-full text-xs font-semibold">
                <i class="fas fa-car mr-1 text-xs"></i> ${brand}
            </span>`;
        }
        if (category) {
            html += `<span class="bg-red-100 text-red-700 border border-red-300 px-2.5 py-1 rounded-full text-xs font-semibold">
                <i class="fas fa-th-large mr-1 text-xs"></i> ${category}
            </span>`;
        }
        if (price) {
            const priceLabels = {
                '0-500': 'Under $500',
                '500-1000': '$500 - $1,000',
                '1000-2000': '$1,000 - $2,000',
                '2000-5000': '$2,000 - $5,000',
                '5000+': '$5,000+'
            };
            html += `<span class="bg-red-100 text-red-700 border border-red-300 px-2.5 py-1 rounded-full text-xs font-semibold">
                <i class="fas fa-dollar-sign mr-1 text-xs"></i> ${priceLabels[price]}
            </span>`;
        }
        
        html += `<span class="bg-gray-100 text-gray-700 border border-gray-300 px-2.5 py-1 rounded-full text-xs font-semibold text-center">
            <i class="fas fa-box mr-1 text-xs"></i> ${count} Found
        </span>`;
        html += '</div>';
        
        container.innerHTML = html;
        container.classList.remove('hidden');
    } else {
        container.innerHTML = '';
        container.classList.add('hidden');
    }
}

function clearSearch() {
    document.getElementById('searchInput').value = '';
    applyFilters();
}

function clearAllFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('brandFilter').value = '';
    document.getElementById('categoryFilter').value = '';
    document.getElementById('priceFilter').value = '';
    applyFilters();
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    applyFilters();
});
</script>

<!-- CTA Section -->
<section class="relative bg-gradient-to-br from-black via-red-900 to-black text-white py-12 overflow-hidden border-t border-red-900">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    <div class="w-full px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">
            Ready to Source Japanese Quality?
        </h2>
        <p class="text-sm md:text-base mb-6 text-gray-300">
            Get genuine Japanese vehicles and auto parts exported directly to your destination
        </p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 bg-white text-black px-6 py-3 rounded-lg font-bold text-sm hover:bg-gray-100 transition shadow-2xl border border-gray-300">
                <i class="fas fa-envelope text-xs"></i> <span>Request Quote</span>
            </a>
            <a href="https://wa.me/819048043444" target="_blank" class="inline-flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-bold text-sm transition shadow-2xl border border-green-700">
                <i class="fab fa-whatsapp text-base"></i> <span>WhatsApp Us</span>
            </a>
        </div>
        <p class="mt-6 text-gray-400 text-xs">
            <i class="fas fa-shield-alt mr-1.5"></i> 10+ Years of Trusted Service | 100% Genuine Parts | Worldwide Delivery
        </p>
    </div>
</section>
@endsection


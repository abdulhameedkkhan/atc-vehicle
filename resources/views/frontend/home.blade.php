@extends('layouts.app')

@section('title', 'Home - ATC Japan | Japanese Used Vehicles & Auto Parts Export')

@section('content')
<!-- Hero Slider Section -->
<section class="relative text-white overflow-hidden m-0 p-0 border-none">
    <!-- Slider Container -->
    <div class="relative w-full m-0 p-0">
        <!-- Slider Wrapper -->
        <div class="slider-container overflow-hidden relative w-full">
            @php
                $sliders = \App\Models\Slider::where('is_active', true)->orderBy('order')->get();
            @endphp

            @forelse($sliders as $index => $slider)
            <!-- Slide {{ $index + 1 }} -->
            <div class="slider-slide {{ $index === 0 ? 'active' : '' }} relative w-full">
                <!-- Background Image -->
                <div class="absolute inset-0 z-0 h-full w-full">
                    <img src="{{ $slider->image_url }}" 
                         alt="{{ $slider->title }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-[#1e3a8a]/60 to-black/70"></div>
                </div>
                <!-- Content -->
                <div class="relative z-10 text-center pt-32 pb-16 md:pt-48 md:pb-20 lg:pt-64 lg:pb-24 xl:pt-72 xl:pb-28 px-4 w-full">
                        <h1 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold mb-4 leading-tight drop-shadow-2xl">
                            {{ $slider->title }}
                        </h1>
                        <p class="text-sm md:text-base lg:text-lg mb-6 text-white max-w-4xl mx-auto drop-shadow-xl font-medium">
                            {{ $slider->description }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3 justify-center">
                            @if($slider->button_text_1 && $slider->button_link_1)
                            <a href="{{ $slider->button_link_1 }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-bold text-sm transition shadow-2xl flex items-center justify-center gap-2 hover:scale-105 transform border border-blue-500"
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
                        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-[#1e3a8a]/60 to-black/70"></div>
                    </div>
                    <div class="relative z-10 text-center pt-32 pb-16 md:pt-48 md:pb-20 lg:pt-64 lg:pb-24 xl:pt-72 xl:pb-28 px-4">
                        <h1 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold mb-4 leading-tight drop-shadow-2xl">
                            Japanese Used Vehicles & Auto Parts Export
                        </h1>
                        <p class="text-sm md:text-base lg:text-lg mb-6 text-white max-w-4xl mx-auto drop-shadow-xl font-medium">
                            Sourcing Quality Japanese Vehicles and Genuine Parts Worldwide Since 2016
                        </p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Slider Controls -->
            <button id="prevSlide" class="absolute left-3 md:left-6 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-blue-600/80 text-white p-3 md:p-4 rounded-full transition backdrop-blur-sm hover:scale-110 transform shadow-xl z-50 cursor-pointer border border-blue-900">
                <i class="fas fa-chevron-left text-base md:text-lg"></i>
            </button>
            <button id="nextSlide" class="absolute right-3 md:right-6 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-blue-600/80 text-white p-3 md:p-4 rounded-full transition backdrop-blur-sm hover:scale-110 transform shadow-xl z-50 cursor-pointer border border-blue-900">
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
    background: rgba(37, 99, 235, 0.4);
    border: 2px solid rgba(37, 99, 235, 0.6);
    cursor: pointer;
    transition: all 0.3s;
}
.slider-indicator.active {
    width: 32px;
    border-radius: 6px;
    background: rgba(37, 99, 235, 1);
    border-color: rgba(37, 99, 235, 1);
    box-shadow: 0 0 12px rgba(37, 99, 235, 0.8);
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

    if (slides.length === 0) return;

    function showSlide(index) {
        if (index >= slides.length) index = 0;
        if (index < 0) index = slides.length - 1;

        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(indicator => indicator.classList.remove('active'));
        
        slides[index].classList.add('active');
        if (indicators[index]) {
            indicators[index].classList.add('active');
        }
        currentSlide = index;
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    function startAutoplay() {
        stopAutoplay();
        if (slides.length > 1) {
            autoplayInterval = setInterval(nextSlide, 5000);
        }
    }

    function stopAutoplay() {
        if (autoplayInterval) {
            clearInterval(autoplayInterval);
        }
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            stopAutoplay();
            nextSlide();
            startAutoplay();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            stopAutoplay();
            prevSlide();
            startAutoplay();
        });
    }

    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', function() {
            stopAutoplay();
            showSlide(index);
            startAutoplay();
        });
    });

    // Pause on hover
    const container = document.querySelector('.slider-container');
    if (container) {
        container.addEventListener('mouseenter', stopAutoplay);
        container.addEventListener('mouseleave', startAutoplay);
    }

    // Initial start
    startAutoplay();
});
</script>

<!-- Featured Brands Section -->
<section class="py-12 bg-white border-t border-gray-200 border-b border-gray-200">
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-blue-600 mb-2">
                Featured Japanese Brands
            </h2>
            <p class="text-sm text-gray-600">
                We Deal with All Major Japanese Automotive Brands
            </p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <!-- Toyota -->
            <button type="button" 
                    onclick="scrollToProducts(); Livewire.dispatch('filter-brand', { brand: 'TOYOTA' })"
                    class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-blue-500 transition text-center group w-full">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="{{ asset('images/brands/toyota.png') }}" alt="Toyota Logo" class="h-12 w-full object-contain filter group-hover:scale-110 transition-transform" onerror="this.src='https://logos-world.net/wp-content/uploads/2021/04/Toyota-Logo.png'">
                </div>
                <div class="text-xs font-bold text-gray-800 uppercase">TOYOTA</div>
            </button>
            <!-- Nissan -->
            <button type="button" 
                    onclick="scrollToProducts(); Livewire.dispatch('filter-brand', { brand: 'NISSAN' })"
                    class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-blue-500 transition text-center group w-full">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="{{ asset('images/brands/nissan.png') }}" alt="Nissan Logo" class="h-12 w-full object-contain filter group-hover:scale-110 transition-transform" onerror="this.src='https://logos-world.net/wp-content/uploads/2021/03/Nissan-Logo.png'">
                </div>
                <div class="text-xs font-bold text-gray-800 uppercase">NISSAN</div>
            </button>
            <!-- Honda -->
            <button type="button" 
                    onclick="scrollToProducts(); Livewire.dispatch('filter-brand', { brand: 'HONDA' })"
                    class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-blue-500 transition text-center group w-full">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="{{ asset('images/brands/honda.png') }}" alt="Honda Logo" class="h-12 w-full object-contain filter group-hover:scale-110 transition-transform" onerror="this.src='https://logos-world.net/wp-content/uploads/2021/03/Honda-Logo.png'">
                </div>
                <div class="text-xs font-bold text-gray-800 uppercase">HONDA</div>
            </button>
            <!-- Mazda -->
            <button type="button" 
                    onclick="scrollToProducts(); Livewire.dispatch('filter-brand', { brand: 'MAZDA' })"
                    class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-blue-500 transition text-center group w-full">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="{{ asset('images/brands/mazda.png') }}" alt="Mazda Logo" class="h-12 w-full object-contain filter group-hover:scale-110 transition-transform" onerror="this.src='https://logos-world.net/wp-content/uploads/2021/03/Mazda-Logo.png'">
                </div>
                <div class="text-xs font-bold text-gray-800 uppercase">MAZDA</div>
            </button>
            <!-- Mitsubishi -->
            <button type="button" 
                    onclick="scrollToProducts(); Livewire.dispatch('filter-brand', { brand: 'MITSUBISHI' })"
                    class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-blue-500 transition text-center group w-full">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="{{ asset('images/brands/mitsubishi.png') }}" alt="Mitsubishi Logo" class="h-12 w-full object-contain filter group-hover:scale-110 transition-transform" onerror="this.src='https://logos-world.net/wp-content/uploads/2021/03/Mitsubishi-Logo.png'">
                </div>
                <div class="text-xs font-bold text-gray-800 uppercase">MITSUBISHI</div>
            </button>
            <!-- Suzuki -->
            <button type="button" 
                    onclick="scrollToProducts(); Livewire.dispatch('filter-brand', { brand: 'SUZUKI' })"
                    class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-blue-500 transition text-center group w-full">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="{{ asset('images/brands/suzuki.png') }}" alt="Suzuki Logo" class="h-12 w-full object-contain filter group-hover:scale-110 transition-transform" onerror="this.src='https://logos-world.net/wp-content/uploads/2021/03/Suzuki-Logo.png'">
                </div>
                <div class="text-xs font-bold text-gray-800 uppercase">SUZUKI</div>
            </button>
            <!-- Subaru -->
            <button type="button" 
                    onclick="scrollToProducts(); Livewire.dispatch('filter-brand', { brand: 'SUBARU' })"
                    class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-blue-500 transition text-center group w-full">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="{{ asset('images/brands/subaru.png') }}" alt="Subaru Logo" class="h-12 w-full object-contain filter group-hover:scale-110 transition-transform" onerror="this.src='https://logos-world.net/wp-content/uploads/2021/03/Subaru-Logo.png'">
                </div>
                <div class="text-xs font-bold text-gray-800 uppercase">SUBARU</div>
            </button>
            <!-- Isuzu -->
            <button type="button" 
                    onclick="scrollToProducts(); Livewire.dispatch('filter-brand', { brand: 'ISUZU' })"
                    class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-blue-500 transition text-center group w-full">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="{{ asset('images/brands/isuzu.png') }}" alt="Isuzu Logo" class="h-12 w-full object-contain filter group-hover:scale-110 transition-transform" onerror="this.src='https://logos-world.net/wp-content/uploads/2021/04/Isuzu-Logo.png'">
                </div>
                <div class="text-xs font-bold text-gray-800 uppercase">ISUZU</div>
            </button>
            <!-- Daihatsu -->
            <button type="button" 
                    onclick="scrollToProducts(); Livewire.dispatch('filter-brand', { brand: 'DAIHATSU' })"
                    class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-blue-500 transition text-center group w-full">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="{{ asset('images/brands/daihatsu.png') }}" alt="Daihatsu Logo" class="h-12 w-full object-contain filter group-hover:scale-110 transition-transform" onerror="this.src='https://logos-world.net/wp-content/uploads/2021/04/Daihatsu-Logo.png'">
                </div>
                <div class="text-xs font-bold text-gray-800 uppercase">DAIHATSU</div>
            </button>
            <!-- Lexus -->
            <button type="button" 
                    onclick="scrollToProducts(); Livewire.dispatch('filter-brand', { brand: 'LEXUS' })"
                    class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-blue-500 transition text-center group w-full">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="{{ asset('images/brands/lexus.png') }}" alt="Lexus Logo" class="h-12 w-full object-contain filter group-hover:scale-110 transition-transform" onerror="this.src='https://logos-world.net/wp-content/uploads/2021/03/Lexus-Logo.png'">
                </div>
                <div class="text-xs font-bold text-gray-800 uppercase">LEXUS</div>
            </button>
            <!-- Hino -->
            <button type="button" 
                    onclick="scrollToProducts(); Livewire.dispatch('filter-brand', { brand: 'HINO' })"
                    class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-blue-500 transition text-center group w-full">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <img src="{{ asset('images/brands/hino.png') }}" alt="Hino Logo" class="h-12 w-full object-contain filter group-hover:scale-110 transition-transform" onerror="this.src='https://logos-world.net/wp-content/uploads/2021/04/Hino-Logo.png'">
                </div>
                <div class="text-xs font-bold text-gray-800 uppercase">HINO</div>
            </button>
            <!-- More -->
            <a href="{{ route('products.index') }}" class="bg-white border-2 border-gray-200 p-4 rounded-lg shadow-md hover:shadow-xl hover:border-blue-500 transition text-center group">
                <div class="mb-2 flex justify-center h-16 items-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-purple-800 rounded-lg flex items-center justify-center text-white font-bold text-2xl">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
                <div class="text-xs font-bold text-gray-600">& 70+ More</div>
            </a>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section id="products-section" class="py-12 bg-gray-50">
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-blue-600 mb-2">
                <i class="fas fa-star text-blue-500 mr-2"></i>
                Featured Products
            </h2>
            <p class="text-sm text-gray-400">
                Browse Our Latest Vehicles & Auto Parts from Japan
            </p>
        </div>

        @livewire('product-list')
    </div>
</section>

<script>
function scrollToProducts() {
    const el = document.getElementById('products-section');
    if (el) {
        el.scrollIntoView({ behavior: 'smooth' });
    }
}
</script>

<!-- CTA Section -->
<section class="relative bg-gradient-to-br from-black via-blue-900 to-black text-white py-12 overflow-hidden border-t border-blue-900">
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


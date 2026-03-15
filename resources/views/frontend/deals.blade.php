@extends('layouts.app')

@section('title', 'Special Deals - ATC Japan')

@section('content')

<!-- Hero Banner Zone -->
<div class="relative py-16 lg:py-24 overflow-hidden shadow-2xl group bg-[#1e3a8a]">
    <!-- Background Cover Image -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=1920" 
             alt="Deals Cover" 
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 ease-out opacity-80">
    </div>

    <!-- Gorgeous Deep Blue Overlay Gradient -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#1e3a8a] via-[#1e3a8a]/80 to-transparent mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#1e3a8a] via-transparent to-[#1e3a8a]/50"></div>

    <!-- Abstract pattern / decorations -->
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <svg class="absolute left-0 top-0 h-full w-full" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon fill="white" points="0,100 100,0 100,100" />
        </svg>
    </div>
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 rounded-full bg-gradient-to-br from-indigo-500 to-purple-400 opacity-40 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-gradient-to-tr from-cyan-400 to-blue-500 opacity-40 blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8">
            <div class="max-w-2xl">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-600/20 text-red-50 text-sm font-bold border border-red-500/30 shadow-sm backdrop-blur-md mb-4 uppercase tracking-wider">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                    </span>
                    Live Now
                </span>
                <h1 class="text-4xl md:text-6xl font-black tracking-tight text-white mb-4 drop-shadow-md">
                    Special <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-300 to-blue-200">Deals</span>
                </h1>
                <p class="text-base md:text-xl text-blue-100 max-w-2xl leading-relaxed">
                    Grab incredible discounts on premium vehicles and parts. These offers are strictly time-limited, so don't miss out!
                </p>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4 hidden md:flex">
                <a href="{{ route('products.index') }}" class="inline-flex justify-center items-center gap-2 px-6 py-3 rounded-full bg-white hover:bg-gray-50 text-[#1e3a8a] font-bold shadow-xl transition-all hover:scale-105 border border-white">
                    <i class="fas fa-car-side"></i> All Vehicles
                </a>
                <a href="{{ route('car-parts.index') }}" class="inline-flex justify-center items-center gap-2 px-6 py-3 rounded-full bg-transparent hover:bg-white/10 text-white font-bold shadow-lg border-2 border-white/50 transition-all hover:scale-105">
                    <i class="fas fa-cog text-cyan-300"></i> All Parts
                </a>
            </div>
        </div>
    </div>
</div>

<section class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-20">
        
        <!-- Deals content -->
        <div class="space-y-16">
            <!-- Vehicle Deals -->
            <div class="relative bg-white p-6 sm:p-10 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 pb-12">
                <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-100">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center text-white shadow-lg shadow-blue-500/30">
                            <i class="fas fa-car-side"></i>
                        </div>
                        Vehicle Deals
                    </h2>
                    @if($dealProducts->count())
                        <span class="text-sm font-bold px-4 py-2 rounded-full bg-blue-50 text-blue-700 border border-blue-100 shadow-sm">
                            {{ $dealProducts->count() }} Offers Available
                        </span>
                    @endif
                </div>

                @if($dealProducts->isEmpty())
                    <div class="bg-gray-50 border border-dashed border-gray-200 rounded-2xl p-12 text-center text-gray-500">
                        <i class="fas fa-car-crash text-5xl mb-4 text-gray-300"></i>
                        <p class="font-bold text-xl text-gray-700">No vehicle deals are active right now.</p>
                        <p class="text-sm mt-2">Please check back later for exciting offers.</p>
                    </div>
                @else
                    @livewire('deals-slider', ['type' => 'vehicle'])
                @endif
            </div>

            <!-- Car Parts Deals -->
            <div class="relative bg-white p-6 sm:p-10 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 pb-12">
                <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-100">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-teal-500 to-teal-700 flex items-center justify-center text-white shadow-lg shadow-teal-500/30">
                            <i class="fas fa-cogs"></i>
                        </div>
                        Car Parts Deals
                    </h2>
                    @if($dealCarParts->count())
                        <span class="text-sm font-bold px-4 py-2 rounded-full bg-teal-50 text-teal-700 border border-teal-100 shadow-sm">
                            {{ $dealCarParts->count() }} Offers Available
                        </span>
                    @endif
                </div>

                @if($dealCarParts->isEmpty())
                    <div class="bg-gray-50 border border-dashed border-gray-200 rounded-2xl p-12 text-center text-gray-500">
                        <i class="fas fa-tools text-5xl mb-4 text-gray-300"></i>
                        <p class="font-bold text-xl text-gray-700">No car part deals are active right now.</p>
                        <p class="text-sm mt-2">Please check back later for amazing discounts.</p>
                    </div>
                @else
                    @livewire('deals-slider', ['type' => 'part'])
                @endif
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countDownElements = document.querySelectorAll('.deal-countdown');
        
        function updateCountdowns() {
            const now = new Date().getTime();
            
            countDownElements.forEach(el => {
                const endsAtStr = el.getAttribute('data-ends-at');
                if (!endsAtStr) return;
                
                const countDownDate = new Date(endsAtStr).getTime();
                const distance = countDownDate - now;
                
                if (distance < 0) {
                    el.innerHTML = "Deal Ended";
                    el.classList.replace('text-amber-700', 'text-red-600');
                    return;
                }
                
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                let text = "";
                if (days > 0) text += days + "d ";
                text += String(hours).padStart(2, '0') + "h ";
                text += String(minutes).padStart(2, '0') + "m ";
                text += String(seconds).padStart(2, '0') + "s";
                
                el.innerHTML = text;
            });
        };
        
        // Define it globally so our Livewire component can call it
        window.updateCountdowns = updateCountdowns;
        
        // First run
        updateCountdowns();
        
        // Timer
        setInterval(updateCountdowns, 1000);
    });
</script>
@endpush

@endsection

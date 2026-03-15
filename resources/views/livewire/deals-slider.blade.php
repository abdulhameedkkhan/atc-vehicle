<div class="relative">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 relative transition-all duration-500 pb-16">
        @foreach($items as $item)
            @php
                $dealEnds = $item->deal_ends_at;
                $isVehicle = $type === 'vehicle';
                $hashid = $item->hashid;
                $route = $isVehicle ? route('products.show', $hashid) : route('car-parts.show', $hashid);
                $brand = $item->brand ?? '';
                $name = $item->name ?? '';
                $model = $item->model ?? '';
                $category = $item->category ?? '';
                $price = $item->price;
                $stock = $item->stock_quantity ?? 0;
                $imageUrl = $item->image_url;
                $hasVideo = $item->video ? true : false;
                
                $themeColor = $isVehicle ? 'blue' : 'teal';
                $themeColorHex = $isVehicle ? '#1e3a8a' : '#0f766e';
                $icon = $isVehicle ? 'fa-car-side' : 'fa-cogs';
            @endphp
            <div class="bg-white rounded-2xl shadow hover:shadow-2xl transition-all duration-300 group border border-gray-100 overflow-hidden flex flex-col h-full transform hover:-translate-y-2">
                <a href="{{ $route }}" class="block relative overflow-hidden h-56 {{ !$isVehicle ? 'bg-gray-50 flex items-center justify-center p-4' : '' }}">
                    <img src="{{ $imageUrl }}" alt="{{ $name }}"
                         class="w-full h-full {{ $isVehicle ? 'object-cover' : 'object-contain mix-blend-multiply' }} group-hover:scale-110 transition-transform duration-500 ease-in-out">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 {{ !$isVehicle ? 'pointer-events-none' : '' }}"></div>

                    <!-- Brand Badge -->
                    @if($brand)
                    <div class="absolute top-3 left-3 bg-white/90 backdrop-blur text-{{ $themeColor }}-800 px-3 py-1 rounded-lg text-xs font-black shadow-md uppercase tracking-wider">
                        {{ $brand }}
                    </div>
                    @endif

                    <!-- Deal Badge with Pulse -->
                    <div class="absolute bottom-3 left-3 bg-gradient-to-r from-red-600 to-{{ $isVehicle ? 'amber' : 'orange' }}-500 text-white px-3 py-1.5 rounded-lg text-xs font-black shadow-lg flex items-center gap-1.5 uppercase tracking-widest border border-white/20">
                        <i class="fas fa-bolt animate-pulse text-yellow-300"></i> Hot Deal
                    </div>

                    @if($hasVideo)
                    <div class="absolute top-3 right-3 bg-red-600/90 backdrop-blur-md text-white px-2 py-1 rounded text-xs font-bold shadow-md flex items-center gap-1">
                        <i class="fas fa-play"></i>
                    </div>
                    @endif
                </a>
                
                <div class="p-5 flex flex-col flex-grow">
                    <!-- Category & Deal time -->
                    <div class="flex items-center justify-between mb-3 border-b border-gray-100 pb-3">
                        <div class="flex items-center gap-1.5 text-xs font-bold text-{{ $themeColor }}-700 bg-{{ $themeColor }}-50 px-2 py-1 rounded-md">
                            <i class="fas {{ $icon }}"></i>
                            <span>{{ $category }}</span>
                        </div>
                        @if($dealEnds)
                        <div class="flex items-center gap-1.5 text-xs font-bold text-red-600 bg-red-50 px-2 py-1 rounded-md border border-red-100">
                            <i class="fas fa-stopwatch opacity-75"></i>
                            <span class="deal-countdown tabular-nums tracking-tighter" data-ends-at="{{ $dealEnds->toIso8601String() }}">...</span>
                        </div>
                        @endif
                    </div>

                    <!-- Name -->
                    <h3 class="font-bold text-lg mb-1.5 line-clamp-2 text-gray-900 group-hover:text-{{ $themeColor }}-600 transition-colors leading-tight">
                        {{ $name }}
                    </h3>
                    
                    @if($model)
                    <p class="text-gray-500 text-xs font-medium flex items-center mb-4">
                        <i class="fas fa-car-side mr-1.5 text-{{ $themeColor }}-400"></i> {{ $model }}
                    </p>
                    @endif

                    <div class="mt-auto">
                        <!-- Price -->
                        <div class="mb-4">
                            @if($price)
                            <div class="flex items-end gap-1.5 text-gray-900">
                                <span class="text-xs font-bold uppercase text-gray-400 mb-0.5">Price</span>
                                <p class="font-black text-2xl text-[{{ $themeColorHex }}] leading-none">${{ number_format($price, 2) }}</p>
                            </div>
                            @else
                            <p class="text-gray-600 font-semibold text-sm h-[24px] flex items-end">Price on Request</p>
                            @endif
                        </div>

                        <!-- Stock & CTA -->
                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                            <span class="text-xs {{ $stock > 0 ? 'text-green-600' : 'text-red-500' }} font-bold flex items-center">
                                @if($stock > 0)
                                    <i class="fas fa-check-circle mr-1"></i> {{ $stock }} Available
                                @else
                                    <i class="fas fa-times-circle mr-1"></i> Sold Out
                                @endif
                            </span>
                            <a href="{{ $route }}" 
                               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-[{{ $themeColorHex }}] hover:bg-{{ $themeColor }}-900 text-white text-sm font-bold shadow-md transition-all group-hover:shadow-lg group-hover:-translate-y-0.5">
                                View Details <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination Controls (Right Aligned or Absolute positioned) -->
    @if($totalChunks > 1)
        <div class="absolute bottom-0 right-0 left-0 flex justify-center items-center gap-4 mt-8 pb-2">
            
            <button wire:click="previous" 
                    class="w-12 h-12 flex items-center justify-center rounded-full shadow-lg border-2 border-white {{ $currentIndex == 0 ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : 'bg-[#1e3a8a] text-white hover:bg-blue-900 hover:scale-105' }} transition-all"
                    {{ $currentIndex == 0 ? 'disabled' : '' }}>
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <span class="text-sm font-bold text-gray-500">
                <span class="text-gray-900 text-lg px-2">{{ $currentIndex + 1 }}</span> / {{ $totalChunks }}
            </span>

            <button wire:click="next" 
                    class="w-12 h-12 flex items-center justify-center rounded-full shadow-lg border-2 border-white {{ $currentIndex >= $totalChunks - 1 ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : 'bg-[#1e3a8a] text-white hover:bg-blue-900 hover:scale-105' }} transition-all"
                    {{ $currentIndex >= $totalChunks - 1 ? 'disabled' : '' }}>
                <i class="fas fa-chevron-right"></i>
            </button>

        </div>
    @endif
    
    <!-- Loading Overlay -->
    <div wire:loading wire:target="next, previous" class="absolute inset-0 bg-white/60 backdrop-blur-sm rounded-2xl z-10 hidden" style="display: none;"
    x-data="{ show: false }" x-init="Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
        succeed(({ snapshot, effect }) => {
             updateCountdowns(); 
        })
    })">
        <div class="h-full w-full flex items-center justify-center pt-24">
            <i class="fas fa-circle-notch fa-spin text-4xl text-[#1e3a8a]"></i>
        </div>
    </div>
</div>

<script>
    // Livewire requires countdown to be reinitialized when DOM changes
    document.addEventListener("livewire:navigated", function() {
       if (typeof updateCountdowns === "function") {
           updateCountdowns();
       }
    });
    document.addEventListener("livewire:init", function() {
        Livewire.hook('morph.updated', ({ el, component }) => {
             if (typeof updateCountdowns === "function") {
                updateCountdowns();
            }
        });
    });
</script>

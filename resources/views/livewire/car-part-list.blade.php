<div class="flex flex-col lg:flex-row gap-6">
    <!-- Left Sidebar - Search & Filters -->
    <aside class="w-full lg:w-80 flex-shrink-0">
        <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-4">
            <!-- Search Bar -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    <i class="fas fa-search mr-2 text-teal-600"></i>Search Car Parts
                </label>
                <div class="relative">
                    <input type="text" 
                           wire:model.live.debounce.500ms="searchTerm"
                           placeholder="Search car parts..." 
                           class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    @if($searchTerm)
                    <button wire:click="$set('searchTerm', '')" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-red-600 transition">
                        <i class="fas fa-times-circle"></i>
                    </button>
                    @endif
                </div>
            </div>

            <!-- Filters Section -->
            <div class="space-y-5">
                <h3 class="text-sm font-bold text-gray-700 uppercase tracking-wider border-b border-gray-200 pb-2">
                    <i class="fas fa-filter mr-2 text-teal-600"></i>Filters
                </h3>

                <!-- Brand Filter -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-car mr-2"></i>Brand
                    </label>
                    <select wire:model.live="selectedBrand" class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 text-sm">
                        <option value="">All Brands</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Category Filter -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-th-large mr-2"></i>Category
                    </label>
                    <select wire:model.live="selectedCategory" class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 text-sm">
                        <option value="">All Categories</option>
                        @foreach($partCategories as $partCategory)
                            <option value="{{ $partCategory->name }}">{{ $partCategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Price Range -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-dollar-sign mr-2"></i>Price Range
                    </label>
                    <select wire:model.live="selectedPrice" class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 text-sm">
                        <option value="">All Prices</option>
                        <option value="0-100">Under $100</option>
                        <option value="100-500">$100 - $500</option>
                        <option value="500-1000">$500 - $1,000</option>
                        <option value="1000-2000">$1,000 - $2,000</option>
                        <option value="2000+">$2,000+</option>
                    </select>
                </div>

                <!-- Reset Button -->
                <button wire:click="resetFilters" class="w-full bg-gray-600 hover:bg-gray-700 text-white px-4 py-2.5 rounded-lg font-semibold transition shadow-lg flex items-center justify-center gap-2 text-sm">
                    <i class="fas fa-redo"></i> Reset Filters
                </button>

                <!-- Active Filters Display -->
                @if($searchTerm || $selectedBrand || $selectedCategory || $selectedPrice)
                <div class="pt-4 border-t border-gray-200">
                    <h4 class="text-xs font-bold text-gray-700 uppercase mb-3">Active Filters</h4>
                    <div class="flex flex-col gap-2">
                        @if($searchTerm)
                        <span class="bg-teal-100 text-teal-800 px-3 py-1.5 rounded-full text-xs font-semibold flex items-center justify-between">
                            <span class="flex items-center gap-2">
                                <i class="fas fa-search"></i> "{{ $searchTerm }}"
                            </span>
                            <button wire:click="$set('searchTerm', '')" class="hover:text-red-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </span>
                        @endif

                        @if($selectedBrand)
                        <span class="bg-purple-100 text-purple-800 px-3 py-1.5 rounded-full text-xs font-semibold">
                            <i class="fas fa-car mr-1"></i> {{ $selectedBrand }}
                        </span>
                        @endif

                        @if($selectedCategory)
                        <span class="bg-green-100 text-green-800 px-3 py-1.5 rounded-full text-xs font-semibold">
                            <i class="fas fa-th-large mr-1"></i> {{ $selectedCategory }}
                        </span>
                        @endif

                        @if($selectedPrice)
                        <span class="bg-amber-100 text-amber-800 px-3 py-1.5 rounded-full text-xs font-semibold">
                            <i class="fas fa-dollar-sign mr-1"></i> 
                            @if($selectedPrice === '0-100') Under $100
                            @elseif($selectedPrice === '100-500') $100 - $500
                            @elseif($selectedPrice === '500-1000') $500 - $1,000
                            @elseif($selectedPrice === '1000-2000') $1,000 - $2,000
                            @elseif($selectedPrice === '2000+') $2,000+
                            @endif
                        </span>
                        @endif

                        <span class="bg-gray-100 text-gray-700 px-3 py-1.5 rounded-full text-xs font-semibold text-center">
                            <i class="fas fa-cog mr-1"></i> {{ $totalCount }} Found
                        </span>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </aside>

    <!-- Main Content Area - Car Parts Grid -->
    <div class="flex-1">
        <!-- Loading Indicator -->
        <div
            wire:loading
            class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[9999]"
        >
            <div class="inline-flex items-center px-6 py-3 bg-teal-100 text-teal-800 rounded-lg shadow-lg">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-teal-800"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10"
                            stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Loading car parts...
            </div>
        </div>

        <!-- Car Parts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
        @forelse($carParts as $carPart)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all group">
            <a href="{{ route('car-parts.show', $carPart->hashid) }}">
                <div class="relative overflow-hidden">
                    <img src="{{ $carPart->image_url }}" alt="{{ $carPart->name }}"
                         class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                    
                    <!-- Brand Badge -->
                    <div class="absolute top-2 left-2 bg-gradient-to-r from-teal-600 to-cyan-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                        {{ $carPart->brand }}
                    </div>

                    @if($carPart->video)
                    <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-xs font-semibold">
                        <i class="fas fa-video mr-1"></i> Video
                    </div>
                    @endif
                </div>
            </a>
            
            <div class="p-4">
                <!-- Category -->
                <div class="text-xs text-gray-500 mb-2 flex items-center">
                    <i class="fas fa-tag mr-1"></i> {{ $carPart->category }}
                </div>

                <!-- Car Part Name -->
                <h3 class="font-bold text-lg mb-2 line-clamp-2 text-gray-800">{{ $carPart->name }}</h3>
                
                @if($carPart->model)
                <p class="text-gray-500 text-sm mb-2 flex items-center">
                    <i class="fas fa-car-side mr-1"></i> Model: {{ $carPart->model }}
                </p>
                @endif

                <!-- Price -->
                @if($carPart->price)
                <p class="text-teal-600 font-bold text-xl mb-3">${{ number_format($carPart->price, 2) }}</p>
                @else
                <p class="text-gray-600 font-semibold text-lg mb-3">Price on Request</p>
                @endif

                <!-- Stock Status -->
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs {{ $carPart->stock_quantity > 0 ? 'text-green-600' : 'text-red-600' }} font-semibold flex items-center">
                        <i class="fas fa-box mr-1"></i>
                        @if($carPart->stock_quantity > 0)
                            {{ $carPart->stock_quantity }} in stock
                        @else
                            Out of stock
                        @endif
                    </span>
                </div>

                <!-- View Details Button -->
                <a href="{{ route('car-parts.show', $carPart->hashid) }}" 
                   class="block w-full bg-gradient-to-r from-teal-600 to-cyan-600 hover:from-teal-700 hover:to-cyan-700 text-white text-center py-2 rounded-lg transition font-semibold">
                    View Details <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        @empty
        <div class="md:col-span-2 lg:col-span-3 xl:col-span-4 text-center py-20">
            <i class="fas fa-cog text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-600 text-xl">No car parts found matching your criteria.</p>
            <button wire:click="resetFilters" class="mt-4 bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-lg font-semibold transition">
                <i class="fas fa-redo mr-2"></i> Reset Filters
            </button>
        </div>
        @endforelse
    </div>

    <!-- Load More Button -->
    @if($hasMorePages && $carParts->count() > 0)
    <div class="text-center mb-12">
        <button wire:click="loadMore" 
                class="bg-gradient-to-r from-teal-600 to-cyan-600 hover:from-teal-700 hover:to-cyan-700 text-white px-12 py-4 rounded-xl font-bold text-lg shadow-xl transition-all transform hover:scale-105 flex items-center justify-center gap-3 mx-auto">
            <i class="fas fa-plus-circle"></i>
            Load More Car Parts
            <i class="fas fa-chevron-down animate-bounce"></i>
        </button>
        <p class="text-gray-500 text-sm mt-3">Showing {{ $carParts->count() }} of {{ $totalCount }} car parts</p>
    </div>
    @endif

        <!-- Results Summary -->
        @if($carParts->count() > 0)
        <div class="text-center text-gray-600 mb-8">
            <p class="text-lg">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Displaying <strong>{{ $carParts->count() }}</strong> of <strong>{{ $totalCount }}</strong> car parts
            </p>
        </div>
        @endif
    </div>
</div>


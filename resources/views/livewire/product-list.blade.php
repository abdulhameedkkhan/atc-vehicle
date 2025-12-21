<div>
    <!-- Search Bar -->
    <div class="bg-white rounded-2xl shadow-xl p-6 mb-8">
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-3">
                <i class="fas fa-search mr-2 text-blue-600"></i>Search Products
            </label>
            <div class="relative">
                <input type="text" 
                       wire:model.live.debounce.500ms="searchTerm"
                       placeholder="Search by name, brand, model, or part number..." 
                       class="w-full px-6 py-4 pl-14 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-lg">
                <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-400 text-xl"></i>
                @if($searchTerm)
                <button wire:click="$set('searchTerm', '')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-red-600 transition">
                    <i class="fas fa-times-circle text-xl"></i>
                </button>
                @endif
            </div>
        </div>

        <!-- Filters -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Brand Filter -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-car mr-2"></i>Brand
                </label>
                <select wire:model.live="selectedBrand" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-th-large mr-2"></i>Category
                </label>
                <select wire:model.live="selectedCategory" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-dollar-sign mr-2"></i>Price Range
                </label>
                <select wire:model.live="selectedPrice" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Prices</option>
                    <option value="0-500">Under $500</option>
                    <option value="500-1000">$500 - $1,000</option>
                    <option value="1000-2000">$1,000 - $2,000</option>
                    <option value="2000-5000">$2,000 - $5,000</option>
                    <option value="5000+">$5,000+</option>
                </select>
            </div>

            <!-- Reset Button -->
            <div class="flex items-end">
                <button wire:click="resetFilters" class="w-full bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition shadow-lg flex items-center justify-center gap-2">
                    <i class="fas fa-redo"></i> Reset
                </button>
            </div>
        </div>

        <!-- Active Filters Display -->
        @if($searchTerm || $selectedBrand || $selectedCategory || $selectedPrice)
        <div class="mt-4 flex flex-wrap gap-2 items-center">
            <div class="text-sm font-semibold text-gray-700 mr-2">Active Filters:</div>
            
            @if($searchTerm)
            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold flex items-center gap-2">
                <i class="fas fa-search"></i> "{{ $searchTerm }}"
                <button wire:click="$set('searchTerm', '')" class="hover:text-red-600">
                    <i class="fas fa-times"></i>
                </button>
            </span>
            @endif

            @if($selectedBrand)
            <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-semibold">
                <i class="fas fa-car mr-1"></i> {{ $selectedBrand }}
            </span>
            @endif

            @if($selectedCategory)
            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                <i class="fas fa-th-large mr-1"></i> {{ $selectedCategory }}
            </span>
            @endif

            @if($selectedPrice)
            <span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm font-semibold">
                <i class="fas fa-dollar-sign mr-1"></i> 
                @if($selectedPrice === '0-500') Under $500
                @elseif($selectedPrice === '500-1000') $500 - $1,000
                @elseif($selectedPrice === '1000-2000') $1,000 - $2,000
                @elseif($selectedPrice === '2000-5000') $2,000 - $5,000
                @elseif($selectedPrice === '5000+') $5,000+
                @endif
            </span>
            @endif

            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-semibold ml-auto">
                <i class="fas fa-box mr-1"></i> {{ $totalCount }} Products Found
            </span>
        </div>
        @endif
    </div>

    <!-- Loading Indicator -->
<div
    wire:loading
    class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[9999]"
>
    <div class="inline-flex items-center px-6 py-3 bg-blue-100 text-blue-800 rounded-lg shadow-lg">
        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-800"
             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10"
                    stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Loading products...
    </div>
</div>


    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-8">
        @forelse($products as $product)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all group">
            <a href="{{ route('products.show', $product->hashid) }}">
                <div class="relative overflow-hidden">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                         class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                    
                    <!-- Brand Badge -->
                    <div class="absolute top-2 left-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                        {{ $product->brand }}
                    </div>

                    @if($product->video)
                    <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-xs font-semibold">
                        <i class="fas fa-video mr-1"></i> Video
                    </div>
                    @endif
                </div>
            </a>
            
            <div class="p-4">
                <!-- Category -->
                <div class="text-xs text-gray-500 mb-2 flex items-center">
                    <i class="fas fa-tag mr-1"></i> {{ $product->category }}
                </div>

                <!-- Product Name -->
                <h3 class="font-bold text-lg mb-2 line-clamp-2 text-gray-800">{{ $product->name }}</h3>
                
                @if($product->model)
                <p class="text-gray-500 text-sm mb-2 flex items-center">
                    <i class="fas fa-car-side mr-1"></i> Model: {{ $product->model }}
                </p>
                @endif

                <!-- Price -->
                @if($product->price)
                <p class="text-blue-600 font-bold text-xl mb-3">${{ number_format($product->price, 2) }}</p>
                @else
                <p class="text-gray-600 font-semibold text-lg mb-3">Price on Request</p>
                @endif

                <!-- Stock Status -->
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs {{ $product->stock_quantity > 0 ? 'text-green-600' : 'text-red-600' }} font-semibold flex items-center">
                        <i class="fas fa-box mr-1"></i>
                        @if($product->stock_quantity > 0)
                            {{ $product->stock_quantity }} in stock
                        @else
                            Out of stock
                        @endif
                    </span>
                </div>

                <!-- View Details Button -->
                <a href="{{ route('products.show', $product->hashid) }}" 
                   class="block w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white text-center py-2 rounded-lg transition font-semibold">
                    View Details <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        @empty
        <div class="md:col-span-3 lg:col-span-4 text-center py-20">
            <i class="fas fa-box-open text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-600 text-xl">No products found matching your criteria.</p>
            <button wire:click="resetFilters" class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition">
                <i class="fas fa-redo mr-2"></i> Reset Filters
            </button>
        </div>
        @endforelse
    </div>

    <!-- Load More Button -->
    @if($hasMorePages && $products->count() > 0)
    <div class="text-center mb-12">
        <button wire:click="loadMore" 
                class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-12 py-4 rounded-xl font-bold text-lg shadow-xl transition-all transform hover:scale-105 flex items-center justify-center gap-3 mx-auto">
            <i class="fas fa-plus-circle"></i>
            Load More Products
            <i class="fas fa-chevron-down animate-bounce"></i>
        </button>
        <p class="text-gray-500 text-sm mt-3">Showing {{ $products->count() }} of {{ $totalCount }} products</p>
    </div>
    @endif

    <!-- Results Summary -->
    @if($products->count() > 0)
    <div class="text-center text-gray-600 mb-8">
        <p class="text-lg">
            <i class="fas fa-check-circle text-green-500 mr-2"></i>
            Displaying <strong>{{ $products->count() }}</strong> of <strong>{{ $totalCount }}</strong> products
        </p>
    </div>
    @endif
</div>

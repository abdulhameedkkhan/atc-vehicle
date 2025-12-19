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
                <!-- Main Image -->
                <div class="mb-4">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" 
                         class="w-full rounded-lg shadow-lg">
                </div>
                
                <!-- Additional Images -->
                @if($product->images_urls && count($product->images_urls) > 0)
                <div class="grid grid-cols-4 gap-2 mb-4">
                    @foreach($product->images_urls as $image)
                    <img src="{{ $image }}" alt="Product image" 
                         class="w-full h-24 object-cover rounded cursor-pointer hover:opacity-75 transition">
                    @endforeach
                </div>
                @endif

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

                @if($product->description)
                <div class="mb-6">
                    <h3 class="font-semibold text-lg mb-2">Description</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                </div>
                @endif

                <div class="flex gap-4">
                    <a href="{{ route('contact') }}" 
                       class="flex-1 bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold text-center hover:from-indigo-700 hover:to-purple-700 transition flex items-center justify-center gap-2">
                        <i class="fas fa-envelope"></i> Inquire Now
                    </a>
                    <a href="https://wa.me/819048043444?text=Hi, I'm interested in {{ urlencode($product->name) }}. Product ID: {{ $product->hashid }}" 
                       target="_blank"
                       class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-700 transition flex items-center gap-2 shadow-lg">
                        <i class="fab fa-whatsapp text-xl"></i> WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


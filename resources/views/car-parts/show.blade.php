@extends('layouts.app')

@section('title', $carPart->name . ' - ATC Japan')

@section('content')
<!-- Car Part Detail Section -->
<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-4">
            <a href="{{ route('car-parts.index') }}" class="text-indigo-600 hover:text-indigo-800">
                ← Back to Car Parts
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Images & Video -->
            <div>
                <!-- Main Image -->
                <div class="mb-4">
                    <img src="{{ $carPart->image_url }}" alt="{{ $carPart->name }}" 
                         class="w-full rounded-lg shadow-lg">
                </div>
                
                <!-- Additional Images -->
                @if($carPart->images_urls && count($carPart->images_urls) > 0)
                <div class="grid grid-cols-4 gap-2 mb-4">
                    @foreach($carPart->images_urls as $image)
                    <img src="{{ $image }}" alt="Car part image" 
                         class="w-full h-24 object-cover rounded cursor-pointer hover:opacity-75 transition">
                    @endforeach
                </div>
                @endif

                <!-- Video -->
                @if($carPart->video_url)
                <div class="mt-4">
                    <h3 class="font-semibold mb-2">Car Part Video</h3>
                    <video controls class="w-full rounded-lg shadow-lg">
                        <source src="{{ $carPart->video_url }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                @endif
            </div>

            <!-- Car Part Info -->
            <div>
                <h1 class="text-3xl font-bold mb-4">{{ $carPart->name }}</h1>
                <div class="flex items-center gap-4 mb-4">
                    <span class="px-3 py-1 bg-teal-100 text-teal-800 rounded-full text-sm font-semibold">
                        {{ $carPart->brand }}
                    </span>
                    @if($carPart->condition)
                    <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">
                        {{ $carPart->condition }}
                    </span>
                    @endif
                </div>
                
                @if($carPart->price)
                <p class="text-3xl font-bold text-teal-600 mb-6">
                    ${{ number_format($carPart->price, 2) }}
                </p>
                @else
                <p class="text-xl text-gray-600 mb-6">Price on inquiry</p>
                @endif

                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h3 class="font-semibold text-lg mb-4">Car Part Details</h3>
                    <div class="space-y-3">
                        @if($carPart->part_number)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Part Number:</span>
                            <span class="font-medium">{{ $carPart->part_number }}</span>
                        </div>
                        @endif
                        @if($carPart->model)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Model:</span>
                            <span class="font-medium">{{ $carPart->model }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between">
                            <span class="text-gray-600">Category:</span>
                            <span class="font-medium">{{ $carPart->category }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Stock:</span>
                            <span class="font-medium {{ $carPart->stock_quantity > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $carPart->stock_quantity > 0 ? $carPart->stock_quantity . ' available' : 'Out of stock' }}
                            </span>
                        </div>
                    </div>
                </div>

                @if($carPart->description)
                <div class="mb-6">
                    <h3 class="font-semibold text-lg mb-2">Description</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $carPart->description }}</p>
                </div>
                @endif

                <div class="flex gap-4">
                    <a href="{{ route('contact') }}" 
                       class="flex-1 bg-gradient-to-r from-teal-600 to-cyan-600 text-white px-6 py-3 rounded-lg font-semibold text-center hover:from-teal-700 hover:to-cyan-700 transition flex items-center justify-center gap-2">
                        <i class="fas fa-envelope"></i> Inquire Now
                    </a>
                    <a href="https://wa.me/819048043444?text=Hi, I'm interested in {{ urlencode($carPart->name) }}. Part ID: {{ $carPart->hashid }}" 
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


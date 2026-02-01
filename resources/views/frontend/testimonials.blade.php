@extends('layouts.app')

@section('title', 'Testimonials - ATC Japan | What Our Customers Say')

@section('content')
<!-- Hero Section -->
<section class="relative bg-blue-900 text-white py-20 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/about-us.avif') }}" alt="Testimonials Background" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/50 via-blue-900 to-blue-900"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Customer Testimonials</h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto">
            Discover why thousands of customers worldwide trust ATC Japan for their vehicle and auto parts needs.
        </p>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">5000+</div>
                <div class="text-gray-500 font-medium">Happy Clients</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">50+</div>
                <div class="text-gray-500 font-medium">Countries Served</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">10+</div>
                <div class="text-gray-500 font-medium">Years Excellence</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">4.9/5</div>
                <div class="text-gray-500 font-medium">Average Rating</div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $testimonials = [
                    [
                        'name' => 'John Doe',
                        'location' => 'United Kingdom',
                        'text' => 'The engine I ordered arrived on time and in perfect condition. ATC Japan is definitely my go-to for Japanese parts now.',
                        'rating' => 5,
                        'image' => 'https://ui-avatars.com/api/?name=John+Doe&background=1e3a8a&color=fff'
                    ],
                    [
                        'name' => 'Ahmed Hassan',
                        'location' => 'United Arab Emirates',
                        'text' => 'Excellent service and communication. The vehicle was exactly as described in the inspection report. Highly recommended!',
                        'rating' => 5,
                        'image' => 'https://ui-avatars.com/api/?name=Ahmed+Hassan&background=1e3a8a&color=fff'
                    ],
                    [
                        'name' => 'Sarah Williams',
                        'location' => 'New Zealand',
                        'text' => 'Fast shipping and competitive prices. Sourcing parts for my Japanese import has never been easier.',
                        'rating' => 5,
                        'image' => 'https://ui-avatars.com/api/?name=Sarah+Williams&background=1e3a8a&color=fff'
                    ],
                    [
                        'name' => 'Robert Kemboi',
                        'location' => 'Kenya',
                        'text' => 'Great experience buying my first car from Japan. The team guided me through the entire import process professionally.',
                        'rating' => 4,
                        'image' => 'https://ui-avatars.com/api/?name=Robert+Kemboi&background=1e3a8a&color=fff'
                    ],
                    [
                        'name' => 'Carlos Rodriguez',
                        'location' => 'Chile',
                        'text' => 'Very reliable partner. We have been importing parts from ATC Japan for over 3 years and they never disappoint.',
                        'rating' => 5,
                        'image' => 'https://ui-avatars.com/api/?name=Carlos+Rodriguez&background=1e3a8a&color=fff'
                    ],
                    [
                        'name' => 'David Chen',
                        'location' => 'Canada',
                        'text' => 'Top notch quality! The transmission works perfectly. Shipping was surprisingly fast given the international distance.',
                        'rating' => 5,
                        'image' => 'https://ui-avatars.com/api/?name=David+Chen&background=1e3a8a&color=fff'
                    ]
                ];
            @endphp

            @foreach($testimonials as $testimonial)
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex items-center mb-6">
                    <img src="{{ $testimonial['image'] }}" alt="{{ $testimonial['name'] }}" class="w-14 h-14 rounded-full mr-4 border-2 border-blue-100 p-0.5">
                    <div>
                        <h3 class="font-bold text-gray-800 text-lg">{{ $testimonial['name'] }}</h3>
                        <p class="text-blue-600 text-sm font-medium flex items-center">
                            <i class="fas fa-map-marker-alt mr-1"></i> {{ $testimonial['location'] }}
                        </p>
                    </div>
                </div>
                
                <div class="flex mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-300' }} text-sm mr-1"></i>
                    @endfor
                </div>

                <p class="text-gray-600 italic leading-relaxed">
                    "{{ $testimonial['text'] }}"
                </p>
                
                <div class="mt-6 pt-6 border-t border-gray-50 flex justify-between items-center">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">Verified Buyer</span>
                    <i class="fas fa-quote-right text-blue-100 text-2xl"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-blue-600 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-indigo-900 opacity-90"></div>
    <div class="hero-pattern absolute inset-0 opacity-10"></div>
    
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10 text-white">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 leading-tight italic">
            "Experience the Excellence Yourself"
        </h2>
        <p class="text-xl mb-10 text-blue-100">
            Join thousands of satisfied customers and start your journey with ATC Japan today.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('products.index') }}" class="bg-white text-blue-700 px-8 py-4 rounded-xl font-bold text-lg hover:bg-blue-50 transition-all shadow-xl hover:shadow-2xl flex items-center justify-center gap-2">
                <i class="fas fa-search"></i> Browse Products
            </a>
            <a href="{{ route('contact') }}" class="bg-blue-900 text-white border-2 border-blue-400 px-8 py-4 rounded-xl font-bold text-lg hover:bg-blue-800 transition-all shadow-xl hover:shadow-2xl flex items-center justify-center gap-2">
                <i class="fas fa-envelope"></i> Contact Us
            </a>
        </div>
    </div>
</section>
@endsection

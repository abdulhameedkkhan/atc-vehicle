@extends('layouts.app')

@section('title', 'Home - ATC Japan | Japanese Used Vehicles & Auto Parts Export')

@section('content')
<!-- Hero Section with Background -->
<section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-purple-900 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 relative z-10">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Japanese Used Vehicles & Auto Parts Export
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100 max-w-3xl mx-auto">
                Sourcing Quality Japanese Vehicles and Genuine Parts Worldwide Since 2016
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <a href="{{ route('products.index') }}" class="bg-amber-500 hover:bg-amber-600 text-white px-8 py-4 rounded-lg font-bold text-lg transition shadow-2xl flex items-center justify-center gap-2">
                    <i class="fas fa-search"></i> Browse Products
                </a>
                <a href="{{ route('contact') }}" class="bg-white hover:bg-gray-100 text-blue-900 px-8 py-4 rounded-lg font-bold text-lg transition shadow-2xl flex items-center justify-center gap-2">
                    <i class="fas fa-envelope"></i> Get Quote
                </a>
            </div>
            
            <!-- Stats Bar -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16 bg-white/10 backdrop-blur-lg rounded-2xl p-8">
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-amber-400 mb-2">350+</div>
                    <div class="text-sm md:text-base text-blue-100">Vehicles in Stock</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-amber-400 mb-2">10+</div>
                    <div class="text-sm md:text-base text-blue-100">Years Experience</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-amber-400 mb-2">80+</div>
                    <div class="text-sm md:text-base text-blue-100">Japanese Brands</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-amber-400 mb-2">100%</div>
                    <div class="text-sm md:text-base text-blue-100">Quality Guaranteed</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Categories Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Our Product Categories
            </h2>
            <p class="text-xl text-gray-600">
                Wide Range of Japanese Automotive Products
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all group cursor-pointer">
                <div class="p-8 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-car text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Used Vehicles</h3>
                    <p class="text-gray-600 text-sm mb-4">Cars, Trucks, Buses, Heavy Equipment</p>
                    <a href="{{ route('products.index') }}" class="text-blue-600 font-semibold hover:text-blue-800 flex items-center justify-center gap-2">
                        View All <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all group cursor-pointer">
                <div class="p-8 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-cog text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Auto Parts</h3>
                    <p class="text-gray-600 text-sm mb-4">Engines, Transmissions, Body Parts</p>
                    <a href="{{ route('products.index') }}" class="text-blue-600 font-semibold hover:text-blue-800 flex items-center justify-center gap-2">
                        View All <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all group cursor-pointer">
                <div class="p-8 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-amber-500 to-amber-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-wrench text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Accessories</h3>
                    <p class="text-gray-600 text-sm mb-4">Audio Systems, Lights, Wheels</p>
                    <a href="{{ route('products.index') }}" class="text-blue-600 font-semibold hover:text-blue-800 flex items-center justify-center gap-2">
                        View All <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all group cursor-pointer">
                <div class="p-8 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-tools text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Machinery</h3>
                    <p class="text-gray-600 text-sm mb-4">Construction, Agriculture Equipment</p>
                    <a href="{{ route('products.index') }}" class="text-blue-600 font-semibold hover:text-blue-800 flex items-center justify-center gap-2">
                        View All <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Why Choose ATC Japan?
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Your Trusted Partner for Japanese Automotive Excellence
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-blue-50 to-purple-50 p-8 rounded-2xl border-2 border-blue-100 hover:shadow-2xl transition-all">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-purple-600 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-certificate text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Quality Assured</h3>
                <p class="text-gray-600">
                    All vehicles and parts thoroughly inspected and tested before export. 100% genuine Japanese quality guaranteed.
                </p>
            </div>
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl border-2 border-green-100 hover:shadow-2xl transition-all">
                <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-emerald-600 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-shipping-fast text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Worldwide Shipping</h3>
                <p class="text-gray-600">
                    Reliable shipping to any destination worldwide. Secure packaging and professional export documentation.
                </p>
            </div>
            <div class="bg-gradient-to-br from-amber-50 to-orange-50 p-8 rounded-2xl border-2 border-amber-100 hover:shadow-2xl transition-all">
                <div class="w-16 h-16 bg-gradient-to-br from-amber-600 to-orange-600 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-headset text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Expert Support</h3>
                <p class="text-gray-600">
                    Professional customer service team ready to assist. 10+ years of experience in automotive export industry.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Brands Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Featured Japanese Brands
            </h2>
            <p class="text-xl text-gray-600">
                We Deal with All Major Japanese Automotive Brands
            </p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition text-center">
                <div class="text-2xl font-bold text-blue-900">TOYOTA</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition text-center">
                <div class="text-2xl font-bold text-red-700">NISSAN</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition text-center">
                <div class="text-2xl font-bold text-blue-800">HONDA</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition text-center">
                <div class="text-2xl font-bold text-gray-800">MAZDA</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition text-center">
                <div class="text-2xl font-bold text-red-800">MITSUBISHI</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition text-center">
                <div class="text-2xl font-bold text-blue-600">SUZUKI</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition text-center">
                <div class="text-2xl font-bold text-blue-900">SUBARU</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition text-center">
                <div class="text-2xl font-bold text-red-600">ISUZU</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition text-center">
                <div class="text-2xl font-bold text-gray-700">DAIHATSU</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition text-center">
                <div class="text-2xl font-bold text-gray-900">LEXUS</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition text-center">
                <div class="text-2xl font-bold text-blue-700">HINO</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition text-center">
                <div class="text-xl font-bold text-gray-600">& 70+ More</div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Our Export Process
            </h2>
            <p class="text-xl text-gray-600">
                Simple, Professional & Reliable Service from Japan to Your Doorstep
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">
                    "Excellent quality parts and professional service! The parts arrived exactly as described and fit perfectly. Highly recommended for anyone looking for genuine Japanese auto parts."
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mr-4">
                        <span class="text-indigo-600 font-bold text-lg">AM</span>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Ahmed Mohamed</div>
                        <div class="text-sm text-gray-500">Auto Parts Dealer, UAE</div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">
                    "Been sourcing parts from ATC Japan for 3 years now. Reliable, honest, and always delivers quality. Their vehicle dismantling service is top-notch!"
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                        <span class="text-purple-600 font-bold text-lg">KL</span>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Kevin Lee</div>
                        <div class="text-sm text-gray-500">Workshop Owner, Singapore</div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">
                    "Fast shipping and great communication! Parts were packed securely and arrived in perfect condition. Will definitely order again."
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-cyan-100 rounded-full flex items-center justify-center mr-4">
                        <span class="text-cyan-600 font-bold text-lg">RP</span>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Rajesh Patel</div>
                        <div class="text-sm text-gray-500">Importer, India</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                <i class="fas fa-star text-amber-500 mr-2"></i>
                Featured Products
            </h2>
            <p class="text-xl text-gray-600">
                Browse Our Latest Vehicles & Auto Parts from Japan
            </p>
        </div>

        <!-- Search and Filters -->
        <div class="bg-white rounded-2xl shadow-xl p-6 mb-8">
            <!-- Search Bar -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    <i class="fas fa-search mr-2 text-blue-600"></i>Search Products
                </label>
                <div class="relative">
                    <input type="text" 
                           id="searchInput" 
                           placeholder="Search by name, brand, model, or part number..." 
                           class="w-full px-6 py-4 pl-14 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-lg"
                           onkeyup="applyFilters()">
                    <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-400 text-xl"></i>
                    <button onclick="clearSearch()" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-red-600 transition">
                        <i class="fas fa-times-circle text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Filters -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Brand Filter -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-car mr-2"></i>Brand
                    </label>
                    <select id="brandFilter" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" onchange="applyFilters()">
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
                    <select id="categoryFilter" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" onchange="applyFilters()">
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
                    <select id="priceFilter" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" onchange="applyFilters()">
                        <option value="">All Prices</option>
                        <option value="0-500">Under $500</option>
                        <option value="500-1000">$500 - $1,000</option>
                        <option value="1000-2000">$1,000 - $2,000</option>
                        <option value="2000-5000">$2,000 - $5,000</option>
                        <option value="5000+">$5,000+</option>
                    </select>
                </div>

                <!-- Clear Filters Button -->
                <div class="flex items-end">
                    <button onclick="clearAllFilters()" class="w-full bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition shadow-lg flex items-center justify-center gap-2">
                        <i class="fas fa-redo"></i> Reset
                    </button>
                </div>
            </div>

            <!-- Active Filters Display -->
            <div id="activeFilters" class="mt-4 flex flex-wrap gap-2"></div>
        </div>

        <!-- Products Grid -->
        <div id="productsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
            @php
                $featuredProducts = \App\Models\Product::where('is_available', true)->latest()->take(8)->get();
            @endphp
            
            @forelse($featuredProducts as $product)
            <div class="product-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all group" 
                 data-brand="{{ $product->brand }}" 
                 data-category="{{ $product->category }}" 
                 data-price="{{ $product->price ?? 0 }}"
                 data-name="{{ strtolower($product->name) }}"
                 data-model="{{ strtolower($product->model ?? '') }}"
                 data-partnumber="{{ strtolower($product->part_number ?? '') }}">
                <a href="{{ route('products.show', $product->hashid) }}">
                    <div class="relative overflow-hidden h-48">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        @if($product->video)
                        <div class="absolute top-3 right-3 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 shadow-lg">
                            <i class="fas fa-video"></i> Video
                        </div>
                        @endif
                        <div class="absolute top-3 left-3 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                            {{ $product->brand }}
                        </div>
                    </div>
                </a>
                <div class="p-5">
                    <div class="mb-2">
                        <span class="text-xs font-semibold text-gray-500 uppercase">{{ $product->category }}</span>
                    </div>
                    <h3 class="font-bold text-lg mb-3 line-clamp-2 hover:text-blue-600 transition">
                        <a href="{{ route('products.show', $product->hashid) }}">{{ $product->name }}</a>
                    </h3>
                    @if($product->model)
                    <p class="text-sm text-gray-600 mb-3">
                        <i class="fas fa-tag mr-1"></i>{{ $product->model }}
                    </p>
                    @endif
                    <div class="flex items-center justify-between mb-4">
                        @if($product->price)
                        <span class="text-2xl font-bold text-blue-600">${{ number_format($product->price, 2) }}</span>
                        @else
                        <span class="text-sm text-gray-600 font-semibold">Price on Request</span>
                        @endif
                        @if($product->stock_quantity > 0)
                        <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full font-semibold">
                            <i class="fas fa-check-circle mr-1"></i>In Stock
                        </span>
                        @endif
                    </div>
                    <a href="{{ route('products.show', $product->hashid) }}" 
                       class="block w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white text-center px-4 py-3 rounded-lg font-semibold transition shadow-md hover:shadow-lg">
                        <i class="fas fa-eye mr-2"></i>View Details
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center py-12">
                <i class="fas fa-box-open text-gray-300 text-6xl mb-4"></i>
                <p class="text-gray-500 text-lg">No products available</p>
            </div>
            @endforelse
        </div>

        <!-- View All Button -->
        <div class="text-center">
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-3 bg-white hover:bg-gray-50 text-blue-900 px-8 py-4 rounded-xl font-bold text-lg border-2 border-blue-600 transition shadow-lg hover:shadow-xl">
                <i class="fas fa-th"></i> View All Products
                <i class="fas fa-arrow-right"></i>
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
    let html = '<div class="text-sm font-semibold text-gray-700 mr-2">Active Filters:</div>';
    
    if (search) {
        html += `<span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold flex items-center gap-2">
            <i class="fas fa-search"></i> "${search}"
            <button onclick="clearSearch()" class="hover:text-red-600"><i class="fas fa-times"></i></button>
        </span>`;
    }
    if (brand) {
        html += `<span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-semibold">
            <i class="fas fa-car mr-1"></i> ${brand}
        </span>`;
    }
    if (category) {
        html += `<span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
            <i class="fas fa-th-large mr-1"></i> ${category}
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
        html += `<span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm font-semibold">
            <i class="fas fa-dollar-sign mr-1"></i> ${priceLabels[price]}
        </span>`;
    }
    
    html += `<span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-semibold ml-auto">
        <i class="fas fa-box mr-1"></i> ${count} Products Found
    </span>`;
    
    if (search || brand || category || price) {
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
<section class="relative bg-gradient-to-br from-blue-900 via-purple-900 to-pink-900 text-white py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-3xl md:text-5xl font-bold mb-6">
            Ready to Source Japanese Quality?
        </h2>
        <p class="text-xl md:text-2xl mb-8 text-blue-100">
            Get genuine Japanese vehicles and auto parts exported directly to your destination
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-3 bg-white text-blue-900 px-8 py-4 rounded-lg font-bold text-lg hover:bg-gray-100 transition shadow-2xl">
                <i class="fas fa-envelope"></i> Request Quote
            </a>
            <a href="https://wa.me/819048043444" target="_blank" class="inline-flex items-center justify-center gap-3 bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-lg font-bold text-lg transition shadow-2xl">
                <i class="fab fa-whatsapp text-2xl"></i> WhatsApp Us
            </a>
        </div>
        <p class="mt-8 text-blue-200 text-sm">
            <i class="fas fa-shield-alt mr-2"></i> 10+ Years of Trusted Service | 100% Genuine Parts | Worldwide Delivery
        </p>
    </div>
</section>
@endsection


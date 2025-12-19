@extends('layouts.app')

@section('title', 'Services - ATC Japan | Vehicle Sourcing & Auto Parts')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Services</h1>
        <p class="text-xl text-indigo-100">Complete vehicle sourcing and auto parts solutions from Japan</p>
    </div>
</section>

<!-- Vehicle Sourcing & Recycling Process -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Our Vehicle Sourcing & Recycling Process
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                At ATC Japan, we provide a complete end-to-end service for clients who require quality used vehicles and parts
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <!-- Step 1 -->
            <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                <div class="w-16 h-16 bg-indigo-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    1
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Vehicle Sourcing</h3>
                <p class="text-gray-600">
                    We source vehicles directly from trusted Japanese automobile auctions, selecting units strictly according to each client's specifications.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                <div class="w-16 h-16 bg-purple-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    2
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Transport to Yard</h3>
                <p class="text-gray-600">
                    Once purchased, the vehicle is transported to our certified recycling yard for professional processing.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                <div class="w-16 h-16 bg-cyan-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    3
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Dismantling</h3>
                <p class="text-gray-600">
                    Our experienced team safely dismantles the unit based on customer requirements. Every part is carefully inspected and sorted.
                </p>
            </div>

            <!-- Step 4 -->
            <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                <div class="w-16 h-16 bg-green-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    4
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Secure Shipping</h3>
                <p class="text-gray-600">
                    All components are securely packed into containers and shipped to the client's destination worldwide.
                </p>
            </div>
        </div>

        <div class="bg-indigo-50 border-2 border-indigo-200 rounded-2xl p-8 text-center">
            <p class="text-lg text-gray-700 max-w-4xl mx-auto">
                <strong>Our Goal:</strong> To deliver reliable Japanese vehicles and high-quality used parts, on time and exactly as required.
            </p>
        </div>
    </div>
</section>

<!-- Main Services -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                What We Offer
            </h2>
            <p class="text-xl text-gray-600">
                Comprehensive automotive solutions from Japan
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition group">
                <div class="h-2 bg-gradient-to-r from-indigo-500 to-purple-500"></div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-indigo-600 transition">
                        <svg class="w-8 h-8 text-indigo-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Used Vehicles</h3>
                    <p class="text-gray-600 mb-6">
                        Quality used vehicles sourced from Japan's top auctions. Over 350 vehicles in stock covering all major brands.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Japanese Quality
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Auction Grade
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Verified Condition
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition group">
                <div class="h-2 bg-gradient-to-r from-purple-500 to-pink-500"></div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-purple-600 transition">
                        <svg class="w-8 h-8 text-purple-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Genuine Auto Parts</h3>
                    <p class="text-gray-600 mb-6">
                        High-quality used auto parts for all major brands. Carefully dismantled, inspected, and tested for quality.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            OEM Quality
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Tested & Verified
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            80+ Brands
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition group">
                <div class="h-2 bg-gradient-to-r from-cyan-500 to-blue-500"></div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-cyan-600 transition">
                        <svg class="w-8 h-8 text-cyan-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Custom Orders</h3>
                    <p class="text-gray-600 mb-6">
                        Can't find what you need? We source specific parts and vehicles according to your exact requirements.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Tailored Solutions
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Quick Sourcing
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Competitive Prices
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Service 4 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition group">
                <div class="h-2 bg-gradient-to-r from-green-500 to-teal-500"></div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-green-600 transition">
                        <svg class="w-8 h-8 text-green-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Global Shipping</h3>
                    <p class="text-gray-600 mb-6">
                        Reliable worldwide shipping with professional packaging ensuring safe delivery to your location.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Container Shipping
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Secure Packaging
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Tracking Available
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Service 5 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition group">
                <div class="h-2 bg-gradient-to-r from-yellow-500 to-orange-500"></div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-yellow-600 transition">
                        <svg class="w-8 h-8 text-yellow-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Quality Inspection</h3>
                    <p class="text-gray-600 mb-6">
                        Every part undergoes rigorous quality inspection before being packed and shipped to ensure customer satisfaction.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Visual Inspection
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Functional Testing
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Quality Guarantee
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Service 6 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition group">
                <div class="h-2 bg-gradient-to-r from-red-500 to-pink-500"></div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-red-600 transition">
                        <svg class="w-8 h-8 text-red-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Customer Support</h3>
                    <p class="text-gray-600 mb-6">
                        Dedicated support team ready to assist you with inquiries, orders, and after-sales service.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Email & Phone
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            WhatsApp Support
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Quick Response
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Payment Methods -->
<section class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Payment Methods
            </h2>
            <p class="text-xl text-gray-600">
                We accept multiple secure payment options
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Bank Transfer</h3>
                <p class="text-gray-600">Secure wire transfer directly to our account</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Credit Card</h3>
                <p class="text-gray-600">All major credit cards accepted</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">PayPal</h3>
                <p class="text-gray-600">Fast and secure online payments</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Ready to Order Quality Parts?
        </h2>
        <p class="text-xl mb-8 text-indigo-100">
            Contact us today to discuss your requirements
        </p>
        <a href="{{ route('contact') }}" class="inline-block bg-white text-indigo-600 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition">
            Get in Touch
        </a>
    </div>
</section>
@endsection

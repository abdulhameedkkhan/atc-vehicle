@extends('layouts.app')

@section('title', 'How to Buy - ATC Japan | Purchase Guide')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-red-600 to-red-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl md:text-4xl font-bold mb-2">How to Buy</h1>
        <p class="text-lg text-red-100">Complete guide to purchasing from ATC Japan</p>
    </div>
</section>

<!-- How to Buy Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Step-by-Step Purchase Guide</h2>
            
            <div class="space-y-6 mb-8">
                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-red-600 text-white rounded-full flex items-center justify-center font-bold">1</div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Browse Our Products</h3>
                        <p class="text-gray-600">Explore our extensive catalog of Japanese vehicles and auto parts. Use filters to find exactly what you need.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-red-600 text-white rounded-full flex items-center justify-center font-bold">2</div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Submit an Enquiry</h3>
                        <p class="text-gray-600">Create an account and login to submit an enquiry for the products you're interested in. Our team will review your request.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-red-600 text-white rounded-full flex items-center justify-center font-bold">3</div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Receive Quote</h3>
                        <p class="text-gray-600">We'll provide you with a detailed quote including product price, shipping costs, and delivery timeline.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-red-600 text-white rounded-full flex items-center justify-center font-bold">4</div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Make Payment</h3>
                        <p class="text-gray-600">Transfer payment to our bank account (details below). Send us the payment receipt for confirmation.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-red-600 text-white rounded-full flex items-center justify-center font-bold">5</div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Order Processing</h3>
                        <p class="text-gray-600">Once payment is confirmed, we'll process your order and prepare it for shipping from Japan.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-red-600 text-white rounded-full flex items-center justify-center font-bold">6</div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Shipping & Delivery</h3>
                        <p class="text-gray-600">Your order will be shipped to your destination. You'll receive tracking information and delivery updates.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bank Account Details -->
        <div class="bg-white rounded-xl shadow-lg p-8 mt-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Bank Account Details</h2>
            
            <div class="bg-gray-50 rounded-lg p-6 space-y-4">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Bank Name:</h3>
                    <p class="text-gray-700">[Bank Name]</p>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Account Name:</h3>
                    <p class="text-gray-700">Asia Trading Co. Pvt. Limited</p>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Account Number:</h3>
                    <p class="text-gray-700 font-mono">[Account Number]</p>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">SWIFT/BIC Code:</h3>
                    <p class="text-gray-700 font-mono">[SWIFT Code]</p>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Bank Address:</h3>
                    <p class="text-gray-700">
                        [Bank Address]<br>
                        Ibaraki-ken, Japan
                    </p>
                </div>

                <div class="pt-4 border-t border-gray-200">
                    <p class="text-sm text-gray-600">
                        <strong>Note:</strong> Please include your order/inquiry number in the payment reference. After making payment, send the receipt to our email or WhatsApp for confirmation.
                    </p>
                </div>
            </div>
        </div>

        <!-- Payment Methods -->
        <div class="bg-white rounded-xl shadow-lg p-8 mt-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Accepted Payment Methods</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="border border-gray-200 rounded-lg p-4 text-center">
                    <i class="fas fa-university text-4xl text-gray-400 mb-3"></i>
                    <h3 class="font-semibold text-gray-900">Bank Transfer</h3>
                    <p class="text-sm text-gray-600 mt-2">International wire transfer</p>
                </div>
                <div class="border border-gray-200 rounded-lg p-4 text-center">
                    <i class="fas fa-money-check-alt text-4xl text-gray-400 mb-3"></i>
                    <h3 class="font-semibold text-gray-900">Bank Draft</h3>
                    <p class="text-sm text-gray-600 mt-2">Accepted from verified banks</p>
                </div>
                <div class="border border-gray-200 rounded-lg p-4 text-center">
                    <i class="fas fa-handshake text-4xl text-gray-400 mb-3"></i>
                    <h3 class="font-semibold text-gray-900">Letter of Credit</h3>
                    <p class="text-sm text-gray-600 mt-2">For large orders</p>
                </div>
            </div>
        </div>

        <!-- Contact for More Info -->
        <div class="mt-8 text-center">
            <p class="text-gray-600 mb-4">Need more information about the purchase process?</p>
            <a href="{{ route('contact') }}" 
               class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                <i class="fas fa-envelope"></i> Contact Us
            </a>
        </div>
    </div>
</section>
@endsection


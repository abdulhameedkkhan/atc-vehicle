@extends('layouts.app')

@section('title', 'Enquiry Details - ATC Japan')

@section('content')
<section class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('enquiries.index') }}" class="text-red-600 hover:text-red-800 mb-4 inline-block">
                ← Back to My Enquiries
            </a>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Enquiry Details</h1>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-8">
            <!-- Enquiry Status -->
            <div class="mb-6 pb-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Enquiry Status</h2>
                        @if($enquiry->status === 'pending')
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        @elseif($enquiry->status === 'reserved')
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Reserved</span>
                        @elseif($enquiry->status === 'dealers_stock')
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Dealers Stock</span>
                        @elseif($enquiry->status === 'sold')
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">Sold</span>
                        @elseif($enquiry->status === 'stock')
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">Stock</span>
                        @elseif($enquiry->status === 'shipped')
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">Shipped</span>
                        @elseif($enquiry->status === 'delivered')
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-emerald-100 text-emerald-800">Delivered</span>
                        @else
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">{{ ucfirst(str_replace('_', ' ', $enquiry->status)) }}</span>
                        @endif
                    </div>
                    <div class="text-sm text-gray-500">
                        Submitted: {{ $enquiry->created_at->format('F d, Y \a\t h:i A') }}
                    </div>
                </div>
            </div>

            <!-- Product Information -->
            <div class="mb-6 pb-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Product Details</h3>
                <div class="flex gap-6">
                    <img src="{{ $enquiry->product->image_url }}" alt="{{ $enquiry->product->name }}" class="w-32 h-32 object-cover rounded-lg">
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-2">{{ $enquiry->product->name }}</h4>
                        <p class="text-gray-600 mb-1"><strong>Brand:</strong> {{ $enquiry->product->brand }}</p>
                        <p class="text-gray-600 mb-1"><strong>Category:</strong> {{ $enquiry->product->category }}</p>
                        @if($enquiry->product->part_number)
                        <p class="text-gray-600 mb-1"><strong>Part Number:</strong> {{ $enquiry->product->part_number }}</p>
                        @endif
                        @if($enquiry->product->price)
                        <p class="text-gray-600 mb-1"><strong>Price:</strong> ${{ number_format($enquiry->product->price, 2) }}</p>
                        @endif
                        <a href="{{ route('products.show', $enquiry->product->hashid) }}" class="text-red-600 hover:text-red-800 text-sm font-medium mt-2 inline-block">
                            View Product →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Enquiry Message -->
            <div class="mb-6 pb-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Your Message</h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    @if($enquiry->message)
                        <p class="text-gray-700">{{ $enquiry->message }}</p>
                    @else
                        <p class="text-gray-500 italic">No message provided</p>
                    @endif
                </div>
            </div>

            <!-- Admin Response -->
            @if($enquiry->admin_response)
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Response from Admin</h3>
                <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                    <p class="text-gray-700">{{ $enquiry->admin_response }}</p>
                    @if($enquiry->updated_at)
                    <p class="text-sm text-gray-500 mt-2">Last updated: {{ $enquiry->updated_at->format('F d, Y \a\t h:i A') }}</p>
                    @endif
                </div>
            </div>
            @else
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                <p class="text-yellow-800">
                    <i class="fas fa-info-circle mr-2"></i>
                    Your enquiry is being reviewed. We'll respond soon.
                </p>
            </div>
            @endif

            <!-- Actions -->
            <div class="flex gap-4">
                <a href="{{ route('products.show', $enquiry->product->hashid) }}" 
                   class="flex-1 bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold text-center transition">
                    View Product
                </a>
                <a href="{{ route('contact') }}" 
                   class="flex-1 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold text-center transition">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

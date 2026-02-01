@extends('layouts.admin')

@section('title', 'Enquiry Details - ATC Japan')
@section('page-subtitle', 'Enquiry Management')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.enquiries.index') }}" class="text-indigo-600 hover:text-indigo-800 mb-4 inline-block">
        ← Back to All Enquiries
    </a>
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Enquiry Details</h1>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <!-- Enquiry Status -->
    <div class="mb-6 pb-6 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Enquiry Status</h2>
                <form action="{{ route('admin.enquiries.update-status', $enquiry->hashid) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <select name="status" onchange="this.form.submit()" class="text-sm rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500
                        @if($enquiry->status === 'pending') bg-yellow-50 text-yellow-800 border-yellow-300
                        @elseif($enquiry->status === 'reserved') bg-purple-50 text-purple-800 border-purple-300
                        @elseif($enquiry->status === 'dealers_stock') bg-blue-50 text-blue-800 border-blue-300
                        @elseif($enquiry->status === 'sold') bg-red-50 text-red-800 border-red-300
                        @elseif($enquiry->status === 'stock') bg-green-50 text-green-800 border-green-300
                        @elseif($enquiry->status === 'shipped') bg-indigo-50 text-indigo-800 border-indigo-300
                        @elseif($enquiry->status === 'delivered') bg-emerald-50 text-emerald-800 border-emerald-300
                        @else bg-gray-50 text-gray-800 border-gray-300
                        @endif px-4 py-2 font-semibold">
                        <option value="pending" {{ $enquiry->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="reserved" {{ $enquiry->status === 'reserved' ? 'selected' : '' }}>Reserved</option>
                        <option value="dealers_stock" {{ $enquiry->status === 'dealers_stock' ? 'selected' : '' }}>Dealers Stock</option>
                        <option value="sold" {{ $enquiry->status === 'sold' ? 'selected' : '' }}>Sold</option>
                        <option value="stock" {{ $enquiry->status === 'stock' ? 'selected' : '' }}>Stock</option>
                        <option value="shipped" {{ $enquiry->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="delivered" {{ $enquiry->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                    </select>
                </form>
            </div>
            <div class="text-sm text-gray-500">
                Submitted: {{ $enquiry->created_at->format('F d, Y \a\t h:i A') }}
            </div>
        </div>
    </div>

    <!-- User Information -->
    <div class="mb-6 pb-6 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Customer Information</h3>
        <div class="bg-gray-50 rounded-lg p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-600 mb-1"><strong>Name:</strong> {{ $enquiry->name ?? ($enquiry->user ? $enquiry->user->name : 'N/A') }}</p>
                <p class="text-sm text-gray-600 mb-1"><strong>Email:</strong> {{ $enquiry->email ?? ($enquiry->user ? $enquiry->user->email : 'N/A') }}</p>
                <p class="text-sm text-gray-600"><strong>User Type:</strong> {{ $enquiry->user_id ? 'Registered User (#' . $enquiry->user_id . ')' : 'Guest' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600 mb-1"><strong>Phone:</strong> {{ $enquiry->phone ?? 'N/A' }}</p>
                @if($enquiry->product_url)
                <p class="text-sm text-gray-600 mb-1 overflow-hidden overflow-ellipsis">
                    <strong>Product URL:</strong> 
                    <a href="{{ $enquiry->product_url }}" target="_blank" class="text-indigo-600 hover:underline">{{ $enquiry->product_url }}</a>
                </p>
                @endif
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
                <a href="{{ route('products.show', $enquiry->product->hashid) }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium mt-2 inline-block">
                    View Product →
                </a>
            </div>
        </div>
    </div>

    <!-- Enquiry Message -->
    <div class="mb-6 pb-6 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Enquiry Message</h3>
        <div class="bg-gray-50 rounded-lg p-4">
            @if($enquiry->message)
                <p class="text-gray-700">{{ $enquiry->message }}</p>
            @else
                <p class="text-gray-500 italic">No message provided</p>
            @endif
        </div>
    </div>

    <!-- Admin Response -->
    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Admin Response</h3>
        @if($enquiry->admin_response)
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <p class="text-gray-700">{{ $enquiry->admin_response }}</p>
                @if($enquiry->updated_at)
                <p class="text-sm text-gray-500 mt-2">Last updated: {{ $enquiry->updated_at->format('F d, Y \a\t h:i A') }}</p>
                @endif
            </div>
        @else
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <p class="text-yellow-800">
                    <i class="fas fa-info-circle mr-2"></i>
                    No response has been added yet.
                </p>
            </div>
        @endif
    </div>

    <!-- Actions -->
    <div class="flex gap-4">
        <a href="{{ route('admin.enquiries.index') }}" 
           class="flex-1 bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold text-center transition">
            Back to Enquiries
        </a>
        <a href="{{ route('products.show', $enquiry->product->hashid) }}" target="_blank"
           class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold text-center transition">
            View Product
        </a>
    </div>
</div>
@endsection


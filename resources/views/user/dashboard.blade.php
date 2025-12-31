@extends('layouts.app')

@section('title', 'My Dashboard - ATC Japan')

@section('content')
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-600">Manage your enquiries and track their status</p>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition flex items-center gap-2 shadow-lg">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>

        @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-yellow-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Pending</p>
                        <p class="text-3xl font-bold text-yellow-600">{{ $stats['pending'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-clock text-yellow-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Reserved</p>
                        <p class="text-3xl font-bold text-purple-600">{{ $stats['reserved'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-bookmark text-purple-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-indigo-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Shipped</p>
                        <p class="text-3xl font-bold text-indigo-600">{{ $stats['shipped'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-shipping-fast text-indigo-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-emerald-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Delivered</p>
                        <p class="text-3xl font-bold text-emerald-600">{{ $stats['delivered'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check-circle text-emerald-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enquiries Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-red-600 to-red-700">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <i class="fas fa-list mr-2"></i>
                    My Enquiries
                </h2>
            </div>

            @if($enquiries->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($enquiries as $enquiry)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img src="{{ $enquiry->product->image_url }}" alt="{{ $enquiry->product->name }}" class="w-12 h-12 object-cover rounded-lg mr-3">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ Str::limit($enquiry->product->name, 30) }}</div>
                                        <div class="text-sm text-gray-500">{{ $enquiry->product->brand }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ Str::limit($enquiry->message ?? 'No message', 50) }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($enquiry->status === 'pending')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-clock mr-1"></i> Pending
                                    </span>
                                @elseif($enquiry->status === 'reserved')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                        <i class="fas fa-bookmark mr-1"></i> Reserved
                                    </span>
                                @elseif($enquiry->status === 'dealers_stock')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        <i class="fas fa-warehouse mr-1"></i> Dealers Stock
                                    </span>
                                @elseif($enquiry->status === 'sold')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        <i class="fas fa-times-circle mr-1"></i> Sold
                                    </span>
                                @elseif($enquiry->status === 'stock')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        <i class="fas fa-check mr-1"></i> Stock
                                    </span>
                                @elseif($enquiry->status === 'shipped')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                        <i class="fas fa-shipping-fast mr-1"></i> Shipped
                                    </span>
                                @elseif($enquiry->status === 'delivered')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-100 text-emerald-800">
                                        <i class="fas fa-check-circle mr-1"></i> Delivered
                                    </span>
                                @else
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        {{ ucfirst(str_replace('_', ' ', $enquiry->status)) }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $enquiry->created_at->format('M d, Y') }}<br>
                                <span class="text-xs">{{ $enquiry->created_at->format('h:i A') }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('enquiries.show', $enquiry->hashid) }}" class="text-red-600 hover:text-red-900 font-medium">
                                    <i class="fas fa-eye mr-1"></i> View Details
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $enquiries->links() }}
            </div>
            @else
            <div class="p-12 text-center">
                <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No Enquiries Yet</h3>
                <p class="text-gray-600 mb-6">Start browsing our products and submit enquiries for items you're interested in.</p>
                <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                    <i class="fas fa-search"></i> Browse Products
                </a>
            </div>
            @endif
        </div>

        <!-- Quick Actions -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('products.index') }}" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition border-2 border-gray-200 hover:border-red-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-red-600">Browse Products</h3>
                        <p class="text-sm text-gray-600 mt-1">Explore our product catalog</p>
                    </div>
                    <i class="fas fa-arrow-right text-gray-400 group-hover:text-red-600"></i>
                </div>
            </a>

            <a href="{{ route('enquiries.index') }}" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition border-2 border-gray-200 hover:border-red-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-red-600">All Enquiries</h3>
                        <p class="text-sm text-gray-600 mt-1">View all your enquiries</p>
                    </div>
                    <i class="fas fa-arrow-right text-gray-400 group-hover:text-red-600"></i>
                </div>
            </a>

            <a href="{{ route('contact') }}" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition border-2 border-gray-200 hover:border-red-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-red-600">Contact Us</h3>
                        <p class="text-sm text-gray-600 mt-1">Get in touch with us</p>
                    </div>
                    <i class="fas fa-arrow-right text-gray-400 group-hover:text-red-600"></i>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection


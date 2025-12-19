@extends('layouts.app')

@section('title', 'Products - ATC Japan | Quality Auto Parts & Vehicles')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-3 flex items-center">
                    <i class="fas fa-boxes mr-4 text-blue-300"></i>
                    Our Product Inventory
                </h1>
                <p class="text-xl text-blue-100">Browse our extensive collection of quality Japanese auto parts and vehicles</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-car-side text-8xl text-blue-300 opacity-20"></i>
            </div>
        </div>
    </div>
</section>

<!-- Products Section with Livewire -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
        @endif

        @livewire('product-list')
    </div>
</section>
@endsection


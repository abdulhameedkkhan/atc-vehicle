@extends('layouts.app')

@section('title', 'Car Parts - ATC Japan | Quality Auto Parts')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-teal-900 via-cyan-800 to-blue-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-3 flex items-center">
                    <i class="fas fa-cogs mr-4 text-teal-300"></i>
                    Car Parts Inventory
                </h1>
                <p class="text-xl text-teal-100">Browse our extensive collection of quality car parts</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-wrench text-8xl text-teal-300 opacity-20"></i>
            </div>
        </div>
    </div>
</section>

<!-- Car Parts Section with Livewire -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
        @endif

        @livewire('car-part-list')
    </div>
</section>
@endsection


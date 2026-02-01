@extends('layouts.app')

@section('title', 'About Us - ATC Japan | Your Trusted Auto Parts Partner')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-[#1e3a8a] to-[#1e40af] text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">About Us</h1>
        <p class="text-xl text-blue-100">Learn more about our company and what we do</p>
    </div>
</section>

<!-- Company Overview -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Your Trusted Partner for Japanese Auto Parts
                </h2>
                <p class="text-lg text-gray-600 mb-6">
                    Established in <strong>2016</strong> and registered in <strong>Japan</strong>, Asia Trading Co. Pvt. Limited (ATC Japan) has been at the forefront of supplying high-quality used vehicles and genuine auto parts to clients worldwide.
                </p>
                <p class="text-lg text-gray-600 mb-6">
                    With over <strong>10 years of experience</strong> in the automotive industry, we specialize in sourcing premium vehicles and parts directly from trusted Japanese automobile auctions. Our state-of-the-art recycling yard and professional team ensure that every component meets international quality standards.
                </p>
                <p class="text-lg text-gray-600">
                    We take pride in our commitment to excellence, transparency, and customer satisfaction. From sourcing to shipping, we provide end-to-end solutions that make importing Japanese auto parts hassle-free and cost-effective.
                </p>
            </div>
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 h-96 flex items-center justify-center" style="
                background: url('{{ asset('images/about-us.avif') }}') center center no-repeat;
                background-size: cover;
            ">
                <div class="text-center">
                    <!-- <div class="text-6xl mb-4">🚀</div> -->
                    <!-- <h3 class="text-2xl font-bold text-gray-900">Our Mission</h3>
                    <p class="text-gray-600 mt-2">Empowering businesses through technology</p> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="bg-gray-100 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Our Core Values
            </h2>
            <p class="text-xl text-gray-600">
                The principles that guide everything we do
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-[#1e3a8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Quality</h3>
                <p class="text-gray-600">
                    We never compromise on quality and always deliver excellence
                </p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Collaboration</h3>
                <p class="text-gray-600">
                    Teamwork and partnership drive our success
                </p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Innovation</h3>
                <p class="text-gray-600">
                    Constantly evolving with cutting-edge solutions
                </p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Reliability</h3>
                <p class="text-gray-600">
                    Dependable solutions you can trust
                </p>
            </div>
        </div>
    </div>
</section>


<!-- Why Choose Us -->
<section class="bg-[#1e3a8a] text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Why Choose Us?
            </h2>
            <p class="text-xl text-blue-100">
                We're committed to your success
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold mb-2">10+ Years Experience</h3>
                    <p class="text-indigo-100">Since 2016, delivering quality parts worldwide</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold mb-2">Expert Team</h3>
                    <p class="text-indigo-100">Skilled professionals in every domain</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold mb-2">Japan Registered</h3>
                    <p class="text-indigo-100">Certified company based in Ibaraki-ken</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold mb-2">24/7 Support</h3>
                    <p class="text-indigo-100">Always here when you need us</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold mb-2">On-Time Delivery</h3>
                    <p class="text-indigo-100">Meeting deadlines, every time</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold mb-2">80+ Brands</h3>
                    <p class="text-blue-100">Japanese and international brands available</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@extends('layouts.app')

@section('title', 'Contact Us - ATC Japan | Get in Touch')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact Us</h1>
        <p class="text-xl text-indigo-100">Get in touch with our team</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Global Offices -->
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Our Global Presence</h2>
                <p class="text-gray-600 mb-10">Visit our offices or reach out to our local representatives worldwide.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- China - Head Office -->
                    <div class="bg-white p-6 rounded-2xl shadow-md border-l-4 border-[#1e3a8a] flex flex-col h-full transform hover:-translate-y-1 transition duration-300">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center text-[#1e3a8a]">
                                <i class="fas fa-building text-xl"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">Head Office</span>
                                <h3 class="text-xl font-bold text-gray-900 leading-tight">China</h3>
                            </div>
                        </div>
                        <div class="flex-grow space-y-3">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-map-marker-alt text-[#1e3a8a] mt-1"></i>
                                <p class="text-sm text-gray-600">
                                    Main Industrial Region, China
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Pakistan -->
                    <div class="bg-white p-6 rounded-2xl shadow-md border-l-4 border-green-600 flex flex-col h-full transform hover:-translate-y-1 transition duration-300">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center text-green-600">
                                <i class="fas fa-globe-asia text-xl"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-bold text-green-600 uppercase tracking-widest">Regional Office</span>
                                <h3 class="text-xl font-bold text-gray-900 leading-tight">Pakistan</h3>
                            </div>
                        </div>
                        <div class="flex-grow space-y-3">
                            
                            <div class="flex items-start gap-3">
                                <i class="fas fa-user-alt text-green-600 mt-1"></i>
                                <p class="text-sm text-gray-600">
                                     Muzaffar khan
                                </p>
                            </div>
                            
                            <div class="flex items-start gap-3">
                                <i class="fas fa-phone-alt text-green-600 mt-1"></i>
                                <p class="text-sm text-gray-600">
                                    <a href="https://wa.me/923082222978" target="_blank" class="flex items-center gap-2 text-green-600"><span>+92 308 2222978</span>
</a>
                                </p>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-map-marker-alt text-green-600 mt-1"></i>
                                <p class="text-sm text-gray-600">
                                    Shop#66, Nouman Center, Main Rashid Minhas Road, Block 5, Gulshan-e-Iqbal, Karachi, Pakistan, 75300
                                </p>
                            </div>
                        </div>
                    </div>

                    
                    <!-- Kuwait -->
                    <div class="bg-white p-6 rounded-2xl shadow-md border-l-4 border-red-600 flex flex-col h-full transform hover:-translate-y-1 transition duration-300">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center text-green-600">
                                <i class="fas fa-globe-asia text-xl"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-bold text-green-600 uppercase tracking-widest">Regional Office</span>
                                <h3 class="text-xl font-bold text-gray-900 leading-tight">Kuwait</h3>
                            </div>
                        </div>
                        <div class="flex-grow space-y-3">
                            
                            <div class="flex items-start gap-3">
                                <i class="fas fa-user-alt text-green-600 mt-1"></i>
                                <p class="text-sm text-gray-600">
                                     Siraj Khan
                                </p>
                            </div>
                            
                            <div class="flex items-start gap-3">
                                <i class="fas fa-phone-alt text-green-600 mt-1"></i>
                                <p class="text-sm text-gray-600">
                                    <a href="https://wa.me/96566396600" target="_blank" class="flex items-center gap-2 text-green-600"><span>+965 6639 6600</span>
</a>
                                </p>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-map-marker-alt text-green-600 mt-1"></i>
                                <p class="text-sm text-gray-600">
                                    Shop#21, Goat Market industrial Alsania Jahra, Kuwait
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Quick Links -->
                    <div class="bg-gradient-to-br from-[#1e3a8a] to-blue-900 p-6 rounded-2xl shadow-lg text-white flex flex-col justify-center gap-4">
                        <h4 class="font-bold text-blue-100 flex items-center gap-2">
                            <i class="fas fa-headset"></i> Quick Connect
                        </h4>
                        <div class="space-y-3">
                            <a href="tel:+819048043444" class="flex items-center gap-3 text-sm hover:text-blue-300 transition">
                                <i class="fas fa-phone-alt"></i> +81 90-4804-3444
                            </a>
                            <a href="https://wa.me/819048043444" class="flex items-center gap-3 text-sm hover:text-green-400 transition font-bold text-green-400">
                                <i class="fab fa-whatsapp text-lg"></i> WhatsApp Support
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50/50 rounded-full -mr-16 -mt-16 z-0"></div>
                <div class="relative z-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Send us a Message</h2>
                    <p class="text-xs text-gray-400 mb-8 uppercase tracking-widest font-bold">Expect a reply within 24 hours</p>
                    
                    @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl flex items-center gap-3">
                        <i class="fas fa-check-circle text-green-500"></i>
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1 ml-1">Full Name *</label>
                            <input type="text" name="name" required
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#1e3a8a] focus:border-transparent transition text-sm"
                                   placeholder="John Doe">
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1 ml-1">Email Address *</label>
                            <input type="email" name="email" required
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#1e3a8a] focus:border-transparent transition text-sm"
                                   placeholder="john@example.com">
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1 ml-1">Subject *</label>
                            <input type="text" name="subject" required
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#1e3a8a] focus:border-transparent transition text-sm"
                                   placeholder="Parts Inquiry">
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1 ml-1">Message *</label>
                            <textarea name="message" rows="4" required
                                      class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#1e3a8a] focus:border-transparent transition text-sm resize-none"
                                      placeholder="Tell us how we can help..."></textarea>
                        </div>

                        <button type="submit"
                                class="w-full bg-[#1e3a8a] hover:bg-blue-900 text-white px-8 py-4 rounded-xl font-bold text-sm transition-all duration-300 shadow-xl hover:shadow-blue-200/50 flex items-center justify-center gap-2 transform active:scale-95">
                            <i class="fas fa-paper-plane"></i>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



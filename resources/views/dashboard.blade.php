<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ATC Japan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <!-- Top Header -->
    <nav class="bg-white shadow-lg border-b border-gray-200 fixed top-0 left-0 right-0 z-50">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-car text-white text-xl"></i>
                        </div>
                        <div class="ml-3">
                            <h1 class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                                ATC JAPAN
                            </h1>
                            <p class="text-xs text-gray-500">Admin Portal</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="hidden md:block text-right">
                        <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                    @foreach(Auth::user()->roles as $role)
                    <span class="px-3 py-1.5 text-xs font-bold rounded-full shadow-sm
                        @if($role->name === 'admin') bg-gradient-to-r from-red-500 to-pink-500 text-white
                        @elseif($role->name === 'manager') bg-gradient-to-r from-blue-500 to-cyan-500 text-white
                        @else bg-gradient-to-r from-green-500 to-emerald-500 text-white
                        @endif">
                        <i class="fas fa-crown mr-1"></i>{{ ucfirst($role->name) }}
                    </span>
                    @endforeach
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-lg transition font-medium flex items-center gap-2">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="fixed left-0 top-16 bottom-0 w-64 bg-white shadow-xl border-r border-gray-200 overflow-y-auto">
        <div class="p-6">
            <!-- User Info Card -->
            <div class="mb-6 p-4 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl border border-indigo-100">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-600">Dashboard</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl shadow-md">
                    <i class="fas fa-home w-5"></i>
                    <span>Dashboard</span>
                </a>

                @can('create users')
                <a href="{{ route('users.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:text-green-700 rounded-xl transition-all group">
                    <i class="fas fa-users w-5 text-green-600"></i>
                    <span>User Management</span>
                </a>
                @endcan

                @if(Auth::user()->hasRole('admin'))
                <div class="pt-2 pb-2 border-t border-gray-200">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase mb-2">Products</p>
                    
                    <a href="{{ route('products.index', ['admin' => 1]) }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-orange-50 hover:to-amber-50 hover:text-orange-700 rounded-xl transition-all group">
                        <i class="fas fa-boxes w-5 text-orange-600"></i>
                        <span>All Products</span>
                    </a>

                    <a href="{{ route('admin.products.create') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 hover:text-purple-700 rounded-xl transition-all group">
                        <i class="fas fa-plus-circle w-5 text-purple-600"></i>
                        <span>Add New Product</span>
                    </a>

                    <a href="{{ route('products.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 hover:text-blue-700 rounded-xl transition-all group">
                        <i class="fas fa-eye w-5 text-blue-600"></i>
                        <span>Public Products</span>
                    </a>
                </div>

                <div class="pt-2 pb-2 border-t border-gray-200">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase mb-2">Car Parts</p>
                    
                    <a href="{{ route('car-parts.index', ['admin' => 1]) }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-teal-50 hover:to-cyan-50 hover:text-teal-700 rounded-xl transition-all group">
                        <i class="fas fa-cogs w-5 text-teal-600"></i>
                        <span>All Car Parts</span>
                    </a>

                    <a href="{{ route('admin.car-parts.create') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 hover:text-purple-700 rounded-xl transition-all group">
                        <i class="fas fa-plus-circle w-5 text-purple-600"></i>
                        <span>Add New Car Part</span>
                    </a>

                    <a href="{{ route('car-parts.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 hover:text-blue-700 rounded-xl transition-all group">
                        <i class="fas fa-eye w-5 text-blue-600"></i>
                        <span>Public Car Parts</span>
                    </a>
                </div>

                <div class="pt-2 pb-2 border-t border-gray-200">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase mb-2">Sliders</p>
                    
                    <a href="{{ route('admin.sliders.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-pink-50 hover:to-rose-50 hover:text-pink-700 rounded-xl transition-all group">
                        <i class="fas fa-images w-5 text-pink-600"></i>
                        <span>Manage Sliders</span>
                    </a>

                    <a href="{{ route('admin.sliders.create') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-rose-50 hover:to-red-50 hover:text-rose-700 rounded-xl transition-all group">
                        <i class="fas fa-plus-circle w-5 text-rose-600"></i>
                        <span>Add New Slider</span>
                    </a>
                </div>

                <div class="pt-2 pb-2 border-t border-gray-200">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase mb-2">Enquiries</p>
                    
                    <a href="{{ route('admin.enquiries.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-amber-50 hover:to-orange-50 hover:text-amber-700 rounded-xl transition-all group">
                        <i class="fas fa-envelope w-5 text-amber-600"></i>
                        <span>All Enquiries</span>
                    </a>
                </div>

                <div class="pt-2 pb-2 border-t border-gray-200">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase mb-2">Quick Stats</p>
                    
                    <div class="px-4 py-3 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-medium text-gray-600">Products</span>
                            <span class="text-lg font-bold text-indigo-600">{{ \App\Models\Product::count() }}</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-medium text-gray-600">Car Parts</span>
                            <span class="text-lg font-bold text-teal-600">{{ \App\Models\CarPart::count() }}</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-medium text-gray-600">Sliders</span>
                            <span class="text-lg font-bold text-pink-600">{{ \App\Models\Slider::count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-gray-600">Users</span>
                            <span class="text-lg font-bold text-purple-600">{{ \App\Models\User::count() }}</span>
                        </div>
                    </div>
                </div>
                @endif
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 mt-16 p-6 md:p-8 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="w-full space-y-6">
            <!-- Welcome Section with Gradient -->
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 overflow-hidden shadow-xl rounded-2xl">
                <div class="px-8 py-10 sm:p-12">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-3xl font-bold text-white mb-2 flex items-center gap-3">
                                <i class="fas fa-hand-sparkles"></i>
                                Welcome Back, {{ Auth::user()->name }}!
                            </h2>
                            <p class="text-indigo-100 text-lg">{{ Auth::user()->email }}</p>
                            <p class="text-white/80 mt-4">Manage your products, users, and business operations from this dashboard.</p>
                        </div>
                        <div class="hidden lg:block">
                            <div class="w-32 h-32 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center">
                                <i class="fas fa-user-circle text-white text-7xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @if(Auth::user()->hasRole('admin'))
            <div class="mt-6 bg-red-50 border border-red-200 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Admin Access</h3>
                        <p class="mt-1 text-sm text-red-700">You have administrator privileges. You can access all features and manage users.</p>
                    </div>
                </div>
            </div>
            @elseif(Auth::user()->hasRole('manager'))
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">Manager Access</h3>
                        <p class="mt-1 text-sm text-blue-700">You have manager privileges. You can manage team members and access management features.</p>
                    </div>
                </div>
            </div>
            @else
            <div class="mt-6 bg-green-50 border border-green-200 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-green-800">User Access</h3>
                        <p class="mt-1 text-sm text-green-700">You have standard user access. You can view and manage your own content.</p>
                    </div>
                </div>
            </div>
            @endif

            
            <!-- Quick Stats for Admin -->
            @if(Auth::user()->hasRole('admin'))
            <div class="mt-6 bg-white overflow-hidden shadow-xl rounded-2xl border border-gray-100">
                <div class="px-6 py-6 sm:p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <i class="fas fa-chart-line text-indigo-600"></i>
                        Quick Stats
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="relative overflow-hidden text-center p-6 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
                            <div class="relative">
                                <i class="fas fa-box text-white/80 text-3xl mb-3"></i>
                                <div class="text-4xl font-bold text-white mb-2">{{ \App\Models\Product::count() }}</div>
                                <div class="text-sm text-indigo-100 font-medium">Total Products</div>
                            </div>
                        </div>
                        <div class="relative overflow-hidden text-center p-6 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
                            <div class="relative">
                                <i class="fas fa-cogs text-white/80 text-3xl mb-3"></i>
                                <div class="text-4xl font-bold text-white mb-2">{{ \App\Models\CarPart::count() }}</div>
                                <div class="text-sm text-teal-100 font-medium">Total Car Parts</div>
                            </div>
                        </div>
                        <div class="relative overflow-hidden text-center p-6 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
                            <div class="relative">
                                <i class="fas fa-check-circle text-white/80 text-3xl mb-3"></i>
                                <div class="text-4xl font-bold text-white mb-2">{{ \App\Models\Product::where('is_available', true)->count() + \App\Models\CarPart::where('is_available', true)->count() }}</div>
                                <div class="text-sm text-green-100 font-medium">Available Items</div>
                            </div>
                        </div>
                        <div class="relative overflow-hidden text-center p-6 bg-gradient-to-br from-pink-500 to-rose-600 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
                            <div class="relative">
                                <i class="fas fa-users text-white/80 text-3xl mb-3"></i>
                                <div class="text-4xl font-bold text-white mb-2">{{ \App\Models\User::count() }}</div>
                                <div class="text-sm text-pink-100 font-medium">Total Users</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </main>
</body>
</html>


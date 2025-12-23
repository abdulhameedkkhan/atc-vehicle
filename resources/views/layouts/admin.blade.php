<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - ATC Japan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100">
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
                        <p class="text-xs text-gray-600">@yield('page-subtitle', 'Admin Portal')</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-700 rounded-xl transition-all group {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white' : '' }}">
                    <i class="fas fa-home w-5 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-indigo-600' }}"></i>
                    <span>Dashboard</span>
                </a>

                @can('create users')
                <a href="{{ route('users.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:text-green-700 rounded-xl transition-all group {{ request()->routeIs('users.*') ? 'bg-gradient-to-r from-green-600 to-emerald-600 text-white' : '' }}">
                    <i class="fas fa-users w-5 {{ request()->routeIs('users.*') ? 'text-white' : 'text-green-600' }}"></i>
                    <span>User Management</span>
                </a>
                @endcan

                @if(Auth::check() && Auth::user()->hasRole('admin'))
                <div class="pt-2 pb-2 border-t border-gray-200">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase mb-2">Products</p>
                    
                    <a href="{{ route('products.index', ['admin' => 1]) }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-orange-50 hover:to-amber-50 hover:text-orange-700 rounded-xl transition-all group {{ (request()->is('products') && request()->has('admin')) || request()->routeIs('admin.products.edit') ? 'bg-gradient-to-r from-orange-600 to-amber-600 text-white' : '' }}">
                        <i class="fas fa-boxes w-5 {{ (request()->is('products') && request()->has('admin')) || request()->routeIs('admin.products.edit') ? 'text-white' : 'text-orange-600' }}"></i>
                        <span>All Products</span>
                    </a>

                    <a href="{{ route('admin.products.create') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 hover:text-purple-700 rounded-xl transition-all group {{ request()->routeIs('admin.products.create') ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white' : '' }}">
                        <i class="fas fa-plus-circle w-5 {{ request()->routeIs('admin.products.create') ? 'text-white' : 'text-purple-600' }}"></i>
                        <span>Add New Product</span>
                    </a>

                    <a href="{{ route('products.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 hover:text-blue-700 rounded-xl transition-all group">
                        <i class="fas fa-eye w-5 text-blue-600"></i>
                        <span>Public Products</span>
                    </a>
                </div>

                <div class="pt-2 pb-2 border-t border-gray-200">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase mb-2">Car Parts</p>
                    
                    <a href="{{ route('car-parts.index', ['admin' => 1]) }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-teal-50 hover:to-cyan-50 hover:text-teal-700 rounded-xl transition-all group {{ (request()->is('car-parts') && request()->has('admin')) || request()->routeIs('admin.car-parts.edit') ? 'bg-gradient-to-r from-teal-600 to-cyan-600 text-white' : '' }}">
                        <i class="fas fa-cog w-5 {{ (request()->is('car-parts') && request()->has('admin')) || request()->routeIs('admin.car-parts.edit') ? 'text-white' : 'text-teal-600' }}"></i>
                        <span>All Car Parts</span>
                    </a>

                    <a href="{{ route('admin.car-parts.create') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:text-green-700 rounded-xl transition-all group {{ request()->routeIs('admin.car-parts.create') ? 'bg-gradient-to-r from-green-600 to-emerald-600 text-white' : '' }}">
                        <i class="fas fa-plus-circle w-5 {{ request()->routeIs('admin.car-parts.create') ? 'text-white' : 'text-green-600' }}"></i>
                        <span>Add New Part</span>
                    </a>

                    <a href="{{ route('car-parts.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 hover:text-blue-700 rounded-xl transition-all group">
                        <i class="fas fa-eye w-5 text-blue-600"></i>
                        <span>Public Parts</span>
                    </a>
                </div>

                <div class="pt-2 pb-2 border-t border-gray-200">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase mb-2">Sliders</p>
                    
                    <a href="{{ route('admin.sliders.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-pink-50 hover:to-rose-50 hover:text-pink-700 rounded-xl transition-all group {{ request()->routeIs('admin.sliders.index') || request()->routeIs('admin.sliders.edit') ? 'bg-gradient-to-r from-pink-600 to-rose-600 text-white' : '' }}">
                        <i class="fas fa-images w-5 {{ request()->routeIs('admin.sliders.index') || request()->routeIs('admin.sliders.edit') ? 'text-white' : 'text-pink-600' }}"></i>
                        <span>Manage Sliders</span>
                    </a>

                    <a href="{{ route('admin.sliders.create') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-rose-50 hover:to-red-50 hover:text-rose-700 rounded-xl transition-all group {{ request()->routeIs('admin.sliders.create') ? 'bg-gradient-to-r from-rose-600 to-red-600 text-white' : '' }}">
                        <i class="fas fa-plus-circle w-5 {{ request()->routeIs('admin.sliders.create') ? 'text-white' : 'text-rose-600' }}"></i>
                        <span>Add New Slider</span>
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
    <main class="ml-64 mt-16 p-8 min-h-screen">
        @yield('content')
    </main>
</body>
</html>


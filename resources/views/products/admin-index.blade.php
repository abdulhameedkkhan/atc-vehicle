<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - ATC Japan</title>
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
                        <p class="text-xs text-gray-600">Products Management</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-700 rounded-xl transition-all group">
                    <i class="fas fa-home w-5 text-indigo-600"></i>
                    <span>Dashboard</span>
                </a>

                @can('create users')
                <a href="{{ route('users.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:text-green-700 rounded-xl transition-all group">
                    <i class="fas fa-users w-5 text-green-600"></i>
                    <span>User Management</span>
                </a>
                @endcan

                @hasRole('admin')
                <div class="pt-2 pb-2 border-t border-gray-200">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase mb-2">Products</p>
                    
                    <a href="{{ route('products.index', ['admin' => 1]) }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold bg-gradient-to-r from-orange-600 to-amber-600 text-white rounded-xl shadow-md">
                        <i class="fas fa-boxes w-5"></i>
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
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase mb-2">Quick Stats</p>
                    
                    <div class="px-4 py-3 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-medium text-gray-600">Products</span>
                            <span class="text-lg font-bold text-indigo-600">{{ \App\Models\Product::count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-gray-600">Users</span>
                            <span class="text-lg font-bold text-purple-600">{{ \App\Models\User::count() }}</span>
                        </div>
                    </div>
                </div>
                @endhasRole
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 mt-16 p-8 min-h-screen">
<section>
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-orange-600 to-amber-600 bg-clip-text text-transparent mb-2 flex items-center gap-3">
                    <i class="fas fa-boxes text-orange-600"></i>
                    Products Management
                </h1>
                <p class="text-gray-600">View, edit, and manage all your products</p>
            </div>
            <div>
                <a href="{{ route('admin.products.create') }}" 
                   class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 flex items-center gap-2">
                    <i class="fas fa-plus-circle"></i> Add New Product
                </a>
            </div>
        </div>

        @if(session('success'))
        <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 text-green-800 px-6 py-4 rounded-xl shadow-sm flex items-center gap-3">
            <i class="fas fa-check-circle text-green-600 text-xl"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
        @endif

        <div class="bg-white shadow-xl overflow-hidden rounded-2xl border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Brand</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Stock</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($products as $product)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="relative group">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" 
                                     class="w-20 h-20 object-cover rounded-xl shadow-md group-hover:shadow-lg transition-shadow duration-300 border-2 border-gray-100">
                                @if($product->video)
                                <div class="absolute top-1 right-1 bg-red-500 rounded-full p-1">
                                    <i class="fas fa-video text-white text-xs"></i>
                                </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-gray-900">{{ $product->name }}</div>
                            @if($product->part_number)
                            <div class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                                <i class="fas fa-barcode"></i> {{ $product->part_number }}
                            </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1.5 text-xs font-bold rounded-lg bg-gradient-to-r from-indigo-100 to-purple-100 text-indigo-800 border border-indigo-200">
                                {{ $product->brand }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-700 font-medium">{{ $product->category }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($product->price)
                            <span class="text-sm font-bold text-green-600">${{ number_format($product->price, 2) }}</span>
                            @else
                            <span class="text-sm text-gray-400 italic">N/A</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded-lg {{ $product->stock_quantity > 0 ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-600' }}">
                                {{ $product->stock_quantity }} units
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($product->is_available)
                            <span class="px-3 py-1.5 text-xs font-bold rounded-lg bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200 flex items-center gap-1 w-fit">
                                <i class="fas fa-check-circle"></i> Available
                            </span>
                            @else
                            <span class="px-3 py-1.5 text-xs font-bold rounded-lg bg-gradient-to-r from-red-100 to-pink-100 text-red-800 border border-red-200 flex items-center gap-1 w-fit">
                                <i class="fas fa-times-circle"></i> Unavailable
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('products.show', $product->hashid) }}" 
                                   class="px-3 py-1.5 bg-indigo-100 text-indigo-700 hover:bg-indigo-200 rounded-lg transition-colors duration-200 flex items-center gap-1 text-xs font-semibold">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('admin.products.edit', $product->hashid) }}" 
                                   class="px-3 py-1.5 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg transition-colors duration-200 flex items-center gap-1 text-xs font-semibold">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->hashid) }}" method="POST" class="inline" 
                                      onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 bg-red-100 text-red-700 hover:bg-red-200 rounded-lg transition-colors duration-200 flex items-center gap-1 text-xs font-semibold">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-box-open text-gray-300 text-6xl mb-4"></i>
                                <p class="text-gray-500 text-lg mb-4">No products found</p>
                                <a href="{{ route('admin.products.create') }}" 
                                   class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 flex items-center gap-2 shadow-lg">
                                    <i class="fas fa-plus-circle"></i> Create Your First Product
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
        <div class="mt-4">
            {{ $products->links() }}
        </div>
        @endif
    </div>
</section>
    </main>
</body>
</html>


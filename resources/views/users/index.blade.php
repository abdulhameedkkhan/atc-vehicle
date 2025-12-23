@extends('layouts.admin')

@section('title', 'Users Management')

@section('content')
<div>
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Users Management</h1>
            <p class="text-gray-600 mt-2">Manage all system users and their roles</p>
        </div>
        <a href="{{ route('users.create') }}" class="bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white px-6 py-3 rounded-lg font-semibold shadow-lg transition flex items-center gap-2">
            <i class="fas fa-plus-circle"></i> Create New User
        </a>
    </div>

    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-center">
        <i class="fas fa-exclamation-circle mr-2"></i>
        {{ session('error') }}
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <i class="fas fa-user mr-2"></i>User
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <i class="fas fa-envelope mr-2"></i>Email
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <i class="fas fa-shield-alt mr-2"></i>Role
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <i class="fas fa-calendar mr-2"></i>Created At
                        </th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <i class="fas fa-cog mr-2"></i>Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-bold text-gray-900">{{ $user->name }}</div>
                                    <div class="text-xs text-gray-500">ID: {{ $user->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-700">{{ $user->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex flex-wrap gap-1">
                                @forelse($user->roles as $role)
                                <span class="px-3 py-1.5 text-xs font-bold rounded-lg shadow-sm
                                    @if($role->name === 'admin') bg-gradient-to-r from-red-100 to-pink-100 text-red-800 border border-red-200
                                    @elseif($role->name === 'manager') bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-800 border border-blue-200
                                    @else bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200
                                    @endif">
                                    <i class="fas fa-crown mr-1"></i>{{ ucfirst($role->name) }}
                                </span>
                                @empty
                                <span class="px-3 py-1.5 text-xs font-bold rounded-lg bg-gray-100 text-gray-600">
                                    No Role
                                </span>
                                @endforelse
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <i class="fas fa-clock mr-1"></i>{{ $user->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('users.edit', $user) }}" class="px-3 py-1.5 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg transition-colors duration-200 flex items-center gap-1 text-xs font-semibold">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                @if($user->id !== Auth::id())
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 bg-red-100 text-red-700 hover:bg-red-200 rounded-lg transition-colors duration-200 flex items-center gap-1 text-xs font-semibold">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                                @else
                                <span class="px-3 py-1.5 bg-gray-100 text-gray-400 rounded-lg text-xs font-semibold cursor-not-allowed">
                                    <i class="fas fa-lock"></i> You
                                </span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-users text-gray-300 text-6xl mb-4"></i>
                            <p class="text-lg">No users found.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($users->hasPages())
    <div class="mt-6">
        {{ $users->links() }}
    </div>
    @endif

    <!-- Stats Summary -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Users</p>
                    <p class="text-3xl font-bold text-blue-600">{{ $users->total() }}</p>
                </div>
                <div class="h-12 w-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-6 border border-green-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Today</p>
                    <p class="text-3xl font-bold text-green-600">{{ $users->where('updated_at', '>=', now()->startOfDay())->count() }}</p>
                </div>
                <div class="h-12 w-12 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-user-check text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 border border-purple-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Admins</p>
                    <p class="text-3xl font-bold text-purple-600">{{ \App\Models\User::role('admin')->count() }}</p>
                </div>
                <div class="h-12 w-12 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-crown text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

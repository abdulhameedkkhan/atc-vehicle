@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div>
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
            <a href="{{ route('users.index') }}" class="hover:text-blue-600 transition">
                <i class="fas fa-users"></i> Users
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-gray-900 font-medium">Edit User</span>
        </div>
        <h1 class="text-3xl font-bold text-gray-900">Edit User: {{ $user->name }}</h1>
        <p class="text-gray-600 mt-2">Update user information and role</p>
    </div>

    <!-- User Info Card -->
    <div class="mb-6 bg-gradient-to-r from-indigo-50 to-purple-50 border border-indigo-200 rounded-xl p-6">
        <div class="flex items-center gap-4">
            <div class="h-16 w-16 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-2xl font-bold">
                {{ substr($user->name, 0, 1) }}
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-900">{{ $user->name }}</h3>
                <p class="text-sm text-gray-600">{{ $user->email }}</p>
                <div class="flex gap-2 mt-2">
                    @foreach($user->roles as $role)
                    <span class="px-3 py-1 text-xs font-bold rounded-lg
                        @if($role->name === 'admin') bg-red-100 text-red-800
                        @elseif($role->name === 'manager') bg-blue-100 text-blue-800
                        @else bg-green-100 text-green-800
                        @endif">
                        <i class="fas fa-crown mr-1"></i>{{ ucfirst($role->name) }}
                    </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-user mr-2 text-indigo-600"></i>Full Name *
                    </label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition @error('name') border-red-500 @enderror"
                           placeholder="Enter user's full name">
                    @error('name')
                    <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-blue-600"></i>Email Address *
                    </label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('email') border-red-500 @enderror"
                           placeholder="user@example.com">
                    @error('email')
                    <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-green-600"></i>New Password
                    </label>
                    <input type="password" name="password"
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition @error('password') border-red-500 @enderror"
                           placeholder="Leave blank to keep current">
                    @error('password')
                    <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1">
                        <i class="fas fa-info-circle mr-1"></i>Leave blank to keep current password
                    </p>
                </div>

                <!-- Password Confirmation -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-green-600"></i>Confirm New Password
                    </label>
                    <input type="password" name="password_confirmation"
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                           placeholder="Re-enter new password">
                </div>

                <!-- Role -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-crown mr-2 text-purple-600"></i>User Role *
                    </label>
                    <select name="role" required
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition @error('role') border-red-500 @enderror">
                        <option value="">Select a role...</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->name }}" 
                            {{ (old('role', $user->roles->first()?->name) == $role->name) ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                        @endforeach
                    </select>
                    @error('role')
                    <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-2">
                        <i class="fas fa-info-circle mr-1"></i>Current role: <span class="font-semibold">{{ ucfirst($user->roles->first()?->name ?? 'None') }}</span>
                    </p>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex items-center gap-4 mt-8 pt-6 border-t border-gray-200">
                <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-8 py-3 rounded-lg font-semibold shadow-lg transition flex items-center gap-2">
                    <i class="fas fa-save"></i> Update User
                </button>
                <a href="{{ route('users.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-3 rounded-lg font-semibold transition flex items-center gap-2">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>

    <!-- Activity Summary -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Account Created</p>
                    <p class="text-lg font-bold text-blue-600">{{ $user->created_at->format('M d, Y') }}</p>
                </div>
                <div class="h-12 w-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-calendar-plus text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-6 border border-green-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Last Updated</p>
                    <p class="text-lg font-bold text-green-600">{{ $user->updated_at->format('M d, Y') }}</p>
                </div>
                <div class="h-12 w-12 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-sync text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 border border-purple-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">User ID</p>
                    <p class="text-lg font-bold text-purple-600">#{{ $user->id }}</p>
                </div>
                <div class="h-12 w-12 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-hashtag text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

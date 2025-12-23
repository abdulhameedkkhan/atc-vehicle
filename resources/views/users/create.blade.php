@extends('layouts.admin')

@section('title', 'Create User')

@section('content')
<div>
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
            <a href="{{ route('users.index') }}" class="hover:text-blue-600 transition">
                <i class="fas fa-users"></i> Users
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-gray-900 font-medium">Create New User</span>
        </div>
        <h1 class="text-3xl font-bold text-gray-900">Create New User</h1>
        <p class="text-gray-600 mt-2">Add a new user to the system with specific role</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-user mr-2 text-indigo-600"></i>Full Name *
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" required
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
                    <input type="email" name="email" value="{{ old('email') }}" required
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
                        <i class="fas fa-lock mr-2 text-green-600"></i>Password *
                    </label>
                    <input type="password" name="password" required
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition @error('password') border-red-500 @enderror"
                           placeholder="Enter secure password">
                    @error('password')
                    <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-green-600"></i>Confirm Password *
                    </label>
                    <input type="password" name="password_confirmation" required
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                           placeholder="Re-enter password">
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
                        <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
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
                        <i class="fas fa-info-circle mr-1"></i>Select appropriate role based on user's responsibilities
                    </p>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex items-center gap-4 mt-8 pt-6 border-t border-gray-200">
                <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-8 py-3 rounded-lg font-semibold shadow-lg transition flex items-center gap-2">
                    <i class="fas fa-save"></i> Create User
                </button>
                <a href="{{ route('users.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-3 rounded-lg font-semibold transition flex items-center gap-2">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>

    <!-- Info Card -->
    <div class="mt-6 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-6">
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <div class="h-12 w-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-info-circle text-blue-600 text-xl"></i>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">User Creation Guidelines</h3>
                <ul class="text-sm text-gray-700 space-y-1">
                    <li><i class="fas fa-check text-green-600 mr-2"></i>Password must be at least 8 characters long</li>
                    <li><i class="fas fa-check text-green-600 mr-2"></i>Email must be unique and valid</li>
                    <li><i class="fas fa-check text-green-600 mr-2"></i>Assign appropriate role based on user responsibilities</li>
                    <li><i class="fas fa-check text-green-600 mr-2"></i>User will receive credentials via email (if configured)</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

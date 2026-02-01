<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - ATC Japan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <div class="flex justify-center">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center shadow-lg">
                    <i class="fas fa-key text-white text-2xl"></i>
                </div>
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Forgot Password?
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Enter your email and we'll send you an OTP to reset your password
            </p>
        </div>

        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
            {{ session('error') }}
        </div>
        @endif

        <form class="mt-8 space-y-6 bg-white p-8 rounded-xl shadow-lg" action="{{ route('forgot-password') }}" method="POST">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                <input id="email" name="email" type="email" autocomplete="email" required 
                       class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm @error('email') border-red-500 @enderror" 
                       placeholder="Enter your email" value="{{ old('email') }}">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Send Reset OTP
                </button>
            </div>
        </form>

        <div class="text-center space-y-2">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900 block">
                <i class="fas fa-arrow-left mr-1"></i> Back to Login
            </a>
            <p class="text-xs text-gray-500">
                Remember your password?
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-500 font-medium">
                    Sign in
                </a>
            </p>
        </div>
    </div>
</body>
</html>

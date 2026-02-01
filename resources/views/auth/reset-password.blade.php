<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - ATC Japan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <div class="flex justify-center">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center shadow-lg">
                    <i class="fas fa-lock text-white text-2xl"></i>
                </div>
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Reset Password
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Enter the OTP and your new password
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

        <form class="mt-8 space-y-6 bg-white p-8 rounded-xl shadow-lg" action="{{ route('reset-password') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="otp" class="block text-sm font-medium text-gray-700 mb-2">Enter OTP *</label>
                    <input id="otp" name="otp" type="text" maxlength="6" pattern="[0-9]{6}" required 
                           class="appearance-none relative block w-full px-4 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-center text-xl tracking-widest font-bold @error('otp') border-red-500 @enderror" 
                           placeholder="000000" value="{{ old('otp') }}">
                    @error('otp')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password *</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required 
                           class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm @error('password') border-red-500 @enderror" 
                           placeholder="Minimum 8 characters">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password *</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required 
                           class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                           placeholder="Confirm your password">
                </div>
            </div>

            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-check-circle mr-2"></i>
                    Reset Password
                </button>
            </div>
        </form>

        <div class="text-center">
            <a href="{{ route('forgot-password') }}" class="text-sm text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left mr-1"></i> Back to Forgot Password
            </a>
        </div>
    </div>

    <script>
        // Auto-format OTP input
        document.getElementById('otp').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>
</html>

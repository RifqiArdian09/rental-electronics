<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Pembeli | RentalElektronik</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .auth-bg {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        .auth-card {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border-radius: 12px;
        }
        .btn-primary {
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>
<body class="auth-bg flex items-center justify-center min-h-screen p-4">
    <div class="auth-card bg-white p-8 w-full max-w-md">
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <i class="fas fa-microchip text-4xl text-blue-600"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800">Masuk ke Akun Anda</h2>
            <p class="text-gray-600 mt-2">Silakan masuk untuk melanjutkan</p>
        </div>

        @if($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                    <span class="text-red-700 font-medium">{{ $errors->first() }}</span>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('auth.customer-login') }}" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="email">Alamat Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="email@contoh.com">
                </div>
            </div>

            <div class="space-y-2">
                <div class="flex justify-between items-center">
                    <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-500">Lupa password?</a>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input id="password" type="password" name="password" required
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="••••••••">
                </div>
            </div>

            <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember-me" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
            </div>

            <button type="submit" class="w-full btn-primary bg-blue-600 text-white py-3 px-4 rounded-md font-medium flex items-center justify-center">
                <i class="fas fa-sign-in-alt mr-2"></i> Masuk
            </button>
        </form>

        <div class="mt-6">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Atau masuk dengan</span>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-2 gap-3">
                <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                    <i class="fab fa-google text-red-500 mr-2"></i> Google
                </a>
                <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                    <i class="fab fa-facebook-f text-blue-600 mr-2"></i> Facebook
                </a>
            </div>
        </div>

        <p class="mt-8 text-center text-sm text-gray-600">
            Belum punya akun? 
            <a href="{{ route('auth.customer-register') }}" class="font-medium text-blue-600 hover:text-blue-500">Daftar sekarang</a>
        </p>
    </div>
</body>
</html>
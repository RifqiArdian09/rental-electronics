<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Pembeli | RentalElektronik</title>
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
        .btn-success {
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6b7280;
        }
    </style>
</head>
<body class="auth-bg flex items-center justify-center min-h-screen p-4">
    <div class="auth-card bg-white p-8 w-full max-w-md">
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <i class="fas fa-microchip text-4xl text-green-600"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800">Buat Akun Baru</h2>
            <p class="text-gray-600 mt-2">Bergabung dengan RentalElektronik</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-circle text-red-500 mt-1 mr-2"></i>
                    <div>
                        <h4 class="text-sm font-medium text-red-700">Terdapat kesalahan:</h4>
                        <ul class="list-disc list-inside text-sm text-red-600 mt-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('auth.customer-register') }}" class="space-y-5">
            @csrf

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="name">Nama Lengkap</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                        placeholder="Nama lengkap Anda">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="email">Alamat Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                        placeholder="email@contoh.com">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="profession">Profesi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-briefcase text-gray-400"></i>
                    </div>
                    <input id="profession" type="text" name="profession" value="{{ old('profession') }}"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                        placeholder="Pekerjaan Anda">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input id="password" type="password" name="password" required
                        class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                        placeholder="••••••••">
                    <span class="password-toggle" onclick="togglePassword('password')">
                        <i class="far fa-eye"></i>
                    </span>
                </div>
                <p class="text-xs text-gray-500 mt-1">Minimal 8 karakter</p>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="password_confirmation">Konfirmasi Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                        placeholder="••••••••">
                    <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                        <i class="far fa-eye"></i>
                    </span>
                </div>
            </div>

            <div class="flex items-center">
                <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                <label for="terms" class="ml-2 block text-sm text-gray-700">
                    Saya menyetujui <a href="#" class="text-green-600 hover:text-green-500">Syarat & Ketentuan</a>
                </label>
            </div>

            <button type="submit" class="w-full btn-success bg-blue-600 text-white py-3 px-4 rounded-md font-medium flex items-center justify-center">
                <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
            </button>
        </form>


        <p class="mt-8 text-center text-sm text-gray-600">
            Sudah punya akun? 
            <a href="{{ route('auth.customer-login') }}" class="font-medium text-green-600 hover:text-green-500">Masuk di sini</a>
        </p>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling.querySelector('i');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Sewa alat elektronik berkualitas dengan mudah dan cepat. Temukan berbagai produk elektronik unggulan untuk kebutuhan Anda di Rental Elektronik.">
  <title>@yield('title', 'Rental Elektronik | Sewa Alat Elektronik Berkualitas')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#4F46E5',
            secondary: '#10B981',
            dark: '#1F2937',
            light: '#F9FAFB',
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          },
        }
      }
    }
  </script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    body {
      font-family: 'Inter', sans-serif;
    }

    .hero-gradient {
      background: linear-gradient(135deg, #4F46E5 0%, #10B981 100%);
    }

    .card-hover {
      transition: all 0.3s ease;
    }

    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .nav-link {
      position: relative;
    }

    .nav-link:after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -2px;
      left: 0;
      background-color: #4F46E5;
      transition: width 0.3s ease;
    }

    .nav-link:hover:after {
      width: 100%;
    }
  </style>
</head>
</head>
<body class="bg-light text-dark">

  {{-- Navbar --}}
  @include('partials.navbar')

  {{-- Konten Utama --}}
  <main>
    @yield('content')
  </main>

  {{-- Modal Login --}}
  <div id="loginModal" role="dialog" aria-modal="true" aria-labelledby="loginModalTitle" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-lg w-full max-w-md">
      <div class="p-6">
        <div class="flex justify-between items-center mb-4">
          <h3 id="loginModalTitle" class="text-xl font-bold">Login Diperlukan</h3>
          <button type="button" onclick="closeLoginModal()" class="text-gray-500 hover:text-gray-700">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <p class="mb-6">Anda harus login terlebih dahulu untuk menyewa produk.</p>
        <div class="flex space-x-4">
          <a href="{{ route('auth.customer-login') }}" class="flex-1 bg-blue-600 text-white py-2 px-4 rounded text-center hover:bg-blue-700 transition">
            Login
          </a>
          <a href="{{ route('auth.customer-register') }}" class="flex-1 border border-blue-600 text-blue-600 py-2 px-4 rounded text-center hover:bg-blue-50 transition">
            Daftar
          </a>
        </div>
      </div>
    </div>
  </div>

  {{-- Footer --}}
  @include('partials.footer')

  {{-- Floating WhatsApp Button --}}
  <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer"
     class="fixed bottom-6 right-6 bg-green-500 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:bg-green-600 transition z-50"
     aria-label="Chat via WhatsApp">
    <i class="fab fa-whatsapp text-2xl"></i>
  </a>

  {{-- Script Modal --}}
  <script>
    function showLoginModal() {
      document.getElementById('loginModal').classList.remove('hidden');
    }

    function closeLoginModal() {
      document.getElementById('loginModal').classList.add('hidden');
    }
  </script>
</body>
</html>
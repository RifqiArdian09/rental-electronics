<nav class="bg-white shadow-sm sticky top-0 z-50">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-3 md:py-4 flex justify-between items-center">
    <!-- Logo/Brand -->
    <a href="/" class="text-xl md:text-2xl font-bold text-primary flex items-center">
      <svg class="w-6 h-6 md:w-7 md:h-7 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path>
      </svg>
      <span>RentalElektronik</span>
    </a>

    <!-- Desktop Navigation -->
    <div class="hidden md:flex space-x-6 lg:space-x-8 items-center">
      <a href="#tools" class="nav-link font-medium text-gray-700 hover:text-primary transition-colors duration-200">Produk</a>
      <a href="#features" class="nav-link font-medium text-gray-700 hover:text-primary transition-colors duration-200">Fitur</a>
      <a href="#about" class="nav-link font-medium text-gray-700 hover:text-primary transition-colors duration-200">Tentang</a>
      <a href="#testimonials" class="nav-link font-medium text-gray-700 hover:text-primary transition-colors duration-200">Testimoni</a>

      @auth('customer')
        <div class="relative group ml-2">
          <button class="flex items-center space-x-2 focus:outline-none">
            <img
              src="{{ auth('customer')->user()->photo_url 
                ? asset('storage/' . auth('customer')->user()->photo_url) 
                : 'https://ui-avatars.com/api/?name=' . urlencode(auth('customer')->user()->name) . '&background=random' }}"
              alt="Foto Profil"
              class="w-8 h-8 md:w-10 md:h-10 rounded-full object-cover border border-gray-200"
              loading="lazy"
            />
            <span class="font-medium text-gray-700 hidden lg:inline">{{ auth('customer')->user()->name }}</span>
            <svg class="w-4 h-4 text-gray-500 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          
          <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block hover:block origin-top-right transition-all duration-100">
            <div class="px-4 py-2 border-b border-gray-100">
              <p class="text-sm font-medium text-gray-800 truncate">{{ auth('customer')->user()->name }}</p>
              <p class="text-xs text-gray-500 truncate">{{ auth('customer')->user()->email }}</p>
            </div>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
              <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
              Profil Saya
            </a>
            <a href="{{ route('rental.history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
              <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              Riwayat Sewa
            </a>
            <form method="POST" action="{{ route('customer.logout') }}">
              @csrf
              <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-50 transition-colors duration-150">
                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Logout
              </button>
            </form>
          </div>
        </div>
      @else
        <button onclick="openLoginModal()" class="font-medium text-gray-700 hover:text-primary transition-colors duration-200 px-3 py-1.5 border border-gray-300 rounded-lg hover:border-primary">
          Login
        </button>
      @endauth
    </div>

    <!-- Mobile Menu Button -->
    <button id="mobileMenuButton" class="md:hidden text-gray-700 hover:text-primary transition-colors duration-200 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-200">
    <div class="container mx-auto px-4 py-3 space-y-4">
      <a href="#tools" class="block py-2 text-gray-700 hover:text-primary transition-colors duration-200">Produk</a>
      <a href="#features" class="block py-2 text-gray-700 hover:text-primary transition-colors duration-200">Fitur</a>
      <a href="#about" class="block py-2 text-gray-700 hover:text-primary transition-colors duration-200">Tentang</a>
      <a href="#testimonials" class="block py-2 text-gray-700 hover:text-primary transition-colors duration-200">Testimoni</a>

      @auth('customer')
        <div class="pt-2 border-t border-gray-100">
          <a href="#" class="block py-2 text-gray-700 hover:text-primary transition-colors duration-200">
            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            Profil Saya
          </a>
          <a href="{{ route('rental.history') }}" class="block py-2 text-gray-700 hover:text-primary transition-colors duration-200">
            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Riwayat Sewa
          </a>
          <form method="POST" action="{{ route('customer.logout') }}">
            @csrf
            <button type="submit" class="w-full text-left py-2 text-red-600 hover:text-red-700 transition-colors duration-200">
              <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
              </svg>
              Logout
            </button>
          </form>
        </div>
      @else
        <div class="pt-2 border-t border-gray-100 space-y-2">
          <button onclick="openLoginModal()" class="w-full text-left py-2 px-3 bg-primary text-white rounded-lg font-medium">
            Login Customer
          </button>
          <a href="{{ route('auth.customer-register') }}" class="block py-2 text-center text-primary hover:underline">
            Belum punya akun? Daftar sekarang
          </a>
        </div>
      @endauth
    </div>
  </div>
</nav>

<!-- Login Modal -->
<div id="loginModal" role="dialog" aria-modal="true" aria-labelledby="loginModalTitle" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
  <div class="bg-white rounded-lg w-full max-w-md overflow-hidden shadow-xl transform transition-all sm:max-w-lg">
    <div class="p-6">
      <div class="flex justify-between items-center mb-4">
        <div>
          <h3 id="loginModalTitle" class="text-xl font-bold text-gray-800">Login Customer</h3>
          <p class="text-sm text-gray-500">Akses akun RentalElektronik Anda</p>
        </div>
        <button type="button" onclick="closeLoginModal()" class="text-gray-400 hover:text-gray-500 transition-colors duration-200 focus:outline-none">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      
      <div class="my-6">
        <p class="text-gray-600 mb-4">Masuk untuk menyewa produk elektronik berkualitas.</p>
        <div class="flex flex-col sm:flex-row gap-3">
          <a href="{{ route('auth.customer-login') }}" class="flex-1 bg-primary hover:bg-primary-dark text-white py-2.5 px-4 rounded-lg text-center font-medium transition-colors duration-200 flex items-center justify-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
            </svg>
            <span>Login</span>
          </a>
          <a href="{{ route('auth.customer-register') }}" class="flex-1 border-2 border-primary text-primary hover:bg-blue-50 py-2.5 px-4 rounded-lg text-center font-medium transition-colors duration-200 flex items-center justify-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            <span>Daftar</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Mobile menu toggle
  const mobileMenuButton = document.getElementById('mobileMenuButton');
  const mobileMenu = document.getElementById('mobileMenu');

  mobileMenuButton.addEventListener('click', function() {
    const isHidden = mobileMenu.classList.contains('hidden');
    if (isHidden) {
      mobileMenu.classList.remove('hidden');
      mobileMenuButton.innerHTML = `
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      `;
    } else {
      mobileMenu.classList.add('hidden');
      mobileMenuButton.innerHTML = `
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      `;
    }
  });

  // Login modal functions
  function openLoginModal() {
    document.getElementById('loginModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    mobileMenu.classList.add('hidden');
    mobileMenuButton.innerHTML = `
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    `;
  }
  
  function closeLoginModal() {
    document.getElementById('loginModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
  }
  
  window.addEventListener('click', function(event) {
    const modal = document.getElementById('loginModal');
    if (event.target === modal) {
      closeLoginModal();
    }
  });
  
  document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
      closeLoginModal();
    }
  });
</script>
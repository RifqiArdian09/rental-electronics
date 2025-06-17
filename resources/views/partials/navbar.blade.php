<!-- NAVBAR -->
<nav class="bg-white shadow-sm sticky top-0 z-50">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-3 md:py-4 flex justify-between items-center">
    <!-- Logo -->
    <a href="/" class="text-xl md:text-2xl font-bold text-primary flex items-center">
      <svg class="w-6 h-6 md:w-7 md:h-7 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path>
      </svg>
      <span>RentalElektronik</span>
    </a>

    <!-- Desktop Navigation -->
    <div class="hidden md:flex space-x-6 lg:space-x-8 items-center">
      <a href="{{ url('/#tools') }}" class="font-medium text-gray-700 hover:text-primary">Produk</a>
      <a href="{{ url('/#features') }}" class="font-medium text-gray-700 hover:text-primary">Fitur</a>
      <a href="{{ url('/#about') }}" class="font-medium text-gray-700 hover:text-primary">Tentang</a>
      <a href="{{ url('/#testimonials') }}" class="font-medium text-gray-700 hover:text-primary">Testimoni</a>

      @auth('customer')
        <div class="relative ml-2">
          <button onclick="toggleDropdown()" class="flex items-center space-x-2 focus:outline-none">
            <img
              src="{{ auth('customer')->user()->photo_url 
                ? asset('storage/' . auth('customer')->user()->photo_url) 
                : 'https://ui-avatars.com/api/?name=' . urlencode(auth('customer')->user()->name) . '&background=random' }}"
              alt="Foto Profil"
              class="w-8 h-8 md:w-10 md:h-10 rounded-full object-cover border border-gray-200"
            />
            <span class="font-medium text-gray-700 hidden lg:inline">{{ auth('customer')->user()->name }}</span>
            <svg class="w-4 h-4 text-gray-500 transition-transform duration-200" id="arrowIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>

          <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden">
            <div class="px-4 py-2 border-b border-gray-100">
              <p class="text-sm font-medium text-gray-800 truncate">{{ auth('customer')->user()->name }}</p>
              <p class="text-xs text-gray-500 truncate">{{ auth('customer')->user()->email }}</p>
            </div>
            <a href="{{ route('customer.profile.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
              Profil Saya
            </a>
            <a href="{{ route('rental.history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
              Riwayat Sewa
            </a>
            <form method="POST" action="{{ route('customer.logout') }}">
              @csrf
              <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-50">
                Logout
              </button>
            </form>
          </div>
        </div>
      @else
      <a href="{{ route('auth.customer-login') }}" class="block py-2 text-center text-primary hover:underline">Login Customer</a>
      @endauth
    </div>

    <!-- Mobile Menu Button -->
    <button id="mobileMenuButton" class="md:hidden text-gray-700 hover:text-primary">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-200">
    <div class="container mx-auto px-4 py-3 space-y-4">
      <a href="#tools" class="block py-2 text-gray-700 hover:text-primary">Produk</a>
      <a href="#features" class="block py-2 text-gray-700 hover:text-primary">Fitur</a>
      <a href="#about" class="block py-2 text-gray-700 hover:text-primary">Tentang</a>
      <a href="#testimonials" class="block py-2 text-gray-700 hover:text-primary">Testimoni</a>
      @auth('customer')
        <div class="pt-2 border-t border-gray-100">
          <a href="{{ route('customer.profile.index') }}" class="block py-2 text-gray-700 hover:text-primary">Profil Saya</a>
          <a href="{{ route('rental.history') }}" class="block py-2 text-gray-700 hover:text-primary">Riwayat Sewa</a>
          <form method="POST" action="{{ route('customer.logout') }}">
            @csrf
            <button type="submit" class="w-full text-left py-2 text-red-600 hover:text-red-700">
              Logout
            </button>
          </form>
        </div>
      @else
        <div class="pt-2 border-t border-gray-100 space-y-2">
        <a href="{{ route('auth.customer-login') }}" class="block py-2 text-center text-primary hover:underline">Login Customer</a>
          <a href="{{ route('auth.customer-register') }}" class="block py-2 text-center text-primary hover:underline">Belum punya akun? Daftar</a>
        </div>
      @endauth
    </div>
  </div>
</nav>

<!-- SCRIPT -->
<script>
  // Dropdown toggle
  function toggleDropdown() {
    const menu = document.getElementById('dropdownMenu');
    const arrow = document.getElementById('arrowIcon');
    menu.classList.toggle('hidden');
    arrow.classList.toggle('rotate-180');
  }

  // Close dropdown if clicked outside
  window.addEventListener('click', function (e) {
    const dropdown = document.getElementById('dropdownMenu');
    const button = e.target.closest('button');
    if (!e.target.closest('#dropdownMenu') && !button?.onclick?.toString().includes('toggleDropdown')) {
      dropdown.classList.add('hidden');
      document.getElementById('arrowIcon').classList.remove('rotate-180');
    }
  });

  // Mobile menu toggle
  const mobileMenuButton = document.getElementById('mobileMenuButton');
  const mobileMenu = document.getElementById('mobileMenu');

  mobileMenuButton.addEventListener('click', function () {
    const isHidden = mobileMenu.classList.contains('hidden');
    mobileMenu.classList.toggle('hidden');
    this.innerHTML = isHidden
      ? `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
         </svg>`
      : `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
         </svg>`;
  });
</script>

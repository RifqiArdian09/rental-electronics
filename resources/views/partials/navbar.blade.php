<nav class="bg-white shadow-sm sticky top-0 z-50">
  <div class="container mx-auto px-6 py-4 flex justify-between items-center">
    <a href="#" class="text-2xl font-bold text-primary flex items-center">
      <i class="fas fa-microchip mr-2"></i>
      <span>RentalElektronik</span>
    </a>
    <div class="hidden md:flex space-x-8 items-center">
      <a href="#tools" class="nav-link font-medium text-gray-700 hover:text-primary">Produk</a>
      <a href="#features" class="nav-link font-medium text-gray-700 hover:text-primary">Fitur</a>
      <a href="#about" class="nav-link font-medium text-gray-700 hover:text-primary">Tentang</a>
      <a href="#testimonials" class="nav-link font-medium text-gray-700 hover:text-primary">Testimoni</a>
      <button onclick="openLoginModal()" class="font-medium text-gray-700 hover:text-primary transition-colors duration-200">Login Customer</button>
      <a href="#contact" class="bg-primary text-white px-5 py-2 rounded-lg hover:bg-opacity-90 transition">Hubungi Kami</a>
    </div>
    <button class="md:hidden text-gray-700 hover:text-primary transition-colors duration-200">
      <i class="fas fa-bars text-xl"></i>
    </button>
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
        <button type="button" onclick="closeLoginModal()" class="text-gray-400 hover:text-gray-500 transition-colors duration-200">
          <i class="fas fa-times text-lg"></i>
        </button>
      </div>
      
      <div class="my-6">
        <p class="text-gray-600 mb-4">Masuk untuk menyewa produk elektronik berkualitas.</p>
        <div class="flex flex-col sm:flex-row gap-4">
          <a href="{{ route('auth.customer-login') }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg text-center font-medium transition-colors duration-200 flex items-center justify-center space-x-2">
            <i class="fas fa-sign-in-alt"></i>
            <span>Login</span>
          </a>
          <a href="{{ route('auth.customer-register') }}" class="flex-1 border-2 border-blue-600 text-blue-600 hover:bg-blue-50 py-3 px-4 rounded-lg text-center font-medium transition-colors duration-200 flex items-center justify-center space-x-2">
            <i class="fas fa-user-plus"></i>
            <span>Daftar</span>
          </a>
        </div>
      </div>
      
      
    </div>
  </div>
</div>

<script>
  function openLoginModal() {
    document.getElementById('loginModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }
  
  function closeLoginModal() {
    document.getElementById('loginModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
  }
  
  // Close modal when clicking outside
  window.addEventListener('click', function(event) {
    const modal = document.getElementById('loginModal');
    if (event.target === modal) {
      closeLoginModal();
    }
  });
  
  // Close with Escape key
  document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
      closeLoginModal();
    }
  });
</script>
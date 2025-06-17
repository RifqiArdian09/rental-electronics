<!-- Footer -->
<footer class="bg-dark text-white py-12">
  <div class="container mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      <!-- Company Info -->
      <div>
        <h3 class="text-xl font-bold mb-4 flex items-center">
          <i class="fas fa-microchip mr-2"></i>
          <span>RentalElektronik</span>
        </h3>
        <p class="text-gray-400 mb-4">Solusi terbaik untuk kebutuhan sewa alat elektronik Anda dengan kualitas terjamin dan layanan profesional.</p>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-instagram"></i></a>
          <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>

      <!-- Product Categories Only -->
<div>
  <h4 class="font-bold text-lg mb-4">Kategori Produk</h4>
  <ul class="space-y-2">
    @foreach ($categories as $category)
      <li>
        <a href="#" class="text-gray-400 hover:text-white transition">
          {{ $category->name }}
        </a>
      </li>
    @endforeach
  </ul>
  <a href="{{ route('tools.index') }}" class="text-primary hover:underline text-sm mt-4 inline-block">Lihat Semua Produk →</a>
</div>


      <!-- Quick Links -->
      <div>
        <h4 class="font-bold text-lg mb-4">Perusahaan</h4>
        <ul class="space-y-2">
          <li><a href="#about" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Blog</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Karir</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Partner</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition">Kebijakan Privasi</a></li>
        </ul>
      </div>

      <!-- Newsletter -->
      <div>
        <h4 class="font-bold text-lg mb-4">Newsletter</h4>
        <p class="text-gray-400 mb-4">Berlangganan untuk mendapatkan penawaran khusus dan update produk terbaru.</p>
        <form class="flex">
          <input type="email" placeholder="Email Anda" class="px-4 py-2 rounded-l-lg text-dark w-full focus:outline-none focus:ring-2 focus:ring-primary" />
          <button type="submit" class="bg-primary hover:bg-primary-dark px-4 py-2 rounded-r-lg transition-colors">
            <i class="fas fa-paper-plane"></i>
          </button>
        </form>
        <div class="mt-6">
          <h5 class="font-medium mb-2">Kontak Kami</h5>
          <p class="text-gray-400 text-sm">
            <i class="fas fa-map-marker-alt mr-2"></i> Jl. Elektronik No. 123, Bengkulu, Indonesia
          </p>
          <p class="text-gray-400 text-sm mt-1">
            <i class="fas fa-phone-alt mr-2"></i> (021) 1234-5678
          </p>
          <p class="text-gray-400 text-sm mt-1">
            <i class="fas fa-envelope mr-2"></i> info@rentalelektronik.com
          </p>
        </div>
      </div>
    </div>
    
    <!-- Copyright -->
    <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
      <p>&copy; 2025 RentalElektronik. All rights reserved.</p>
    </div>
  </div>
</footer>
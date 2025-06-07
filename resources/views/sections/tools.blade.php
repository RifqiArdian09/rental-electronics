<section id="tools" class="py-16 bg-white">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-3xl font-bold mb-4">Produk Unggulan Kami</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">Temukan berbagai alat elektronik berkualitas untuk mendukung aktivitas Anda.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach ($tools as $tool)
      <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover border border-gray-100">
        <div class="relative h-48 overflow-hidden">
          <img src="{{ asset('storage/' . $tool->image) }}" alt="{{ $tool->name }}" class="w-full h-full object-cover" />
          @if($tool->stock <= 5)
            <div class="absolute top-4 right-4 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">STOK TERBATAS</div>
          @elseif($loop->first)
            <div class="absolute top-4 right-4 bg-primary text-white text-xs font-bold px-2 py-1 rounded">TERLARIS</div>
          @endif
        </div>
        <div class="p-6">
          <h3 class="font-bold text-xl mb-2">{{ $tool->name }}</h3>
          <p class="text-gray-600 text-sm mb-4">{{ $tool->category ? $tool->category->name : 'Kategori tidak tersedia' }}</p>
          <p class="text-gray-600 text-sm mb-4">{{ $tool->description }}</p>
          <div class="flex justify-between items-center">
            <div>
              <span class="text-primary font-bold text-lg">Rp {{ number_format($tool->price_per_day, 0, ',', '.') }}</span>
              <span class="text-gray-500 text-sm block">/ hari</span>
            </div>
            @auth('customer')
              <a href="{{ route('rental.create', $tool->id) }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition flex items-center">
                <i class="fas fa-shopping-cart mr-2"></i>
                Sewa
              </a>
            @else
              <button onclick="showLoginModal()" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition flex items-center">
                <i class="fas fa-shopping-cart mr-2"></i>
                Sewa
              </button>
            @endauth
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="text-center mt-12">
      <a href="#" class="inline-block border-2 border-primary text-primary font-semibold px-8 py-3 rounded-lg hover:bg-primary hover:text-white transition">
        Lihat Semua Produk <i class="fas fa-arrow-right ml-2"></i>
      </a>
    </div>
  </div>
</section>

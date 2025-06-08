@extends('layouts.app')

@section('title', 'Semua Produk')

@section('content')
<section class="py-12 md:py-16 bg-white">
  <div class="container mx-auto px-4 sm:px-6">

    <!-- Hero Section with Search -->
    <div class="text-center mb-12 md:mb-16">
      <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">
        Temukan Alat Elektronik yang Anda Butuhkan
      </h1>
      <p class="text-gray-600 max-w-2xl mx-auto text-lg">
        Sewa peralatan elektronik berkualitas dengan harga terjangkau.
      </p>

      <!-- Search Bar -->
      <div class="max-w-md mx-auto mt-8 relative">
        <form action="{{ route('tools.search') }}" method="GET">
          <div class="relative">
            <input
              type="text"
              name="query"
              placeholder="Cari produk..."
              class="w-full px-5 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent shadow-sm"
            />
            <button
              type="submit"
              class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-primary text-white p-2 rounded-full hover:bg-opacity-90 transition"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Category Filters -->
    <div class="mb-8 flex flex-wrap justify-center gap-2">
      <a
        href="{{ route('tools.index') }}"
        class="px-4 py-2 rounded-full {{ request()->routeIs('tools.index') && !request('category') ? 'bg-primary text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }} transition"
      >
        Semua Kategori
      </a>
      @foreach ($categories as $category)
        <a
          href="{{ route('tools.index', ['category' => $category->id]) }}"
          class="px-4 py-2 rounded-full {{ request('category') == $category->id ? 'bg-primary text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }} transition"
        >
          {{ $category->name }}
        </a>
      @endforeach
    </div>

    @if ($tools->isEmpty())
      <div class="text-center py-12">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h3 class="text-xl font-medium text-gray-900 mt-4">Produk tidak ditemukan</h3>
        <p class="text-gray-600 mt-2">Maaf, kami tidak dapat menemukan produk yang sesuai dengan kriteria Anda.</p>
        <a
          href="{{ route('tools.index') }}"
          class="mt-4 inline-block px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90 transition"
        >
          Lihat Semua Produk
        </a>
      </div>
    @else
      <!-- Product Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($tools as $tool)
          <div
            class="bg-white rounded-xl shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md hover:-translate-y-1 border border-gray-100 flex flex-col"
          >
            <!-- Product Image -->
            <div class="relative h-48 md:h-56 overflow-hidden group">
              <img
                src="{{ asset('storage/' . $tool->image) }}"
                alt="{{ $tool->name }}"
                class="w-full h-full object-cover transition duration-500 group-hover:scale-105"
              />

              <!-- Badges -->
              <div class="absolute top-3 right-3 flex flex-col space-y-2">
                @if ($tool->stock <= 5)
                  <span
                    class="bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full shadow-sm"
                  >
                    Stok Terbatas
                  </span>
                @endif
                @if ($loop->first)
                  <span
                    class="bg-primary text-white text-xs font-bold px-2 py-1 rounded-full shadow-sm"
                  >
                    Terlaris
                  </span>
                @endif
                @if ($tool->is_new)
                  <span
                    class="bg-green-600 text-white text-xs font-bold px-2 py-1 rounded-full shadow-sm"
                  >
                    Baru
                  </span>
                @endif
              </div>

              <!-- Quick View Button -->
              <button
                onclick="openQuickView({{ $tool->id }})"
                class="absolute bottom-3 left-1/2 transform -translate-x-1/2 bg-white text-primary px-4 py-2 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-md font-medium text-sm hover:bg-gray-50"
              >
                Lihat Detail
              </button>
            </div>

            <!-- Product Info -->
            <div class="p-5 flex-grow flex flex-col">
              <div class="flex-grow">
                <div class="flex justify-between items-start">
                  <div>
                    <h3 class="font-bold text-lg mb-1 text-gray-900 hover:text-primary transition">
                      {{ $tool->name }}
                    </h3>
                    <p class="text-gray-500 text-sm mb-2">
                      {{ $tool->category ? $tool->category->name : 'Kategori tidak tersedia' }}
                    </p>
                  </div>
                  <div class="flex items-center text-yellow-400">
                    @php $rating = round($tool->average_rating ?? 0) @endphp
                    @for ($i = 1; $i <= 5; $i++)
                      @if ($i <= $rating)
                        ★
                      @else
                        ☆
                      @endif
                    @endfor
                    <span class="text-gray-600 ml-1">({{ number_format($tool->average_rating ?? 0, 1) }})</span>
                  </div>
                </div>

                <p class="text-gray-600 text-sm mt-3 line-clamp-2">{{ $tool->description }}</p>
              </div>

              <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex justify-between items-center">
                  <div>
                    <span class="text-primary font-bold text-xl">
                      Rp {{ number_format($tool->price_per_day, 0, ',', '.') }}
                    </span>
                    <span class="text-gray-500 text-sm block">/ hari</span>
                  </div>
                  @auth('customer')
                    <a
                      href="{{ route('rental.create', $tool->id) }}"
                      class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition flex items-center text-sm"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                      Sewa Sekarang
                    </a>
                  @else
                    <button
                      onclick="showLoginModal()"
                      class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition flex items-center text-sm"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                      Sewa Sekarang
                    </button>
                  @endauth
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Pagination -->
      <div class="mt-12 flex justify-center">
        {{ $tools->links() }}
      </div>
    @endif
  </div>
</section>

<!-- Quick View Modal (hidden by default) -->
<div id="quickViewModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
  <div
    class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
  >
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75" onclick="closeQuickView()"></div>
    </div>

    <div
      class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full"
    >
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <!-- Modal content will be loaded via AJAX -->
          <div id="quickViewContent" class="w-full">
            <!-- Content will be loaded here -->
          </div>
        </div>
      </div>
      <div
        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
      >
        <button
          type="button"
          onclick="closeQuickView()"
          class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
        >
          Tutup
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  function openQuickView(toolId) {
    document.getElementById('quickViewContent').innerHTML = `
      <div class="w-full h-64 flex items-center justify-center">
        <svg class="animate-spin -ml-1 mr-3 h-8 w-8 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
      </div>
    `;

    document.getElementById('quickViewModal').classList.remove('hidden');

    fetch(`/tools/${toolId}/quickview`)
      .then(response => response.text())
      .then(html => {
        document.getElementById('quickViewContent').innerHTML = html;
      })
      .catch(() => {
        document.getElementById('quickViewContent').innerHTML = `
          <div class="w-full p-8 text-center">
            <p class="text-red-500">Gagal memuat detail produk. Silakan coba lagi.</p>
          </div>
        `;
      });
  }

  function closeQuickView() {
    document.getElementById('quickViewModal').classList.add('hidden');
  }

  function showLoginModal() {
    alert('Silakan login terlebih dahulu untuk menyewa produk.');
  }
</script>
@endsection

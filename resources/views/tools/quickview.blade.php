<div class="flex flex-col md:flex-row gap-6">
  <div class="md:w-1/2">
    <img 
      src="{{ asset('storage/' . $tool->image) }}" 
      alt="{{ $tool->name }}" 
      class="w-full rounded-lg object-cover max-h-96" 
    />
  </div>

  <div class="md:w-1/2 flex flex-col">
    <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $tool->name }}</h2>
    <p class="text-gray-600 mb-2">
      {{ $tool->category ? $tool->category->name : 'Kategori tidak tersedia' }}
    </p>

    <div class="rating-section mb-4">
      <h3 class="font-semibold mb-2">Rating Produk</h3>
      <div class="stars flex items-center gap-1 text-yellow-400">
        @php $avgRating = $tool->average_rating @endphp
        @for ($i = 1; $i <= 5; $i++)
          @if ($i <= round($avgRating))
            <span class="star filled">★</span>
          @else
            <span class="star">☆</span>
          @endif
        @endfor
        <span class="text-gray-600 ml-2">
          ({{ number_format($avgRating, 1) }} dari {{ $tool->testimonials->count() }} ulasan)
        </span>
      </div>

      @if($tool->testimonials->count() > 0)
        <div class="testimonials mt-4 space-y-4 max-h-48 overflow-y-auto">
          @foreach($tool->testimonials as $testimonial)
            <div class="testimonial border border-gray-200 rounded-lg p-3 bg-gray-50">
              <strong class="block mb-1 text-gray-800">{{ $testimonial->user->name }}</strong>
              <div class="testimonial-rating text-yellow-400 mb-1">
                @for ($i = 0; $i < $testimonial->rating; $i++)
                  ★
                @endfor
              </div>
              <p class="text-gray-700 italic">"{{ $testimonial->message }}"</p>
            </div>
          @endforeach
        </div>
      @endif
    </div>

    <p class="text-gray-700 mb-6 leading-relaxed">{{ $tool->description }}</p>

    <div class="text-xl font-bold text-primary mb-6">
      Rp {{ number_format($tool->price_per_day, 0, ',', '.') }} / hari
    </div>

    @auth('customer')
      <a 
        href="{{ route('rental.create', $tool->id) }}" 
        class="bg-primary text-white px-5 py-3 rounded-lg hover:bg-opacity-90 transition text-center font-semibold inline-block"
      >
        Sewa Sekarang
      </a>
    @else
      <button 
        onclick="showLoginModal()" 
        class="bg-primary text-white px-5 py-3 rounded-lg hover:bg-opacity-90 transition text-center font-semibold w-full"
      >
        Sewa Sekarang
      </button>
    @endauth
  </div>
</div>

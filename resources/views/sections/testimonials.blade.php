<!-- Testimonials Section -->
<section id="testimonials" class="py-20 bg-gray-100">
  <div class="container mx-auto px-4">
  <div class="text-center mb-16">
      <h2 class="text-4xl font-bold mb-4 text-gray-800">Apa Kata Pelanggan Kami?</h2>
      <p class="text-gray-600 max-w-2xl mx-auto text-lg">Kepuasan pelanggan adalah prioritas utama kami. Lihat apa yang dikatakan pelanggan tentang pengalaman mereka.</p>
    </div>

    @if($testimonials->count() > 0)
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($testimonials as $testimonial)
          <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center mb-4">
              <div class="text-yellow-400 mr-2 flex">
                @for($i = 1; $i <= 5; $i++)
                  @if($i <= $testimonial->rating)
                    <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                  @else
                    <svg class="w-5 h-5 fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                  @endif
                @endfor
              </div>
              <span class="text-gray-500 text-sm ml-1">{{ $testimonial->rating }}.0</span>
            </div>
            <p class="text-gray-600 mb-6 italic relative pl-4 before:content-['\"'] before:text-3xl before:text-gray-300 before:absolute before:left-0 before:top-0 before:font-serif">
              {{ $testimonial->message }}
            </p>
            <div class="flex items-center">
              <div class="relative">
                <img
                  src="{{ $testimonial->user->photo_url
                    ? asset('storage/' . $testimonial->user->photo_url)
                    : 'https://ui-avatars.com/api/?name=' . urlencode($testimonial->user->name) . '&background=random' }}"
                  alt="Foto {{ $testimonial->user->name }}"
                  class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm"
                  loading="lazy"
                />
              </div>
              <div class="ml-4">
                <h4 class="font-bold text-gray-800">{{ $testimonial->user->name }}</h4>
                <p class="text-gray-500 text-sm">{{ $testimonial->user->profession ?? 'Pelanggan' }}</p>
                <p class="text-gray-400 text-xs mt-1">{{ $testimonial->created_at->format('d M Y') }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="text-center py-12">
        <div class="inline-block p-6 bg-white rounded-xl shadow-sm">
          <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
          </svg>
          <h3 class="mt-4 text-lg font-medium text-gray-700">Belum ada testimoni</h3>
          <p class="mt-2 text-gray-500">Jadilah yang pertama memberikan ulasan!</p>
        </div>
      </div>
    @endif
  </div>
</section>

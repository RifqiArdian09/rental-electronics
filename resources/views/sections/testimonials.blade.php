<!-- Luxury Testimonials Section -->
<section id="testimonials" class="relative py-28 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
  <!-- Decorative Elements -->
  <div class="absolute top-0 left-0 w-full h-full opacity-10">
    <div class="absolute top-1/4 right-20 w-64 h-64 bg-blue-400 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-float-slow"></div>
    <div class="absolute bottom-1/3 left-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-overlay filter blur-3xl opacity-15 animate-float-medium"></div>
  </div>

  <div class="container mx-auto px-6 max-w-7xl relative z-10">
    <div class="text-center mb-20">
      <span class="inline-block px-5 py-2 text-sm font-semibold tracking-wider text-primary bg-primary/10 rounded-full mb-5 uppercase">Testimonials</span>
      <h2 class="text-4xl md:text-5xl font-bold mb-5 text-gray-900">What Our Clients Say</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">Customer satisfaction is our top priority. See what our clients say about their experience with us.</p>
    </div>

    @if($testimonials->count() > 0)
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($testimonials as $testimonial)
          <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 group">
            <!-- Rating Stars -->
            <div class="flex items-center mb-5">
              <div class="flex mr-3">
                @for($i = 1; $i <= 5; $i++)
                  @if($i <= $testimonial->rating)
                    <svg class="w-5 h-5 text-yellow-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                  @else
                    <svg class="w-5 h-5 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                  @endif
                @endfor
              </div>
              <span class="text-gray-500 text-sm">{{ $testimonial->rating }}.0</span>
            </div>
            
            <!-- Testimonial Text -->
            <div class="relative mb-8">
              <div class="absolute top-0 left-0 text-5xl text-gray-200 font-serif -mt-2">“</div>
              <p class="text-gray-600 pl-8 relative z-10 italic">{{ $testimonial->message }}</p>
              <div class="absolute bottom-0 right-0 text-5xl text-gray-200 font-serif -mb-4">”</div>
            </div>
            
            <!-- Client Info -->
            <div class="flex items-center pt-5 border-t border-gray-100">
              <div class="relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full blur opacity-25 group-hover:opacity-50 transition-opacity"></div>
                <img
                  src="{{ $testimonial->user->photo_url
                    ? asset('storage/' . $testimonial->user->photo_url)
                    : 'https://ui-avatars.com/api/?name=' . urlencode($testimonial->user->name) . '&background=random' }}"
                  alt="{{ $testimonial->user->name }}"
                  class="relative w-14 h-14 rounded-full object-cover border-2 border-white shadow-sm"
                  loading="lazy"
                />
              </div>
              <div class="ml-4">
                <h4 class="font-bold text-gray-900">{{ $testimonial->user->name }}</h4>
                <p class="text-gray-500 text-sm">{{ $testimonial->user->profession ?? 'Client' }}</p>
                <p class="text-gray-400 text-xs mt-1">{{ $testimonial->created_at->format('M d, Y') }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <!-- Empty State -->
      <div class="text-center py-16">
        <div class="inline-block p-8 bg-white rounded-2xl shadow-md border border-gray-100 max-w-md">
          <div class="w-20 h-20 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-5">
            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
            </svg>
          </div>
          <h3 class="text-xl font-medium text-gray-800">No testimonials yet</h3>
          <p class="mt-2 text-gray-500 mb-6">Be the first to share your experience!</p>
          <a href="#contact" class="inline-block px-6 py-2.5 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 transition">
            Leave a Review
          </a>
        </div>
      </div>
    @endif

  </div>
</section>

<style>
  .animate-float-slow {
    animation: float 8s ease-in-out infinite;
  }
  
  .animate-float-medium {
    animation: float 6s ease-in-out infinite;
    animation-delay: 1s;
  }
  
  @keyframes float {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-20px);
    }
  }
</style>
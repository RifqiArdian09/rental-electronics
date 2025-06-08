<section class="relative bg-gradient-to-br from-blue-600 to-indigo-800 text-white overflow-hidden">
  <!-- Background decoration -->
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-0 left-20 w-64 h-64 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl"></div>
    <div class="absolute bottom-0 right-20 w-64 h-64 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl"></div>
  </div>

  <div class="container mx-auto px-6 py-24 md:py-36 relative z-10">
    <div class="max-w-3xl mx-auto text-center">
      <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight animate-fade-in-up">
        Sewa Alat Elektronik <span class="text-yellow-300">Premium</span> dengan Harga Terjangkau
      </h1>
      <p class="text-xl md:text-2xl mb-10 opacity-90 leading-relaxed animate-fade-in-up delay-100">
        Solusi lengkap untuk kebutuhan elektronik proyek, acara, atau pekerjaan Anda. <br class="hidden md:block"> Proses sewa mudah, cepat, dan terpercaya.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-up delay-200">
        <a href="#tools" class="bg-white text-indigo-600 font-semibold px-8 py-4 rounded-xl hover:bg-opacity-90 transition-all transform hover:-translate-y-1 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
          </svg>
          Lihat Produk
        </a>
        <a href="#contact" class="bg-transparent border-2 border-white text-white font-semibold px-8 py-4 rounded-xl hover:bg-white hover:text-indigo-600 transition-all transform hover:-translate-y-1 hover:shadow-xl flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
            <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
          </svg>
          Konsultasi Gratis
        </a>
      </div>
    </div>
  </div>

  <!-- Animated scroll indicator -->
  <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
    <a href="#tools" class="text-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
      </svg>
    </a>
  </div>
</section>

<!-- Tambahkan ini di CSS Anda atau dalam tag style -->
<style>
  .animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
  }
  .animate-fade-in-up.delay-100 {
    animation-delay: 0.2s;
  }
  .animate-fade-in-up.delay-200 {
    animation-delay: 0.4s;
  }
  .animate-bounce {
    animation: bounce 2s infinite;
  }
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  @keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
      transform: translateY(0) translateX(-50%);
    }
    40% {
      transform: translateY(-20px) translateX(-50%);
    }
    60% {
      transform: translateY(-10px) translateX(-50%);
    }
  }
</style>
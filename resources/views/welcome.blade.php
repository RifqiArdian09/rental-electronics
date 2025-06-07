<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rental Elektronik | Sewa Alat Elektronik Berkualitas</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#4F46E5',
            secondary: '#10B981',
            dark: '#1F2937',
            light: '#F9FAFB',
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          },
        }
      }
    }
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Inter', sans-serif;
    }
    
    .hero-gradient {
      background: linear-gradient(135deg, #4F46E5 0%, #10B981 100%);
    }
    
    .card-hover {
      transition: all 0.3s ease;
    }
    
    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .nav-link {
      position: relative;
    }
    
    .nav-link:after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -2px;
      left: 0;
      background-color: #4F46E5;
      transition: width 0.3s ease;
    }
    
    .nav-link:hover:after {
      width: 100%;
    }
  </style>
</head>
<body class="bg-light text-dark">

  <!-- Navbar -->
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
        <a href="#contact" class="bg-primary text-white px-5 py-2 rounded-lg hover:bg-opacity-90 transition">Hubungi Kami</a>
      </div>
      <button class="md:hidden text-gray-700">
        <i class="fas fa-bars text-xl"></i>
      </button>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-gradient text-white">
    <div class="container mx-auto px-6 py-24 md:py-32">
      <div class="max-w-3xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Sewa Alat Elektronik Berkualitas dengan Harga Terjangkau</h1>
        <p class="text-xl mb-8 opacity-90">Temukan berbagai peralatan elektronik terbaik untuk kebutuhan proyek, acara, atau pekerjaan Anda dengan proses sewa yang mudah dan cepat.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <a href="#tools" class="bg-white text-primary font-semibold px-8 py-3 rounded-lg hover:bg-opacity-90 transition shadow-lg">Lihat Produk</a>
          <a href="#contact" class="bg-transparent border-2 border-white text-white font-semibold px-8 py-3 rounded-lg hover:bg-white hover:text-primary transition">Konsultasi Gratis</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="bg-white py-12">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div class="p-6">
          <div class="text-3xl font-bold text-primary mb-2">500+</div>
          <div class="text-gray-600">Alat Tersedia</div>
        </div>
        <div class="p-6">
          <div class="text-3xl font-bold text-primary mb-2">10K+</div>
          <div class="text-gray-600">Pelanggan</div>
        </div>
        <div class="p-6">
          <div class="text-3xl font-bold text-primary mb-2">24/7</div>
          <div class="text-gray-600">Layanan</div>
        </div>
        <div class="p-6">
          <div class="text-3xl font-bold text-primary mb-2">98%</div>
          <div class="text-gray-600">Kepuasan</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-3xl font-bold mb-4">Mengapa Memilih Kami?</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Kami memberikan pengalaman sewa alat elektronik yang berbeda dengan layanan terbaik dan kualitas terjamin.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-xl shadow-sm card-hover">
          <div class="text-primary text-3xl mb-4">
            <i class="fas fa-shield-alt"></i>
          </div>
          <h3 class="font-bold text-xl mb-3">Garansi Alat</h3>
          <p class="text-gray-600">Semua alat kami memiliki garansi dan dalam kondisi terbaik untuk memastikan performa optimal.</p>
        </div>
        <div class="bg-white p-8 rounded-xl shadow-sm card-hover">
          <div class="text-primary text-3xl mb-4">
            <i class="fas fa-truck"></i>
          </div>
          <h3 class="font-bold text-xl mb-3">Pengiriman Cepat</h3>
          <p class="text-gray-600">Proses pengiriman cepat dengan layanan antar-jemput untuk kenyamanan Anda.</p>
        </div>
        <div class="bg-white p-8 rounded-xl shadow-sm card-hover">
          <div class="text-primary text-3xl mb-4">
            <i class="fas fa-headset"></i>
          </div>
          <h3 class="font-bold text-xl mb-3">Dukungan 24/7</h3>
          <p class="text-gray-600">Tim support kami siap membantu kapan saja melalui berbagai channel komunikasi.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Tools Section -->
  <section id="tools" class="py-16 bg-white">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-3xl font-bold mb-4">Produk Unggulan Kami</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Temukan berbagai alat elektronik berkualitas untuk mendukung aktivitas Anda.</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Product 1 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover border border-gray-100">
          <div class="relative h-48 overflow-hidden">
            <img src="storage/tools/01JX4M36GT77QYBMPH2GTM86RT.jpg" alt="Kamera DSLR" class="w-full h-full object-cover" />
            <div class="absolute top-4 right-4 bg-primary text-white text-xs font-bold px-2 py-1 rounded">TERLARIS</div>
          </div>
          <div class="p-6">
            <h3 class="font-bold text-xl mb-2">Kamera DSLR Profesional</h3>
            <p class="text-gray-600 text-sm mb-4">Canon EOS 5D Mark IV dengan lensa kit 24-105mm</p>
            <div class="flex justify-between items-center">
              <div>
                <span class="text-primary font-bold text-lg">Rp 100.000</span>
                <span class="text-gray-500 text-sm block">/ hari</span>
              </div>
              <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition flex items-center">
                <i class="fas fa-shopping-cart mr-2"></i>
                Sewa
              </button>
            </div>
          </div>
        </div>
        
        <!-- Product 2 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover border border-gray-100">
          <div class="relative h-48 overflow-hidden">
            <img src="storage/tools/01JX4KS1VRH2GKDPD6JFQN6W7E.png" alt="Proyektor" class="w-full h-full object-cover" />
          </div>
          <div class="p-6">
            <h3 class="font-bold text-xl mb-2">Proyektor HD 4K</h3>
            <p class="text-gray-600 text-sm mb-4">Epson EB-U05 dengan resolusi 3840x2160 pixels</p>
            <div class="flex justify-between items-center">
              <div>
                <span class="text-primary font-bold text-lg">Rp 150.000</span>
                <span class="text-gray-500 text-sm block">/ hari</span>
              </div>
              <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition flex items-center">
                <i class="fas fa-shopping-cart mr-2"></i>
                Sewa
              </button>
            </div>
          </div>
        </div>
        
        <!-- Product 3 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover border border-gray-100">
          <div class="relative h-48 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Laptop" class="w-full h-full object-cover" />
          </div>
          <div class="p-6">
            <h3 class="font-bold text-xl mb-2">Laptop Workstation</h3>
            <p class="text-gray-600 text-sm mb-4">Dell Precision 5750 dengan Intel Xeon dan GPU Quadro</p>
            <div class="flex justify-between items-center">
              <div>
                <span class="text-primary font-bold text-lg">Rp 200.000</span>
                <span class="text-gray-500 text-sm block">/ hari</span>
              </div>
              <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition flex items-center">
                <i class="fas fa-shopping-cart mr-2"></i>
                Sewa
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-12">
        <a href="#" class="inline-block border-2 border-primary text-primary font-semibold px-8 py-3 rounded-lg hover:bg-primary hover:text-white transition">
          Lihat Semua Produk <i class="fas fa-arrow-right ml-2"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section id="testimonials" class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-3xl font-bold mb-4">Apa Kata Pelanggan Kami?</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Kepuasan pelanggan adalah prioritas utama kami.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Testimonial 1 -->
        <div class="bg-white p-8 rounded-xl shadow-sm">
          <div class="flex items-center mb-4">
            <div class="text-yellow-400 mr-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-600 mb-6">"Sangat puas dengan pelayanan RentalElektronik. Alatnya berkualitas dan proses sewanya sangat mudah. Akan menggunakan jasa mereka lagi di proyek berikutnya."</p>
          <div class="flex items-center">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Andi Wijaya" class="w-12 h-12 rounded-full mr-4 object-cover" />
            <div>
              <h4 class="font-bold">Andi Wijaya</h4>
              <p class="text-gray-500 text-sm">Fotografer Profesional</p>
            </div>
          </div>
        </div>
        
        <!-- Testimonial 2 -->
        <div class="bg-white p-8 rounded-xl shadow-sm">
          <div class="flex items-center mb-4">
            <div class="text-yellow-400 mr-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-600 mb-6">"Proyektor yang saya sewa dalam kondisi sangat baik dan harganya kompetitif. Tim pengirimannya juga sangat profesional dan tepat waktu."</p>
          <div class="flex items-center">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Siti Rahma" class="w-12 h-12 rounded-full mr-4 object-cover" />
            <div>
              <h4 class="font-bold">Siti Rahma</h4>
              <p class="text-gray-500 text-sm">Event Organizer</p>
            </div>
          </div>
        </div>
        
        <!-- Testimonial 3 -->
        <div class="bg-white p-8 rounded-xl shadow-sm">
          <div class="flex items-center mb-4">
            <div class="text-yellow-400 mr-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>
          <p class="text-gray-600 mb-6">"Laptop workstation yang saya sewa membantu menyelesaikan proyek rendering 3D dengan cepat. Support teknisnya juga sangat responsif."</p>
          <div class="flex items-center">
            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Budi Santoso" class="w-12 h-12 rounded-full mr-4 object-cover" />
            <div>
              <h4 class="font-bold">Budi Santoso</h4>
              <p class="text-gray-500 text-sm">3D Designer</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-16 bg-white">
    <div class="container mx-auto px-6">
      <div class="flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-8 md:mb-0 md:pr-12">
          <h2 class="text-3xl font-bold mb-6">Tentang RentalElektronik</h2>
          <p class="text-gray-600 mb-4">Kami adalah penyedia layanan sewa alat elektronik profesional yang berkomitmen untuk memberikan pengalaman terbaik bagi pelanggan.</p>
          <p class="text-gray-600 mb-6">Dengan pengalaman lebih dari 5 tahun di industri ini, kami memahami betul kebutuhan pelanggan akan peralatan elektronik berkualitas dengan harga terjangkau.</p>
          <ul class="space-y-3">
            <li class="flex items-center">
              <i class="fas fa-check-circle text-secondary mr-2"></i>
              <span>100% alat dalam kondisi prima</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-check-circle text-secondary mr-2"></i>
              <span>Garansi kerusakan selama masa sewa</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-check-circle text-secondary mr-2"></i>
              <span>Dukungan teknis 24 jam</span>
            </li>
          </ul>
        </div>
        <div class="md:w-1/2">
          <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Tentang Kami" class="rounded-xl shadow-lg w-full" />
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-16 hero-gradient text-white">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold mb-6">Siap Memulai Penyewaan Alat Elektronik?</h2>
      <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">Dapatkan alat terbaik untuk kebutuhan Anda dengan proses yang mudah dan cepat.</p>
      <a href="#contact" class="inline-block bg-white text-primary font-semibold px-8 py-3 rounded-lg hover:bg-opacity-90 transition shadow-lg mr-4">Hubungi Kami</a>
      <a href="tel:+6281234567890" class="inline-block border-2 border-white text-white font-semibold px-8 py-3 rounded-lg hover:bg-white hover:text-primary transition">
        <i class="fas fa-phone-alt mr-2"></i> 0812-3456-7890
      </a>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
      <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold mb-4">Hubungi Kami</h2>
          <p class="text-gray-600">Silakan isi form berikut atau hubungi kami melalui kontak yang tersedia.</p>
        </div>
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
          <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2 p-8 bg-primary text-white">
              <h3 class="text-xl font-bold mb-6">Informasi Kontak</h3>
              <div class="space-y-6">
                <div class="flex items-start">
                  <i class="fas fa-map-marker-alt mt-1 mr-4"></i>
                  <div>
                    <h4 class="font-bold">Alamat</h4>
                    <p>Jl. Teknologi No. 123, Jakarta Selatan, Indonesia</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <i class="fas fa-envelope mt-1 mr-4"></i>
                  <div>
                    <h4 class="font-bold">Email</h4>
                    <p>info@rentalelektronik.com</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <i class="fas fa-phone-alt mt-1 mr-4"></i>
                  <div>
                    <h4 class="font-bold">Telepon</h4>
                    <p>0812-3456-7890 (WhatsApp Available)</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <i class="fas fa-clock mt-1 mr-4"></i>
                  <div>
                    <h4 class="font-bold">Jam Operasional</h4>
                    <p>Senin - Minggu: 08.00 - 22.00 WIB</p>
                  </div>
                </div>
              </div>
              <div class="mt-8">
                <h4 class="font-bold mb-4">Ikuti Kami</h4>
                <div class="flex space-x-4">
                  <a href="#" class="text-white text-xl hover:text-gray-200"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" class="text-white text-xl hover:text-gray-200"><i class="fab fa-instagram"></i></a>
                  <a href="#" class="text-white text-xl hover:text-gray-200"><i class="fab fa-twitter"></i></a>
                  <a href="#" class="text-white text-xl hover:text-gray-200"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
            </div>
            <div class="md:w-1/2 p-8">
              <form action="#" method="POST">
                <div class="mb-6">
                  <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                  <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" />
                </div>
                <div class="mb-6">
                  <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                  <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" />
                </div>
                <div class="mb-6">
                  <label for="phone" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                  <input type="tel" id="phone" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" />
                </div>
                <div class="mb-6">
                  <label for="subject" class="block text-gray-700 font-medium mb-2">Subjek</label>
                  <select id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="rent">Pertanyaan Sewa</option>
                    <option value="product">Pertanyaan Produk</option>
                    <option value="support">Dukungan Teknis</option>
                    <option value="other">Lainnya</option>
                  </select>
                </div>
                <div class="mb-6">
                  <label for="message" class="block text-gray-700 font-medium mb-2">Pesan</label>
                  <textarea id="message" name="message" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                </div>
                <button type="submit" class="w-full bg-primary text-white font-semibold py-3 rounded-lg hover:bg-opacity-90 transition">
                  Kirim Pesan <i class="fas fa-paper-plane ml-2"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white py-12">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-xl font-bold mb-4 flex items-center">
            <i class="fas fa-microchip mr-2"></i>
            <span>RentalElektronik</span>
          </h3>
          <p class="text-gray-400">Solusi terbaik untuk kebutuhan sewa alat elektronik Anda dengan kualitas terjamin dan layanan profesional.</p>
        </div>
        <div>
          <h4 class="font-bold text-lg mb-4">Produk</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white transition">Kamera</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Proyektor</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Laptop</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Audio Visual</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Semua Produk</a></li>
          </ul>
        </div>
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
        <div>
          <h4 class="font-bold text-lg mb-4">Newsletter</h4>
          <p class="text-gray-400 mb-4">Berlangganan untuk mendapatkan penawaran khusus dan update produk terbaru.</p>
          <form class="flex">
            <input type="email" placeholder="Email Anda" class="px-4 py-2 rounded-l-lg text-dark w-full" />
            <button type="submit" class="bg-primary px-4 py-2 rounded-r-lg">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
          <div class="mt-4 flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
      </div>
      <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
        <p>&copy; 2025 RentalElektronik. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Floating WhatsApp Button -->
  <a href="https://wa.me/62895412630703" class="fixed bottom-6 right-6 bg-green-500 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:bg-green-600 transition z-50">
    <i class="fab fa-whatsapp text-2xl"></i>
  </a>

</body>
</html>
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
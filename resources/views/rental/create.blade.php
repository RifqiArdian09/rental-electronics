@extends('layouts.app')

@section('title', 'Form Penyewaan')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden max-w-3xl mx-auto">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6 text-white">
            <h2 class="text-2xl font-bold">Form Penyewaan {{ $tool->name }}</h2>
            <p class="opacity-90 mt-1">Silahkan isi formulir berikut untuk menyewa alat</p>
        </div>
        
        <!-- Stock Availability Alert -->
        @if($tool->stock <= 0)
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 m-6 rounded-lg" role="alert">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <p class="font-bold">Stok Habis</p>
                        <p>Maaf, alat ini sedang tidak tersedia untuk disewa.</p>
                    </div>
                </div>
            </div>
        @else
            @if($tool->stock <= 3)
                <div class="bg-amber-100 border-l-4 border-amber-500 text-amber-700 p-4 m-6 rounded-lg" role="alert">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <div>
                            <p class="font-bold">Stok Terbatas</p>
                            <p>Hanya tersisa {{ $tool->stock }} unit alat ini.</p>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('rental.store') }}" class="p-6" id="rentalForm">
                @csrf
                <input type="hidden" name="tool_id" value="{{ $tool->id }}">

                <!-- Tool Information Card -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h3 class="font-medium text-lg mb-3 text-gray-800">Informasi Alat</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <p class="text-gray-600 text-sm">Nama Alat</p>
                            <p class="font-medium text-gray-800">{{ $tool->name }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Harga Sewa per Hari</p>
                            <p class="font-medium text-gray-800">Rp {{ number_format($tool->price_per_day, 0, ',', '.') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Stok Tersedia</p>
                            <p class="font-medium text-gray-800">{{ $tool->stock }} unit</p>
                        </div>
                    </div>
                </div>

                <!-- Rental Period Section -->
                <div class="mb-6">
                    <h3 class="font-medium text-lg mb-4 text-gray-800">Periode Penyewaan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium text-sm" for="start_date">Tanggal Mulai</label>
                            <div class="relative">
                                <input type="date" id="start_date" name="start_date" 
                                       class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                       min="{{ date('Y-m-d') }}" required
                                       value="{{ old('start_date') }}">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                            @error('start_date')
                                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 mb-2 font-medium text-sm" for="end_date">Tanggal Selesai</label>
                            <div class="relative">
                                <input type="date" id="end_date" name="end_date" 
                                       class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                                       required value="{{ old('end_date') }}">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                            @error('end_date')
                                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Quantity Selection -->
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2 font-medium text-sm" for="quantity">Jumlah yang Disewa (Maks: {{ $tool->stock }})</label>
                    <div class="relative">
                        <input type="number" id="quantity" name="quantity" min="1" max="{{ $tool->stock }}" 
                               class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                               value="{{ old('quantity', 1) }}" required>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <span class="text-gray-500 text-sm">unit</span>
                        </div>
                    </div>
                    @error('quantity')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Rental Summary Card -->
                <div class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-100">
                    <h3 class="font-medium text-lg mb-3 text-blue-700">Ringkasan Sewa</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Durasi Sewa</span>
                            <span class="font-medium text-gray-800" id="durationDisplay">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah Unit</span>
                            <span class="font-medium text-gray-800" id="quantityDisplay">1 unit</span>
                        </div>
                        <div class="flex justify-between pt-2 border-t border-blue-100">
                            <span class="text-gray-600 font-medium">Total Biaya</span>
                            <span class="font-bold text-blue-600 text-lg" id="totalCostDisplay">Rp 0</span>
                        </div>
                    </div>
                </div>

                <!-- Additional Notes -->
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2 font-medium text-sm" for="notes">Catatan Tambahan</label>
                    <textarea id="notes" name="notes" rows="3" 
                              class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                              placeholder="Masukkan catatan khusus (opsional)">{{ old('notes') }}</textarea>
                </div>

                <!-- Terms and Conditions -->
                <div class="mb-6">
                    <div class="flex items-start">
                        <div class="flex items-center h-5 mt-0.5">
                            <input id="terms" name="terms" type="checkbox" 
                                   class="w-4 h-4 border border-gray-300 rounded bg-white focus:ring-2 focus:ring-blue-500 transition" required>
                        </div>
                        <label for="terms" class="ml-2 text-sm text-gray-600">
                            Saya menyetujui <a href="#" class="text-blue-600 hover:underline font-medium">syarat dan ketentuan</a> penyewaan alat
                        </label>
                    </div>
                    @error('terms')
                        <p class="mt-1 text-red-500 text-sm">Anda harus menyetujui syarat dan ketentuan</p>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row justify-end gap-3">
                    <a href="{{ url()->previous() }}" 
                       class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium text-center hover:bg-gray-50 transition flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Konfirmasi Penyewaan
                    </button>
                </div>
            </form>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const quantityInput = document.getElementById('quantity');
        const durationDisplay = document.getElementById('durationDisplay');
        const quantityDisplay = document.getElementById('quantityDisplay');
        const totalCostDisplay = document.getElementById('totalCostDisplay');
        const pricePerDay = {{ $tool->price_per_day }};
        const maxStock = {{ $tool->stock }};
        
        // Format currency
        const formatCurrency = (amount) => {
            return 'Rp ' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        };
        
        // Calculate days between dates
        const calculateDays = (start, end) => {
            if (!start || !end) return 0;
            
            const startDate = new Date(start);
            const endDate = new Date(end);
            
            // Handle same day rental (minimum 1 day)
            if (startDate.toDateString() === endDate.toDateString()) {
                return 1;
            }
            
            const diffTime = Math.abs(endDate - startDate);
            return Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // +1 to include both start and end days
        };
        
        // Update rental summary
        const updateSummary = () => {
            const startDate = startDateInput.value;
            const endDate = endDateInput.value;
            let quantity = parseInt(quantityInput.value) || 1;
            
            // Validate quantity
            if (quantity > maxStock) {
                quantity = maxStock;
                quantityInput.value = maxStock;
            }
            
            if (quantity < 1) {
                quantity = 1;
                quantityInput.value = 1;
            }
            
            quantityDisplay.textContent = quantity + (quantity > 1 ? ' unit' : ' unit');
            
            if (startDate && endDate) {
                const days = calculateDays(startDate, endDate);
                const totalCost = days * pricePerDay * quantity;
                
                durationDisplay.textContent = days + (days > 1 ? ' hari' : ' hari');
                totalCostDisplay.textContent = formatCurrency(totalCost);
            } else {
                durationDisplay.textContent = '-';
                totalCostDisplay.textContent = formatCurrency(0);
            }
        };
        
        // Set min end date when start date changes
        startDateInput.addEventListener('change', function() {
            endDateInput.min = this.value;
            if (endDateInput.value && endDateInput.value < this.value) {
                endDateInput.value = this.value;
            }
            updateSummary();
        });
        
        // Update summary when any input changes
        endDateInput.addEventListener('change', updateSummary);
        quantityInput.addEventListener('input', updateSummary);
        
        // Initialize summary
        updateSummary();

        // Form submission validation
        document.getElementById('rentalForm').addEventListener('submit', function(e) {
            if (!startDateInput.value || !endDateInput.value) {
                e.preventDefault();
                alert('Silahkan isi tanggal mulai dan tanggal selesai');
                return false;
            }

            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            
            if (endDate < startDate) {
                e.preventDefault();
                alert('Tanggal selesai tidak boleh sebelum tanggal mulai');
                return false;
            }

            return true;
        });
    });
</script>
@endsection
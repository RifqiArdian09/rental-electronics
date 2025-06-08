@extends('layouts.app')

@section('title', 'Riwayat Sewa')

@section('content')
<div class="container mx-auto py-10 px-6">
    <h2 class="text-2xl font-bold mb-6">Riwayat Sewa Anda</h2>

    @if ($rentals->isEmpty())
        <p class="text-gray-600">Belum ada riwayat penyewaan.</p>
    @else
        <div class="grid gap-6">
            @foreach ($rentals as $rental)
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-xl font-semibold">{{ $rental->tool->name }}</h3>
                        <span class="text-sm text-gray-500">{{ $rental->created_at->format('d M Y') }}</span>
                    </div>
                    <p class="text-gray-700">Jumlah: <strong>{{ $rental->quantity }}</strong></p>
                    <p class="text-gray-700">Tanggal Sewa: {{ $rental->start_date }} - {{ $rental->end_date }}</p>
                    <p class="text-gray-700">Status Pembayaran: 
                        <span class="font-semibold {{ $rental->payment_status === 'paid' ? 'text-green-600' : 'text-red-600' }}">
                            {{ ucfirst($rental->payment_status) }}
                        </span>
                    </p>
                    <p class="text-gray-700">Total Harga: Rp{{ number_format($rental->total_price, 0, ',', '.') }}</p>

                    {{-- Di dalam loop rental --}}
                    @if($rental->payment_status === 'paid' && !$rental->hasTestimonial())
                        <a href="{{ route('testimonials.create', ['rental_id' => $rental->id]) }}" 
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 transition">
                            Beri Testimoni
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

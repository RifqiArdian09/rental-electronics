@extends('layouts.app')

@section('title', 'Riwayat Sewa')

@section('content')
<div class="container mx-auto py-10 px-4 sm:px-6">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Riwayat Penyewaan</h2>
            <p class="text-gray-600 mt-2">Daftar lengkap peralatan yang pernah Anda sewa</p>
        </div>

        @if ($rentals->isEmpty())
            <div class="bg-white rounded-xl shadow-sm p-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <h3 class="text-xl font-medium text-gray-700 mt-4">Belum ada riwayat</h3>
                <p class="text-gray-500 mt-2">Anda belum pernah menyewa peralatan</p>
                <a href="{{ route('tools.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-700 transition duration-150 ease-in-out">
                    Sewa Sekarang
                </a>
            </div>
        @else
            <div class="space-y-6">
                @foreach ($rentals as $rental)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-shadow duration-300">
                        <div class="p-6 sm:p-8">
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                                <div class="flex items-start space-x-4">
                                    @if($rental->tool->image)
                                        <img src="{{ asset('storage/' . $rental->tool->image) }}" alt="{{ $rental->tool->name }}" class="w-20 h-20 object-cover rounded-lg">
                                    @endif
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-800">{{ $rental->tool->name }}</h3>
                                        <p class="text-sm text-gray-500 mt-1">Disewa pada {{ $rental->created_at->translatedFormat('d F Y') }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex flex-col items-end">
                                    <span class="text-lg font-bold text-gray-900">Rp{{ number_format($rental->total_price, 0, ',', '.') }}</span>
                                    <span class="px-3 py-1 rounded-full text-xs font-medium mt-2 
                                        {{ $rental->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst($rental->payment_status) }}
                                    </span>
                                </div>
                            </div>

                            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="text-sm text-gray-500">Jumlah</p>
                                    <p class="font-medium">{{ $rental->quantity }} unit</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="text-sm text-gray-500">Tanggal Sewa</p>
                                    <p class="font-medium">{{ $rental->start_date }} s/d {{ $rental->end_date }}</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="text-sm text-gray-500">Durasi</p>
                                     <p>{{ \Carbon\Carbon::parse($rental->start_date)->diffInDays(\Carbon\Carbon::parse($rental->end_date)) }} hari</p>
                                </div>
                            </div>

                            @if($rental->payment_status === 'paid' && !$rental->hasTestimonial())
                                <div class="mt-6 flex justify-end">
                                    <a href="{{ route('testimonials.create', ['rental_id' => $rental->id]) }}" 
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6z" />
                                        </svg>
                                        Beri Testimoni
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
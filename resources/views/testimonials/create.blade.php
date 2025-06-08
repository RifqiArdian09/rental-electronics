@extends('layouts.app')

@section('title', 'Beri Testimoni')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
        <div class="p-8">
            <div class="flex items-center mb-6">
                <div class="bg-blue-100 p-3 rounded-full mr-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Beri Testimoni</h2>
                    <p class="text-gray-600">Untuk penyewaan: <span class="font-semibold text-blue-600">{{ $rental->tool->name }}</span></p>
                </div>
            </div>

            @if(session('error'))
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('testimonials.store') }}" method="POST">
                @csrf
                <input type="hidden" name="rental_id" value="{{ $rental->id }}">

                <div class="mb-6">
                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                    <div class="flex items-center space-x-2">
                        <div class="rating-input flex space-x-1">
                            @for($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating', 5) == $i ? 'checked' : '' }} class="hidden">
                                <label for="star{{ $i }}" class="cursor-pointer">
                                    <svg class="w-8 h-8 star" fill="{{ old('rating', 5) >= $i ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="{{ old('rating', 5) >= $i ? '0' : '2' }}" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.078 10.1c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                </label>
                            @endfor
                        </div>
                        <span id="rating-value" class="text-sm text-gray-500 ml-2">{{ old('rating', 5) }}.0</span>
                    </div>
                    @error('rating')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-8">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan Testimoni</label>
                    <textarea name="message" id="message" rows="5" class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Bagikan pengalaman Anda menggunakan produk ini...">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end">
                    <a href="{{ url()->previous() }}" class="mr-4 px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Kembali
                    </a>
                    <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                        </svg>
                        Kirim Testimoni
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const ratingInputs = document.querySelectorAll('.rating-input input');
    const ratingValueText = document.getElementById('rating-value');
    const ratingLabels = document.querySelectorAll('.rating-input label svg');

    function updateStars(value) {
        ratingLabels.forEach((svg, index) => {
            const starNumber = 5 - index;
            if (starNumber <= value) {
                svg.setAttribute('fill', 'currentColor');
                svg.setAttribute('stroke-width', '0');
            } else {
                svg.setAttribute('fill', 'none');
                svg.setAttribute('stroke-width', '2');
            }
        });
    }

    ratingInputs.forEach(input => {
        input.addEventListener('change', function () {
            const value = parseInt(this.value);
            ratingValueText.textContent = value + '.0';
            updateStars(value);
        });
    });

    // Initialize stars on page load
    const selected = document.querySelector('.rating-input input:checked');
    if (selected) {
        updateStars(parseInt(selected.value));
    }
</script>
@endsection

@extends('layouts.app')

@section('title', 'Form Penyewaan')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Form Penyewaan {{ $tool->name }}</h2>
        
        <form method="POST" action="{{ route('rental.store') }}">
            @csrf
            <input type="hidden" name="tool_id" value="{{ $tool->id }}">

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="start_date">Tanggal Mulai</label>
                <input type="date" id="start_date" name="start_date" 
                       class="w-full border border-gray-300 p-2 rounded" 
                       min="{{ date('Y-m-d') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="end_date">Tanggal Selesai</label>
                <input type="date" id="end_date" name="end_date" 
                       class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2" for="catatan">Catatan (Opsional)</label>
                <textarea id="catatan" name="catatan" rows="3" 
                          class="w-full border border-gray-300 p-2 rounded"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Konfirmasi Sewa
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('start_date').addEventListener('change', function() {
        document.getElementById('end_date').min = this.value;
    });
</script>
@endsection

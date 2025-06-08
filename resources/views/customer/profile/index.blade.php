@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="container mx-auto px-4 py-8">
  <div class="max-w-4xl mx-auto">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold text-gray-800">Profil Saya</h1>
      <div class="flex space-x-3">
        <a href="{{ route('customer.profile.edit') }}" class="flex items-center px-4 py-2 bg-primary hover:bg-primary-dark text-white font-medium rounded-lg transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
          </svg>
          Edit Profil
        </a>
      </div>
    </div>

    <!-- Profile Card -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
      <div class="md:flex">
        <!-- Profile Photo -->
        <div class="md:w-1/3 p-6 flex justify-center md:justify-start">
          <div class="relative">
            <img
              src="{{ auth('customer')->user()->photo_url 
                ? asset('storage/' . auth('customer')->user()->photo_url) 
                : 'https://ui-avatars.com/api/?name=' . urlencode(auth('customer')->user()->name) . '&background=random&size=256' }}"
              alt="Foto Profil"
              class="w-48 h-48 rounded-full object-cover border-4 border-primary/10 shadow-md"
            />
            <div class="absolute bottom-2 right-2 bg-white p-2 rounded-full shadow">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
          </div>
        </div>

        <!-- Profile Information -->
        <div class="md:w-2/3 p-6 md:p-8">
          <div class="space-y-6">
            <div class="pb-4 border-b border-gray-100">
              <h2 class="text-xl font-semibold text-gray-700 mb-1">Informasi Pribadi</h2>
              <p class="text-gray-500 text-sm">Data diri yang terdaftar di akun Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Nama Lengkap</label>
                <p class="text-gray-800 font-medium">{{ auth('customer')->user()->name }}</p>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                <p class="text-gray-800 font-medium">{{ auth('customer')->user()->email }}</p>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Profesi</label>
                <p class="text-gray-800 font-medium">{{ auth('customer')->user()->profession ?? 'Belum diisi' }}</p>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Bergabung Pada</label>
                <p class="text-gray-800 font-medium">{{ auth('customer')->user()->created_at->format('d M Y') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
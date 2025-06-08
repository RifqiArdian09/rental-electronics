@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="container mx-auto px-4 py-8">
  <div class="max-w-3xl mx-auto">
    <!-- Header Section -->
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-gray-800">Edit Profil</h1>
      <p class="text-gray-600">Perbarui informasi profil Anda</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
      <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded">
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
          <span>{{ session('success') }}</span>
        </div>
      </div>
    @endif

    <!-- Profile Edit Card -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
      <div class="p-6 md:p-8">
        <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Profile Photo Upload -->
            <div class="md:col-span-2">
              <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
              <div class="flex items-center space-x-6">
                <div class="shrink-0">
                  <img
                    id="preview-photo"
                    src="{{ $user->photo_url ? asset('storage/' . $user->photo_url) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=random&size=256' }}"
                    class="h-24 w-24 object-cover rounded-full border-2 border-gray-300"
                    alt="Current profile photo"
                  />
                </div>
                <div class="w-full">
                  <label class="block">
                    <span class="sr-only">Pilih foto</span>
                    <input 
                      type="file" 
                      name="photo" 
                      id="photo-input"
                      class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-primary/10 file:text-primary
                        hover:file:bg-primary/20"
                      onchange="previewImage(this)"
                    />
                  </label>
                  <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG (maks. 2MB)</p>
                  @error('photo') 
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p> 
                  @enderror
                </div>
              </div>
            </div>

            <!-- Name Field -->
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
              <input 
                type="text" 
                name="name" 
                id="name"
                value="{{ old('name', $user->name) }}" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                required
              >
              @error('name') 
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p> 
              @enderror
            </div>

            <!-- Email Field -->
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
              <input 
                type="email" 
                name="email" 
                id="email"
                value="{{ old('email', $user->email) }}" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                required
              >
              @error('email') 
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p> 
              @enderror
            </div>

            <!-- Profession Field -->
            <div>
              <label for="profession" class="block text-sm font-medium text-gray-700 mb-1">Profesi</label>
              <input 
                type="text" 
                name="profession" 
                id="profession"
                value="{{ old('profession', $user->profession) }}" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
              >
              @error('profession') 
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p> 
              @enderror
            </div>
          </div>

          <!-- Form Actions -->
          <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
            <a href="{{ route('customer.profile.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition">
              Batal
            </a>
            <button type="submit" class="px-6 py-2 bg-primary hover:bg-primary-dark text-white font-medium rounded-lg transition flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
              Simpan Perubahan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function previewImage(input) {
    const preview = document.getElementById('preview-photo');
    const file = input.files[0];
    const reader = new FileReader();
    
    reader.onloadend = function() {
      preview.src = reader.result;
    }
    
    if (file) {
      reader.readAsDataURL(file);
    }
  }
</script>
@endsection
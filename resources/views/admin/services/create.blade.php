@extends('layouts.admin')

@section('title', 'Tambah Jasa Baru')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Tambah Jasa Baru</h2>
        <a href="{{ route('admin.services.index') }}" class="text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    <!-- Error Alert -->
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
            <p class="font-bold">Terdapat kesalahan:</p>
            <ul class="list-disc ml-6 mt-2 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Jasa *</label>
                    <input type="text" id="title" name="title" required
                        value="{{ old('title') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror">
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                    <input type="number" id="price" name="price" step="0.01" min="0"
                        value="{{ old('price') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror">
                    <p class="text-xs text-gray-500 mt-1">Kosongkan jika harga konsultasi</p>
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi *</label>
                <textarea id="description" name="description" rows="5" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar Jasa</label>
                <div class="mt-2 flex items-center gap-4">
                    <div id="image-preview" class="hidden w-32 h-32 bg-gray-100 rounded-md overflow-hidden border">
                        <img id="preview-img" src="#" alt="Preview" class="w-full h-full object-cover">
                    </div>
                    <label
                        class="cursor-pointer inline-block px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <span>Pilih Gambar</span>
                        <input id="image" name="image" type="file" accept="image/*" class="sr-only" onchange="previewImage()">
                    </label>
                    <p class="text-xs text-gray-500">JPG, PNG, GIF maksimal 2MB</p>
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.services.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Preview Script -->
<script>
function previewImage() {
    const file = document.getElementById('image').files[0];
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endsection

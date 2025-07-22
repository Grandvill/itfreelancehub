@extends('layouts.admin')

@section('title', 'Detail Jasa')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between border-b border-gray-200 pb-4 mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 mb-2 md:mb-0">
            Detail Jasa #{{ $service->id }}
        </h1>
        <a href="{{ route('admin.services.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
            ← Kembali
        </a>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Informasi Jasa -->
            <div>
                <h2 class="text-lg font-medium text-gray-700 mb-4">Informasi Jasa</h2>
                <div class="space-y-2 text-gray-600">
                    <p><span class="font-semibold">Judul:</span> {{ $service->title }}</p>
                    <p><span class="font-semibold">Deskripsi:</span> {{ $service->description }}</p>
                    <p><span class="font-semibold">Harga:</span>
                        {{ $service->price ? 'Rp ' . number_format($service->price, 0, ',', '.') : 'Konsultasi' }}
                    </p>
                </div>
            </div>

            <!-- Gambar Jasa -->
            <div>
                <h2 class="text-lg font-medium text-gray-700 mb-4">Gambar</h2>
                @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}"
                         alt="{{ $service->title }}"
                         class="w-48 h-auto rounded border border-gray-200 shadow">
                @else
                    <div class="text-gray-400 italic">No Image</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

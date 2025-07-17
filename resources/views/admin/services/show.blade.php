@extends('layouts.admin')

@section('title', 'Detail Jasa')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Jasa #{{ $service->id }}</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6>Informasi Jasa</h6>
                    <p><strong>Judul:</strong> {{ $service->title }}</p>
                    <p><strong>Deskripsi:</strong> {{ $service->description }}</p>
                    <p><strong>Harga:</strong> {{ $service->price ? 'Rp ' . number_format($service->price, 0, ',', '.') : 'Konsultasi' }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Gambar</h6>
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="img-thumbnail" style="width: 200px; height: auto;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

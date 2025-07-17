<!-- resources/views/landing/services.blade.php -->
@extends('layouts.app')

@section('title', 'Services')

@section('content')
<div class="py-12">
    <h2 class="text-3xl font-bold mb-6 text-center">Our Services</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($services as $service)
            <div class="border rounded-lg p-4 shadow-md">
                <img src="{{ asset('storage/services/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-48 object-cover rounded">
                <h3 class="text-xl font-semibold mt-4">{{ $service->title }}</h3>
                <p>{{ $service->description }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection

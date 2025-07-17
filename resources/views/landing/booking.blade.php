<!-- resources/views/landing/booking.blade.php -->
@extends('layouts.app')

@section('title', 'Booking')

@section('content')
<div class="py-12">
    <h2 class="text-3xl font-bold mb-6 text-center">Book a Service</h2>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('booking.store') }}" class="max-w-lg mx-auto">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" required>
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Service</label>
            <select name="service" class="w-full border rounded p-2" required>
                <option value="">Select a service</option>
                @foreach ($services as $service)
                    <option value="{{ $service->title }}">{{ $service->title }}</option>
                @endforeach
            </select>
            @error('service') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Project Description</label>
            <textarea name="description" class="w-full border rounded p-2" required></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Submit</button>
    </form>
</div>
@endsection

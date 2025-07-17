<!-- resources/views/landing/login.blade.php -->
@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="py-12">
    <h2 class="text-3xl font-bold mb-6 text-center">Admin Login</h2>
    <form method="POST" action="{{ route('login.post') }}" class="max-w-lg mx-auto">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Username</label>
            <input type="text" name="username" class="w-full border rounded p-2" required>
            @error('username') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full border rounded p-2" required>
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</button>
    </form>
</div>
@endsection

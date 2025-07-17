<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITFreelanceHub - @yield('title')</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('home') }}" class="text-2xl font-bold">ITFreelanceHub</a>
            <div class="space-x-4">
                @if(auth()->check())
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <a href="{{ route('admin.catalog') }}">Manajemen Katalog</a>
                    <a href="{{ route('admin.orders') }}">Manajemen Pesanan</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @else
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('services') }}">Services</a>
                    <a href="{{ route('booking') }}">Booking</a>
                    <a href="{{ route('login') }}">Login</a>
                @endif
            </div>
        </div>
    </nav>

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>© 2025 ITFreelanceHub. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

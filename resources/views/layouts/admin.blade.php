<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 min-h-screen bg-gradient-to-b from-blue-600 to-blue-800 text-white flex flex-col fixed">
        <div class="p-6 text-xl font-bold flex items-center space-x-2">
            <i class="fas fa-tachometer-alt"></i>
            <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
        </div>

        <nav class="flex-1">
            <ul class="space-y-1 mt-6">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center px-6 py-3 hover:bg-blue-700 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-900' : '' }}">
                        <i class="fas fa-home mr-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.services.index') }}"
                        class="flex items-center px-6 py-3 hover:bg-blue-700 {{ request()->routeIs('admin.services.*') ? 'bg-blue-900' : '' }}">
                        <i class="fas fa-briefcase mr-2"></i> Manajemen Katalog
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.bookings.index') }}"
                        class="flex items-center px-6 py-3 hover:bg-blue-700 {{ request()->routeIs('admin.bookings.*') ? 'bg-blue-900' : '' }}">
                        <i class="fas fa-shopping-cart mr-2"></i> Manajemen Pesanan
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 ml-64 min-h-screen flex flex-col">
        <!-- Top Navbar -->
        <nav class="bg-white shadow p-4 flex justify-end">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold">
                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                </button>
            </form>
        </nav>

        <!-- Page Content -->
        <main class="flex-1 p-6">
            @if(session('success'))
                <div class="mb-4">
                    <div class="bg-green-100 text-green-800 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4">
                    <div class="bg-red-100 text-red-800 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>

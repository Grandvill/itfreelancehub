<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: false }" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Sidebar for desktop -->
    <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0 bg-gradient-to-b from-blue-600 to-blue-800 text-white">
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
    </div>

    <!-- Mobile Sidebar -->
    <div x-show="sidebarOpen" class="fixed inset-0 z-40 flex md:hidden" role="dialog" aria-modal="true">
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50" @click="sidebarOpen = false"></div>
        <div x-show="sidebarOpen" x-transition class="relative flex-1 flex flex-col max-w-xs w-full bg-gradient-to-b from-blue-600 to-blue-800 text-white">
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
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col md:pl-64 min-h-screen">

        <!-- Navbar -->
        <header class="sticky top-0 bg-white shadow z-10 flex items-center justify-between px-4 py-4 md:py-5 md:px-6">
            <!-- Hamburger -->
            <button @click="sidebarOpen = true" class="text-gray-600 md:hidden">
                <i class="fas fa-bars text-xl"></i>
            </button>

            <div class="flex items-center space-x-4 ml-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-4 md:p-6">
            @if(session('success'))
                <div class="mb-4">
                    <div class="bg-green-100 text-green-800 px-4 py-3 rounded" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4">
                    <div class="bg-red-100 text-red-800 px-4 py-3 rounded" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>

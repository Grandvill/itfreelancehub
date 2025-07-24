<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        sidebar: '#1f2937',
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="flex h-screen bg-gray-100 text-gray-900 overflow-hidden">

    <!-- Sidebar desktop -->
    <aside class="bg-sidebar text-white w-64 flex-shrink-0 hidden lg:block">
        <div class="flex items-center justify-center h-16 border-b border-gray-700">
            <div class="flex items-center space-x-2">
                <i class="fas fa-code text-2xl text-blue-400"></i>
                <span class="text-xl font-bold">ITFreelanceHub</span>
            </div>
        </div>
        <nav class="mt-5">
            <ul class="space-y-2 px-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center px-4 py-3 rounded-lg transition-colors
                       {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white border-l-4 border-blue-500' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} flex items-center px-4 py-2 rounded-md }}">
                        <i class="fas fa-globe w-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.services.index') }}"
                       class="flex items-center px-4 py-3 rounded-lg transition-colors
                       {{ request()->routeIs('admin.services.*') ? 'bg-gray-700 text-white border-l-4 border-blue-500' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} flex items-center px-4 py-2 rounded-md }}">
                        <i class="fas fa-briefcase w-5 mr-3"></i>
                        <span>Manajemen Katalog</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.bookings.index') }}"
                       class="flex items-center px-4 py-3 rounded-lg transition-colors
                       {{ request()->routeIs('admin.bookings.*') ? 'bg-gray-700 text-white border-l-4 border-blue-500' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} flex items-center px-4 py-2 rounded-md }}">
                        <i class="fas fa-shopping-cart w-5 mr-3"></i>
                        <span>Manajemen Pesanan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.sales-report.index') }}"
                       class="flex items-center px-4 py-3 rounded-lg transition-colors
                       {{ request()->routeIs('admin.sales-report.*') ? 'bg-gray-700 text-white border-l-4 border-blue-500' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} flex items-center px-4 py-2 rounded-md }}">
                        <i class="fas fa-chart-line w-5 mr-3"></i>
                        <span>Laporan Penjualan</span>
                    </a>
                </li>
                <li class="border-t border-gray-700 pt-2 mt-2">
                    <a href="{{ url('/') }}" target="_blank"
                       class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition-colors">
                        <i class="fas fa-external-link-alt w-5 mr-3"></i>
                        <span>View Website</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden lg:hidden"></div>

    <!-- Mobile Sidebar -->
    <aside id="mobile-sidebar"
           class="fixed inset-y-0 left-0 bg-sidebar text-white w-64 z-30 transform -translate-x-full transition-transform duration-300 lg:hidden">
        <div class="flex items-center justify-between h-16 border-b border-gray-700 px-6">
            <div class="flex items-center space-x-2">
                <i class="fas fa-code text-2xl text-blue-400"></i>
                <span class="text-xl font-bold">ITFreelanceHub</span>
            </div>
            <button id="close-sidebar" class="text-gray-300 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="mt-5">
            <ul class="space-y-2 px-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center px-4 py-3 rounded-lg transition-colors
                       {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.services.index') }}"
                       class="flex items-center px-4 py-3 rounded-lg transition-colors
                       {{ request()->routeIs('admin.services.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        <i class="fas fa-briefcase w-5 mr-3"></i>
                        <span>Manajemen Katalog</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.bookings.index') }}"
                       class="flex items-center px-4 py-3 rounded-lg transition-colors
                       {{ request()->routeIs('admin.bookings.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        <i class="fas fa-shopping-cart w-5 mr-3"></i>
                        <span>Manajemen Pesanan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.sales-report.index') }}"
                       class="flex items-center px-4 py-3 rounded-lg transition-colors
                       {{ request()->routeIs('admin.sales-report.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        <i class="fas fa-chart-line w-5 mr-3"></i>
                        <span>Laporan Penjualan</span>
                    </a>
                </li>
                <li class="border-t border-gray-700 pt-2 mt-2">
                    <a href="{{ url('/') }}" target="_blank"
                       class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition-colors">
                        <i class="fas fa-external-link-alt w-5 mr-3"></i>
                        <span>View Website</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Konten Utama -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header -->
        <x-admin.header :title="View::hasSection('title') ? View::getSection('title') : 'Admin Panel'" />


        <!-- Main -->
        <main class="flex-1 overflow-y-auto p-6">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">{{ session('error') }}</div>
            @endif
            @yield('content')
        </main>
    </div>

    <script>
        // Mobile sidebar toggle
        document.addEventListener('DOMContentLoaded', function () {
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeSidebarButton = document.getElementById('close-sidebar');

            function openSidebar() {
                mobileSidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.remove('hidden');
            }

            function closeSidebar() {
                mobileSidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            }

            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', openSidebar);
            }
            if (closeSidebarButton) {
                closeSidebarButton.addEventListener('click', closeSidebar);
            }
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', closeSidebar);
            }
        });
    </script>
</body>
</html>

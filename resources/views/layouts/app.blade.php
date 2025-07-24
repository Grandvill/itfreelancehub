<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ITFreelanceHub - Professional IT Services')</title>

    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">IT</span>
                    </div>
                    <a href="{{ route('home') }}" class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent"> ITFreelanceHub </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    @if(auth()->check())
                        <!-- Admin Navigation -->
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                       <a href="{{ route('admin.services.index') }}" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium">
                            <i class="fas fa-box"></i>
                            <span>Manajemen Katalog</span>
                        </a>

                        <a href="{{ route('admin.orders.index') }}" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Manajemen Pesanan</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="flex items-center space-x-2 text-red-600 hover:text-red-700 transition-colors duration-200 font-medium">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    @else
                        <!-- Guest Navigation -->
                        <a href="{{ route('home') }}" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                        <a href="{{ route('services') }}" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium">
                            <i class="fas fa-briefcase"></i>
                            <span>Services</span>
                        </a>
                        <a href="{{ route('companyProfile') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium py-2 px-4 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-building"></i>
                            <span>Company Profile</span>
                        </a>
                        <a href="{{ route('booking') }}" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Booking</span>
                        </a>
                        <a href="{{ route('track.order') }}" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium">
                            <i class="fas fa-search"></i>
                            <span>Track Order</span>
                        </a>
                        <a href="{{ route('login') }}" class="flex items-center space-x-2 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-md hover:shadow-lg">
                            <i class="fas fa-user"></i>
                            <span>Login</span>
                        </a>
                    @endif
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden py-4 border-t border-gray-200 animate-slide-down">
                <div class="flex flex-col space-y-4">
                    @if(auth()->check())
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium py-2 px-4 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('admin.services.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium py-2 px-4 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-box"></i>
                            <span>Manajemen Katalog</span>
                        </a>

                        <a href="{{ route('admin.orders.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium py-2 px-4 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Manajemen Pesanan</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="px-4">
                            @csrf
                            <button type="submit" class="flex items-center space-x-3 text-red-600 hover:text-red-700 transition-colors duration-200 font-medium py-2 rounded-lg hover:bg-red-50 text-left w-full">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('home') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium py-2 px-4 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                        <a href="{{ route('services') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium py-2 px-4 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-briefcase"></i>
                            <span>Services</span>
                        </a>
                        <a href="{{ route('companyProfile') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium py-2 px-4 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-building"></i>
                            <span>Company Profile</span>
                        </a>
                        <a href="{{ route('track.order') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium py-2 px-4 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-search"></i>
                            <span>Track Order</span>
                        </a>
                        <a href="{{ route('login') }}" class="flex items-center space-x-3 bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-md mx-4">
                            <i class="fas fa-user"></i>
                            <span>Login</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- JavaScript for Mobile Menu -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            const icon = this.querySelector('i');

            mobileMenu.classList.toggle('hidden');

            if (mobileMenu.classList.contains('hidden')) {
                icon.className = 'fas fa-bars text-xl';
            } else {
                icon.className = 'fas fa-times text-xl';
            }
        });

        // Close success message
        document.addEventListener('DOMContentLoaded', function() {
            const closeButtons = document.querySelectorAll('.alert-close');
            closeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    this.closest('.alert').style.display = 'none';
                });
            });
        });
    </script>
</body>
</html>

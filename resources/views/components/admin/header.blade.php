<header class="flex items-center justify-between px-6 py-4 bg-white shadow-sm">
    <div class="flex items-center">
        <!-- Mobile menu button -->
        <button id="mobile-menu-button" class="mr-4 text-gray-600 lg:hidden focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>
        <h1 class="text-xl font-semibold text-gray-800">
            {{ $title ?? 'Admin Panel' }}
        </h1>
    </div>

    <div class="flex items-center space-x-4">
        <div class="hidden md:flex items-center space-x-2">
            <span class="text-sm text-gray-600">
                Welcome, {{ Auth::user()->name ?? 'Admin' }}
            </span>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors text-sm">
                <i class="fas fa-sign-out-alt mr-1"></i> Logout
            </button>
        </form>
    </div>
</header>

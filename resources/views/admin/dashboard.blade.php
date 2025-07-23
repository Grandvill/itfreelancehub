@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <!-- Judul Halaman -->
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard Admin</h1>

    <!-- Kartu Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Total Pesanan -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden transform hover:scale-105 transition duration-300">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-shopping-cart text-2xl text-blue-600"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-700">Total Pesanan</h3>
                        <p class="text-3xl font-bold text-blue-600">{{ $totalBookings }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.bookings.index') }}" class="text-sm text-blue-600 hover:text-blue-800 flex items-center">
                        Lihat semua pesanan
                        <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Pesanan Menunggu -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden transform hover:scale-105 transition duration-300">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-clock text-2xl text-yellow-600"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-700">Pesanan Menunggu</h3>
                        <p class="text-3xl font-bold text-yellow-600">{{ $pendingBookings }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.bookings.index', ['status' => 'Pending']) }}"
                       class="text-sm text-yellow-600 hover:text-yellow-800 flex items-center">
                        Lihat pesanan menunggu
                        <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Total Layanan -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden transform hover:scale-105 transition duration-300">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-briefcase text-2xl text-green-600"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-700">Total Layanan</h3>
                        <p class="text-3xl font-bold text-green-600">{{ $totalServices }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.services.index') }}" class="text-sm text-green-600 hover:text-green-800 flex items-center">
                        Kelola layanan
                        <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Pesanan Terbaru -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">Pesanan Terbaru</h2>
            <a href="{{ route('admin.bookings.index') }}" class="text-sm text-blue-600 hover:text-blue-500">Lihat semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Klien</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Layanan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($recentBookings as $booking)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $booking->user->name ?? $booking->name ?? 'Tidak tersedia' }}</div>
                                <div class="text-sm text-gray-500">{{ $booking->user->email ?? $booking->email ?? 'Tidak tersedia' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->service->title ?? 'Tidak tersedia' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusClasses = [
                                        'Pending' => 'bg-yellow-100 text-yellow-800',
                                        'In Progress' => 'bg-blue-100 text-blue-800',
                                        'Completed' => 'bg-green-100 text-green-800',
                                        'Cancelled' => 'bg-red-100 text-red-800',
                                        'Accepted' => 'bg-teal-100 text-teal-800',
                                        'Rejected' => 'bg-red-100 text-red-800',
                                    ];
                                    $statusClass = $statusClasses[$booking->status] ?? 'bg-gray-100 text-gray-800';
                                @endphp
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                    {{ $booking->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $booking->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.bookings.show', $booking->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Lihat</a>
                                <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada pesanan terbaru</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Layanan Terbaru -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">Layanan Terbaru</h2>
            <a href="{{ route('admin.services.index') }}" class="text-sm text-blue-600 hover:text-blue-500">Kelola semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Layanan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Ditambahkan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($recentServices as $service)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($service->image)
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                 src="{{ asset('storage/services/' . $service->image) }}"
                                                 alt="{{ $service->title }}">
                                        </div>
                                    @else
                                        <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center">
                                            <i class="fas fa-briefcase text-gray-500"></i>
                                        </div>
                                    @endif
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $service->title }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                Rp {{ number_format($service->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $service->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada layanan ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Lacak Pesanan - ITFreelanceHub')

@section('content')

<!-- Track Order Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Lacak Pesanan Anda</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">
            Masukkan alamat email yang Anda gunakan saat melakukan pemesanan untuk melihat status pesanan Anda
        </p>
    </div>
</section>

<!-- Search Form Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="text-center mb-8">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search text-2xl text-blue-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Cari Pesanan Anda</h2>
                    <p class="text-gray-600">Masukkan email yang digunakan saat pemesanan</p>
                </div>

                <!-- Error/Success Messages -->
                @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                </div>
                @endif

                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
                @endif

                <!-- Search Form -->
                <form method="POST" action="{{ route('track.order') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="search_email" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-envelope mr-1"></i> Alamat Email
                        </label>
                        <input type="email" id="search_email" name="search_email" required
                            value="{{ old('search_email', $searchEmail ?? '') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('search_email') border-red-500 @enderror"
                            placeholder="Masukkan email Anda (contoh: zahidan23@gmail.com)">
                        @error('search_email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                        <i class="fas fa-search mr-2"></i>
                        Lacak Pesanan
                    </button>
                </form>

                <!-- Quick Info -->
                <div class="mt-8 p-4 bg-blue-50 rounded-lg">
                    <h4 class="font-semibold text-blue-900 mb-2">
                        <i class="fas fa-info-circle mr-1"></i> Informasi
                    </h4>
                    <ul class="text-sm text-blue-800 space-y-1">
                        <li>• Gunakan email yang sama dengan saat melakukan pemesanan</li>
                        <li>• Anda dapat melihat semua pesanan yang pernah dibuat</li>
                        <li>• Status pesanan akan diperbarui secara real-time</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Orders Results Section -->
@if(isset($orders) && $orders->count() > 0)
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Riwayat Pesanan Anda</h2>
                <p class="text-gray-600">Berikut adalah daftar pesanan untuk email:
                    <strong>{{ $searchEmail }}</strong></p>
            </div>

            <!-- Orders Grid -->
            <div class="space-y-6">
                @foreach($orders as $order)
                <div class="bg-white border border-gray-200 rounded-xl shadow-lg hover:shadow-xl transition-shadow overflow-hidden">
                    <div class="md:flex">
                        <!-- Service Image -->
                        <div class="md:w-1/4">
                            @if($order->service && $order->service->image)
                            <img src="{{ asset('storage/services/' . $order->service->image) }}"
                                alt="{{ $order->service->title }}"
                                class="w-full h-48 md:h-full object-cover">
                            @else
                            <div class="w-full h-48 md:h-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-briefcase text-4xl text-gray-400"></i>
                            </div>
                            @endif
                        </div>

                        <!-- Order Details -->
                        <div class="md:w-3/4 p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">
                                        {{ $order->service ? $order->service->title : 'Service tidak ditemukan' }}
                                    </h3>
                                    <p class="text-gray-600 mb-2">
                                        <i class="fas fa-calendar mr-1"></i>
                                        Dipesan pada: {{ $order->created_at->format('d F Y, H:i') }}
                                    </p>
                                    <p class="text-gray-600 mb-2">
                                        <i class="fas fa-hashtag mr-1"></i>
                                        Order ID: #{{ $order->id }}
                                    </p>
                                </div>

                                <!-- Status Badge -->
                                <div class="text-right">
                                    @php
                                        $statusConfig = [
                                            'Request' => [
                                                'class' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                                'icon' => 'fas fa-clock',
                                                'text' => 'Menunggu Konfirmasi'
                                            ],
                                            'Approved' => [
                                                'class' => 'bg-green-100 text-green-800 border-green-200',
                                                'icon' => 'fas fa-check-circle',
                                                'text' => 'Disetujui'
                                            ],
                                            'Rejected' => [
                                                'class' => 'bg-red-100 text-red-800 border-red-200',
                                                'icon' => 'fas fa-times-circle',
                                                'text' => 'Ditolak'
                                            ]
                                        ];
                                        $status = $statusConfig[$order->status] ?? $statusConfig['Request'];
                                    @endphp
                                    <span class="px-4 py-2 inline-flex items-center text-sm font-semibold rounded-full border {{ $status['class'] }}">
                                        <i class="{{ $status['icon'] }} mr-2"></i>
                                        {{ $status['text'] }}
                                    </span>
                                </div>
                            </div>

                            <!-- Order Info Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h4 class="font-semibold text-gray-700 mb-2">Informasi Pelanggan</h4>
                                    <p class="text-sm text-gray-600 mb-1">
                                        <i class="fas fa-user mr-1"></i> {{ $order->name }}
                                    </p>
                                    <p class="text-sm text-gray-600 mb-1">
                                        <i class="fas fa-envelope mr-1"></i> {{ $order->email }}
                                    </p>
                                    @if($order->phone)
                                    <p class="text-sm text-gray-600 mb-1">
                                        <i class="fas fa-phone mr-1"></i> {{ $order->phone }}
                                    </p>
                                    @endif
                                    @if($order->company)
                                    <p class="text-sm text-gray-600">
                                        <i class="fas fa-building mr-1"></i> {{ $order->company }}
                                    </p>
                                    @endif
                                </div>

                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h4 class="font-semibold text-gray-700 mb-2">Detail Proyek</h4>
                                    <p class="text-sm text-gray-600 mb-1">
                                        <i class="fas fa-money-bill-wave mr-1"></i>
                                        Harga: <span class="font-semibold text-green-600">
                                            Rp {{ number_format($order->service_price ?? 0, 0, ',', '.') }}
                                        </span>
                                    </p>
                                    @if($order->timeline)
                                    <p class="text-sm text-gray-600">
                                        <i class="fas fa-calendar-alt mr-1"></i> Timeline: {{ $order->timeline }}
                                    </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Project Description -->
                            @if($order->message)
                            <div class="bg-blue-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-comment-alt mr-1"></i> Deskripsi Proyek
                                </h4>
                                <p class="text-sm text-gray-700 leading-relaxed">
                                    {{ $order->message }}
                                </p>
                            </div>
                            @endif

                            <!-- Status Timeline -->
                            <div class="mt-6 pt-4 border-t border-gray-200">
                                <h4 class="font-semibold text-gray-700 mb-3">
                                    <i class="fas fa-history mr-1"></i> Status Timeline
                                </h4>
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                        <span class="ml-2 text-xs text-gray-600">Pesanan Dibuat</span>
                                    </div>
                                    <div class="flex-1 h-px bg-gray-300"></div>
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 {{ $order->status != 'Request' ? 'bg-green-500' : 'bg-gray-300' }} rounded-full"></div>
                                        <span class="ml-2 text-xs text-gray-600">Dikonfirmasi</span>
                                    </div>
                                    <div class="flex-1 h-px bg-gray-300"></div>
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 {{ $order->status == 'Approved' ? 'bg-green-500' : 'bg-gray-300' }} rounded-full"></div>
                                        <span class="ml-2 text-xs text-gray-600">Selesai</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Contact Support -->
            <div class="mt-12 bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-8 text-white text-center">
                <h3 class="text-2xl font-bold mb-4">Butuh Bantuan?</h3>
                <p class="text-blue-100 mb-6">
                    Jika Anda memiliki pertanyaan tentang pesanan Anda, jangan ragu untuk menghubungi tim support kami.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="mailto:support@itfreelancehub.com"
                        class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        <i class="fas fa-envelope mr-2"></i>
                        Email Support
                    </a>
                    <a href="tel:+6281234567890"
                        class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                        <i class="fas fa-phone mr-2"></i>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- How to Track Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Cara Melacak Pesanan</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">1. Masukkan Email</h3>
                    <p class="text-gray-600">Gunakan alamat email yang sama dengan saat Anda melakukan pemesanan layanan kami.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">2. Cari Pesanan</h3>
                    <p class="text-gray-600">Sistem akan mencari semua pesanan yang terkait dengan alamat email Anda.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-list-alt text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">3. Lihat Status</h3>
                    <p class="text-gray-600">Dapatkan informasi lengkap tentang status dan detail pesanan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

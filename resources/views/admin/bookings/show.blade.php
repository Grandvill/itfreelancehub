@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Detail Pesanan #{{ $booking->id }}</h2>
        <a href="{{ route('admin.bookings.index') }}" class="text-blue-600 hover:text-blue-800">
            ← Kembali ke daftar pesanan
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-3">Informasi Pelanggan</h4>
                    <div class="space-y-3">
                        <div><span class="text-gray-600 font-medium">Nama:</span> <span class="text-gray-900 ml-2">{{ $booking->name }}</span></div>
                        <div><span class="text-gray-600 font-medium">Email:</span> <span class="text-gray-900 ml-2">{{ $booking->email }}</span></div>
                        <div><span class="text-gray-600 font-medium">No. Telepon:</span> <span class="text-gray-900 ml-2">{{ $booking->phone ?? 'N/A' }}</span></div>
                        <div><span class="text-gray-600 font-medium">Perusahaan:</span> <span class="text-gray-900 ml-2">{{ $booking->company ?? 'N/A' }}</span></div>
                    </div>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-3">Informasi Pesanan</h4>
                    <div class="space-y-3">
                        <div><span class="text-gray-600 font-medium">Layanan:</span> <span class="text-gray-900 ml-2">{{ $booking->service->title ?? '-' }}</span></div>
                        <div><span class="text-gray-600 font-medium">Harga:</span> <span class="text-gray-900 ml-2">Rp{{ number_format($booking->service->price ?? 0, 0, ',', '.') }}</span></div>
                        <div><span class="text-gray-600 font-medium">Timeline:</span> <span class="text-gray-900 ml-2">{{ $booking->timeline ?? 'N/A' }}</span></div>
                        <div><span class="text-gray-600 font-medium">Tanggal:</span> <span class="text-gray-900 ml-2">{{ $booking->created_at->translatedFormat('d F Y, H:i') }}</span></div>
                        <div>
                            <span class="text-gray-600 font-medium">Status:</span>
                            <span class="ml-2 px-2 py-1 inline-flex text-xs font-semibold rounded-full
                                @if(strtolower($booking->status) == 'pending') bg-yellow-500 text-yellow-100
                                @elseif(strtolower($booking->status) == 'accepted') bg-green-500 text-green-100
                                @else bg-red-700 text-red-100 @endif">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </div>


                    </div>
                </div>
            </div>

            @if ($booking->description)
            <div class="mt-6">
                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-3">Detail Proyek</h4>
                <div class="bg-gray-50 p-4 rounded-md">
                    <p class="text-gray-800 whitespace-pre-line">{{ $booking->description }}</p>
                </div>
            </div>
            @endif

            <div class="mt-6">
                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-3">Ubah Status</h4>
                <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="flex items-center space-x-4">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                        <option value="Request" {{ $booking->status == 'Request' ? 'selected' : '' }}>Request</option>
                        <option value="Approved" {{ $booking->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                        <option value="Rejected" {{ $booking->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        Update Status
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

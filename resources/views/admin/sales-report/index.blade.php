@extends('layouts.admin')

@section('title', 'Laporan Penjualan')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Laporan Penjualan</h2>
        <form action="{{ route('admin.sales-report.index') }}" method="GET" class="flex items-center space-x-4">
            <div>
                <label for="from" class="text-sm font-medium text-gray-700">From</label>
                <input type="date" name="from" value="{{ $from }}" class="px-3 py-2 border rounded-md text-sm">
            </div>
            <div>
                <label for="to" class="text-sm font-medium text-gray-700">To</label>
                <input type="date" name="to" value="{{ $to }}" class="px-3 py-2 border rounded-md text-sm">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md mt-6">Filter</button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pesanan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($bookings as $index => $booking)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">
                            @if ($booking->service->image)
                                <img src="{{ asset('storage/' . $booking->service->image) }}" class="h-16 w-16 object-cover rounded-lg">
                            @else
                                <div class="h-16 w-16 bg-gray-200 flex items-center justify-center rounded-lg">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $booking->service->title }}</div>
                            <div class="text-sm text-gray-500">{{ $booking->name }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">Rp{{ number_format($booking->service->price ?? 0, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 text-center">1</td>
                        <td class="font-semibold">
                            Rp{{ number_format($booking->service->price ?? 0, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $booking->created_at->format('d/m/Y') }}<br>
                            <span class="text-gray-500">{{ $booking->created_at->format('H:i') }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusColor = match($booking->status) {
                                    'Approved' => 'bg-green-100 text-green-800',
                                    'Rejected' => 'bg-red-100 text-red-800',
                                    default => 'bg-yellow-100 text-yellow-800',
                                };
                            @endphp
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                {{ $booking->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-sm text-gray-500 py-8">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-inbox text-4xl text-gray-300 mb-4"></i>
                                <p class="text-lg font-medium text-gray-400">Tidak ada data penjualan</p>
                                <p class="text-gray-400">untuk periode yang dipilih</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($bookings->count())
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-600">
                        Total {{ count($bookings) }} pesanan untuk periode {{ \Carbon\Carbon::parse($from)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($to)->format('d/m/Y') }}

                    </div>

                    <div class="text-lg font-semibold text-gray-900">
                        Total Pendapatan: Rp{{ number_format($totalRevenue, 0, ',', '.') }}
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection

@extends('layouts.admin')
@section('title', 'Manage Bookings')

@section('content')

  <!-- Filter & Search (aligned to the right) -->
<div class="flex justify-between items-center space-y-6 mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Order Management</h2>

    <form method="GET" class="flex flex-wrap items-center space-x-3 ml-auto">
        <select name="status" onchange="this.form.submit()"
            class="border rounded-md px-3 py-2 text-sm">
            <option value="">All Statuses</option>
            @foreach(['pending' => 'Pending', 'accepted' => 'Accepted', 'rejected' => 'Rejected'] as $value => $label)
                <option value="{{ $value }}" {{ request('status') === $value ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>

        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
            class="border rounded-md px-3 py-2 text-sm">

        <button type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Search</button>
    </form>
</div>



    <!-- Booking Table -->
    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left font-medium">NO.</th>
                    <th class="px-6 py-3 text-left font-medium">CUSTOMER</th>
                    <th class="px-6 py-3 text-left font-medium">SERVICE</th>
                    <th class="px-6 py-3 text-left font-medium">STATUS</th>
                    <th class="px-6 py-3 text-left font-medium">CREATED</th>
                    <th class="px-6 py-3 text-left font-medium">ACTIONS</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse($bookings as $index => $booking)
                <tr>
                     <td class="px-4 py-3 text-sm text-gray-600 whitespace-nowrap">
                        {{ ($bookings->currentPage() - 1) * $bookings->perPage() + $index + 1 }}
                    </td>
                    <td class="px-6 py-4">{{ $booking->name }}<br><small>{{ $booking->email }}</small></td>
                    <td class="px-6 py-4">{{ $booking->service->title ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold
                            @if($booking->status == 'pending') bg-yellow-500 text-yellow-100
                            @elseif($booking->status == 'accepted') bg-green-500 text-green-100
                            @else bg-red-700 text-red-100 @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">{{ $booking->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('admin.bookings.show', $booking->id) }}" class="font-medium text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-eye"></i> View
                        </a>
                        <form action="{{ route('admin.bookings.updateStatus', $booking) }}" method="POST" class="inline">
                            @csrf
                            <select name="status" onchange="this.form.submit()" class="text-xs border rounded px-2 py-1">
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="accepted" {{ $booking->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No bookings found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">
            {{ $bookings->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection

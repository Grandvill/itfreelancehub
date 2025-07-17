```blade
@extends('layouts.admin')

@section('title', 'Manajemen Pesanan')

@section('content')
<div class="container-fluid px-4">
    <!-- Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manajemen Pesanan</h1>
        <div class="btn-group" role="group">
            <input type="radio" class="btn-check" name="statusFilter" id="all" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="all">Semua</label>

            <input type="radio" class="btn-check" name="statusFilter" id="pending" autocomplete="off">
            <label class="btn btn-outline-warning" for="pending">Pending</label>

            <input type="radio" class="btn-check" name="statusFilter" id="accepted" autocomplete="off">
            <label class="btn btn-outline-success" for="accepted">Diterima</label>

            <input type="radio" class="btn-check" name="statusFilter" id="rejected" autocomplete="off">
            <label class="btn btn-outline-danger" for="rejected">Ditolak</label>
        </div>
    </div>

    <!-- Bookings Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Perusahaan</th>
                            <th>Jasa</th>
                            <th>Budget</th>
                            <th>Timeline</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr data-status="{{ $booking->status ?? 'pending' }}">
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->phone ?? '-' }}</td>
                            <td>{{ $booking->company ?? '-' }}</td>
                            <td>{{ $booking->service ?? 'N/A' }}</td>
                            <td>{{ $booking->budget ?? '-' }}</td>
                            <td>{{ $booking->timeline ?? '-' }}</td>
                            <td>
                                <span class="badge bg-{{ $booking->status == 'accepted' ? 'success' : ($booking->status == 'rejected' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($booking->status ?? 'pending') }}
                                </span>
                            </td>
                            <td>{{ $booking->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $booking->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    @if($booking->status !== 'accepted')
                                    <form action="{{ route('admin.bookings.update', ['booking' => $booking->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="accepted">
                                        <button type="submit" class="btn btn-success btn-sm" title="Terima">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    @endif

                                    @if($booking->status !== 'rejected')
                                    <form action="{{ route('admin.bookings.update', ['booking' => $booking->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="btn btn-danger btn-sm" title="Tolak">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>

                        <!-- Detail Modal -->
                        <div class="modal fade" id="detailModal{{ $booking->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail Pesanan #{{ $booking->id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6>Informasi Klien</h6>
                                                <p><strong>Nama:</strong> {{ $booking->name }}</p>
                                                <p><strong>Email:</strong> {{ $booking->email }}</p>
                                                <p><strong>Telepon:</strong> {{ $booking->phone ?? '-' }}</p>
                                                <p><strong>Perusahaan:</strong> {{ $booking->company ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h6>Detail Proyek</h6>
                                                <p><strong>Jasa:</strong> {{ $booking->service ?? 'N/A' }}</p>
                                                <p><strong>Budget:</strong> {{ $booking->budget ?? '-' }}</p>
                                                <p><strong>Timeline:</strong> {{ $booking->timeline ?? '-' }}</p>
                                                <p><strong>Status:</strong>
                                                    <span class="badge bg-{{ $booking->status == 'accepted' ? 'success' : ($booking->status == 'rejected' ? 'danger' : 'warning') }}">
                                                        {{ ucfirst($booking->status ?? 'pending') }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <h6>Pesan</h6>
                                                <p class="border p-3 rounded">{{ $booking->description ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center">Belum ada pesanan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('input[name="statusFilter"]');
    const tableRows = document.querySelectorAll('tbody tr[data-status]');

    filterButtons.forEach(button => {
        button.addEventListener('change', function() {
            const filterValue = this.id;

            tableRows.forEach(row => {
                const rowStatus = row.getAttribute('data-status');

                if (filterValue === 'all' || rowStatus === filterValue) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endsection
```

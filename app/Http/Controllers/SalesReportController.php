<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class SalesReportController extends Controller
{
    public function index(Request $request)
{
    $from = $request->input('from') ?? Carbon::now()->startOfMonth()->format('Y-m-d');
    $to = $request->input('to') ?? Carbon::now()->endOfMonth()->format('Y-m-d');

    $bookings = Booking::with('service')
        ->where('status', 'accepted')
        ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
        ->orderBy('created_at', 'desc')
        ->get();

    // Hitung total pendapatan
    $totalRevenue = $bookings->sum(fn($booking) => $booking->service->price ?? 0);

    return view('admin.sales-report.index', compact('bookings', 'from', 'to', 'totalRevenue'));
}
}
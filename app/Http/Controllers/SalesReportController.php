<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class SalesReportController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->input('start_date', now()->startOfMonth()->toDateString());
        $end_date = $request->input('end_date', now()->toDateString());

        $bookings = Booking::with('service')
            ->whereBetween('created_at', [$start_date, $end_date])
            ->orderBy('created_at', 'desc')
            ->get();

        $total_orders = $bookings->count();
        $total_revenue = $bookings->where('status', 'Approved')->sum(function ($booking) {
            return $booking->service->price ?? 0;
        });

        return view('admin.sales-report.index', compact('bookings', 'start_date', 'end_date', 'total_orders', 'total_revenue'));
    }
}
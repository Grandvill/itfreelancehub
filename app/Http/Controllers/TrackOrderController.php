<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class TrackOrderController extends Controller
{
    public function index()
    {
        return view('landing.track_order');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search_email' => 'required|email'
        ], [
            'search_email.required' => 'Silakan masukkan alamat email Anda.',
            'search_email.email' => 'Format email tidak valid.'
        ]);

        $searchEmail = $request->search_email;

        $orders = Booking::with('service')
            ->where('email', $searchEmail)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($orders->count() > 0) {
            $successMessage = "Ditemukan " . $orders->count() . " pesanan untuk email: " . $searchEmail;
            return view('landing.track_order', compact('orders', 'searchEmail'))
                ->with('success', $successMessage);
        } else {
            return redirect()->back()
                ->with('error', "Tidak ada pesanan ditemukan untuk email: " . $searchEmail)
                ->withInput();
        }
    }
}

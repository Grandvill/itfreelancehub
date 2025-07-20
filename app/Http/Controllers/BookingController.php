<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
{
    $services = Service::all(['id', 'title']);

    // Tambahkan dua variabel berikut agar tidak undefined di Blade
    $selectedService = null;
    $selectedServiceData = null;

    return view('landing.booking', compact('services', 'selectedService', 'selectedServiceData'));
}

    public function index()
    {
        $bookings = Booking::all();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service_id' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'service_id' => $request->service_id,
            'description' => $request->message,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Booking submitted successfully!');
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $booking->update(['status' => $request->status]);
        return redirect()->route('admin.bookings.index')->with('success', 'Booking status updated!');
    }
}

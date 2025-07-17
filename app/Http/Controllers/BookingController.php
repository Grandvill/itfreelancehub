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
        return view('landing.booking', compact('services'));
    }

    public function index()
    {
        $bookings = Booking::all();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'service' => $request->service,
            'description' => $request->description,
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

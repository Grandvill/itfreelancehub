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

    public function index(Request $request)
    {
        $query = Booking::query()->with('service');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhereHas('service', fn($q) => $q->where('title', 'like', "%{$search}%"));
            });
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $booking->load('service');
        return view('admin.bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'service_id' => 'required|exists:services,id',
            'service_price' => 'nullable|numeric',
            'timeline' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'service_id' => $request->service_id,
            'description' => $request->message,
            'service_price' => $request->service_price,
            'timeline' => $request->timeline,
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

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully!');
    }
}
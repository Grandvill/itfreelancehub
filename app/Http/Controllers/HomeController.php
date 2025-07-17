<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('landing.home');
    }

    public function services()
    {
        $services = Service::all();
        return view('landing.services', compact('services'));
    }

    public function booking()
    {
        $services = Service::all();
        return view('landing.booking', compact('services'));
    }

    public function storeBooking(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'service_id' => 'required|exists:services,id',
            'budget' => 'nullable|string|max:50',
            'timeline' => 'nullable|string|max:50',
            'message' => 'required|string',
        ]);

        Booking::create($request->all());
        return redirect()->route('booking')->with('success', 'Booking submitted successfully!');
    }

    public function dashboard()
    {
        $totalBookings = Booking::count();
        $totalServices = Service::count();
        return view('admin.dashboard', compact('totalBookings', 'totalServices'));
    }
}

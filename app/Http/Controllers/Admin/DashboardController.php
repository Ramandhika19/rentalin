<?php

namespace App\\Http\\Controllers\\Admin;

use App\\Http\\Controllers\\Controller;
use App\\Models\\Booking;
use App\\Models\\Vehicle;
use Illuminate\\Http\\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::count();
        $bookings = Booking::count();
        $pending = Booking::where('status', 'pending')->count();
        $recent = Booking::with(['user', 'vehicle'])->latest()->take(10)->get();
        return view('admin.dashboard', compact('vehicles', 'bookings', 'pending', 'recent'));
    }

    public function updateBooking(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,confirmed,ongoing,completed,cancelled',
            'payment_status' => 'required|in:unpaid,waiting_verification,paid,rejected'
        ]);
        $booking->update($data);
        return back()->with('success', 'Pesanan berhasil diperbarui.');
    }
}

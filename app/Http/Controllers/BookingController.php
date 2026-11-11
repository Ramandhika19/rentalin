<?php

namespace App\\Http\\Controllers;

use App\\Models\\Booking;
use App\\Models\\Vehicle;
use Illuminate\\Http\\Request;
use Carbon\\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('vehicle')->where('user_id', auth()->id())->latest()->get();
        return view('dashboard', compact('bookings'));
    }

    public function store(Request $request, Vehicle $vehicle)
    {
        $data = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'payment_method' => 'required|in:transfer,cash',
            'notes' => 'nullable|string|max:1000'
        ]);
        $conflict = Booking::where('vehicle_id', $vehicle->id)
            ->whereIn('status', ['pending', 'confirmed', 'ongoing'])
            ->whereDate('start_date', '<=', $data['end_date'])
            ->whereDate('end_date', '>=', $data['start_date'])->exists();
        if ($conflict || $vehicle->status !== 'available') {
            return back()->withErrors(['start_date' => 'Kendaraan tidak tersedia pada rentang tanggal tersebut.']);
        }
        $days = max(1, Carbon::parse($data['start_date'])->diffInDays(Carbon::parse($data['end_date'])));
        $data['user_id'] = auth()->id();
        $data['vehicle_id'] = $vehicle->id;
        $data['total_days'] = $days;
        $data['total_price'] = $days * $vehicle->price_per_day;
        $data['payment_status'] = 'unpaid';
        $data['status'] = 'pending';
        Booking::create($data);
        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil dikirim. Tunggu konfirmasi admin.');
    }
}

<?php

namespace App\\Http\\Controllers;

use App\\Models\\Booking;
use App\\Models\\Vehicle;
use App\\Models\\User;
use Illuminate\\Http\\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'Kendaraan' => Vehicle::count(),
            'Pengguna' => User::where('role', 'user')->count(),
            'Booking' => Booking::count(),
            'Menunggu' => Booking::where('status', 'pending')->count(),
        ];

        $bookings = Booking::with(['user', 'vehicle'])
            ->latest()
            ->take(8)
            ->get();

        return view('admin.dashboard', compact('stats', 'bookings'));
    }

    public function vehicles()
    {
        $vehicles = Vehicle::latest()->paginate(12);

        return view('admin.vehicles', compact('vehicles'));
    }

    public function saveVehicle(Request $r, $id = null)
    {
        $d = $r->validate([
            'name' => 'required|max:150',
            'brand' => 'nullable|max:100',
            'type' => 'required|in:motor,mobil',
            'year' => 'nullable|integer',
            'plate_number' => 'required|max:20|unique:vehicles,plate_number' . ($id ? ',' . $id : ''),
            'price_per_day' => 'required|numeric|min:1',
            'description' => 'nullable',
            'image' => 'nullable|url',
            'status' => 'required|in:available,unavailable',
        ]);

        if ($id) {
            Vehicle::findOrFail($id)->update($d);
        } else {
            Vehicle::create($d);
        }

        return redirect()
            ->route('admin.vehicles')
            ->with('success', 'Data kendaraan tersimpan.');
    }

    public function deleteVehicle($id)
    {
        Vehicle::findOrFail($id)->delete();

        return back();
    }

    public function bookings()
    {
        $bookings = Booking::with(['user', 'vehicle'])
            ->latest()
            ->paginate(15);

        return view('admin.bookings', compact('bookings'));
    }

    public function updateBooking(Request $r, $id)
    {
        $d = $r->validate([
            'status' => 'required|in:pending,approved,rejected,completed,cancelled',
        ]);

        Booking::findOrFail($id)->update($d);

        return back()->with('success', 'Status booking diperbarui.');
    }
}

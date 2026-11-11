<?php

namespace App\\Http\\Controllers\\Admin;

use App\\Http\\Controllers\\Controller;
use App\\Models\\Vehicle;
use Illuminate\\Http\\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::latest()->paginate(15);
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('admin.vehicles.form', ['vehicle' => new Vehicle]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255', 'type' => 'required|in:motor,mobil',
            'brand' => 'nullable|string|max:100', 'plate_number' => 'required|unique:vehicles',
            'description' => 'nullable|string', 'price_per_day' => 'required|numeric|min:1',
            'status' => 'required|in:available,maintenance', 'image' => 'nullable|image|max:2048'
        ]);
        if ($request->hasFile('image')) $data['image'] = $request->file('image')->store('vehicles', 'public');
        Vehicle::create($data);
        return redirect()->route('admin.kendaraan.index')->with('success', 'Kendaraan ditambahkan.');
    }

    public function edit(Vehicle $kendaraan)
    {
        return view('admin.vehicles.form', ['vehicle' => $kendaraan]);
    }

    public function update(Request $request, Vehicle $kendaraan)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255', 'type' => 'required|in:motor,mobil',
            'brand' => 'nullable|string|max:100', 'plate_number' => 'required|unique:vehicles,plate_number,'.$kendaraan->id,
            'description' => 'nullable|string', 'price_per_day' => 'required|numeric|min:1',
            'status' => 'required|in:available,maintenance', 'image' => 'nullable|image|max:2048'
        ]);
        if ($request->hasFile('image')) $data['image'] = $request->file('image')->store('vehicles', 'public');
        $kendaraan->update($data);
        return redirect()->route('admin.kendaraan.index')->with('success', 'Kendaraan diperbarui.');
    }

    public function destroy(Vehicle $kendaraan)
    {
        abort_if($kendaraan->bookings()->exists(), 422, 'Kendaraan memiliki riwayat pesanan.');
        $kendaraan->delete();
        return back()->with('success', 'Kendaraan dihapus.');
    }
}

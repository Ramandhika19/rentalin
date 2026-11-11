<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehicle::where('status', 'available');
        if ($request->filled('type')) $query->where('type', $request->type);
        if ($request->filled('search')) $query->where('name', 'like', '%'.$request->search.'%');
        $vehicles = $query->latest()->paginate(9);
        return view('home', compact('vehicles'));
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }
}

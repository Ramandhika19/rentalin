<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $vehicles = Vehicle::query()->where('status','available')
            ->when($request->type, fn($q) => $q->where('type',$request->type))
            ->when($request->search, fn($q) => $q->where('name','like','%'.$request->search.'%'))
            ->latest()->paginate(9);
        return view('home', compact('vehicles'));
    }
    public function show(Vehicle $vehicle) { return view('vehicles.show', compact('vehicle')); }
}

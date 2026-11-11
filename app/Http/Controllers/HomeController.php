<?php
namespace App\Http\Controllers;
use App\Models\Vehicle;
class HomeController extends Controller {public function index(){$vehicles=Vehicle::where('status','available')->latest()->paginate(9);return view('home',compact('vehicles'));}public function show($id){$vehicle=Vehicle::findOrFail($id);return view('vehicles.show',compact('vehicle'));}}
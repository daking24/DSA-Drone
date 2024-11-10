<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Drone;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DroneManager extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $drones = Drone::with('location')->get();
        $locations = Location::all();
        return view('admin.pages.drones', compact('drones', 'locations', 'user'));
    }

    public function create(Request $request)
    {
        // validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'location_id' => 'required|exists:locations,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $drone = Drone::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'location_id' => $request->location_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return redirect()->route('admin.drones')->with('success', 'Drone created successfully');
    }

    public function update(Request $request, $id)
    {
        $drone = Drone::findOrFail($id);
        $drone->update($request->all());
        return redirect()->route('admin.drones')->with('success', 'Drone updated successfully');
    }

    public function delete(Drone $drone)
    {
        $drone->delete();
        return redirect()->route('admin.drones')->with('success', 'Drone deleted successfully');
    }
}

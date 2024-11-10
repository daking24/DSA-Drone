<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class LocationManger extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $locations = Location::all();
        return view('admin.pages.locations', compact('locations', 'user'));
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'radius' => 'nullable|numeric',
        ]);

        $location = Location::create([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'state' => $request->state,
            'country' => $request->country,
            'radius' => $request->radius
        ]);

        return redirect()->route('admin.locations')->with('success', 'Location created successfully');
    }

    public function edit(Location $location)
    {
        return view('admin.pages.location_modal.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $location->update($request->all());
        return redirect()->route('admin.locations')->with('success', 'Location updated successfully');
    }

    public function delete(Location $location)
    {
        $location->delete();
        return redirect()->route('admin.locations')->with('success', 'Location deleted successfully');
    }
}

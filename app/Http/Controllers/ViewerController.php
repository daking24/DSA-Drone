<?php

namespace App\Http\Controllers;

use App\Models\Drone;

class ViewerController extends Controller
{

    public function dashboard()
    {

        $user = auth()->guard('web')->user();
        $drones = Drone::all(); // Assuming Drone is a model that retrieves all drones
        return view('user.pages.dashboard', compact('user', 'drones'));
    }

    public function viewDrone($id)
    {
        $user = auth()->guard('web')->user();
        $drone = Drone::findOrFail($id);
        $drones = Drone::all();// Retrieve the drone by its ID
        return view('user.pages.drone', compact('user','drone', 'drones')); // Assuming there is a view for displaying drone details
    }

}

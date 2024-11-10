<?php

namespace App\Http\Controllers;

use App\Models\Drone;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard, Users, Drones, Reports
    public function index()
    {
        $user = auth()->guard('web')->user();
        $usersCount = User::count();
        $dronesCount = Drone::count();
        return view('admin.pages.home', compact('user', 'usersCount', 'dronesCount'));
    }

    public function dashboard(){
        return view('dashboard');
    }
}

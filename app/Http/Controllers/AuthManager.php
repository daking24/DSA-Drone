<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('auth.login');
    }

    // Handle the login request
    public function loginLogic(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Retrieve the authenticated user's data
            $user = Auth::user()->id;
            $userData = User::find('$user');

            // Redirect to dashboard with user data passed to the view
            return redirect()->intended('dashboard')->with('user', $userData);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    // Show the registration form
    public function showRegisterForm()
    {
        return view('auth.register');  // Assuming you have a 'register.blade.php' view
    }

    // Handle the registration request
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');  // Redirect to dashboard after registration
    }

    // Handle the logout request
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended();
    }

    public function dashboard()
    {
        // Retrieve the authenticated user's data
        $user = Auth::user();

        // Pass the user data to the view
        return view('dashboard', ['user' => $user]);
    }
}

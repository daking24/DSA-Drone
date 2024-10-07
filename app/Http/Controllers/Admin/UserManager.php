<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserCreated;
use App\Models\User;
use App\Models\Viewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserManager extends Controller
{
    public function createUser(Request $request)
    {
        // Validate the request data
        $validatedData = $this->validateUserData($request);

        // Generate a random password based on user info
        $password = $this->generateRandomPassword($validatedData['first_name']);

        // Create the user and viewer entry
        $user = $this->createUserEntry($validatedData, $password);
        $this->createViewerEntry($user->id, $validatedData);

        // Assign the 'viewer' role to the user using the User model's method
        $user->assignRole('viewer');

        // Send password to the user via email (implement email logic here)
        Mail::to($request->email)->send(new UserCreated($user, $password));

        return redirect()->back()->with('success', "User created with password: $password");
    }

    // Private method to validate user data
    private function validateUserData(Request $request)
    {
        return $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'gender' => 'nullable|string|max:10',
            'service_no' => 'nullable|string|max:20',
            'rank' => 'nullable|string|max:20',
            'post' => 'nullable|string|max:50',
        ]);
    }

    // Private method to generate a random password
    private function generateRandomPassword($firstName)
    {
        return Str::random(5) . strtolower($firstName) . Str::random(3); // Example: ab123johnxyz
    }

    // Private method to create a user entry
    private function createUserEntry(array $data, string $password)
    {
        return User::create([
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($password), // Hashing the password
        ]);
    }

    // Private method to create a viewer entry
    private function createViewerEntry($userId, array $data)
    {
        return Viewer::create([
            'user_id' => $userId,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'service_no' => $data['service_no'],
            'rank' => $data['rank'],
            'post' => $data['post'],
        ]);
    }

}

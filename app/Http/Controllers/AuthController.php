<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Display the login view
    public function index()
    {
        return view('welcome'); // Make sure this points to the correct view
    }

    // Handle the login request
    public function login(Request $request)
{
    // Validate the input fields
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    // Attempt to log in with the provided credentials
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // Regenerate session to prevent session fixation
        return redirect('dashboard')->with('success', 'Berhasil login');
    } else  {
        // Redirect back to the login with an error message if login fails
        return redirect('/login')->with('failed', 'Username atau password salah');
    }
}


    // Handle the logout request
    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/login'); // Redirect to the login page
    }
}

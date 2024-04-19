<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email'=> ['required'],
            'password'=> ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('dashboard')->with('succes', 'berhasil login');
        }else{
            return redirect()->route('login')->with('failed', 'username atau password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}

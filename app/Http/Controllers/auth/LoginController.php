<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // Show the login form
    public function tampilLogin()
    {
        return view('auth.login'); // Ensure 'auth.login' points to the correct view
    }

    public function submitLogin(Request $request)
    {
        // Validasi input nama dan role sebagai password
        $request->validate([
            'nama' => 'required|string',
            'role' => 'required|string',
        ]);
    
        // Cari user berdasarkan nama dan role
        $user = User::where('nama', $request->nama)
                    ->where('role', $request->role)
                    ->first();
    
        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard');
        }
    
        return back()->withErrors([
            'nama' => 'Nama atau role salah.',
        ])->withInput();
    }
    
    
    // Handle logout
    public function logout()
    {
        Auth::logout(); // Log the user out
        return redirect()->route('home'); // Redirect to the home page after logout
    }
}


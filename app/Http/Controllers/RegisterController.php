<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('register');
    }

    /**
     * Handle the registration request.
     */
    public function register(Request $request): RedirectResponse
    {
        // dd($request->all()); // Untuk check all request dari parameter $request

        $request->validate([
            'username' => 'required|string|max:25|unique:petugas',
            'password' => 'required|string|min:5|confirmed',
            'nama_petugas' => 'required|string|max:35',
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nama_petugas' => $request->nama_petugas,
            'level' => 'siswa',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
}

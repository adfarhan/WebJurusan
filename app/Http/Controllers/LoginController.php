<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function tampilanLogin(){
        return view('backend.admin.akun.login');
    }

    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt to login
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Redirect to intended route or home
            return redirect()->route('berandaAdminUtama')->with('success', 'Login berhasil! Selamat datang.');
        }

        // If login fails
        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();  // Menghapus sesi login pengguna
        
        // Menghapus sesi atau token yang tersimpan di browser
        $request->session()->invalidate();
        
        // Regenerasi sesi untuk menghindari session fixation
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau beranda setelah logout
        return redirect('/login');  // Atau halaman lain sesuai kebutuhan
    }
}

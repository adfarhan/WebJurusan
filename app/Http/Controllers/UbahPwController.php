<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UbahPwController extends Controller
{
    //
    public function showChangeForm()
    {
        return view('backend.admin.akun.fromPw'); // Ganti dengan path view Anda
    }

    // Memproses perubahan password
    public function changePassword(Request $request)
    {
        // Validasi input password
        $request->validate([
            'current_password' => ['required', 'current_password'], // Pastikan password yang dimasukkan saat ini sesuai
            'new_password' => ['required', 'min:8', 'confirmed'], // Validasi password baru dan konfirmasi
        ]);

        // Cek apakah password lama sesuai
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['Password saat ini tidak valid.'],
            ]);
        }

        // Update password baru
        Auth::user()->update([
            'password' => Hash::make($request->new_password), // Enkripsi password baru
        ]);

        return redirect()->route('password.change')->with('status', 'Password berhasil diperbarui!');
    }
}

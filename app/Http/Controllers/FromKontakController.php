<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FromKontakController extends Controller
{
    //
    public function kirimPesan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);
        
        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'pesan' => $request->input('pesan'),
        ];
        
        Mail::send('backend.admin.fromkontak.from', $data, function($mail) use ($data) {
            $mail->to("adefarhan425@gmail.com")
                 ->subject('Pesan Baru dari Form Kontak');
            $mail->from($data['email'], 'Web Jurusan'); // Mengganti nama pengirim menjadi "Web Jurusan"
        });
        
        return back()->with('success', 'Pesan berhasil dikirim!');
        
    }
}

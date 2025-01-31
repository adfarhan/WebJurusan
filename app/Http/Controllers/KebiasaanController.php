<?php

namespace App\Http\Controllers;

use App\Models\Kebiasaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KebiasaanController extends Controller
{
    public function index()
    {
        $kebiasaan = Kebiasaan::all();
        return view('backend.tampilanback.kegiatanAdmin', compact('kebiasaan'));
    }

    public function create()
    {
        return view('backend.admin.kebiasaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image',
        ]);

        $imagePath = $request->file('gambar') ? $request->file('gambar')->store('kebiasaan', 'public') : null;

        Kebiasaan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imagePath,
        ]);

        return redirect()->route('kegiatanAdmin')->with('success', 'projek berhasil ditambahkan!');
    }

    // public function show(Projek $kebiasaan)
    // {
    //     return view('projek.show', compact('projek'));
    // }

    public function edit(Projek $kebiasaan)
    {
        return view('backend.admin.projekSiswa.edit', compact('kebiasaan'));
    }

    public function update(Request $request, Kebiasaan $kebiasaan)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('kebiasaan', 'public');
            $kebiasaan->image = $imagePath;
        }

        $kebiasaan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kegiatanAdmin')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Projek $kebiasaan)
    {
        if ($kebiasaan->gambar) {
            Storage::delete('public/' . $kebiasaan->gambar);
        }

        $kebiasaan->delete();
        return redirect()->route('kegiatanAdmin')->with('success', 'Data berhasil dihapus!');
    }
}

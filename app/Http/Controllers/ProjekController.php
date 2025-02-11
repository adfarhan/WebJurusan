<?php

namespace App\Http\Controllers;

use App\Models\Projek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjekController extends Controller
{
    //
    public function index()
    {
        $projek = Projek::all();
        $firstProjek = $projek->first(); 
        return view('backend.tampilanback.kegiatanAdmin', compact('projek', 'firstProjek'));
    }

    public function create()
    {
        return view('backend.admin.projekSiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_projek' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image',
        ]);

        $imagePath = $request->file('gambar') ? $request->file('gambar')->store('projek', 'public') : null;

        Projek::create([
            'judul_projek' => $request->judul_projek,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imagePath,
        ]);

        return redirect()->route('kegiatanAdmin')->with('success', 'projek berhasil ditambahkan!');
    }

    // public function show(Projek $projek)
    // {
    //     return view('projek.show', compact('projek'));
    // }

    public function edit(Projek $projek)
    {
        return view('backend.admin.projekSiswa.edit', compact('projek'));
    }

    public function update(Request $request, Projek $projek)
    {
        $request->validate([
            'judul_projek' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('projek', 'public');
            $projek->image = $imagePath;
        }

        $projek->update([
            'judul_projek' => $request->judul_projek,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kegiatanAdmin')->with('success', 'projek berhasil diperbarui!');
    }

    public function destroy(Projek $projek)
    {
        if ($projek->gambar) {
            Storage::delete('public/' . $projek->gambar);
        }

        $projek->delete();
        return redirect()->route('kegiatanAdmin')->with('success', 'projek berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MataPelajaranController extends Controller
{
    //
    public function index()
    {
        $mapel = Mapel::all();
        return view('backend.tampilanback.kurikulumAdmin', compact( 'mapel'),[
            'title' => 'Jurusan RPL | Kurikulum'
        ]);
    }

    public function create()
    {
        return view('backend.admin.matapelajaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required',
            'deskripsi' => 'required',
        ]);

        Mapel::create([
            'nama_mapel' => $request->nama_mapel,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kurikulumAdmin')->with('success', 'Mata Pelajaran berhasil ditambahkan!');
    }

    // public function show(Projek $projek)
    // {
    //     return view('projek.show', compact('projek'));
    // }

    public function edit(Mapel $matapelajaran)
    {
        return view('backend.admin.matapelajaran.edit', compact('matapelajaran'));
    }

    public function update(Request $request, Mapel $matapelajaran)
    {
        $request->validate([
            'nama_mapel' => 'required',
            'deskripsi' => 'required',
        ]);

        $matapelajaran->update([
            'nama_mapel' => $request->nama_mapel,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kurikulumAdmin')->with('success', 'Mata Pelajaran berhasil diperbarui!');
    }

    public function destroy(Mapel $matapelajaran)
    {
        $matapelajaran->delete();
        return redirect()->route('kurikulumAdmin')->with('success', 'Mata Pelajaran berhasil dihapus!');
    }
}

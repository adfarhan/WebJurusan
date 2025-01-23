<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::all();
        return view('backend.tampilanback.kegiatanAdmin', compact('prestasis'));
    }

    public function create()
    {
        return view('backend.admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
        ]);

        $path = $request->file('gambar')->store('prestasi', 'public');

        Prestasi::create([
            'nama_siswa' => $validated['nama_siswa'],
            'kelas' => $validated['kelas'],
            'gambar' => $path,
            'tanggal' => $validated['tanggal'],
            'deskripsi' => $validated['deskripsi'],
        ]);

        return redirect()->route('kegiatanAdmin')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    

    public function edit(Prestasi $prestasi)
    {
        return view('backend.admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('prestasi', 'public');
            $prestasi->gambar = $path;
        }

        $prestasi->update([
            'nama_siswa' => $validated['nama_siswa'],
            'kelas' => $validated['kelas'],
            'tanggal' => $validated['tanggal'],
            'deskripsi' => $validated['deskripsi'],
        ]);

        return redirect()->route('kegiatanAdmin')->with('success', 'Prestasi berhasil diperbarui!');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->gambar) {
            Storage::disk('public')->delete($prestasi->gambar);
        }
        $prestasi->delete();

        return redirect()->route('kegiatanAdmin')->with('success', 'Prestasi berhasil dihapus!');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    //
    public function index()
    {
        $berita = Berita::orderBy('publish_date', 'desc')->get();
        return view('backend.tampilanback.berandaAdmin', compact('berita'), [
            'title' => 'Tampilan Data Beranda'
        ]);
    }

    // Menampilkan form untuk membuat berita baru
    public function create()
    {
        return view('backend.admin.berita.create');
    }

    // Menyimpan berita baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'publish_date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('berita', 'public');
            $validated['image'] = $path;
        }

        Berita::create($validated);

        return redirect()->route('berandaAdmin')->with('success', 'Berita berhasil ditambahkan.');
    }

    // Menampilkan detail berita
    public function show(Berita $beritum)
    {
        return view('backend.admin.berita.show', compact('beritum'));
    }

    // Menampilkan form untuk mengedit berita
    public function edit(Berita $beritum)
    {
        return view('backend.admin.berita.edit', compact('beritum'));
    }

    // Memperbarui berita yang sudah ada
    public function update(Request $request, Berita $beritum)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'publish_date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($beritum->image) {
                Storage::disk('public')->delete($beritum->image);
            }

            $path = $request->file('image')->store('berita', 'public');
            $validated['image'] = $path;
        }

        $beritum->update($validated);

        return redirect()->route('berandaAdmin')->with('success', 'Berita berhasil diubah.');
    }

    // Menghapus berita
    public function destroy(Berita $beritum)
    {
        // Hapus gambar jika ada
        if ($beritum->image) {
            Storage::disk('public')->delete($beritum->image);
        }

        $beritum->delete();

        return redirect()->route('berandaAdmin')->with('success', 'Berita berhasil dihapus.');
    }
}

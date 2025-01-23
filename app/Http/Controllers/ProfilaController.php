<?php

namespace App\Http\Controllers;

use App\Models\Profila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilaController extends Controller
{
    //
    public function index()
    {
        $profile = Profila::all();
        return view('backend.tampilanback.alumniAdmin', compact('profile'),[
            'title' => 'Jurusan RPL | Alumni'
        ]);
    }

    // Tampilkan form tambah alumni
    public function create()
    {
        return view('backend.admin.profile.create');
    }

    // Simpan data alumni baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'angkatan' => 'required|string|max:4',
            'pekerjaan' => 'nullable|string|max:255',
            'cerita_sukses' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('profil', 'public');
        }

        Profila::create($data);

        return redirect()->route('alumniAdmin')->with('success', 'Profil Alumni berhasil ditambahkan.');
    }

    // Tampilkan form edit alumni
    public function edit($id)
    {
        $profile = Profila::findOrFail($id);
        return view('backend.admin.profile.edit', compact('profile'));
    }

    // Update data alumni
    public function update(Request $request, $id)
    {
        $profile = Profila::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'angkatan' => 'required|string|max:4',
            'pekerjaan' => 'nullable|string|max:255',
            'cerita_sukses' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            if ($profile->foto) {
                Storage::disk('public')->delete($profile->foto);
            }
            $data['foto'] = $request->file('foto')->store('alumni', 'public');
        }

        $profile->update($data);

        return redirect()->route('alumniAdmin')->with('success', 'Profil Alumni berhasil diperbarui.');
    }

    // Hapus data alumni
    public function destroy($id)
    {
        $profile = Profila::findOrFail($id);

        if ($profile->foto) {
            Storage::disk('public')->delete($profile->foto);
        }

        $profile->delete();

        return redirect()->route('alumniAdmin')->with('success', 'Profil Alumni berhasil dihapus.');
    }
}

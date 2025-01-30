<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengajarController extends Controller
{
    //
    public function index()
    {
        $pengajars = Pengajar::all();
        return view('pengajars.index', compact('pengajars'));
    }

    public function create()
    {
        return view('backend.admin.pengajar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pengajar', 'public');
        }

        Pengajar::create($validated);

        return redirect()->route('tentangAdmin')->with('success', 'Pengajar berhasil ditambahkan.');
    }

    public function edit(Pengajar $pengajar)
    {
        return view('backend.admin.pengajar.edit', compact('pengajar'));
    }

    public function update(Request $request, Pengajar $pengajar)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($pengajar->foto) {
                Storage::delete($pengajar->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pengajar', 'public');
        }

        $pengajar->update($validated);

        return redirect()->route('tentangAdmin')->with('success', 'Pengajar berhasil diperbarui.');
    }

    public function destroy(Pengajar $pengajar)
    {
        if ($pengajar->foto) {
            Storage::disk('public')->delete($pengajar->foto);
        }
        $pengajar->delete();

        return redirect()->route('tentangAdmin')->with('success', 'Pengajar berhasil dihapus.');
    }
}

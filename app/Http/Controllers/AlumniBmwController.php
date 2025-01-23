<?php

namespace App\Http\Controllers;

use App\Models\AlumniBmw;
use Illuminate\Http\Request;

class AlumniBmwController extends Controller
{
    //
    public function index()
    {
        $alumnibmw = AlumniBmw::all();
        return view('backend.tampilanback.alumniAdmin', compact('alumnibmw'),[
            'title' => 'Jurusan RPL | Alumni'
        ]);
    }

    public function create()
    {
        return view('backend.admin.bmw.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'angkatan' => 'required|string',
            'bekerja' => 'required|integer',
            'melanjutkan' => 'required|integer',
            'wirausaha' => 'required|integer',
        ]);

        AlumniBmw::create($request->all());
        return redirect()->route('alumniAdmin')->with('success', 'Data alumni berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $alumnibmw = AlumniBmw::findOrFail($id);
        return view('backend.admin.bmw.edit', compact('alumnibmw'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'angkatan' => 'required|string',
            'bekerja' => 'required|integer',
            'melanjutkan' => 'required|integer',
            'wirausaha' => 'required|integer',
        ]);

        $alumnibmw = AlumniBmw::findOrFail($id);
        $alumnibmw->update($request->all());
        return redirect()->route('alumniAdmin')->with('success', 'Data alumni berhasil diupdate.');
    }

    public function destroy($id)
    {
        $alumnibmw = AlumniBmw::findOrFail($id);
        $alumnibmw->delete();
        return redirect()->route('alumniAdmin')->with('success', 'Data alumni berhasil dihapus.');
    }
}

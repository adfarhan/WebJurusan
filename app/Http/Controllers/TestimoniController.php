<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    //

    // Menampilkan form untuk menambahkan testimoni
    public function create()
    {
        return view('backend.admin.testimoni.create');
    }

     // Menyimpan testimoni baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'profesi' => 'required|string|max:255',
            'testimoni_alumni' => 'required|string',
            'image_alumni' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $data = $request->only(['nama', 'profesi', 'testimoni_alumni']);
        $data['status'] = 'pending'; // Tambahkan status default
    
        if ($request->hasFile('image_alumni')) {
            $path = $request->file('image_alumni')->store('testimoni', 'public');
            $data['image_alumni'] = $path;
        }
    
        Testimoni::create($data);
    
        return redirect()->route('berandaAdmin')->with('success', 'Testimoni berhasil ditambahkan dan menunggu konfirmasi.');
    }
    
    public function storeUser(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'profesi' => 'required|string|max:255',
            'testimoni_alumni' => 'required|string',
            'image_alumni' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $data = $request->only(['nama', 'profesi', 'testimoni_alumni']);
        $data['status'] = 'pending'; // Tambahkan status default
    
        if ($request->hasFile('image_alumni')) {
            $path = $request->file('image_alumni')->store('testimoni', 'public');
            $data['image_alumni'] = $path;
        }
    
        Testimoni::create($data);
    
        return redirect('/#testi')->with('success', 'Testimoni berhasil ditambahkan dan menunggu konfirmasi.');
    }
    

    // Menampilkan form untuk mengedit testimoni
    public function edit(Testimoni $testimoni)
    {
        return view('backend.admin.testimoni.edit', compact('testimoni'));
    }

     // Memperbarui testimoni
    public function update(Request $request, Testimoni $testimoni)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'profesi' => 'required|string|max:255',
            'testimoni_alumni' => 'required|string',
            'image_alumni' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
         $data = $request->only(['nama', 'profesi', 'testimoni_alumni']); // Ambil data yang diperlukan saja
    
        if ($request->hasFile('image_alumni')) {
             // Hapus gambar lama jika ada
            if ($testimoni->image_alumni && Storage::disk('public')->exists($testimoni->image_alumni)) {
                Storage::disk('public')->delete($testimoni->image_alumni);
            }
    
             // Simpan gambar baru
            $path = $request->file('image_alumni')->store('testimoni', 'public');
            $data['image_alumni'] = $path;
        }
    
         // Update data testimoni
        $testimoni->update($data);
    
        return redirect()->route('berandaAdmin')->with('success', 'Testimoni berhasil diperbarui.');
    }
    

     // Menghapus testimoni
    public function destroy(Testimoni $testimoni)
    {
         // Periksa apakah testimoni memiliki gambar
        if ($testimoni->image_alumni && Storage::disk('public')->exists($testimoni->image_alumni)) {
            // Hapus gambar dari storage
            Storage::disk('public')->delete($testimoni->image_alumni);
        }

        $testimoni->delete();

        return redirect()->route('berandaAdmin')->with('success', 'Testimoni berhasil dihapus.');
    }

    public function updateStatus(Testimoni $testimoni, $status)
    {
        // Validasi status
        if (!in_array($status, ['diterima', 'ditolak'])) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }
    
        // Jika statusnya "ditolak", 
            if ($status === 'ditolak') {
                // Periksa jika ada file gambar yang terkait dengan testimoni
                if ($testimoni->image) {
                    // Hapus file gambar jika ada
                    $imagePath = public_path('storage/testimonis/' . $testimoni->image);
                    if (file_exists($imagePath)) {
                        unlink($imagePath); // Hapus gambar
                    }
                }

                // Hapus data testimoni
                $testimoni->delete(); 

                return redirect()->route('berandaAdmin')->with('success', 'Testimoni ditolak, gambar dihapus, dan data berhasil dihapus.');
            }
    
        // Jika statusnya "diterima", perbarui status
        $testimoni->update(['status' => $status]);
    
        return redirect()->route('berandaAdmin')->with('success', 'Status testimoni berhasil diperbarui.');
    }
    

    public function adminIndex()
    {
        $pendingTestimoni = Testimoni::where('status', 'pending')->get();
        $diterimaTestimoni = Testimoni::where('status', 'diterima')->get();
        $ditolakTestimoni = Testimoni::where('status', 'ditolak')->get();

        return view('backend.admin.testimoni.konfirmasiData', [
            'pendingTestimoni' => $pendingTestimoni,
            'diterimaTestimoni' => $diterimaTestimoni,
            'ditolakTestimoni' => $ditolakTestimoni,
            'title' => 'Konfirmasi Data Alumni'
        ]);
        
    }

}

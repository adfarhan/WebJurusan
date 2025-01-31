<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Projek;
use App\Models\Prestasi;
use App\Models\AlumniBmw;
use App\Models\Pengajar;
use App\Models\Mapel;
use App\Models\Profila;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TampilanBackendController extends Controller
{
    //
    public function berandaUtama(){
        $dataCount = Testimoni::where('status', 'pending')->count();
        return view('backend.tampilanback.berandaBack', compact('dataCount'),[
            'title' => 'Beranda Utama Admin'
        ]);
    }


    public function berandaAdmin(){
        $berita = Berita::orderBy('publish_date', 'desc')->paginate(5);
        $testimonis = Testimoni::where('status', 'diterima')->paginate(5);
        return view('backend.tampilanback.berandaAdmin', compact('berita','testimonis'),[
            'title' => 'Beranda Admin'
        ]);
    }

    public function tentangAdmin(){
        $pengajars = Pengajar::all();
        return view('backend.tampilanback.tentangAdmin', compact('pengajars'),[
            'title' => 'Tentang | Admin'
        ]);
    }
    public function alumniAdmin(){
        $profile = Profila::all();
        $alumnibmw = AlumniBmw::all();
        // Hitung total siswa (Bekerja + Melanjutkan + Wirausaha)
        foreach ($alumnibmw as $data) {
            $data->total = $data->bekerja + $data->melanjutkan + $data->wirausaha;
        }
        return view('backend.tampilanback.alumniAdmin', compact('alumnibmw','profile'),[
            'title' => 'Alumni | Admin'
        ]);
    }
    public function kegiatanAdmin(){
        $prestasis = Prestasi::all();
        $projek = Projek::all();
        return view('backend.tampilanback.kegiatanAdmin', compact('prestasis','projek'),[
            'title' => 'Kegaiatan | Admin'
        ]);
    }

    public function kurikulumAdmin(){
        $mapel = Mapel::all();
        return view('backend.tampilanback.kurikulumAdmin', compact('mapel'),[
            'title' => 'Kurikulum | Admin'
        ]);
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Berita;
use App\Models\Projek;
use App\Models\Profila;
use App\Models\Pengajar;
use App\Models\Prestasi;
use App\Models\AlumniBmw;
use App\Models\Kebiasaan;
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
        $berita = Berita::orderBy('created_at', 'desc')->paginate(5, ['*'], 'berita_page');
        $testimonis = Testimoni::where('status', 'diterima')->paginate(5,  ['*'], 'testimoni_page');
        return view('backend.tampilanback.berandaAdmin', compact('berita','testimonis'),[
            'title' => 'Beranda Admin'
        ]);
    }

    public function tentangAdmin(){
        $pengajars = Pengajar::orderBy('created_at', 'desc')->paginate(5, ['*'], 'staf_page');
        return view('backend.tampilanback.tentangAdmin', compact('pengajars'),[
            'title' => 'Tentang | Admin'
        ]);
    }
    public function alumniAdmin(){
        $profile = Profila::orderBy('created_at', 'desc')->paginate(5, ['*'], 'profil_page');
        $alumnibmw = AlumniBmw::orderBy('created_at', 'desc')->paginate(5, ['*'], 'bmw_page');
        // Hitung total siswa (Bekerja + Melanjutkan + Wirausaha)
        foreach ($alumnibmw as $data) {
            $data->total = $data->bekerja + $data->melanjutkan + $data->wirausaha;
        }
        return view('backend.tampilanback.alumniAdmin', compact('alumnibmw','profile'),[
            'title' => 'Alumni | Admin'
        ]);
    }
    public function kegiatanAdmin(){
        $prestasis = Prestasi::orderBy('created_at', 'desc')->paginate(5, ['*'], 'prestasi_page');
        $projek = Projek::orderBy('created_at', 'desc')->paginate(5, ['*'], 'projek_page');
        $kebiasaan = Kebiasaan::orderBy('created_at', 'desc')->paginate(5, ['*'], 'kebiasaan_page');
        return view('backend.tampilanback.kegiatanAdmin', compact('prestasis','projek', 'kebiasaan'),[
            'title' => 'Kegaiatan | Admin'
        ]);
    }

    public function kurikulumAdmin(){
        $mapel = Mapel::orderBy('created_at', 'desc')->paginate(5, ['*'], 'mapel_page');
        return view('backend.tampilanback.kurikulumAdmin', compact('mapel'),[
            'title' => 'Kurikulum | Admin'
        ]);
    }
}


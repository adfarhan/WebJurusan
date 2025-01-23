<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Projek;
use App\Models\Prestasi;
use App\Models\AlumniBmw;
use App\Models\Profila;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TampilanController extends Controller
{
    public function beranda(){
        $testimonis = Testimoni::where('status', 'diterima')->paginate(1);
        $berita = Berita::orderBy('publish_date', 'desc')->get();
        return view('frontend.tampilan.beranda', compact('berita', 'testimonis'),[
            'title' => 'Jurusan RPL | Beranda'
        ]);
    }

    public function tentang(){
        return view('frontend.tampilan.tentang',[
            'title' => 'Jurusan RPL | Tentang'
        ]);
    }

    public function kurikulum(){
        return view('frontend.tampilan.kurikulum',[
            'title' => 'Jurusan RPL | Kurikulum'
        ]);
    }

    public function kegiatan(){
        $projek = Projek::all();
        $prestasis = Prestasi::paginate(3);
        return view('frontend.tampilan.kegiatan', compact('prestasis', 'projek'),[
            'title' => 'Jurusan RPL | Kegiatan'
        ]);
    }
    
    public function alumni(){
        $alumnibmw = AlumniBmw::all();
        $profil = Profila::all();
        return view('frontend.tampilan.alumni',compact('profil', 'alumnibmw'),[
            'title' => 'Jurusan RPL | Alumni'
        ]);
    }

    public function kontak(){
        return view('frontend.tampilan.kontak',[
            'title' => 'Jurusan RPL | Kontak'
        ]);
    }

}

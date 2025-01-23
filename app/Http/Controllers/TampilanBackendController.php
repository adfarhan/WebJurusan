<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Projek;
use App\Models\Prestasi;
use App\Models\AlumniBmw;
use App\Models\Profila;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TampilanBackendController extends Controller
{
    //
    public function berandaUtama(){
        return view('backend.tampilanback.berandaBack',[
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
        return view('backend.tampilanback.tentangAdmin',[
            'title' => 'Tentang | Admin'
        ]);
    }
    public function alumniAdmin(){
        $profile = Profila::all();
        $alumnibmw = AlumniBmw::all();
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
}

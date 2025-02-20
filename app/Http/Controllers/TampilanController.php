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

class TampilanController extends Controller
{
    public function beranda(){
        $testimonis = Testimoni::where('status', 'diterima')->paginate(4, ['*'], 'testimoni_page');
        $berita = Berita::orderBy('publish_date', 'desc')->paginate(3, ['*'], 'berita_page');
        return view('frontend.tampilan.beranda', compact('berita', 'testimonis'),[
            'title' => 'Jurusan RPL | Beranda'
        ]);
    }

    public function tentang(){
        $pengajars = Pengajar::orderBy('created_at', 'desc')->get(); 
        return view('frontend.tampilan.tentang', compact('pengajars'),[
            'title' => 'Jurusan RPL | Tentang'
        ]);
    }

    public function kurikulum(){
        $mapel = Mapel::orderBy('created_at', 'desc')->get(); 
        return view('frontend.tampilan.kurikulum', compact('mapel'),[
            'title' => 'Jurusan RPL | Kurikulum'
        ]);
    }

    public function kegiatan(){
        $projek = Projek::orderBy('created_at', 'desc')->get(); 
        $kebiasaan = Kebiasaan::orderBy('created_at', 'desc')->take(2)->get(); 
        $prestasis = Prestasi::orderBy('created_at', 'desc')->paginate(2, ['*'], 'berita_page');        
        return view('frontend.tampilan.kegiatan', compact('prestasis', 'projek', 'kebiasaan'),[
            'title' => 'Jurusan RPL | Kegiatan'
        ]);
    }
    
    public function alumni(){
        $alumnibmw = AlumniBmw::orderBy('created_at', 'desc')->take(3)->get();
        foreach ($alumnibmw as $data) {
            $data->total = $data->bekerja + $data->melanjutkan + $data->wirausaha;
        }
        $profil = Profila::orderBy('created_at', 'desc')->paginate(2, ['*'], 'profil_page');    
        return view('frontend.tampilan.alumni', compact('profil', 'alumnibmw'), [
            'title' => 'Jurusan RPL | Alumni'
        ]);
    }

    public function kontak(){
        return view('frontend.tampilan.kontak',[
            'title' => 'Jurusan RPL | Kontak'
        ]);
    }

}

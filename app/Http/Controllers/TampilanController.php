<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Projek;
use App\Models\Profila;
use App\Models\Pengajar;
use App\Models\Kebiasaan;
use App\Models\Prestasi;
use App\Models\AlumniBmw;
use App\Models\Mapel;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TampilanController extends Controller
{
    public function beranda(){
        $testimonis = Testimoni::where('status', 'diterima')->paginate(4);
        $berita = Berita::orderBy('publish_date', 'desc')->paginate(3);
        return view('frontend.tampilan.beranda', compact('berita', 'testimonis'),[
            'title' => 'Jurusan RPL | Beranda'
        ]);
    }

    public function tentang(){
        $pengajars = Pengajar::all();
        return view('frontend.tampilan.tentang', compact('pengajars'),[
            'title' => 'Jurusan RPL | Tentang'
        ]);
    }

    public function kurikulum(){
        $mapel = Mapel::all();
        return view('frontend.tampilan.kurikulum', compact('mapel'),[
            'title' => 'Jurusan RPL | Kurikulum'
        ]);
    }

    public function kegiatan(){
        $projek = Projek::all();
        $kebiasaan = Kebiasaan::all();
        $prestasis = Prestasi::paginate(3);
        return view('frontend.tampilan.kegiatan', compact('prestasis', 'projek', 'kebiasaan'),[
            'title' => 'Jurusan RPL | Kegiatan'
        ]);
    }
    
    public function alumni(){
        $alumnibmw = AlumniBmw::all();
        foreach ($alumnibmw as $data) {
            $data->total = $data->bekerja + $data->melanjutkan + $data->wirausaha;
        }
        $profil = Profila::paginate(2);
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

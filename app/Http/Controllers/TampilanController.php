<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TampilanController extends Controller
{
    public function beranda(){
        return view('frontend.tampilan.beranda',[
            'title' => 'Jurusan RPL | Beranda'
        ]);
    }
}

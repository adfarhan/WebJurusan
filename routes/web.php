<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TampilanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.tampilan.beranda',[
//         'title' => 'Beranda | Web Jurusan'
//     ]);
// });

Route::get('/',[TampilanController::class, 'beranda'])->name('beranda');

Route::get('/admin', function () {
        return view('backend.tampilanback.berandaBack',[
            'title' => 'beranda'
        ]);
    });

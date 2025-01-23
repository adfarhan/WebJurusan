<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProjekController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\TampilanController;
use App\Http\Controllers\AlumniBmwController;
use App\Http\Controllers\ProfilaController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\TampilanBackendController;

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
Route::get('/tentang',[TampilanController::class, 'tentang'])->name('tentang');
Route::get('/kurikulum',[TampilanController::class, 'kurikulum'])->name('kurikulum');
Route::get('/kegiatan',[TampilanController::class, 'kegiatan'])->name('kegiatan');
Route::get('/alumni-sekolah',[TampilanController::class, 'alumni'])->name('alumnis');
Route::get('/kontak',[TampilanController::class, 'kontak'])->name('kontak');

//login
Route::get('login',[LoginController::class, 'tampilanLogin'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/testimoni/store', [TestimoniController::class, 'storeUser'])->name('testimoniUser.store');

//admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
Route::get('/admin/tampilan/berandaUtama',[TampilanBackendController::class,  'berandaUtama'])->name('berandaAdminUtama');
Route::get('/admin/tampilan/beranda',[TampilanBackendController::class,  'berandaAdmin'])->name('berandaAdmin');
Route::get('/admin/tampilan/tentang',[TampilanBackendController::class,  'tentangAdmin'])->name('tentangAdmin');
Route::get('/admin/tampilan/kegiatan',[TampilanBackendController::class,  'kegiatanAdmin'])->name('kegiatanAdmin');
Route::get('/admin/tampilan/alumni',[TampilanBackendController::class,  'alumniAdmin'])->name('alumniAdmin');

Route::resource('berita', BeritaController::class);

Route::resource('testimoni', TestimoniController::class);
Route::post('/testimoni/{testimoni}/{status}', [TestimoniController::class, 'updateStatus'])->name('testimoni.updateStatus');
Route::get('/admin/Konfirmasi/testimoni', [TestimoniController::class, 'adminIndex'])->name('testimoniKonfirAdmin');

Route::resource('prestasi', PrestasiController::class);

Route::resource('projek', ProjekController::class);

Route::resource('alumni', AlumniBmwController::class);

Route::resource('profil', ProfilaController::class);




});

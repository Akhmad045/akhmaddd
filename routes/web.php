<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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
Route::get('profil',[AdminController::class,'profil']);
Route::get('utama',[AdminController::class,'utama']);
Route::get('login',[AdminController::class,'login']);
Route::post('login',[AdminController::class,'masuk']);

// Route Petugas/Admin
Route::get('petugas',[AdminController::class,'petugas']);
route::get('tambah',[AdminController::class,'tambah']);
route::post('tambah',[AdminController::class,'simpan']);
route::get('edit/{id}',[AdminController::class,'edit']);
route::post('edit',[AdminController::class,'ubah']);
route::get('hapus/{id}',[AdminController::class,'hapus']);

//Route Siswa
Route::get('siswa',[AdminController::class,'siswa']);
route::get('tambah/siswa',[AdminController::class,'tambah_siswa']);
route::post('tambah/siswa',[AdminController::class,'simpan_siswa']);
route::get('edit/siswa/{id}',[AdminController::class,'edit_siswa']);
route::post('edit/siswa',[AdminController::class,'ubah_siswa']);
route::get('hapus/siswa/{id}',[AdminController::class,'hapus_siswa']);

//Route Pembayaran
Route::get('pembayaran',[AdminController::class,'pembayaran']);   
Route::post('pembayaran',[AdminController::class,'entri']);   

//Route Kelas
Route::get('kelas',[AdminController::class,'kelas']);
Route::get('tambah/kelas',[AdminController::class,'tambah_kelas']);
Route::post('tambah/kelas',[AdminController::class,'simpan_kelas']);
Route::get('edit/kelas/{id}',[AdminController::class,'edit_kelas']);
Route::post('edit/kelas',[AdminController::class,'ubah_kelas']);
Route::get('hapus/siswa/{id}',[AdminController::class,'hapus_kelas']);

// Logout
Route::get('logout',[AdminController::class,'logout']);
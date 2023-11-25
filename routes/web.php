<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\kelas;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\petugas;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\siswa;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
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
Route::get('utama',[AdminController::class,'utama']);
Route::get('login',[AdminController::class,'login']);
Route::post('login',[AdminController::class,'masuk']);
Route::get('history/pembayaran',[AdminController::class,'history']);

// Route Petugas/Admin
Route::get('petugas',[PetugasController::class,'petugas']);
route::get('tambah',[PetugasController::class,'tambah']);
route::post('tambah',[PetugasController::class,'simpan']);
route::get('edit/{id}',[PetugasController::class,'edit']);
route::post('edit',[PetugasController::class,'ubah']);
route::get('hapus/{id}',[PetugasController::class,'hapus']);

//Route Siswa
Route::get('siswa',[SiswaController::class,'siswa']);
route::get('tambah/siswa',[SiswaController::class,'tambah_siswa']);
route::post('tambah/siswa',[SiswaController::class,'simpan_siswa']);
route::get('edit/siswa/{id}',[SiswaController::class,'edit_siswa']);
route::post('edit/siswa/{id}',[SiswaController::class,'ubah_siswa']);
route::get('hapus/siswa/{id}',[SiswaController::class,'hapus_siswa']);

//Route Pembayaran
Route::get('pembayaran',[AdminController::class,'pembayaran']);   
Route::post('pembayaran',[AdminController::class,'entri']);   

//Route Kelas
Route::get('kelas',[KelasController::class,'kelas']);
Route::get('tambah/kelas',[KelasController::class,'tambah_kelas']);
Route::post('tambah/kelas',[KelasController::class,'simpan_kelas']);
Route::get('edit/kelas/{id}',[KelasController::class,'edit_kelas']);
Route::post('edit/kelas/{id}',[KelasController::class,'ubah_kelas']);
Route::get('hapus/kelas/{id}',[KelasController::class,'hapus_kelas']);

//Route SPP
Route::get('spp',[SppController::class,'spp']);
Route::get('tambah/spp',[SppController::class,'tambah_spp']);
Route::post('tambah/spp',[SppController::class,'simpan_spp']);
Route::get('edit/spp/{id}',[SppController::class,'edit_spp']);
Route::post('edit/spp/{id}',[SppController::class,'ubah_spp']);
Route::get('hapus/spp/{id}',[SppController::class,'hapus_spp']);


// Logout
Route::get('logout',[AdminController::class,'logout']);
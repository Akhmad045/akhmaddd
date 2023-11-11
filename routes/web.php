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

Route::get('utama',[AdminController::class,'utama']);
Route::get('login',[AdminController::class,'login']);
Route::post('login',[AdminController::class,'masuk']);

Route::get('petugas',[AdminController::class,'petugas']);

route::get('tambah',[AdminController::class,'tambah']);
route::post('tambah',[AdminController::class,'simpan']);

Route::get('siswa',[AdminController::class,'siswa']);

Route::get('pembayaran',[AdminController::class,'pembayaran']);   
Route::post('pembayaran',[AdminController::class,'entri']);   

Route::get('logout',[AdminController::class,'logout']);
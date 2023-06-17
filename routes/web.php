<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\SekolahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeController::class,'index']);

Route::get('santri', [SantriController::class,'index']);

Route::get('tambahsantri', [SantriController::class,'create']);

Route::get('sekolah', [SekolahController::class,'index']);

Route::get('tambahsekolah', [SekolahController::class,'create']);
Route::post('post_sekolah', [SekolahController::class,'store'])->name('sekolah.store');
Route::get('editsekolah/{id}', [SekolahController::class,'edit'])->name('edit.sekolah');
Route::post('update_sekolah/{id}', [SekolahController::class,'update'])->name('sekolah.update');
Route::get('hapus/{id}', [SekolahController::class,'destroy'])->name('hapus.sekolah');

Route::get('pembayaran', [PembayaranController::class,'index']);
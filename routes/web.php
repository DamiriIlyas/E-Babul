<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\TagihanController;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Auth::routes();
Route::group(['middleware' => 'auth'], function()
{    
    Route::get('/home', [HomeController::class,'index']);
    
    Route::get('santri', [SantriController::class,'index']);
    Route::get('tambahsantri', [SantriController::class,'create']);
    Route::post('post_santri', [SantriController::class,'store'])->name('santri.store');
    Route::get('editsantri/{id}', [SantriController::class,'edit'])->name('edit.santri');
    Route::post('update_santri/{id}', [SantriController::class,'update'])->name('santri.update');
    Route::get('hapus/{id}', [SantriController::class,'destroy'])->name('hapus.santri');
    
    Route::get('sekolah', [SekolahController::class,'index']);
    Route::get('tambahsekolah', [SekolahController::class,'create']);
    Route::post('post_sekolah', [SekolahController::class,'store'])->name('sekolah.store');
    Route::get('editsekolah/{id}', [SekolahController::class,'edit'])->name('edit.sekolah');
    Route::post('update_sekolah/{id}', [SekolahController::class,'update'])->name('sekolah.update');
    Route::get('hapus/{id}', [SekolahController::class,'destroy'])->name('hapus.sekolah');
    

    Route::get('/tagihan',[TagihanController::class,'index'])->name('tagihan.index');
    Route::post('/tagihan/store',[TagihanController::class,'store'])->name('tagihan.store');

    Route::get('/order', [OrderController::class,'index']);
    Route::post('total_order', [OrderController::class,'store'])->name('order.store');

    Route::get('/pembayaran',[PembayaranController::class,'index']);
    Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/checkout/{santriId}', [PembayaranController::class, 'checkout'])->name('pembayaran.checkout');
});

// Auth::routes();
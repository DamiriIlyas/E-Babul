<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FormulirController;
use App\Http\Controllers\API\PembayaranController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SigninController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/masuk', [AuthController::class, 'login']);
Route::post('/add-form',[FormulirController::class, 'store']);
Route::get('/get-form',[FormulirController::class, 'index']);
Route::get('/get-pembayaran',[PembayaranController::class, 'index']);
Route::route('/add-pembayaran',[PembayaranController::class, 'store']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurnalKegiatanController;

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

Route::get('/', function () {
    return view('admin.dashboard',[
        "title" => "Dashboard"
    ]);
})->middleware('auth');
Route::resource('/pengguna', AdminController::class)->middleware('auth');
Route::get('/profil/{id}', [AdminController::class, 'profil'])->middleware('auth');
Route::get('/passchange', [AdminController::class, 'ubahpass'])->middleware('auth');
Route::resource('/jadwal', JadwalController::class)->middleware('auth');
Route::resource('/jurnalkegiatan', JurnalKegiatanController::class)->middleware('auth');
Route::get('/jurnalkegiatan/status/{id}', [JurnalKegiatanController::class, 'status']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

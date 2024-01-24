<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurnalKebersihanController;
use App\Http\Controllers\JurnalKegiatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KegiatanKaryawanController;

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


Route::middleware(['guest'])->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

});


Route::middleware(['auth'])->group(function () {   

    Route::get('/', function () {
        return view('admin.dashboard',[
            "title" => "Dashboard"
        ]);
    })->middleware('auth');
    
    Route::get('/profil/{id}', [AdminController::class, 'profil'])->middleware('auth');
    Route::resource('/jadwal', JadwalController::class)->middleware('auth');
    Route::resource('/jurnalkegiatan', JurnalKegiatanController::class)->middleware('auth');
    Route::get('/jurnalkegiatan/status/{id}', [JurnalKegiatanController::class, 'status'])->middleware('auth');
    Route::resource('/jurnalkebersihan', JurnalKebersihanController::class)->middleware('auth');
    Route::get('/jurnalkebersihan/status/{id}', [JurnalKebersihanController::class, 'status'])->middleware('auth');
    Route::resource('/kegiatankaryawan', KegiatanKaryawanController::class)->middleware('auth');
    Route::get('/passchange', [LoginController::class, 'changepass'])->middleware('auth');
    Route::post('/passchange', [LoginController::class, 'proseschangepass'])->middleware('auth');
    Route::get('/logout', [LoginController::class, 'logout']);

});

Route::middleware('userAkses:administrator')->group(function () {
    Route::resource('/pengguna', AdminController::class)->middleware('auth');
    
});
// Route::middleware(['userAkses:karyawan' or 'userAkses:katu'])->group(function () {
//     Route::get('/passchange', [LoginController::class, 'changepass']);
//     Route::post('/passchange', [LoginController::class, 'proseschangepass']);
// });


// ini batas
// 
// 
// 

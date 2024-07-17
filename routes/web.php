<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KabagController;
use App\Http\Controllers\HrdController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\DepartemenController;

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
    return view('welcome');
});

Route::get('/', [BerandaController::class,'index']);
Route::get('/login', function () { return view('frontend.login'); });
Route::get('/register', function () { return view('frontend.register'); });
Route::get('/c', function () { return view('frontend.c'); });

Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [BerandaController::class,'beranda'])->name('beranda');
    Route::get('/departement', [DepartemenController::class,'dep'])->name('departement');
    Route::get('/export', [DepartemenController::class,'download']);

});

Route::get('/hrd/login', [HrdController::class,'login']);
Route::post('/hrd/submit-login', [HrdController::class,'submit_login']);

Route::middleware(['auth','hrd'])->group(function () {
    Route::prefix('hrd')->group(function () {
        Route::get('/karyawan', [KaryawanController::class, 'index']);
        Route::post('/submit-karyawan', [KaryawanController::class, 'submit']);
        Route::get('/edit-karyawan/{id}', [KaryawanController::class, 'edit']);
        Route::put('/update-karyawan/{id}', [KaryawanController::class, 'update']);
        Route::delete('/delete-karyawan/{id}', [KaryawanController::class, 'delete']);
        
        Route::get('/kabag', [KabagController::class, 'index']);
        Route::post('/submit-kabag', [KabagController::class, 'submit']);
        Route::get('/edit-kabag/{id}', [KabagController::class, 'edit']);
        Route::put('/update-kabag/{id}', [KabagController::class, 'update']);
        Route::delete('/delete-kabag/{id}', [KabagController::class, 'delete']);
        
        Route::get('/jabatan', [JabatanController::class, 'index']);
        Route::post('/submit-jabatan', [JabatanController::class, 'submit']);
        Route::get('/edit-jabatan/{id}', [JabatanController::class, 'edit']);
        Route::put('/update-jabatan/{id}', [JabatanController::class, 'update']);
        Route::delete('/delete-jabatan/{id}', [JabatanController::class, 'delete']);
        
        Route::get('/departemen', [DepartemenController::class, 'index']);
        Route::post('/submit-departemen', [DepartemenController::class, 'submit']);
        Route::get('/edit-departemen/{id}', [DepartemenController::class, 'edit']);
        Route::put('/update-departemen/{id}', [DepartemenController::class, 'update']);
        Route::delete('/delete-departemen/{id}', [DepartemenController::class, 'delete']);
        
        Route::get('/penilaian-karyawan', [PenilaianController::class, 'index']);
        Route::post('/submit-penilaian', [PenilaianController::class, 'submit']);
        Route::get('/edit-penilaian/{id}', [PenilaianController::class, 'edit']);
        Route::put('/update-penilaian/{id}', [PenilaianController::class, 'update']);
        Route::delete('/delete-penilaian/{id}', [PenilaianController::class, 'delete']);
        Route::get('/laporan', [PenilaianController::class, 'laporan']);
        Route::post('/export', [PenilaianController::class, 'download']);
    });
});

require __DIR__.'/auth.php';

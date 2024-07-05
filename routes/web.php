<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HrdController;
use App\Http\Controllers\AdminController;
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
Route::get('/beranda', [BerandaController::class,'beranda'])->name('beranda');
Route::get('/departement', [DepartemenController::class,'dep'])->name('departement');
Route::get('/export', [DepartemenController::class,'download']);
Route::get('/login', function () { return view('frontend.login'); });
Route::get('/register', function () { return view('frontend.register'); });


Route::get('/admin/login', [AdminController::class,'login']);
Route::post('/admin/submit-login', [AdminController::class,'submit_login']);
Route::get('/admin/registrasi', [AdminController::class,'register_admin']);

Route::middleware(['auth','admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/karyawan', [KaryawanController::class, 'index']);
        Route::post('/submit-karyawan', [KaryawanController::class, 'submit']);
        Route::get('/edit-karyawan/{id}', [KaryawanController::class, 'edit']);
        Route::put('/update-karyawan/{id}', [KaryawanController::class, 'update']);
        Route::delete('/delete-karyawan/{id}', [KaryawanController::class, 'delete']);
        
        Route::get('/hrd', [HrdController::class, 'index']);
        Route::post('/submit-hrd', [HrdController::class, 'submit']);
        Route::get('/edit-hrd/{id}', [HrdController::class, 'edit']);
        Route::put('/update-hrd/{id}', [HrdController::class, 'update']);
        Route::delete('/delete-hrd/{id}', [HrdController::class, 'delete']);
        
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

<?php

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

Route::get('/', function () { return view('frontend.beranda'); });
Route::get('/beranda', function () { return view('frontend.beranda1'); })->name('beranda');
Route::get('/departement', function () { return view('frontend.departement'); })->name('departement');
Route::get('/login', function () { return view('frontend.login'); });
Route::get('/register', function () { return view('frontend.register'); });
Route::get('/', function () { return view('frontend.beranda'); });
Route::get('/', function () { return view('frontend.beranda'); });

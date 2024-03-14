<?php

use App\Http\Controllers\AbsenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AsistenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KodeController;

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

Route::get('/dashboard', [DashboardController::class, 'index']);

// Login
Route::get('/welcome', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/welcome', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// kelola user
Route::resource('/dashboard/datausers', AsistenController::class);
route::get('/dashboard/datausers/create', [AsistenController::class, 'create']);
route::post('/dashboard/datausers', [AsistenController::class, 'store'])->name('input-user');
route::get('/dashboard/datausers/{id}/edit', [AsistenController::class, 'edit']);
route::put('/dashboard/datausers/{id}/update', [AsistenController::class, 'update'])->name('update-user');
route::delete('/dashboard/datausers/{id}', [AsistenController::class, 'destroy'])->name('delete-user');
// end user

// Kelola materi
Route::resource('/dashboard/materis', MateriController::class);
route::post('/dashboard/materis', [MateriController::class, 'store'])->name('input-materi');
route::put('/dashboard/materis/{id}/update', [MateriController::class, 'update'])->name('update-materi');
route::delete('/dashboard/materis/{id}', [MateriController::class, 'destroy'])->name('delete-materi');
// End Materi

// Kelola Ruangan
Route::resource('/dashboard/ruangans', KelasController::class);
route::post('/dashboard/ruangans', [KelasController::class, 'store'])->name('input-ruangan');
route::put('/dashboard/ruangans/{id}/update', [KelasController::class, 'update'])->name('update-ruangan');
route::delete('/dashboard/ruangans/{id}', [KelasController::class, 'destroy'])->name('delete-ruangan');
// End Ruangan

// Kelola Kode
route::post('/dashboard/kodes', [KodeController::class, 'store'])->name('make-kode');

// End Kelola

// Kelola Absen
route::post('/dashboard/absen', [AbsenController::class, 'store'])->name('make-absen');

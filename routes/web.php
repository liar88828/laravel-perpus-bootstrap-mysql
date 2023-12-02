<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PetugasController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/greeting', fn() => 'hello');

//apa bila route pada page tidak di isi maka tidak akan tampil
// Auth
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::get('/login', fn() => view('auth.login'))->name('login');

// Buku
Route::prefix('/buku')->group(function () {
    Route::controller(BukuController::class)->group(function () {
        //view
        Route::get('/', 'index')->name('buku.index');
        Route::get('/list', 'list')->name('buku.list');
        Route::get('/detail/{id}', 'show')->name('buku.show');
        Route::get('/create', 'create')->name('buku.create');
        Route::get('/edit/{id}', 'edit')->name('buku.edit');
        //model
        Route::post('/store', 'store')->name('buku.store');
        Route::put('/update/{id}', 'update')->name('buku.update');
        Route::delete('/destroy/{id}', 'destroy')->name('buku.destroy');
    });
});


// Anggota
Route::prefix('/anggota')->group(function () {
    Route::controller(AnggotaController::class)->group(function () {
        //view
        Route::get('/', 'index')->name('anggota.index');
        Route::get('/detail/{id}', 'show')->name('anggota.show');
        Route::get('/create', 'create')->name('anggota.create');
        Route::get('/edit/{id}', 'edit')->name('anggota.edit');
        //model
        Route::post('/store', 'store')->name('anggota.store');
        Route::put('/update/{id}', 'update')->name('anggota.update');
        Route::delete('/destroy/{id}', 'destroy')->name('anggota.destroy');
    });
});

// Petugas
Route::prefix('/petugas')->group(function () {
    Route::controller(PetugasController::class)->group(function () {
        //view
        Route::get('/', 'index')->name('petugas.index');
        Route::get('/detail/{id}', 'show')->name('petugas.show');
        Route::get('/create', 'create')->name('petugas.create');
        Route::get('/edit/{id}', 'edit')->name('petugas.edit');
        //model
        Route::post('/store', 'store')->name('petugas.store');
        Route::put('/update/{id}', 'update')->name('petugas.update');
        Route::delete('/destroy/{id}', 'destroy')->name('petugas.destroy');
    });
});

// Peminjaman



// Pengembalian


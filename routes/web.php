<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TransaksiBukuController;
use App\Models\User;
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
})->name('home');


Route::get('/greeting', fn() => 'hello');

//apa bila route pada page tidak di isi maka tidak akan tampil
// Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');

    Route::get('/register', 'register')->name('register');
    Route::post('/create', 'store')->name('create');

    Route::get('/profile/', 'profile')->name('profile');
    Route::get('/logout', 'logout')->name('logout');
});

// Buku
Route::prefix('/buku')->group(function () {
    Route::middleware('auth')->group(function () {
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
});

// Anggota
Route::prefix('/anggota')->group(function () {
    Route::middleware('auth')->group(function () {
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
});

// Petugas
Route::prefix('/petugas')->group(function () {
    Route::middleware('auth')->group(function () {
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
});


// Peminjaman
//Route::prefix('/peminjam')->group(function () {
//    Route::controller(PeminjamController::class)->group(function () {
//        //view
//        Route::get('/', 'index')->name('peminjam.index');
//        Route::get('/detail/{id}', 'show')->name('peminjam.show');
//        Route::get('/create', 'create')->name('peminjam.create');
//        Route::get('/edit/{id}', 'edit')->name('peminjam.edit');
//        //model
//        Route::post('/store', 'store')->name('peminjam.store');
//        Route::put('/update/{id}', 'update')->name('peminjam.update');
//        Route::delete('/destroy/{id}', 'destroy')->name('peminjam.destroy');
//    });
//});


// Pengembalian
//Route::prefix('/pengembalian')->group(function () {
//    Route::controller(PengembalianController::class)->group(function () {
//        //view
//        Route::get('/', 'index')->name('pengembalian.index');
//        Route::get('/detail/{id}', 'show')->name('pengembalian.show');
//        Route::get('/create', 'create')->name('pengembalian.create');
//        Route::get('/edit/{id}', 'edit')->name('pengembalian.edit');
//        //model
//        Route::post('/store', 'store')->name('pengembalian.store');
//        Route::put('/update/{id}', 'update')->name('pengembalian.update');
//        Route::delete('/destroy/{id}', 'destroy')->name('pengembalian.destroy');
//    });
//});


//Transaksi Buku
Route::prefix('/transaksi')->group(function () {

    Route::middleware('auth')->group(function () {

        Route::controller(TransaksiBukuController::class)->group(function () {
//    View
            Route::get('/daftar_pinjam', 'DaftarPinjam')->name('daftar-pinjam');
            Route::get('/sedang_pinjam', 'SedangPinjam')->name('sedang-pinjam');
            Route::get('/selesai_pinjam', 'SelesaiPinjam')->name('selesai-pinjam');
            Route::get('/detail_selesai/{id}', 'DetailSelesai')->name('detail-selesai');
            Route::get('/daftar_denda', 'DaftarDenda')->name('daftar-denda');
            //
//    DataBase
            Route::post('/daftar/{id}', 'Daftar')->name('daftar-id');
            Route::post('/terima/{id}', 'Terima')->name('terima-id');
            Route::post('/selesai/{id}', 'Selesai')->name('selesai-id');

            Route::post('/kembali', 'Kembali')->name('kembali-id');
//
            Route::delete('/batal/{id}', 'Batal')->name('batal-id');
//

        });
    });
});

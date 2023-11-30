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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/greeting', fn() => 'hello');

//apa bila route pada page tidak di isi maka tidak akan tampil
// Auth
Route::get('/register', fn()=>view('auth.register'))->name('register');
Route::get('/login', fn()=>view('auth.login'))->name('login');

// Buku


// Petugas

// Anggota

// Pengembalian

// Peminjaman


<?php

use App\Http\Controllers\CariController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RekomenController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::resource('rekomen', RekomenController::class);
Route::get('halaman/{id}/lihat', [HomeController::class,'halaman'])->name('halaman')->middleware('auth');

Route::middleware(['auth','editor'])->group(function () {
    Route::resource('kategori', KategoriController::class);
    Route::get('deletekategori/{id}', [KategoriController::class,'destroy'])->name('deletekategori');
    Route::resource('postingan', PostinganController::class);
    Route::get('deletepostingan/{id}', [PostinganController::class,'destroy'])->name('deletepostingan');
    Route::resource('produk', ProdukController::class);
    Route::get('deleteproduk/{id}', [ProdukController::class,'destroy'])->name('deleteproduk');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::resource('pengguna', PenggunaController::class);
    Route::get('deletepengguna/{id}', [PenggunaController::class,'destroy'])->name('deletepengguna');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//kategori filter
Route::get('{id}', [HomeController::class, 'kategori']);

Route::post('home', [CariController::class, 'store']);

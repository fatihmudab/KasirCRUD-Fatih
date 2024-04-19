<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;


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

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login-post', [AuthController::class, 'Login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/user', [AdminController::class, 'user'])->name('user');
Route::get('user/tambah', [AdminController::class, 'tambahUser'])->name('user.tambah');
Route::post('user/tambah', [AdminController::class, 'simpanUser'])->name('user.tambah.simpan');
Route::get('user/edit/{id}', [AdminController::class, 'editUser'])->name('user.edit');
Route::post('user/edit/{id}', [AdminController::class, 'updateUser'])->name('user.edit.update');
Route::get('user/hapus/{id}', [AdminController::class, 'hapusUser'])->name('user.hapus');

Route::get('/dashboard', [AdminController::class, 'indexdashboard']);

Route::get('/produk', [AdminController::class, 'produk'])->name('produk');
Route::get('produk/tambah', [AdminController::class, 'tambahproduk'])->name('produk.tambah');
Route::post('produk/tambah', [AdminController::class, 'simpanproduk'])->name('produk.tambah.simpan');
Route::get('produk/edit/{id}', [AdminController::class, 'editrPoduk'])->name('produk.edit');
// Route::get('produk/update/{id}', [AdminController::class,'produkStokEdit'])->name('produk.edit');
// Route::put('produk/update/{id}', [AdminController::class,'produkStokUpdate']);
Route::post('produk/edit/{id}', [AdminController::class, 'updateproduk'])->name('produk.edit.update');
Route::get('produk/hapus/{id}', [AdminController::class, 'hapusproduk'])->name('produk.hapus');

Route::get('/penjualan', [AdminController::class, 'penjualan'])->name('penjualan');
Route::get('penjualan/tambah', [AdminController::class, 'tambahpenjualan'])->name('penjualan.tambah');
Route::post('penjualan/tambah', [AdminController::class, 'simpanPenjualan'])->name('penjualan.tambah.simpan');
Route::get('penjualan/detail/{id}', [AdminController::class, 'detailPenjualan'])->name('penjualan.detail');

Route::get('/dashboard', [PetugasController::class, 'index'])->name('dashboard');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


/*
|-----------------------------------------------------------------------
---
| Web Routes
|-----------------------------------------------------------------------
---
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/auth/login', [LoginRegisterController::class, 'login'])->name('auth.login');
    Route::post('/auth/login', [LoginRegisterController::class, 'postLogin'])->name('postLogin');

    Route::get('/auth/register', [LoginRegisterController::class, 'register'])->name('auth.register');
    Route::post('/auth/register', [LoginRegisterController::class, 'postRegister'])->name('postRegister');
});

Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
    Route::get('/admin/dashboard', [LoginRegisterController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/admin', [AdminController::class, 'admin'])->name('admin.admin');
    Route::get('/admin/tambah', [AdminController::class, 'tambah'])->name('admin.tambah');
    Route::get('/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
    Route::get('/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');

    Route::get('/admin/makanan', [AdminController::class, 'makanan'])->name('admin.makanan');
    Route::get('/admin/tambahMakanan', [AdminController::class, 'tambahMakanan'])->name('admin.tambahMakanan');
    Route::get('/admin/editMakanan/{id}', [AdminController::class, 'editMakanan'])->name('admin.editMakanan');
    Route::get('/admin/hapusMakanan/{id}', [AdminController::class, 'hapusMakanan'])->name('admin.hapusMakanan');

    Route::get('/admin/paket', [AdminController::class, 'paket'])->name('admin.paket');
    Route::get('/admin/tambahPaket', [AdminController::class, 'tambahPaket'])->name('admin.tambahPaket');
    Route::get('/admin/editPaket/{id}', [AdminController::class, 'editPaket'])->name('admin.editPaket');
    Route::get('/admin/hapusPaket/{id}', [AdminController::class, 'hapusPaket'])->name('admin.hapusPaket');

    Route::get('/admin/blokirUser/{id}', [AdminController::class, 'blokirUser'])->name('admin.blokirUser');
    Route::get('/admin/unblockUser/{id}', [AdminController::class, 'unblockUser'])->name('admin.unblockUser');

    Route::get('/admin/pemesanan', [AdminController::class, 'pemesanan'])->name('admin.riwayatpemesanan');


    Route::get('/admin/pemesanan', [AdminController::class, 'pemesanan'])->name('admin.pemesanan');
    Route::get('/admin/tambahPemesanan', [AdminController::class, 'tambahPemesanan'])->name('admin.tambahPemesanan');
    Route::get('/admin/editPemesanan/{id}', [AdminController::class, 'editPemesanan'])->name('admin.editPemesanan');
    Route::get('/admin/hapusPemesanan/{id}', [AdminController::class, 'hapusPemesanan'])->name('admin.hapusPemesanan');

    Route::get('/admin/pemesananpaket', [AdminController::class, 'pemesananpaket'])->name('admin.pemesananpaket');
    Route::get('/admin/tambahPembayaran', [AdminController::class, 'tambahPembayaran'])->name('admin.tambahPembayaran');
    Route::get('/admin/editPembayaran/{id}', [AdminController::class, 'editPembayaran'])->name('admin.editPembayaran');
    Route::get('/admin/hapusPembayaran/{id}', [AdminController::class, 'hapusPembayaran'])->name('admin.hapusPembayaran');
});

Route::post('/tambahAdmin', [AdminController::class, 'postTambahAdmin'])->name('postTambahAdmin');
Route::post('/postEditAdmin/{id}', [AdminController::class, 'postEditAdmin'])->name('postEditAdmin');

Route::post('/postTambahMakanan', [AdminController::class, 'postTambahMakanan'])->name('postTambahMakanan');
Route::post('/postEditMakanan/{id}', [AdminController::class, 'postEditMakanan'])->name('postEditMakanan');

Route::post('/postTambahPaket', [AdminController::class, 'postTambahPaket'])->name('postTambahPaket');
Route::post('/postEditPaket/{id}', [AdminController::class, 'postEditPaket'])->name('postEditPaket');
Route::post('/updateProfile/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');

Route::post('/storePemesanan', [UserController::class, 'storePemesanan'])->name('storePemesanan');
Route::post('/storePemesananPaket', [UserController::class, 'storePemesananPaket'])->name('storePemesananPaket');
Route::post('/addToCart/{id}', [UserController::class, 'addToCart'])->name('addToCart');


Route::post('/postPemesanan', [UserController::class, 'postPemesanan'])->name('postPemesanan');

Route::post('/konfirmasi-pembayaran/{id}', [UserController::class, 'konfirmasiPembayaran'])->name('konfirmasi.pembayaran');




Route::get('/user/pembayarankeranjang', [UserController::class, 'pembayaranKeranjang'])->name('pembayaranKeranjang');
Route::get('/bayar', [UserController::class, 'bayarKeranjang'])->name('bayarKeranjang');

Route::group(['middleware' => ['auth', 'checklevel:user']], function () {
    Route::get('/user/homenaik', [UserController::class, 'homenaik'])->name('user.homenaik');
    Route::get('/user/homenaik', [UserController::class, 'homenaik'])->name('user.homenaik');

    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/editprofile', [UserController::class, 'editprofile'])->name('user.editprofile');
    Route::get('/user/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('user.deleteUser');
    Route::get('/user/keranjang', [UserController::class, 'keranjang'])->name('user.keranjang');
    Route::get('/user/detailmakanan', [UserController::class, 'detailmakanan'])->name('user.detailmakanan');

    Route::get('/user/hometurun', [UserController::class, 'hometurun'])->name('user.hometurun');
    Route::get('/user/makanan', [LoginRegisterController::class, 'usermakanan'])->name('user.makanan');
    Route::get('/user/pembayaran/{id}', [UserController::class, 'showOrderPage'])->name('user.pembayaran');
    Route::get('/user/pembayaranpaket/{id}', [UserController::class, 'showPaket'])->name('user.pembayaranpaket');
});

Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

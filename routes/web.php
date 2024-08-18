<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\ServisanController;
use App\Http\Controllers\ServisanTeknisiController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\TipeLaptopController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// route bagi yang belum lofin
Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

// route yang hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    // route untuk logout
    Route::get('/logout', [SesiController::class, 'logout']);

    // dashboard
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/laptop-tipe-list/{id}/{tipe}', [AdminController::class, 'laptoptipelist']);

    Route::get('/mt', [LaptopController::class, 'mt']);

    Route::post('/tambah-merek', [LaptopController::class, 'tambahmerek']);
    Route::get('/merek/{id}', [LaptopController::class, 'editmerek']);
    Route::post('/merek/{id}', [LaptopController::class, 'updatemerek']);
    Route::delete('/merek/{id}', [LaptopController::class, 'hapusmerek']);

    Route::get('/tambah-tipe', [LaptopController::class, 'tambahtipe']);
    Route::get('/tambah-tipe/{id}', [LaptopController::class, 'lihattipe']);
    Route::post('/tambah-tipe', [LaptopController::class, 'tipestore']);
    Route::post('/update-tipe/{id}', [LaptopController::class, 'tipeupdate']);
    Route::delete('/delete-tipe/{id}', [LaptopController::class, 'tipedelete']);
    Route::get('/laptop-cari', [LaptopController::class, 'laptopcari']);

    // crud list laptop
    Route::resource('/laptop', LaptopController::class);
    // route untuk ambil tipe laptop format json
    // data ini digunakan untuk kebutuhan create data 
    // memilih otomatis tipe setelah pilih merek laptop
    Route::get('/tipe-laptops', [LaptopController::class, 'getTipeLaptops']);
    Route::get('/laptop-total', [LaptopController::class, 'laptoptotal']);

    // costumer
    Route::resource('/costumer', CostumerController::class);

    // daftar servisan
    Route::resource('/servisan', ServisanController::class);
    // servisan teknisi
    Route::resource('/servisan-teknisi', ServisanTeknisiController::class);

    // Penyewaan
    Route::get('/penyewaan', [PenyewaanController::class, 'index']);
    Route::get('/penyewaan-buat', [PenyewaanController::class, 'penyewaanbuat']);
    Route::post('/penyewaan-buat', [PenyewaanController::class, 'penyewaanstore']);
    Route::delete('/penyewaan-hapus-unit/{idcostumer}/{idunit}/{tglmulai}/{tglselesai}', [PenyewaanController::class, 'penyewaanhapusunit']);
    Route::get('/penyewaan-edit/{idcostumer}', [PenyewaanController::class, 'penyewaanedit']);
    Route::post('/penyewaan-update/{idcostumer}/{tglmulai}/{tglselesai}', [PenyewaanController::class, 'penyewaanupdate']);
    Route::get('/penyewaan-costumer/{id}/{tglmulai}/{tglselesai}', [PenyewaanController::class, 'penyewaancostumer']);
    Route::post('/penyewaan-selesai/{idcostumer}/{tglselesai}', [PenyewaanController::class, 'penyewaanselesai']);
    
    Route::get('/dalam-penyewaan', [PenyewaanController::class, 'dalampenyewaan']);

    // penjualan
    Route::get('/laptop-terjual', [PenjualanController::class, 'laptopterjual']);
    Route::get('/laptop-display', [PenjualanController::class, 'laptopdisplay']);
    Route::post('/juallaptop', [PenjualanController::class, 'juallaptop']);

    // profil
    Route::get('/profil', [UserController::class, 'profil']);
    Route::post('/profile-update/{id}', [UserController::class, 'profileupdate']);

    // karyawan
    Route::resource('/karyawan', KaryawanController::class)->middleware('userAkses');

    
    // user
    Route::get('/user', [UserController::class, 'user'])->middleware('userAkses');
    Route::get('/user-create', [UserController::class, 'usercreate'])->middleware('userAkses:1');
    Route::post('/user-create', [UserController::class, 'userstore'])->middleware('userAkses:1');
    Route::get('/user-edit/{id}', [UserController::class, 'useredit'])->middleware('userAkses:1');
    Route::post('/user-edit/{id}', [UserController::class, 'userupdate'])->middleware('userAkses:1');
    Route::delete('/user-delete/{id}', [UserController::class, 'userdelete'])->middleware('userAkses:1');

    // page 404
    Route::get('/404', function() {
        return view('development');
    });
});

// display produk
Route::get('/display', [DisplayController::class, 'index']);
Route::get('/display/{id}', [DisplayController::class, 'laptopdetail']);
<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\ServisanController;
use App\Http\Controllers\TipeLaptopController;
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
Route::get('/', function () {
    return view('dashboard.index');
});


Route::get('/mt', [LaptopController::class, 'mt']);
Route::post('/tambah-merek', [LaptopController::class, 'tambahmerek']);
Route::delete('/merek/{id}', [LaptopController::class, 'hapusmerek']);

Route::get('/tambah-tipe', [LaptopController::class, 'tambahtipe']);
Route::get('/tambah-tipe/{id}', [LaptopController::class, 'lihattipe']);
Route::post('/tambah-tipe', [LaptopController::class, 'tipestore']);
Route::post('/update-tipe/{id}', [LaptopController::class, 'tipeupdate']);
Route::delete('/delete-tipe/{id}', [LaptopController::class, 'tipedelete']);

Route::resource('/laptop', LaptopController::class);
Route::resource('/servisan', ServisanController::class);
Route::get('/wasakom/servisan/servisan-selesai', [ServisanController::class, 'servisanSelesai'])->name('servisanSelesai');
Route::resource('/tipe-laptop', TipeLaptopController::class);

Route::get('/display', [DisplayController::class, 'index']);
Route::get('/display/1', [DisplayController::class, 'laptopdetail']);

// Penyewaan
Route::get('/penyewaan', [PenyewaanController::class, 'index']);
Route::get('/buat-penyewaan', function(){
    return view('penyewaan.create');
});
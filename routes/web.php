<?php

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


Route::resource('/laptop', LaptopController::class);
Route::resource('/servisan', ServisanController::class);
Route::get('/wasakom/servisan/servisan-selesai', [ServisanController::class, 'servisanSelesai'])->name('servisanSelesai');
Route::resource('/tipe-laptop', TipeLaptopController::class);

// Penyewaan
Route::get('/penyewaan', [PenyewaanController::class, 'index']);
Route::get('/buat-penyewaan', function(){
    return view('penyewaan.create');
});
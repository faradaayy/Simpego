<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ListPegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExportController;


/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rute untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk autentikasi
Auth::routes();

// Rute home untuk halaman utama setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');


// Rute dashboard
Route::get('/dashboard', function () {
    return view('dashboard'); // Pastikan ada view 'dashboard'
})->middleware('auth')->name('dashboard.index');

// Kelompokkan rute yang membutuhkan autentikasi
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Rute untuk menampilkan daftar pegawai
    Route::get('/pegawai', [ListPegawaiController::class, 'index'])->name('pegawai.index');

    // Rute untuk menampilkan daftar pegawai
Route::get('/list', [ListPegawaiController::class, 'index'])->name('pegawai.index');


// Route to display the form to add a new employee (GET request)
Route::get('/pegawai/tambah', [ListPegawaiController::class, 'create'])->name('pegawai.create');

// Route to handle the form submission (POST request)
Route::post('/pegawai', [ListPegawaiController::class, 'store'])->name('pegawai.store');

    // Rute untuk menampilkan form edit pegawai
    Route::get('/pegawai/edit/{id}', [ListPegawaiController::class, 'edit'])->name('pegawai.edit');

    // Rute untuk mengupdate data pegawai
    Route::put('/pegawai/update/{id}', [ListPegawaiController::class, 'update'])->name('pegawai.update');

    // Rute untuk menghapus pegawai
    Route::delete('/pegawai/delete/{id}', [ListPegawaiController::class, 'destroy'])->name('pegawai.delete');

    Route::get('/pegawai/{id}', [ListPegawaiController::class, 'show'])->name('pegawai.show');

    // Rute untuk menampilkan profil pegawai
    Route::get('/pegawai/profile/{id}', [ListPegawaiController::class, 'show'])->name('pegawai.profile');

    // Rute untuk menampilkan grafik
    Route::get('/grafik', [PegawaiController::class, 'index'])->name('grafik.index');

    Route::delete('/pegawai/{id}', [ListPegawaiController::class, 'destroy'])->name('pegawai.destroy');

    // Rute untuk excel
    Route::get('/export-pegawai', [ExportController::class, 'export'])->name('pegawai.export');

});

<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterobatController;
use App\Http\Controllers\ObatmasukController;
use App\Http\Controllers\ObatkeluarController;
use App\Http\Controllers\StokobatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekamMedisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan web routes untuk aplikasi Anda. Routes
| ini dimuat oleh RouteServiceProvider dan diberikan ke grup middleware "web".
| Buatlah sesuatu yang hebat!
|
*/

// Route untuk halaman utama, mungkin Anda ingin mengarahkannya ke halaman login jika pengguna belum masuk
Route::get('/', function () {
    return view('pages.auth.auth-login', ['type_menu' => '']);
});

// Grup route yang menggunakan middleware auth untuk memastikan pengguna sudah masuk
Route::middleware(['auth'])->group(function () {
    // Halaman dashboard setelah pengguna berhasil masuk
    Route::get('home', function () {
        return view('pages.app.dashboard-simporek', ['type_menu' => '']);
    })->name('home');

    // Route-resource untuk manajemen pengguna
    Route::resource('user', UserController::class);
    
    // Route-resource untuk manajemen master obat
    Route::resource('masterobats', MasterobatController::class);
    
    // Route-resource untuk manajemen obat masuk
    Route::resource('obatmasuks', ObatmasukController::class);
    
    // Route-resource untuk manajemen obat keluar
    Route::resource('obatkeluars', ObatkeluarController::class);
    
    // Route-resource untuk manajemen stok obat
    Route::resource('stokobats', StokobatController::class);

    // Route::resource('rekammedis', RekamMedisController::class);
    Route::resource('rekammedis', RekamMedisController::class);

     // Rute untuk edit khusus rekam medis
    Route::get('rekammedis/{id}/edit', [RekamMedisController::class, 'edit'])->name('rekammedis.custom_edit');


    // Rute untuk mendapatkan nama obat berdasarkan ID obat
    Route::get('/obatmasuks/get-obat-name/{id}', [ObatmasukController::class, 'getObatName'])->name('obatmasuks.getObatName');
    Route::get('/obatkeluars/get-obat-name/{id}', [ObatkeluarController::class, 'getObatName'])->name('obatkeluars.getObatName');

    // Rute untuk mencari nama obat di obatmasuk
    Route::post('obatmasuks/search', [ObatmasukController::class, 'obatmasuksSearch']);

    Route::post('obatmasuks/search', [ObatkeluarController::class, 'obatkeluarsSearch']);

    // Rute untuk mencari di MasterobatController
    Route::post('/search', [MasterobatController::class, 'search'])->name('search');

    // Rute untuk mencetak PDF rekam medis
    Route::get('/rekammedis/{id}/print', [RekamMedisController::class, 'printPDF'])->name('rekammedis.print');



});

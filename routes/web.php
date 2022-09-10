<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\Info_inovatorController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\Anggota_timController;
use App\Http\Controllers\DataDosenController;
use App\Http\Controllers\Sumber_pendanaanController;
use App\Http\Controllers\Foto_produkController;
use App\Http\Controllers\Info_dilaksanakanController;

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

# ------ Unauthenticated routes ------ #
Route::get('/', [AuthenticatedSessionController::class, 'create']);
require __DIR__.'/auth.php';


# ------ Authenticated routes ------ #
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('home'); # dashboard

    # ------ DataTables routes ------ #
    Route::prefix('data')->name('datatable.')->group(function(){
        Route::get('/users', [DataTableController::class, 'getUsers'])->name('users');
    });
    
    Route::resource('users', UserController::class);
    Route::resource('dosens', DosenController::class);
    Route::resource('prodis', ProdiController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('pertanyaans', PertanyaanController::class);
    Route::resource('master', MasterController::class);
    Route::resource('info_inovator', Info_inovatorController::class);
    Route::resource('mitra', MitraController::class);
    Route::resource('anggota_tim', Anggota_timController::class);
    Route::resource('sumber_pendanaan', Sumber_pendanaanController::class);
    Route::resource('foto_produk', Foto_produkController::class);
    Route::resource('info_dilaksanakan', Info_dilaksanakanController::class);
    Route::resource('datadosen', DataDosenController::class);
});

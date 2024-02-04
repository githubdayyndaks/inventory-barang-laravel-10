<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
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
    return view('Landingpage.index');
});

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [SesiController::class, 'index'])->name('login'); 
    Route::post('/login', [SesiController::class, 'login'] );     
});


Route::middleware(['auth'])->group(function(){
    Route::get('/inventory/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('userAkses:Admin');
    Route::get('/inventory/petugas', [AdminController::class, 'petugas'])->name('petugas.index')->middleware('userAkses:Petugas');
    Route::get('/inventory/pengguna', [AdminController::class, 'pengguna'])->name('pengguna.index')->middleware('userAkses:Pengguna');
    Route::get('/logout', [SesiController::class, 'logout']);
});
 












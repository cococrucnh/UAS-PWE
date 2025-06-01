<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangHilangController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('barang-hilang.index');
    });

    Route::resource('barang-hilang', BarangHilangController::class);
});

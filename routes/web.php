<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\AuthController;


Route::view('/login', 'login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth')->group(function () {

    Route::get('/', [LaptopController::class, 'index'])->name('dashboard');

    Route::get('/create-laptop', [LaptopController::class, 'create']);
    Route::post('/save-laptop', [LaptopController::class, 'store'])->name('save-laptop');

    Route::get('/laptops/{laptop}', [LaptopController::class, 'show'])->name('show-laptop');
    Route::delete('/laptops/{laptop}', [LaptopController::class, 'destroy'])->name('delete-laptop');

    Route::get('/edit-laptop/{laptop}', [LaptopController::class, 'edit'])->name('edit-laptop');
    Route::put('/update-laptop/{laptop}', [LaptopController::class, 'update'])->name('update-laptop');

});
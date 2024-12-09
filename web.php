<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResepController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('reseps', ResepController::class);
Route::get('/reseps/cetak', [ResepController::class, 'cetak'])->name('reseps.cetak');
Route::get('/reseps/{id}', [ResepController::class, 'show'])->name('reseps.show');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResepController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('reseps', ResepController::class)->except(['show']);
Route::get('reseps/download-pdf', [ResepController::class, 'downloadPDF'])->name('reseps.pdf');
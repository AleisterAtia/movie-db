<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MoviesController::class, 'index']); {
    return view('welcome');
}

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\CategoriesController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MoviesController::class, 'index']);

Route::get('/movie/{id}/{slug}', [MoviesController::class, 'detailMovie']);
Route::get('/movie/create', [MoviesController::class, 'create'])->name('movie.create');
Route::post('/movie/store', [MoviesController::class, 'store'])->name('movies.store');
Route::get('/category/{id}', [CategoriesController::class, 'show']);


// Route::get('/movie/{id}/{slug}', [MoviesController::class, 'detail_movie']);

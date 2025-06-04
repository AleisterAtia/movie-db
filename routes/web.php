<?php

use App\Http\Middleware\RoleAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [MovieController::class, 'index']);
Route::get('/movie/{id}/{slug}', [MovieController::class, 'detailMovie'])->name('movie.detail');

Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->middleware('auth', RoleAdmin::class)->name('movie.edit');

Route::get('/movie/create', [MovieController::class, 'create'])->middleware('auth');
Route::post('/movie/store', [MovieController::class, 'store'])->middleware('auth')->name('movies.store');
Route::get('/category/{id}', [CategoriesController::class, 'show']);
Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
Route::get('/movies', [MovieController::class, 'list'])->name('movie.list');
Route::delete('/movie/{id}', [MovieController::class, 'destroy'])->name('movie.destroy')->middleware('auth');




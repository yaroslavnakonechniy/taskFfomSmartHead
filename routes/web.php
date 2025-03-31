<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;

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

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('movies', MovieController::class);
Route::resource('genres', GenreController::class);
Route::patch('/movies/{id}/publish', [MovieController::class, 'publish'])->name('movies.publish');
Route::patch('/movies/{id}/unpublish', [MovieController::class, 'unpublish'])->name('movies.unpublish');

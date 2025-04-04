<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\GenreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('genres', [GenreController::class, 'index']);
Route::get('genres/{id}/movies', [GenreController::class, 'movies']);
Route::get('movies', [MovieController::class, 'index']);
Route::get('movies/{id}', [MovieController::class, 'show']);

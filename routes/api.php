<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\v1\BookController;
use App\Http\Controllers\Api\ChapterController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);

Route::apiResource('books', BookController::class);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::apiResource('chapters', ChapterController::class);
    Route::apiResource('authors', AuthorController::class);

    Route::get('books/dropdown', [BookController::class, 'dropdownAllBooks']);

    Route::post('auth/logout', [AuthController::class, 'logout']);
});

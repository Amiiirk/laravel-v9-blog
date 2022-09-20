<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;

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

Route::middleware(['auth', 'IsAdmin'])->resource('api/panel/users', UserController::class)->except(['show', 'delete']);
Route::middleware(['auth', 'IsAdmin'])->resource('api/panel/categories', CategoryController::class)->except(['show', 'delete']);
Route::middleware(['auth', 'IsAdmin'])->resource('api/panel/posts', PostController::class)->except(['show']);

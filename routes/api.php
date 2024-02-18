<?php

use App\Http\Controllers\BannerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/banners', [BannerController::class, 'index']);
Route::post('/banners', [BannerController::class, 'store']);
Route::post('/banner/edit/{banner}', [BannerController::class, 'update']);
Route::delete('/banner/delete/{banner}', [BannerController::class, 'destroy']);
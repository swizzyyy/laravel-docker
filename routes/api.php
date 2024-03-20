<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PrizeController;
use App\Http\Controllers\Api\AuthController;

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
// Route::post('/login', 'AuthController@login');
Route::post('/auth/token/admin',[AuthController::class,'adminLogin']);
Route::post('/auth/token/player',[AuthController::class,'playerLogin']);

Route::middleware(['auth'])->group(function () {
    Route::post('prizes', [PrizeController::class, 'create']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

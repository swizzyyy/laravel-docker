<?php

use App\Http\Controllers\Api\V1\AssignPrizeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PrizeController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\RankController;
use App\Http\Controllers\Api\V1\PlayerController;
use App\Http\Controllers\Api\V1\RankCategoryController;
use App\Http\Controllers\Api\V1\SpinController;

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

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('prize', PrizeController::class);
    Route::resource('rank', RankController::class);
    Route::resource('rankCategories', RankCategoryController::class);
    Route::get('/players',[PlayerController::class,'index']);
    Route::post('/assignPrize',[AssignPrizeController::class,'assignPrize']);
});

Route::post('/spin',[SpinController::class,'spin'])->middleware('auth:player');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

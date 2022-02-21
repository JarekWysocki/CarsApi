<?php

use App\Http\Controllers\CarController;
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

Route::get('/cars', [CarController::class, 'index']);

Route::post('/car', [CarController::class, 'store']);

Route::put('/cars/{id}', [CarController::class, 'update']);

Route::delete('/cars/bigfirstdelete', [CarController::class, 'deleteFirstCarWithBigType']);

Route::delete('/cars/{id}', [CarController::class, 'destroy']);

Route::get('/cars/bigupper', [CarController::class, 'displayFirstCarWithBigTypeWithUppercase']);

Route::get('/cars/biglower', [CarController::class, 'displayFirstCarWithBigTypeWithLowercase']);
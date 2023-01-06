<?php

use App\Http\Controllers\API\APIAuthController;
use App\Http\Controllers\API\APIPostController;
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

Route::post('/login',  [APIAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('posts', [APIPostController::class, 'index']);
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Not Found',
    ], 404);
});

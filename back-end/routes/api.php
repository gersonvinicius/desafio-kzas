<?php

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

// ROUTES LOGIN API
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function(Request $request) {
        // return auth()->user();
        return response()
            ->json(['user' => auth()->user()]);
    });
    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);

    // Route::put('/salvar-dados', [App\Http\Controllers\Api\ClientController::class, 'update']);
    // Route::resource('/client',App\Http\Controllers\Api\ClientController::class);
    // Route::post('/client/save-files','App\Http\Controllers\Api\ClientController@saveFiles');
    // Route::post('/client/remove-files','App\Http\Controllers\Api\ClientController@removeFiles');


});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'v1' , 'namespace' => 'App\Http\Controllers\Api\v1' ] , function (){
    Route::apiResource('progress' , \App\Http\Controllers\Api\v1\ProgressionController::class);
});


Route::prefix('v1')->group(function () {
    Route::post('register', [\App\Http\Controllers\Api\v1\RegisterController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\Api\v1\RegisterController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\Api\v1\RegisterController::class, 'logout']);
});


Route::prefix('v1')->group(function () {
    Route::resource('progression', \App\Http\Controllers\Api\v1\ProgressionController::class);
    Route::post('progression/{progression}/toggleStatus', [\App\Http\Controllers\Api\v1\ProgressionController::class, 'toggleStatus']);
});

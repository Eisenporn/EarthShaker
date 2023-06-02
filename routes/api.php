<?php

use App\Http\Controllers\api\ApiJSController;
use App\Http\Controllers\api\ImageProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ApiJSController::class)->group(function(){
    Route::get('endpoint/{id}', 'endpoint');
});

Route::controller(ImageProfileController::class)->group(function(){
    Route::post('UploadImageProfile','UploadImageProfile');
});


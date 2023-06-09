<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AudioDownloadController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexContorller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// Контроллер представлений страниц
Route::controller(IndexContorller::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('catalog', 'catalog')->name('catalog');
    Route::get('albom', 'albom')->name('albom');
    Route::get('signin', 'signin')->name('signin');
    Route::get('signup', 'signup')->name('signup');
    Route::get('profile', 'profile')->name('profile');
    Route::get('album/{item:id}', 'album')->name('album');

    // Админ страницы
    Route::middleware(['auth', AdminMiddleware::class])->group(function () {
        Route::get('addalbum', 'addalbum')->name('addalbum');
        Route::get('addtrack/{album_id:id}', 'addtrack')->name('addtrack');
    });
});


// Контроллер личного кабинета
Route::middleware(['auth'])->group(function () {
    Route::controller(ProfileController::class)->prefix('/profile')->as('profile.')->group(function () {
        Route::post('updatedGeneric', 'updatedGeneric')->name('updatedGeneric');
        Route::post('updatedEmail', 'updatedEmail')->name('updatedEmail');
        Route::post('updatedPassword', 'updatedPassword')->name('updatedPassword');
    });
});

// Контроллер альбомов
Route::controller(AlbumController::class)->prefix('/album')->as('album.')->group(function () {
    Route::post('AddAlbum', 'AddAlbum')->name('AddAlbum');
});

// Контроллер треков
Route::controller(TrackController::class)->prefix('/track')->as('track.')->group(function () {
    Route::post('addtrack', 'AddTrack')->name('addtrack');
});

// Контроллер аунтентификиции
Route::controller(AuthController::class)->prefix('/auth')->as('auth.')->group(function () {
    Route::post('signup', 'signup')->name('signup');
    Route::post('signin', 'signin')->name('signin');
    Route::get('logout', 'logout')->name('logout');
});

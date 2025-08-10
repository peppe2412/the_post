<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function (){
    Route::get('/', 'home')->name('home');
});

Route::controller(ArticleController::class)->group(function (){
    Route::get('/article/index', 'index')->name('article-index');
    Route::get('/article/create', 'create')->name('article-create');
    Route::post('/article/store', 'store')->name('article-store');
});

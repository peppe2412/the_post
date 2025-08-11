<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function (){
    Route::get('/', 'home')->name('home');
    Route::get('/carrers', 'carrers')->name('carrers');
    Route::get('/carrers/submit', 'carrersSubmit')->name('carrers-submit');
});

Route::controller(ArticleController::class)->group(function (){
    Route::get('/article/index', 'index')->name('article-index');
    Route::get('/article/create', 'create')->name('article-create');
    Route::post('/article/store', 'store')->name('article-store');
    Route::get('/article/show/{article}', 'show')->name('article-show');
    Route::get('/article/category/{category}', 'byCategory')->name('article-category');
    Route::get('/article/user/{user}', 'byUser')->name('article-user');
});

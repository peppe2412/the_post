<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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

Route::middleware('admin')->group(function (){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::patch('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('set-admin');
    Route::patch('/revisor/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('set-revisor');
    Route::patch('/writer/{user}/set-writer', [AdminController::class, 'setWriter'])->name('set-writer');    
});

Route::middleware('revisor')->group(function (){
    Route::controller(RevisorController::class)->group(function (){
        Route::get('/revisor/dashboard', 'dashboard')->name('revisor-dashboard');
    });
});

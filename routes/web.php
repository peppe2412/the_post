<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/carrers', 'carrers')->name('carrers');
    Route::post('/carrers/submit', 'carrersSubmit')->name('carrers-submit');
});

Route::controller(ArticleController::class)->group(function () {
    Route::get('/article/index', 'index')->name('article-index');
    Route::get('/article/show/{article}', 'show')->name('article-show');
    Route::get('/article/category/{category}', 'byCategory')->name('article-category');
    Route::get('/article/user/{user}', 'byUser')->name('article-user');
});

Route::middleware('admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'dashboard')->name('admin-dashboard');
        Route::patch('/admin/{user}/set-admin', 'setAdmin')->name('set-admin');
        Route::patch('/admin/{user}/set-revisor', 'setRevisor')->name('set-revisor');
        Route::patch('/admin/{user}/set-writer', 'setWriter')->name('set-writer');
    });
});

Route::middleware('revisor')->group(function () {
    Route::controller(RevisorController::class)->group(function () {
        Route::get('/revisor/dashboard', 'dashboard')->name('revisor-dashboard');
        Route::post('/revisor/{article}/accepted', 'acceptedArticle')->name('revisor-acceptedArticle');
        Route::post('/revisor/{article}/reject', 'refuseArticle')->name('revisor-refuseArticle');
        Route::post('/revisor/{article}/undo', 'undoArticle')->name('revisor-undoArticle');
    });
});

Route::middleware('writer')->group(function () {
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/article/create', 'create')->name('article-create');
        Route::post('/article/store', 'store')->name('article-store');
    });
});

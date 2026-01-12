<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MessagesController;
use App\Models\Article;

Route::get('/', [RouteController::class, 'index'])->name('home');
Route::get('/news', [RouteController::class, 'news'])->name('news.index');
Route::get('/news/{id}', [RouteController::class, 'show'])->name('news.show');
//Route::get('/article/news/{id}', [RouteController::class, 'show'])->name('actualites.show');
Route::get('/videos', [RouteController::class, 'video'])->name('videos.index');
Route::get('/contact', [RouteController::class, 'contact'])->name('contacts');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'store'])->name('newsletter.subscribe');
Route::post('/actualites/{id}/commentaires', [RouteController::class, 'store'])->name('commentaires.store');
Route::post('/like/{id}', [LikeController::class, 'toggle']);
Route::post('/about', [MessagesController::class, 'store'])->name('messages.store');


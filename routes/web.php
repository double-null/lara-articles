<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\SiteController::class, 'index']);

Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index']);

Route::get('/articles/{slug}/', [App\Http\Controllers\ArticleController::class, 'show']);

Route::post('/comments/store/', [App\Http\Controllers\CommentController::class, 'store']);

Route::post('/like/', [App\Http\Controllers\LikeController::class, 'update']);

Route::post('/view/', [App\Http\Controllers\ViewController::class, 'update']);

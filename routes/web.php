<?php

use App\Http\Controllers\ArticlesController;
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



Route::get('/articles', [ArticlesController::class, 'index'])
    ->name('articles.index');


Route::get('/articles/create', [ArticlesController::class, 'create'])
    ->name('articles.create');

Route::post('/articles', [ArticlesController::class, 'store'])
    ->name('articles.store');

Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit'])
    ->name('articles.edit');

Route::put('/articles/{article}', [ArticlesController::class, 'update'])
    ->name('articles.update');

Route::delete('/articles/{article}', [ArticlesController::class, 'destroy'])
    ->name('articles.destroy');

Route::redirect('/', '/articles');
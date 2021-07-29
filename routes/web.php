<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UsersController;

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

Route::get('/articles/author', [ArticlesController::class, 'authorshow'])
    ->name('articles.authorshow');

Route::get('/', [ArticlesController::class, 'index'])
    ->name('articles.index');

Route::get('/articles/{article}', [ArticlesController::class, 'show'])
    ->name('articles.show');

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

Route::get('/premium', function () {
    return view('main/premium');
}) ->name('premium');

Route::put('/user/{user}/premium', [UsersController::class, 'setPremium'])
    ->name('user.updatePremium');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

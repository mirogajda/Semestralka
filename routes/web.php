<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('delete',[UserController::class,'delete']);
Route::get('edit',[UserController::class,'edit']);
Route::post('update',[UserController::class,'update'])->name('update');

Route::get('/', [IntroController::class, 'index'])->name('intro');

Route::prefix('articles')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('new', [ArticleController::class, 'create'])->name('new-article');
        Route::post('store', [ArticleController::class, 'store'])->name('store-article');
        Route::delete('remove', [ArticleController::class, 'remove'])->name('remove-article');
        Route::post('{id}/update', [ArticleController::class, 'update'])->name('update-article');
        Route::get('{id}/edit', [ArticleController::class, 'edit'])->name('edit-article');

        //comments
        Route::post('store-comment', [CommentController::class, 'store'])->name('store-comment');
        Route::post('update-comment', [CommentController::class, 'update'])->name('update-comment');
        Route::delete('remove-comment', [CommentController::class, 'remove'])->name('remove-comment');
    });

    Route::get('{id}', [ArticleController::class, 'show'])->name('article-detail');
    Route::get('', [ArticleController::class, 'index'])->name('article-list');
});

Route::get('clear-message', [Controller::class, 'clearMessage'])
    ->middleware('auth')
    ->name('clear-message');

require __DIR__.'/auth.php';



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

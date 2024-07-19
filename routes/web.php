<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/',[BookController::class,'index'])->name('index');
    Route::resource('/books', BookController::class)->except('index');
    Route::get('/books/confirm/{book}',[BookController::class,'destroy_confirm'])->name('books.destroy_confirm');

    
    Route::get('/favorites', [BookController::class, 'showFavorites'])->name('books_favorites.index');
    Route::post('/books/{book}/favorite', [BookController::class, 'favorite'])->name('books.favorite');
});

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/authors', AuthorController::class);
});
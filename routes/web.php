<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRequestController;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/', [BookController::class, 'index'])->name('index');

Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
Route::get('/books/all', [BookController::class, 'getAll'])->name('books.all');

// Authentication Routes
Auth::routes();

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/bookrequest', [BookRequestController::class, 'store'])->name('bookrequest.store');
    Route::resource('book-requests', BookRequestController::class);
});

Route::get('/home', [HomeController::class, 'index'])->name('dashboard');

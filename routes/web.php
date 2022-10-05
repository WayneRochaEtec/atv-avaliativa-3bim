<?php

use App\Http\Controllers\BookController;
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

Route::get('/', [BookController::class, 'listBooks']);

Route::get('/books', [BookController::class, 'listBooks']);

Route::get('/books/new', [BookController::class, 'addBookView']);

Route::get('/books/edit/{id}', [BookController::class, 'editBookView']);

Route::post('/library/new-book', [BookController::class, 'addBook']);

Route::post('/library/edit-book/{id}', [BookController::class, 'editBook']);

Route::post('/library/delete-book/{id}', [BookController::class, 'deleteBook']);
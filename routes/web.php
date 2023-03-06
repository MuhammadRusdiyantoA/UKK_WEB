<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('home', ['nav' => true]);
});

Route::get('/login', [UsersController::class, 'showLogin']);
Route::post('/login', [UsersController::class, 'login']);
Route::get('/register', [UsersController::class, 'showRegister']);
Route::post('/register', [UsersController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [UsersController::class, 'logout']);
    Route::get('/profile', [UsersController::class, 'showProfile']);
    Route::post('/profile', [UsersController::class, 'profileUpdate']);
});

Route::resource('/books', BooksController::class)->middleware('admin')->except(['index', 'show']);
Route::resource('/books', BooksController::class)->only(['index', 'show']);
Route::post('/books/search', [BooksController::class, 'search']);

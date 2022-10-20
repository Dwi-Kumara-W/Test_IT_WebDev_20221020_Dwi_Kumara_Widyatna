<?php

use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [BookController::class, 'index'])->middleware('guest');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/book', [BookController::class, 'indexmaster'])->middleware('auth');
Route::get('/book-add', [BookController::class, 'create'])->middleware('auth');
Route::post('/book', [BookController::class, 'store'])->middleware('auth');
Route::get('/book-delete/{id}', [BookController::class, 'delete'])->middleware('auth');
Route::delete('/book-destroy/{id}', [BookController::class, 'destroy'])->middleware('auth');


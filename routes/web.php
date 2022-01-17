<?php

use App\Http\Controllers\AddGameController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameDetailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageGenreController;
use App\Http\Controllers\MyCartController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionHistoryController;
use App\Http\Controllers\TransactionHistoryDetailController;
use App\Http\Controllers\UpdateGenreController;
use App\Http\Controllers\UpdateGameController;
use App\Http\Controllers\ViewGameController;
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

// Web Programming LK01 - Anggota Kelompok:
// 2301859266 - Leonard Richie Tjandra
// 2301857121 - Napoleon Chandra
// 2301860343 - Fransiskus Erik Jonathan Purwanto
// 2301883725 - Ananda Bilal
// 2301883504 - James Lewi Duykers

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', [HomeController::class, 'index']);

Route::get('/view_game/{id}', [ViewGameController::class, 'index']);
Route::post('/view_game/delete/{id}', [ViewGameController::class, 'destroy']);

Route::get('/update_game/{id}', [UpdateGameController::class, 'index'])->middleware('auth');
Route::post('/update_game/{id}', [UpdateGameController::class, 'update']);

Route::get('/game_detail/{id}', [GameDetailController::class, 'index']);
Route::post('/game_detail/add_to_cart/{id}', [GameDetailController::class, 'store'])->middleware('auth');

Route::get('/add_game', [AddGameController::class, 'index'])->middleware('auth');
Route::post('/add_game', [AddGameController::class, 'store']);

Route::get('/manage_genre', [ManageGenreController::class, 'index'])->middleware('auth');
Route::post('/manage_genre/delete/{id}', [ManageGenreController::class, 'destroy']);

Route::get('/update_genre/{id}', [UpdateGenreController::class, 'index'])->middleware('auth');
Route::post('/update_genre/{id}', [UpdateGenreController::class, 'update']);

Route::get('/my_cart', [MyCartController::class, 'index'])->middleware('auth');
Route::post('/my_cart/update_quantity/{id}', [MyCartController::class, 'update']);
Route::post('/my_cart/checkout', [MyCartController::class, 'destroy']);

Route::get('/change_password', [ChangePasswordController::class, 'index'])->middleware('auth');
Route::post('/change_password', [ChangePasswordController::class, 'update']);

Route::get('/transaction_history', [TransactionHistoryController::class, 'index'])->middleware('auth');

Route::get('/transaction_history_detail/{id}', [TransactionHistoryDetailController::class, 'index'])->middleware('auth');

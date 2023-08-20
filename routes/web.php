<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashFlowController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [CashFlowController::class, "index"]);

Route::get('/deposit', [DepositController::class, "index"]);
Route::get('/deposit/add', [DepositController::class, "add"]);
Route::post('/deposit/add', [DepositController::class, "save"]);

Route::get('/withdraw', [WithdrawController::class, "index"]);
Route::get('/withdraw/add', [WithdrawController::class, "add"]);
Route::post('/withdraw/add', [WithdrawController::class, "save"]);

Route::get('/login', [LoginController::class, "index"])->middleware('guest');
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, "logout"]);
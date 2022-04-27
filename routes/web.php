<?php

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home/store', [App\Http\Controllers\HomeController::class, 'store'])->name('home/store');

//Route::get('/ask', [App\Http\Controllers\AskController::class, 'index'])->name('ask');
//Route::get('/ask/create', [App\Http\Controllers\AskController::class, 'create']);
//Route::get('/ask/store', [App\Http\Controllers\AskController::class, 'store']);

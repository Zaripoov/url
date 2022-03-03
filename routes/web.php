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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('home.store');
Route::get('/{abbreviated_url}', [App\Http\Controllers\HomeController::class, 'url'])->name('home.url');

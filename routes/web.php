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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/acceuil', function () {
    return view('acceuil');
})->middleware('connect')->name('acceuil');

Route::get('/article', function () {
    return view('article');
})->middleware('connect')->name('article');

Route::get('/role', function () {
    return view('role');
})->middleware('roleverif')->name('role');

require __DIR__.'/auth.php';

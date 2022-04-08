<?php

use App\Http\Controllers\ArticleController;
use App\Models\User;
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

Route::get('/user', function () {
    $users = User::all();
    return view('user', compact('users'));
})->middleware('roleverif')->name('user');

require __DIR__.'/auth.php';

Route::resource('article', ArticleController::class);
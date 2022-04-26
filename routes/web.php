<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Models\Contact;
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


// Route page user
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/{id}/edit', [UserController::class, 'edit']);
Route::put('/user/{id}/update', [UserController::class, 'update']);
Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

// Route contact
Route::resource('contact', ContactController::class);

// Route email
Route::get('/emails', function () {
    $emails = Contact::all();
    return view('pages.email.email', compact('emails'));
})->middleware('connect')->name('emails');

// Route Newsletter
Route::resource('newsletter', NewsletterController::class);

require __DIR__.'/auth.php';

Route::resource('article', ArticleController::class);
<?php

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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/'
    , function () {
    return view('welcome');
})->name('welcomeLara');

Route::get('/BookYourWork/Welcome'
    , function () {
    return view('Homepage.homepage');
})->name('welcome');


Route::get('/login'
    , function() {
        return view('auth.login');
})->name('login');

Route::get('/signup'
    , function() {
        return view('auth.register');
})->name('signup');
Auth::routes();

Route::get('/profile'
    , function() {
        return view('auth.profil.users');
})->middleware('auth');

Route::get('users/index', [UserController::class, 'index'])->name('users.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

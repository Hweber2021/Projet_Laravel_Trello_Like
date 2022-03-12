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
        return ('Bienvenu dans le formulaire de connexion');
})->name('login');

Route::get('/signup'
    , function() {
        return('Bienvenu dans le formulaire d inscription');
})->name('signup');
Auth::routes();

Route::get('/profile'
    , function() {
        return view('auth.profil.profile');
})->middleware('auth');

Route::get('users/index', [UserController::class, 'index'])->name('users.index');
Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

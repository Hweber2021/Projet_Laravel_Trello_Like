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
use App\Http\Controllers;

Route::get('/'
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

Route::get('/users/index', [UserController::class, 'index'])->middleware('auth')->name('user.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('workplaces', 'WorkplaceController')->middleware('auth');

Route::resource('dashboards', 'DashboardController')->middleware('auth');

Route::resource('lists', 'ListsController')->middleware('auth');

Route::resource('cards', 'CardController')->middleware('auth');
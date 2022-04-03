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

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::prefix('dashboards')->as('dashboards.')->middleware('auth')->group(function() {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/show/{id}', 'DashboardController@show')->name('show');
    Route::post('/store', 'DashboardController@store')->name('store')->middleware('block.request');
    Route::put('/update/{id}', 'DashboardController@update')->name('update');
    Route::delete('/delete/{id}', 'DashboardController@delete')->name('delete');
    Route::get('/create', 'DashboardController@create')->name('create');
});
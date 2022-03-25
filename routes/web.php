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

use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/signup', [RegisterController::class, 'register'])->name('registerSend');

Auth::routes([
    'register' => false
]);

Route::get('/users/index', [UserController::class, 'index'])->middleware('auth')->name('user.index');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->middleware('auth')->name('home');

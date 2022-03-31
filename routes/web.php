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
use App\http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/'
    , function () {
    return view('Homepage.homepage');
})->name('welcome');

Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/signup', [RegisterController::class, 'register'])->name('registerSend');

Route::get('/login', [LoginController::class, 'showloginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginSend');

Auth::routes([
    'register' => false,
    'login' => false
]);

Route::get('/users/index', [UserController::class, 'index'])->middleware('auth')->name('user.index');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->middleware('auth')->name('home');

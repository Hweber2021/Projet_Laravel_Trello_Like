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
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
})->name('welcome');

Route::get('/BookYourWork/Welcome'
    , function () {
    return ('Bienvenu dans BookYouWork, l outil de KanBan ouvert à tous');
})->name('welcome');



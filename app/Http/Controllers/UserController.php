<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller {

    public function index()
    {
        return view('users');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/BookYourWork/Welcome');
    }

} 
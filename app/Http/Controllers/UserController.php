<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function index()
    {
        $user = Auth::user();
        return view('auth.profil.users', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_profiledp(Request $request){

        $request->validate([
            'profiledp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $user = Auth::user();
    
        $profiledpName = $user->id.'_profiledp'.time().'.'.request()->profiledp->getClientOriginalExtension();
    
        $request->profiledp->storeAs('profiledps',$profiledpName);
    
        $user->profiledp = $profiledpName;
        $user->save();
    
        return back()->with('success','You have successfully upload image.');
    }

} 
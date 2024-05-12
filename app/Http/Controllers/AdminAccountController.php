<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAccountController extends Controller
{
    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);
 
    //     if(Auth::guard('admin')->attempt($credentials)){
    //         $request->session()->regenerate();
    //         return redirect()->intended(route('adminDashboard'))->with('success','You are Logged in sucessfully.');
    //     }
    //     else{
    //         return back()->with('error','Whoops! invalid username and password.');
    //     }
    // }

    // public function logout(){
    //     auth()->guard('admin')->logout();
    //     Session::flush();
    //     Session::put('success', 'You are logged out sucessfully');
    //     return redirect()->intended(route('adminLogin'));
    // }

    //----------------------------------

}

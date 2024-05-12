<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CustomerAccount;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CustomerAccountController extends Controller
{
    public function loginForm(){
        if (session()->has('id_customer')) {
            return back();
        }
        return view('customer.loginPage', ['title' => 'Admin Login']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
                    'email' => ['required', 'email:dns'],
                    'password' => 'required'
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            $userId = CustomerAccount::firstWhere('email', $request->email)->id_customer;
            $userName = CustomerAccount::firstWhere('email', $request->email)->name;
            $request->session()->put('id_customer', $userId);
            $request->session()->put('name', $userName);

            $request->session()->regenerate();
            return redirect()->intended('/browse')->with('loginSuccess', 'Login berhasil! Selamat datang kembali');
        }

        return back()->with('loginError', 'Login gagal!');
    }

    public function logout(){
        auth()->guard('customer')->logout();
        Session::flush();
        return redirect('/browse')->with('You are logged out sucessfully');
    }

    public function registerForm(){
        return view('customer.registPage', ['title' => 'Customer Registration']);
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'email:dns', 'unique:customer_accounts'], // harus unik di table users
            'password' => 'required|min:5|max:16'
        ]);

        //dd('registrasi berhasil');
        
        User::create($validatedData);
        //$request->session()->flash('success', 'Registrasi berhasil! Silakan login');

        return redirect()->intended('/login')->with('success', 'Registrasi berhasil! Silakan login');
    }

    public function delete(){

    }

    // ----------------------------------
    
}

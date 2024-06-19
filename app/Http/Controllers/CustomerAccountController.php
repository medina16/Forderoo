<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CustomerAccount;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CustomerAccountController extends Controller
{
    public function loginForm(){
        if (session()->has('id_customer')) {
            return back();
        }
        return view('customer.loginPage', ['title' => 'Customer Login']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
                    'email' => ['required', 'email:dns'],
                    'password' => 'required'
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            $userId = CustomerAccount::firstWhere('email', $request->email)->id;
            $userName = CustomerAccount::firstWhere('email', $request->email)->name;
            
            $request->session()->regenerate();
            $request->session()->put('id_customer', $userId);
            $request->session()->put('name', $userName);

            return redirect()->intended('/')->with('loginSuccess', 'Login berhasil! Selamat datang kembali');
        }

        return back()->with('error', 'Login gagal! Mohon masukkan data login yang benar');
    }

    public function logout(){
        auth()->guard('customer')->logout();
        Session::flush();
        return redirect('/')->with('logoutSuccess', 'Logout berhasil');
    }

    public function registerForm(){
        if (session()->has('id_customer')) {
            return back();
        }
        return view('customer.registPage', ['title' => 'Customer Registration']);
    }

    public function getCustProfile(){
        if (!session()->has('id_customer')) {
            return redirect('/login')->with('error', 'Mohon login untuk membuka halaman.');
        }

        $customer = CustomerAccount::find(session('id_customer'));

        return view('customer.profile', [
            'title' => 'Profile',
            'custInfo' => $customer
        ]);
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'email:dns', 'unique:customer_accounts,email'],
            'password' => 'required|min:5|max:16',
            'phone_number' => ['required', 'numeric', 'digits_between:10,20']
        ]);

        //dd('registrasi berhasil');
        
        CustomerAccount::create($validatedData);

        return redirect()->intended('/login')->with('success', 'Registrasi berhasil! Silakan login');
    }

    public function edit(Request $request){
        if (!session()->has('id_customer')) {
            return redirect('/login')->with('error', 'Mohon login untuk membuka halaman.');
        }
    
        $customerId = session('id_customer');
    
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'email:dns', Rule::unique('customer_accounts', 'email')->ignore($customerId)],
            'phone_number' => ['required', 'numeric', 'digits_between:10,20']
        ]);
    
        // Find the customer and update their information
        $customer = CustomerAccount::find($customerId);
        $customer->name = $validatedData['name'];
        $customer->email = $validatedData['email'];
        $customer->phone_number = $validatedData['phone_number'];
        $customer->save();

        $request->session()->put('name', $customer->name);
    
        return redirect()->intended('/profile')->with('success', 'Profil berhasil diedit!');
    }
    
    
}

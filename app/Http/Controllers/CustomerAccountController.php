<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CustomerAccount;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreCustomerAccountRequest;
use App\Http\Requests\UpdateCustomerAccountRequest;

class CustomerAccountController extends Controller
{

    // public function login(Request $request){

    //     $credentials = $request->validate([
    //         'email' => ['required', 'email:dns'],
    //         'password' => 'required'
    //     ]);

    //     if(Auth::guard('customer')->attempt($credentials)){
    //         $request->session()->regenerate();
    //         return redirect('/browse');
    //     };
        
    //     return back()->with('loginError', 'Login gagal!');
        
    // }

    public function logout(){

    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'email:dns', 'unique:customer_accounts'], // harus unik di table users
            'password' => 'required|min:5|max:16'
        ]);

        //dd('registrasi berhasil');
        
        CustomerAccount::create($validatedData);
        //$request->session()->flash('success', 'Registrasi berhasil! Silakan login');

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login');
    }

    public function delete(){

    }

    // ----------------------------------
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerAccountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerAccount $customerAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerAccount $customerAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerAccountRequest $request, CustomerAccount $customerAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerAccount $customerAccount)
    {
        //
    }
}

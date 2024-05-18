<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\AdminAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAccountController extends Controller
{
    public function loginForm(){
        
        if (session()->has('id_admin')) {
            return redirect('/admin');
        }

        return view('admin.loginPage', ['title' => 'Admin Login']);   
    }


    public function dashboardPage(){
        if (!session()->has('id_admin')) {
            return redirect('/admin/login')->with('error', 'Please login to continue');
        }

        $username = AdminAccount::firstWhere('id', session('id_admin'))->username;
        return view('admin.dashboard', [
            'title' => 'Dashboard', 
            'username' => $username,
            'orders' => Order::all(),
            'menuitems' => MenuItem::all()
        ]);   
    }

    public function manageOrder(){
        if (!session()->has('id_admin')) {
            return redirect('/admin/login')->with('error', 'Please login to continue');
        }

        return view('admin.manageorder', [
            'title' => 'Manage Order', 
            'orders_0' => Order::where('status', 0)->with('orderItem')->get(),
            'orders_1' => Order::where('status', 1)->with('orderItem')->get(),
            'orders_2' => Order::where('status', 2)->with('orderItem')->get(),
            'orders_3' => Order::where('status', 3)->with('orderItem')->get(),
        ]);   
    }

    public function createMenu(){
        return view('admin.newmenu', [
            'title' => 'Buat Menu Baru',
            'categories' => Category::all()
        ]);
    }

    public function editMenu(Request $request){
        return view('admin.editmenu', [
            'title' => 'Buat Menu Baru',
            'categories' => Category::all(),
            'menuItem' => MenuItem::find($request->id)
        ]);
    }

    public function manageMenu(){
        if (!session()->has('id_admin')) {
            return redirect('/admin/login')->with('error', 'Please login to continue');
        }

        return view('admin.managemenu', [
            'title' => 'Manage Menu', 
            'menuitems' => MenuItem::all(),
        ]);   
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
 
        if(Auth::guard('admin')->attempt($credentials)){
            $userId = AdminAccount::firstWhere('username', $request->username)->id;
            $request->session()->put('id_admin', $userId);

            $request->session()->regenerate();
            return redirect()->intended('/admin')->with('success','You are Logged in sucessfully.');
        }
        else{
            return back()->with('error','Whoops! invalid username and password.');
        }
    }

    public function logout(){
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logged out sucessfully');
        return redirect()->intended(route('adminLogin'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\CustomerAccount;


class FavListItemController extends Controller
{

    public function addToFav(){

    }

    public function removeFromFav(){

    }
    
    public function getCustFav(){
        if (!session()->has('id_customer')) {
            return redirect('/login')->with('error', 'Please login to continue');
        }

        $customer = CustomerAccount::find(session('id_customer'));
        $favitems = $customer->favListItem()->with('menuItem')->get();

        return view('customer.favlist', [
            'title' => 'Home',
            'favitems' => $favitems
        ]);
    }

}

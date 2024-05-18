<?php

namespace App\Http\Controllers;

use App\Models\FavListItem;
use Illuminate\Http\Request;
use App\Models\CustomerAccount;

class FavListItemController extends Controller
{

    public function toggle(Request $request)
    {
        $itemId = $request->input('item_id');

        $favorite = FavListItem::where('customer_account_id', session('id_customer'))
                               ->where('menu_item_id', $itemId)
                               ->first();

        if ($favorite) {
            // If already favorited, remove from favorites
            $favorite->delete();
            return response()->json(['status' => 'removed']);
        } else {
            // Otherwise, add to favorites
            FavListItem::create([
                'customer_account_id' => session('id_customer'),
                'menu_item_id' => $itemId,
            ]);
            return response()->json(['status' => 'added']);
        }
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

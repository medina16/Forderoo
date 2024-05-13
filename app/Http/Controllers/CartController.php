<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function addToCart(Request $request){
        $itemId = $request->input('item_id');
        $quantity = $request->input('quantity', 1);

        $cartItems = Session::get('cart', []);
        if (array_key_exists($itemId, $cartItems)) {
            $cartItems[$itemId] += $quantity;
        } else {
            $cartItems[$itemId] = $quantity;
        }

        Session::put('cart', $cartItems);

        // kayaknya ini ganti deh jangan redirect tapi pesan pop up aja
        return redirect()->route('cart.index')->with('success', 'Item added to cart.');
    }

    public function removeFromCart(Request $request){
        $itemId = $request->input('item_id');

        $cartItems = Session::get('cart', []);
        if (array_key_exists($itemId, $cartItems)) {
            unset($cartItems[$itemId]);
            Session::put('cart', $cartItems);
        }

        // ini juga
        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }

    public function changeQuantity(){

        
    }

    public function getCartItems(){

    }

    public function checkout(){

    }
}

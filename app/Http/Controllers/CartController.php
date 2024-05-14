<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $itemId = $request->input('item_id');
        $quantity = $request->input('quantity', 1);

        $cartItems = Session::get('cart', []);
        if (array_key_exists($itemId, $cartItems)) {
            $cartItems[$itemId] += $quantity;
            if ($cartItems[$itemId] <= 0) {
                unset($cartItems[$itemId]);
            }
        } else {
            $cartItems[$itemId] = $quantity;
        }

        Session::put('cart', $cartItems);

        return response()->json(['success' => 'Cart updated successfully.']);
    }

    public function removeFromCart(Request $request)
    {
        $itemId = $request->input('item_id');

        $cartItems = Session::get('cart', []);
        if (array_key_exists($itemId, $cartItems)) {
            unset($cartItems[$itemId]);
            Session::put('cart', $cartItems);
        }

        return response()->json(['success' => 'Item removed from cart.']);
    }

    public function index()
    {
        // Retrieve the cart from the session
        $cart = Session::get('cart', []);
        $cartItems = [];

        // Fetch full item details from the database
        if (!empty($cart)) {
            $itemIds = array_keys($cart);
            $items = MenuItem::whereIn('id', $itemIds)->get();

            foreach ($items as $item) {
                $cartItems[] = [
                    'item' => $item,
                    'quantity' => $cart[$item->id]
                ];
            }
        }

        return view('cart', ['cartItems' => $cartItems, 'title' => 'Cart']);
    }

    public function getCartItems(){

    }

    public function checkout(){
        
    }
}

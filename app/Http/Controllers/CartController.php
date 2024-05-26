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

        $totalQuantity = 0;
        $totalPrice = 0;
        foreach ($cartItems as $id => $qty) {
            $item = MenuItem::find($id);
            $totalQuantity += $qty;
            $totalPrice += $item->price * $qty;
        }

        return response()->json([
            'success' => 'Cart updated successfully.',
            'total_quantity' => $totalQuantity,
            'total_price' => $totalPrice
        ]);
    }

    public function removeFromCart(Request $request)
    {
        $itemId = $request->input('item_id');

        $cartItems = Session::get('cart', []);
        if (array_key_exists($itemId, $cartItems)) {
            unset($cartItems[$itemId]);
            Session::put('cart', $cartItems);
        }

        $totalQuantity = 0;
        $totalPrice = 0;
        foreach ($cartItems as $id => $qty) {
            $item = MenuItem::find($id);
            $totalQuantity += $qty;
            $totalPrice += $item->price * $qty;
        }

        return response()->json([
            'success' => 'Item removed from cart.',
            'total_quantity' => $totalQuantity,
            'total_price' => $totalPrice
        ]);
    }

    public function index()
{
    // Retrieve the cart from the session
    $cart = Session::get('cart', []);
    $cartItems = [];
    $totalQuantity = 0;
    $totalPrice = 0;

    // Fetch full item details from the database
    if (!empty($cart)) {
        $itemIds = array_keys($cart);
        $items = MenuItem::whereIn('id', $itemIds)->get();

        foreach ($items as $item) {
            $quantity = $cart[$item->id];
            $cartItems[] = [
                'item' => $item,
                'quantity' => $quantity
            ];
            $totalQuantity += $quantity;
            $totalPrice += $item->price * $quantity;
        }
    }

    return view('cart', [
        'cartItems' => $cartItems,
        'totalQuantity' => $totalQuantity,
        'totalPrice' => $totalPrice,
        'title' => 'Cart'
    ]);
}

}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\CustomerAccount;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    public function create(Request $request){
        // Retrieve the cart from the session
        $cart = Session::get('cart', []);
        $itemIds = array_keys($cart);
    
        // Create a new order
        $order = Order::create([
            'customer_account_id' => session('id_customer'),
            'table_number' => session('tablenumber')
        ]);
    
        // Iterate over the cart items and create the associated order items
        foreach($itemIds as $itemId){
            OrderItem::create([
                'order_id' => $order->id,
                'menu_item_id' => $itemId,
                'quantity' => $cart[$itemId]
            ]);
        }
    
        // Optionally, you can clear the cart after the order is created
        Session::forget('cart');

        // Return a response, such as a redirect or a success message
        return redirect('/order_success');
    }
    
    public function done(){

    }

    public function cancel(){

    }

    public function getCustHistory(){
        if (!session()->has('id_customer')) {
            return redirect('/login')->with('error', 'Please login to continue');
        }

        $customer = CustomerAccount::find(session('id_customer'));
        $orders = $customer->order()->get();

        return view('customer.history', [
            'title' => 'Home',
            'orders' => $orders
        ]);
    }

}

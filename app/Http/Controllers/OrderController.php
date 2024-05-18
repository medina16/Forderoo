<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\MenuItem;
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
    
    public function updateStatus(Request $request){
        $validatedData = $request->validate([
            'status' => 'required|in:0,1,2,3',
        ]);

        $id = $request->orderid;
        $order = Order::find($id);

        $order->status = $validatedData['status'];
        $order->save();

        if($request->status == 2){
            $orderitems = $order->orderItem()->get();
            foreach($orderitems as $item){
                $itemid = $item->menu_item_id;
                $menuItem = MenuItem::find($itemid);
                $menuItem->sales = $menuItem->sales + $item->quantity;
                $menuItem->save();
            }
        }

        return redirect()->back()->with('status', 'Order status updated successfully!');
    }


    public function getCustHistory(){
        if (!session()->has('id_customer')) {
            return redirect('/login')->with('error', 'Please login to continue');
        }

        $customer = CustomerAccount::find(session('id_customer'));
        $orders = $customer->order()->get()->sortByDesc('created_at');

        return view('customer.history', [
            'title' => 'Home',
            'orders' => $orders
        ]);
    }

}

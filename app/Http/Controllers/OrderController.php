<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CustomerAccount;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    public function create(){

    }

    public function done(){

    }

    public function cancel(){

    }

    public function getCustHistory(){
        if (!session()->has('id_customer')) {
            return redirect('/login')->with('error', 'Please login to continue');
        }

        $customer = CustomerAccount::find(1);
        $orders = $customer->order()->get();

        return view('customer.history', [
            'title' => 'Home',
            'orders' => $orders
        ]);
    }

    // --------------------------

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


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}

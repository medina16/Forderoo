@extends('layout')

@section('container')
    <h1>Your Cart</h1>
    @if(count($cartItems) > 0)
        @foreach($cartItems as $cartItem)
            <div>
                <h2>{{ $cartItem['item']->name }}</h2>
                <p>Quantity: {{ $cartItem['quantity'] }}</p>
                <p>Price: Rp{{ $cartItem['item']->price }}</p>
            </div>
        @endforeach
        <form action="/cart" method="post">
            @csrf
            <button class="btn btn-primary w-100 py-2 mt-3" type="submit"><i class="bi bi-receipt"></i> Checkout</button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
@endsection

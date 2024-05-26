@extends('layout')

@section('container')
    <a href="/" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
    <h1>Your Cart</h1>
    @if (count($cartItems) > 0)
        @foreach ($cartItems as $cartItem)
            <article class="mb-2">
                <img src="{{ $cartItem['item']->photo_filename }}" width="200" />
                <h4>{{ $cartItem['item']->name }}</h4>
                <p><b>@currency($cartItem['item']->price)</b></p>
                @php
                    $id =  $cartItem['item']->id;
                    $isAvailable = $cartItem['item']->isAvailable;
                @endphp
                @include('addbutton')
            </article>
        @endforeach
        
        <div id="cart-summary">
            <div class="d-flex justify-content-between">
                <span>Total Items: <span id="total-quantity">{{ $totalQuantity }}</span></span>
                <span>Total Price: <span id="total-price">@currency($totalPrice)</span></span>
            </div>
        </div>
        
        <form action="/cart" method="post">
            @csrf
            <button class="btn btn-primary w-100 py-2 mt-3" type="submit"><i class="bi bi-receipt"></i> Check Out</button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateCartSummary(totalQuantity, totalPrice) {
                $('#total-quantity').text(totalQuantity);
                $('#total-price').text(totalPrice);
            }

            // Handle the add to cart button click
            $('.add-to-cart-btn').on('click', function() {
                var itemId = $(this).data('item-id');
                var button = $(this);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('cart.add') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        item_id: itemId,
                        quantity: 1
                    },
                    success: function(response) {
                        // Hide the add to cart button and show the quantity control
                        button.hide();
                        var quantityControl = $('.quantity-control[data-item-id="' + itemId + '"]');
                        quantityControl.show();
                        $('#quantity-' + itemId).text(1);
                        updateCartSummary(response.total_quantity, response.total_price);
                    },
                    error: function(response) {
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            // Handle the quantity control buttons click
            $('.quantity-btn').on('click', function() {
                var itemId = $(this).data('item-id');
                var isPlus = $(this).hasClass('plus');
                var quantityElement = $('#quantity-' + itemId);
                var currentQuantity = parseInt(quantityElement.text());

                // Update the quantity
                var newQuantity = isPlus ? currentQuantity + 1 : currentQuantity - 1;

                if (newQuantity < 1) {
                    // If quantity is zero, remove item from cart and hide quantity control
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('cart.remove') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            item_id: itemId
                        },
                        success: function(response) {
                            // Hide the quantity control and show the add to cart button
                            $('.quantity-control[data-item-id="' + itemId + '"]').hide();
                            $('.add-to-cart-btn[data-item-id="' + itemId + '"]').show();
                            updateCartSummary(response.total_quantity, response.total_price);
                        },
                        error: function(response) {
                            alert('An error occurred. Please try again.');
                        }
                    });
                } else {
                    // Update item quantity in the cart
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('cart.add') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            item_id: itemId,
                            quantity: isPlus ? 1 : -1
                        },
                        success: function(response) {
                            // Update the quantity displayed
                            quantityElement.text(newQuantity);
                            updateCartSummary(response.total_quantity, response.total_price);
                        },
                        error: function(response) {
                            alert('An error occurred. Please try again.');
                        }
                    });
                }
            });
        });
    </script>
@endsection

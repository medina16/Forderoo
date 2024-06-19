@extends('layout')
@section('navbar')
    @include('navbar')
@endsection

@section('container')
    @if (count($cartItems) > 0)
        <div class="category-menus">
            @foreach ($cartItems as $cartItem)
                <article class="mb-2">
                    <div class="menu-left" style="width: 95px; height: 95px; gap: 33px;">
                        <img src="{{ $cartItem['item']->photo_filename }}" style="width: 95px; height: 95px; border-radius: 15px;" />
                    </div>
                    <div class="menu-right" style="display: flex; flex-direction: column; align-items: flex-start; gap: 10px;">
                        <div class="menu-name-fav">
                            {{ $cartItem['item']->name }}
                        </div>
                        <div>@currency($cartItem['item']->price)</div>
                        @php
                            $id = $cartItem['item']->id;
                            $isAvailable = $cartItem['item']->isAvailable;
                        @endphp
                        @include('addbutton')
                    </div>
                </article>
            @endforeach
        </div>

        <div id="cart-summary">
            <div class="total-item">
                <div class="total-pesanan">
                    <div class="text-left">Total Items</div>
                    <div class="text-right">
                        <span id="total-quantity">{{ $totalQuantity }}</span> item(s)
                    </div>
                </div>
                <div class="total-harga">
                    <div class="text-left">Total Price</div>
                    <div class="text-right" style="color: var(--Primary, #00880C); text-align: right; font-size: 20px; font-style: normal; font-weight: 600; line-height: 28px;">
                        <span id="total-price">@currency($totalPrice)</span>
                    </div>
                </div>
            </div>
        </div>

        <h6 class="h6" style="margin: 10px 0px 21px 0px;">
            <a href="/" class="text-decoration-underline">Ingin menambahkan menu lain?</a>
        </h6>

        <form action="/cart" method="post">
            @csrf
            <div class="button-group">
                <button class="btn btn-success floatbar" type="submit" >
                    <div class="checkout">
                        <p style="color: var(--primary-light-active, #DDE6C4); font-size: 15px; font-style: normal; font-weight: 600; line-height: normal; letter-spacing: -0.3px; margin: auto; width: 215px; text-align: center;">
                            Check Out
                        </p>
                    </div>
                </button>
            </div>
        </form>
    @else
        <p style="color: #000; font-family: Poppins; font-size: 16px; font-style: normal; font-weight: 400; line-height: normal; letter-spacing: -0.3px;">
            Belum ada item yang ditambahkan
        </p>
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

@extends('layout')
@section('navbar')
    @include('navbar')
@endsection

@section('container')
    @if (session()->has('loginSuccess'))
        <div class="alert alert-success alert-dismissable fade show" role="alert">
            <div class="msg-box">{{ session('loginSuccess') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('logoutSuccess'))
        <div class="alert alert-success alert-dismissable fade show" role="alert">
            <div class="msg-box">{{ session('logoutSuccess') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!--SEARCH BAR-->
    <div class="col-md-6">
        <div class="form-group">
            <form method="get" action="/search">
                <div class="search-menu">
                    <img class="bitcoin-iconssearch-filled" alt="" src="bitcoiniconssearchfilled.svg">
                    <input name="search" placeholder="Cari menu..." required>
                </div>
            </form>
        </div>
    </div>
    <br>

    @if ($title == 'Browse Menu')
        @foreach ($menuitems as $category)
            <div class="kategori">
                <h2>{{ $category->name }}</h2>
                <div class="category-menus">
                    @foreach ($category->menuItem->sortByDesc('isAvailable') as $categoryitem)
                        @if ($categoryitem->isAvailable == 1)
                            <article class="mb-2">
                            @else
                                <article class="mb-2" style="opacity: 70%">
                        @endif
                        <div class="menu-left">
                            <div class="menu-name-fav">
                                {{ $categoryitem->name }}
                                {{-- <img class="ionheart-icon" loading="lazy" alt="" src="ionheart.svg" /> --}}
                                @if (session()->has('id_customer'))
                                    <button class="btn btn-outline-danger favorite-btn"
                                        data-item-id="{{ $categoryitem->id }}">
                                        <i class="bi bi-heart{{ $categoryitem->isFavorited() ? '-fill' : '' }}"></i>
                                    </button>
                                @endif

                            </div>
                            <div>@currency($categoryitem->price)</div>
                            <div class="menu-desc">
                                {{ $categoryitem->description }}
                            </div>
                        </div>
                        <div class="menu-right">
                            <img src="{{ $categoryitem->photo_filename }}" />
                            @php
                                $id = $categoryitem->id;
                                $isAvailable = $categoryitem->isAvailable;
                            @endphp
                            @include('addbutton')
                        </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endforeach
    @elseif($title == 'Search results')
        <a href="/" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
        @if ($results == null)
            <p>Hasil pencarian tidak ditemukan</p>
        @else
        <div class="category-menus">
            @foreach ($results->sortByDesc('isAvailable') as $item)
            @if ($item->isAvailable == 1)
            <article class="mb-2">
            @else
                <article class="mb-2" style="opacity: 70%">
        @endif
                <div class="menu-left">
                    <div class="menu-name-fav">
                        {{ $item->name }}
                        @if (session()->has('id_customer'))
                            <button class="btn btn-outline-danger favorite-btn"
                                data-item-id="{{ $item->id }}">
                                <i class="bi bi-heart{{ $item->isFavorited() ? '-fill' : '' }}"></i>
                            </button>
                        @endif

                    </div>
                    <div>@currency($item->price)</div>
                    <div class="menu-desc">
                        {{ $item->description }}
                    </div>
                </div>
                <div class="menu-right">
                    <img src="{{ $item->photo_filename }}" />
                    @php
                        $id = $item->id;
                        $isAvailable = $item->isAvailable;
                    @endphp
                    @include('addbutton')
                </div>
                </article>
            @endforeach
        </div>
        @endif

    @endif

    @if (session()->has('tablenumber'))
        <a href="/cart">
            <button class="btn btn-success floatbar">
                <div class="checkout">
                    <p style="color: var(--primary-light-active, #DDE6C4); font-size: 15px; font-style: normal; font-weight: 400; line-height: normal; letter-spacing: -0.3px; margin: auto; width: 215px;">
                        <b style="text-align: start; font-weight: 600;">Total <span id="cart-total-price">@currency($totalPrice)</span></b> untuk <span id="cart-total-quantity">{{ $totalQuantity }}</span> item
                    </p>
                    <img class="mdi-cart-outline" alt="" src="mdicartoutline.svg">
                </div>
            </button>
        </a>
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateCartSummary(totalQuantity, totalPrice) {
                $('#total-quantity').text(totalQuantity);
                $('#total-price').text(totalPrice);
                $('#cart-total-quantity').text(totalQuantity);
                $('#cart-total-price').text(totalPrice);
            }

            // Handle favorite button click
            $('.favorite-btn').on('click', function() {
                var itemId = $(this).data('item-id');
                var button = $(this);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('favorites.toggle') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        item_id: itemId
                    },
                    success: function(response) {
                        if (response.status === 'added') {
                            button.find('i').addClass('bi-heart-fill').removeClass('bi-heart');
                        } else {
                            button.find('i').addClass('bi-heart').removeClass('bi-heart-fill');
                        }
                    },
                    error: function(response) {
                        alert('An error occurred. Please try again.');
                    }
                });
            });

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

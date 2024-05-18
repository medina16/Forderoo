@extends('layout')

@section('container')
    @if(session()->has('tablenumber'))
        <p>Pesanan untuk Table {{ session('tablenumber') }}</p>
    @endif
    @if(session()->has('loginSuccess'))
        <div class="alert alert-success alert-dismissable fade show" role="alert">
            {{ session('loginSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session()->has('logoutSuccess'))
        <div class="alert alert-success alert-dismissable fade show" role="alert">
            {{ session('logoutSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-md-6">
        <div class="form-group">
            <form method="get" action="/search">
                <div class="input-group">
                    <input class="form-control" name="search" placeholder="Cari menu..." required>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <br>

    <a href="/cart" class="btn btn-primary"><i class="bi bi-basket"></i> Cart</a>
    @if($title == "Browse Menu")
        @foreach($menuitems as $category)
            <h2>{{ $category->name }}</h2> 
            @foreach($category->menuItem->sortByDesc('isAvailable') as $categoryitem)

                @if($categoryitem->isAvailable == 1)
                    <article class="mb-2">
                @else
                    <article class="mb-2" style="opacity: 70%">
                @endif

                    <img src="{{ $categoryitem->photo_filename }}" width="200" />
                    <h4>{{ $categoryitem->name }}</h4>
                    <button class="btn btn-outline-danger favorite-btn" data-item-id="{{ $categoryitem->id }}">
                        <i class="bi bi-heart{{ $categoryitem->isFavorited() ? '-fill' : '' }}"></i>
                    </button>
                    <p><b>Rp{{ $categoryitem->price }}</b></p>
                    <p>{{ $categoryitem->description }}</p>

                    @php
                         $id = $categoryitem->id;
                        $isAvailable = $categoryitem->isAvailable;
                    @endphp

                    @include('addbutton')    

                </article>
                
            @endforeach
        @endforeach

    @elseif($title == "Search results")
        <a href="/" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
        @if($results == null)
            <p>Hasil pencarian tidak ditemukan</p>
        @else
            @foreach($results as $item)
                <article class="mb-2">
                    <img src="{{ $item->photo_filename }}" width="200" />
                    <h4>{{ $item->name }}</h4>
                    <button class="btn btn-outline-danger favorite-btn" data-item-id="{{ $item->id }}">
                        <i class="bi bi-heart{{ $item->isFavorited() ? '-fill' : '' }}"></i>
                    </button>
                    <p>{{ $item->description }}</p>
                    @php
                        $id = $item->id;
                        $isAvailable = $item->isAvailable;
                    @endphp
                    @include('addbutton')
                </article>
            @endforeach
        @endif

    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle favorite button click
            $('.favorite-btn').on('click', function() {
                var itemId = $(this).data('item-id');
                var button = $(this);

                $.ajax({
                    type: 'POST',
                    url: '{{ route("favorites.toggle") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        item_id: itemId
                    },
                    success: function(response) {
                        if(response.status === 'added') {
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
                    url: '{{ route("cart.add") }}',
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
                        url: '{{ route("cart.remove") }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            item_id: itemId
                        },
                        success: function(response) {
                            // Hide the quantity control and show the add to cart button
                            $('.quantity-control[data-item-id="' + itemId + '"]').hide();
                            $('.add-to-cart-btn[data-item-id="' + itemId + '"]').show();
                        },
                        error: function(response) {
                            alert('An error occurred. Please try again.');
                        }
                    });
                } else {
                    // Update item quantity in the cart
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("cart.add") }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            item_id: itemId,
                            quantity: isPlus ? 1 : -1
                        },
                        success: function(response) {
                            // Update the quantity displayed
                            quantityElement.text(newQuantity);
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

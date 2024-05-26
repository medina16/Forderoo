@extends('layout')

@section('container')
    <a href="/" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
    <h1>Menu Favorit</h1>
    <br>
    @foreach ($favitems as $item)
        <article class="mb-5">
            <img src="{{ $item->menuItem->photo_filename }}" width="200" />
            <h2>{{ $item->menuItem->name }}</h2>
            @if (session()->has('id_customer'))
                <button class="btn btn-outline-danger favorite-btn" data-item-id="{{ $item->menuItem->id }}">
                    <i class="bi bi-heart{{ $item->menuItem->isFavorited() ? '-fill' : '' }}"></i>
                </button>
            @endif
            <p>@currency($item->menuItem->price)</p>
            <p>{{ $item->menuItem->description }}</p>
        </article>
    @endforeach

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
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
        })
    </script>
@endsection

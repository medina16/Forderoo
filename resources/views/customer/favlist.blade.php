@extends('layout')
@section('navbar')
    @include('navbar')
@endsection

@section('container')
    <div class="row justify-content-center">
        <div class="button-back">
            <a class="icon-link" href="/">
                <img class="epback" alt="" src="ep_back.svg">
            </a>
        </div>
        <h1 class="h3"
            style="color: #000;
                            font-size: 36px;
                            font-style: normal;
                            font-weight: 600;
                            line-height: normal;
                            letter-spacing: -0.3px;
                            margin-top: 20px;">
            Favorite</h1>
        <div class="category-menus">
            @if ($favitems->isEmpty())
                <p
                    style="color: #000;
                    font-family: Poppins;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    letter-spacing: -0.3px;">
                    Belum ada menu favorit
                </p>
            @else
                @foreach ($favitems as $item)
                    <article class="mb-2">
                        <div class="menu-left">
                            <div class="menu-name-fav">
                                {{ $item->menuItem->name }}
                                {{-- <img class="ionheart-icon" loading="lazy" alt="" src="ionheart.svg" /> --}}
                                @if (session()->has('id_customer'))
                                    <button class="btn btn-outline-danger favorite-btn"
                                        data-item-id="{{ $item->menuItem->id }}">
                                        <i class="bi bi-heart{{ $item->menuItem->isFavorited() ? '-fill' : '' }}"></i>
                                    </button>
                                @endif

                            </div>
                            <div>@currency($item->menuItem->price)</div>
                            <div class="menu-desc">
                                {{ $item->menuItem->description }}
                            </div>
                        </div>
                        <div class="menu-right">
                            <img src="{{ $item->menuItem->photo_filename }}" />
                        </div>
                    </article>
                @endforeach
            @endif
        </div>

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
    </div>
@endsection

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

    @if($title == "Browse Menu")

        @foreach($menuitems as $category)
            <h2>{{ $category->name }}</h2>
            @foreach($category->menuItem as $categoryitem)
                <article class="mb-2">
                    <img src="{{ $categoryitem->photo_filename }}" width="200" />
                    <h4>{{ $categoryitem->name }}</h4>
                    <p>{{ $categoryitem->description }}</p>
                    <button type="button" class="btn btn-primary">Rp{{ $categoryitem->price }}</button>
                </article>
            @endforeach
        @endforeach

    @elseif($title == "Search results")

        @foreach($results as $item)
            <article class="mb-2">
                <img src="{{ $item->photo_filename }}" width="200" />
                <h4>{{ $item->name }}</h4>
                <p>{{ $item->description }}</p>
                <button type="button" class="btn btn-primary">Rp{{ $item->price }}</button>
            </article>
        @endforeach

    @endif

@endsection

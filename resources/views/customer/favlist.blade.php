@extends('layout')

@section('container')
    <a href="/" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
    <h1>Menu Favorit</h1>
    <br>
    @foreach ($favitems as $item)
        <article class="mb-5">
            <img src="{{ $item->menuItem->photo_filename }}" width="200" />
            <h2>{{ $item->menuItem->name }}</h2>
            <p>Rp{{ $item->menuItem->price }}</p>
            <p>{{ $item->menuItem->description }}</p>
        </article>
    @endforeach
@endsection

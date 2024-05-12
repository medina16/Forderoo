@extends('main')

@section('container')
    <h1>Nama Restoran</h1>
    @if(session()->has('tablenumber'))
        <p>Pesanan untuk Table {{ session('tablenumber') }}</p>
    @endif
    <br>
    @foreach($menuitems as $item)
        <article class="mb-5">
            <img src="{{ $item->photo_filename }}" width="200" />
            <h2>{{ $item->name }}</h2>
            <p>Rp{{ $item->price }}</p>
            <p>{{ $item->description }}</p>
        </article>
    @endforeach
@endsection

@extends('main')

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

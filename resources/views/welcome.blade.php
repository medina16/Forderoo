@extends('main')

@section('container')
    <h1>Forderoo</h1>
    <p> Pesanan untuk Table {{ session('tablenumber') }}</p>
    </br>
    
    <a href="/login" class="btn btn-primary w-100 py-2">Login</a>
    <p>atau</p>
    <a href="/browse">Masuk sebagai Guest</a>

@endsection
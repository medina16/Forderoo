@extends('admin.layout')

@section('container')
    <h2>Welcome, {{ $username }}</h2>

    <form action="{{ route('adminLogoutPost') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-danger" href="#"><i class="bi bi-box-arrow-right"></i>Logout</button>
    </form>
    
    <a class="btn btn-outline-primary" href="/admin/order"><i class="bi bi-box-arrow-right"></i>Kelola Order</a>
    <a class="btn btn-outline-primary" href="/admin/menu"><i class="bi bi-box-arrow-right"></i>Kelola Menu</a>

@endsection
@extends('admin.layout')

@section('container')
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="container text-center">
            <h2 class="mb-4">Welcome, {{ $username }}</h2>
            <form action="{{ route('adminLogoutPost') }}" method="post" class="d-inline-block mb-4">
                @csrf
                <button type="submit" class="btn btn-outline-danger"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <a class="btn btn-outline-primary btn-lg d-block mb-3" href="/admin/order">
                        Kelola Order
                    </a>
                    <a class="btn btn-outline-primary btn-lg d-block" href="/admin/menu">
                        Kelola Menu
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

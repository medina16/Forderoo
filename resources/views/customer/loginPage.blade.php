@extends('layout')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <!-- pesan yg muncul kalo sukser register-->
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissable fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- pesan yg muncul kalo gagal login krn salah password-->
        @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissable fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <p> Pesanan untuk Table {{ session('tablenumber') }}</p>
        
        <main class="form-signin w-100 m-auto">

            <form action="/login" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" autofocus required value="{{ old('email')}}">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit">Log in</button>
            </form>
            <small class="d-block text-center mt-3">Not registered? <a href="/register">Register now!</a></small>
        </main>
    </div>
</div>

@endsection
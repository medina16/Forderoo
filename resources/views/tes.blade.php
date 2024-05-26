@extends('layout')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="forderoo">FORDEROO</div>
            <div class="col-md-12">

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissable fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close alert-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <!-- pesan yg muncul kalo gagal login krn salah password-->
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissable fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close alert-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

                <main class="form-signin w-100 m-auto">
                    <form action="/login" method="post">
                        @csrf
                        <div class="form-fields">
                            <h1 class="h3 mb-3">Login</h1>

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

                        <div class="button-group">
                            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                            <a href="/register" class="btn btn-secondary w-100 py-2" type="submit">Register</a>
                        </div>

                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection

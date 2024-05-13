@extends('layout')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-registration w-100 m-auto">

            <form action="/register" method="post">
                <!-- buat mastiin kalo request yg didapet dari website ini bukan web lain-->
                @csrf

                <h1 class="h3 mb-3 fw-normal">Registration Form</h1>

                <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Nama lengkap" required value="{{ old('name')}}">
                    <label for="name">Nama lengkap</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email')}}">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror rounded-bottom" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
            </form>

            <small class="d-block text-center mt-3">Signed up already? <a href="/login">Login</a></small>
        </main>
    </div>
</div>

@endsection
@extends('layout')

@section('css_style')
    <link rel="stylesheet" href="/htmlstatic/style.css">
@endsection

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="forderoo">FORDEROO</div>
            <div class="col-md-12">

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissable fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close alert-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

                <main class="form-signin w-100 m-auto">
                    <form action="/register" method="post">
                        @csrf
                        <div class="form-fields">
                            <h1 class="h3 mb-3">Register</h1>

                            <div class="form-floating">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name" required
                                    value="{{ old('name') }}">
                                <label for="name">Nama</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email" required
                                    value="{{ old('email') }}">
                                <label for="email">Email</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <input type="phone_number" name="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                                    required value="{{ old('phone_number') }}">
                                <label for="phone_number">No. Telp</label>
                                @error('phone_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <small style="font-size: 12px; display: block; text-align: center;">Dengan daftarkan
                                akun, Anda setuju terkait
                                <a href="#" class="text-decoration-none">Terms & Condition</a> dan
                                <a href="#" class="text-decoration-none">Privacy Policy</a>
                            </small>
    
                        </div>


                        
                        <div class="button-group">
                            <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
                        </div>

                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection

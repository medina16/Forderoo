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
        
        <main class="form-signin w-100 m-auto">

            <form action="/profile" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Profile</h1>

                <div class="form-floating">
                    <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" id="name" autofocus required value="{{ $custInfo->name}}">
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required value="{{ $custInfo->email}}">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" required value="{{ $custInfo->phone_number}}">
                    <label for="phone_number">Phone Number</label>
                    @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit">Edit</button>
            </form>
        </main>
    </div>
</div>

@endsection
@extends('layout')
@section('navbar')
    @include('navbar')
@endsection

@section('container')
    <div class="row justify-content-center">
        <div class="button-back">
            <a class="icon-link" href="/">
                <img class="epback" alt="" src="ep_back.svg">
            </a>
        </div>
        <div class="col-md-12">
            <!-- pesan yg muncul kalo sukses-->
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissable fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-signin w-100 m-auto">
                <form action="/profile" method="post">
                    @csrf
                    <div class="form-fields"
                        style="display: inline-flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 30px;
                padding-bottom: 40px;">
                        <h1 class="h3"
                            style="color: #000;
                    font-size: 36px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;
                    letter-spacing: -0.3px;">
                            Profile</h1>
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" autofocus required value="{{ $custInfo->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" required value="{{ $custInfo->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="text" class="form-label">Phone Number</label>
                            <input type="text" class="form-control  @error('phone_number') is-invalid @enderror"
                                name="phone_number" id="phone_number" required value="{{ $custInfo->phone_number }}">
                            @error('phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="button-group">
                        <button href="#" class="btn btn-primary w-100 py-2"
                            style="display: flex;
                    width: 325px;
                    height: 45px;
                    padding: 3px 13px;
                    justify-content: center;
                    align-items: center;
                    gap: 10px;
                    flex-shrink: 0;
                    border-radius: 10px;
                    background: var(--Foundation-Green-Normal, #92AD42);
                    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);"
                            type="submit">Edit</button>
                    </div>

                </form>
            </main>
        </div>
    </div>
    {{-- <div class="row justify-content-center">
    <div class="col-md-5">        
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
</div> --}}
@endsection

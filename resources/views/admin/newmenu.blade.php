@extends('admin.layout')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-registration w-100 m-auto">
            <form action="{{ route('newMenuPost') }}" method="post" enctype="multipart/form-data">
                @csrf
                <a href="/admin/menu" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
                <h1 class="h3 mb-3 fw-normal">Menu Baru</h1>

                <div>
                    <label>Upload gambar</label>
                    <input type="file" class="form-control" required name="image">
                </div>

                <div>
                    <label for="name">Nama </label>
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Nama menu ..." required value="{{ old('name')}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <label for="category">Kategori </label>
                    <select name="category" class="form-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <label for="description">Deskripsi </label>
                    <textarea class="form-control rounded-top @error('description') is-invalid @enderror" placeholder="Deskripsi menu ..." required name="description">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <label for="price">Harga (Rp) </label>
                    <input type="number" name="price" class="form-control rounded-top @error('price') is-invalid @enderror" id="price" placeholder="ex: 30000" required value="{{ old('price')}}">
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Buat</button>
            </form>
        </main>
    </div>
</div>
@endsection

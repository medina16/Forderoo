@extends('admin.layout')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-registration w-100 m-auto">
            <form action="{{ route('editMenuPost') }}" method="post" enctype="multipart/form-data">
                @csrf
                <a href="/admin/menu" class="btn btn-outline-secondary mb-4">
                    <i class="bi bi-arrow-left-circle-fill"></i> Kembali
                </a>
                <h1 class="h3 mb-3 fw-normal">Edit Menu</h1>

                <input type="hidden" name="id" value="{{ $menuItem->id }}">

                <div class="mb-3">
                    <label for="image" class="form-label">Upload gambar baru</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" value="{{ $menuItem->name }}"
                        class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Nama menu ..." required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select name="category" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $menuItem->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                        placeholder="Deskripsi menu ..." name="description">{{ old('description', $menuItem->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ $menuItem->price }}"
                        class="form-control @error('price') is-invalid @enderror" id="price" placeholder="ex: 30000"
                        required>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Edit</button>
            </form>
        </main>
    </div>
</div>
@endsection

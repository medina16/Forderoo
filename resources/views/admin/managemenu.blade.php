@extends('admin.layout')

@section('container')
    <a href="/admin" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
    <br>
    <br>
    <h3>Kelola Menu</h3>
    <br>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissable fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/admin/menu/new" class="btn btn-primary">+ Menu baru</a>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">Kategori</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Harga</th>
                <th scope="col">Ketersediaan</th>
                <th scope="col">Terjual</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menuitems as $item)
                <tr>
                    <th scope="row"><img src="{{ $item->photo_filename }}" width="100" /></th>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>@currency($item->price)</td>
                    <td>
                        <form action="{{ route('admin.menu.isAvailable') }}" method="post">
                            @csrf
                            <input type=hidden name="id" value={{ $item->id }}>
                            <select name="isAvailable" class="form-select" onchange="this.form.submit()">
                                <option value="1" {{ $item->isAvailable == 1 ? 'selected' : '' }}>Tersedia</option>
                                <option value="0" {{ $item->isAvailable == 0 ? 'selected' : '' }}>Stok habis</option>
                            </select>
                        </form>
                    </td>
                    <td>{{ $item->sales }}</td>
                    <td>
                        <form action="/admin/menu/edit" method="post">
                            @csrf
                            <input type="hidden" name="id" value={{ $item->id }}>
                            <button type="submit" class="btn btn-primary w-100" tabindex="4">Edit</button>
                        </form>
                        <form action="{{ route('deleteMenuPost') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value={{ $item->id }}>
                            <button type="submit" class="btn btn-danger w-100" tabindex="4">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

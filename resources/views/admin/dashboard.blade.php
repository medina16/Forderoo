@extends('admin.layout')

@section('container')
    <h2>Welcome, {{ $username }}</h2>

    <form action="{{ route('adminLogoutPost') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-danger" href="#"><i class="bi bi-box-arrow-right"></i>Logout</button>
    </form>
    </br>

    <h3>Kelola Pesanan</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Dibuat pada</th>
                <th scope="col">Terakhir diperbarui</th>
                <th scope="col">Status</th>
                <th scope="col">Catatan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                    <td>{{ $order->getStatus() }}</td>
                    <td>{{ $order->note }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </br>

    <h3>Kelola Menu</h3>
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
            @foreach($menuitems as $item)
                <tr>
                    <th scope="row"><img src="{{ $item->photo_filename }}" width="100" /></th>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->isAvailable }}</td>
                    <td>{{ $item->sales }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
@extends('admin.layout')
@section('container')
<a href="/admin" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
<h3>Kelola Pesanan</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Dibuat pada</th>
                <th scope="col">Terakhir diperbarui</th>
                <th scope="col">Nomor meja</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                    <td>{{ $order->table_number }}</td>
                    <td>
                        <form action="{{ route('admin.orders.updateStatus') }}" method="post">
                            @csrf
                            <input type=hidden name="orderid" value={{ $order->id }}>
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Menunggu pembayaran</option>
                                <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Sedang diproses</option>
                                <option value="2" {{ $order->status == 2 ? 'selected' : '' }}> Selesai</option>
                                <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
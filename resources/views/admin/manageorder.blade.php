@extends('admin.layout')
@section('container')
    <a href="/admin" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
    <br><br>
    <h3>Kelola Pesanan</h3>
    <br>

    <h4>Menunggu pembayaran</h4>
    @if($orders_0->isEmpty())
        <p>Tidak ada pesanan yang menunggu pembayaran.</p>
    @else
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Dibuat pada</th>
                    <th scope="col">Terakhir diperbarui</th>
                    <th scope="col">Nomor meja</th>
                    <th scope="col">Item pesanan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders_0 as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->updated_at }}</td>
                        <td>{{ $order->table_number }}</td>
                        <td>
                            <?php $total = 0; ?>
                            <ul>
                                @foreach ($order->orderItem as $item)
                                    <?php $price = $item->menuItem->price * $item->quantity; ?>
                                    <li>{{ $item->menuItem->name }} x {{ $item->quantity }} - Rp {{ $price }}</li>
                                    <?php $total = $total + $price;
                                    $price = 0; ?>
                                @endforeach
                            </ul>
                            <p>Total: Rp<?php echo $total; ?></p>
                        </td>
                        <td>
                            <form action="{{ route('admin.orders.updateStatus') }}" method="post">
                                @csrf
                                <input type="hidden" name="orderid" value={{ $order->id }}>
                                <input type="hidden" name="status" value="1">
                                <button type="submit" class="btn btn-primary w-100" tabindex="4">Tandai sudah dibayar</button>
                            </form>
                            <form action="{{ route('admin.orders.updateStatus') }}" method="post">
                                @csrf
                                <input type="hidden" name="orderid" value={{ $order->id }}>
                                <input type="hidden" name="status" value="3">
                                <button type="submit" class="btn btn-outline-danger w-100" tabindex="4">Tandai dibatalkan</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <br>

    <h4>Sedang diproses</h4>
    @if($orders_1->isEmpty())
        <p>Tidak ada pesanan yang sedang diproses.</p>
    @else
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Dibuat pada</th>
                    <th scope="col">Terakhir diperbarui</th>
                    <th scope="col">Nomor meja</th>
                    <th scope="col">Item pesanan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders_1 as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->updated_at }}</td>
                        <td>{{ $order->table_number }}</td>
                        <td>
                            <?php $total = 0; ?>
                            <ul>
                                @foreach ($order->orderItem as $item)
                                    <?php $price = $item->menuItem->price * $item->quantity; ?>
                                    <li>{{ $item->menuItem->name }} x {{ $item->quantity }} - Rp {{ $price }}</li>
                                    <?php $total = $total + $price;
                                    $price = 0; ?>
                                @endforeach
                            </ul>
                            <p>Total: Rp<?php echo $total; ?></p>
                        </td>
                        <td>
                            <form action="{{ route('admin.orders.updateStatus') }}" method="post">
                                @csrf
                                <input type="hidden" name="orderid" value={{ $order->id }}>
                                <input type="hidden" name="status" value="2">
                                <button type="submit" class="btn btn-primary w-100" tabindex="4">Tandai selesai</button>
                            </form>
                            <form action="{{ route('admin.orders.updateStatus') }}" method="post">
                                @csrf
                                <input type="hidden" name="orderid" value={{ $order->id }}>
                                <input type="hidden" name="status" value="3">
                                <button type="submit" class="btn btn-outline-danger w-100" tabindex="4">Tandai dibatalkan</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <br>

    <h4>Selesai</h4>
    @if($orders_2->isEmpty())
    <p>Tidak ada pesanan yang selesai.</p>
    @else
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Dibuat pada</th>
                    <th scope="col">Terakhir diperbarui</th>
                    <th scope="col">Nomor meja</th>
                    <th scope="col">Item pesanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders_2 as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->updated_at }}</td>
                        <td>{{ $order->table_number }}</td>
                        <td>
                            <?php $total = 0; ?>
                            <ul>
                                @foreach ($order->orderItem as $item)
                                    <?php $price = $item->menuItem->price * $item->quantity; ?>
                                    <li>{{ $item->menuItem->name }} x {{ $item->quantity }} - Rp {{ $price }}</li>
                                    <?php $total = $total + $price;
                                    $price = 0; ?>
                                @endforeach
                            </ul>
                            <p>Total: Rp<?php echo $total; ?></p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <br>

    <h4>Dibatalkan</h4>
    @if($orders_3->isEmpty())
        <p>Tidak ada pesanan yang dibatalkan.</p>
    @else
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Dibuat pada</th>
                    <th scope="col">Terakhir diperbarui</th>
                    <th scope="col">Nomor meja</th>
                    <th scope="col">Item pesanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders_3 as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->updated_at }}</td>
                        <td>{{ $order->table_number }}</td>
                        <td>
                            <?php $total = 0; ?>
                            <ul>
                                @foreach ($order->orderItem as $item)
                                    <?php $price = $item->menuItem->price * $item->quantity; ?>
                                    <li>{{ $item->menuItem->name }} x {{ $item->quantity }} - Rp {{ $price }}</li>
                                    <?php $total = $total + $price;
                                    $price = 0; ?>
                                @endforeach
                            </ul>
                            <p>Total: Rp<?php echo $total; ?></p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

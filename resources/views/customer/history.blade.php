@extends('layout')

@section('container')
<a href="/" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
    <h1>Riwayat Pemesanan</h1>
    <br>
    @foreach($orders as $order)
        <article class="mb-5">
            <h3>{{ $order->created_at }}</h3>
            <?php $total = 0?>
            <ul>
                @foreach($order->orderItem as $item)
                    <?php $price = $item->menuItem->price * $item->quantity?>
                    <li>{{ $item->menuItem->name }} - {{ $item->quantity }}pcs - Rp {{ $price }}</li>
                    <?php $total = $total + $price; $price = 0?>
                @endforeach
            </ul>
            <p>Total: Rp<?php echo $total ?></p>
            <p>Status: {{ $order->getStatus() }}</p>
        </article>
    @endforeach
@endsection

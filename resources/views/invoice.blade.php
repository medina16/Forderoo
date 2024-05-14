@extends('layout')

@section('container')
    <h1>Invoice</h1>
    <h3>{{ $order->created_at }}</h3>
    <?php $total = 0?>
    <ul>
    @foreach($orderItems as $item)
        <?php $price = $item->menuItem->price?>
        <li>{{ $item->menuItem->name }} - Rp {{ $price }}</li>
        <?php $total = $total + $price; $price = 0?>
    @endforeach
            </ul>
            <p>Total: Rp<?php echo $total ?></p>
            <p>Catatan: {{ $order->note }}</p>
            <p>Status: {{ $order->getStatus() }}</p>
@endsection

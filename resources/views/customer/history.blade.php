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
        <div style="display:block">
            @foreach ($orders as $order)
                <?php $total = 0; ?>
                <div class="category-menus">
                    <div
                        style="
        padding: 4px 13px;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        background: #EFF3E3;
        color: #000;
        text-align: center;
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        width: 319px;
        margin-top: 30px;
        display:flex;
        flex-direction: column;
       "><b>{{ $order->created_at }}</b><div>{{ $order->getStatus() }}</div></div>
                    @foreach ($order->orderItem as $item)
                        <?php $price = $item->menuItem->price * $item->quantity; ?>
                        <article class="mb-2">
                            <div class="menu-left" style="width: 95px;
            height: 95px;
            gap: 33px;">
                                <img src="{{ $item->menuItem->photo_filename }} " style="width: 95px; height: 95px; border-radius: 15px;" />
                            </div>
                            <div class="menu-right"
                                style="display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;">
                                <div class="menu-name-fav">
                                    {{ $item->menuItem->name }}
                                </div>
                                <div>@currency($item->menuItem->price)</div>
                            </div>
                            <div class="quantities"
                                style="display: flex;
            color: #000;
            font-style: normal;
            line-height: normal; position:relative;right:-90px">
                                x {{ $item->quantity }}
                                <?php $total = $total + $price;
                                $price = 0; ?>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="line" style="width: 319px; background: rgba(0, 0, 0, 0.20);"></div>
                <div class="total-pesanan" style="padding-top: 15px; width:319px">
                    <div class="text-left" style="font-size: 16px;">
                        Total Bill
                    </div>
                    <div class="text-right" style="font-size: 16px; font-weight: 600;">

                        @currency($total)
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

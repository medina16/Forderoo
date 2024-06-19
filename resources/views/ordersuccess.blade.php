@extends('layout')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-12" style="padding-top: 100px;">
            <div class="checklist">
                <img class="ellipse" alt="" src="Ellipse 53.svg">
                <img class="vector" alt="" src="Vector.svg">
            </div>

            <div class="text-group">
                <p class="p1">
                    Pesanan Anda telah terkonfirmasi!
                </p>
                <p class="p2">
                    Mohon untuk melanjutkan proses pembayaran di kasir, terima kasih :)
                </p>
            </div>

        </div>
        <div class="button-group">
            <a href="/">
                <button class="btn btn-success floatbar">
                    <div class="checkout">
                        <p
                            style="color: var(--primary-light-active, #DDE6C4);
                font-size: 15px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                letter-spacing: -0.3px;
                margin: auto;
                width: 215px;">
                            Kembali ke menu utama</p>
                    </div>
                </button>
            </a>
        </div>
    </div>
@endsection

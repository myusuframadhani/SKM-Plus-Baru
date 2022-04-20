@extends('layouts.appUser')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10"></div>
    <div class="col-2 text-start">
        <a href="{{ route('transaksi.user.index') }}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
</div>
<!-- row -->

<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <div class="row my-3">
            <div class="col-10  mx-auto text-center">
                <p class="text-black text-center fs-3 my-3">Invoice</p>
                <p class="text-black text-center fs-6 my-3">( Tunjukkan riwayat transaksi saat melakukan pembayaran tunai pada kasir )</p>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-6 text-start">
                <p class="fw-bolder fs-5 my-2">Susu Kedelai Madu Plus</p>
                <p class="fs-6 my-2">Tlogo Wetan, Antirogo, Kec. Sumbersari</p>
                <p class="fs-6 my-2">Jember</p>
                <p class="fs-6 my-2">Jawa Timur</p>
                <p class="fs-6 my-2">Tanggal : {{ $order->created_at->format('d-m-Y') }}</p>
            </div>
            <div class="col-6 text-end">
                <p class="fs-6 mt-3 my-2">Kepada : {{ $order->user->name }}</p>
                <p class="fs-6 my-2">{{ $order->alamat }}</p>
            </div>
        </div>
        <table id="example" class="table display text-muted my-3">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->katalog->nama_produk }}</td>
                    <td>{{ $order->jumlah}}</td>
                </tr>
            </tbody>
        </table>

        <div class="row justify-content-end my-4">
            <div class="col-6"></div>
            <div class="col-6 text-end">
                <p class="fw-bolder fs-6">Total : Rp {{ number_format($order->jumlah * $order->katalog->harga_produk, 2) }}</p>
                
            </div>
        </div>
    </div>
</div>
@endsection
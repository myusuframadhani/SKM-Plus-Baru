@extends('layouts.appUser')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Data Transaksi</p>
        </div>
    </div>
    <div class="col-2 text-start">
        <a href="{{ route('transaksi.user.index') }}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
</div>
<!-- row -->

<div class="col-xl-12 col-xxl-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" value="{{ $order->katalog->nama_produk }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Cabang</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" value="{{ $order->cabang->nama_cabang }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" value="{{ $order->alamat }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" value="{{ $order->jumlah }} pcs">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Metode Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" value="{{ $order->metode_pembayaran }}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-2 col-form-label">Bukti Transaksi</label>
                        <div class="col-sm-2">
                            <img src="{{asset('storage/' . $order->bukti_transaksi) }}" class="border border-1">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-1">
                            <input type="text" readonly class="form-control-plaintext fw-bold text-center text-white bg-primary text-uppercase" value="{{ $order->konfirmasi }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
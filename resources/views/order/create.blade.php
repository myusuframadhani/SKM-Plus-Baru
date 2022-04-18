@extends('layouts.appUser')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Pesan Produk</p>
        </div>
    </div>
    <div class="col-2 text-start">
        <a href="{{ route ('order.index)}}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
</div>
<!-- row -->

<div class="col-xl-12 col-xxl-12 me-5">
    <div class="card">
        @if($message = Session::get('success'))
            <div class="mt-4 mb-0 mx-4 alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $message }}
            </div>
        @elseif($message = Session::get('error'))
            @foreach($message as $msg)
            <div class="mt-4 mb-0 mx-4 alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $msg }}
            </div>
            @endforeach 
        @endif
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="metode_pembayaran" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Transfer
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="metode_pembayaran" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Tunai
                        </label>
                    </div>
                    <div class="form-group my-2">
                        <label>Alamat</label>
                        <input type="text" class="form-control input-default" name="alamat" required>
                    </div>
                    <div class="form-group my-2">
                        <label>Jumlah Pesanan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="jumlah" required>
                            <span class="input-group-text" id="basic-addon2">pcs</span>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <label>Bukti Pembayaran</label>
                        <input type="file" name="bukti_transaksi" class="form-control">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-block btn-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
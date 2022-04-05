@extends('layouts.app')

@section('title', 'Edit Stok')
@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Ubah Stok Produk</p>
        </div>
    </div>
    <div class="col-2 text-center">
        <a href="{{ route('stock.list', $stock->cabang->id) }}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
</div>
<!-- row -->

<div class="col-xl-12 col-xxl-12">
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
                <form action="{{ route('stock.update', $stock->id) }}" method="post">
                    @csrf
                    <input type="number" name="id_produk" value="{{ $stock->katalog->id }}" hidden>
                    <div class="form-group my-3">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" style="background: #c4c4c4;"
                            value="{{ $stock->katalog->nama_produk }}" placeholder="Tulis nama produk" disabled>
                    </div>
                    <div class="form-row my-3">
                        <div class="form-group col-md-6">
                            <label>Stok Produk Saat Ini</label>
                            <input type="number" class="form-control" style="background: #c4c4c4;" name="jumlah_sebelum"
                                value="{{ $stock->jumlah }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Stok Masuk (Beri Minus Untuk Mengurangi, Contoh: -5)</label>
                            <input type="number" class="form-control" name="jumlah" value="0"
                                placeholder="Tulis stok produk yang masuk..." required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Edit Stok</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Tambah Stok')
@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Tambah Stok Barang</p>
        </div>
    </div>
    <div class="col-2 text-center">
        <a href="{{ route('stock.list', $cabang->id) }}">
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
                <form action="{{ route('stock.store', $cabang->id) }}" method="post">
                    @csrf
                    <input type="number" name="id_cabang" value="{{ $cabang->id }}" hidden>
                    <div class="form-row">
                        <div class="col-sm-5">
                            <label class="my-3">Nama Produk (Pilih Satu yang Belum Tersedia di Cabang):</label>
                            <select class="form-control" id="sel1" name="id_produk">
                                @forelse($katalog as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_produk }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div><br>
                    <button type="submit" class="btn btn-primary col-sm-5">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
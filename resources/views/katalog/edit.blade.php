@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Edit Produk</p>
        </div>
    </div>
    <div class="col-2 text-start">
        <a href="{{ route('katalog.index') }}">
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
                <form action="{{ route('katalog.update', $katalog->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control input-default" name="nama_produk"
                            value="{{ $katalog->nama_produk }}" placeholder="Tulis nama produk..." required>
                    </div>
                    <div class="form-group">
                        <label>Harga Produk</label>
                        <input type="text" class="form-control input-default " name="harga_produk"
                            value="{{ $katalog->harga_produk }}" placeholder="Tulis harga produk..." required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label>Gambar Produk</label>
                        <input type="file" name="image" class="form-control" value="{{ $katalog->gambar }}">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Produk</label>
                        <textarea class="form-control" name="deskripsi_produk"
                            placeholder="Tulis deskripsi produk..." required>{{ $katalog->deskripsi_produk }}</textarea>
                    </div><br>
                    <button type="submit" class="btn btn-block btn-primary">Edit Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
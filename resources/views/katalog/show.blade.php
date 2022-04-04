@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Detail Produk</p>
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
        <div class="card-body">
            <div class="basic-form">
                <form>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Produk</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" value="{{ $katalog->nama_produk }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Harga Produk</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" value="{{ $katalog->harga_produk }}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label">Gambar</label>
                        <div class="col-sm-3">
                            <img src="{{asset('storage/' . $katalog->gambar) }}" alt="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi Produk</label>
                        <div class="col-sm-9">
                            <textarea readonly class="form-control-plaintext" style="resize: none;">{{ $katalog->deskripsi_produk }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
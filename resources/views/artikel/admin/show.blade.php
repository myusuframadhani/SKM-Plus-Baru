@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Detail Artikel</p>
        </div>
    </div>
    <div class="col-2 text-start">
        <a href="{{ route('artikel.admin.index') }}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
</div>
<!-- row -->
<div class="container">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Judul Artikel</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $artikel->judul }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Terbit</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $artikel->created_at->format('d-m-Y | H:i:s') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Diperbarui</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $artikel->updated_at->format('d-m-Y | H:i:s') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Author</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $artikel->author }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                {!! $artikel->deskripsi !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
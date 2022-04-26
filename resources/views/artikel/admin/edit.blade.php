@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Edit Artikel</p>
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
                    <form action="{{ route('artikel.admin.update', $artikel->id) }}" method="post">
                        @csrf
                        
                        <div class="form-group">
                            <label>Judul Artikel</label>
                            <input type="text" class="form-control input-default my-2" name="judul"
                                value="{{ $artikel->judul }}" placeholder="Masukkan judul artikel..." required>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" class="form-control input-default my-2" name="author"
                                value="{{ $artikel->author }}" placeholder="Masukkan nama author..." required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control my-2" name="deskripsi"
                                placeholder="Masukkan deskripsi artikel..." required>{{ $artikel->deskripsi }}</textarea>
                        </div><br>
                        <button type="submit" class="btn btn-block btn-primary"><i class="fa-solid fa-pen-to-square me-2"></i>Sunting</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
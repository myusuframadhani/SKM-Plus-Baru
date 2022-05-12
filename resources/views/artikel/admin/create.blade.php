@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Tambah Data Artikel</p>
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
                <form action="{{ route('artikel.admin.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-2">
                        <label>Judul Artikel</label>
                        <input type="text" class="form-control input-default my-2" name="judul" placeholder="Masukkan judul artikel..." required>
                    </div>
                    <div class="form-group my-2">
                        <label>Author</label>
                        <input type="text" class="form-control input-default my-2" name="author" placeholder="Masukkan nama author..." required>
                    </div>
                    <div class="form-group my-2">
                        <label>Deskripsi</label>
                        <textarea class="ckeditor form-control my-2" name="deskripsi" id="wysiwyg-editor" placeholder="Masukkan deskripsi artikel..." required></textarea>
                    </div><br>
                    <button type="submit" class="btn btn-block btn-primary"><i class="fa-solid fa-cloud-arrow-up me-2"></i>Terbitkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection
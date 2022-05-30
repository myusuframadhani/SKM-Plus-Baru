@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Ubah Data Pengeluaran</p>
        </div>
    </div>
    <div class="col-2 text-start">
        <a href="{{ route('finance.expenses.list', $finance->cabang->id) }}">
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
                <form action="{{ route('finance.expenses.update', $finance->id) }}" method="post">
                    @csrf
                    <input type="number" name="id_cabang" value="{{ $finance->cabang->id }}" hidden>
                    <div class="form-group">
                        <input type="text" class="form-control input-default " name="cabang"
                            value="{{ $finance->cabang }}" hidden>
                    </div>
                    <div class="form-group my-2">
                        <label>Jumlah Pengeluaran</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="text" class="form-control input-default " name="jumlah_pengeluaran" placeholder="Masukkan jumlah pengeluaran..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan"
                            placeholder="Masukkan keterangan..." required>{{ $finance->keterangan }}</textarea>
                    </div><br>
                    <button type="submit" class="btn btn-block btn-primary">Edit Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
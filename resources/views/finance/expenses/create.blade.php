@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Tambah Pengeluaran</p>
        </div>
    </div>
    <div class="col-2 text-start">
        <a href="{{ route('finance.expenses.index') }}">
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
                <form action="{{ route('finance.expenses.create') }}" method="post">
                    @csrf
                    <select class="form-select" aria-label="Default select example" name="cabang">
                        <option selected>Pilih Cabang</option>
                        <option value="Cabang Jember">Cabang Jember</option>
                        <option value="Cabang Kediri">Cabang Kediri</option>
                        <option value="Cabang Magelang">Cabang Magelang</option>
                        <option value="Cabang Deli Serdang">Cabang Deli Serdang</option>
                    </select>
                    <div class="form-group my-2">
                        <label>Jumlah Pengeluaran</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="text" class="form-control input-default " name="jumlah_pengeluaran" placeholder="Masukkan jumlah pengeluaran..." required>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" placeholder="Masukkan keterangan..." required></textarea>
                    </div><br>
                    <button type="submit" class="btn btn-block btn-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
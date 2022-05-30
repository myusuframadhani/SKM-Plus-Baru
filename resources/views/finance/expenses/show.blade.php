@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Detail Pengeluaran</p>
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
        <div class="card-body">
            <div class="basic-form">
                <form>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Cabang</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" value="{{ $finance->cabang->nama_cabang }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" value="{{ $finance->created_at }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jumlah Pengeluaran</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" value="Rp {{ number_format($finance->jumlah_pengeluaran) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea readonly class="form-control-plaintext" style="resize: none;">{{ $finance->keterangan }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
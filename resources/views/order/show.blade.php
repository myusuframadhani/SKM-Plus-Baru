@extends('layouts.appUser')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-3">
        <div class="welcome-text">
            <p class="text-black text-center fs-3 my-3 ms-4">Order Produk</p>
        </div>
    </div>
    <div class="col-7"></div>
    <div class="col-2 text-center">
        <a href="{{ route('order.index') }}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
</div>
<!-- row -->
<p class="my-4 ms-5 ps-5"><i class="fa-solid fa-house me-3"></i>Dashboard > Produk > <span class="fw-bolder">Cabang</span></p>
<div class="row mx-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">(Pilih cabang terdekat dari lokasi anda)</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table display text-muted" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th class="text-center">Nama Cabang</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cabang as $data)
                                <tr>
                                    <td class="text-center">{{ $data->nama_cabang }}</td>
                                    <td>
                                        <a href="{{ route('order.create', [$katalog->id, $data->id]) }}">
                                            <button type="button" class="btn btn-info bg-primary text-white">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
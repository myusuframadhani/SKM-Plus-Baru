@extends('layouts.app')

@section('content')
@php
    $user = auth()->user()
@endphp
<div class="row my-3 align-items-center">
    <div class="col-9">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Data Riwayat Transaksi</p>
        </div>
    </div>
    <div class="col-2 text-end">
        <a href="{{ route('admin.home',$user->id) }}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
</div>
<!-- row -->


<div class="row mx-3 text-center">
    <div class="col-12 ps-3 pe-5">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table display text-muted" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Nama Pembeli</th>
                                <th>Nama Produk</th>
                                <th>Cabang</th>
                                <th>Alamat</th>
                                <th>Pengiriman</th>
                                <th>Tanggal Pengambilan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($order as $data)
                                <tr>
                                    
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->katalog->nama_produk }}</td>
                                    <td>{{ $data->cabang->nama_cabang}}</td>
                                    <td>{{ $data->alamat}}</td>
                                    <td>{{ $data->pengiriman}}</td>
                                    <td>{{ $data->tanggal_pengambilan}}</td>
                                    <td>{{ $data->jumlah}}</td>
                                    <td>Rp {{ $data->jumlah * $data->katalog->harga_produk}}</td>
                                    <td class="text-capitalize">{{ $data->konfirmasi}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('transaksi.admin.showAdmin', $data->id) }}">
                                                <button type="button" class="btn btn-info bg-info me-2">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
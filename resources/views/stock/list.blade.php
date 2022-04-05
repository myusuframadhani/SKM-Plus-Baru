@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-8">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">List Stok Barang</p>
        </div>
    </div>
    <div class="col-2 text-end">
        <a href="{{ route('stock.index') }}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
    <div class="col-2 text-start">
        <a href="{{ route('stock.create', $cabang->id) }}">
            <button type="button" class="btn btn-primary bg-primary">
                Tambah
            </button>
        </a>
    </div>
</div>
<!-- row -->


<div class="row mx-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-hover display text-muted" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                                <th>Deskripsi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($stock as $data)
                                <tr>
                                    <td>{{ $data->katalog->nama_produk }}</td>
                                    <td>{{ ($data->jumlah > 0) ? $data->jumlah : 'Sold Out' }}
                                    </td>
                                    <td>{{ $data->katalog->deskripsi }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('stock.show', $data->id) }}">
                                                <button type="button" class="btn btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('stock.edit', $data->id) }}">
                                                <button type="button" class="btn btn-warning">
                                                    <i class="fa fa-pencil"></i>
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
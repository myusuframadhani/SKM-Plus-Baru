@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-7">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Data Pengeluaran</p>
        </div>
    </div>
    <div class="col-2 text-end">
        <a href="{{ route('finance.expenses.index') }}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
    <div class="col-3">
        <a href="{{ route('finance.expenses.create', $cabang->id) }}">
            <button type="button" class="btn bg-primary text-white">
                <i class="bi bi-plus-circle me-2"></i>Tambah Data
            </button>
        </a>
    </div>
</div>
<!-- row -->


<div class="row mx-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table display text-muted" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Cabang</th>
                                <th>Tanggal Transaksi</th>
                                <th>Jumlah Pengeluaran</th>
                                <th>Keterangan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($finance as $data)
                                <tr>
                                    <td>{{ $data->cabang->nama_cabang }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ number_format($data->jumlah_pengeluaran) }}</td>
                                    <td>{!! Str::limit($data->keterangan, 40) !!}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('finance.expenses.show', $data->id) }}">
                                                <button type="button" class="btn btn-info me-2">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('finance.expenses.edit', $data->id) }}">
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
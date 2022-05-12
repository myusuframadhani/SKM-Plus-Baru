@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-8">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Data Artikel</p>
        </div>
    </div>
    <div class="col-2 text-end">
        <a href="{{ route('admin.home') }}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
    <div class="col-2">
        <a href="{{ route('artikel.admin.create') }}">
            <button type="button" class="btn bg-primary text-white">
                <i class="bi bi-plus-circle me-2"></i>Tambah Artikel
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
                                <th>Judul Artikel</th>
                                <th>Tanggal Terbit</th>
                                <th>Tanggal Pembaruan</th>
                                <th>Author</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($artikel as $data)
                                <tr>
                                    <td>{{ $data->judul }}</td>
                                    <td>{{ $data->created_at->format('d-m-Y | H:i:s') }}</td>
                                    <td>{{ $data->updated_at->format('d-m-Y | H:i:s') }}</td>
                                    <td>{{ $data->author }}</td>
                                    <td class="fw-normal">{!! Str::limit($data->deskripsi, 15) !!}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('artikel.admin.show', $data->id) }}">
                                                <button type="button" class="btn btn-info me-2">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('artikel.admin.edit', $data->id) }}">
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
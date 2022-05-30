@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-8">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Rekap Keuangan</p>
        </div>
    </div>
    <div class="col-2 text-center">
        <a href="{{ route('admin.home') }}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
</div>
<!-- row -->


<div class="row mx-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">(Pilih cabang untuk melihat rekap keuangan)</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table display text-muted" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Nama Cabang</th>
                                <th>Alamat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cabang as $data)
                                <tr>
                                    <td>{{ $data->nama_cabang }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>
                                        <a href="{{ route('finance.report.cabang', $data->id) }}">
                                            <button type="button" class="btn btn-info">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
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
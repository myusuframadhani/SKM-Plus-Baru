@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Daftar Distributor</p>
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


<div class="row mx-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-hover display text-muted" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Nama Distributor</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($user as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email}}</td>
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
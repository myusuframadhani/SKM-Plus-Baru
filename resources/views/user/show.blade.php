@extends('layouts.appUser')
   
@section('content')
<div class="row mt-4">
    <div class="col-10">
        <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Detail Akun</p>
        </div>
    </div>
    @if($user->is_admin == '1')
        <div class="col-2 text-center">
            <a href="{{ route('admin.home',$user->id) }}">
                <button type="button" class="btn btn-outline-primary my-3">Kembali</button>
            </a>
        </div>
    @else
        <div class="col-2 text-center">
            <a href="{{ route('home',$user->id) }}">
                <button type="button" class="btn btn-outline-primary my-3">Kembali</button>
            </a>
        </div>
    @endif
</div>
    
<div class="container px-4 my-3">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Daftar</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $user->created_at }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4"></div>
    <div class="col-2 text-center">
        <a href="{{ route('user.edit',$user->id) }}">
            <button type="button" class="btn btn-primary btn-rounded bg-primary my-3">Edit Akun</button>
        </a>
    </div>
    <div class="col-2 text-start">
        <a href="{{ route('user.passEdit',$user->id) }}">
            <button type="button" class="btn btn-success btn-rounded bg-success my-3">Edit Password</button>
        </a>
    </div>
</div>
@endsection
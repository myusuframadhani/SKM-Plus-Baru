@extends('layouts.appUser')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <p class="my-4 ms-5 ps-5"><i class="fa-solid fa-house me-3"></i><a href="{{ route('home') }}">Dashboard</a> > <span><a href="{{ route('artikel.user.index') }}">Artikel</a></span> > <span class="fw-bolder">{{ $artikel->judul }}</span></p>
    </div>
    <div class="col-2 text-start">
        <a href="{{ route('artikel.user.index') }}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
</div>
<main class="container d-flex justify-content-center">
    <div style="width: 800px;">
        <p class="fw-bold fs-2 text-center text-capitalize">
            {{ $artikel->judul }}
        </p>
        <p class="fs-6 text-secondary text-center">
            {{ $artikel->author }} | {{ $artikel->updated_at->format('d-m-Y') }}
        </p>
        <p class="fs-6 my-4" style="margin: 0; text-indent: 4 rem; text-align: justify;">
            {!! $artikel->deskripsi !!}
        </p>
    </div>
</main>
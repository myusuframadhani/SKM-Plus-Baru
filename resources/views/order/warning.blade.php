@extends('layouts.appUser')

@section('content')
<div class="row align-items-center justify-content-center" style="height: 550px;">
    <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
        <div class="card-body text-center"><i class="fas fa-exclamation-triangle fs-1"></i></div>
        <div class="card-body text-center">
            <p class="card-text">Khusus untuk pembayaran tunai, silakan cek riwayat transaksi untuk mencetak invoice!</p>
        </div>
        <a href="{{ route('order.index') }}" class="p-3 mx-auto">
            <button type="button" class="btn btn-dark bg-dark">
                Selesai
            </button>
        </a>
    </div>
</div>
@endsection
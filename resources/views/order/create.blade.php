@extends('layouts.appUser')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-3"></div>
    <div class="col-7">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3">Pesan Produk</p>
        </div>
    </div>
    <div class="col-2 text-start">
        <a href="{{ route ('order.show', $katalog->id)}}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
</div>
<!-- row -->

<div class="col-xl-12 col-xxl-12 me-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                @php
                    $user = auth()->user()
                @endphp
                <div class="col-3"></div>
                <div class="col-6 p-5 border border-2">
                    @if($message = Session::get('success'))
                        <div class="mt-4 mb-0 mx-4 alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ $message }}
                        </div>
                    @elseif($message = Session::get('error'))
                        @foreach($message as $msg)
                        <div class="mt-4 mb-0 mx-4 alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ $msg }}
                        </div>
                        @endforeach 
                    @endif
                    <div class="basic-form">
                        <form action="{{ route('order.store', [$katalog->id, $cabang->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="number" name="id_user" value="{{ $user->id }}" hidden>
                            <input type="number" name="id_cabang" value="{{ $cabang->id }}" hidden>
                            <input type="number" name="id_produk" value="{{ $katalog->id }}" hidden>
                            <input type="number" name="id_stok" value="{{ $stock->id }}" hidden>
                            <label class="mb-2">Metode Pembayaran</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="metode_pembayaran" id="flexRadioDefault1" value="Transfer">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Transfer
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="metode_pembayaran" id="flexRadioDefault2" value="Tunai">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Tunai
                                </label>
                            </div>
                            <div class="form-group my-2">
                                <label>Pengiriman</label>
                                <select class="form-select" name="pengiriman">
                                    <option value="Dikirim">Dikirim</option>
                                    <option value="Ambil di tempat">Ambil Di Tempat</option>
                                </select>
                            </div>
                            <div class="form-group my-2">
                                <label>Alamat</label>
                                <input type="text" class="form-control input-default" name="alamat" placeholder="Masukkan alamat..." required>
                            </div>
                            <div class="form-group my-2">
                                <label>Tanggal Pengambilan</label>
                                <input type="date" class="form-control input-default" name="tanggal_pengambilan" required>
                            </div>
                            <div class="form-group my-2">
                                <label>Jumlah Pesanan</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="jumlah" id="jumlah" onkeyup="myFunction(this.value);" required>
                                    <span class="input-group-text" id="basic-addon2">pcs</span>
                                </div>
                            </div>
                            <div class="form-group my-4">
                                <label class="fw-bold fs-4">Total Harga</label>
                                <span class="fw-bold fs-4">Rp <input class="fw-bold fs-4" name="total" id="total_harga" type="text" readonly></span>
                            </div>
                            
                            <div class="col my-2">
                                <label>Bukti Pembayaran</label>
                                <p class="fs-6 text-secondary my-2"><span class="text-danger">* </span>Masukkan bukti pembayaran jika metode pembayaran menggunakan "transfer"</p>
                                <input type="file" name="bukti_transaksi" class="form-control">
                            </div>
                            <br>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-block btn-primary bg-primary px-3"><i class="fa-solid fa-cart-shopping me-2"></i>Beli</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{ route('order.warning')}}" class="mx-auto"><button class="rounded btn-outline-primary px-3 py-2">Lanjutkan</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function myFunction(value) {
        var jumlah;
        jumlah = value * 3000;
        
        document.getElementById('total_harga').value = jumlah;
    }
</script>
@endsection
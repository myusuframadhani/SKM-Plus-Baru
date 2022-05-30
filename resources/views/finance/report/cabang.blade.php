@extends('layouts.app')

@section('content')
<div class="row my-3 align-items-center">
    <div class="col-10">
    <div class="welcome-text">
            <p class="text-black text-start fs-3 my-3 ms-4">Rekap Keuangan</p>
        </div>
    </div>
    <div class="col-2 text-center">
        <a href="{{ route('finance.report.index') }}">
            <button type="button" class="btn btn-outline-primary">
                Kembali
            </button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <!-- input periode -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pilih Periode Rekap Keuangan</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('finance.report.cabangPeriode', $cabang->id) }}" method="post">
                        @csrf
                        <input type="number" name="id_cabang" value="{{ $cabang->id }}" hidden>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Bulan (Pilih satu):</label>
                                    <select class="form-control" id="sel1" name="month">
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="number" class="form-control input-default " name="year"
                                        placeholder="Masukkan tahun rekap..." maxlength="4" value="2000" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary my-3">Lihat Rekap Keuangan</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- list report -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Laporan Bulan {{ $monthName }} {{ $year }}</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Penjualan</td>
                                <td>Rp {{ number_format($totalSale) }}</td>
                            </tr>
                            <tr>
                                <td>Pengeluaran</td>
                                <td>Rp {{ number_format($totalExpense) }}</td>
                            </tr>
                            <tr>
                                <td>Pendapatan Bersih</td>
                                <td>
                                    @if($totalAll > 0)
                                        <div class="text-success">Rp + {{ number_format($totalAll) }}</div>
                                    @elseif($totalAll < 0)
                                        <div class="text-danger">Rp {{ number_format($totalAll) }}</div>
                                    @else
                                        <div>Rp {{ number_format($totalAll) }}</div>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
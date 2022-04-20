<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    // User
    public function index()
    {   
        $order = \App\Models\Order::all();
        return view('transaksi.user.index',compact('order'));
    }

    public function show($id)
    {
        $order = \App\Models\Order::findOrFail($id);
        return view('transaksi.user.show',compact('order'));
    }

    public function invoice($id)
    {
        $order = \App\Models\Order::findOrFail($id);
        return view('transaksi.user.invoice',compact('order'));
    }
    
    // Admin

    public function indexAdmin()
    {   
        $order = \App\Models\Order::all();
        return view('transaksi.admin.index',compact('order'));
    }

    public function showAdmin($id)
    {
        $order = \App\Models\Order::findOrFail($id);
        return view('transaksi.admin.show',compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = \App\Models\Order::findOrFail($id);
        $input = $request->all();

        $dataUpdate = [
            'konfirmasi' => $request->konfirmasi,
        ];
        $order->update($dataUpdate);
        return back()->with('success', 'Berhasil memperbarui status pembelian');
    }
}

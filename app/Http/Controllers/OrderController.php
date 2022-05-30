<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $katalog = \App\Models\Katalog::all();
        return view('order.index',compact('katalog'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $katalog = \App\Models\Katalog::findOrFail($id);  
        $order = \App\Models\Order::where("id_produk", $katalog->id)->get();
        $stock = \App\Models\Stock::where("id_produk", $katalog->id)->get();
        $cabang = \App\Models\Cabang::all();
        return view('order.show',compact('katalog', 'order', 'stock', 'cabang'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id,$cabang)
    { 
        $katalog = \App\Models\Katalog::findOrFail($id);  
        $cabang = \App\Models\Cabang::findOrFail($cabang);
        $stock = \App\Models\Stock::where("id_cabang", $cabang->id)->get();
        $stock = \App\Models\Stock::findOrFail($id);
        $order = \App\Models\Order::where("id_cabang", $cabang->id)->get();
        $order = \App\Models\Order::where("id_stok", $stock->id)->get();
        return view('order.create',compact('katalog', 'cabang', 'stock', 'order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $cabang)
    {   
        $user = auth()->user();
        $input = $request->all();
        $stock = \App\Models\Stock::findOrFail($id);

        $dataValidator = [
            'id_user' => 'required|numeric',
            'id_cabang' => 'required|numeric',
            'id_produk' => 'required|numeric',
            'id_stok' => 'required|numeric',
            'metode_pembayaran' => 'required',
            'pengiriman' => 'required',
            'alamat' => 'required|string',
            'tanggal_pengambilan' => 'required',
            'jumlah' => 'required|integer',
            'bukti_transaksi' => 'image|file',
            'konfirmasi' => 'string'
        ];
        $validator = Validator::make($input,$dataValidator);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }
        
        // count new amount
        $jumlah_baru = $stock->jumlah - $request->jumlah;

        // validate new amount
        if($jumlah_baru > $stock->jumlah) {
            return back()->with('error', ['Stok tidak mencukupi!']);
        }

        $dataUpdate = [
            'id' => $stock->id,
            'jumlah' => $jumlah_baru,
        ];
        $stock->update($dataUpdate);
        
        $dataCreate = [
            'id_user' => $user->id,
            'id_cabang' => $request->id_cabang,
            'id_produk' => $request->id_produk,
            'id_stok' => $request->id_stok,
            'metode_pembayaran' => $request->metode_pembayaran,
            'pengiriman' => $request->pengiriman,
            'alamat' => $request->alamat,
            'tanggal_pengambilan' => $request->tanggal_pengambilan,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
            'bukti_transaksi' => $request->file('bukti_transaksi')->store('bukti_transaksi'),
            'konfirmasi' => 'menunggu'
        ];
        $order = \App\Models\Order::create($dataCreate);

        return back()->with('success', 'Berhasil membeli produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function warning()
    {
        return view('order.warning');
    }    
}

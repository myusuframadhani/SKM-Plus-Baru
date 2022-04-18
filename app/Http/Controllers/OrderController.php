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
        $cabang = \App\Models\Cabang::all();
        return view('order.show',compact('katalog', 'order', 'cabang'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cabang = \App\Models\Cabang::findOrFail($id);
        $stock = \App\Models\Stock::where("id_cabang", $cabang->id)->get();
        return view('order.show',compact('cabang', 'stock'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $user = auth()->user();
        $input = $request->all();

        $dataValidator = [
            'id_cabang' => 'required|numeric',
            'id_produk' => 'required|numeric',
            'id_stok' => 'required|numeric',
            'metode_pembayaran' => 'required',
            'alamat' => 'required|string',
            'jumlah' => 'required|integer',
            'bukti_transaksi' => 'image|file',
        ];
        $validator = Validator::make($input,$dataValidator);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }
        
        $dataCreate = [
            'id_cabang' => $request->id_cabang,
            'id_produk' => $request->id_produk,
            'id_stok' => $request->id_stok,
            'metode_pembayaran' => $request->metode_pembayaran,
            'alamat' => $request->alamat,
            'jumlah' => $request->jumlah,
            'bukti_transaksi' => $request->file('image')->store('bukti_transaksi'),
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
    public function nota($id)
    {
        $order = \App\Models\Order::findOrFail($id);
        return view('order.nota',compact('nota'));
    }    
}

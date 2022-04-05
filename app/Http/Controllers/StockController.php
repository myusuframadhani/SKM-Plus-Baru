<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabang = \App\Models\Cabang::all();
        return view('stock.index',compact('cabang'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list($id)
    {
        $cabang = \App\Models\Cabang::findOrFail($id);
        $stock = \App\Models\Stock::where("id_cabang", $cabang->id)->get();
        return view('stock.list',compact('cabang','stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cabang = \App\Models\Cabang::findOrFail($id);
        $katalog = \App\Models\Katalog::all();
        return view('stock.create',compact('cabang','katalog'));
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
        ];
        $validator = Validator::make($input,$dataValidator);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }

        // check if stock is exist
        $stock = \App\Models\Stock::where("id_cabang", $request->id_cabang)->get();
        foreach($stock as $data) {
            if($data->id_produk == $request->id_produk) {
                return back()->with('error', ['Gagal, Stok sudah ada!']);
            }
        }
        
        $dataCreate = [
            'id_cabang' => $request->id_cabang,
            'id_produk' => $request->id_produk,
            'jumlah' => 0,
        ];
        $stock = \App\Models\Stock::create($dataCreate);

        $katalog = \App\Models\Katalog::findOrFail($request->id_produk);
        $dataHistory = [
            'user_id' => $user->id,
            'deskripsi' => 'Menambah data stok '. $katalog->nama_produk,
        ];
        $history = \App\Models\History::create($dataHistory);
        
        return back()->with('success', 'Berhasil menambahkan data stok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = \App\Models\Stock::findOrFail($id);
        return view('stock.show',compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = \App\Models\Stock::findOrFail($id);
        return view('stock.edit',compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        $stock = \App\Models\Stock::findOrFail($id);
        $input = $request->all();

        $dataValidator = [
            'id_produk' => 'required|numeric',
            'jumlah_sebelum' => 'required|numeric|gte:0',
            'jumlah' => 'required|numeric',
        ];
        $validator = Validator::make($input,$dataValidator);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }

        // count new amount
        $jumlah_baru = $request->jumlah_sebelum + $request->jumlah;

        // validate new amount
        if($jumlah_baru < 0) {
            return back()->with('error', ['Hasil jumlah stok tidak boleh minus']);
        }

        $dataUpdate = [
            'id_produk' => $request->id_produk,
            'jumlah' => ($request->jumlah == 0) ? $request->jumlah_sebelum : $jumlah_baru,
        ];
        $stock->update($dataUpdate);

        // history
        $katalog = \App\Models\Katalog::findOrFail($request->id_produk);
        // if not change price
        $dataHistory = [
            'user_id' => $user->id,
            'deskripsi' => 'Mengubah data stok '. $katalog->nama_produk .
                                '<br> - stok: '. $jumlah_baru,
        ];
        // if change price
        $dataHistory = [
            'user_id' => $user->id,
            'deskripsi' => 'Mengubah data stok '. $katalog->nama_produk .
                                '<br> - stok: '. $jumlah_baru ,
        ];
        $history = \App\Models\History::create($dataHistory);
        return back()->with('success', 'Berhasil memperbarui data stok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
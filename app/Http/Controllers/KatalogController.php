<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $katalog = \App\Models\Katalog::all();
        return view('katalog.index',compact('katalog'));
    }

    public function create()
    {
        $katalog = \App\Models\Katalog::all();
        return view('katalog.create',compact('katalog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $dataValidator = [
            'nama_produk' => 'required|string',
            'harga_produk' => 'required|integer',
            'gambar' => 'required|image|file',
            'deskripsi_produk' => 'required|string',
        ];
        $validator = Validator::make($input,$dataValidator);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }

        $dataCreate = [
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'gambar' => $request->file('image')->store('product'),
            'deskripsi_produk' => $request->deskripsi_produk,
        ];

        $katalog = \App\Models\Katalog::create($dataCreate);
        return back()->with('success', 'Berhasil menambahkan data produk');
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
        return view('katalog.show',compact('katalog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $katalog = \App\Models\Katalog::findOrFail($id);
        return view('katalog.edit',compact('katalog'));
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
        $katalog = \App\Models\Katalog::findOrFail($id);
        $input = $request->all();

        $dataValidator = [
            'nama_produk' => 'required|string',
            'harga_produk' => 'required|integer',
            'gambar' => 'image|file',
            'deskripsi_produk' => 'required|string',
        ];
        $validator = Validator::make($input,$dataValidator);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }

        $dataUpdate = [
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'gambar' => $request->file('image')->store('product'),
            'deskripsi_produk' => $request->deskripsi_produk,
        ];
        $katalog->update($dataUpdate);
        return back()->with('success', 'Berhasil memperbarui data produk');
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
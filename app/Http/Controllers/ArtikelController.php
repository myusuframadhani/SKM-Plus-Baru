<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = \App\Models\Artikel::all();
        return view('artikel.user.index',compact('artikel'));
    }
    
    public function indexAdmin()
    {
        $artikel = \App\Models\Artikel::all();
        return view('artikel.admin.index',compact('artikel'));
    }

    public function create()
    {
        $artikel = \App\Models\Artikel::all();
        return view('artikel.admin.create',compact('artikel'));
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
            'judul' => 'required|string',
            'author' => 'required|string',
            'deskripsi' => 'required|string',
        ];
        $validator = Validator::make($input,$dataValidator);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }

        $dataCreate = [
            'judul' => $request->judul,
            'author' => $request->author,
            'deskripsi' => $request->deskripsi,
        ];

        $artikel = \App\Models\Artikel::create($dataCreate);
        return back()->with('success', 'Berhasil menambahkan artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = \App\Models\Artikel::findOrFail($id);
        return view('artikel.user.show',compact('artikel'));
    }
    
    public function showAdmin($id)
    {
        $artikel = \App\Models\Artikel::findOrFail($id);
        return view('artikel.admin.show',compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = \App\Models\Artikel::findOrFail($id);
        return view('artikel.admin.edit',compact('artikel'));
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
        $artikel = \App\Models\Artikel::findOrFail($id);
        $input = $request->all();

        $dataValidator = [
            'judul' => 'required|string',
            'author' => 'required|string',
            'deskripsi' => 'required|string',
        ];
        $validator = Validator::make($input,$dataValidator);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }

        $dataUpdate = [
            'judul' => $request->judul,
            'author' => $request->author,
            'deskripsi' => $request->deskripsi,
        ];
        $artikel->update($dataUpdate);
        return back()->with('success', 'Berhasil memperbarui artikel');
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
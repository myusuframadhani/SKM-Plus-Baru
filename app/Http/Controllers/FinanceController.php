<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $cabang = \App\Models\Cabang::all();
        return view('finance.expenses.index',compact('cabang'));
    }
    
    public function list($id)
    {
        $cabang = \App\Models\Cabang::findOrFail($id);
        $finance = \App\Models\Finance::where("id_cabang", $cabang->id)->get();
        return view('finance.expenses.list',compact('cabang','finance'));
    }

    public function create($id)
    {
        $cabang = \App\Models\Cabang::findOrFail($id);
        return view('finance.expenses.create',compact('cabang'));
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
    public function store(Request $request, $id)
    {
        $input = $request->all();
        $user = auth()->user();

        $dataValidator = [
            'jumlah_pengeluaran' => 'required|integer',
            'keterangan' => 'required|string',
        ];
        $validator = Validator::make($input,$dataValidator);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }

        $dataCreate = [
            'id_cabang' => $request->id_cabang,
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
            'keterangan' => $request->keterangan,
        ];

        $finance = \App\Models\Finance::create($dataCreate);
        return back()->with('success', 'Berhasil menambahkan data pengeluaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $finance = \App\Models\Finance::findOrFail($id);
        return view('finance.expenses.show',compact('finance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finance = \App\Models\Finance::findOrFail($id);
        return view('finance.expenses.edit',compact('finance'));
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
        $finance = \App\Models\Finance::findOrFail($id);
        $input = $request->all();

        $dataValidator = [
            'jumlah_pengeluaran' => 'required|integer',
            'keterangan' => 'required|string',
        ];
        $validator = Validator::make($input,$dataValidator);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }

        $dataUpdate = [
            'id_cabang' => $request->id_cabang,
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
            'keterangan' => $request->keterangan,
        ];
        $finance->update($dataUpdate);
        return back()->with('success', 'Berhasil memperbarui data pengeluaran');
    }
}

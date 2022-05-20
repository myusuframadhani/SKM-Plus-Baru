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
    
    public function expenses()
    {
        $finance = \App\Models\Finance::all();
        return view('finance.expenses.index',compact('finance'));
    }
    
    public function create()
    {
        $finance = \App\Models\Finance::all();
        return view('finance.expenses.create',compact('finance'));
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
            'jumlah_pengeluaran' => 'required|integer',
            'keterangan' => 'required|string',
        ];
        $validator = Validator::make($input,$dataValidator);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }

        $dataCreate = [
            'cabang' => $request->cabang,
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
            'cabang' => $request->cabang,
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
            'keterangan' => $request->keterangan,
        ];
        $finance->update($dataUpdate);
        return back()->with('success', 'Berhasil memperbarui data pengeluaran');
    }




    public function report()
    {
        $finance = \App\Models\Finance::all();
        return view('finance.report',compact('finance'));
    }
}

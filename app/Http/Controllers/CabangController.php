<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
    {
        $cabang = \App\Models\Cabang::where('id', '!=', 1)->get();
        return view('cabang.index',compact('cabang'));
    }
    
    public function show($id)
    {
        $cabang = \App\Models\Cabang::findOrFail($id);
        return view('cabang.show',compact('cabang'));
    }
}

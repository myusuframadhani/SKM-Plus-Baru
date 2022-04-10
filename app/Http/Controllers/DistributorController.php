<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $user = \App\Models\User::where('is_admin',0)->get();
        return view('distributor.index',compact('user'));
    }
}

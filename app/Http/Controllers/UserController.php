<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('user.show',compact('user'));
    }

    public function edit($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('user.edit',compact('user'));
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
        $user = \App\Models\User::findOrFail($id);
        $input = $request->all();

        $dataValidator = [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,'.$user->id,
            'password' => 'required|string',
        ];
        $validator = Validator::make($input,$dataValidator);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }

        // check password
        if(Hash::check($request->password, $user->password)) {
            $dataUpdate = [
                'name' => $request->name,
                'email' => $request->email,
            ];
            $user->update($dataUpdate);
            return back()->with('success', 'Berhasil memperbarui data akun');
        }
        else {
            return back()->with('error', ['Password kamu salah!']);
        }        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function passEdit($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('user.passEdit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function passUpdate(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $input = $request->all();

        $dataValidator = [
            'old_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ];
        $validator = Validator::make($input,$dataValidator);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }

        // check old password
        if(Hash::check($request->old_password, $user->password)) {
            $dataUpdate = [
                'password' => bcrypt($request->password),
            ];
            $user->update($dataUpdate);
            return back()->with('success', 'Berhasil memperbarui password');
        }
        else {
            return back()->with('error', ['Password lama kamu salah!']);
        }

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

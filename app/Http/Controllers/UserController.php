<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }


    public function store()
    {
        // return "Succesfully create new user";
        return response()->json([
            'message'   => 'Registration successful.'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
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
        //validasi
        $this->validate($request, [
            'id' => 'required|max:5',
            'name'=> 'required',
            'email' => 'required|email',
            'jabatan' => 'required',
            'password' => 'min:8|required_with:password_confirmation|
                           same:password_confirmation',
            'password_confirmation' => 'required',
            'file_foto'=>'required',
        ]);
        $foto = $request->file('file_foto');
        //membaca extensi file gambar
        $ext = $request->file('file_foto')->getClientOriginalExtension();
        //memberi file menggunakan id
        $namaFile = $request->id.'.'.$ext;
        //menyimpan ke folder public/foto/...
        $request->file('file_foto')->move('foto', $namaFile);
        $user = User::findOrFail($id)->update(
            [
                'id' => $request->id,
                'name' => $request->name,
                'email' => $request->email,
                'jabatan' => $request->jabatan,
                'password' => $request->password,
                'file_foto' => $namaFile
            ]
        );
        return redirect()->route('user.index')
        ->with('message', 'User berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Succesfully delete user with id $id"; 
    }
}

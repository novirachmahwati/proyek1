<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LuasPPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persegi_panjang = DB::table('luas_persegi_panjang')->orderByDesc('id')->get();
        return view('persegi_panjang.index', ['persegi_panjang' => $persegi_panjang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persegi_panjang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'panjang' => 'required',
            'lebar' => 'required'
            ]);
            
        $panjang = $request->panjang;
        $lebar = $request->lebar;
        $luas = $panjang * $lebar;

        $PP = DB::table('luas_persegi_panjang')->insert(
            ['panjang'=> $panjang,
             'lebar'  => $lebar,
             'luas'   => $luas
            ]);
        return redirect()->route('luas-persegi-panjang.index')
        ->with('message','Hasil perhitungan luas persegi panjang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

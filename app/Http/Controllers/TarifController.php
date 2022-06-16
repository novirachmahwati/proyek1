<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Tarif;
class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarif = Tarif::find(1);
        return response()->json([
            'data' => $tarif,
            'message' => "Data tarif berhasil ditampilkan"
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarif = new Tarif;
        $tarif->kota_asal = $request->kota_asal;
        $tarif->kota_tujuan = $request->kota_tujuan;
        $tarif->tarif = $request->tarif;
        try {
            $tarif->save();
        }catch (\Illuminate\Database\QueryException $e) {
            return "Ada kesalahan = ".$e->getMessage();
        }
        return "Data berhasil tersimpan";
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

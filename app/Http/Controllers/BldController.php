<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BldController extends Controller
{
    public function haloAkakom()
    {
        return View::make('bld.haloAkakom')
        ->with('nama','STMIK AKAKOM Yogyakarta');
    }

    public function loopFor()
    {
        return View::make('bld.loop');
    }

    public function bacaTabel()
    {
        $kota=\App\models\Kota::all();
        return View::make('bld.bacaTabel')->with('kota',$kota);
    }

    public function bacaTabel0()
    {
        $djual =
            \Illuminate\Support\Facades\DB::table('detail_jual as d')
            ->join('barang as b', 'd.barang_id', '=', 'b.id')
            ->select('d.barang_id','b.nama_barang','b.stok','b.satuan',
            'd.jumlah','d.harga')
            ->selectRaw('d.jumlah * d.harga as total')
            ->get();

        return View::make('bld.bacaTabel0')->with('djual',$djual);
    }

    public function bacaTabel1(Request $request)
    {
        $djual =
            \Illuminate\Support\Facades\DB::table('detail_jual as d')
            ->join('barang as b', 'd.barang_id', '=', 'b.id')
            ->select('d.barang_id as barang_id','b.nama_barang','b.satuan',
            'd.jumlah','d.harga')
            ->selectRaw('d.jumlah * d.harga as total')
            // ->selectRaw('SUM(total) as sum')
            ->where('d.jual_id',$request->jual_id)
            // ->groupBy('d.jual_id')
            ->get();

        return View::make('bld.bacaTabel1')
            ->with(['djual'=>$djual,
                    'no_nota'=>$request->jual_id]);
    }

    public function cetakNota()
    {
        return view('bld.CetakNota');
    }
}

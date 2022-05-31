<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Propinsi;
use App\models\Kota;
use Illuminate\Support\Facades\Gate;

class KotaController extends Controller
{
    public function gate()
    {
        $kota = Kota::find(2);
        if (Gate::allows('baca', $kota)){
            echo "ID User : ".\Auth::user()->id."<br>";
            echo "Nama User : ".\Auth::user()->name."<br>" ;
            echo "Akses membaca tabel kota diijinkan";
        } else {
        echo "ID User : ".\Auth::user()->id."<br>";
        echo "Nama User : ".\Auth::user()->name."<br>";
        echo "Akses membaca tabel kota tidak diijinkan";
        }
        exit;
    }
    public function index()
    {
        $kota = Kota::orderBy('id', 'DESC')->paginate(5);
        return view('kota.index', compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propinsi = Propinsi::all();
        return view('kota.create', compact('propinsi'));
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
            'propinsi_id' => 'required',
            'nama_kota' => 'required'
            ]);
        $kota = Kota::create($request->all());
        return redirect()->route('kota.index')->with('message',
        'Kota baru berhasil ditambahkan!');
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
        $kota = Kota::findOrFail($id);
        $propinsi = Propinsi::all();
        return view('kota.edit', compact('kota', 'propinsi'));
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
        $this->validate($request, [
            'propinsi_id' => 'required',
            'nama_kota' => 'required'
        ]);
        $kota = Kota::findOrFail($id)->update($request->all());
        return redirect()->route('kota.index')
        ->with('message', 'Kota baru berhasil diubah!');
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

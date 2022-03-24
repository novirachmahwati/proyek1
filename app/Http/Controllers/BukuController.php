<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Penerbit;
use App\models\Buku;
use Illuminate\Database\Eloquent\Builder;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::with('getPenerbit')
        ->get();
        return view('buku.index', compact('buku'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $buku = Buku::with('getPenerbit')
        ->where('judul','like',"%".$search."%")->get();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerbit = Penerbit::all();
        return view('buku.create', compact('penerbit'));
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
            'judul' => 'required',
            'tahun_terbit' => 'required',
            'id_penerbit' => 'required',
            'pengarang' => 'required',
            'jumlah_hal' => 'required',
            'sampul' => 'required'
        ]);
        $buku = new Buku($request->all());

        $buku->save();
        return redirect()->route('buku.create')->with('message',
        'Buku baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
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

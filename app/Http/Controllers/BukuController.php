<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Penerbit;
use App\models\Buku;
use Illuminate\Support\Facades\DB;
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

    public function insertData()
    {
    $br= DB::table('buku')->insert(
        ['id'=>11,
        'judul'=>'Sagaras',
        'tahun_terbit'=>'2022',
        'id_penerbit'=>1,
        'pengarang'=>'Tere Liye',
        'jumlah_hal'=>384,
        'sampul'=>'Soft Cover']);
    echo "Berhasil menyimpan ". $br." rekaman";
    }

    public function updateData()
    {
        $jumlah_hal=410;
        $br=DB::table('buku')->where('id',11)
        ->update(['jumlah_hal'=>$jumlah_hal]);
        echo "Berhasil mengubah ". $br." rekaman";
    }

    public function deleteData()
    {
        $br=DB::table('buku')->where('id',11)->delete();
        echo "Berhasil menghapus ". $br." rekaman";
    }

    public function joinData()
    {
        $buku=DB::table('buku')
        ->join('penerbit', 'buku.id_penerbit', '=', 'penerbit.id')
        ->select('buku.id', 'buku.judul', 'buku.pengarang', 
                 'buku.tahun_terbit', 'penerbit.penerbit')
        ->get();
        return view('db.join', ['buku' => $buku]);
    }
}

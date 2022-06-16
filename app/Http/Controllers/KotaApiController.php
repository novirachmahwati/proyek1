<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Kota;
use App\models\Propinsi;
use Illuminate\Support\Facades\DB;

//menyediakan api
class KotaApiController extends Controller
{
    /********************************************
    Method memberi layanan pembacaan semua rekaman
    @return objek
    *********************************************/
    public function index()
    {
        $kota = DB::table('kota')
        ->join('propinsi', 'kota.propinsi_id', '=',
        'propinsi.id')
        ->select('kota.id','kota.nama_kota','propinsi.propinsi')
        ->orderBy('propinsi.propinsi')
        ->get();
        return $kota;
    }

    /********************************************
    untuk pengisian dropDownlist propinsi
    @return objek
    *********************************************/
    public function propinsi()
    {
        $propinsi = DB::table('propinsi')
        ->select('id','propinsi')
        ->orderBy('propinsi')
        ->get();
        return $propinsi;
    }

    /********************************************
    Menambahkan rekaman baru
    @return String
    *********************************************/
    public function create(Request $request)
    {
        $kota = new Kota;
        $kota->propinsi_id = $request->propinsi_id;
        $kota->nama_kota = $request->nama_kota;
        $kota->user_id = $request->user_id;
        try {
            $kota->save();
        }catch (\Illuminate\Database\QueryException $e) {
            return "Ada kesalahan = ".$e->getMessage();
        }
        return "Data sudah tersimpan";
    }

    /********************************************
    Menampilkan 1 rekaman
    @return objek
    *********************************************/
    public function show($id)
    {
        $kota = DB::table('kota')
        ->join('propinsi', 'kota.propinsi_id', '=',
        'propinsi.id')
        ->select('kota.id','kota.nama_kota','propinsi.propinsi')
        ->where('kota.id',$id)
        ->first();
        return json_encode($kota);
    }

    /********************************************
    untuk mengubah rekaman
    @param Request
    @param $id integer
    @return String
    *********************************************/
    public function update(Request $request, $id)
    {
        // simpan
        $kota = Kota::find($id);
        $kota->propinsi_id = $request->propinsi_id;
        $kota->nama_kota = $request->nama_kota;
        try {
            $kota->save();
        }catch (\Illuminate\Database\QueryException $e) {
            return "Ada kesalahan = ".$e->getMessage();
        }
        return "Kota sudah diubah";
    }

    /********************************************
     * untuk menghapus rekaman
    @param $id integer
    @return String
    *********************************************/
    public function delete($id)
    {
        $kota = Kota::find($id);
        $kota->delete();
        return "Kota telah dihapus";
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    public function bacaDb1()
    {
        $kota = DB::table('kota')->get();
        return view('db.bacaDb1', ['kota' => $kota]);
    }

    public function bacaDb2()
    {
        $kota = DB::table('kota')->where('nama_kota','Surabaya')
        ->first();
        echo $kota->id."->";
        echo $kota->nama_kota;
    }

    public function bacaDb3()
    {
        $hargaMaks = DB::table('barang')->max('harga');
        //harga rata3 fungsi aggregate avg(), dengan jenis_id=1
        $hargaRata2 = DB::table('barang')
        ->where('jenis_id','1')
        ->avg('harga');
        //harga minimal/fungsi aggregate min(), dengan jenis_id=1
        $hargaMin = DB::table('barang')
        ->where('jenis_id','1')
        ->min('harga');
        //harga maksimal/fungsi aggregate max(), dengan jenis_id=1
        $hargaMax = DB::table('barang')
        ->where('jenis_id','1')
        ->max('harga');
        // harga x stok
        $jumHarga = DB::table('barang')
        ->where('jenis_id','1')
        ->sum(DB::raw('stok*harga'));
        //membaca rekaman memilih kolon memilih id, nama_barang,
        //satuan, stok//
        $barang = DB::table('barang')
        ->select('id','nama_barang','satuan','stok')
        ->get();
        //membaca semua rekaman semua kolom
        $barang = DB::table('barang')->select('*')->get();
        //membaca rekaman menggunakan DISTINCT
        $barang = DB::table('barang')
        ->select('jenis_id')
        ->distinct('jenis_id')
        ->get();
        //menjumlahkan per kelompk jenis barang
        $barang = DB::table('barang')
        ->select('jenis_id',DB::raw('count(*) as jumlah'))
        ->groupBy('jenis_id')
        ->get();
        //membaca jenis_id, dan harga * stok
        $jumHarga=DB::table('barang')
        ->where('jenis_id','1')
        ->sum(DB::raw('stok*harga'));
        //membaca rekaman memilih kolon memilih id, nama_barang,
        //satuan, stok//
        //dan harga * stok jenis barang=1
        $barang = DB::table('barang')
        ->select('id','nama_barang','stok','satuan','harga')
        ->selectRaw('stok * harga as total')
        ->where('jenis_id',1)
        ->get();
    }

    public function insertData()
    {
    $br= DB::table('barang')->insert(
        ['id'=>10021,
        'jenis_id'=>2,
        'nama_barang'=>'Tepung Trigu',
        'satuan'=>'Kg',
        'harga'=>5000,
        'stok'=>10,
        'user_id'=>1]);
    echo "Berhasil menyimpan ". $br." rekaman";
    }

    public function updateData()
    {
        $stok=100;
        $br=DB::table('barang')->where('id',10021)
        ->update(['stok'=>$stok]);
        echo "Berhasil mengubah ". $br." rekaman";
    }

    public function deleteData()
    {
        $br=DB::table('barang')->where('id',10021)->delete();
        echo "Berhasil menghapus ". $br." rekaman";
    }
}

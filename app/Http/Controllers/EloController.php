<?php

namespace App\Http\Controllers;

use App\models\Penerbit;
use App\models\Buku;
use Illuminate\Http\Request;

class EloController extends Controller
{
    public function bacaAll()
    {
        $brs = \App\Models\Kota::all();
        echo "<table border='1'><tr><th>Id</th>
            <th>Nama Kota</th></tr>";

        foreach ($brs as $abrs)
        {
            echo "<tr><td>$abrs->id</td><td>
            $abrs->nama_kota</td></tr>";
        }

        echo "</table>";
    }
    
    public function bacaAllRelasi()
    {
        $brs = \App\Models\Kota::all();
        echo "<table border='1'><tr><th>Id</th><th>Nama Kota</th>
                                    <th>Propinsi</th>
                                </tr>";
        foreach ($brs as $abrs)
        {
            echo "<tr><td>".$abrs->id."</td>";
            echo "<td>".$abrs->nama_kota."</td>";
            echo "<td>".$abrs->getPropinsi->propinsi."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function eloSave()
    {
        $prop = new \App\models\Propinsi;
        $prop->id=4;
        $prop->propinsi="Jawa Barat";
        try{
        $prop->save();
        } catch (\Illuminate\Database\QueryException $e) {
            //menampilkan kesalahan
            echo $e->getMessage();
        }
        echo "Proses Menyimpan Berhasil";
    }

    public function eloUpdate()
    {
        $prop =\App\models\Propinsi::find(4);
        $prop->propinsi="Banten";
        try{
            $prop->save();
        } catch (\Illuminate\Database\QueryException $e) {
            //menampilkan kesalahan
            echo $e->getMessage();
        }
        echo "Proses Mengubah Berhasil";
    }

    public function eloDelete()
    {
        $prop =\App\models\Propinsi::find(4);
        try{
            $prop->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            //menampilkan kesalahan
            echo $e->getMessage();
        }
        echo "Proses Menghapus Berhasil";
    }

    public function create()
    {
        $penerbit = Penerbit::all();
        return view('buku.create', compact('penerbit'));
    }

    public function penerbitSave()
    {
        $array = array(array('id' => '6', 'penerbit'=> 'Yudhistira', 'alamat'=> 'Jl. Kutisari Besar No.3, Siwalankerto, Kec. Wonocolo, Kota SBY, Jawa Timur 60236', 'telepon'=> '(031) 8482356', 'e_mail'=> 'yudhistira@gmail.com'), 
        array('id' => '7', 'penerbit'=> 'Andi Publishers', 'alamat'=> 'Jl. Dharmahusada Indah Selatan III D19 Mulyorejo, Kota SBY, Jawa Timur 60115', 'telepon'=> '(031) 5946730', 'e_mail'=> 'andi@gmail.com'),
        array('id' => '8', 'penerbit'=> 'Tiga Serangkai Pustaka Mandiri', 'alamat'=> 'Jl. Prof. DR. Supomo No.23, Sriwedari, Kec. Laweyan, Kota Surakarta, Jawa Tengah 57141', 'telepon'=> '(0271) 714344', 'e_mail'=> 'tiga@gmail.com'), 
        array('id' => '9', 'penerbit'=> 'DIVA Press', 'alamat'=> 'Jl. Medokan Semampir Aws I No.21, Medokan Semampir, Kec. Sukolilo, Kota SBY, Jawa Timur 60119', 'telepon'=> '(021) 5965910', 'e_mail'=> 'diva@gmail.com'),
        array('id' => '10', 'penerbit'=> 'Erlangga', 'alamat'=> 'Margasari Margacinta, Jl. Soekarno-Hatta No.554, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286', 'telepon'=> '(022) 7500893', 'e_mail'=> 'erlangga@gmail.com'));
        
        $data = [];
        foreach($array as $data) {
            $penerbit = new Penerbit;
            $penerbit->id= $data['id'];
            $penerbit->penerbit=$data['penerbit'];
            $penerbit->alamat= $data['alamat'];
            $penerbit->telepon= $data['telepon'];
            $penerbit->e_mail= $data['e_mail'];
            
            $penerbit->save();
        }
        echo "Proses Menyimpan Berhasil";
    }

    public function bukuSave()
    {
        $array = array(array('id' => '6', 'judul'=> 'The Super Scalper', 'tahun_terbit'=> '2021', 'id_penerbit'=> '3', 'pengarang'=> 'Bekti Suktina', 'jumlah_hal'=> '224', 'sampul'=> 'Soft Cover'), 
        array('id' => '7', 'judul'=> 'Pendalaman Buku Teks Tematik (PBT)', 'tahun_terbit'=> '2019', 'id_penerbit'=> '6', 'pengarang'=> 'Forum Bina Prestasi', 'jumlah_hal'=> '217', 'sampul'=> 'Soft Cover'), 
        array('id' => '8', 'judul'=> 'Laskar Pelangi', 'tahun_terbit'=> '2020', 'id_penerbit'=> '4', 'pengarang'=> 'Andrea Hirata', 'jumlah_hal'=> '340', 'sampul'=> 'Art carton 230 gr'), 
        array('id' => '9', 'judul'=> 'Lebih Senyap dari Bisikan', 'tahun_terbit'=> '2021', 'id_penerbit'=> '1', 'pengarang'=> 'Andina Dwifatma', 'jumlah_hal'=> '313', 'sampul'=> 'Soft Cover'), 
        array('id' => '10', 'judul'=> 'Rapijali', 'tahun_terbit'=> '2021', 'id_penerbit'=> '1', 'pengarang'=> 'Dewi Lestari', 'jumlah_hal'=> '421', 'sampul'=> 'Soft Cover'));
        
        $data = [];
        foreach($array as $data) {
            $buku = new Buku;
            $buku->id= $data['id'];
            $buku->judul=$data['judul'];
            $buku->tahun_terbit= $data['tahun_terbit'];
            $buku->id_penerbit= $data['id_penerbit'];
            $buku->pengarang= $data['pengarang'];
            $buku->jumlah_hal= $data['jumlah_hal'];
            $buku->sampul= $data['sampul'];
            
            $buku->save();
        }
        echo "Proses Menyimpan Berhasil";
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'id' => 'required|max:5',
        'jenis_id'=> 'required',
        'nama_barang'=> 'required'
        ]);
        \App\Models\Barang::create($request->all());
    }
}

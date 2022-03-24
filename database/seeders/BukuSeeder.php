<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buku')->insert([
            ['judul'=>'Menjadi Jempolan Programmer Web PHP','tahun_terbit' =>'2018','id_penerbit' =>1,'pengarang' =>'Badiyanto','jumlah_hal' =>400,'sampul' =>'Putih'],
            ['judul'=>'Simulasi Arduino','tahun_terbit' =>'2017','id_penerbit' =>2,'pengarang' =>'Badiyanto','jumlah_hal' =>200,'sampul' =>'Putih'],
            ['judul'=>'Algoritma dan Pemrograman','tahun_terbit' =>'2017','id_penerbit' =>1,'pengarang' =>'Abdul Kadir','jumlah_hal' =>200,'sampul' =>'Putih'],
            ['judul'=>'Buku Pintar Framework Yii','tahun_terbit' =>'2014','id_penerbit' =>3,'pengarang' =>'Andi Kritanto','jumlah_hal' =>300,'sampul' =>'Putih'],
            ['judul'=>'Anggaran Belanja Teknologi Informasi','tahun_terbit' =>'2017','id_penerbit' =>2,'pengarang' =>'Badiyanto','jumlah_hal' =>250,'sampul' =>'Putih'],
            ['judul'=>'Mastering Yii','tahun_terbit' =>'2017','id_penerbit' =>3,'pengarang' =>'Erwan Isa','jumlah_hal' =>400,'sampul' =>'Putih'],
            ['judul'=>'From Zero To A Pro: Pemrograman Aplikasi','tahun_terbit' =>'2017','id_penerbit' =>1,'pengarang' =>'Abdul Kadir','jumlah_hal' =>350,'sampul' =>'Putih'],
            ['judul'=>'Penatalaksanaan Diet Pada Pasien','tahun_terbit' =>'2017','id_penerbit' =>1,'pengarang' =>'Retno Wahyuningsih S.Gz','jumlah_hal' =>300,'sampul' =>'Putih']
            ]);
    }
}

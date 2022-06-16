<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarifs')->insert([
            ['kota_asal'=>"Surabaya",'kota_tujuan' =>'Malang','tarif' => 10000],
            ['kota_asal'=>"Surabaya",'kota_tujuan' =>'Banyuwangi','tarif' => 17500],
            ['kota_asal'=>"Surabaya",'kota_tujuan' =>'Gresik','tarif' => 10000],
            ['kota_asal'=>"Surabaya",'kota_tujuan' =>'Madiun','tarif' => 15000]
            ]);
    }
}

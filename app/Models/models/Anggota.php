<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama','tanggal_lhr',
                           'jenis_kel','alamat',
                           'telepon','e_mail','foto'];
}

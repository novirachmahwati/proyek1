<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = ['id','jenis_id','nama_barang','satuan','harga','stok','user_id'];

}

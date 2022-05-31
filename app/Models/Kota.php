<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';
    protected $fillable = ['propinsi_id','nama_kota','user_id'];

    public function getPropinsi()
    {
        return $this->belongsTo(Propinsi::class,'propinsi_id');
    }
}

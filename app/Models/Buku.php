<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = ['id','judul','tahun_terbit','id_penerbit',
                           'pengarang','jumlah_hal','sampul'];

    public function getPenerbit()
    {
        return $this->belongsTo(Penerbit::class,'id_penerbit');
    }
}

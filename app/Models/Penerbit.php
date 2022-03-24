<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbit';
    protected $primaryKey = 'id';
    protected $fillable = ['id','penerbit','alamat','telepon','e_mail'];

    public function getBuku()
    {
        return $this->hasMany(Buku::class);
    }
}

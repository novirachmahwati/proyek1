<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Barang;
use Illuminate\Support\Facades\Gate;

class BarangController extends Controller
{
    public function gate()
    {
        $barang = Barang::first();
        if (Gate::allows('update-barang', $barang)){
            echo "ID User : ".\Auth::user()->id."<br>";
            echo "Nama User : ".\Auth::user()->name."<br>" ;
            echo "Akses mengubah barang user dengan user_id=1 diijinkan";
        } else {
            echo "Tidak di ijinkan";
        }
        exit;
    }

    public function policies()
    {
        // membaca user login
        $user = \Auth::user();
        // baca barang
        $barang = Barang::first();
        if ($user->can('update', $barang)) {
            echo "ID User : ".\Auth::user()->id."<br>";
            echo "Nama User : ".\Auth::user()->name."<br>" ;
            echo "Akses mengubah barang user dengan user_id=1 diijinkan";
        } else {
            echo "Tidak di ijinkan";
        }
    }
}

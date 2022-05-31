@extends('layouts.app')
<center><h3>DAFTAR KOLEKSI BUKU</h3><br></center>
<table class="table table-bordered">
    <tr>
        <td>No</td>
        <td>Judul</td>
        <td>Pengarang</td>
        <td>Tahun</td>
        <td>Penerbit</td>
    </tr>
    @foreach($buku as $b)
        <tr>
            <td>{{ $b->id }}</td>
            <td>{{ $b->judul }}</td>
            <td>{{ $b->pengarang }}</td>
            <td>{{ $b->tahun_terbit }}</td>
            <td>{{ $b->penerbit }}</td>
        </tr>
    @endforeach
</table>
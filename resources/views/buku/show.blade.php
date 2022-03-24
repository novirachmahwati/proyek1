@extends('layouts.app')
@section('content')
    <h4>Informasi Buku</h4>
<table class="table table-responsive martop-sm">
    <thead>
        <th>ID</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Tahun Terbit</th>
        <th>Penerbit</th>
        <th>Alamat</th>
    </thead>
    <tbody>
        <tr>
                <td>{{ $buku->id }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->pengarang }}</a></td>
                <td>{{ $buku->tahun_terbit }}</td>
                <td>{{ $buku->getPenerbit->penerbit }}</td>
                <td>{{ $buku->getPenerbit->alamat }}</a></td>
        </tr>
    </tbody>
</table>
<a href="{{ route('buku.index') }}" class="btn btn-warning">
    Kembali</a>
@endsection
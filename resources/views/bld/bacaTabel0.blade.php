@extends('layouts.app')
@section('content')
    <h2>Laporan Daftar Barang</h2>
    <table class="table table-responsive martop-sm">
        <thead>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Jumlah Harga</th>
        </thead>
        <tbody>
            @foreach ($djual as $d)
                <tr>
                    <td>{{ $d->barang_id }}</td>
                    <td><a>{{ $d->nama_barang }}</a></td>
                    <td>{{ $d->stok }}</td>
                    <td>{{ $d->satuan }}</td>
                    <td>{{ $d->harga }}</td>
                    <td>{{ $d->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
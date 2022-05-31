@extends('layouts.app')
@section('content')
    <center>
        <h3>Toko Serba Ada</h3>
        <h4>Jalan Janti 143 Yogyakarta</h4>
    </center>
    <h2>Daftar Belanja</h2>
    <h4>No. Nota: 1003</h4>
    <table class="table table-responsive martop-sm">
        <thead>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Total</th>
        </thead>
        <tbody>
            @foreach ($djual as $d)
                <tr>
                    <td>{{ $d->barang_id }}</td>
                    <td><a>{{ $d->nama_barang }}</a></td>
                    <td>{{ $d->jumlah }}</td>
                    <td>{{ $d->satuan }}</td>
                    <td>{{ $d->harga }}</td>
                    <td>{{ $d->total }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5">Jumlah</td>
                <td>{{ $d->total }}</td>
            </tr>
        </tbody>
    </table>
@endsection
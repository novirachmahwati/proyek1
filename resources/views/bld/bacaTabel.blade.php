@extends('layouts.app')
@section('content')
    <h2>DAFTAR KOTA</h2>
    <table class="table table-responsive martop-sm">
        <thead>
            <th>ID</th>
            <th>Kota</th>
            <th>Propinsi</th>
        </thead>
        <tbody>
            @foreach ($kota as $k)
                <tr>
                    <td>{{ $k->id }}</td>
                    <td>{{ $k->nama_kota }}</a></td>
                    <td>{{ $k->getPropinsi->propinsi }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
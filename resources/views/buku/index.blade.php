@extends('layouts.app')
@section('content')
    <h4>Menajemen Tabel Kota</h4>
    <a href="{{ route('kota.create') }}" class="btn btn-info btn-sm">
        Kota Baru
    </a>
@if ($message = Session::get('message'))
    <div class="alert alert-success martop-sm">
        <p>{{ $message }}</p>
    </div>
@endif
<br><br>
<form action="{{ route('search') }}" method="GET">
    <input type="text" name="search" value="{{ old('search') }}">
    <input type="submit" value="search">
</form>
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
        @foreach ($buku as $p)
        <tr>
                <td>{{ $p->id }}</td>
                <td><a href="{{ route('buku.show', $p->id) }}">
                    {{ $p->judul }}</a></td>
                <td>{{ $p->pengarang }}</a></td>
                <td>{{ $p->tahun_terbit }}</td>
                <td>{{ $p->getPenerbit->penerbit }}</td>
                <td>{{ $p->getPenerbit->alamat }}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
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
<table class="table table-responsive martop-sm">
    <thead>
        <th>ID</th>
        <th>ID Propinsi</th>
        <th>Nama Kota</th>
    </thead>
    <tbody>
        @foreach ($kota as $p)
        <tr>
                <td>{{ $p->id }}</td>
                <td><a href="{{ route('kota.show', $p->id) }}">
                {{ $p->propinsi_id }}</a></td>
                <td>{{ $p->nama_kota }}</td>
                <td>
                <form action="{{ route('kota.destroy', $p->id) }}"
                    method="post">
                
                {{csrf_field()}}
                
                {{ method_field('DELETE') }}
                <a href="{{ route('kota.edit', $p->id) }}"
                class="btn btn-warning btn-sm">Ubah</a>
                
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                
                </form>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
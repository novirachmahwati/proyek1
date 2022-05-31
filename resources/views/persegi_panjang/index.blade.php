@extends('layouts.app')
@section('content')
    <h4>Hasil Hitung Luas Persegi Panjang</h4>
    <a href="{{ route('luas-persegi-panjang.create') }}" class="btn btn-info btn-sm">
        Hitung Baru
    </a>
@if ($message = Session::get('message'))
    <div class="alert alert-success martop-sm">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-responsive martop-sm">
    <thead>
        <th>Panjang</th>
        <th>Lebar</th>
        <th>Luas</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($persegi_panjang as $p)
        <tr>
                <td>{{ $p->panjang }}</td>
                <td>{{ $p->lebar }}</td>
                <td>{{ $p->luas }}</td>
                <td>
                <form action="{{ route('luas-persegi-panjang.destroy', $p->id) }}"
                    method="post">
                
                {{csrf_field()}}
                
                {{ method_field('DELETE') }}
                <a href="{{ route('luas-persegi-panjang.edit', $p->id) }}"
                class="btn btn-warning btn-sm">Ubah</a>
                
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                
                </form>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
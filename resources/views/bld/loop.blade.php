@extends('layouts.app')
@section('content')
<table border="1">
    <h2>Menampilkan menggunakan Loop</h2>
    <tr>
        <th>NILAI I</th>
        <th>BILANGAN</th>
    </tr>
    @for ($i=0; $i<10; $i++)
        <tr>
            @if ($i%2==1)
                <td>{{$i}}</td><td>Ganjil</td>
            @else
                <td>{{$i}}</td><td>Genap</td>
            @endif
    @endfor
        </tr>
</table>
@endsection
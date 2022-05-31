@extends('layouts.app')
@section('content')
    <h4>Tampilkan {{ $anggota->id }}</h4>
    <a class="btn btn-primary" href="{{ route('anggota.edit',$anggota->id) }}">Ubah</a>
    <a href="{{ route('anggota.index') }}" class="btn btn-primary">
        Kembali</a>
<table class="table table-responsive martop-sm table-striped table-bordered">
    <tr>
        <td>{!! Form::label('nomor', 'Nomor:',['class' =>'control-label']) !!}</td>
        <td>{!! Form::text('nomor', $anggota->id, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('nama', 'Nama:',['class' =>'control-label']) !!}</td>
        <td>{!! Form::text('nama', $anggota->nama, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('e_mail', 'E_mail:',['class' =>'control-label']) !!}</td>
        <td>{!! Form::text('e_mail', $anggota->e_mail, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('telepon', 'Telepon/HP:',['class' =>'control-label']) !!}</td>
        <td>{!! Form::text('telepon', $anggota->telepon, ['class' => 
        'form-control']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('alamat', 'Alamat:',['class' =>'control-label']) !!}</td>
        <td>{!! Form::text('alamat', $anggota->alamat, ['class' => 
        'form-control']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('tanggal_lhr', 'Tanggal Lahir:',['class' =>'control-label']) !!}</td>
        <td>{!! Form::text('tanggal_lhr', $anggota->tanggal_lhr, ['class' => 
        'form-control']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('foto', 'Foto:',['class' =>'control-label']) !!}</td>
        <td>{{ HTML::image('foto/'. $anggota->foto , 'alt text', 
        array('class' => 'css-class', 'width' => 70)) }}</td>
    </tr>
</table>
@endsection
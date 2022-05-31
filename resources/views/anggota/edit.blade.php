@extends('layouts.app')
@section('content')
    <h3>Ubah Anggota</h3>
    {!! Form::open(['route' => ['anggota.update',$anggota->id],
    'method'=>'PUT',
    'enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        {!! Form::label('id', 'Nomor Anggota:',
        ['class' => 'control-label']) !!}
        {!! Form::text('id', $anggota->id, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('nama', 'Nama:',['class' =>'control-label']) !!}
        {!! Form::text('nama', $anggota->nama, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('jenis_kel', 'Jenis Kelamin:',
        ['class' => 'control-label']) !!}
        {!! Form::radio('jenis_kel','L',false) !!} Laki-laki
        {!! Form::radio('jenis_kel','P',false) !!} Perempuan
    </div>

    <div class="form-group">
        {!! Form::label('telepon', 'Telepon/HP:',
        ['class' => 'control-label']) !!}
        {!! Form::text('telepon', $anggota->telepon, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('e_mail', 'E-mail:',
        ['class' => 'control-label']) !!}
        {!! Form::text('e_mail', $anggota->e_mail, 
        ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('alamat', 'Alamat:',
        ['class' => 'control-label']) !!}
        {!! Form::text('alamat', $anggota->alamat, 
        ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tanggal_lhr', 'Tanggal Lahir',
        ['class' => 'control-label']) !!}
        {!! Form::date('tanggal_lhr',$anggota->tanggal_lhr,
        ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('foto', 'Foto:',['class' => 'control-label']) !!}
        {!! Form::file('foto', Input::old('foto'),['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('simpan', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
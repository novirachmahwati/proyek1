@extends('layouts.app')
@section('content')
<h4>Kota Baru</h4>
<form action="{{ route('kota.store') }}" method="post">
{{csrf_field()}}
<div class="form-group {{ $errors->has('kota') ? 'has-error' : '' }}">
    <label for="propinsi_id" class="control-label">Propinsi</label>
    <select class="form-control" name="propinsi_id">
        <option hidden>Pilih Propinsi</option>
        @foreach ($propinsi as $item)
        <option value="{{ $item->id }}" name="propinsi_id">
            {{ $item->propinsi }}</option>
        @endforeach
    </select>

    <label for="nama_kota" class="control-label">Nama Kota</label>
    <input type="text" class="form-control" name="nama_kota" 
    placeholder="Nama Kota">
@if ($errors->has('kota'))
<span class="help-block">{{ $errors->first('kota') }}</span>
@endif
</div>
<div class="form-group">
<button type="submit" class="btn btn-info">Simpan</button>
<a href="{{ route('kota.index') }}" class="btn btn-default">Kembali</a>
</div>
</form>
@endsection
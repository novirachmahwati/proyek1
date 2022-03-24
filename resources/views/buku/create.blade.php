@extends('layouts.app')
@section('content')
<h4>Buku Baru</h4>
@if ($message = Session::get('message'))
    <div class="alert alert-success martop-sm">
        <p>{{ $message }}</p>
    </div>
@endif
<form action="{{ route('buku.store') }}" method="post">
{{csrf_field()}}
<div class="form-group {{ $errors->has('buku') ? 'has-error' : '' }}">
    <label for="judul" class="control-label">Judul</label>
    <input type="text" class="form-control" name="judul" 
    placeholder="Judul">
    <label for="tahun_terbit" class="control-label">Tahun Terbit</label>
    <input type="text" class="form-control" name="tahun_terbit" 
    placeholder="Tahun Terbit">
    <label for="id_penerbit" class="control-label">Penerbit</label>
    <select class="form-control" name="id_penerbit">
        <option hidden>Pilih Penerbit</option>
        @foreach ($penerbit as $item)
        <option value="{{ $item->id }}" name="id_penerbit">
            {{ $item->penerbit }}</option>
        @endforeach
    </select>
    <label for="pengarang" class="control-label">Pengarang</label>
    <input type="text" class="form-control" name="pengarang" 
    placeholder="Pengarang">
    <label for="jumlah_hal" class="control-label">Jumlah Hal</label>
    <input type="text" class="form-control" name="jumlah_hal" 
    placeholder="Jumlah Hal">
    <label for="sampul" class="control-label">Sampul</label>
    <input type="text" class="form-control" name="sampul" 
    placeholder="Sampul">
    @if ($errors->has('buku'))
        <span class="help-block">{{ $errors->first('buku') }}</span>
    @endif
</div>
<div class="form-group">
<button type="submit" class="btn btn-info">Simpan</button>
<a href="{{ route('buku.index') }}" class="btn btn-default">Kembali</a>
</div>
</form>
@endsection
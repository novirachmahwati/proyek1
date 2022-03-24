@extends('layouts.app')
@section('content')
<h4>Penerbit Baru</h4>
<form action="{{ route('penerbit.store') }}" method="post">
    {{csrf_field()}}
    @if ($message = Session::get('message'))
    <div class="alert alert-success martop-sm">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="form-group {{ $errors->has('penerbit') ? 'has-error' : '' }}">
        <label for="penerbit" class="control-label">Penerbit</label>
        <input type="text" class="form-control" name="penerbit" 
            placeholder="Penerbit">
        <label for="alamat" class="control-label">Alamat</label>
        <input type="text" class="form-control" name="alamat" 
            placeholder="Alamat">
        <label for="telepon" class="control-label">Telepon</label>
        <input type="tel" class="form-control" name="telepon" 
            placeholder="Telepon">
        <label for="e_mail" class="control-label">Email</label>
        <input type="email" class="form-control" name="e_mail" 
            placeholder="Email">
        @if ($errors->has('penerbit'))
            <span class="help-block">{{ $errors->first('penerbit') }}</span>
        @endif
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-info">Simpan</button>
        <a href="{{ route('penerbit.index') }}" class="btn btn-default">Kembali</a>
    </div>
</form>
@endsection
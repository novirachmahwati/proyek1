@extends('layouts.app')
@section('content')
<h4>Hitung Luas Persegi Panjang Baru</h4>
<form action="{{ route('luas-persegi-panjang.store') }}" method="post">
    {{csrf_field()}}
    <div class="form-group {{ $errors->has('luas') ? 'has-error' : '' }}">
        <label for="panjang" class="control-label">Panjang</label>
        <input type="text" class="form-control" name="panjang" 
        placeholder="Panjang">
        @if ($errors->has('panjang'))
            <span class="help-block">{{ $errors->first('panjang') }}</span>
        @endif

        <label for="lebar" class="control-label">Lebar</label>
        <input type="text" class="form-control" name="lebar" 
        placeholder="lebar">
        @if ($errors->has('lebar'))
            <span class="help-block">{{ $errors->first('lebar') }}</span>
        @endif
        
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info">Simpan</button>
        <a href="{{ route('luas-persegi-panjang.index') }}" class="btn btn-default">Kembali</a>
    </div>
</form>
@endsection
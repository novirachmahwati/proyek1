@extends('layouts.app')
@section('content')
<h4>Cetak Daftar Belanja</h4>
<form action="{{ route('cetakNota.id') }}" method="POST">
{{csrf_field()}}
<div class="form-group {{ $errors->has('jual_id') ? 'has-error' : '' }}">
<label for="jual_id" class="control-label">Nomor Nota</label>
<input type="text" class="form-control" name="jual_id" 
placeholder="Nomor Nota">
</div>
<div class="form-group">
<button type="submit" class="btn btn-info">Cetak</button>
</div>
</form>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home / User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Tabel Rekaman User</h4>
                    <a href="{{ route('user.create') }}" class="btn 
                    btn-info btn-sm">Tambah</a>
                    <table class="table table-responsive martop-sm">
                        <thead>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($user as $u)
                            <tr>
                                <td>{{ $u->id }}</td>
                                <td><img src={{ asset('foto/'.
                                $u->file_foto) }} width="60px" 
                                class="border"></td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->jabatan }}</td>
                                <td>
                                <form action="{{ route('user.destroy', 
                                $u->id) }}" method="post">
                                
                                {{csrf_field()}}
                                
                                {{ method_field('DELETE') }}
                                <a href="{{ route('user.edit', $u->id) }}"
                                class="btn btn-warning btn-sm">Ubah</a>
                                
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

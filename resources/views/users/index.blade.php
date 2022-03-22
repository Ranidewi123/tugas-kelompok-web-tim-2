@extends('layouts.app')

@section('content')

<div class="container">
    <div class="justify-content-center">
        <div class="row">
            <div class="col-6">
                <h2>Data User</h2>
            </div>
            <div class="col-6">
                <a href="{{ url()->current().'/create' }}" class="btn btn-primary float-right">Tambah Baru</a>	
            </div>
        </div>
        <br>
        <table class="table table-striped">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Role</th>
                <th>Opsi</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->place_of_birth }}</td>
                <td>{{ $user->date_of_birth != null ? date('Y/m/d', strtotime($user->date_of_birth)) : '' }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->getRoleNames()[0] }}</td>
                <td>
                    <a href="{{ url()->current().'/edit/'.$user->id }}">Edit</a>
                    |
                    <a href="{{ url()->current().'/delete/'.$user->id }}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
	

@endsection
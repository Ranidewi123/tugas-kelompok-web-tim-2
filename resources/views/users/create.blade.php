@extends('layouts.app')

@section('content')

<div class="container">
    <div class="justify-content-center">
        <h3>Tambah Data User</h2>
        {{ Form::open(array('url' => url()->current(), 'method' => 'post')) }}
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="name" required />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" placeholder="Tempat Lahir" name="place_of_birth" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control date" placeholder="Tanggal Lahir" name="date_of_birth" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label>Gender</label><br>
                        <input type="radio" name="gender" value="Pria" checked> Pria<br>
                        <input type="radio" name="gender" value="Wanita"> Wanita<br>
                    </div>
                    <div class="form-group">
                        <label>Gender</label><br>
                        <select id="role" name="role" class="form-control" required>
                            <option value="" disabled>Pilih Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </div>
            
        {{ Form::close() }}
    </div>
</div>

@endsection
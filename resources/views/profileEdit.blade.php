@extends('layouts.master')

@section('content')
    <h1>Ini Form Edit Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        
        <div class="col-mb-3">
            <label>Username</label>
            <input type="text" id="username" name="nama" class="form-control" value="">
        </div>
        <div class="col-mb-3">
            <label>Email</label>
            <input type="email" id="email" name="email" class="form-control" value="">
        </div>
        <div class="col-mb-3">
            <label>Password Baru</label>
            <input type="password" id="password" name="password" class="form-control" value="">
        </div>
        <div class="col-mb-3">
            <label>Confirmasi Password</label>
            <input type="password" id="password_confirmasi" name="password_confirmasi" class="form-control" value="">
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary mt-3 w-5">Update</button>
        </div>
    </form>
@endsection

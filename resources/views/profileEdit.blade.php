@extends('layouts.master')

@section('content')
    <h1>Ini Form Edit Profile</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="nama" class="form-control" value="{{ old('nama', auth()->user()->name) }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password_confirmasi" class="form-label">Konfirmasi Password</label>
            <input type="password" id="password_confirmasi" name="password_confirmation" class="form-control">
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </div>
    </form>
@endsection

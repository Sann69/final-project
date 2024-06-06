@extends('layouts.master')

@section('content')
    <h1>Profile</h1>
    <div>
        <label>Name</label>
        <input type="text" name="nama" value="{{ $user->nama }}">
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}">
    </div>
    <div>
        <label>Email</label>
        <input type="text" name="gender" value="{{ $user->gender }}">
    </div>
    <a href="{{ route('profile.edit') }}" class="btn btn-primary">EDIT</a>
@endsection

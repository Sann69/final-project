@extends('layouts.master')

@section('content')
    <h1>INI FOrm Edit Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="nama" value="">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="">
        </div>
        <button type="submit">Update</button>
    </form>
@endsection

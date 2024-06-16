<!-- resources/views/profile/show.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container mt-5 bg-info">
        <div class="row">
            <div class="col-md-5 offset-1 rounded my-lg-5 px-3 py-3 me-3" style="border: 3px solid black">
                <div class="d-flex justify-content-between">
                    <div class="text-center w-100">
                        @if (Auth::user()->photo)
                            <i class="fas fa-user-circle fa-7x"></i>
                        @else
                            <i class="fas fa-user-circle fa-7x"></i>
                        @endif
                        <p class="mt-2 fw-bold">Profile</p>
                        <a href="{{ route('home.page') }}" class="btn btn-link text-dark"><i class="fas fa-home"></i>
                            Home</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 rounded my-lg-5 px-3 py-3" style="border: 3px solid black">
                <div class="d-flex justify-content-between">
                    <div class="w-50">
                        <p class="fw-bold">Nama </p>
                        <p class="fw-bold">Email</p>
                        <p class="fw-bold">Jenis Kelamin</p>
                        <p class="fw-bold">Umur</p>
                        <p class="fw-bold">Tanggal Lahir</p>
                        <p class="fw-bold">Alamat</p>
                    </div>
                    <div>
                        <p>{{ Auth::user()->nama }}</p>
                        <p>{{ Auth::user()->email }}</p>
                        <p>{{ Auth::user()->gender }}</p>
                        <p>{{ Auth::user()->umur }}</p>
                        <p>{{ Auth::user()->tgl_lahir }}</p>
                        <p>{{ Auth::user()->alamat }}</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-center">
            <a href="{{ route('profile.edit') }}" class="btn btn-md btn-primary mt-3 w-25">Edit Profile</a>
        </div>

    </div>
@endsection

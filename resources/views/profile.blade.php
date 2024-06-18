@extends('layouts.master')
@push('style')
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row border border-dark rounded">
            <div class="col-md-5 offset-1 rounded my-lg-5 px-3 py-3 me-3">
                <div class="d-flex justify-content-between">
                    <div class="text-center w-100">
                        @if (Auth::user()->profile_picture)
                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture"
                                class="w-25 rounded-circle">
                        @else
                            <img src="{{ asset('default-profile-picture.jpg') }}" alt="Default Profile Picture"
                                class="w-25 rounded-circle">
                        @endif

                        <p class="mt-2 fw-bold">{{ Auth::user()->nama }}</p>

                        <div class="d-flex justify-content-center">
                            <a href="{{ route('profile.edit') }}" class="btn btn-md btn-primary mt-3 w-25">Edit Profile</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-5 rounded my-lg-5 px-3 py-3">
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

    </div>
@endsection

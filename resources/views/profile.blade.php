<!-- resources/views/profile/show.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container mt-5 bg-info">
        <div class="row">
            <div class="col-md-5 offset-1 rounded my-lg-5 px-3 py-3 me-3" style="border: 3px solid black">
                <div class="d-flex justify-content-between">
                    <div class="text-center">
                        @if (Auth::user()->photo)
                            <img src="{{ asset(Auth::user()->photo) }}" class="rounded w-75" alt="Profile">
                        @else
                            <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg?w=768" class="rounded w-75" alt="Guest">
                        @endif
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

        <div class="container mt-5 bg-info">
            <div class="row">
                <div class="col-md-5 offset-1 rounded my-lg-5 px-3 py-3 me-3" style="border: 3px solid black">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Upload Foto Profil</h5>
                            <form action="{{ route('profile.upload.submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Pilih foto profil baru</label>
                                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('profile.edit') }}" class="btn btn-md btn-success mt-3 w-25">Edit</a>
        </div>

    </div>
@endsection

@extends('layouts.master')

@section('content')
    <div class="container mt-5 bg-info">

        <div class="row">

            <div class="col-md-5 offset-1 rounded my-lg-5 px-3 py-3 me-3" style="border: 3px solid black">
                <div class="d-flex justify-content-between">
                    <div class="text-center">
                        <img src="https://images.tokopedia.net/img/cache/700/VqbcmM/2022/10/4/083f27cb-23af-49b9-bb56-4d3146299c7c.jpg"
                            class="rounded w-75" alt="Profile">
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
                        <p class="">{{ Auth::user()->nama }}</p>
                        <p class="">{{ Auth::user()->email }}</p>
                        <p class="">{{ Auth::user()->gender }}</p>
                        <p class="">{{ Auth::user()->umur }}</p>
                        <p class="">{{ Auth::user()->tgl_lahir }}</p>
                        <p class="">{{ Auth::user()->alamat }}</p>
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
                        <h5 class="card-title"><button type="button" class="btn btn-secondary">Upload File</button></button></h5>
                        <form action="{{ route('profile.upload.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="file" class="form-label">Choose file to upload</label>
                                <input type="file" class="form-control" id="file" name="file" required>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
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

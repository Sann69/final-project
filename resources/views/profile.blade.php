@extends('layouts.master')

@section('content')
    <div class="container mt-5 bg-danger">

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
                        <p class=""></p>
                        <p class=""></p>
                        <p class=""></p>
                        <p class=""></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('profile.edit') }}" class="btn btn-md btn-success mt-3">Edit</a>
        </div>

    </div>
@endsection

@extends('layouts.master')
@section('title', 'Materi')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="mb-0"><i class="fa-solid fa-book-open"></i> Materi</h1>
        <form action="{{ route('materi.search') }}" method="GET" class="d-flex">
        <button type="submit" class="btn btn-light w-200">Search <i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        </div>
        <div class="row">
            <!-- Contoh Materi 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Materi 1">
                    <div class="card-body">
                        <h5 class="card-title">Materi 1</h5>
                        <p class="card-text">Deskripsi singkat tentang materi 1. Pelajari topik ini untuk meningkatkan keterampilan Anda.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <!-- Contoh Materi 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Materi 2">
                    <div class="card-body">
                        <h5 class="card-title">Materi 2</h5> 
                        <p class="card-text">Deskripsi singkat tentang materi 2. Pelajari topik ini untuk meningkatkan keterampilan Anda.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <!-- Contoh Materi 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Materi 3">
                    <div class="card-body">
                        <h5 class="card-title">Materi 3</h5>
                        <p class="card-text">Deskripsi singkat tentang materi 3. Pelajari topik ini untuk meningkatkan keterampilan Anda.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

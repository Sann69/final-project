@extends('layouts.master')
@section('title', 'Catatan')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="mb-0"><i class="fa-solid fa-note-sticky"></i> Catatan</h1>
        <form action="{{ route('materi.search') }}" method="GET" class="d-flex">
            <button type="submit" class="btn btn-light w-200">Search <i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>

        <!-- Tambahkan tombol untuk membuat catatan baru -->
        <div class="mb-4">
            <a href="#" class="btn btn-success">Buat Catatan Baru</a>
        </div>

        <div class="row">
            <!-- Contoh Catatan 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Judul Catatan 1</h5>
                        <p class="card-text">Isi singkat dari catatan 1. Ini adalah ringkasan atau potongan kecil dari catatan lengkap.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>

            <!-- Contoh Catatan 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Judul Catatan 2</h5>
                        <p class="card-text">Isi singkat dari catatan 2. Ini adalah ringkasan atau potongan kecil dari catatan lengkap.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>

            <!-- Contoh Catatan 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Judul Catatan 3</h5>
                        <p class="card-text">Isi singkat dari catatan 3. Ini adalah ringkasan atau potongan kecil dari catatan lengkap.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>

            <!-- Tambahkan lebih banyak catatan sesuai kebutuhan -->
        </div>
    </div>
@endsection

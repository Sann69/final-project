@extends('layouts.master')
@section('title', 'Catatan')

@section('content')
    <div class="container" style="margin-top: 10%">
        <h1 class="mb-4">Catatan</h1>

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

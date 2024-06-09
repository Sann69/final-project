@extends('layouts.master')
@section('title', 'Bookmark')

@section('content')
    <div class="container" style="margin-top: 10%">
        <h1 class="mb-4">Bookmark</h1>

        <!-- Contoh data bookmark statis -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Judul Bookmark 1</h5>
                        <p class="card-text">Deskripsi singkat tentang bookmark ini. Deskripsi ini dibatasi untuk memberikan gambaran umum.</p>
                        <a href="#" class="btn btn-primary" target="_blank">Lihat Detail</a>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Judul Bookmark 2</h5>
                        <p class="card-text">Deskripsi singkat tentang bookmark ini. Deskripsi ini dibatasi untuk memberikan gambaran umum.</p>
                        <a href="#" class="btn btn-primary" target="_blank">Lihat Detail</a>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Judul Bookmark 3</h5>
                        <p class="card-text">Deskripsi singkat tentang bookmark ini. Deskripsi ini dibatasi untuk memberikan gambaran umum.</p>
                        <a href="#" class="btn btn-primary" target="_blank">Lihat Detail</a>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

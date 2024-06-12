@extends('layouts.master')
@section('title', 'Catatan')

@section('content')
<div class="container" style="margin-top: 10%">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-2"><i class="fa-solid fa-book-open"></i> Catatan</h1>
        <form action="{{ route('catatan.search') }}" method="GET" class="d-flex">
            <input type="text" name="cari" class="form-control me-2" placeholder="Search">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>

    @if(isset($catatan) && $catatan->count())
            <ul class="list-group mb-4">
                @foreach($catatan as $catatanItem)
                    <li class="list-group-item">{{ $catatanItem->nama_catatan }}</li>
                @endforeach
            </ul>
            <div class="mt-2">
                {{ $catatan->links() }}
            </div>
        @else
            <p class="text-muted">Tidak ada catatan ditemukan</p>
        @endif

        <!-- Tambahkan tombol untuk membuat catatan baru -->
        <div class="mb-4">
            <a href="#" class="btn btn-success">Buat Catatan Baru</a>
        </div>
        <form action="{{ route('catatan.baru') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary float-end">Simpan</button>
        </form>

    <div class="row">
            <!-- Contoh Catatan 1 -->
        <div class="row">
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
        </div>
    </div>
@endsection

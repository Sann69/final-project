@extends('layouts.master')
@section('title', 'Catatan')

@section('content')
    <div class="container" style="margin-top: 2%">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-2"><i class="fa-solid fa-book-open"></i> Catatan</h1>
            <form action="#" method="GET" class="d-flex">
                <input type="text" name="cari" class="form-control me-2" placeholder="Search">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        {{-- @if (isset($catatan) && $catatan->count())
            <ul class="list-group mb-4">
                @foreach ($catatan as $catatanItem)
                    <li class="list-group-item">{{ $catatanItem->nama_catatan }}</li>
                @endforeach
            </ul>
            <div class="mt-2">
                {{ $catatan->links() }}
            </div>
        @else
            <p class="text-muted">Tidak ada catatan ditemukan</p>
        @endif --}}

        <!-- Tambahkan tombol untuk membuat catatan baru -->
        <div class="mb-4">
            <a href="{{ route('catatan.create', ['user' => $user->id]) }}" class="btn btn-success"
                id="btnTambahCatatan">Buat Catatan Baru</a>
        </div>

        <div class="row">
            <!-- Contoh Catatan 1 -->
            {{-- <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Judul Catatan 1</h5>
                        <p class="card-text">Isi singkat dari catatan 1. Ini adalah ringkasan atau potongan kecil dari
                            catatan lengkap.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>



@endsection

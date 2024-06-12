@extends('layouts.master')
@section('title', 'Bookmark')


@section('content')
    <div class="container" style="margin-top: 10%">
       <div class="d-flex justify-content-between align-items-center mb-4">
           <h1 class="mb-2"><i class="fa-solid fa-book-open"></i> Bookmark</h1>
            <form action="{{ route('bookmark.search') }}" method="GET" class="d-flex">
               <input type="text" name="cari" class="form-control me-2" placeholder="Search">
               <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
       </div>
    </div>

    @if(isset($bookmark) && $bookmark->count())
            <ul class="list-group mb-4">
                @foreach($bookmark as $bookmarkItem)
                    <li class="list-group-item">{{ $bookmarkItem->nama_bookmark }}</li>
                @endforeach
            </ul>
            <div class="mt-2">
                {{ $bookmark->links() }}
            </div>
        @else
            <p class="text-muted">Tidak ada bookmark ditemukan</p>
        @endif

        <!-- Contoh data bookmark statis -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Judul Bookmark 1 <i class="fa-regular fa-bookmark"></i></h5>
                        <p class="card-text">Deskripsi singkat tentang bookmark ini. Deskripsi ini dibatasi untuk memberikan gambaran umum.</p>
                        <a href="#" class="btn btn-primary" target="_blank">Lihat Detail</a>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Judul Bookmark 2 <i class="fa-regular fa-bookmark"></i></h5>
                        <p class="card-text">Deskripsi singkat tentang bookmark ini. Deskripsi ini dibatasi untuk memberikan gambaran umum.</p>
                        <a href="#" class="btn btn-primary" target="_blank">Lihat Detail</a>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Judul Bookmark 3 <i class="fa-regular fa-bookmark"></i></h5>
                        <p class="card-text">Deskripsi singkat tentang bookmark ini. Deskripsi ini dibatasi untuk memberikan gambaran umum.</p>
                        <a href="#" class="btn btn-primary" target="_blank">Lihat Detail</a>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

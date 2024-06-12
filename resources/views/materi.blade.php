@extends('layouts.master')
@section('title', 'Materi')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-2"><i class="fa-solid fa-book-open"></i> Materi</h1>
            <form action="{{ route('materi.search') }}" method="GET" class="d-flex">
                <input type="text" name="cari" class="form-control me-2" placeholder="Search">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        @if(isset($materi) && $materi->count())
            <ul class="list-group mb-4">
                @foreach($materi as $materiItem)
                    <li class="list-group-item">{{ $materiItem->nama_materi }}</li>
                @endforeach
            </ul>
            <div class="mt-2">
                {{ $materi->links() }}
            </div>
        @else
            <p class="text-muted">Tidak ada materi ditemukan</p>
        @endif

        <div class="row">
            <!-- Contoh Materi 1 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
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
                <div class="card h-100">
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
                <div class="card h-100">
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

@extends('layouts.master')
@section('title', 'Materi')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="mb-4">
            <h1><i class="fa-solid fa-book-open"></i> Materi</h1>
            <!-- Tombol Add Materi -->
            <a href="{{ route('materi.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add Materi</a>
        </div>

        <form action="{{ route('materi.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="cari" class="form-control" placeholder="Search">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>

        <!-- Daftar Materi -->
        @if (isset($materi) && $materi->count())
            <ul class="list-group mb-4">
                @foreach ($materi as $materiItem)
                    <li class="list-group-item">{{ $materiItem->nama_materi }}</li>
                @endforeach
            </ul>
            <div class="mt-2">
                {{ $materi->links() }}
            </div>
        @else
            <p class="text-muted">Tidak ada materi ditemukan</p>
        @endif

        <!-- Contoh Materi Cards -->
        <div class="row">
            <!-- Isi Materi Cards -->
        </div>
    </div>
@endsection

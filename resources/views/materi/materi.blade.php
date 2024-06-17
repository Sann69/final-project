@extends('layouts.master')
@section('title', 'Materi')

@section('content')
    <div class="container" style="margin-top: 2%">
        <div class="mb-4">
            <h1><i class="fa-solid fa-book-open"></i> Materi</h1>
            <a href="{{ route('materi.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add Materi</a>
        </div>

        <form action="{{ route('materi.search') }}" method="GET" class="mb-4 w-25">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>

        @if (isset($materi) && $materi->count())
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($materi as $materiItem)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ $materiItem->gambar }}" class="card-img-top" alt="{{ $materiItem->judul }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $materiItem->judul }}</h5>
                                <p class="card-text">{{ Str::limit($materiItem->deskripsi, 100) }}</p>
                                <a href="{{ route('materi.download', $materiItem->id) }}" class="btn btn-primary mt-3">
                                    <i class="fa-solid fa-download"></i> Download File
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-2">
                {{ $materi->links() }}
            </div>
        @else
            <p class="text-muted">Tidak ada materi ditemukan</p>
        @endif
    </div>
@endsection

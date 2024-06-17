@extends('layouts.master')
@section('title', 'Catatan')

@section('content')
    <div class="container" style="margin-top: 2%">
        <div class="mb-4">
            <h1><i class="fa-solid fa-book-open"></i> Catatan</h1>
            <a href="{{ route('catatan.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah Catatan</a>
        </div>

        <form action="{{ route('catatan.search') }}" method="GET" class="mb-4 w-25">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>

        @if ($catatan->count() > 0)
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($catatan as $catatanItem)
                    <div class="col">
                        <div class="card h-100">
                            @if ($catatanItem->gambar)
                                <img src="{{ Storage::url('gambar_files/' . $catatanItem->gambar) }}" class="card-img-top"
                                    alt="{{ $catatanItem->judul }}">
                            @else
                                <img src="default_image.jpg" class="card-img-top" alt="Default Image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $catatanItem->judul }}</h5>
                                <p class="card-text">{{ Str::limit($catatanItem->deskripsi, 100) }}</p>
                                <a href="{{ route('catatan.download', $catatanItem->id) }}" class="btn btn-primary mt-3">
                                    <i class="fa-solid fa-download"></i> Download File
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-2">
                {{ $catatan->links() }}
            </div>
        @else
            <p class="text-muted">Tidak ada catatan ditemukan</p>
        @endif
    </div>
@endsection

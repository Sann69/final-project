@extends('layouts.master')
@section('title', 'Edit Materi')

@section('content')
    <div class="container" style="margin-top: 2%">
        <h1>Edit Materi</h1>
        <form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Materi</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $materi->judul }}">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Materi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $materi->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">URL Gambar</label>
                <input type="text" class="form-control" id="gambar" name="gambar" value="{{ $materi->gambar }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Materi</button>
        </form>
    </div>
@endsection

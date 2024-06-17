@extends('layouts.master')
@section('title', 'Tambah Materi')

@section('content')
    <div class="container" style="margin-top: 2%">
        <h1><i class="fa-solid fa-plus"></i> Tambah Materi</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Materi</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Materi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File Materi (PDF, DOC, DOCX)</label>
                <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx,.pptx"
                    required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="text" class="form-control" id="gambar" name="gambar" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <a href="{{ route('materi.show') }}" class="btn btn-secondary mt-3"><i class="fa-solid fa-arrow-left"></i> Kembali
            ke Materi</a>
    </div>
@endsection

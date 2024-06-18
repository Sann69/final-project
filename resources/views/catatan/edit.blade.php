@extends('layouts.master')
@section('title', 'Edit Catatan')

@section('content')
    <div class="container" style="margin-top: 2%">
        <h1><i class="fa-solid fa-edit"></i> Edit Catatan</h1>
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
        <form action="{{ route('catatan.update', $catatan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Catatan</label>
                <input type="text" class="form-control" id="judul" name="judul"
                    value="{{ old('judul', $catatan->judul) }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Catatan</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $catatan->deskripsi) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File Catatan</label>
                <input type="file" class="form-control" id="file" name="file"
                    accept=".pdf,.doc,.docx,.pptx,.png,.jpg,.jpeg,.zip,.rar">
                @if ($catatan->file)
                    <p class="mt-2">File saat ini: <a
                            href="{{ Storage::url('files/' . $catatan->file) }}">{{ $catatan->file }}</a></p>
                @endif
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept=".png,.jpg,.jpeg">
                @if ($catatan->gambar)
                    <p class="mt-2">Gambar saat ini:</p>
                    <img src="{{ Storage::url('gambar_files/' . $catatan->gambar) }}" alt="{{ $catatan->judul }}"
                        class="img-thumbnail w-25">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <!-- Tombol Kembali ke Catatan -->
        <a href="{{ route('catatan.show') }}" class="btn btn-secondary mt-3"><i class="fa-solid fa-arrow-left"></i> Kembali
            ke Catatan</a>
    </div>
@endsection

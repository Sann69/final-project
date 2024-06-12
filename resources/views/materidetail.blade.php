@extends('layouts.master')

 @section('title', 'Detail Materi')

 @section('content')
    <div class="container">
        <h1>{{ $materi->judul }}</h1>
        <p>{{ $materi->deskripsi }}</p>
        <!-- Tambahkan konten lainnya sesuai kebutuhan -->
    </div>
    
@endsection
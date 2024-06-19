@extends('layouts.master')
@section('title', 'Tentang Kami')
@push('style')
    <style>
        .text-justify {
            text-align: justify;
        }
    </style>
@endpush

@section('content')
    <div class="hero-section text-center">
        <div class="container">
            <h1 class="mb-4">Tentang Belajar Bersama</h1>
            <p>Platform pembelajaran yang mendukung Anda untuk memahami berbagai materi pelajaran.</p>
        </div>
    </div>

    <div class="container content-section">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-4">Visi dan Misi Kami</h2>
                <p class="text-justify">
                    Belajar Bersama adalah platform pembelajaran yang bertujuan untuk membantu para pelajar dalam
                    memahami berbagai materi pelajaran dengan lebih baik. Kami menyediakan berbagai sumber daya
                    belajar, mulai dari video tutorial, catatan, dan latihan soal, untuk mendukung proses belajar Anda.
                </p>
                <p class="text-justify">
                    Dengan Belajar Bersama, Anda dapat belajar kapan saja dan di mana saja sesuai dengan kecepatan
                    Anda sendiri. Kami percaya bahwa setiap orang memiliki potensi untuk belajar dan berkembang,
                    dan kami berkomitmen untuk menyediakan alat dan sumber daya yang Anda butuhkan untuk mencapai
                    tujuan pendidikan Anda.
                </p>
                <p class="text-justify">
                    Bergabunglah dengan kami dan mulailah perjalanan belajar Anda dengan Belajar Bersama!
                </p>
            </div>
            <div class="col-md-6 text-end">
                <img src="{{ asset('images/logo.png') }}" alt="Belajar Bersama" class="img-fluid w-50 mt-5">
            </div>
        </div>
    </div>
@endsection

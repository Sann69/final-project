@extends('layouts.master')
@section('title', 'Belajar Bersama')

@section('content')
    <div class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-md-8">

                <h2 class="fw-bold">Belajar. Terhubung. Berkembang.</h2>
                <h1 class="display-3 fw-bold">Tingkatkan Perjalanan Belajar Anda</h1>

                <p>Selamat datang di Belajar Bersama, tempat di mana pengetahuan bertemu dengan passion.
                    Telusuri dunia dari pelajaran yang luas tanpa batas, disusun khusus untuk Anda.
                    Apakah Anda ingin mengembangkan keterampilan baru, meningkatkan karir, atau menjelajahi hobi baru,
                    kami siap membantu.</p>

                <a href="{{ url('/courses') }}" class="btn btn-info"><b>Temukan Kursus!</b></a>

            </div>
            <div class="col-md-4">
                <img src="https://media.istockphoto.com/id/1497459613/id/vektor/platform-e-learning-dan-konsep-pendidikan-virtual-dengan-orang-yang-mengikuti-kelas-online.webp?b=1&s=612x612&w=0&k=20&c=iLwxNl-TTKBrT7UFvJqRgRQ1Yudmjycr7KLqM_lCu40=" alt="Pembelajaran Online" class="img-fluid" style="transform: scale(1.4); transform-origin: top left;">
            </div>
            
        </div>
    </div>
@endsection

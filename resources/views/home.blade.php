@extends('layouts.master')

@section('title', 'Belajar Bersama')

@section('content')
    <!-- Main Container -->
    <div class="container" style="margin-top: 10%;">
        <div class="row">
            <!-- Main Content -->
            <div class="col-md-8">
                <h2 class="fw-bold">Belajar. Terhubung. Berkembang.</h2>
                <h1 class="display-3 fw-bold">Tingkatkan Perjalanan Belajar Anda</h1>
                <p>Selamat datang di Belajar Bersama, tempat di mana pengetahuan bertemu dengan passion.
                    Telusuri dunia dari pelajaran yang luas tanpa batas, disusun khusus untuk Anda.
                    Apakah Anda ingin mengembangkan keterampilan baru, meningkatkan karir, atau menjelajahi hobi baru,
                    kami siap membantu.</p>
                @auth
                    @if (auth()->user())
                        <a href="{{ route('materi.show') }}" class="btn btn-info"><b>Cari Materi</b></a>
                    @endif
                @else
                    <a href="{{ route('register.page') }}" class="btn btn-info"><b>Daftar Sekarang!</b></a>
                @endauth
            </div>
            <!-- Image Section -->
            <div class="col-md-4">
                <img src="https://media.istockphoto.com/id/1497459613/id/vektor/platform-e-learning-dan-konsep-pendidikan-virtual-dengan-orang-yang-mengikuti-kelas-online.webp?b=1&s=612x612&w=0&k=20&c=iLwxNl-TTKBrT7UFvJqRgRQ1Yudmjycr7KLqM_lCu40="
                    alt="Pembelajaran Online" class="img-fluid" style="transform: scale(1.3); transform-origin: top left;">
            </div>
        </div>
    </div>

    <br>

    <div class="container mt-5">
        <h2 class="text-center fw-bold">Keunggulan Belajar Bersama</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm" style="height: 300px;">
                    <div class="card-body text-center">
                        <i class="fas fa-book-open fa-3x mb-3" style="color: #007bff;"></i>
                        <h4 class="card-title">Materi Lengkap</h4>
                        <p class="card-text">Akses berbagai materi belajar yang lengkap dan up-to-date, memudahkan Anda
                            untuk memahami berbagai topik dari dasar hingga tingkat lanjut.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm" style="height: 300px;">
                    <div class="card-body text-center">
                        <i class="fas fa-clock fa-3x mb-3" style="color: #ffc107;"></i>
                        <h4 class="card-title">Fleksibilitas Waktu</h4>
                        <p class="card-text">Nikmati kebebasan belajar kapan saja dan di mana saja dengan akses materi yang
                            fleksibel, sesuai dengan jadwal Anda yang padat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm" style="height: 300px;">
                    <div class="card-body text-center">
                        <i class="fas fa-globe fa-3x mb-3" style="color: #17a2b8;"></i>
                        <h4 class="card-title">Akses Global</h4>
                        <p class="card-text">Berselancar dalam pelajaran dari berbagai budaya dan perspektif global,
                            memperluas wawasan Anda tanpa batas geografis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container mt-5">
        <h2 class="text-center fw-bold">Apa Kata Mereka?</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="https://cdn.iconscout.com/icon/free/png-256/free-html-5-1-1175208.png"
                        class="card-img-top rounded mx-auto d-block w-50 m-5" alt="Materi HTML">
                    <div class="card-body">
                        <h3 class="card-title">Materi HTML</h3>
                        <p class="card-text">"Materi HTML di Belajar Bersama sangat membantu saya memahami dasar-dasar
                            pembuatan website. Penjelasannya sangat jelas dan mudah diikuti." - Budi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/CSS3_logo.svg/2048px-CSS3_logo.svg.png"
                        class="card-img-top rounded mx-auto d-block w-50 m-5" alt="Materi CSS">
                    <div class="card-body">
                        <h4 class="card-title">Materi CSS</h4>
                        <p class="card-text">"Pelajaran CSS di Belajar Bersama membantu saya mendesain website dengan lebih
                            menarik. Banyak trik dan tips yang berguna." - Joko</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="https://static.vecteezy.com/system/resources/previews/027/127/463/original/javascript-logo-javascript-icon-transparent-free-png.png"
                        class="card-img-top rounded mx-auto d-block w-50 m-5" alt="Materi JavaScript">
                    <div class="card-body">
                        <h4 class="card-title">Materi JavaScript</h4>
                        <p class="card-text">"Belajar JavaScript di Belajar Bersama membuat saya lebih percaya diri dalam
                            mengembangkan fitur interaktif pada website." - Alice</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

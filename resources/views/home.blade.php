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
                <a href="{{ url('/login') }}" class="btn btn-info"><b>Temukan Kursus!</b></a>
            </div>
            <!-- Image Section -->
            <div class="col-md-4">
                <img src="https://media.istockphoto.com/id/1497459613/id/vektor/platform-e-learning-dan-konsep-pendidikan-virtual-dengan-orang-yang-mengikuti-kelas-online.webp?b=1&s=612x612&w=0&k=20&c=iLwxNl-TTKBrT7UFvJqRgRQ1Yudmjycr7KLqM_lCu40="
                    alt="Pembelajaran Online" class="img-fluid" style="transform: scale(1.3); transform-origin: top left;">
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Ribuan Kursus">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Ribuan Kursus</h5>
                        <p class="card-text">Akses ribuan kursus dari berbagai kategori, mulai dari teknologi hingga seni.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Komunitas Aktif">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Komunitas Aktif</h5>
                        <p class="card-text">Bergabung dengan komunitas pembelajar yang aktif dan bersemangat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pengajar Berpengalaman">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Pengajar Berpengalaman</h5>
                        <p class="card-text">Belajar dari para ahli dan profesional di bidangnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="container mt-5">
        <h2 class="text-center fw-bold">Apa Kata Mereka?</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Testimonial Aulia">
                    <div class="card-body">
                        <p class="card-text">"Belajar Bersama telah mengubah cara saya belajar. Saya bisa belajar kapan saja
                            dan di mana saja!" - Aulia</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Testimonial Budi">
                    <div class="card-body">
                        <p class="card-text">"Platform yang luar biasa dengan banyak kursus yang bermanfaat. Sangat
                            direkomendasikan!" - Budi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Testimonial Chandra">
                    <div class="card-body">
                        <p class="card-text">"Pengajarnya sangat profesional dan materinya mudah dipahami. Terima kasih
                            Belajar Bersama!" - Chandra</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mentors Section -->
    <div class="container mt-5">
        <h2 class="text-center fw-bold">Mentor dan Pemateri Kami</h2>
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Mentor 1">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Mentor 1</h5>
                        <p class="card-text">ahli jaringan</p>
                        <a href="#" class="btn btn-info">Lihat Biodata</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Mentor 2">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Mentor 2</h5>
                        <p class="card-text">database master</p>
                        <a href="#" class="btn btn-info">Lihat Biodata</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Mentor 3">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Mentor 3</h5>
                        <p class="card-text">Profesional Bisnis</p>
                        <a href="#" class="btn btn-info">Lihat Biodata</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Mentor 4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Mentor 4</h5>
                        <p class="card-text">web develop</p>
                        <a href="#" class="btn btn-info">Lihat Biodata</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

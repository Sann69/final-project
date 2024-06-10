<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.2/css/all.min.css') }}">
    @stack('style')
</head>
<!-- Favicon -->
<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

<body class="container-fluid d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid mx-4">
                <a class="navbar-brand" href="{{ route('home.page') }}">
                    {{-- <img src="https://amandemy.co.id/images/amandemy-logo.png" width="150"> --}}
                    <strong style="color: blue; font-size: 1.5em;">Belajar Bersama</strong>
                </a>
                <div class="navbar">
                    <ul class="nav nav-pills justify-content-end fw-bold">
                        @auth
                            @if (auth()->user()->hasRole('admin'))
                                <!-- Menu untuk admin -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.page') }}">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('bookmark.show') }}">Bookmark</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('catatan.show') }}">Catatan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('materi.show') }}">Materi</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('home.page', ['user' => auth()->user()->id]) }}">MANAGE PRODUCTS</a>
                                </li> --}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-circle-user fa-xl me-2"></i>{{ auth()->user()->nama }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                    </ul>
                                </li>
                            @elseif(auth()->user()->hasRole('user'))
                                <!-- Menu untuk user -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.page') }}">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('bookmark.show') }}">BOOKMARK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('catatan.show') }}">CATATAN</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('materi.show') }}">MATERI</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-circle-user fa-xl me-2"></i>{{ auth()->user()->nama }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                    </ul>
                                </li>
                            @endif
                        @else
                            <!-- Menu untuk tamu -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home.page') }}">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tentang.page') }}">TENTANG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('register.page') }}">DAFTAR</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('login.page') }}">MASUK</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-shrink-0 mb-5">
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer class="footer mt-auto py-3 dark-bg">


        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Connect With Us</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Info</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt"></i> jakarta ,indonesia</li>
                        <li><i class="fas fa-envelope"></i> info@example.com</li>
                        <li><i class="fas fa-phone"></i> +1234567890</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="text-blue">&copy; {{ date('Y') }} Belajar Bersama. All rights reserved.</p>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

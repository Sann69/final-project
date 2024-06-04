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

<body class="container-fluid d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">

            <div class="container-fluid mx-4">

                <a class="navbar-brand" href="{{ route('home_page') }}">
                    <img src="https://amandemy.co.id/images/amandemy-logo.png" width="150">
                </a>

                <div class="navbar">
                    <ul class="nav nav-pills justify-content-end fw-bold">
                        @auth
                            @if (auth()->user()->hasRole('admin'))
                                <!-- Menu untuk admin -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home_page') }}">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">PRODUCTS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('home_page', ['user' => auth()->user()->id]) }}">MANAGE PRODUCTS</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-circle-user fa-xl me-2"></i>{{ auth()->user()->nama }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                    </ul>
                                </li>
                            @elseif(auth()->user()->hasRole('user'))
                                <!-- Menu untuk user -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home_page') }}">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">PRODUCTS</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-circle-user fa-xl me-2"></i>{{ auth()->user()->nama }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                    </ul>
                                </li>
                            @endif
                        @else
                            <!-- Menu untuk tamu -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home_page') }}">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">PRODUCTS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('login_page') }}">LOGIN</a>
                            </li>
                        @endauth
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <main class="flex-shrink-0">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

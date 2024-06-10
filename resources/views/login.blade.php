@extends('layouts.master')
@section('title', 'Login User')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-3 border p-4 rounded">
            <h1 class="h3 mb-3 fw-normal text-center">Halaman Register User</h1>

            <!-- error message -->
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- success message -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('login.user') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email Kamu"
                        required>
                    @error('email')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Masukan Password Kamu" required>
                    @error('password')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <p>Belum Punya Akun? <a href="{{ route('register.page') }}" class="text-dark fw-bold"> Daftar Sekarang</a>
                </p>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="w-30 btn btn-lg btn-success">Login</button>
                </div>
                <p class="text-center my-1">Atau</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('login.google') }}" class="w-50 btn btn-lg btn-info mt-2"> <i class="fab fa-google">
                        </i> Login Google</a>
                </div>
            </form>
        </div>
    </div>
@endsection

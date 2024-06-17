@extends('layouts.master')

@section('content')
    <h1>Edit Profile</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="form-group row mb-3">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-5">
                <input type="text" id="username" name="nama" class="form-control"
                    value="{{ old('nama', auth()->user()->name) }}">
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-5">
                <input type="email" id="email" name="email" class="form-control"
                    value="{{ old('email', auth()->user()->email) }}">
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
            <div class="col-sm-5">
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="togglePassword('password', 'togglePasswordIcon1')"
                            style="cursor: pointer;">
                            <i class="fas fa-eye" id="togglePasswordIcon1"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="password_confirmasi" class="col-sm-2 col-form-label">Konfirmasi Password</label>
            <div class="col-sm-5">
                <div class="input-group">
                    <input type="password" id="password_confirmasi" name="password_confirmation" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text"
                            onclick="togglePassword('password_confirmasi', 'togglePasswordIcon2')" style="cursor: pointer;">
                            <i class="fas fa-eye" id="togglePasswordIcon2"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function togglePassword(inputId, iconId) {
                const passwordInput = document.getElementById(inputId);
                const toggleIcon = document.getElementById(iconId);
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleIcon.classList.remove('fa-eye');
                    toggleIcon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    toggleIcon.classList.remove('fa-eye-slash');
                    toggleIcon.classList.add('fa-eye');
                }
            }
        </script>

        <div class="form-group row mb-3">
            <div class="col-sm-10 offset-sm-2 -content-end">
                <button type="submit" class="btn btn-primary mt-3">Update</button>
                <a href="{{ route('profile.show') }}" class="btn btn-secondary mt-3 ms-2">Kembali ke Profile</a>
            </div>
        </div>
    </form>
@endsection

@extends('layouts.master')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-4 border p-4 rounded">

            <h1 class="h3 mb-3 fw-normal text-center">Edit Profile</h1>

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

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="profile_picture">Gambar</label>
                    <input type="file" id="profile_picture" name="profile_picture" class="form-control"
                        accept=".png,.jpg,.jpeg">
                </div>

                <div class="form-group mb-3">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" class="form-control"
                        value="{{ old('nama', auth()->user()->nama) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control"
                        value="{{ old('email', auth()->user()->email) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" class="form-control">
                        <option value="male" {{ old('gender', auth()->user()->gender) == 'male' ? 'selected' : '' }}>Male
                        </option>
                        <option value="female" {{ old('gender', auth()->user()->gender) == 'female' ? 'selected' : '' }}>
                            Female
                        </option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="umur">Umur</label>
                    <input type="number" id="umur" name="umur" class="form-control"
                        value="{{ old('umur', auth()->user()->umur) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control"
                        value="{{ old('tgl_lahir', auth()->user()->tgl_lahir) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" class="form-control">{{ old('alamat', auth()->user()->alamat) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password Baru</label>
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

                <div class="form-group mb-3">
                    <label for="password_confirmasi">Konfirmasi Password</label>
                    <div class="input-group">
                        <input type="password" id="password_confirmasi" name="password_confirmation" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text"
                                onclick="togglePassword('password_confirmasi', 'togglePasswordIcon2')"
                                style="cursor: pointer;">
                                <i class="fas fa-eye" id="togglePasswordIcon2"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 text-center">
                    <button type="submit" class="btn btn-primary w-25">Update</button>
                    <a href="{{ route('profile.show') }}" class="btn btn-secondary w-25">Kembali</a>
                </div>

            </form>
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
@endsection

@extends('layouts.master')
@section('title', 'Update User')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-4 border p-4 rounded">
            <h1 class="h3 mb-3 fw-normal text-center">Halaman Update</h1>

            <!-- error message -->
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- success message -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('update.user', $user->id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="form-group mb-3">
                    <label for="">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="">Pilih Role</option>
                        <option value="admin" {{ $user->roles->first()->name == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ $user->roles->first()->name == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    @error('role')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control"
                        placeholder="Masukan Nama Lengkap Kamu" value="{{ $user->nama }}" required>
                    @error('nama')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control"
                        placeholder="Masukan Email Kamu" value="{{ $user->email }}" required>
                    @error('email')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="gender">Jenis Kelamin</label>
                    <select name="gender" class="form-select" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('gender')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="umur">Umur</label>
                    <input type="number" name="umur" id="umur" class="form-control" placeholder="Masukan Umur Kamu"
                        value="{{ $user->umur }}" required>
                    @error('umur')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                        value="{{ $user->tgl_lahir }}" required>
                    @error('tgl_lahir')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat Kamu" required>{{ $user->alamat }}</textarea>
                    @error('alamat')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="w-100 btn btn-lg btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

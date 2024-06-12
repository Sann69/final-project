@extends('layouts.master')
@section('title', 'Admin')
@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .dataTables_filter input[type="search"] {
            margin: 0% 0% 5% 0%;
            background-color: #f0f8ff;
            border: 1px solid #ccc;
            color: #333;
        }

        .dataTables_length select {
            margin: 10% 0% 5% 0%;
            border: 1px solid white;
            color: black;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-lg-4 mb-lg-3">
        <div class="row bg-info rounded px-3 py-3 w-100">
            <div class="d-flex justify-content-between">
                <h2 class="fw-semibold">Data User</h2>

            </div>



            <div class="d-flex justify-content-end">
                <select id="genderFilter" class="form-select w-25 my-3" aria-label="Default select example">
                    <option selected value="">Pilih Gender</option>
                    <option value="Laki">Laki Laki</option> <!-- Ubah nilai value agar sesuai dengan nilai di tabel -->
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <table class="table table-striped w-100 mt-3" id="datatable-list">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Gender</th>
                        <th scope="col" class="text-center">Umur</th>
                        <th scope="col" class="text-center">Tanggal Lahir</th>
                        <th scope="col" class="text-center">Alamat</th>
                        <th scope="col" class="text-center" style="width: 150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $user->id }}</td>
                            <td class="text-center">{{ $user->nama }}</td>
                            <td class="text-center">{{ $user->email }}</td>
                            {{-- <td class="text-center">{{ $user->gender }}</td> --}}
                            @if ($user->gender == 'male')
                                <td class="text-center">Laki Laki</td>
                            @else
                                <td class="text-center">Perempuan</td>
                            @endif
                            <td class="text-center">{{ $user->umur }}</td>
                            <td class="text-center">{{ $user->tgl_lahir }}</td>
                            <td class="text-center">{{ $user->alamat }}</td>
                            <td class="d-flex">
                                <a href="{{ route('home.page') }}" class="btn btn-warning btn-md">Update</a>
                                <form action="{{ route('home.page') }}" method="POST" class="ms-1">
                                    @csrf
                                    <button class="btn btn-md btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#datatable-list').DataTable();

            $('#genderFilter').on('change', function() {
                var gender = $(this).val();
                table.column(4).search(gender).draw(); // Ensure this is the correct column index for gender
            });
        });
    </script>
@endsection

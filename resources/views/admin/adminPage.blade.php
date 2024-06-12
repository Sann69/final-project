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
                    <option value="Laki">Laki Laki</option>
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
                            @if ($user->gender == 'male')
                                <td class="text-center">Laki Laki</td>
                            @else
                                <td class="text-center">Perempuan</td>
                            @endif
                            <td class="text-center">{{ $user->umur }}</td>
                            <td class="text-center">{{ $user->tgl_lahir }}</td>
                            <td class="text-center">{{ $user->alamat }}</td>
                            <td class="d-flex">
                                <a href="{{ route('edit.user.admin', ['user' => $user->id]) }}"
                                    class="btn btn-warning btn-md">Update</a>
                                <button class="btn btn-md btn-danger ms-1" type="button" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-user-id="{{ $user->id }}"
                                    data-user-name="{{ $user->nama }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <span id="userName"></span>?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#datatable-list').DataTable();

            $('#genderFilter').on('change', function() {
                var gender = $(this).val();
                table.column(4).search(gender).draw();
            });

            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var userId = button.data('user-id');
                var userName = button.data('user-name');

                var modal = $(this);
                modal.find('#userName').text(userName);
                modal.find('#deleteForm').attr('action', '/delete/' + userId);
            });
        });
    </script>
@endsection

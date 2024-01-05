@extends('layouts.main', ['title' => 'User Management'])

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-dns"></i>
        </span> User Management
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Management</li>
        </ol>
    </nav>
</div>


<div class="row">
    <div class="col-12 grid-margin">
        <div class="card shadow ">
            <div class="card-body">
                <button class="btn btn-gradient-primary mb-3" data-bs-toggle="modal" data-bs-target="#create">Tambah User</button>
                <table id="example" class="table table-bordered display table-responsive table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $user )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->role}}</td>
                            <td style="width: 200px;">
                                <button class="btn btn-gradient-success" data-bs-toggle="modal" data-bs-target="#edit-{{$user->id}}">Edit</button>
                                <a href="{{url('user/delete/'. $user->id )}}" id="user-delete" class="btn btn-gradient-danger" data-confirm-delete="true">Delete</a>
                            </td>
                        </tr>
                        @include('page.user.edit')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('page.user.create')
<!-- Modal Add -->

@section('chart')
<script>
    new DataTable('#example');
</script>

<!-- Confirm Delete -->
<script type="text/javascript">
    $(function() {
        $(document).on('click', '#user-delete', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');

            Swal.fire({
                title: "Anda Yakin?",
                text: "User Akan Dihapus",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus User!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Menggunakan Ajax untuk mengirim permintaan penghapusan ke server
                    $.ajax({
                        url: link,
                        type: 'get',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            // Tampilkan pesan sukses setelah penghapusan berhasil
                            Swal.fire({
                                title: "Terhapus!",
                                text: "User Berhasil Di Hapus.",
                                icon: "success"
                            });

                            // Atau, jika Anda ingin mengarahkan pengguna ke halaman tertentu setelah penghapusan
                            window.location.href = "{{ url('user') }}";
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
        });
    });
</script>


<!-- Password Confirm -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var passwordInput = document.getElementById('password');
        var confirmInput = document.getElementById('confirm');
        var passwordHelpBlock = document.getElementById('passwordHelpBlock');
        var confirmPasswordHelpBlock = document.getElementById('confirmPasswordHelpBlock');

        document.getElementById('submitBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Menghentikan perilaku default pengiriman form

            var password = passwordInput.value;
            var confirm = confirmInput.value;

            // Reset previous error messages
            passwordHelpBlock.innerText = '';
            confirmPasswordHelpBlock.innerText = '';

            if (password === '' || confirm === '') {
                passwordHelpBlock.innerText = 'Password dan konfirmasi harus diisi!';
            } else if (password !== confirm) {
                confirmPasswordHelpBlock.innerText = 'Password tidak cocok!';
            } else {
                // No error, proceed to submit the form
                document.getElementById('user-create-form').submit();
            }
        });
    });
</script>
@endsection
@endsection
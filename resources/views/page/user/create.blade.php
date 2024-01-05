<!-- Modal Create -->
<div class="modal fade" id="create" data-bs-backdrop="static" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModalLabel">Tambah User Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('user/create')}}" method="post" id="user-create-form">
                    @csrf
                    <div class="mb-3 row">
                        <label for="role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Small select example" name="role_id" required>
                                <option selected disabled>Pilih Role</option>
                                @foreach ($role as $role )
                                <option value="{{$role->id}}">{{$role->role}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-black" id="nama" required name="name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-black" id="email" name="email" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control text-black" id="password" name="password">
                            <small id="passwordHelpBlock" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="confirm" class="col-sm-2 col-form-label">Konfirmasi</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control text-black" id="confirm" name="confirm_password">
                            <small id="confirmPasswordHelpBlock" class="form-text text-danger"></small>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-gradient-primary" id="submitBtn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
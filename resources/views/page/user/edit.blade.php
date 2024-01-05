<!-- Modal Create -->
<div class="modal fade" id="edit-{{$user->id}}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModalLabel">Tambah User Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('user/edit')}}" method="post">
                    @csrf
                    <input type="text" value="{{$user->id}}" name="id" hidden>
                    <div class="mb-3 row">
                        <label for="role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Small select example" name="role_id" required>
                                <option selected disabled>{{$user->role->role}}</option>
                                @foreach ($role as $role )
                                <option value="{{$role->id}}">{{$role->role}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-black" id="nama" name="name" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-black" id="email" name="email" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-gradient-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
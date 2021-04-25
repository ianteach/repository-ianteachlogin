<div class="container">
    <div class="row-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Edit Role
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $user_role['id']; ?>">

                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="role" class="form-control" id="role" value="<?= $user_role['role']; ?>">
                            <small class="form-text text-danger">
                                <?= form_error('admin/role'); ?></small>
                        </div>

                        <button type="submit" name="roleubah" class="btn btn-primary float-right">Ubah Data</button>
                        <a href="<?= base_url('admin/role'); ?>" class="btn btn-secondary">Kembali</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
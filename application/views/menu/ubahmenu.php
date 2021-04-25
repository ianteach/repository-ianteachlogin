<div class="container">
    <div class="row-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Edit Menu
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $user_menu['id']; ?>">

                        <div class="form-group">
                            <label for="menu">Menu</label>
                            <input type="text" name="menu" class="form-control" id="menu" value="<?= $user_menu['menu']; ?>">
                            <small class="form-text text-danger">
                                <?= form_error('menu/ubahmenu'); ?></small>
                        </div>

                        <button type="submit" name="ubahmenu" class="btn btn-primary float-right">Ubah Data</button>
                        <a href="<?= base_url('menu'); ?>" class="btn btn-secondary">Kembali</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
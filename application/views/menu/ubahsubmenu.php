<div class="container">
    <div class="row-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Edit Data Submenu
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $user_sub_menu['id']; ?>">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="<?= $user_sub_menu['title']; ?>">
                            <small class="form-text text-danger">
                                <?= form_error('title'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="menu_id">Menu_id</label>
                            <select class="form-control" id="menu_id" name="menu_id">
                                <?php foreach ($menu_id as $mid) : ?>
                                    <?php if ($mid == $user_sub_menu['menu_id']) : ?>
                                        <option value="<?= $mid; ?>" selected>
                                            <?= $mid; ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $mid; ?>">
                                            <?= $mid; ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" name="url" class="form-control" id="url" value="<?= $user_sub_menu['url']; ?>">
                            <small class="form-text text-danger">
                                <?= form_error('url'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" name="icon" class="form-control" id="icon" value="<?= $user_sub_menu['icon']; ?>">
                            <small class="form-text text-danger">
                                <?= form_error('icon'); ?></small>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Active?
                                </label>
                            </div>
                        </div>

                        <button type="submit" name="ubahsubmenu" class="btn btn-primary float-right">Ubah Data</button>
                        <a href="<?= base_url('menu/submenu'); ?>" class="btn btn-secondary">Kembali</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
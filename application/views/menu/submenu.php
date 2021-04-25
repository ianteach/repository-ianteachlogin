<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

    <div class="row">
        <div class="col-lg">
            <!-- pesan eror Model Menu -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- pesan success Model Menu -->
            <?= $this->session->flashdata('message'); ?>




            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Submenu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu_Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row">
                                <?= $i; ?>
                            </th>
                            <td>
                                <?= $sm['menu_id']; ?>
                            </td>
                            <td>
                                <?= $sm['title']; ?>
                            </td>
                            <td>
                                <?= $sm['url']; ?>
                            </td>
                            <td>
                                <?= $sm['icon']; ?>
                            </td>
                            <td>
                                <?= $sm['is_active']; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('menu/submenuhapus/') . $sm['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin ingin menghapus field ini?');"> <i class="fas fa-trash-alt"></i> Delete</a>
                                <a href="<?= base_url('menu/ubahsubmenu/') . $sm['id']; ?>" class="badge badge-success float-right"> <i class="fas fa-edit"></i>Edit</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- MODAL -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="card">
                            <div class="card-header">
                                Form Tambah Data Submenu
                            </div>
                            <div class="card-body">

                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title">
                                        <small class="form-text text-danger">
                                            <?= form_error('title'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="menu_id">Menu</label>
                                        <select class="form-control" id="menu_id" name="menu_id">
                                            <?php foreach ($menu as $m) : ?>
                                                <option value="<?= $m['id']; ?>">
                                                    <?= $m['menu']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="url">Url</label>
                                        <input type="text" name="url" class="form-control" id="url">
                                        <small class="form-text text-danger">
                                            <?= form_error('url'); ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="icon">Icon</label>
                                        <input type="text" name="icon" class="form-control" id="icon">
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

                                    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal -->
<!-- tombol notif flash -->
<?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">Data
                <strong>Berhasil</strong>
                <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <?= $title; ?>
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $datauser['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $datauser['nama']; ?>">
                            <small class="form-text text-danger">
                                <?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                <?php foreach ($jeniskelamin as $jk) : ?>
                                    <?php if ($jk == $datauser['jeniskelamin']) : ?>
                                        <option value="<?= $jk; ?>" selected>
                                            <?= $jk; ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $jk; ?>">
                                            <?= $jk; ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="noidentitas">No Identitas</label>
                            <input type="text" name="noidentitas" class="form-control" id="noidentitas" value="<?= $datauser['noidentitas']; ?>">
                            <small class="form-text text-danger">
                                <?= form_error('noidentitas'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?= $datauser['email']; ?>">
                            <small class="form-text text-danger">
                                <?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <?php foreach ($status as $s) : ?>
                                    <?php if ($s == $datauser['status']) : ?>
                                        <option value="<?= $s; ?>" selected>
                                            <?= $s; ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $s; ?>">
                                            <?= $s; ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="namasekolah">Nama Sekolah</label>
                            <input type="text" name="namasekolah" class="form-control" id="namasekolah" value="<?= $datauser['namasekolah']; ?>">
                            <small class="form-text text-danger">
                                <?= form_error('namasekolah'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="namakuliah">Nama Kuliah</label>
                            <input type="text" name="namakuliah" class="form-control" id="namakuliah" value="<?= $datauser['namakuliah']; ?>">
                            <small class="form-text text-danger">
                                <?= form_error('namakuliah'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="namapekerjaan">Nama Pekerjaan</label>
                            <input type="text" name="namapekerjaan" class="form-control" id="namapekerjaan" value="<?= $datauser['namapekerjaan']; ?>">
                            <small class="form-text text-danger">
                                <?= form_error('namapekerjaan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="notelpon">No Telpon</label>
                            <input type="text" name="notelpon" class="form-control" id="notelpon" value="<?= $datauser['notelpon']; ?>">
                            <small class="form-text text-danger">
                                <?= form_error('notelpon'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>

                        <a href="<?= base_url('datauser/index'); ?>" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
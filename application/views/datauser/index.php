<div class="container">

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">Data
                    <strong>berhasil</strong>
                    <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url('datauser/tambah'); ?>" class="btn btn-primary"> <i class="fas fa-user-plus"></i> Add Data Datauser</a>
            <a class="btn btn-danger" href="<?= base_url('datauser/print_datauser') ?>"> <i class="fa fa-print"></i> Preview</a>
        </div>
    </div>


    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data mahasiswa.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->


    <div class="row mt-3">
        <div class="col-md-6">
            <h3>
                <?= $title; ?>
            </h3>

            <!-- alert untuk form pencarian jika data tidak ditemukan -->
            <?php if (empty($datauser)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data User tidak ditemukan.
                </div>
            <?php endif; ?>

            <ul class="list-group">
                <?php foreach ($datauser as $dtuser) : ?>
                    <li class="list-group-item">
                        <?= $dtuser['nama']; ?>
                        <a href="<?= base_url('datauser/hapus/') . $dtuser['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin ingin menghapus field ini?');"> <i class="fas fa-trash-alt"></i> Delete</a>
                        <a href="<?= base_url('datauser/ubah/') . $dtuser['id']; ?>" class="badge badge-success float-right"> <i class="fas fa-edit"></i>Edit</a>
                        <a href="<?= base_url('datauser/detail/') . $dtuser['id']; ?>" class="badge badge-primary float-right"> <i class="fas fa-search-plus"> </i> Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
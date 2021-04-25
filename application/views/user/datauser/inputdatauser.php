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
            <a href="<?= base_url('user/tambahdatauser'); ?>" class="btn btn-primary"> <i class="fas fa-user-plus"></i> Tambah Data Mahasiswa</a>
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
                    Data mahasiswa tidak ditemukan.
                </div>
            <?php endif; ?>

            <ul class="list-group">
                <?php foreach ($datauser as $dtuser) : ?>
                    <li class="list-group-item">
                        <?= $dtuser['nama']; ?>
                        <a href="<?= base_url('user/ubahdatauser/') . $dtuser['id']; ?>" class="badge badge-success float-right"> <i class="fas fa-edit"></i>Edit</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
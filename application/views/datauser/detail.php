<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Data User
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $datauser['nama']; ?>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <?= $datauser['status']; ?>
                    </h6>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <?= $datauser['noidentitas']; ?>
                    </h6>
                    <p class="card-text">
                        <?= $datauser['email']; ?>
                    </p>
                    <p class="card-text">
                        <?= $datauser['jeniskelamin']; ?>
                    </p>
                    <p class="card-text">
                        <?= $datauser['alamat']; ?>
                    </p>
                    <p class="card-text">
                        <?= $datauser['namasekolah']; ?>
                    </p>
                    <p class="card-text">
                        <?= $datauser['namakuliah']; ?>
                    </p>
                    <p class="card-text">
                        <?= $datauser['namapekerjaan']; ?>
                    </p>
                    <p class="card-text">
                        <?= $datauser['notelpon']; ?>
                    </p>
                    <a href="<?= base_url('datauser/index'); ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
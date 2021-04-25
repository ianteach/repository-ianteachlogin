<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <?= $title; ?>
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                            <small class="form-text text-danger">
                                <?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="noidentitas">No Identitas (NIS / NPM / KTP)</label>
                            <input type="number" name="noidentitas" class="form-control" id="noidentitas">
                            <small class="form-text text-danger">
                                <?= form_error('noidentitas'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                            <small class="form-text text-danger">
                                <?= form_error('alamat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                            <small class="form-text text-danger">
                                <?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Pelajar">Pelajar</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="namasekolah">Nama Sekolah</label>
                            <input type="text" name="namasekolah" class="form-control" id="namasekolah">
                            <small class="form-text text-danger">
                                <?= form_error('namasekolah'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="namakuliah">Nama Kuliah</label>
                            <input type="text" name="namakuliah" class="form-control" id="namakuliah">
                            <small class="form-text text-danger">
                                <?= form_error('namakuliah'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="namapekerjaan">Nama Pekerjaan</label>
                            <input type="text" name="namapekerjaan" class="form-control" id="namapekerjaan">
                            <small class="form-text text-danger">
                                <?= form_error('namapekerjaan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="notelpon">No Telpon</label>
                            <input type="text" name="notelpon" class="form-control" id="notelpon">
                            <small class="form-text text-danger">
                                <?= form_error('notelpon'); ?></small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>

                        <a href="<?= base_url('user/inputdatauser'); ?>" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
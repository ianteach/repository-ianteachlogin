<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <!-- card -->
    <div class="card-group" style="gap: 10px;">
        <div class="card">
            <div class="card border-info mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-info">NETWORK FUNDAMENTAL</div>
                <div class="card-body text-info">
                    <h5 class="card-title">Kelas Pertama</h5>
                    <p class="card-text">Di Tahap 1 ini, kita akan mempelajari Materi tentang (Penginstallan Linux Debian, PC Router, SSH SSL dan NTP Server)</p>
                </div>
                <!-- <div class="card-footer bg-transparent border-success">Footer</div> -->
                <button type="button" name="kelaspertama" class="btn btn-outline-info"><a href="<?= base_url('admin/kelaspertama'); ?>" target="blank">Join!</a></button>
            </div>
        </div>

        <div class="card">
            <div class="card border-success mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-success">NETWORK FUNDAMENTAL</div>
                <div class="card-body text-success">
                    <h5 class="card-title">Kelas Kedua</h5>
                    <p class="card-text">Di Tahap 2 ini, kita akan mempelajari Materi tentang (DHCP Server, FTP Server, dan File Server) <br><br></p>
                </div>
                <!-- <div class="card-footer bg-transparent border-success">Footer</div> -->
                <button type="button" name="kelaskedua" class="btn btn-outline-success"><a href="<?= base_url('admin/kelaskedua'); ?>" target="blank">Join!</a></button>
            </div>
        </div>

        <div class="card">
            <div class="card border-warning mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-warning">NETWORK FUNDAMENTAL</div>
                <div class="card-body text-warning">
                    <h5 class="card-title">Kelas Ketiga</h5>
                    <p class="card-text">Di Tahap 3 ini, kita akan mempelajari Materi tentang (Web Server, DNS Server, Database Server)<br><br></p>
                </div>
                <!-- <div class="card-footer bg-transparent border-success">Footer</div> -->
                <button type="button" name="kelasketiga" class="btn btn-outline-warning"><a href="<?= base_url('admin/kelasketiga'); ?>" target="blank">Join!</a></button>
            </div>
        </div>

        <div class="card">
            <div class="card border-danger mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-danger">NETWORK FUNDAMENTAL</div>
                <div class="card-body text-danger">
                    <h5 class="card-title">Kelas Keempat</h5>
                    <p class="card-text">Di Tahap 4 ini, kita akan mempelajari Materi tentang (Mail Server dan Proxy)<br><br><br></p>
                </div>
                <!-- <div class="card-footer bg-transparent border-success">Footer</div> -->
                <button type="button" name="kelaskeempat" class="btn btn-outline-danger"><a href="<?= base_url('admin/kelaskeempat'); ?>" target="blank">Join!</a></button>
            </div>
        </div>
    </div>
    <!-- akhir card -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No. Identitas</th>
                <th scope="col">Alamat</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Nama Sekolah</th>
                <th scope="col">Nama Kuliah</th>
                <th scope="col">Nama Pekerjaan</th>
                <th scope="col">No. Telpon</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($datauser as $du) : ?>
                <tr>
                    <th scope="row">
                        <?= $i; ?>
                    </th>
                    <td>
                        <?= $du['nama']; ?>
                    </td>
                    <td>
                        <?= $du['jeniskelamin']; ?>
                    </td>
                    <td>
                        <?= $du['noidentitas']; ?>
                    </td>
                    <td>
                        <?= $du['alamat']; ?>
                    </td>
                    <td>
                        <?= $du['email']; ?>
                    </td>
                    <td>
                        <?= $du['status']; ?>
                    </td>
                    <td>
                        <?= $du['namasekolah']; ?>
                    </td>
                    <td>
                        <?= $du['namakuliah']; ?>
                    </td>
                    <td>
                        <?= $du['namapekerjaan']; ?>
                    </td>
                    <td>
                        <?= $du['notelpon']; ?>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>

</div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
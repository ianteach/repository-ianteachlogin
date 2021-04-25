<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="application/views/mahasiswa/pdf.css">
</head>

<body>
    <h1 text-align="center"><?= $title; ?></h1>
    <table border="1" cellpading="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No Identitas (KTP/NIS/NPM)</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Status</th>
            <th>Nama Sekolah</th>
            <th>Nama Kuliah</th>
            <th>Nama Pekerjaan</th>
            <th>No Telp</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($datauser as $du) : ?>
            <tr>
                <th>
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
    </table>

</body>

</html>
<?php
require 'konek.php';

$query = "SELECT * FROM mhs";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <a href="tambah.php">Tambah Data</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; while ($mhs = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $mhs['foto']; ?></td>
            <td><?= $mhs['nama']; ?></td>
            <td><?= $mhs['nim']; ?></td>
            <td><?= $mhs['kelas']; ?></td>
            <td><?= $mhs['prodi']; ?></td>
            <td>
                <a href="edit.php?id=<?= $mhs['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?= $mhs['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

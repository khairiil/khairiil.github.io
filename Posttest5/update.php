<?php
require 'konek.php';

$id = $_GET['id'];
$query = "SELECT * FROM mhs WHERE id = $id";
$result = mysqli_query($conn, $query);
$mhs = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];
    $prodi = $_POST['prodi'];
    $foto = $_POST['foto'];

    $query = "UPDATE mhs SET nama='$nama', nim='$nim', kelas='$kelas', prodi='$prodi', foto='$foto' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <form method="POST">
        Nama: <input type="text" name="nama" value="<?= $mhs['nama']; ?>" required><br>
        NIM: <input type="text" name="nim" value="<?= $mhs['nim']; ?>" required><br>
        Kelas: <input type="text" name="kelas" value="<?= $mhs['kelas']; ?>" required><br>
        Prodi: <input type="text" name="prodi" value="<?= $mhs['prodi']; ?>" required><br>
        Foto: <input type="text" name="foto" value="<?= $mhs['foto']; ?>"><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>

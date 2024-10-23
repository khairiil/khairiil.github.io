<?php
require 'konek.php'; 
date_default_timezone_set("Asia/Makassar");

if (isset($_POST["tambah"])) {
    $nama_tim = $_POST["nama_tim"];
    $email = $_POST["email"];
    $game = $_POST["game"];

    $player1 = $_POST["player1"];
    $id_p1 = $_POST["id_p1"];
    $player2 = $_POST["player2"];
    $id_p2 = $_POST["id_p2"];
    $player3 = $_POST["player3"];
    $id_p3 = $_POST["id_p3"];
    $player4 = $_POST["player4"];
    $id_p4 = $_POST["id_p4"];
    $player5 = $_POST["player5"];
    $id_p5 = $_POST["id_p5"];

    $tmp_name = $_FILES["file"]["tmp_name"];
    $file_name = $_FILES["file"]["name"];

    $validExtension = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $file_name);
    $fileExtension = strtolower(end($fileExtension));

    $validMimeTypes = ['image/jpeg', 'image/png'];

    if (!in_array($fileExtension, $validExtension)) {
        echo "<script>
        alert('File yang diupload bukan gambar');
        document.location.href = 'tambah.php';
        </script>";
    } else {
        $mimeType = mime_content_type($tmp_name);
        if (!in_array($mimeType, $validMimeTypes)) {
            echo "<script>
            alert('File yang diupload bukan gambar');
            document.location.href = 'tambah.php';
            </script>";
        } else {
            $uploadDir = 'images/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $newFileName = date('Y-m-d H.i.s') . '.' . $fileExtension;
            $uploadPath = $uploadDir . $newFileName;

            if (!move_uploaded_file($tmp_name, $uploadPath)) {
                echo "<script>
                alert('Gagal mengunggah file.');
                document.location.href = 'tambah.php';
                </script>";
            } else {
                $query = "INSERT INTO `data` (nama_tim, email, game, player1, id_p1, player2, id_p2, player3, id_p3, player4, id_p4, player5, id_p5, file_path)
                          VALUES ('$nama_tim', '$email', '$game', '$player1', '$id_p1', '$player2', '$id_p2', '$player3', '$id_p3', '$player4', '$id_p4', '$player5', '$id_p5', '$newFileName')";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = 'lihat_data.php';
                    </script>";
                } else {
                    echo "<script>
                    alert('Data gagal ditambahkan');
                    document.location.href = 'tambah.php';
                    </script>";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Lomba</title>
    <link rel="stylesheet" href="css/lomba.css">
</head>
<body>
    <main class="data-lomba-section">
        <h1 class="data-lomba-title">Tambah Data Lomba Informatics Cup</h1>
        <div class="form-lomba">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-field">
                    <label for="nama_tim" class="label-field">Nama Tim</label>
                    <input type="text" name="nama_tim" id="nama_tim" required>
                </div>
                <div class="input-field">
                    <label for="game" class="label-field">Game</label>
                    <select name="game" id="game" required>
                        <option value="free-fire">Free Fire</option>
                        <option value="pubg">PUBG</option>
                        <option value="valorant">Valorant</option>
                        <option value="mobile-legends">Mobile Legends</option>
                    </select>
                </div>
                <div class="input-field">
                    <label for="email" class="label-field">Email Kontak</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="input-field">
                        <label for="player<?php echo $i; ?>" class="label-field">Nama Anggota <?php echo $i; ?></label>
                        <input type="text" name="player<?php echo $i; ?>" id="player<?php echo $i; ?>" required>
                    </div>
                    <div class="input-field">
                        <label for="id_p<?php echo $i; ?>" class="label-field">ID Game Anggota <?php echo $i; ?></label>
                        <input type="text" name="id_p<?php echo $i; ?>" id="id_p<?php echo $i; ?>" required>
                    </div>
                <?php endfor; ?>
                <div class="input-field">
                    <label for="file" class="label-field">Bukti Pembayaran</label>
                    <input type="file" name="file" id="file" style="border: 1px solid rgba(0,0,0,6);border-radius:9px; padding: 7px 10px; font-size: 16px;" required>
                </div>
                <input type="submit" value="Tambah" name="tambah" class="button">
            </form>
        </div>
        <div class="container">
            <a href="index.html">
                <button class="back"><p>Kembali ke Beranda</p></button>
            </a>
        </div>
    </main>
    <script src="script/script.js"></script>
</body>
</html>

<?php
require 'konek.php';

if (!isset($_GET['id_tim'])) {
    echo "<script>
    alert('ID tim tidak ditemukan');
    document.location.href = 'lihat_data.php';
    </script>";
    exit;
}

$id_tim = $_GET['id_tim'];

$id_tim = intval($id_tim);

$query = "SELECT * FROM `data` WHERE id_tim === $id_tim";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<script>
    alert('Data tidak ditemukan');
    document.location.href = 'lihat_data.php';
    </script>";
    exit;
}

if (isset($_POST['edit'])) {
    $nama_tim = $_POST['nama_tim'];
    $email = $_POST['email'];
    $game = $_POST['game'];

    $foto_tim = $_FILES['foto_tim']['name'];
    $upload_dir = 'uploads/';
    $upload_file = $upload_dir . basename($foto_tim);
    
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Jika foto baru diunggah
    if (!empty($foto_tim)) {
        if (file_exists($upload_dir . $data['foto_tim'])) {
            unlink($upload_dir . $data['foto_tim']);
        }
        move_uploaded_file($_FILES['foto_tim']['tmp_name'], $upload_file);
    } else {
        $upload_file = $data['foto_tim'];
    }

    $query = "UPDATE `data` SET 
                nama_tim='$nama_tim', 
                email='$email', 
                game='$game',
                foto_tim='$upload_file', 
                player1='{$_POST['player1']}', id_p1='{$_POST['id_p1']}',
                player2='{$_POST['player2']}', id_p2='{$_POST['id_p2']}',
                player3='{$_POST['player3']}', id_p3='{$_POST['id_p3']}',
                player4='{$_POST['player4']}', id_p4='{$_POST['id_p4']}',
                player5='{$_POST['player5']}', id_p5='{$_POST['id_p5']}'
              WHERE id_tim=$id_tim";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
        alert('Data berhasil diperbarui');
        document.location.href = 'lihat_data.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal diperbarui');
        document.location.href = 'edit.php?id_tim=$id_tim';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Tim Lomba</title>
    <link rel="stylesheet" href="css/lomba.css">
</head>
<body>
    <main class="data-lomba-section">
        <h1 class="data-lomba-title">Edit Data Tim Lomba Informatics Cup</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-field">
                <label for="nama_tim" class="label-field">Nama Tim</label>
                <input type="text" name="nama_tim" id="nama_tim" value="<?= h($data['nama_tim']) ?>" required>
            </div>
            <div class="input-field">
                <label for="game" class="label-field">Game</label>
                <select name="game" id="game" required>
                    <option value="free-fire" <?= $data['game'] == 'free-fire' ? 'selected' : '' ?>>Free Fire</option>
                    <option value="pubg" <?= $data['game'] == 'pubg' ? 'selected' : '' ?>>PUBG</option>
                    <option value="valorant" <?= $data['game'] == 'valorant' ? 'selected' : '' ?>>Valorant</option>
                    <option value="mobile-legends" <?= $data['game'] == 'mobile-legends' ? 'selected' : '' ?>>Mobile Legends</option>
                </select>
            </div>
            <div class="input-field">
                <label for="email" class="label-field">Email Kontak</label>
                <input type="email" name="email" id="email" value="<?= h($data['email']) ?>" required>
            </div>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <div class="input-field">
                    <label for="player<?= $i; ?>" class="label-field">Nama Anggota <?= $i; ?></label>
                    <input type="text" name="player<?= $i; ?>" id="player<?= $i; ?>" value="<?= h($data["player$i"]) ?>" required>
                </div>
                <div class="input-field">
                    <label for="id_p<?= $i; ?>" class="label-field">ID Player <?= $i; ?></label>
                    <input type="text" name="id_p<?= $i; ?>" id="id_p<?= $i; ?>" value="<?= h($data["id_p$i"]) ?>" required>
                </div>
            <?php endfor; ?>
            <div class="input-field">
                <label for="foto_tim" class="label-field">Foto Tim</label>
                <input type="file" name="foto_tim" id="foto_tim" accept="image/*">
                <p>Foto saat ini: <?= $data['foto_tim'] ? '<img src="uploads/'.$data['foto_tim'].'" width="100" />' : 'Tidak ada foto'; ?></p>
            </div>
            <div class="input-field">
                <button type="submit" name="edit" class="btn-submit">Simpan Perubahan</button>
            </div>
        </form>
        <div class="container">
            <a href="lihat_data.php">
                <button class="back"><p>Kembali ke Beranda</p></button>
            </a>
        </div>
    </main>
</body>
</html>

<?php
require 'konek.php'; 

$sql = "SELECT * FROM `data`";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data Tim Lomba</title>
    <link rel="stylesheet" href="css/lomba.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .team-photo {
            max-width: 100px;
            max-height: 100px;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .actions form {
            display: inline;
        }
    </style>
</head>
<body>
    <main class="data-lomba-section">
        <h1 class="data-lomba-title">Data Tim Lomba Informatics Cup</h1>
        
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <tr>
                    <th>Nama Tim</th>
                    <th>Email</th>
                    <th>Game</th>
                    <th>Anggota Tim</th>
                    <th>Foto Tim</th>
                    <th>Aksi</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= h($row['nama_tim']) ?></td>
                        <td><?= h($row['email']) ?></td>
                        <td><?= h($row['game']) ?></td>
                        <td>
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <p><?= h($row["player$i"]) ?> (ID: <?= h($row["id_p$i"]) ?>)</p>
                            <?php endfor; ?>
                        </td>
                        <td>
                            <?php if (!empty($row['file_path'])): ?>
                                <img src="images/<?= h($row['file_path']) ?>" alt="Foto Tim <?= h($row['nama_tim']) ?>" class="team-photo">
                            <?php else: ?>
                                <p>Tidak ada foto</p>
                            <?php endif; ?>
                        </td>
                        <td class="actions">
                            <form action="update.php" method="post" style="display:inline;">
                                <input type="hidden" name="id_tim" value="<?= $row['id_tim'] ?>">
                                <button type="submit" class="button" onclick="return confirm('Yakin ingin mengedit tim ini?')">Edit</button>
                            </form>
                            <form action="delete.php" method="post" style="display:inline;">
                                <input type="hidden" name="id_tim" value="<?= $row['id_tim'] ?>">
                                <button type="submit" class="button" onclick="return confirm('Yakin ingin menghapus tim ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>Tidak ada data tim yang tersedia.</p>
        <?php endif; ?>

        <div class="container">
            <a href="index.html">
                <button class="back"><p>Kembali ke Beranda</p></button>
            </a>
        </div>
    </main>
    <script src="script/lihat_data.js"></script>
</body>
</html>

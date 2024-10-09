<?php
require 'konek.php';

$query = "SELECT * FROM tim";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tim</title>
</head>
<body>
    <h1>Data Tim</h1>
    <a href="tambah.php">Tambah Data</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Tim</th>
            <th>Game</th>
            <th>Email</th>
            <th>Player 1</th>
            <th>ID Player 1</th>
            <th>Player 2</th>
            <th>ID Player 2</th>
            <th>Player 3</th>
            <th>ID Player 3</th>
            <th>Player 4</th>
            <th>ID Player 4</th>
            <th>Player 5</th>
            <th>ID Player 5</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; while ($tim = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $tim['nama_tim']; ?></td>
            <td><?= $tim['game']; ?></td>
            <td><?= $tim['email']; ?></td>
            <td><?= $tim['player1']; ?></td>
            <td><?= $tim['id_p1']; ?></td>
            <td><?= $tim['player2']; ?></td>
            <td><?= $tim['id_p2']; ?></td>
            <td><?= $tim['player3']; ?></td>
            <td><?= $tim['id_p3']; ?></td>
            <td><?= $tim['player4']; ?></td>
            <td><?= $tim['id_p4']; ?></td>
            <td><?= $tim['player5']; ?></td>
            <td><?= $tim['id_p5']; ?></td>
            <td>
                <a href="edit.php?id=<?= $tim['id_tim']; ?>">Edit</a> |
                <a href="delete.php?id=<?= $tim['id_tim']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

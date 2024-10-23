<?php
require 'konek.php';

$search = '';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM data WHERE nama_tim LIKE '%$search%' OR game LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pencarian Tim</title>
</head>
<body>
    <form method="get" action="search.php">
        <input type="text" name="search" placeholder="Cari tim atau game..." value="<?= h($search) ?>">
        <button type="submit">Cari</button>
    </form>

    <?php if (isset($result) && mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>Nama Tim</th>
                <th>Email</th>
                <th>Game</th>
                <th>Anggota Tim</th>
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
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Tidak ada hasil yang ditemukan.</p>
    <?php endif; ?>
</body>
</html>

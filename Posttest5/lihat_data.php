<?php
require 'konek.php';

// Mengambil data pendaftar dari tabel 'tim'
$query = "SELECT * FROM tim";
$result = mysqli_query($conn, $query);

$data_lomba = [];
while ($row = mysqli_fetch_array($result)) {
    $data_lomba[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar Lomba</title>
    <link rel="stylesheet" href="css/tabel.css">
</head>
<body>
    <header>
        <h1>Data Pendaftar Lomba Informatics Cup</h1>
    </header>
    
    <div class="container">
        <a href="tambah.php">
            <button class="tambah">
                <p>Tambah</p>
            </button>
        </a>
        <a href="index.php">
            <button class="back">
                <p>Back</p>
            </button>
        </a>
    </div>

    <table class="data-lomba">
        <thead>
            <tr class="data-lomba-row">
                <th class="data-lomba-header">No</th>
                <th class="data-lomba-header">Nama Tim</th>
                <th class="data-lomba-header">Game</th>
                <th class="data-lomba-header">Email</th>
                <th class="data-lomba-header">Player 1</th>
                <th class="data-lomba-header">ID Player 1</th>
                <th class="data-lomba-header">Player 2</th>
                <th class="data-lomba-header">ID Player 2</th>
                <th class="data-lomba-header">Player 3</th>
                <th class="data-lomba-header">ID Player 3</th>
                <th class="data-lomba-header">Player 4</th>
                <th class="data-lomba-header">ID Player 4</th>
                <th class="data-lomba-header">Player 5</th>
                <th class="data-lomba-header">ID Player 5</th>
                <th class="data-lomba-header">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1; foreach ($data_lomba as $tim) : ?>
                <tr class="data-lomba-row">
                    <td class="data-lomba-data"><?php echo $i; ?></td>
                    <td class="data-lomba-data"><?php echo $tim['nama_tim']; ?></td>
                    <td class="data-lomba-data"><?php echo $tim['game']; ?></td>
                    <td class="data-lomba-data"><?php echo $tim['email']; ?></td>
                    <td class="data-lomba-data"><?php echo $tim['player1']; ?></td>
                    <td class="data-lomba-data"><?php echo $tim['id_p1']; ?></td>
                    <td class="data-lomba-data"><?php echo $tim['player2']; ?></td>
                    <td class="data-lomba-data"><?php echo $tim['id_p2']; ?></td>
                    <td class="data-lomba-data"><?php echo $tim['player3']; ?></td>
                    <td class="data-lomba-data"><?php echo $tim['id_p3']; ?></td>
                    <td class="data-lomba-data"><?php echo $tim['player4']; ?></td>
                    <td class="data-lomba-data"><?php echo $tim['id_p4']; ?></td>
                    <td class="data-lomba-data"><?php echo $tim['player5']; ?></td>
                    <td class="data-lomba-data"><?php echo $tim['id_p5']; ?></td>
                    <td class="data-lomba-data">
                        <div class="button-UD">
                            <a href="edit.php?id=<?php echo $tim['id_tim']; ?>">
                                <button class="edit-data">
                                    <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                                </button>
                            </a>
                            <a href="delete.php?id=<?php echo $tim['id_tim']; ?>" onclick="return confirm('Yakin ingin menghapus?')">
                                <button class="hapus-data">
                                    <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
    <script src="script/tabel.js"></script>
</body>
</html>

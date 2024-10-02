<?php
    $nama_tim = $email = $game = "";
    $anggota_tim = array();
    $id_game = array();
    $checkbox_persetujuan = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_tim = htmlspecialchars($_POST['nama_tim']);
        $email = htmlspecialchars($_POST['email']);
        $game = htmlspecialchars($_POST['game']);
        
        for ($i = 1; $i <= 5; $i++) {
            $anggota_tim[$i] = htmlspecialchars($_POST['anggota_tim_' . $i]);
            $id_game[$i] = htmlspecialchars($_POST['id_game_' . $i]);
        }

        $checkbox_persetujuan = isset($_POST['persetujuan']);
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PostTest 4</title>
    <link rel="stylesheet" href="css/lomba.css">
</head>
<body>
    <header>
        <h1>Pendaftaran Informatics <span>Cup</span></h1>
    </header>
    
    <main>
        <form id="registration-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h2>Isi Form Pendaftaran</h2>
            <label for="nama_tim">Nama Tim:</label>
            <input type="text" id="nama_tim" name="nama_tim" required>

            <label for="game">Game:</label>
            <select id="game" name="game" required>
                <option value="free-fire">Free Fire</option>
                <option value="pubg">PUBG</option>
                <option value="valorant">Valorant</option>
                <option value="mobile-legends">Mobile Legends</option>
            </select>

            <label for="email">Email Kontak:</label>
            <input type="email" id="email" name="email" required>

            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label for="anggota_tim_<?php echo $i; ?>">Nama Anggota <?php echo $i; ?>:</label>
                <input type="text" id="anggota_tim_<?php echo $i; ?>" name="anggota_tim_<?php echo $i; ?>" required>

                <label for="id_game_<?php echo $i; ?>">ID Game Anggota <?php echo $i; ?>:</label>
                <input type="text" id="id_game_<?php echo $i; ?>" name="id_game_<?php echo $i; ?>" required>
            <?php endfor; ?>

            <label>
                <input type="checkbox" name="persetujuan" <?php echo $checkbox_persetujuan ? 'checked' : ''; ?> required>
                Saya menyetujui syarat dan ketentuan yang berlaku.
            </label>

            <button type="submit">Daftar</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <h3>Hasil Pendaftaran:</h3>
            <p><strong>Nama Tim:</strong> <?php echo $nama_tim; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Game:</strong> <?php echo $game; ?></p>
            <h4><strong>Nama Anggota Tim:</strong></h4>
            <ul>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <li>Anggota <?php echo $i; ?>: <?php echo $anggota_tim[$i]; ?>, ID Game: <?php echo $id_game[$i]; ?></li>
                <?php endfor; ?>
            </ul>
            <p><?php echo $checkbox_persetujuan ? "Anda telah menyetujui syarat dan ketentuan." : "Anda belum menyetujui syarat dan ketentuan."; ?></p>
        <?php endif; ?>

        <div id="result"></div>
    </main>

    <script src="script/lomba.js"></script>
</body>
</html>

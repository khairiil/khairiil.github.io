<?php
    $nama_tim = $email = "";
    $anggota_tim = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_tim = htmlspecialchars($_POST['nama_tim']);
        $email = htmlspecialchars($_POST['email']);
        
        for ($i = 1; $i <= 7; $i++) {
            $anggota_tim[$i] = htmlspecialchars($_POST['anggota_tim_' . $i]);
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Informatics Cup</title>
</head>
<body>
    <header class="navbar-section">
        <div class="navbar-logo">Informatics<span>Cup</span></div>
        <button class="hamburger">☰</button>
        <nav>
            <ul class="navbar-item" id="navbar-list">
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#lomba">Lomba</a></li>
                <li><a href="#tentang-saya">Tentang Saya</a></li>
            </ul>
        </nav>
        <button class="toggle-mode" id="toggle-mode">
            <i class="fas fa-moon"></i>
        </button>        
    </header>

    <div class="header">
        <h1>Selamat Datang di Informatics<span>Cup</span></h1>
        <p>Daftarkan timmu dan buktikan kehebatanmu di dunia E-Sport!</p>
    </div>

    <section id="beranda" class="hero">
        <div class="content">
            <h1>DAFTARKAN TIMMU <span>SEKARANG</span></h1>
            <p>Di Kompetisi E-Sport Terbesar Di Universitas Mulawarman</p>
            <a href="#lomba" class="call">Lihat Lomba</a>
        </div>
    </section>

    <section id="pendaftaran" class="pendaftaran">
        <h2>Form <span>Pendaftaran</span></h2>
        <p>Daftarkan tim E-Sport kamu sekarang juga dengan mengisi form di bawah ini:</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="nama_tim">Nama Tim:</label>
            <input type="text" id="nama_tim" name="nama_tim" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <?php for ($i = 1; $i <= 7; $i++): ?>
                <label for="anggota_tim_<?php echo $i; ?>">Nama Anggota Tim <?php echo $i; ?>:</label>
                <input type="text" id="anggota_tim_<?php echo $i; ?>" name="anggota_tim_<?php echo $i; ?>" required><br><br>
            <?php endfor; ?>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Daftar">
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <h3>Hasil Pendaftaran:</h3>
            <p>Nama Tim: <?php echo $nama_tim; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <h4>Nama Anggota Tim:</h4>
            <ul>
                <?php for ($i = 1; $i <= 7; $i++): ?>
                    <li>Anggota <?php echo $i; ?>: <?php echo $anggota_tim[$i]; ?></li>
                <?php endfor; ?>
            </ul>
        <?php endif; ?>
    </section>

    <footer class="footer">
        <p>&copy; <?php echo $nama; ?> <span>2309106031</span> - <?php echo $tahun; ?></p>
        <div class="footer-links">
            <a href="#beranda">Beranda</a>
            <a href="#lomba">Lomba</a>
            <a href="#tentang-saya">Tentang Saya</a>
        </div>
    </footer>

    <script src="script/script.js"></script>
</body>
</html>

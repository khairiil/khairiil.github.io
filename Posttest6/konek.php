<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'pendaftaran_lomba';

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

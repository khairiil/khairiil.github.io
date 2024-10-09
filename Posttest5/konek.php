<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db_name = 'pendaftaran_lomba';

$conn = mysqli_connect($server, $username, $password, $db_name);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

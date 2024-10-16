<?php
require 'konek.php';

if (isset($_POST['id_tim'])) {
    $id_tim = $_POST['id_tim'];

    // Ambil data tim untuk menghapus file gambar
    $query = "SELECT file_path FROM `data` WHERE id_tim = $id_tim";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row && !empty($row['file_path'])) {
        $filePath = 'images/' . $row['file_path'];
        
        // Hapus file jika ada
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // Hapus data dari database
    $query = "DELETE FROM `data` WHERE id_tim = $id_tim";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = 'lihat_data.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus');
            document.location.href = 'lihat_data.php';
        </script>";
    }
}
?>

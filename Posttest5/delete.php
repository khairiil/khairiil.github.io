<?php
require 'konek.php';

$id = $_GET['id'];

$query = "DELETE FROM mhs WHERE id = $id";
if (mysqli_query($conn, $query)) {
    header('Location: index.php');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>

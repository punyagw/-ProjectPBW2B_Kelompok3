<?php
include 'koneksi.php';

$id = $_GET['id'];
$koneksi->query("DELETE FROM donasi WHERE id = $id");

header("Location: halamanutama.php");
exit;
?>

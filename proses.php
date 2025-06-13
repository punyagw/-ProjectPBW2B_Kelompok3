<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$pesan = $_POST['pesan'];
$metode = $_POST['metode'];
$status = $_POST['status'];
$status = $_POST['status']; // Pastikan form mengirim ini
$tanggal = date("Y-m-d H:i:s");

$query = "INSERT INTO donasi (nama_donatur, jumlah_donasi, pesan, metode_pembayaran, status_pembayaran, tanggal_donasi)
        VALUES ('$nama', '$jumlah', '$pesan', '$metode', '$status', '$tanggal')";

if ($koneksi->query($query)) {
    header("Location: halamanutama.php"); // Ganti jika perlu
    exit;
} else {
    echo "Gagal menyimpan: " . $koneksi->error;
}
?>

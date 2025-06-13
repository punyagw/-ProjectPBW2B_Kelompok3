<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = $_POST['id'];
    $nama   = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $pesan  = $_POST['pesan'];

    // Update data ke database
    $query = $koneksi->query("UPDATE donasi SET 
        nama_donatur = '$nama', 
        jumlah_donasi = '$jumlah', 
        pesan = '$pesan' 
        WHERE id = $id
    ");

    if ($query) {
        header("Location: halamanutama.php?pesan=update-berhasil");
        exit;
    } else {
        echo "Update gagal: " . $koneksi->error;
    }
} else {
    echo "Akses tidak sah.";
}

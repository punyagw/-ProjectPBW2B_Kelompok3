<?php
include 'koneksi.php';

// Ambil ID dari parameter URL
$id = $_GET['id'] ?? 0;

// Ambil data donasi berdasarkan ID
$query = $koneksi->query("SELECT * FROM donasi WHERE id = $id");
$data = $query->fetch_assoc();

// Cek jika data tidak ditemukan
if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Donasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4">Edit Donasi</h2>

    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <div class="mb-3">
            <label class="form-label">Nama Donatur</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama_donatur']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Donasi (Rp)</label>
            <input type="number" name="jumlah" value="<?= $data['jumlah_donasi'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pesan</label>
            <textarea name="pesan" class="form-control"><?= htmlspecialchars($data['pesan']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Donasi</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>

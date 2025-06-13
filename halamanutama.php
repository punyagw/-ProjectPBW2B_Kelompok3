<?php
include 'session.php';
include 'koneksi.php';
// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
    // Jika belum, arahkan ke halaman login
    header("Location: cobaproyek.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Donasi Kotak Amal Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="text-center mb-4">Donasi Kotak Amal Online</h2>

    <!-- Form Donasi -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Form Donasi</div>
        <div class="card-body">
            <form action="proses.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Donatur</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Donasi (Rp)</label>
                    <input type="number" name="jumlah" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pesan</label>
                    <textarea name="pesan" class="form-control" rows="3"></textarea>
                </div>
                 <label class="form-label">Metode Pembayaran</label>
                   <select name="metode" class="form-select" required>
        <option value="">-- Pilih Metode --</option>
        <option value="Transfer Bank">Transfer Bank</option>
        <option value="E-Wallet (OVO, GoPay, DANA)">E-Wallet (OVO, GoPay, DANA)</option>
        <option value="QRIS">QRIS</option>
    </select>
    <input type="hidden" name="status" value="Berhasil">
       <button type="submit" class="btn btn-success">Kirim Donasi</button>
                <div class="mb-3">
</div>

            </form>
        </div>
    </div>

    <!-- Daftar Donasi -->
    <h4 class="mb-3">Daftar Donasi Terkini</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>Nama</th>
                    <th>Jumlah (Rp)</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                    <th>Metode</th>
                    <th>status_pembayaran</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $data = $koneksi->query("SELECT * FROM donasi ORDER BY tanggal_donasi DESC");
            while ($row = $data->fetch_assoc()):
            ?> <tr>
<?php
$data = $koneksi->query("SELECT * FROM donasi ORDER BY tanggal_donasi DESC");
while ($row = $data->fetch_assoc()):
?> 
<tr>
    <td><?= htmlspecialchars($row['nama_donatur']) ?></td>
    <td class="text-end"><?= number_format($row['jumlah_donasi'], 0, ',', '.') ?></td>
    <td><?= htmlspecialchars($row['pesan']) ?></td>
    <td><?= $row['tanggal_donasi'] ?></td>
    <td class="text-center">
        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning mb-1">Edit</a><br>
        <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
    </td>
    <td><?= htmlspecialchars($row['metode_pembayaran']) ?></td>
    <td><?= htmlspecialchars($row['status_pembayaran']) ?></td>
</tr>
<?php endwhile; ?>


</tr>

            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<a href="logout.php" class="btn btn-danger mb-3">Logout</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

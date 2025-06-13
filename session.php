<?php
session_start();

if (!isset($_SESSION['login'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: index.php");
    exit;
}
?>

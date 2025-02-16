<?php
// File: delete_song.php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM lagu WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Lagu berhasil dihapus!'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus lagu: " . mysqli_error($conn) . "'); window.location.href='admin_dashboard.php';</script>";
    }
} else {
    echo "<script>alert('ID lagu tidak ditemukan!'); window.location.href='admin_dashboard.php';</script>";
}
?>

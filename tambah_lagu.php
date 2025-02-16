<?php
// File: tambah_lagu.php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $nada_dasar = $_POST['nada_dasar'];
    $lirik = $_POST['lirik'];

    $query = "INSERT INTO lagu (judul, nada_dasar, lirik) VALUES ('$judul', '$nada_dasar', '$lirik')";

    if (mysqli_query($conn, $query)) {
        echo "<div class='alert alert-success'>Lagu berhasil ditambahkan!</div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan lagu: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lagu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4 shadow-lg w-50">
        <h3 class="text-center mb-4">Tambah Lagu</h3>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Judul Lagu</label>
                <input type="text" class="form-control" name="judul" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nada Dasar</label>
                <input type="text" class="form-control" name="nada_dasar" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Lirik</label>
                <textarea class="form-control" name="lirik" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">Tambah Lagu</button>
        </form>
    </div>
</body>
</html>

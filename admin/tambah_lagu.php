<?php
// File: tambah_lagu.php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

include 'koneksi.php';
$alert = ""; // Variabel untuk menyimpan pesan alert

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $nada_dasar = mysqli_real_escape_string($conn, $_POST['nada_dasar']);
    $penyanyi = mysqli_real_escape_string($conn, $_POST['penyanyi']);
    $lirik = mysqli_real_escape_string($conn, $_POST['lirik']);

    $query = "INSERT INTO lagu (judul, nada_dasar, penyanyi, lirik) VALUES ('$judul', '$nada_dasar', '$penyanyi', '$lirik')";

    if (mysqli_query($conn, $query)) {
        $alert = "<div class='alert alert-success text-center'>Lagu berhasil ditambahkan!</div>";
    } else {
        $alert = "<div class='alert alert-danger text-center'>Gagal menambahkan lagu: " . mysqli_error($conn) . "</div>";
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
    <link rel="stylesheet" href="tambah.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4 shadow-lg w-100" style="max-width: 500px;">
        <h3 class="text-center mb-3">Tambah Lagu</h3>

        <!--  Alert  berada di dalam card -->
        <?php if (!empty($alert)) echo "<div class='mb-3'>$alert</div>"; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Judul Lagu</label>
                <input type="text" class="form-control" name="judul" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Penyanyi</label>
                <input type="text" class="form-control" name="penyanyi" required>
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
            <a href="admin_dashboard.php" class="btn btn-secondary w-100 mt-2">Kembali ke Dashboard</a>
        </form>
    </div>
</body>
</html>

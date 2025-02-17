<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}
include 'koneksi.php';

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: admin_login.php');
    exit;
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE FROM lagu WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Lagu berhasil dihapus!'); window.location='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus lagu!');</script>";
    }
}

$query = "SELECT * FROM lagu ORDER BY judul ASC";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus lagu ini?')) {
                window.location.href = 'admin_dashboard.php?hapus=' + id;
            }
        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="admin_dashboard.php">Dashboard Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
            </ul>
            <form method="POST" class="mb-3">
            <button type="submit" name="logout" class="btn btn-danger">Logout</button>
        </form>
        </div>
    </div>
</nav>
<div class="container container-custom ">
        <a href="tambah_lagu.php" class="btn btn-custom-add mb-3">Tambah Lagu</a>
        <table class="table table-striped table-custom">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Penyanyi</th>
                    <th>Nada Dasar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                <td><?php echo $i++; ?></td>
                    <td><?php echo $row['judul']; ?></td>
                    <td><?php echo $row['penyanyi']; ?></td>
                    <td><?php echo $row['nada_dasar']; ?></td>
                    <td>
                        <a href="edit_lagu.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <button onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

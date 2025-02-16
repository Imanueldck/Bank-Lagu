<?php
// File: edit_lagu.php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM lagu WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $lagu = mysqli_fetch_assoc($result);
} else {
    echo "<div class='alert alert-danger'>ID lagu tidak ditemukan!</div>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $nada_dasar = $_POST['nada_dasar'];
    $lirik = $_POST['lirik'];

    $query = "UPDATE lagu SET judul='$judul', nada_dasar='$nada_dasar', lirik='$lirik' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        $lagu = ['id' => $id, 'judul' => $judul, 'nada_dasar' => $nada_dasar, 'lirik' => $lirik];
        echo "<div class='alert alert-success'>Lagu berhasil diubah!</div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal mengubah lagu: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lagu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4 shadow-lg w-50">
        <h3 class="text-center mb-4">Edit Lagu</h3>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $lagu['id']; ?>">
            <div class="mb-3">
                <label class="form-label">Judul Lagu</label>
                <input type="text" class="form-control" name="judul" value="<?php echo htmlspecialchars($lagu['judul']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nada Dasar</label>
                <input type="text" class="form-control" name="nada_dasar" value="<?php echo htmlspecialchars($lagu['nada_dasar']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Lirik</label>
                <textarea class="form-control" name="lirik" rows="5" required><?php echo htmlspecialchars($lagu['lirik']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Simpan Perubahan</button>
            <a href="admin_dashboard.php" class="btn btn-secondary w-100">Kembali ke Dashboard</a>
        </form>
    </div>
</body>
</html>

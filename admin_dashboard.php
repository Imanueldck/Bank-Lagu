<?php
// File: admin_dashboard.php
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

$query = "SELECT * FROM lagu";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Dashboard Admin</h1>
        <form method="POST" class="mb-3">
            <button type="submit" name="logout" class="btn btn-danger">Logout</button>
        </form>
        <a href="tambah_lagu.php" class="btn btn-success mb-3">Tambah Lagu</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Nada Dasar</th>
                    <th>Lirik</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['judul']; ?></td>
                    <td><?php echo $row['nada_dasar']; ?></td>
                    <td><?php echo nl2br($row['lirik']); ?></td>
                    <td>
                        <a href="edit_song.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="delete_song.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

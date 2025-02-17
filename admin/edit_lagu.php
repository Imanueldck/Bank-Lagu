<?php
// File: edit_lagu.php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

include 'koneksi.php';
$alert = ""; // Variabel untuk menyimpan pesan alert

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM lagu WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $lagu = mysqli_fetch_assoc($result);
} else {
    $alert = "<div class='alert alert-danger text-center'>ID lagu tidak ditemukan!</div>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $nada_dasar = mysqli_real_escape_string($conn, $_POST['nada_dasar']);
    $penyanyi = mysqli_real_escape_string($conn, $_POST['penyanyi']);
    $lirik = mysqli_real_escape_string($conn, str_replace(array("\r\n", "\r", "\n"), "\n", $_POST['lirik']));

    $query = "UPDATE lagu SET judul='$judul', nada_dasar='$nada_dasar', penyanyi='$penyanyi', lirik='$lirik' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        $alert = "<div class='alert alert-success text-center'>Lagu berhasil diubah!</div>";
        echo "<script>setTimeout(function(){ window.location.href = 'admin_dashboard.php'; }, 2000);</script>";
    } else {
        $alert = "<div class='alert alert-danger text-center'>Gagal mengubah lagu: " . mysqli_error($conn) . "</div>";
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
    <style>
        body {
            background-color: #f4f6f9;
        }

        .custom-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding-top: 50px;
        }

        .card {
            max-width: 500px;
            width: 100%;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            border-radius: 10px;
        }

        .card h3 {
            color: #1236a4;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .alert {
            margin-bottom: 20px;
            padding: 15px;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #1236a4;
            border: none;
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 8px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 8px;
        }

        .form-label {
            font-size: 1rem;
            color: #333;
        }

        .form-control {
            font-size: 1rem;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #1236a4;
            box-shadow: 0 0 0 0.2rem rgba(18, 54, 164, 0.25);
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        @media (max-width: 576px) {
            .card {
                padding: 20px;
                margin: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="custom-container">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card shadow-lg">
                <h3 class="text-center mb-3">Edit Lagu</h3>

                <!-- ✅ Alert sekarang berada di dalam card -->
                <?php if (!empty($alert)) echo "<div class='mb-3'>$alert</div>"; ?>

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
                        <label class="form-label">Penyanyi</label>
                        <input type="text" class="form-control" name="penyanyi" value="<?php echo htmlspecialchars($lagu['penyanyi']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lirik</label>
                        <textarea class="form-control" name="lirik" rows="5" required><?php echo htmlspecialchars($lagu['lirik']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-2">Simpan Perubahan</button>
                    <a href="admin_dashboard.php" class="btn btn-secondary w-100">Kembali ke Dashboard</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

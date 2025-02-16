<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Lagu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #1236a4;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .btn-login {
            background-color: #ed2025;
            border: none;
            color: #fff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Bank Lagu</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                </ul>
                <a href="admin_login.php" class="btn btn-login">Login</a>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1>Daftar Lagu</h1>
        <form method="GET" action="index.php" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="cari" placeholder="Cari lagu...">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
        <?php
        include 'koneksi.php';
        $cari = isset($_GET['cari']) ? $_GET['cari'] : '';
        $query = "SELECT * FROM lagu WHERE judul LIKE '%$cari%'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<h2>{$row['judul']}</h2>";
            echo "<p><strong>Nada Dasar:</strong> {$row['nada_dasar']}</p>";
            echo "<pre>{$row['lirik']}</pre><hr>";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

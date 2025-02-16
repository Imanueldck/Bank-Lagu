<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Lagu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Bank Lagu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    
                </li>
            </ul>
            <a href="admin_login.php" class="btn btn-danger">Login</a>
        </div>
    </div>
</nav>

    <div class="hero">
        <div class="container">
        <h1>Selamat Datang di Bank Lagu</h1>
        <p>Temukan dan nikmati berbagai lirik serta nada dasar lagu favorit Anda.</p>
        <form method="GET" action="index.php" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="cari" placeholder="Cari lagu...">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
        </div>
        
    </div>

    <div class="container mt-4">
        
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

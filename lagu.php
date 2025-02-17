<?php
include './admin/koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM lagu WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $lagu = mysqli_fetch_assoc($result);
} else {
    echo "<div class='alert alert-danger'>ID lagu tidak ditemukan!</div>";
    exit();
}

// Query untuk menampilkan lagu-lagu selain lagu yang sedang ditampilkan
$rekomendasi_query = "SELECT * FROM lagu WHERE id != '$id' LIMIT 3";
$rekomendasi_result = mysqli_query($conn, $rekomendasi_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($lagu['judul']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="lagu.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Bank Lagu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto"></ul>
            <a href="./admin/admin_login.php" class="btn btn-danger">Login</a>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h2 class="mb-3 lagu-title">Judul: <?php echo htmlspecialchars($lagu['judul']); ?></h2>
    <h4 class="mb-3 lagu-info">Penyanyi: <?php echo htmlspecialchars($lagu['penyanyi']); ?></h4>
    <p class="mb-3 lagu-info"><strong>Nada Dasar:</strong> <?php echo htmlspecialchars($lagu['nada_dasar']); ?></p>
    <h5 class="mb-3 text-secondary">Lirik:</h5>
    <pre class="lirik-box"><?php echo htmlspecialchars($lagu['lirik']); ?></pre>
    <a href="index.php" class="btn btn-back mt-3">Kembali ke Beranda</a>

    <h3 class="mt-5 rekomendasi-title">Rekomendasi Lagu Lainnya</h3>
    <div class="row mt-4 rekomendasi-row">
    <?php while ($rekomendasi = mysqli_fetch_assoc($rekomendasi_result)) { ?>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm rekomendasi-card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($rekomendasi['judul']); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($rekomendasi['penyanyi']); ?></h6>
                    <p class="card-text"><strong>Nada Dasar:</strong> <?php echo htmlspecialchars($rekomendasi['nada_dasar']); ?></p>
                    <a href="lagu.php?id=<?php echo $rekomendasi['id']; ?>" class="btn btn-primary">Lihat Lagu</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<footer class=" text-white py-4 mt-5">
    <div class="container">
        <h3>Bank Lagu</h3>
        <p>"Bank Lagu adalah platform sederhana yang menyediakan kumpulan lirik</p>
        <p> dan nada dasar lagu Rohani Kristen. Temukan, cari, dan nikmati </p>
        <p>berbagai lagu dengan mudah di satu tempat."</p>
        <hr>
        <div class="d-flex justify-content-end pt-4 flex-column flex-md-row">
        <p class="copyright">Copyright &copy; <span id="year"></span> Bank Lagu. Imanuel Dimas.</p>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

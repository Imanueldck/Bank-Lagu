<?php
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
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-3 text-primary">Judul: <?php echo htmlspecialchars($lagu['judul']); ?></h2>
    <h4 class="mb-3">Penyanyi: <?php echo htmlspecialchars($lagu['penyanyi']); ?></h4>
    <p class="mb-3"><strong>Nada Dasar:</strong> <?php echo htmlspecialchars($lagu['nada_dasar']); ?></p>
    <h5 class="mb-3 text-secondary">Lirik:</h5>
    <pre class="bg-light p-3 border rounded"><?php echo htmlspecialchars($lagu['lirik']); ?></pre>
    <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Beranda</a>

    <h3 class="mt-5">Rekomendasi Lagu Lainnya</h3>
    <div class="row mt-4">
        <?php while ($rekomendasi = mysqli_fetch_assoc($rekomendasi_result)) { ?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

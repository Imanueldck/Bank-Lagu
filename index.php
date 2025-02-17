<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Lagu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
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

<div class="hero text-center bg-light py-5">
    <div class="container">
    <h1>Selamat Datang di <span>Bank Lagu</span></h1>
        <p>Temukan dan nikmati berbagai lirik serta nada dasar lagu favorit Anda.</p>
        <form method="GET" action="index.php" class="mb-3">
            <div class="input-group mx-auto">
                <input type="text" class="form-control" name="cari" placeholder="Cari lagu...">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <?php
        include './admin/koneksi.php';

        // Pagination setup
        $perPage = 6; // Number of items per page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        // Search filter
        $cari = isset($_GET['cari']) ? $_GET['cari'] : '';

        // Query with LIMIT for pagination
        $query = "SELECT * FROM lagu WHERE judul LIKE '%$cari%' ORDER BY judul ASC LIMIT $offset, $perPage";
        $countQuery = "SELECT COUNT(*) as total FROM lagu WHERE judul LIKE '%$cari%'";
        $result = mysqli_query($conn, $query);

        // Display the songs
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='col-md-4 mb-3'>
                    <div class='card shadow-sm custom-card'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['judul']}</h5>
                            <h6 class='card-subtitle mb-2 text-muted'>{$row['penyanyi']}</h6>
                            <p class='card-text'><strong>Nada Dasar:</strong> {$row['nada_dasar']}</p>
                            <a href='lagu.php?id={$row['id']}' class='btn btn-primary'>Lihat Lagu</a>
                        </div>
                    </div>
                  </div>";
        }

        // Pagination - Get total number of songs
        $countQuery = "SELECT COUNT(*) as total FROM lagu WHERE judul LIKE '%$cari%'";
        $countResult = mysqli_query($conn, $countQuery);
        $totalSongs = mysqli_fetch_assoc($countResult)['total'];
        $totalPages = ceil($totalSongs / $perPage); // Total pages needed

        ?>
    </div>

    <!-- Pagination links -->
    <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center mt-4">
        <!-- Always show 'First' and 'Previous' buttons -->
        <li class="page-item">
            <a class="page-link" href="?page=1&cari=<?php echo urlencode($cari); ?>" aria-label="First">
                <span aria-hidden="true">&laquo;&laquo;</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="?page=<?php echo max($page - 1, 1); ?>&cari=<?php echo urlencode($cari); ?>" aria-label="Previous">
                <span aria-hidden="true">&lsaquo;</span>
            </a>
        </li>

        <!-- Page number links -->
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>&cari=<?php echo urlencode($cari); ?>"><?php echo $i; ?></a>
            </li>
        <?php } ?>

        <!-- Always show 'Next' and 'Last' buttons -->
        <li class="page-item">
            <a class="page-link" href="?page=<?php echo min($page + 1, $totalPages); ?>&cari=<?php echo urlencode($cari); ?>" aria-label="Next">
                <span aria-hidden="true">&rsaquo;</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="?page=<?php echo $totalPages; ?>&cari=<?php echo urlencode($cari); ?>" aria-label="Last">
                <span aria-hidden="true">&raquo;&raquo;</span>
            </a>
        </li>
    </ul>
    </nav>

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



<!-- Include Font Awesome for social media icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>
</body>
</html>

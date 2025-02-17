<?php

session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row && $password == $row['password']) {
        $_SESSION['admin'] = $username;
        header('Location: admin_dashboard.php');
    } else {
        echo "<div class='alert alert-danger' style='margin-top: 10px; padding: 10px; font-size: 1rem;'>Login gagal!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background-color: #f4f6f9;">
<div class="card p-4 shadow-lg w-100" style="max-width: 400px; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);">
        <h3 class="text-center mb-4" style="color: #1236a4; font-size: 1.8rem; font-weight: 700;">Login Admin</h3>
        <form action="admin_login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label" style="font-size: 1rem; color: #333;">Username</label>
                <input type="text" class="form-control" name="username" required style="font-size: 1rem; padding: 10px; border-radius: 8px; border: 1px solid #ddd; width: 100%; transition: border 0.3s ease;">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="font-size: 1rem; color: #333;">Password</label>
                <input type="password" class="form-control" name="password" required style="font-size: 1rem; padding: 10px; border-radius: 8px; border: 1px solid #ddd; width: 100%; transition: border 0.3s ease;">
            </div>
            <button type="submit" class="btn btn-primary w-100" style="background-color: #1236a4; color: white; font-size: 1.1rem; padding: 12px; border-radius: 8px; border: none; transition: background-color 0.3s ease;">
                Login
            </button>
        </form>
    </div>
    <!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

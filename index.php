<?php
require_once __DIR__ . '/pages/koneksi.php';

// halaman yang sedang dibuka (default: dashboard)
$page = $_GET['pages'] ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-expand bg-primary navbar-dark px-5">
        <a class="navbar-brand" href="index.php">Sata Mart</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Customer</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <!-- NAVIGASI (sidebar) -->
            <?php include __DIR__ . '/main.php'; ?>

            <!-- ISI HALAMAN -->
            <?php include __DIR__ . '/content.php'; ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

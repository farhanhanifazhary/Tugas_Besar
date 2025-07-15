<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    include 'login.php';
    exit();
}

include '../config/koneksi.php';
$admin_username = $_SESSION['admin_username'];
$page = $_GET['page'] ?? 'dashboard';
$page_file = "pages/{$page}.php";
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - EduSmart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/admin-style.css">
</head>
<body>

    <?php include 'templates/sidebar.php'; ?>

    <div class="main-content">
        <header class="main-content-header shadow-sm">
            <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
                <i class="bi bi-list fs-4"></i>
            </button>
        </header>
        
        <div class="p-4">
            <?php
                if (file_exists($page_file)) {
                    include $page_file;
                } else {
                    echo '<div class="alert alert-danger">Halaman tidak ditemukan.</div>';
                }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
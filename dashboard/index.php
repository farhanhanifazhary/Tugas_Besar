<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$nama_user = $_SESSION['user_nama'];
$sql_user = "SELECT foto_profil FROM farhan_user WHERE id = ?";
$stmt_user = $koneksi->prepare($sql_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$user_details = $stmt_user->get_result()->fetch_assoc();
$stmt_user->close();

?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - EduSmart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>

<?php include 'template/sidebar.php'; ?>

<header class="main-content-header shadow-sm">
    <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
        <i class="bi bi-list fs-4"></i>
    </button>
</header>

<?php
    $folder = basename($_GET['folder'] ?? 'pages');
    $file = basename($_GET['file'] ?? 'dashboard');

    $full_path = "$folder/$file.php";

    if(file_exists($full_path)) {
        include $full_path;
    } else {
        echo '<div class="main-content"><div class="alert alert-danger">Halaman tidak ditemukan.</div></div>';
    }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
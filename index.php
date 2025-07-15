<?php
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduSmart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/edu.css">
    <link rel="stylesheet" href="assets/css/terms-condition.css">
  </head>
  <body>
    <!-- Navbar -->
     <?php include 'templates/navbar.php'; ?>

    <!-- Content -->
    <?php
            $folder = basename($_GET['folder'] ?? 'pages');
            $page = basename($_GET['page'] ?? 'home');

            $file = $folder ? "$folder/$page.php" : "$page.php";

            if(file_exists($file)) {
                include $file;
            }else {
                echo "Halaman tidak ditemukan.";
            }
    ?>

    <!-- Sign In -->
    <?php include 'templates/signin.php'; ?>

    <!-- Sign Up -->
     <?php include 'templates/signup.php'; ?>
    
    <!-- Footer -->
     <?php include 'templates/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="assets/js/edu.js"></script>
  </body>
</html>
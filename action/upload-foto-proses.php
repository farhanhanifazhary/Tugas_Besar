<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['is_logged_in'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    
    $file = $_FILES['foto'];
    $target_dir = "../uploads/profiles/";
    
    $max_size = 2 * 1024 * 1024;
    if ($file['size'] > $max_size) {
        die("Error: Ukuran file terlalu besar. Maksimal 2MB.");
    }
    
    $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    $file_type = mime_content_type($file['tmp_name']);
    if (!in_array($file_type, $allowed_types)) {
        die("Error: Tipe file tidak diizinkan. Hanya JPEG, JPG, PNG, dan GIF.");
    }

    $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $new_filename = "user-" . $user_id . "-" . time() . "." . $file_extension;
    $target_file = $target_dir . $new_filename;

    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        
        $sql = "UPDATE farhan_user SET foto_profil = ? WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("si", $new_filename, $user_id);
        
        if ($stmt->execute()) {
            header("Location: ../dashboard/index.php?folder=pages&file=profile&status=upload_sukses");
            exit();
        } else {
            echo "Error: Gagal mengupdate database.";
        }
        $stmt->close();

    } else {
        echo "Error: Terjadi kesalahan saat meng-upload file.";
    }

} else {
    header("Location: ../dashboard/index.php?folder=pages&file=profile&status=upload_gagal");
    exit();
}

$koneksi->close();
?>
<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['is_logged_in']) || !isset($_SESSION['user_id'])) {
    header("Location: ../index.php?form_error=signin&message=login_required");
    exit();
}

if (!isset($_POST['kursus_jadwal_id']) || !isset($_FILES['bukti_pembayaran'])) {
    die("Error: Data tidak lengkap.");
}

$user_id = $_SESSION['user_id'];
$kursus_jadwal_id = $_POST['kursus_jadwal_id'];
$file = $_FILES['bukti_pembayaran'];

$sql_check = "SELECT id FROM farhan_pendaftaran WHERE user_id = ? AND kursus_jadwal_id = ?";
$stmt_check = $koneksi->prepare($sql_check);
$stmt_check->bind_param("ii", $user_id, $kursus_jadwal_id);
$stmt_check->execute();
if ($stmt_check->get_result()->num_rows > 0) {
    header("Location: ../dashboard/index.php?folder=pages&file=kursus-saya&status=sudah_terdaftar");
    exit();
}
$stmt_check->close();


$upload_dir = '../uploads/pembayaran/';
if ($file['size'] > 2 * 1024 * 1024) { 
    header("Location: ../dashboard/pages/kursus.php?file=size");
    exit(); 
}
$allowed_types = ['image/jpeg', 'image/png'];
if (!in_array($file['type'], $allowed_types)) { 
    header("Location: ../dashboard/pages/kursus.php?file=format");
    exit();  
}

$file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$new_filename = "bukti-" . $user_id . "-" . time() . "." . $file_extension;
$target_file = $upload_dir . $new_filename;

if (move_uploaded_file($file['tmp_name'], $target_file)) {
    $status_pendaftaran = 'Menunggu'; 
    $tanggal_daftar = date('Y-m-d H:i:s');

    $sql_insert = "INSERT INTO farhan_pendaftaran (user_id, kursus_jadwal_id, tanggal_daftar, bukti_pembayaran, status_pendaftaran) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert = $koneksi->prepare($sql_insert);
    $stmt_insert->bind_param("iisss", $user_id, $kursus_jadwal_id, $tanggal_daftar, $new_filename, $status_pendaftaran);

    if ($stmt_insert->execute()) {
        header("Location: ../dashboard/pages/kursus.php?pembayaran=success");
        exit();
    } else {
        echo "Gagal menyimpan data pendaftaran: " . $koneksi->error;
    }
} else {
    echo "Gagal meng-upload file bukti pembayaran.";
}

$koneksi->close();
?>
<?php
session_start();

include '../config/koneksi.php';
unset($_SESSION['errors']);

$errors = [];
$nama = $_POST['nama'];
$email = $_POST['email'];
$konfirmasi_email = $_POST['konfirmasi_email'];
$password = $_POST['password'];
$konfirmasi_password = $_POST['konfirmasi_password'];
$no_hp = $_POST['no_hp'];

if ($email !== $konfirmasi_email) {
    $errors['konfirmasi_email'] = 'Konfirmasi email tidak sesuai';
}
if($password !== $konfirmasi_password) {
    $errors['konfirmasi_password'] = 'Konfirmasi password tidak sesuai';
    
}

$sql_check = "SELECT id FROM farhan_user WHERE email = ?";
$stmt_check = $koneksi->prepare($sql_check);
$stmt_check->bind_param("s", $email);
$stmt_check->execute();
$stmt_check->store_result();
if ($stmt_check->num_rows > 0) {
    $errors['email'] = 'Email ini sudah terdaftar. Silakan gunakan email lain.';
}
$stmt_check->close();

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: ../index.php?signup=failed');
    exit();
} else {
    $password_encrypted = md5($password);

    $sql_insert = "INSERT INTO farhan_user (nama, email, password, no_hp, akun_dibuat) VALUES (?, ?, ?, ?, NOW())";
    $stmt_insert = $koneksi->prepare($sql_insert);
    $stmt_insert->bind_param("ssss", $nama, $email, $password_encrypted, $no_hp);

    if ($stmt_insert->execute()) {
        $new_user_id = $stmt_insert->insert_id;

        $_SESSION['user_id'] = $new_user_id;
        $_SESSION['user_nama'] = $nama;
        $_SESSION['user_email'] = $email;
        $_SESSION['is_logged_in'] = true;
        header("Location: ../index.php?signup=success");
        exit();

    } else {
        $_SESSION['errors']['db'] = "Terjadi kesalahan pada server. Silakan coba lagi.";
        header("Location: ../index.php?signup=failed");
        exit();
    }
    $stmt_insert->close();
}
$koneksi->close();
?>
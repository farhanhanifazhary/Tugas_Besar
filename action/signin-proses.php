<?php
include '../config/koneksi.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT id, nama, email FROM farhan_user WHERE email = ? AND password = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    session_start();
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_nama'] = $user['nama'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['is_logged_in'] = true;
    header("Location: ../index.php?signin=success");
    exit();
}else {
    header("Location: ../index.php?signin=failed");
    exit();
}

$stmt->close();
$koneksi->close();
?>

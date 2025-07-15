<?php
session_start();
include '../../config/koneksi.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../index.php');
    exit();
}

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    if (in_array($status, ['Diterima', 'Ditolak'])) {
        $sql = "UPDATE farhan_pendaftaran SET status_pendaftaran = ? WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
    }
}

header('Location: ../index.php?page=registrations');
exit();
?>
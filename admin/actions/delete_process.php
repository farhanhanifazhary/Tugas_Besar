<?php
session_start();
include '../../config/koneksi.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../index.php');
    exit();
}

$type = $_GET['type'] ?? '';
$id = $_GET['id'] ?? 0;

if ($id > 0) {
    if ($type === 'user') {
        $sql = "DELETE FROM farhan_user WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header('Location: ../index.php?page=users');
    } 
    elseif ($type === 'course') {
        $sql = "DELETE FROM farhan_kursus WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header('Location: ../index.php?page=courses');
    }
    elseif ($type === 'schedule') {
        $sql = "DELETE FROM farhan_jadwal WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header('Location: ../index.php?page=schedule_management');
    }
    elseif ($type === 'course_schedule') {
        $sql = "DELETE FROM farhan_kursus_jadwal WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header('Location: ../index.php?page=course_schedules');
    }
} else {
    header('Location: ../index.php');
}
exit();
?>
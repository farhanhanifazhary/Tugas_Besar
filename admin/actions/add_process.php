<?php
session_start();
include '../../config/koneksi.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../index.php');
    exit();
}

$type = $_GET['type'] ?? '';

if ($type === 'user' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $no_hp = $_POST['no_hp'];

    $sql = "INSERT INTO farhan_user (nama, email, password, no_hp, akun_dibuat) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssss", $nama, $email, $password, $no_hp);
    $stmt->execute();
    header('Location: ../index.php?page=users');
} 
elseif ($type === 'course' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_kursus = $_POST['nama_kursus'];
    $harga = $_POST['harga'];
    $level = $_POST['level'];
    $durasi = $_POST['durasi'];
    $gambar = $_POST['gambar'];

    $sql = "INSERT INTO farhan_kursus (nama_kursus, harga, level, durasi, gambar) VALUES (?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sisss", $nama_kursus, $harga, $level, $durasi, $gambar);
    $stmt->execute();
    header('Location: ../index.php?page=courses');
} 
elseif ($type === 'schedule' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_jadwal = $_POST['nama_jadwal'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    $sql = "INSERT INTO farhan_jadwal (nama_jadwal, tanggal_mulai, hari, jam_mulai, jam_selesai) VALUES (?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssss", $nama_jadwal, $tanggal_mulai, $hari, $jam_mulai, $jam_selesai);
    $stmt->execute();
    header('Location: ../index.php?page=schedule_management');
}
elseif ($type === 'course_schedule' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $kursus_id = $_POST['kursus_id'];
    $jadwal_id = $_POST['jadwal_id'];

    $sql = "INSERT INTO farhan_kursus_jadwal (kursus_id, jadwal_id) VALUES (?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ii", $kursus_id, $jadwal_id);
    $stmt->execute();
    header('Location: ../index.php?page=course_schedules');
}
else {
    header('Location: ../index.php');
}
exit();
?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../../config/koneksi.php'; 

$sql = "SELECT k.id AS kursus_id, k.nama_kursus, k.deskripsi, k.harga, k.level, k.durasi, k.gambar, j.id AS jadwal_id, j.nama_jadwal, j.hari, j.jam_mulai, j.jam_selesai, j.tanggal_mulai, kj.id AS kursus_jadwal_id, CASE WHEN k.nama_kursus LIKE '%Bahasa%' THEN 'Bahasa' WHEN k.nama_kursus LIKE '%Teknologi%' OR k.nama_kursus LIKE '%Pemrograman%' OR k.nama_kursus LIKE '%IT%' OR k.nama_kursus LIKE '%DevOps%' OR k.nama_kursus LIKE '%Data%' OR k.nama_kursus LIKE '%SQL%' OR k.nama_kursus LIKE '%Web%' THEN 'Teknologi & Pemrograman' WHEN k.nama_kursus LIKE '%Matematika%' OR k.nama_kursus LIKE '%Sains%' OR k.nama_kursus LIKE '%Fisika%' OR k.nama_kursus LIKE '%Biologi%' OR k.nama_kursus LIKE '%Kimia%' OR k.nama_kursus LIKE '%Astronomi%' THEN 'Sains & Matematika' WHEN k.nama_kursus LIKE '%Desain%' OR k.nama_kursus LIKE '%UI/UX%' OR k.nama_kursus LIKE '%Fotografi%' OR k.nama_kursus LIKE '%Seni%' OR k.nama_kursus LIKE '%Kreatif%' OR k.nama_kursus LIKE '%Video%' THEN 'Desain & Kreatif' ELSE 'Pengembangan Diri & Bisnis' END AS kategori FROM farhan_kursus_jadwal kj JOIN farhan_kursus k ON kj.kursus_id = k.id JOIN farhan_jadwal j ON kj.jadwal_id = j.id WHERE j.tanggal_mulai >= '2025-07-01' ORDER BY kategori, j.tanggal_mulai, j.jam_mulai";
$result = $koneksi->query($sql);
$all_courses = $result->fetch_all(MYSQLI_ASSOC);

$courses_by_category = [];
foreach ($all_courses as $course) {
    $courses_by_category[$course['kategori']][] = $course;
}
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
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>
    <div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Pendaftaran Kursus</h1>
        <p class="lead text-muted">Temukan dan daftar untuk jadwal kursus yang akan datang.</p>
    </div>

    <?php if (empty($courses_by_category)): ?>
            <div class="alert alert-info text-center">Saat ini belum ada jadwal kursus baru yang dibuka.</div>
        <?php else: ?>
            <?php foreach ($courses_by_category as $kategori => $kursus_dalam_kategori): ?>
                <div class="mb-5">
                    <h2 class="fw-bold border-bottom pb-2 mb-4"><?php echo htmlspecialchars($kategori); ?></h2>
                    <div class="row g-4">
                        <?php foreach ($kursus_dalam_kategori as $kursus): ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="card h-100 shadow-sm course-card">
                                    <img src="<?php echo htmlspecialchars($kursus['gambar']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($kursus['nama_kursus']); ?>" style="height: 200px; object-fit: cover;">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold"><?php echo htmlspecialchars($kursus['nama_kursus']); ?></h5>
                                        <p class="card-text text-muted small mb-3">
                                            <i class="bi bi-calendar3"></i> Jadwal: <?php echo htmlspecialchars($kursus['nama_jadwal']); ?>
                                        </p>
                                        <ul class="list-unstyled text-muted small mt-auto">
                                            <li><i class="bi bi-calendar-check me-2"></i><strong>Mulai:</strong> <?php echo date('d M Y', strtotime($kursus['tanggal_mulai'])); ?></li>
                                            <li><i class="bi bi-tag-fill me-2"></i><strong>Harga:</strong> Rp <?php echo number_format($kursus['harga'], 0, ',', '.'); ?></li>
                                            <li><i class="bi bi-bar-chart-fill me-2"></i><strong>Level:</strong> <?php echo htmlspecialchars($kursus['level']); ?></li>
                                        </ul>
                                        <button type="button" class="btn btn-primary fw-bold btn-daftar" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#pembayaranModal"
                                                data-kursus-jadwal-id="<?php echo $kursus['kursus_jadwal_id']; ?>"
                                                data-nama-kursus="<?php echo htmlspecialchars($kursus['nama_kursus']); ?>"
                                                data-harga-kursus="Rp <?php echo number_format($kursus['harga'], 0, ',', '.'); ?>">
                                            Daftar Sekarang
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
</div>

<div class="modal fade" id="pembayaranModal" tabindex="-1" aria-labelledby="pembayaranModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="pembayaranModalLabel">Formulir Pembayaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../action/pendaftaran-proses.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="kursus_jadwal_id" id="modalCourseScheduleId">
            
            <p class="text-muted">Anda akan mendaftar untuk kursus:</p>
            <h6 class="fw-bold" id="modalCourseName">Nama Kursus Akan Tampil di Sini</h6>
            
            <div class="mt-3 p-3 rounded" style="background-color: #e9ecef;">
                <p class="mb-1 small">Total Pembayaran:</p>
                <h5 class="fw-bold" id="modalCoursePrice">Rp 0</h5>
                <hr>
                <p class="mb-1 small">Silakan transfer ke Nomor Virtual Account berikut:</p>
                <h4 class="fw-bold text-primary" id="modalVA">Memuat...</h4>
            </div>

            <div class="mt-3">
                <label for="buktiPembayaran" class="form-label">Unggah Bukti Pembayaran <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="buktiPembayaran" name="bukti_pembayaran" accept="image/jpeg, image/png" required>
                <div class="form-text">Maksimal ukuran file: 2MB. Format: JPG, PNG.</div>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-success fw-bold">Kirim Bukti Pembayaran</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>
<?php
session_start();

include '../../config/koneksi.php';

if ($koneksi->connect_error) {
    die("KONEKSI GAGAL: " . $koneksi->connect_error);
}

$kategori_filter = $_GET['kategori'] ?? 'semua';

$sql = "SELECT
            k.id AS kursus_id, k.nama_kursus, k.deskripsi, k.harga, k.level, k.durasi, k.gambar,
            j.id AS jadwal_id, j.nama_jadwal, j.hari, j.jam_mulai, j.jam_selesai, j.tanggal_mulai,
            kj.id AS kursus_jadwal_id,
            CASE
                WHEN k.nama_kursus LIKE '%Bahasa%' OR k.nama_kursus LIKE '%Inggris%' THEN 'Bahasa'
                WHEN k.nama_kursus LIKE '%Teknologi%' OR k.nama_kursus LIKE '%Pemrograman%' OR k.nama_kursus LIKE '%IT%' THEN 'Teknologi & Pemrograman'
                WHEN k.nama_kursus LIKE '%Matematika%' OR k.nama_kursus LIKE '%Sains%' THEN 'Sains & Matematika'
                WHEN k.nama_kursus LIKE '%Desain%' OR k.nama_kursus LIKE '%Kreatif%' THEN 'Desain & Kreatif'
                ELSE 'Pengembangan Diri & Bisnis'
            END AS kategori
        FROM
            farhan_kursus_jadwal kj
        JOIN
            farhan_kursus k ON kj.kursus_id = k.id
        JOIN
            farhan_jadwal j ON kj.jadwal_id = j.id
        WHERE
            j.tanggal_mulai >= '2025-07-01'";

if ($kategori_filter !== 'semua') {
    $sql .= " HAVING kategori = ?";
}

$sql .= " ORDER BY kategori, j.tanggal_mulai, j.jam_mulai";

$stmt = $koneksi->prepare($sql);
if ($kategori_filter !== 'semua') {
    $stmt->bind_param("s", $kategori_filter);
}
$stmt->execute();
$result = $stmt->get_result();
$all_courses = $result->fetch_all(MYSQLI_ASSOC);

$courses_by_category = [];
$unique_categories = [];
foreach ($all_courses as $course) {
    $kategori = $course['kategori'];
    $courses_by_category[$kategori][] = $course;
    if (!in_array($kategori, $unique_categories)) {
        $unique_categories[] = $kategori;
    }
}
$stmt->close();
$koneksi->close();
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kursus - EduSmart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Pendaftaran Kursus</h1>
            <p class="lead text-muted">Temukan dan daftar untuk jadwal kursus yang akan datang.</p>
        </div>

        <div class="d-flex justify-content-center flex-wrap mb-5">
            <a href="kursus.php?kategori=semua" class="btn <?php echo ($kategori_filter == 'semua') ? 'btn-primary' : 'btn-outline-primary'; ?> m-1">Semua Kategori</a>
            <?php foreach ($unique_categories as $kategori_item): ?>
                <a href="kursus.php?kategori=<?php echo urlencode($kategori_item); ?>" class="btn <?php echo ($kategori_filter == $kategori_item) ? 'btn-primary' : 'btn-outline-primary'; ?> m-1">
                    <?php echo htmlspecialchars($kategori_item); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <?php if (empty($courses_by_category)): ?>
            <div class="alert alert-warning text-center">
                <h5>Tidak Ada Kursus Ditemukan</h5>
                <p>Tidak ada jadwal kursus yang tersedia untuk kriteria yang dipilih saat ini. Silakan periksa kembali nanti.</p>
            </div>
        <?php else: ?>
            <?php foreach ($courses_by_category as $kategori => $kursus_dalam_kategori): ?>
                <div class="mb-5">
                    <h2 class="fw-bold border-bottom pb-2 mb-4"><?php echo htmlspecialchars($kategori); ?></h2>
                    <div class="row g-4">
                        <?php foreach ($kursus_dalam_kategori as $kursus): ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="card h-100 shadow-sm">
                                    <img src="<?php echo htmlspecialchars($kursus['gambar']); ?>" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold"><?php echo htmlspecialchars($kursus['nama_kursus']); ?></h5>
                                        <p class="card-text text-muted small mb-3"><i class="bi bi-calendar3"></i> Jadwal: <?php echo htmlspecialchars($kursus['nama_jadwal']); ?></p>
                                        <ul class="list-unstyled text-muted small mt-auto pt-3 border-top">
                                            <li><i class="bi bi-calendar-check me-2"></i><strong>Mulai:</strong> <?php echo date('d M Y', strtotime($kursus['tanggal_mulai'])); ?></li>
                                            <li><i class="bi bi-tag-fill me-2"></i><strong>Harga:</strong> Rp <?php echo number_format($kursus['harga'], 0, ',', '.'); ?></li>
                                            <li><i class="bi bi-bar-chart-fill me-2"></i><strong>Level:</strong> <?php echo htmlspecialchars($kursus['level']); ?></li>
                                        </ul>
                                        <form action="../../action/pendaftaran-proses.php" method="POST">
                                            <input type="hidden" name="kursus_jadwal_id" value="<?php echo $kursus['kursus_jadwal_id']; ?>">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary fw-bold">Daftar Sekarang</button>
                                            </div>
                                        </form>
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
</body>
</html>
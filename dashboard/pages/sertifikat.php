<?php
$sql_sertifikat = "SELECT
                        k.nama_kursus,
                        DATE_ADD(j.tanggal_mulai, INTERVAL CAST(SUBSTRING_INDEX(k.durasi, ' ', 1) AS UNSIGNED) MONTH) AS tanggal_selesai
                    FROM
                        farhan_pendaftaran p
                    JOIN farhan_kursus_jadwal kj ON p.kursus_jadwal_id = kj.id
                    JOIN farhan_kursus k ON kj.kursus_id = k.id
                    JOIN farhan_jadwal j ON kj.jadwal_id = j.id
                    WHERE
                        p.user_id = ?
                        AND p.status_pendaftaran = 'Diterima'
                        AND DATE_ADD(j.tanggal_mulai, INTERVAL CAST(SUBSTRING_INDEX(k.durasi, ' ', 1) AS UNSIGNED) MONTH) <= CURDATE()
                    ORDER BY
                        tanggal_selesai DESC";

$stmt = $koneksi->prepare($sql_sertifikat);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$sertifikat_list = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<div class="main-content">
    <header class="d-flex justify-content-between align-items-center p-3 mb-4 bg-white rounded-3 shadow-sm">
        <h4 class="mb-0">Sertifikat Saya</h4>
        <div class="d-flex align-items-center">
            <span class="fw-bold me-2"><?php echo htmlspecialchars($nama_user); ?></span>
            
            <?php
                $foto_path = '../uploads/profiles/' . ($user_details['foto_profil'] ?? '');

                if (!empty($user_details['foto_profil']) && file_exists($foto_path)) {
                    echo '<img src="' . htmlspecialchars($foto_path) . '" alt="Foto Profil" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">';
                } else {
                    echo '<i class="bi bi-person-circle fs-3 text-primary"></i>';
                }
            ?>
        </div>
    </header>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <?php if (empty($sertifikat_list)): ?>
                        <div class="text-center p-5">
                            <i class="bi bi-x-circle-fill fs-1 text-muted mb-3"></i>
                            <h5 class="fw-bold">Anda Belum Memiliki Sertifikat</h5>
                            <p class="text-muted">Selesaikan kursus Anda untuk mendapatkan sertifikat pencapaian.</p>
                        </div>
                    <?php else: ?>
                        <h5 class="card-title fw-bold mb-3">Sertifikat Kelulusan</h5>
                        <div class="list-group">
                            <?php foreach ($sertifikat_list as $sertifikat): ?>
                                <div class="list-group-item list-group-item-action p-3 sertifikat-card mb-3 rounded-3">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1 fw-bold text-primary"><?php echo htmlspecialchars($sertifikat['nama_kursus']); ?></h6>
                                            <p class="mb-1">Diberikan kepada: <strong><?php echo htmlspecialchars($nama_user); ?></strong></p>
                                            <small class="text-muted">Diselesaikan pada: <?php echo date('d F Y', strtotime($sertifikat['tanggal_selesai'])); ?></small>
                                        </div>
                                        <div class="ms-3">
                                            <a href="#" class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-download me-2"></i>Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
try {
    $sql_diikuti = "SELECT COUNT(p.id) AS total FROM farhan_pendaftaran p JOIN farhan_kursus_jadwal kj ON p.kursus_jadwal_id = kj.id JOIN farhan_jadwal j ON kj.jadwal_id = j.id WHERE p.user_id = ? AND p.status_pendaftaran = 'Diterima' AND j.tanggal_mulai > CURDATE()";
    $stmt_diikuti = $koneksi->prepare($sql_diikuti);
    $stmt_diikuti->bind_param("i", $user_id);
    $stmt_diikuti->execute();
    $jumlah_diikuti = $stmt_diikuti->get_result()->fetch_assoc()['total'];
    $stmt_diikuti->close();

    // 2. Hitung Kursus Dalam Proses
    $sql_proses = "SELECT COUNT(p.id) AS total FROM farhan_pendaftaran p JOIN farhan_kursus_jadwal kj ON p.kursus_jadwal_id = kj.id JOIN farhan_jadwal j ON kj.jadwal_id = j.id JOIN farhan_kursus k ON kj.kursus_id = k.id WHERE p.user_id = ? AND p.status_pendaftaran = 'Diterima' AND j.tanggal_mulai <= CURDATE() AND DATE_ADD(j.tanggal_mulai, INTERVAL CAST(SUBSTRING_INDEX(k.durasi, ' ', 1) AS UNSIGNED) MONTH) > CURDATE()";
    $stmt_proses = $koneksi->prepare($sql_proses);
    $stmt_proses->bind_param("i", $user_id);
    $stmt_proses->execute();
    $jumlah_proses = $stmt_proses->get_result()->fetch_assoc()['total'];
    $stmt_proses->close();

    // 3. Hitung Kursus Selesai
    $sql_selesai = "SELECT COUNT(p.id) AS total FROM farhan_pendaftaran p JOIN farhan_kursus_jadwal kj ON p.kursus_jadwal_id = kj.id JOIN farhan_jadwal j ON kj.jadwal_id = j.id JOIN farhan_kursus k ON kj.kursus_id = k.id WHERE p.user_id = ? AND p.status_pendaftaran = 'Diterima' AND DATE_ADD(j.tanggal_mulai, INTERVAL CAST(SUBSTRING_INDEX(k.durasi, ' ', 1) AS UNSIGNED) MONTH) <= CURDATE()";
    $stmt_selesai = $koneksi->prepare($sql_selesai);
    $stmt_selesai->bind_param("i", $user_id);
    $stmt_selesai->execute();
    $jumlah_selesai = $stmt_selesai->get_result()->fetch_assoc()['total'];
    $stmt_selesai->close();

} catch (mysqli_sql_exception $exception) {
    $jumlah_diikuti = 0; $jumlah_proses = 0; $jumlah_selesai = 0;
}

$day_en_to_id = [
    'Sunday'    => 'Minggu', 'Monday'    => 'Senin', 'Tuesday'   => 'Selasa',
    'Wednesday' => 'Rabu',   'Thursday'  => 'Kamis', 'Friday'    => 'Jumat',
    'Saturday'  => 'Sabtu'
];
$today_en = date('l');
$today_id = $day_en_to_id[$today_en];

$sql_jadwal_hari_ini = "SELECT
                            k.nama_kursus, j.jam_mulai, j.jam_selesai
                        FROM
                            farhan_pendaftaran p
                        JOIN farhan_kursus_jadwal kj ON p.kursus_jadwal_id = kj.id
                        JOIN farhan_kursus k ON kj.kursus_id = k.id
                        JOIN farhan_jadwal j ON kj.jadwal_id = j.id
                        WHERE
                            p.user_id = ?
                            AND p.status_pendaftaran = 'Diterima'
                            AND j.tanggal_mulai <= CURDATE() 
                            AND DATE_ADD(j.tanggal_mulai, INTERVAL CAST(SUBSTRING_INDEX(k.durasi, ' ', 1) AS UNSIGNED) MONTH) >= CURDATE()
                            AND j.hari = ?
                        ORDER BY
                            j.jam_mulai ASC";

$stmt_jadwal = $koneksi->prepare($sql_jadwal_hari_ini);
$stmt_jadwal->bind_param("is", $user_id, $today_id);
$stmt_jadwal->execute();
$jadwal_hari_ini = $stmt_jadwal->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt_jadwal->close();
?>

<div class="main-content">
    <header class="d-flex justify-content-between align-items-center p-3 mb-4 bg-white rounded-3 shadow-sm">
        <h4 class="mb-0">Selamat Datang!</h4>
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
    
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card text-center p-3 shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="bi bi-collection-play-fill fs-1 text-primary"></i>
                    <h2 class="fw-bold my-2"><?php echo $jumlah_diikuti; ?></h2>
                    <p class="text-muted mb-0">Kursus Diikuti</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3 shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="bi bi-hourglass-split fs-1 text-warning"></i>
                    <h2 class="fw-bold my-2"><?php echo $jumlah_proses; ?></h2>
                    <p class="text-muted mb-0">Kursus Dalam Proses</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3 shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="bi bi-patch-check-fill fs-1 text-success"></i>
                    <h2 class="fw-bold my-2"><?php echo $jumlah_selesai; ?></h2>
                    <p class="text-muted mb-0">Kursus Selesai</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h3 class="mb-3">Jadwal Hari Ini (<?php echo $today_id; ?>)</h3>
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <?php if (empty($jadwal_hari_ini)): ?>
                    <p class="text-muted text-center mb-0">Tidak ada jadwal kursus hari ini.</p>
                <?php else: ?>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($jadwal_hari_ini as $jadwal): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h6 class="mb-0 fw-bold"><?php echo htmlspecialchars($jadwal['nama_kursus']); ?></h6>
                                </div>
                                <span class="badge bg-primary rounded-pill">
                                    <i class="bi bi-clock me-1"></i>
                                    <?php echo date('H:i', strtotime($jadwal['jam_mulai'])) . ' - ' . date('H:i', strtotime($jadwal['jam_selesai'])); ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
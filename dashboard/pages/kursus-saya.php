<?php
$status_filter = $_GET['status'] ?? 'semua';

$sql = "SELECT k.nama_kursus, k.gambar, j.nama_jadwal, j.hari, j.jam_mulai, j.jam_selesai, j.tanggal_mulai, p.status_pendaftaran FROM farhan_pendaftaran p JOIN farhan_kursus_jadwal kj ON p.kursus_jadwal_id = kj.id JOIN farhan_kursus k ON kj.kursus_id = k.id JOIN farhan_jadwal j ON kj.jadwal_id = j.id WHERE p.user_id = ?";

$params = ["i", $user_id];
if ($status_filter == 'diterima') {
    $sql .= " AND p.status_pendaftaran = 'Diterima'";
} elseif ($status_filter == 'menunggu') {
    $sql .= " AND p.status_pendaftaran = 'Menunggu'";
} else {
    $sql .= " AND p.status_pendaftaran IN ('Diterima', 'Menunggu')";
}
$sql .= " ORDER BY j.tanggal_mulai ASC";

$stmt = $koneksi->prepare($sql);
$stmt->bind_param(...$params);
$stmt->execute();
$result = $stmt->get_result();
$daftar_kursus = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<div class="main-content">
    <header class="d-flex justify-content-between align-items-center p-3 mb-4 bg-white rounded-3 shadow-sm">
        <h4 class="mb-0">Kursus Saya</h4>
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

    <div class="mb-4">
        <a href="index.php?folder=pages&file=kursus-saya&status=semua" class="btn <?php echo ($status_filter == 'semua') ? 'btn-primary' : 'btn-outline-primary'; ?>">Semua</a>
        <a href="index.php?folder=pages&file=kursus-saya&status=diterima" class="btn <?php echo ($status_filter == 'diterima') ? 'btn-primary' : 'btn-outline-primary'; ?>">Diterima</a>
        <a href="index.php?folder=pages&file=kursus-saya&status=menunggu" class="btn <?php echo ($status_filter == 'menunggu') ? 'btn-primary' : 'btn-outline-primary'; ?>">Menunggu</a>
    </div>

    <div class="row g-4">
        <?php if (empty($daftar_kursus)): ?>
            <div class="col-12">
                <div class="alert alert-info">Anda belum mendaftar kursus apa pun dengan status ini. <a href="pages/kursus.php">Cari kursus sekarang!</a></div>
            </div>
        <?php else: ?>
            <?php foreach ($daftar_kursus as $kursus): ?>
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?php echo htmlspecialchars($kursus['gambar']); ?>" class="img-fluid rounded-start" alt="<?php echo htmlspecialchars($kursus['nama_kursus']); ?>" style="height: 100%; object-fit: cover;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <?php
                                        $status_class = '';
                                        if ($kursus['status_pendaftaran'] == 'Diterima') {
                                            $status_class = 'bg-success-subtle text-success-emphasis';
                                        } elseif ($kursus['status_pendaftaran'] == 'Menunggu') {
                                            $status_class = 'bg-warning-subtle text-warning-emphasis';
                                        }
                                    ?>
                                    <span class="badge rounded-pill <?php echo $status_class; ?> mb-2"><?php echo htmlspecialchars($kursus['status_pendaftaran']); ?></span>
                                    <h5 class="card-title fw-bold"><?php echo htmlspecialchars($kursus['nama_kursus']); ?></h5>
                                    <p class="card-text text-muted mb-3"><small><?php echo htmlspecialchars($kursus['nama_jadwal']); ?></small></p>
                                    <p class="card-text"><i class="bi bi-calendar-event me-2"></i><?php echo htmlspecialchars($kursus['hari']) . ', ' . date('d F Y', strtotime($kursus['tanggal_mulai'])); ?></p>
                                    <p class="card-text"><i class="bi bi-clock me-2"></i><?php echo date('H:i', strtotime($kursus['jam_mulai'])) . ' - ' . date('H:i', strtotime($kursus['jam_selesai'])); ?> WIB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-12">
                <div class="alert alert-info">Mau menambah kursus? <a href="pages/kursus.php">Cari kursus sekarang!</a></div>
            </div>
        <?php endif; ?>
    </div>
</div>
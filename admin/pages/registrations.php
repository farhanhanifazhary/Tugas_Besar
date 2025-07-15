<?php
$status_filter = $_GET['status'] ?? 'Menunggu';

$sql = "SELECT p.id, u.nama AS nama_user, k.nama_kursus, p.tanggal_daftar, p.bukti_pembayaran, p.status_pendaftaran
        FROM farhan_pendaftaran p
        JOIN farhan_user u ON p.user_id = u.id
        JOIN farhan_kursus_jadwal kj ON p.kursus_jadwal_id = kj.id
        JOIN farhan_kursus k ON kj.kursus_id = k.id";

$params = [];
$types = '';

if ($status_filter !== 'Semua') {
    $sql .= " WHERE p.status_pendaftaran = ?";
    $params[] = $status_filter;
    $types .= 's';
}

$sql .= " ORDER BY p.id";

$stmt = $koneksi->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$registrations = $stmt->get_result();
?>
<div class="container-fluid">
    <h3 class="fw-bold">Manajemen Pendaftaran</h3>
    <div class="my-3">
        <a href="?page=registrations&status=Semua" class="btn btn-secondary">Semua</a>
        <a href="?page=registrations&status=Menunggu" class="btn btn-warning">Menunggu</a>
        <a href="?page=registrations&status=Diterima" class="btn btn-success">Diterima</a>
        <a href="?page=registrations&status=Ditolak" class="btn btn-danger">Ditolak</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Kursus</th>
                    <th>Tgl Daftar</th>
                    <th>Bukti Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($registrations->num_rows > 0): ?>
                <?php while($reg = $registrations->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $reg['id']; ?></td>
                    <td><?php echo htmlspecialchars($reg['nama_user']); ?></td>
                    <td><?php echo htmlspecialchars($reg['nama_kursus']); ?></td>
                    <td><?php echo date('d M Y H:i', strtotime($reg['tanggal_daftar'])); ?></td>
                    <td><a href="../uploads/pembayaran/<?php echo $reg['bukti_pembayaran']; ?>" target="_blank">Lihat</a></td>
                    <td><span class="badge bg-<?php echo strtolower($reg['status_pendaftaran']) == 'diterima' ? 'success' : (strtolower($reg['status_pendaftaran']) == 'menunggu' ? 'warning' : 'danger'); ?>"><?php echo $reg['status_pendaftaran']; ?></span></td>
                    <td>
                        <?php if($reg['status_pendaftaran'] == 'Menunggu'): ?>
                        <a href="actions/update_registration.php?id=<?php echo $reg['id']; ?>&status=Diterima" class="btn btn-sm btn-success" onclick="return confirm('Terima pendaftaran ini?')"><i class="bi bi-check-lg"></i></a>
                        <a href="actions/update_registration.php?id=<?php echo $reg['id']; ?>&status=Ditolak" class="btn btn-sm btn-danger" onclick="return confirm('Tolak pendaftaran ini?')"><i class="bi bi-x-lg"></i></a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7" class="text-center">Tidak ada data untuk status ini.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
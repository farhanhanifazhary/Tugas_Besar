<?php
$total_users = $koneksi->query("SELECT COUNT(*) AS total FROM farhan_user")->fetch_assoc()['total'];
$total_courses = $koneksi->query("SELECT COUNT(*) AS total FROM farhan_kursus")->fetch_assoc()['total'];
$pending_registrations = $koneksi->query("SELECT COUNT(*) AS total FROM farhan_pendaftaran WHERE status_pendaftaran = 'Menunggu'")->fetch_assoc()['total'];

$sql_recent = "SELECT p.id, u.nama, k.nama_kursus, p.tanggal_daftar 
               FROM farhan_pendaftaran p
               JOIN farhan_user u ON p.user_id = u.id
               JOIN farhan_kursus_jadwal kj ON p.kursus_jadwal_id = kj.id
               JOIN farhan_kursus k ON kj.kursus_id = k.id
               WHERE p.status_pendaftaran = 'Menunggu' 
               ORDER BY id ASC LIMIT 5";
$recent_result = $koneksi->query($sql_recent);
?>
<div class="container-fluid">
    <h3 class="fw-bold">Admin Dashboard</h3>
    <p class="text-muted">Ringkasan aktivitas platform EduSmart.</p>

    <div class="row g-4 mb-4">
        <div class="col-md-4"><div class="card p-3 text-center"><h5>Pengguna Terdaftar</h5><p class="display-6 fw-bold"><?php echo $total_users; ?></p></div></div>
        <div class="col-md-4"><div class="card p-3 text-center"><h5>Total Kursus</h5><p class="display-6 fw-bold"><?php echo $total_courses; ?></p></div></div>
        <div class="col-md-4"><div class="card p-3 text-center bg-warning-subtle"><h5>Pendaftaran Menunggu</h5><p class="display-6 fw-bold"><?php echo $pending_registrations; ?></p></div></div>
    </div>

    <h4 class="fw-bold mt-5">Pendaftaran Terbaru Menunggu Verifikasi</h4>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr><th>ID Daftar</th><th>Nama Pengguna</th><th>Nama Kursus</th><th>Tanggal Daftar</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                <?php while($row = $recent_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td><?php echo htmlspecialchars($row['nama_kursus']); ?></td>
                    <td><?php echo date('d M Y H:i', strtotime($row['tanggal_daftar'])); ?></td>
                    <td><a href="index.php?page=registrations" class="btn btn-sm btn-primary">Lihat Detail</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
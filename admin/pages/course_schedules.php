<?php
$result = $koneksi->query("
    SELECT kj.id, k.nama_kursus, j.tanggal_mulai, j.hari, j.jam_mulai, j.jam_selesai
    FROM farhan_kursus_jadwal kj
    JOIN farhan_kursus k ON kj.kursus_id = k.id
    JOIN farhan_jadwal j ON kj.jadwal_id = j.id
    ORDER BY kj.id
");

$courses = $koneksi->query("SELECT id, nama_kursus FROM farhan_kursus ORDER BY nama_kursus");
$schedules = $koneksi->query("SELECT id, nama_jadwal, tanggal_mulai FROM farhan_jadwal ORDER BY tanggal_mulai DESC");
?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Jadwal Kursus</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseScheduleModal">
            <i class="bi bi-plus-circle"></i> Tetapkan Jadwal ke Kursus
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID Relasi</th>
                    <th>Nama Kursus</th>
                    <th>Tanggal Mulai</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Aksi</th> 
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['nama_kursus']); ?></td>
                    <td><?php echo date('d M Y', strtotime($row['tanggal_mulai'])); ?></td>
                    <td><?php echo htmlspecialchars($row['hari']); ?></td>
                    <td><?php echo date('H:i', strtotime($row['jam_mulai'])) . ' - ' . date('H:i', strtotime($row['jam_selesai'])); ?></td>
                    <td>
                        <a href="actions/delete_process.php?type=course_schedule&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus penetapan jadwal ini?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addCourseScheduleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Penetapan Jadwal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="actions/add_process.php?type=course_schedule" method="POST">
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Pilih Kursus</label>
                <select name="kursus_id" class="form-select" required>
                    <option value="">-- Pilih Kursus --</option>
                    <?php while($course = $courses->fetch_assoc()): ?>
                        <option value="<?php echo $course['id']; ?>"><?php echo htmlspecialchars($course['nama_kursus']); ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Pilih Jadwal</label>
                <select name="jadwal_id" class="form-select" required>
                    <option value="">-- Pilih Jadwal --</option>
                    <?php while($schedule = $schedules->fetch_assoc()): ?>
                        <option value="<?php echo $schedule['id']; ?>"><?php echo htmlspecialchars($schedule['nama_jadwal']) . ' (' . date('d M Y', strtotime($schedule['tanggal_mulai'])) . ')'; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
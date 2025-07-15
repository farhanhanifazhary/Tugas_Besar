<?php
$result = $koneksi->query("SELECT * FROM farhan_jadwal ORDER BY id");
?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Manajemen Jadwal</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addScheduleModal">
            <i class="bi bi-plus-circle"></i> Tambah Jadwal
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama Jadwal</th>
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
                    <td><?php echo htmlspecialchars($row['nama_jadwal']); ?></td>
                    <td><?php echo date('d M Y', strtotime($row['tanggal_mulai'])); ?></td>
                    <td><?php echo htmlspecialchars($row['hari']); ?></td>
                    <td><?php echo date('H:i', strtotime($row['jam_mulai'])) . ' - ' . date('H:i', strtotime($row['jam_selesai'])); ?></td>
                    <td>
                        <a href="actions/delete_process.php?type=schedule&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus jadwal ini? Ini akan menghapus semua relasi kursus yang menggunakan jadwal ini.')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addScheduleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Tambah Jadwal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="actions/add_process.php?type=schedule" method="POST">
        <div class="modal-body">
            <div class="mb-3"><label class="form-label">Nama Jadwal</label><input type="text" class="form-control" name="nama_jadwal" required></div>
            <div class="mb-3"><label class="form-label">Tanggal Mulai</label><input type="date" class="form-control" name="tanggal_mulai" required></div>
            <div class="mb-3"><label class="form-label">Hari</label><input type="text" class="form-control" name="hari" required></div>
            <div class="mb-3"><label class="form-label">Jam Mulai</label><input type="time" class="form-control" name="jam_mulai" required></div>
            <div class="mb-3"><label class="form-label">Jam Selesai</label><input type="time" class="form-control" name="jam_selesai" required></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
$result = $koneksi->query("SELECT id, nama_kursus, harga, level, durasi FROM farhan_kursus ORDER BY id");
?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Manajemen Kursus</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">
            <i class="bi bi-plus-circle"></i> Tambah Kursus
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama Kursus</th>
                    <th>Harga</th>
                    <th>Level</th>
                    <th>Durasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($course = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $course['id']; ?></td>
                    <td><?php echo htmlspecialchars($course['nama_kursus']); ?></td>
                    <td>Rp <?php echo number_format($course['harga'], 0, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($course['level']); ?></td>
                    <td><?php echo htmlspecialchars($course['durasi']); ?></td>
                    <td>
                        <a href="actions/delete_process.php?type=course&id=<?php echo $course['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kursus ini? Semua jadwal dan pendaftaran terkait akan terhapus.')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCourseModalLabel">Form Tambah Kursus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="actions/add_process.php?type=course" method="POST">
        <div class="modal-body">
            <div class="mb-3">
                <label for="nama_kursus" class="form-label">Nama Kursus</label>
                <input type="text" class="form-control" id="nama_kursus" name="nama_kursus" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <input type="text" class="form-control" id="level" name="level" required>
            </div>
            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi (cth: 3 Bulan)</label>
                <input type="text" class="form-control" id="durasi" name="durasi" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">URL Gambar</label>
                <input type="text" class="form-control" id="gambar" name="gambar" required>
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
<?php
function format_indo($date){
    $month = [
        "1" => "Januari",
        "2" => "Februari",
        "3" => "Maret",
        "4" => "April",
        "5" => "Mei",
        "6" => "Juni",
        "7" => "Juli",
        "8" => "Agustus",
        "9" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember"
    ];

    $explode = explode("-", $date);
    return $explode[0]. " " .$month[ (int) $explode[1]]. " " .$explode[2];
}

$update_sukses = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_baru = trim($_POST['nama']);
    $no_hp_baru = trim($_POST['no_hp']);

    if (!empty($nama_baru) && !empty($no_hp_baru)) {
        $sql_update = "UPDATE farhan_user SET nama = ?, no_hp = ? WHERE id = ?";
        $stmt_update = $koneksi->prepare($sql_update);
        $stmt_update->bind_param("ssi", $nama_baru, $no_hp_baru, $user_id);
        
        if ($stmt_update->execute()) {
            $_SESSION['user_nama'] = $nama_baru;
            $update_sukses = true;
        }
        $stmt_update->close();
    }
}

$edit_mode = isset($_GET['mode']) && $_GET['mode'] === 'edit';

$sql_user = "SELECT nama, email, no_hp, akun_dibuat, foto_profil FROM farhan_user WHERE id = ?";
$stmt_user = $koneksi->prepare($sql_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$user_details = $stmt_user->get_result()->fetch_assoc();
$stmt_user->close();

$sql_completed_courses = "SELECT k.nama_kursus FROM farhan_pendaftaran p JOIN farhan_kursus_jadwal kj ON p.kursus_jadwal_id = kj.id JOIN farhan_kursus k ON kj.kursus_id = k.id JOIN farhan_jadwal j ON kj.jadwal_id = j.id WHERE p.user_id = ? AND p.status_pendaftaran = 'Diterima' AND DATE_ADD(j.tanggal_mulai, INTERVAL CAST(SUBSTRING_INDEX(k.durasi, ' ', 1) AS UNSIGNED) MONTH) <= CURDATE() ORDER BY k.nama_kursus ASC";
$stmt_courses = $koneksi->prepare($sql_completed_courses);
$stmt_courses->bind_param("i", $user_id);
$stmt_courses->execute();
$completed_courses = $stmt_courses->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt_courses->close();
?>

<div class="main-content">
    <header class="d-flex justify-content-between align-items-center p-3 mb-4 bg-white rounded-3 shadow-sm">
        <h4 class="mb-0">Profil Saya</h4>
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

    <?php if(isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
        <div class="alert alert-success">Profil berhasil diperbarui.</div>
    <?php elseif(isset($_GET['status']) && $_GET['status'] == 'gagal'): ?>
         <div class="alert alert-danger">Gagal memperbarui profil. Pastikan semua field terisi.</div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4 p-md-5">
    <div class="row g-5">
        
        <div class="col-lg-4 text-center">
            <form action="../action/upload-foto-proses.php" method="post" enctype="multipart/form-data" id="formFoto">
                <?php
                    $foto_path = "../uploads/profiles/" . ($user_details['foto_profil'] ?? '');
                    if (!empty($user_details['foto_profil']) && file_exists($foto_path)) {
                        echo '<img src="' . htmlspecialchars($foto_path) . '" alt="Foto Profil" class="img-fluid rounded-circle shadow-sm mb-3" style="width: 150px; height: 150px; object-fit: cover;">';
                    } else {
                        echo '<i class="bi bi-person-circle text-secondary" style="font-size: 10rem;"></i>';
                    }
                ?>
                <h4 class="fw-bold mt-3"><?php echo htmlspecialchars($user_details['nama']); ?></h4>
                <p class="text-muted"><?php echo htmlspecialchars($user_details['email']); ?></p>
                <input type="file" name="foto" id="inputFoto" class="d-none" accept="image/jpeg, image/png, image/gif">
                <button type="button" class="btn btn-sm btn-outline-primary" id="btnUbahFoto">Ubah Foto</button>
            </form>
        </div>

        <div class="col-lg-8">
            <form method="POST" action="index.php?folder=pages&file=profile">
                <h5 class="fw-bold border-bottom pb-2 mb-3">Detail Akun</h5>
                <div class="row mb-3">
                    <div class="col-sm-4"><p class="mb-0 text-muted">Nama Lengkap</p></div>
                    <div class="col-sm-8">
                        <?php if ($edit_mode): ?>
                            <input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars($user_details['nama']); ?>">
                        <?php else: ?>
                            <p class="mb-0 fw-bold"><?php echo htmlspecialchars($user_details['nama']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-4"><p class="mb-0 text-muted">Email</p></div>
                    <div class="col-sm-8"><p class="mb-0 fw-bold"><?php echo htmlspecialchars($user_details['email']); ?></p></div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4"><p class="mb-0 text-muted">Nomor HP</p></div>
                    <div class="col-sm-8">
                        <?php if ($edit_mode): ?>
                            <input type="text" class="form-control" name="no_hp" value="<?php echo htmlspecialchars($user_details['no_hp']); ?>">
                        <?php else: ?>
                            <p class="mb-0 fw-bold"><?php echo htmlspecialchars($user_details['no_hp']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4"><p class="mb-0 text-muted">Bergabung Sejak</p></div>
                    <div class="col-sm-8"><p class="mb-0 fw-bold"><?php echo format_indo(date('d-m-Y', strtotime($user_details['akun_dibuat']))); ?></p></div>
                </div>
                
                <?php if ($edit_mode): ?>
                    <button type="submit" name="update_profil" class="btn btn-success">Simpan Perubahan</button>
                    <a href="index.php?folder=pages&file=profile" class="btn btn-secondary">Batal</a>
                <?php else: ?>
                    <a href="index.php?folder=pages&file=profile&mode=edit" class="btn btn-primary">Edit Profil</a>
                <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>
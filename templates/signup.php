<?php
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
?>

<div class="modal fade " id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4 overflow-hidden" style="background-color: #4A90E2;">
            <div class="modal-body" >
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="row g-4 align-items-center">
                    <div class="p-4 p-md-5">
                         <div class="text-center mb-4">
                            <img src="assets/images/edu.png" alt="EduSmart Logo" style="width: 150px;">
                        </div>

                        <div class="text-center mb-4">
                            <h5 class="fw-bold fs-4 modal-title-subtext" id="signUpModalLabel">Sign Up</h5>
                            <small class="text-muted modal-title-subtext">Already have an account? 
                                <a href="#" data-bs-toggle="modal" data-bs-target="#signInModal" data-bs-dismiss="modal" class="fw-bold modal-title-subtext">Sign In</a>
                            </small>
                        </div>
                        
                        <form action="action/signup-proses.php" method="POST" id="signupForm">
                             <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                                <label for="nama">Nama Lengkap</label>
                            </div>
                             <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                                <label for="email">Email</label>
                                <?php if (isset($errors['email'])): ?>
                                    <div class="invalid-feedback d-block fw-bold">
                                        <?php echo htmlspecialchars($errors['email']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                             <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="konfirmasi_email" name="konfirmasi_email" placeholder="Konfirmasi Email" required>
                                <label for="konfirmasi_email">Konfirmasi Email</label>
                                <?php if (isset($errors['konfirmasi_email'])): ?>
                                    <div class="invalid-feedback d-block fw-bold">
                                        <?php echo htmlspecialchars($errors['konfirmasi_email']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                             <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                             <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi Password" required>
                                <label for="konfirmasi_password">Konfirmasi Password</label>
                                <?php if (isset($errors['konfirmasi_password'])): ?>
                                    <div class="invalid-feedback d-block fw-bold">
                                        <?php echo htmlspecialchars($errors['konfirmasi_password']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP" required>
                                <label for="no_hp">Nomor HP</label>
                            </div>
                            <div class="d-grid mt-4">
                               <button type="submit" class="btn btn-outline-light btn-lg fw-bold">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="signUpSuccessModal" tabindex="-1" aria-labelledby="signUpSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-body text-center p-4 p-md-5">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title mb-2 fw-bold" id="signUpSuccessModalLabel">Registrasi Berhasil!</h5>
                <div class="d-grid mt-4">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
</div>
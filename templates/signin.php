<div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow overflow-hidden" style="background-color: #4A90E2;">
            <div class="row g-0">
                <div>
                    <div class="modal-body p-4 p-md-5" >
                        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                        
                        <div class="text-center mb-4">
                            <img src="assets/images/edu.png" alt="EduSmart Logo" style="width: 150px;">
                        </div>

                        <div class="text-center mb-4">
                            <h5 class="fw-bold fs-4 modal-title-subtext" id="signInModalLabel">Sign In</h5>
                            <small class="text-muted modal-title-subtext">Don't have an account? 
                                <a href="#" data-bs-toggle="modal" data-bs-target="#signUpModal" data-bs-dismiss="modal" class="fw-bold modal-title-subtext">Sign Up</a>
                            </small>
                        </div>
                        <form action="action/signin-proses.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control"  id="signin-email" name="email" placeholder="name@example.com" required>
                                <label for="signin-email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?> id="signin-password" name="password" placeholder="Password" required>
                                <label for="signin-password">Password</label>
                                <p class="invalid-feedback d-block fw-bold" id="signin-wrong-input"></p>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <a href="" class="fw-bold modal-title-subtext" id="btnForgotPassword">Forgot Password?</a>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-outline-light btn-lg fw-bold">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signInSuccessModal" tabindex="-1" aria-labelledby="signInSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-body text-center p-4 p-md-5">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title mb-2 fw-bold" id="signInSuccessModalLabel">Login Berhasil!</h5>
                <div class="d-grid mt-4">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
</div>
const signin = document.getElementById('signin-wrong-input');

document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const signupStatus = urlParams.get('signup');
    const signinStatus = urlParams.get('signin');

    if (signupStatus === 'success') {
        const successModalEl = document.getElementById('signUpSuccessModal');
        const successModal = new bootstrap.Modal(successModalEl);
        
        successModalEl.addEventListener('hidden.bs.modal', function (event) {
            window.location.href = 'dashboard';
        });

        successModal.show();
    }else if(signinStatus === 'success') {
        const successModalEl = document.getElementById('signInSuccessModal');
        const successModal = new bootstrap.Modal(successModalEl);
        
        successModalEl.addEventListener('hidden.bs.modal', function (event) {
            window.location.href = 'dashboard';
        });

        successModal.show();
    }else if (signupStatus === 'failed') {

        const signUpModal = new bootstrap.Modal(document.getElementById('signUpModal'));
        console.log("Signup status parameter found:", signupStatus);
        signUpModal.show();
    } else if (signinStatus === 'failed') {
        signin.innerText = "Email atau password salah";
        const signInModal = new bootstrap.Modal(document.getElementById('signInModal'));
        console.log("Signup status parameter found:", signinStatus);
        signInModal.show();
    }

    const forgotPasswordBtn = document.getElementById('btnForgotPassword');
    
    if (forgotPasswordBtn) {
        forgotPasswordBtn.addEventListener('click', function(event) {
            event.preventDefault(); 
            
            alert("Mohon maaf, fitur 'Lupa Password' belum tersedia saat ini.");
        });
    }

    
});
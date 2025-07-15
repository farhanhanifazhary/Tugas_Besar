document.addEventListener('DOMContentLoaded', function() {
    console.log("script.js dimuat.");
    const formFoto = document.getElementById('formFoto');
    if (formFoto) {
        console.log("Elemen #formFoto ditemukan. Menjalankan logika Ubah Foto.");
        
        const btnUbahFoto = document.getElementById('btnUbahFoto');
        const inputFoto = document.getElementById('inputFoto');

        if (btnUbahFoto && inputFoto) {
            btnUbahFoto.addEventListener('click', function() {
                inputFoto.click();
            });

            inputFoto.addEventListener('change', function() {
                formFoto.submit();
            });
        }
    } else {
        console.log("Elemen #formFoto tidak ditemukan di halaman ini.");
    }

    function openPembayaranModal(kursusJadwalId) {
        const targetButton = document.querySelector(`.btn-daftar[data-kursus-jadwal-id="${kursusJadwalId}"]`);
        if (!targetButton) {
            console.error('Tombol untuk kursus dengan ID ' + kursusJadwalId + ' tidak ditemukan.');
            return;
        }

        const pembayaranModalEl = document.getElementById('pembayaranModal');
        if (!pembayaranModalEl) return;

        const namaKursus = targetButton.getAttribute('data-nama-kursus');
        const hargaKursus = targetButton.getAttribute('data-harga-kursus');

        const randomLength = Math.floor(Math.random() * 6) + 15;
        let vaNumber = '';
        for (let i = 0; i < randomLength; i++) {
            vaNumber += Math.floor(Math.random() * 10);
        }

        pembayaranModalEl.querySelector('#modalCourseName').textContent = namaKursus;
        pembayaranModalEl.querySelector('#modalCoursePrice').textContent = hargaKursus;
        pembayaranModalEl.querySelector('#modalVA').textContent = vaNumber;
        pembayaranModalEl.querySelector('#modalCourseScheduleId').value = kursusJadwalId;

        const pembayaranModal = new bootstrap.Modal(pembayaranModalEl);
        pembayaranModal.show();
    }

    const daftarButtons = document.querySelectorAll('.btn-daftar');
    daftarButtons.forEach(button => {
        button.addEventListener('click', function() {
            const kursusJadwalId = this.getAttribute('data-kursus-jadwal-id');
            localStorage.setItem('selectedCourseScheduleId', kursusJadwalId);
            openPembayaranModal(kursusJadwalId);
        });
    });

    const urlParams = new URLSearchParams(window.location.search);
    const pembayaranStatus = urlParams.get('pembayaran');
    const fileStatus = urlParams.get('file');

    if (pembayaranStatus === 'success') {
        const successModalEl = document.getElementById('pembayaranSuccessModal');
        if(successModalEl){
            const successModal = new bootstrap.Modal(successModalEl);
            successModalEl.addEventListener('hidden.bs.modal', function () {
                window.location.href = '../index.php?folder=pages&file=kursus-saya';
            });
            successModal.show();
        }
    }
    
    if (fileStatus === 'size') {
        const sizeModalEl = document.getElementById('sizeModal');
        if(sizeModalEl) {
            const sizeModal = new bootstrap.Modal(sizeModalEl);
            sizeModalEl.addEventListener('hidden.bs.modal', function () {
                const lastSelectedId = localStorage.getItem('selectedCourseScheduleId');
                if (lastSelectedId) {
                    openPembayaranModal(lastSelectedId);
                }
            });
            sizeModal.show();
        }
    }

    if (fileStatus === 'format') {
        const formatModalEl = document.getElementById('formatModal');
        if(formatModalEl) {
            const formatModal = new bootstrap.Modal(formatModalEl);
            formatModalEl.addEventListener('hidden.bs.modal', function () {
                const lastSelectedId = localStorage.getItem('selectedCourseScheduleId');
                if (lastSelectedId) {
                    openPembayaranModal(lastSelectedId);
                }
            });
            formatModal.show();
        }
    }
});
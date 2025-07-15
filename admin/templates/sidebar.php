<div class="sidebar shadow-sm">
    <div class="sidebar-logo-container p-3 mb-3">
        <a href="index.php">
             <img src="../assets/images/edu.png" alt="EduSmart Logo" style="width: 150px;">
        </a>
    </div>
    <ul class="nav flex-column">
        <?php $currentPage = $_GET['page'] ?? 'dashboard'; ?>
        <li class="nav-item">
            <a class="nav-link <?php if($currentPage == 'dashboard') echo 'active'; ?>" href="index.php?page=dashboard">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($currentPage == 'registrations') echo 'active'; ?>" href="index.php?page=registrations">
                <i class="bi bi-card-checklist"></i> Verifikasi Pendaftaran
            </a>
        </li>
         <li class="nav-item">
            <a class="nav-link <?php if($currentPage == 'users') echo 'active'; ?>" href="index.php?page=users">
                <i class="bi bi-people-fill"></i> Manajemen Pengguna
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($currentPage == 'courses') echo 'active'; ?>" href="index.php?page=courses">
                <i class="bi bi-book-half"></i> Manajemen Kursus
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($currentPage == 'schedule_management') echo 'active'; ?>" href="index.php?page=schedule_management">
                <i class="bi bi-calendar-week-fill"></i> Manajemen Jadwal
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($currentPage == 'course_schedules') echo 'active'; ?>" href="index.php?page=course_schedules">
                <i class="bi bi-link-45deg"></i> Jadwal Kursus
            </a>
        </li>
    </ul>
    <div class="mt-auto p-3" style="position: absolute; bottom: 20px; width: calc(100% - 40px);">
        <a class="nav-link logout-btn" href="actions/admin_logout.php">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
    <div class="offcanvas-header">
        <div class="sidebar-logo-container">
            <a href="index.php">
                <img src="../assets/images/edu.png" alt="EduSmart Logo" style="width: 150px;">
            </a>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        <ul class="nav flex-column">
            <?php $currentPage = $_GET['page'] ?? 'dashboard'; ?>
            <li class="nav-item">
                <a class="nav-link <?php if($currentPage == 'dashboard') echo 'active'; ?>" href="index.php?page=dashboard">
                    <i class="bi bi-grid-fill"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($currentPage == 'registrations') echo 'active'; ?>" href="index.php?page=registrations">
                    <i class="bi bi-card-checklist"></i> Verifikasi Pendaftaran
                </a>
            </li>
                <li class="nav-item">
                <a class="nav-link <?php if($currentPage == 'users') echo 'active'; ?>" href="#">
                    <i class="bi bi-people-fill"></i> Manajemen Pengguna
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($currentPage == 'courses') echo 'active'; ?>" href="#">
                    <i class="bi bi-book-half"></i> Manajemen Kursus
                </a>
            </li>
        </ul>
        <div class="mt-auto">
            <a class="nav-link logout-btn" href="actions/admin_logout.php">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>
</div>
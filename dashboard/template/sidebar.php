<div class="sidebar shadow-sm">
    <div class="sidebar-logo-container mb-4">
        <a href="../index.php">
             <img src="../assets/images/edu.png" alt="EduSmart Logo" style="width: 150px;">
        </a>
    </div>
    <ul class="nav flex-column">
        <?php $currentPage = $_GET['file'] ?? 'dashboard'; ?>
        <li class="nav-item">
            <a class="nav-link <?php if($currentPage == 'dashboard') echo 'active'; ?>" href="index.php?folder=pages&file=dashboard"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
        </li>
        <li class="nav-item py-1">
            <a class="nav-link <?php if($currentPage == 'kursus-saya') echo 'active'; ?>" href="index.php?folder=pages&file=kursus-saya"><i class="bi bi-collection-play-fill"></i> Kursus Saya</a>
        </li>
        <li class="nav-item py-1">
                <a class="nav-link" href="pages/mini-quiz.php"><i class="bi bi-pencil-fill"></i> Mini Quiz</a>
            </li>
        <li class="nav-item py-1">
            <a class="nav-link <?php if($currentPage == 'sertifikat') echo 'active'; ?>" href="index.php?folder=pages&file=sertifikat"><i class="bi bi-patch-check-fill"></i> Sertifikat</a>
        </li>
        <li class="nav-item py-1">
            <a class="nav-link <?php if($currentPage == 'profile') echo 'active'; ?>" href="index.php?folder=pages&file=profile"><i class="bi bi-person-circle"></i> Profil</a>
        </li>
    </ul>
    <div class="mt-auto" style="position: absolute; bottom: 20px; width: calc(100% - 40px);">
        <a class="nav-link" href="../action/logout.php" style="background-color: #f8d7da; color: #842029;">
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
            <?php $currentPage = $_GET['file'] ?? 'dashboard'; ?>
            <li class="nav-item">
                <a class="nav-link <?php if($currentPage == 'dashboard') echo 'active'; ?>" href="index.php?folder=pages&file=dashboard"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
            </li>
            <li class="nav-item py-1">
                <a class="nav-link <?php if($currentPage == 'kursus-saya') echo 'active'; ?>" href="index.php?folder=pages&file=kursus-saya"><i class="bi bi-collection-play-fill"></i> Kursus Saya</a>
            </li>
            <li class="nav-item py-1">
                <a class="nav-link" href="pages/mini-quiz"><i class="bi bi-pencil-fill"></i> Mini Quiz</a>
            </li>
            <li class="nav-item py-1">
                <a class="nav-link <?php if($currentPage == 'sertifikat') echo 'active'; ?>" href="index.php?folder=pages&file=sertifikat"><i class="bi bi-patch-check-fill"></i> Sertifikat</a>
            </li>
            <li class="nav-item py-1">
                <a class="nav-link <?php if($currentPage == 'profile') echo 'active'; ?>" href="index.php?folder=pages&file=profile"><i class="bi bi-person-circle"></i> Profil</a>
            </li>
        </ul>
        <div class="mt-auto" style="position: absolute; bottom: 20px; width: calc(100% - 40px);">
            <a class="nav-link" href="../action/logout.php" style="background-color: #f8d7da; color: #842029;">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>
</div>
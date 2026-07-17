<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">RPL B admin <br>XXI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Component:</h6>
                <a class="collapse-item" href="users.php">User</a>
                <a class="collapse-item" href="cards.html">Artikel</a>
                <a class="collapse-item" href="cards.html">Kategory</a>
                <a class="collapse-item" href="cards.html">Komentar</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading Tambahan untuk Aksi -->
    <div class="sidebar-heading">
        Action
    </div>

    <!-- 🌟 TOMBOL LOGOUT DANGER YANG MENARIK 🌟 -->
    <li class="nav-item">
        <form action="logout.php" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar?');" style="margin: 0 1rem;">
            <button type="submit" class="btn-logout-sidebar">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- Tambahkan sedikit style CSS ini di dalam tag <head> atau file CSS kustom kamu -->
<style>
.btn-logout-sidebar {
    display: flex;
    align-items: center;
    width: 100%;
    padding: 0.75rem 1rem;
    background-color: #e74a3b; /* Warna merah danger khas SB Admin 2 */
    color: #ffffff;
    border: none;
    border-radius: 0.35rem;
    font-size: 0.85rem;
    font-weight: 700;
    text-align: left;
    transition: all 0.2s ease-in-out;
    cursor: pointer;
}

.btn-logout-sidebar i {
    margin-right: 0.75rem;
    font-size: 0.85rem;
    transition: transform 0.2s ease;
}

/* Efek saat tombol di-hover */
.btn-logout-sidebar:hover {
    background-color: #be2617; /* Merah lebih gelap */
    box-shadow: 0 4px 12px rgba(231, 74, 59, 0.4);
    color: #ffffff;
}

.btn-logout-sidebar:hover i {
    transform: translateX(3px); /* Ikon pintu keluar geser sedikit ke kanan */
}

/* Penyesuaian saat sidebar dikecilkan (toggled) */
.sidebar-toggled .btn-logout-sidebar {
    padding: 0.75rem;
    justify-content: center;
}
.sidebar-toggled .btn-logout-sidebar span {
    display: none; /* Sembunyikan teks logout saat sidebar mengecil */
}
.sidebar-toggled .btn-logout-sidebar i {
    margin-right: 0;
}
</style>W
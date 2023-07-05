
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-text mx-3">SMK AL-Wahyu</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="about-us.php">
        <i class="fas fa-fw fa-user"></i>
        <span>About Us</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Data
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-edit"></i>
        <span>Guru</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="data-guru.php">Data Guru</a>
            <a class="collapse-item" href="tambah-data-guru.php">Tambah Data</a>
            <a class="collapse-item" href="data-presensi.php?type=guru">Data Presensi</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-edit"></i>
        <span>Karyawan</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="data-karyawan.php">Data Karyawan</a>
            <a class="collapse-item" href="tambah-data-karyawan.php">Tambah Data</a>
            <a class="collapse-item" href="data-presensi.php?type=karyawan">Data Presensi</a>

        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Penggajian
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="penggajian.php?type=guru">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Penggajian Guru</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="penggajian.php?type=karyawan">
        <i class="fas fa-fw fa-table"></i>
        <span>Penggajian Karyawan</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Presensi
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="presensi.php?type=guru">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Presensi Guru</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="presensi.php?type=karyawan">
        <i class="fas fa-fw fa-table"></i>
        <span>Presensi Karyawan</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Heading -->
<div class="sidebar-heading">
    Laporan
</div>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRekap"
        aria-expanded="true" aria-controls="collapseRekap">
        <i class="fas fa-fw fa-edit"></i>
        <span>Rekap Data</span>
    </a>
    <div id="collapseRekap" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="report.php?type=guru&flag=gaji">Data Gaji Guru</a>
            <a class="collapse-item" href="report.php?type=karyawan&flag=gaji">Data Gaji Karyawan</a>
            <a class="collapse-item" href="report.php?type=guru&flag=absen">Data Absen Guru</a>
            <a class="collapse-item" href="report.php?type=karyawan&flag=absen">Data Absen Karyawan</a>

        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<?php 
    include './layouts/head.php' ;
    include './config.php';
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include './layouts/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <?php include './layouts/header.php' ?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Presensi SMK Al Wahyu</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Presensi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <?php if ($_GET['type'] === 'guru') {
                                            echo '<th>Pelajaran</th>';
                                            }
                                            ?>
                                            <th>Presensi</th>
                                            <th>Keterangan</th>
                                            <th>Waktu Absen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php
                                        if ($_GET['type'] === 'guru') {
                                            $query = "SELECT nama, jabatan, pelajaran, presensi, keterangan, waktu_absen FROM presensi LEFT JOIN data_guru ON presensi.user_id = data_guru.id WHERE presensi.type = 'guru' ORDER BY data_guru.nama";
                                        } else {
                                            $query = "SELECT nama, jabatan, presensi, keterangan, waktu_absen FROM presensi LEFT JOIN data_karyawan ON presensi.user_id = data_karyawan.id WHERE presensi.type = 'karyawan' ORDER BY data_karyawan.nama";
                                        }
                                        $no = 1;
                                        $sql = mysqli_query($conn, $query);
                                        while ($hasil = mysqli_fetch_array($sql)) {
                                            $nama = $hasil['nama'];
                                            $jabatan = $hasil['jabatan'];
                                            if ($_GET['type'] === 'guru') {
                                                $pelajaran = $hasil['pelajaran'];
                                            }
                                            $presensi = $hasil['presensi'];
                                            $keterangan = $hasil['keterangan'];
                                            $waktu_absen = $hasil['waktu_absen'];
                                    ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $nama ?></td>
                                            <td><?php echo $jabatan?></td>
                                            
                                            <?php if ($_GET['type'] === 'guru') {
                                                echo '<td>'.$pelajaran.'</td>';}?>
                                            <td><?php echo $presensi ?></td>
                                            <td><?php echo $keterangan ?></td>
                                            <td><?php echo $waktu_absen ?></td>
                                        </tr>
                                    <?php 
                                            $no++;
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include './layouts/footer.php' ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include './layouts/scripts.php' ?>
</body>

</html>
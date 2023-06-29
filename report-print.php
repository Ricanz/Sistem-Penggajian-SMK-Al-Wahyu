<?php 
    include './layouts/head.php' ;
    include './config.php';

    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
    $flag = $_GET['flag'];
    $type = $_GET['type'];

    if ($type === "'guru'") {
        $db = 'data_guru';
        $type_text = 'Guru';
    } else {
        $db = 'data_karyawan';
        $type_text = 'Karyawan';
    }

    if ($flag === "'gaji'") {
        $q = "SELECT * FROM gaji LEFT JOIN $db ON $db.id = gaji.user_id WHERE type = $type AND DATE(dicetak_pada) BETWEEN $start_date AND $end_date";
        $flag_text = 'Penggajian';
    } else {
        $q = "SELECT * FROM presensi LEFT JOIN $db ON $db.id = presensi.user_id WHERE type = $type AND DATE(waktu_absen) BETWEEN $start_date AND $end_date";
        $flag_text = 'Absen';
    }
      
?>

<body id="page-top" onload="window.print()">
    <!-- Page Wrapper -->
    <div id="wrapper">

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
                    <h1 class="h3 mb-2 text-gray-800">Rekap Data <?php echo $flag_text; echo ' ' .$type_text?>  SMK Al Wahyu</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 mb-2 font-weight-bold text-primary">Start Date: <?php echo str_replace("'", "", $start_date) ?></h6>
                            <h6 class="m-0 font-weight-bold text-primary">End Date: <?php echo str_replace("'", "", $end_date) ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php 
                                    if ($flag === "'gaji'") {
                                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Gaji Pokok</th>
                                            <th>Tunjangan</th>
                                            <th>Bonus</th>
                                            <th>Banyak Lembur</th>
                                            <th>Total Lembur</th>
                                            <th>Total</th>
                                            <th>Dicetak Pada</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $s = mysqli_query($conn, $q);
                                            while ($res = mysqli_fetch_array($s)) {
                                                $gaji_pokok = intval($res['gaji_pokok']);
                                                $tunjangan = intval($res['tunjangan']);
                                                $tambahan = intval($res['tambahan']);
                                                $total_lembur = intval($res['total_lembur']);
                                                $lembur = intval($res['lembur']);
                                                $total = $gaji_pokok + $tunjangan + $tambahan + $lembur;
                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $res['nama'] ?></td>
                                            <td><?php echo $res['jabatan'] ?></td>
                                            <td><?php echo $gaji_pokok ?></td>
                                            <td><?php echo $tunjangan ?></td>
                                            <td><?php echo $tambahan ?></td>
                                            <td><?php echo $total_lembur ?></td>
                                            <td><?php echo $lembur ?></td>
                                            <td><?php echo $total ?></td>
                                            <td><?php echo $res['dicetak_pada'] ?></td>
                                        </tr>
                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
                                <?php 
                                    } 
                                    if ($flag === "'absen'") {
                                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Waktu Absen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $s = mysqli_query($conn, $q);
                                            while ($res = mysqli_fetch_array($s)) {
                                                
                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $res['nama'] ?></td>
                                            <td><?php echo $res['jabatan'] ?></td>
                                            <td><?php echo $res['waktu_absen'] ?></td>
                                        </tr>
                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
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
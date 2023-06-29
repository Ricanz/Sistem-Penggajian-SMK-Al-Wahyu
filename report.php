<?php 
    include './layouts/head.php' ;
    include './config.php';

    
    $flag = $_GET['flag'];
    $type = $_GET['type'];

    if ($flag === 'gaji') {
        $flag_text = 'Penggajian';
    } else {
        $flag_text = 'Absen';
    }

    if ($type === 'guru') {
        $type_text = 'Guru';
    } else {
        $type_text = 'Karyawan';
    }

    if (isset($_POST['submit'])) {
        $result = [];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        header("Location: report-print.php?flag='$flag'&type='$type'&start_date='$start_date'&end_date='$end_date'");
    }
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
                    <h1 class="h3 mb-2 text-gray-800">Rekap Data <?php echo $flag_text; echo ' '.$type_text; ?> SMK Al Wahyu</h1>
                    <form method="post" name="submit" enctype="multipart/form-data">
                        <div style="display: flex;">
                            <div class="mb-3 col-4"><label for="start_date">Start Date</label><input class="form-control" name="start_date" id="start_date" type="date" placeholder="Masukkan Nama Guru"></div>
                            <div class="mb-3 col-4"><label for="end_date">End Date</label><input class="form-control" name="end_date" id="end_date" type="date" placeholder="Masukkan Jabatan"></div>

                        </div>
                        <div class="mb-3 ml-3">
                            <button class="btn btn-primary" name="submit" type="submit">Cetak</button>  
                        </div>
                    </form>

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
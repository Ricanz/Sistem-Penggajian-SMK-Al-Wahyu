<?php 
    include './layouts/head.php';
    include "./config.php";

    if (isset($_POST['submit'])) {
        $guru = $_POST['guru'];
        $exp = explode("-",$guru);

        $guru_id = intval($exp[0]);
        $presensi = $_POST['presensi'];
        $keterangan = $_POST['keterangan'];
        $waktu_absen = date("Y/m/d H:i:s");
        $type = $_GET["type"];

        //insert ke tabel
        $query = "INSERT INTO presensi	values('','$guru_id', '$presensi', '$keterangan', '$waktu_absen', '$type')";
        
        $sql = mysqli_query($conn, $query) or die(mysqli_error());
        if ($sql) {
            $pesan = "Presensi guru berhasil ditambah!";
            header('Location: data-presensi.php?type='.$type.'&pesan='. $pesan);
        } else {
            echo "<h2><font color=red>Data gagal ditambahkan</font></h2>";
        }
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
                    <h1 class="h3 mb-2 text-gray-800">Presensi SMK Al Wahyu</h1>
                    <form method="post" name="submit" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="guru">Nama</label>
                            <select class="form-control form-control-solid" name="guru" id="guru">
                                <?php 
                                if ($_GET["type"] === "guru") {
                                    $tbl = 'data_guru';
                                } else {
                                    $tbl = 'data_karyawan';
                                }
                                $query = "SELECT * FROM $tbl ORDER BY nama ";
                                $sql = mysqli_query($conn, $query);
                                while ($hasil = mysqli_fetch_array($sql)) {
                                    $id = $hasil['id'];
                                    $nama = $hasil['nama'];
                                ?>
                                <option><?php echo $id . ' - ' . $nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="presensi">Presensi</label>
                            <select class="form-control form-control-solid" name="presensi" id="presensi">
                                <option>Hadir</option>
                                <option>Sakit</option>
                                <option>Izin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" name="submit" type="submit">Simpan</button>  
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
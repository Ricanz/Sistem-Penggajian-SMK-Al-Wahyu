<?php
    include './layouts/head.php';
    include "./config.php";
    $type = $_GET['type'];
    // var_dump($type);
    // die;

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $exp = explode("-",$nama);
        $user_id = intval($exp[0]);

        $gaji_pokok = 0;
        $tambahan = 0;
        if ($type === 'guru') {
            if ($hasil[5] === 'pns') {
                $gaji_pokok = 5000000;
            } else {
                $gaji_pokok = 3500000;
            }
            
            if (strtolower($hasil[2]) === 'guru') {
                $tambahan = 150000;
            } else {
                $tambahan = 250000;
            }
            $query = "SELECT * FROM data_guru WHERE id = $user_id";
        } else {
            $gaji_pokok = 4000000;
            $query = "SELECT * FROM data_karyawan WHERE id = $user_id";
        }
        $sql = mysqli_query($conn, $query);
        $hasil = mysqli_fetch_array($sql);
        $name = $hasil[1];

        $banyak_lembur = 0;
        $lembur = 0;
        $tunjangan = intval($_POST['tunjangan']);
        $banyak_lembur = intval($_POST['banyak_lembur']);
        $lembur = $banyak_lembur * 200000;

        $total = $gaji_pokok + $tambahan + $lembur + $tunjangan;
        $dicetak_pada = date("Y/m/d H:i:s");

        
        $insert = "INSERT INTO gaji VALUES('', '$user_id', '$gaji_pokok', '$tunjangan', '$tambahan', '$lembur', '$banyak_lembur', '$dicetak_pada', '$type')";
        $sql = mysqli_query($conn, $insert) or die(mysqli_error());
        if ($sql) {
            $pesan = "Gaji berhasil ditambah!";
            if ($type === 'guru') {
                $location = "slip-gaji.php?type=$type&nama=$name&kategori=$hasil[5]&jabatan=$hasil[2]&pelajaran=$hasil[4]&jk=$hasil[6]&tgl=$dicetak_pada&gaji_pokok=$gaji_pokok&tunjangan=$tunjangan&bonus=$tambahan&banyak=$banyak_lembur&lembur=$lembur&total=$total";
            } else {
                $location = "slip-gaji.php?type=$type&nama=$name&jabatan=$hasil[2]&jk=$hasil[3]&tgl=$dicetak_pada&gaji_pokok=$gaji_pokok&tunjangan=$tunjangan&bonus=$tambahan&banyak=$banyak_lembur&lembur=$lembur&total=$total";
            }
            header("Location: $location");
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
                    <h1 class="h3 mb-2 text-gray-800">Penggajian Guru SMK Al Wahyu</h1>
                    <form method="post" name="submit" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <select class="form-control form-control-solid" name="nama" id="nama">
                                <?php
                                if ($type === 'guru') {
                                    $query = "SELECT * FROM data_guru ORDER BY nama ";
                                } else {
                                    $query = "SELECT * FROM data_karyawan ORDER BY nama ";
                                }
                                $sql = mysqli_query($conn, $query);
                                while ($hasil = mysqli_fetch_array($sql)) {
                                    $id = $hasil['id'];
                                    $nama = $hasil['nama'];
                                ?>
                                    <option><?php echo $id . ' - ' . $nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3"><label for="tunjangan">Tunjangan</label><input class="form-control" name="tunjangan" id="jabatan" type="text" placeholder="Masukkan Tunjangan"></div>
                        <div class="mb-3"><label for="banyak_lembur">Total Lembur (per jam)</label><input class="form-control" name="banyak_lembur" id="jabatan" type="text" placeholder="Masukkan Total Lembur"></div>
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
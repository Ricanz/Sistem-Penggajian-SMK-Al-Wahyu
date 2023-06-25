<?php 
    include './layouts/head.php';
    include "./config.php";

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama_lengkap'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $kategori = $_POST['kategori'];
        $pelajaran = $_POST['pelajaran'];
        $jabatan = $_POST['jabatan'];

        //insert ke tabel
        $query = "INSERT INTO data_guru	values('','$nama', '$jabatan', '$agama', '$pelajaran', '$kategori', '$jenis_kelamin')";
    
        $sql = mysqli_query($conn, $query) or die(mysqli_error());
        if ($sql) {
            $pesan = "Data guru berhasil ditambah!";
            header('Location: data-guru.php?pesan=". $pesan ."');
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
                    <h1 class="h3 mb-2 text-gray-800">Tambah Data Guru SMK Al Wahyu</h1>
                    <form method="post" name="submit" enctype="multipart/form-data">
                        <div class="mb-3"><label for="nama_lengkap">Nama Lengkap</label><input class="form-control" name="nama_lengkap" id="nama_lengkap" type="text" placeholder="Masukkan Nama Guru"></div>
                        <div class="mb-3"><label for="jabatan">Jabatan</label><input class="form-control" name="jabatan" id="jabatan" type="text" placeholder="Masukkan Jabatan"></div>
                        <div class="mb-3">
                            <label for="pelajaran">Pelajaran</label>
                            <select class="form-control form-control-solid" name="pelajaran" id="pelajaran">
                                <option>Bahasa Indonesia</option>
                                <option>Penjaskes</option>
                                <option>Matematika</option>
                                <option>Bahasa Inggris</option>
                                <option>Fisika</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" id="jenis_kelamin" type="radio" name="jenis_kelamin" value="laki-laki">
                                <label class="form-check-label" for="jenis_kelamin">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="jenis_kelamin1" type="radio" name="jenis_kelamin" value="perempuan">
                                <label class="form-check-label" for="jenis_kelamin1">Perempuan</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="agama">Agama</label>
                            <select class="form-control form-control-solid" id="agama" name="agama">
                                <option>Islam</option>
                                <option>Kristen</option>
                                <option>Budha</option>
                                <option>Hindu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kategori">Kategori</label>
                            <div class="form-check">
                                <input class="form-check-input" id="kategori" type="radio" name="kategori" value="pns">
                                <label class="form-check-label" for="kategori">PNS</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="kategori1" type="radio" name="kategori" value="honorer">
                                <label class="form-check-label" for="kategori1">Honorer</label>
                            </div>
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
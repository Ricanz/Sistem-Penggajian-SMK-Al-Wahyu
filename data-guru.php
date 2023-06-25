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
                    <h1 class="h3 mb-2 text-gray-800">Data Guru SMK Al Wahyu</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Pelajaran</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php
                                        $no = 1;
                                        $query = "SELECT * FROM data_guru ORDER BY nama ";
                                        $sql = mysqli_query($conn, $query);
                                        while ($hasil = mysqli_fetch_array($sql)) {
                                            $nama = $hasil['nama'];
                                            $jabatan = $hasil['jabatan'];
                                            $agama = $hasil['agama'];
                                            $pelajaran = $hasil['pelajaran'];
                                            $jenis_kelamin = $hasil['jenis_kelamin'];
                                            $kategori = $hasil['kategori'];
                                    ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $nama ?></td>
                                            <td><?php echo $jabatan ?></td>
                                            <td><?php echo $pelajaran ?></td>
                                            <td><?php echo $jenis_kelamin ?></td>
                                            <td><?php echo $agama ?></td>
                                            <td><?php echo $kategori ?></td>
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
<?php
    include './layouts/head.php';
    include './config.php';

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
        $sql = mysqli_query($conn, $query);
        $row = $sql->fetch_row();
        $value = $row[0] ?? false;
        if ($value) {
            $pesan = "Berhasil login!";
            setcookie('admin_id', $row[0], time() + (86400 * 30), "/");
            header('Location: data-guru.php?pesan=". $pesan ."');
        }
    }
?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat datang!</h1>
                                        <h6 class="h6 text-gray-900 mb-4">Login Sistem Penggajian SMK Al Wahyu</h6>
                                    </div>
                                    <form class="user" method="post" name="submit" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php include './layouts/scripts.php' ?>
</body>

</html>
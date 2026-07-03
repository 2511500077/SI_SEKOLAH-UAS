<?php
require_once "config/koneksi.php";

/** @var mysqli $koneksi */
session_start();
?>
<?php
    include "config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- iCheck bootstrap -->
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<style>

body{
    background-image: url('dist/img/sekolah_background.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.login-logo a{
    color: white !important;
    font-size: 40px;
    font-weight: bold;
}

.card,
.login-card-body{
    border-radius: 30px !important;
}

</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html">SISTEM INFORMASI SEKOLAH</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

        <!-- /.col -->
          <div class="col-12">
            <input type="submit" name="login" value="login" class="btn 
            btn-primary btn-block">
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // cek kosong
    if (empty($username) || empty($password)) {

        echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        Data Tidak Boleh kosong
        </div>';

    } else {

        // cek username
        $userquery = mysqli_fetch_array(mysqli_query($koneksi,
        "SELECT * FROM user WHERE username='$username'"));

        // jika username ditemukan
        if ($userquery) {

            // cek password
            if ($password == $userquery['password']) {

                $_SESSION['level'] = $userquery['role'];
                $_SESSION['username'] = $userquery['username'];

                // admin
                if ($userquery['role'] == 'admin') {

                    header("location:index.php");

                }


                // Guru
                else if ($userquery['role'] == 'guru') {

                    header("location:index.php?page=siswa");

                }

                // Siswa
                else if ($userquery['role'] == 'siswa') {

                    header("location:index.php?page=siswa");

                }

                // guru / siswa
                else if ($userquery['role'] == 'guru' || $userquery['role'] == 'siswa') {

                    // password default
                    if ($userquery['password'] == '1234') {

                        header("location:index.php?page=ganti_password");

                    } else {

                        header("location:index.php");

                    }

                }

            } else {

                // password SALAH
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                password salah
                </div>';

            }

        } else {

            // username TIDAK ADA
            echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            username tidak ditemukan
            </div>';
        }

    }

}
?>
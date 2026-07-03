    <?php
require_once "config/koneksi.php";

/** @var mysqli $koneksi */
?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ganti Password</h1>
                </div>
            </div>
        </div>
    </div>

    <?php

if(isset($_POST['tambah'])){

    $username = $_SESSION['username'];

    $pl = $_POST['pl'];
    $pb = $_POST['pb'];

    $cek = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' "));

    if($cek){

        $update = mysqli_query($koneksi, "UPDATE user SET password = '$pb' WHERE password = '$pl' AND username = '$username' ");

        echo "<script>
        alert('Selamat anda telah ganti password');
        window.location='index.php';
        </script>";

        exit;
        if($update){

            echo "benar";

        }

    }

}

?>

<section class="content">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="card-body p-2">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="Id_kelas">Password lama</label>
                                <input type="text" name="pl"
                                    placeholder="Password lama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nm_kelas">Password baru</label>
                                <input type="text" name="pb"
                                    placeholder="Password baru" class="form-control">
                            </div>
                            
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
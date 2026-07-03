<?php
require_once "config/koneksi.php";

/** @var mysqli $koneksi */
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Siswa</h1>
            </div>
        </div>
    </div>
</div>

<?php
$kd = $_GET['kd'];
$edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$kd' "));

if(isset($_POST['tambah'])){
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jenkel = $_POST['jenkel'];
    $alamat = $_POST['alamat'];
    $semester = $_POST['semester'];

    $insert = mysqli_query($koneksi, "UPDATE siswa SET 
        nama='$nama',
        jenkel='$jenkel',
        alamat='$alamat',
        semester='$semester'
    WHERE nis='$nis'");
    
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=siswa">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Gagal Disimpan</h4></div>';
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="nis">nis</label>
                            <input type="number" name="nis" value="<?= $edit['nis']; ?>" 
                                class="form-control" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="nama">Nama Siswa</label>
                            <input type="text" name="nama" id="nama"  value="<?= $edit['nama']; ?>"
                                placeholder="Nama Siswa" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="jenkel">Jenis Kelamin</label>
                        <select name="jenkel" id="jenkel" class="form-control" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" name="alamat" id="alamat" value="<?= $edit['alamat']; ?>"
                                placeholder="alamat" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="semester">Semester</label>
                        <select name="semester" id="semester" class="form-control" required>
                            <option value="">-- Pilih Semester --</option>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                            <option value="6">Semester 6</option>
                            <option value="7">Semester 7</option>
                            <option value="8">Semester 8</option>
                        </select>
                        </div>
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
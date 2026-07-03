<?php
require_once "config/koneksi.php";

/** @var mysqli $koneksi */
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Kegiatan</h1>
            </div>
        </div>
    </div>
</div>

<?php
$kd = $_GET['kd'];
$edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE Kd_kegiatan='$kd' "));

if(isset($_POST['tambah'])){
    $Kd_kegiatan = $_POST['Kd_kegiatan'];
    $Nm_kegiatan = $_POST['Nm_kegiatan'];
    $Kategori = $_POST['Kategori'];
    $Penyelenggara = $_POST['Penyelenggara'];
    $Deskripsi = $_POST['Deskripsi'];
    $Status = $_POST['Status'];

    $insert = mysqli_query($koneksi, "UPDATE kegiatan SET 
        Nm_kegiatan='$Nm_kegiatan',
        Kategori='$Kategori',
        Penyelenggara='$Penyelenggara',
        Deskripsi='$Deskripsi',
        Status='$Status'
    WHERE Kd_kegiatan='$Kd_kegiatan'");
    
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=kegiatan">';
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
                            <label for="Kd_kegiatan">kode kegiatan</label>
                            <input type="text" name="Kd_kegiatan" value="<?= $edit['Kd_kegiatan']; ?>" 
                                class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="Nm_kegiatan">Nama kegiatan</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </span>
                                </div>
                                
                            <input type="text" name="Nm_kegiatan" id="Nm_kegiatan" 
                                placeholder="nama kegiatan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Kategori">Kategori</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </span>
                                </div>
                                
                            <input type="text" name="Kategori" id="Kategori" 
                                placeholder="Kategori" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Penyelenggara">Penyelenggara</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </div>

                            <input type="text" name="Penyelenggara" id="Penyelenggara" 
                                placeholder="Penyelenggara" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Deskripsi">Deskripsi</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                </div>

                            <textarea
                                class="form-control"
                                name="Deskripsi"
                                rows="4"
                                placeholder="Masukkan Deskripsi kegiatan"></textarea>
                        </div>

                       <div class="form-group">
                        <label for="Status">Status</label>

                        <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fas fa-tasks"></i>
                                    </span>
                                </div>

                        <select name="Status" id="Status" class="form-control" required>
                            <option value="">-- Status --</option>
                            <option value="persiapan">Persiapan</option>
                            <option value="sedang berlangsung">Sedang Berlangsung</option>
                            <option value="selesai">Selesai</option>
                        </select>
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
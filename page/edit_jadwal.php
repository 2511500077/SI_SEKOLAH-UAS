<?php
require_once "config/koneksi.php";

/** @var mysqli $koneksi */
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Jadwal Kegiatan</h1>
            </div>
        </div>
    </div>
</div>

<?php
$kd = $_GET['kd'];
$edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id_kegiatan='$kd' "));

if(isset($_POST['tambah'])){
    $id_kegiatan = $_POST['id_kegiatan'];
    $nama_kegiatan = $_POST['nama_kegiatan'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $tempat = $_POST['tempat'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $status = $_POST['status'];

    $insert = mysqli_query($koneksi, "UPDATE jadwal SET 
        nama_kegiatan='$nama_kegiatan',
        deskripsi='$deskripsi',
        tanggal='$tanggal',
        jam='$jam',
        tempat='$tempat',
        penanggung_jawab='$penanggung_jawab',
        status='$status'
    WHERE id_kegiatan='$id_kegiatan'");
    
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=jadwal">';
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
                            <label for="id_kegiatan">kode kegiatan</label>
                            <input type="text" name="id_kegiatan" value="<?= $edit['id_kegiatan']; ?>" 
                                class="form-control" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="nama_kegiatan">Nama kegiatan</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </span>
                                </div>
                                
                            <input type="text" name="nama_kegiatan" id="nama_kegiatan" 
                                placeholder="nama kegiatan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                </div>

                            <textarea
                                class="form-control"
                                name="deskripsi"
                                rows="4"
                                placeholder="Masukkan deskripsi kegiatan"></textarea>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </div>

                            <input type="date" name="tanggal" id="tanggal" 
                                placeholder="tanggal" class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="jam">Jam</label>

                        <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fas fa-tasks"></i>
                                    </span>
                                </div>

                        <input type="time" name="jam" id="jam" 
                                placeholder="Jam kegiatan" class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="tempat">Tempat</label>

                        <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </div>

                        <select name="tempat" id="tempat" class="form-control" required>
                            <option value="">-- Pilih tempat --</option>
                            <option value="futsal">Lapangan Futsal</option>
                            <option value="basket">tempat 2</option>
                            <option value="bem">tempat 3</option>
                            <option value="aula">tempat 4</option>
                            <option value="himti">tempat 5</option>
                            <option value="si">tempat 6</option>
                            <option value="aa">tempat 7</option>
                            <option value="oa">tempat 8</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="penanggung_jawab">Penanggung Jawab</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>

                                <input type="text" name="penanggung_jawab" id="penanggung_jawab" 
                                placeholder="penanggung jawab" class="form-control">
                        </div>

                       <div class="form-group">
                        <label for="status">Status</label>

                        <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fas fa-tasks"></i>
                                    </span>
                                </div>

                        <select name="status" id="status" class="form-control" required>
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
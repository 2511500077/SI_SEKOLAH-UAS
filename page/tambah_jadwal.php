<?php
require_once "config/koneksi.php";

/** @var mysqli $koneksi */
?>
<div class="card card-primary shadow">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-calendar-plus"></i> Tambah Jadwal Kegiatan
        </h3>
    </div>

<?php
//kode otomatis
$carikode = mysqli_query($koneksi, "select max(id_kegiatan) from jadwal") or die (
    mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);
if($datakode[0] != NULL) {
    $nilaikode = substr($datakode[0], 3);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "M-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "M-001";
}
$_SESSION["KODE"] = $hasilkode;

if(isset($_POST['tambah'])){
    $id_kegiatan = $_POST['id_kegiatan'];
    $nama_kegiatan = $_POST['nama_kegiatan'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $tempat = $_POST['tempat'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $status = $_POST['status'];

    $insert = mysqli_query($koneksi, "INSERT INTO jadwal values ('$id_kegiatan','$nama_kegiatan','$deskripsi','$tanggal','$jam','$tempat','$penanggung_jawab','$status')");
    
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
                            <label for="id_kegiatan">Id kegiatan<span class="text-danger">*</span></label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-tag"></i>
                                    </span>
                                </div>

                            <input type="text" name="id_kegiatan"
                                placeholder="kode kegiatan" class="form-control">
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
                            <label for="tempat">Tempat Kegiatan</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </span>
                                </div>
                                
                            <input type="text" name="tempat" id="tempat" 
                                placeholder="Tempat" class="form-control">
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
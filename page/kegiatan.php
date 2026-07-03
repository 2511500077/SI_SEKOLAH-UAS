<?php
require_once "config/koneksi.php";

/** @var mysqli $koneksi */
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">kegiatan</h1>
      </div>
    </div>
  </div>
</div>

<?php
if(isset($_GET['action'])) {
  if($_GET['action'] == "hapus") {
    $kd = $_GET['kd'];
    $query = mysqli_query($koneksi, "DELETE FROM kegiatan where Kd_kegiatan = '$kd' ");
    if ($query){
      echo '
      <div class="alert alert-warning alert-dismissible">
      Berhasil Di Hapus</div>';
      echo '<meta http-equiv="refresh" content="1;url=index.php?page=kegiatan">';
    }
  }
}
?>

<div class="content">
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_kegiatan" class="btn btn-primary btn-sm">
            Tambah kegiatan</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode Kegiatan</th>
                        <th>Nama Kegiatan</th>
                        <th>Kategori</th>
                        <th>Penyelenggara</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM kegiatan");
                while ($result = mysqli_fetch_array($query)) {
                    $no++
                ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['Kd_kegiatan']; ?></td>
                        <td><?= $result['Nm_kegiatan']; ?></td>
                        <td><?= $result['Deskripsi']; ?></td>
                        <td><?= $result['Kategori']; ?></td>
                        <td><?= $result['Penyelenggara']; ?></td>
                        <td><?= $result['Status']; ?></td>
                        <td>
                            <a href="index.php?page=kegiatan&action=hapus&kd=<?= $result['Kd_kegiatan'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span></a>
                            <a href="index.php?page=edit_kegiatan&kd=<?= $result['Kd_kegiatan'] ?>" title="">
                                <span class="badge badge-warning">Edit</span></a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
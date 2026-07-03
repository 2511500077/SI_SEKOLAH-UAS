<?php
require_once "config/koneksi.php";

/* ============================
   Menghitung jumlah data
============================ */

// Jumlah Siswa
$qSiswa = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM siswa");
$dSiswa = mysqli_fetch_assoc($qSiswa);
$totalSiswa = $dSiswa['total'];

// Jumlah Jadwal
$qJadwal = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM jadwal");
$dJadwal = mysqli_fetch_assoc($qJadwal);
$totalJadwal = $dJadwal['total'];

// Jumlah Kegiatan
$qKegiatan = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM kegiatan");
$dKegiatan = mysqli_fetch_assoc($qKegiatan);
$totalKegiatan = $dKegiatan['total'];
?>

<section class="content">
    <div class="container-fluid">

        <div class="row">

            <!-- Jumlah Siswa -->
            <div class="col-lg-4 col-12">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?= $totalSiswa; ?></h3>
                        <p>Jumlah Siswa</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>

                    <a href="?page=siswa" class="small-box-footer">
                        Lihat Data <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Jumlah Jadwal -->
            <div class="col-lg-4 col-12">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $totalJadwal; ?></h3>
                        <p>Jadwal</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>

                    <a href="?page=jadwal" class="small-box-footer">
                        Lihat Data <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Jumlah Kegiatan -->
            <div class="col-lg-4 col-12">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $totalKegiatan; ?></h3>
                        <p>Kegiatan Sekolah</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>

                    <a href="?page=kegiatan" class="small-box-footer">
                        Lihat Data <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>
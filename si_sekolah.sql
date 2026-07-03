-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2026 at 08:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_kegiatan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(244) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `penanggung_jawab` varchar(100) DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_kegiatan`, `nama_kegiatan`, `deskripsi`, `tanggal`, `jam`, `tempat`, `penanggung_jawab`, `status`) VALUES
('KD001', 'Turnament Futsal', 'Tournament antar kelas', '2026-07-25', '07:00:00', 'Lapangan Futsal', 'budi', 'persiapan'),
('KD002', 'Seminar Motivasi', 'Seminar motivasi belajar untuk siswa kelas XII.', '2026-07-07', '16:00:00', 'Aula Sekolah', 'edo trigono', 'sedang berlangsung'),
('KG003', 'Workshop Dasar Laravel', 'Pelatihan pembuatan aplikasi web menggunakan framework Laravel.', '2026-07-20', '09:00:00', 'Lab Komputer', 'Program Keahlian RPL', 'Terjadwal'),
('KG004', 'Bakti Sosial dan Donor Darah', 'Kegiatan sosial berupa donor darah dan pembagian bantuan kepada masyarakat.', '2026-07-25', '08:30:00', 'Aula Sekolah', 'PMR', 'Selesai'),
('KG005', 'Pentas Seni Tahunan', 'Ajang pertunjukan seni dan kreativitas siswa setiap akhir semester.', '2026-08-01', '18:30:00', 'Panggung Utama', 'OSIS', 'Perencanaan');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `Kd_kegiatan` varchar(10) NOT NULL,
  `Nm_kegiatan` varchar(100) NOT NULL,
  `Kategori` varchar(50) NOT NULL,
  `Penyelenggara` varchar(100) NOT NULL,
  `Deskripsi` text,
  `Status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`Kd_kegiatan`, `Nm_kegiatan`, `Kategori`, `Penyelenggara`, `Deskripsi`, `Status`) VALUES
('KD001', 'Tournament Futsal', 'Olahraga', 'Osis', 'tournament antar kelas', 'persiapan'),
('KD002', 'Seminar Motivasi', 'Seminar', 'Sekolah', 'Seminar motivasi belajar untuk siswa kelas XII.', 'sedang berlangsung'),
('KG003', 'Workshop Dasar Laravel', 'Pelatihan', 'Program Keahlian RPL', 'Pelatihan pembuatan aplikasi web menggunakan framework Laravel.', 'Perencanaan'),
('KG004', 'Bakti Sosial dan Donor Darah', 'Sosial', 'PMR', 'Kegiatan sosial berupa donor darah dan pembagian bantuan kepada masyarakat.', 'Selesai'),
('KG005', 'Pentas Seni Tahunan', 'Seni', 'OSIS', 'Ajang pertunjukan seni dan kreativitas siswa setiap akhir semester.', 'Perencanaan');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `jenkel`, `alamat`, `semester`) VALUES
('2511500001', 'Ahmad Fauzan', 'Laki-Laki', 'Jl. Melati No. 1', 'Semester 1'),
('2511500002', 'Budi Santoso', 'Laki-Laki', 'Jl. Mawar No. 2', 'Semester 1'),
('2511500003', 'Citra Lestari', 'Perempuan', 'Jl. Kenanga No. 3', 'Semester 1'),
('2511500004', 'Dewi Anggraini', 'Perempuan', 'Jl. Anggrek No. 4', 'Semester 1'),
('2511500005', 'Eko Prasetyo', 'Laki-Laki', 'Jl. Dahlia No. 5', 'Semester 1'),
('2511500006', 'Fitri Handayani', 'Perempuan', 'Jl. Flamboyan No. 6', 'Semester 1'),
('2511500007', 'Galih Saputra', 'Laki-Laki', 'Jl. Cendana No. 7', 'Semester 1'),
('2511500008', 'Hana Aprilia', 'Perempuan', 'Jl. Sakura No. 8', 'Semester 1'),
('2511500009', 'Indra Kurniawan', 'Laki-Laki', 'Jl. Teratai No. 9', 'Semester 1'),
('2511500010', 'Jihan Maharani', 'Perempuan', 'Jl. Cemara No. 10', 'Semester 1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','guru','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin123', 'admin'),
(2, 'guru01', 'guru123', 'guru'),
(3, 'afdal', '4321', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`Kd_kegiatan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

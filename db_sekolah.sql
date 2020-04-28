-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2020 pada 01.20
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `jadwal`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `jadwal` (
`id_jadwal` int(11)
,`kd_kelas` int(11)
,`kelas` varchar(15)
,`kd_pel` int(11)
,`nm_pel` varchar(102)
,`nik` varchar(10)
,`nm_guru` varchar(100)
,`jam_masuk` time
,`hari_masuk` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `nilai`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `nilai` (
`kd_kelas` int(11)
,`kelas` varchar(15)
,`nis` varchar(10)
,`nm_siswa` varchar(100)
,`nik` varchar(10)
,`nm_guru` varchar(100)
,`kd_pel` int(11)
,`nm_pel` varchar(102)
,`nil_uts` int(11)
,`nil_uas` int(11)
,`nil_tgs` int(11)
,`absen` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nik` varchar(10) NOT NULL,
  `nm_guru` varchar(100) NOT NULL,
  `gelar_depan` varchar(5) DEFAULT NULL,
  `gelar_belakang` varchar(10) DEFAULT NULL,
  `tmpt_lhr_guru` varchar(20) NOT NULL,
  `tgl_lhr_guru` date NOT NULL,
  `agm_guru` varchar(10) NOT NULL,
  `jk_guru` enum('Laki-laki','Perempuan') NOT NULL,
  `pass_guru` varchar(50) NOT NULL,
  `tlp_guru` varchar(25) NOT NULL,
  `email_guru` varchar(30) NOT NULL,
  `almt_guru` varchar(50) NOT NULL,
  `pend_guru` varchar(50) NOT NULL,
  `status_kawin` varchar(20) NOT NULL,
  `jab` varchar(20) NOT NULL,
  `level` int(11) NOT NULL,
  `blokir_guru` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`nik`, `nm_guru`, `gelar_depan`, `gelar_belakang`, `tmpt_lhr_guru`, `tgl_lhr_guru`, `agm_guru`, `jk_guru`, `pass_guru`, `tlp_guru`, `email_guru`, `almt_guru`, `pend_guru`, `status_kawin`, `jab`, `level`, `blokir_guru`) VALUES
('11001101', 'Fatimah', '', ', S.Pd', 'Jakarta', '1945-03-02', 'Islam', 'Perempuan', '3610528e7fee68c6ffb0445603ef2c8e', '0822145723', 'fatimah123@gmail.com', 'Jakarta', 'S1 Pendidikan', 'nikah', 'Guru Kelas', 1, 'Y'),
('112001123', 'Bayu Pratama', '', ', M.Pd', 'Samarinda', '1945-03-04', 'Islam', 'Laki-laki', 'f2582b3317dc19153994569898ee26fd', '082214572312', 'bayupratama12@gmail.com', 'Samarinda', 'S1 Ekonomi', 'Belum Kawin', 'Guru', 2, 'N'),
('11233001', 'Faldiansyah', NULL, ', STI', 'Madura', '1986-12-23', 'Islam', 'Laki-laki', 'aa3979c8eadea52f038ef780bc9d3651', '082214572344', 'faldiansyah123@gmail.com', 'Madura', 'S1 Teknologi Informasi', 'Belum Nikah', 'Guru RPL', 2, 'N'),
('112411982', 'Sukarto', '', ', S.Pd', 'Palangka raya', '1978-04-12', 'Islam', 'Laki-laki', '5fb0d48d012206be30a9c6e68af5c4ae', '08123254664', 'sukarto22@gmail.com', 'Palangka Raya', 'S1 Pendidikan', 'kawin', 'Guru Kelas', 2, 'Y'),
('113012923', 'Prakoso', 'Dr.', ', M.Pd', 'Sampit', '1996-12-01', 'Islam', 'Laki-laki', '42c575fbf68ec3ac5078cfab36734ec5', '089912840233', 'prakoso11@gmail.com', 'Sampit', 'S2 Pendidikan', 'nikah', 'Kepala Sekolah', 2, 'N'),
('113420912', 'Fitriani', 'Dr.', ', M.Pd', 'Sampit', '1988-04-18', 'Islam', 'Perempuan', 'd62bb1ea1604301192cff3a78fd1103b', '082218299293', 'fitriani@gmail.com', 'Jl. Pangeran Antasari no.14', 'S3 Sistem Informasi', 'Belum Kawin', 'Guru TIK', 0, 'Y'),
('114001123', 'Kartini', NULL, ', S.Pd', 'Jakarta', '1986-12-09', 'Islam', 'Perempuan', '508994ba1d02531e88feae95246b9d30', '08221349430', 'kartini11@gmail.com', 'Jakarta', 'S1 Pendidikan', 'belum nikah', 'Guru Kelas', 2, 'N'),
('116001123', 'Teguh Riyadi', NULL, ', M.Pd', 'Sampit', '1978-03-27', 'Islam', 'Laki-laki', '98c70370bff1a385710260676864a835', '0822145723', 'teguh11@gmail.com', 'Sampit', 'S2 Pendidikan', 'nikah', 'Guru', 2, 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal_siswa`
--

CREATE TABLE `tb_jadwal_siswa` (
  `id_jadwal` int(11) NOT NULL,
  `kd_kelas` int(11) NOT NULL,
  `kd_pel` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `jam_masuk` time NOT NULL,
  `hari_masuk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jadwal_siswa`
--

INSERT INTO `tb_jadwal_siswa` (`id_jadwal`, `kd_kelas`, `kd_pel`, `nik`, `jam_masuk`, `hari_masuk`) VALUES
(9, 1126, 3, '11233001', '03:12:52', 'Senin'),
(10, 1128, 1, '11001101', '07:30:00', 'Senin'),
(11, 1124, 3, '11233001', '08:00:00', 'Senin'),
(12, 1129, 5, '11233001', '08:30:00', 'Senin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kd_kelas` int(11) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `kapasitas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`kd_kelas`, `kelas`, `kapasitas`) VALUES
(1123, '3A', '31'),
(1124, '3B', '36'),
(1125, '3C', '30'),
(1126, '2A', '32'),
(1127, '2B', '23'),
(1128, '2C', '34'),
(1129, '2D', '36'),
(1131, '1A', '30'),
(1132, '1B', '35'),
(1133, '1C', '25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `kd_kelas` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `kd_pel` int(11) NOT NULL,
  `nil_uts` int(11) DEFAULT NULL,
  `nil_uas` int(11) DEFAULT NULL,
  `nil_tgs` int(11) DEFAULT NULL,
  `absen` int(11) DEFAULT NULL,
  `rata_rata` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`kd_kelas`, `nis`, `nik`, `kd_pel`, `nil_uts`, `nil_uas`, `nil_tgs`, `absen`, `rata_rata`) VALUES
(1126, '13420113', '11001101', 1, 0, 0, 0, 0, '0'),
(1125, '13420111', '11233001', 3, 70, 60, 60, 70, '0'),
(1124, '13420114', '114001123', 1, 90, 50, 60, 100, '0'),
(1129, '13420112', '11233001', 5, 70, 50, 100, 90, '0'),
(1128, '13420112', '113012923', 6, NULL, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelajaran`
--

CREATE TABLE `tb_pelajaran` (
  `kd_pel` int(11) NOT NULL,
  `nm_pel` varchar(102) NOT NULL,
  `kkm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelajaran`
--

INSERT INTO `tb_pelajaran` (`kd_pel`, `nm_pel`, `kkm`) VALUES
(1, 'Bahasa Indonesia', 8),
(2, 'Matematika', 8),
(3, 'TIK', 6),
(5, 'Analisis sistem', 7),
(6, 'Database Programing', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` varchar(10) NOT NULL,
  `nm_siswa` varchar(100) NOT NULL,
  `tmpt_lhr_siswa` varchar(20) NOT NULL,
  `tgl_lhr_siswa` date NOT NULL,
  `agm_siswa` varchar(50) NOT NULL,
  `jk_siswa` enum('Laki-laki','Perempuan') NOT NULL,
  `almt_siswa` varchar(200) NOT NULL,
  `pass_siswa` varchar(50) NOT NULL,
  `tlp_siswa` varchar(25) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `nm_wali` varchar(30) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nm_siswa`, `tmpt_lhr_siswa`, `tgl_lhr_siswa`, `agm_siswa`, `jk_siswa`, `almt_siswa`, `pass_siswa`, `tlp_siswa`, `asal_sekolah`, `nm_wali`, `level`) VALUES
('13420111', 'Aldi Saputra', 'Sampit', '1999-03-28', 'Islam', 'Laki-laki', 'Sampit', '5cf15fc7e77e85f5d525727358c0ffc9', '081245932040', 'SMK N 3 BANDUNG', 'Sudarso', 3),
('13420112', 'Dea Putri ', 'Bandung', '2020-03-28', 'Islam', 'Perempuan', 'Sampit', '424610336053c55007721a73dcee46d1', '082210563412', 'SMK N 3 BANDUNG', 'Setiawan', 3),
('13420113', 'Aisyah Az-zahra', 'Terantang', '2020-03-25', 'Islam', 'Perempuan', 'Jakarta', '26bb533df5747c7a3f2a9cc48a8cf3ee', '081356035934', 'SMK N 3 BANDUNG', 'Sudarso', 3),
('13420114', 'Budi Susanto', 'Sampit', '2020-03-28', 'Islam', 'Laki-laki', 'Bandung', 'd41d8cd98f00b204e9800998ecf8427e', '082210563412', 'SMK N 3 BANDUNG', 'Sudarso', 3);

-- --------------------------------------------------------

--
-- Struktur untuk view `jadwal`
--
DROP TABLE IF EXISTS `jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jadwal`  AS  select `tb_jadwal_siswa`.`id_jadwal` AS `id_jadwal`,`tb_kelas`.`kd_kelas` AS `kd_kelas`,`tb_kelas`.`kelas` AS `kelas`,`tb_jadwal_siswa`.`kd_pel` AS `kd_pel`,`tb_pelajaran`.`nm_pel` AS `nm_pel`,`tb_jadwal_siswa`.`nik` AS `nik`,`tb_guru`.`nm_guru` AS `nm_guru`,`tb_jadwal_siswa`.`jam_masuk` AS `jam_masuk`,`tb_jadwal_siswa`.`hari_masuk` AS `hari_masuk` from (((`tb_jadwal_siswa` join `tb_kelas` on(`tb_kelas`.`kd_kelas` = `tb_jadwal_siswa`.`kd_kelas`)) join `tb_pelajaran` on(`tb_pelajaran`.`kd_pel` = `tb_jadwal_siswa`.`kd_pel`)) join `tb_guru` on(`tb_guru`.`nik` = `tb_jadwal_siswa`.`nik`)) order by `tb_jadwal_siswa`.`id_jadwal` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `nilai`
--
DROP TABLE IF EXISTS `nilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nilai`  AS  select `tb_nilai`.`kd_kelas` AS `kd_kelas`,`tb_kelas`.`kelas` AS `kelas`,`tb_nilai`.`nis` AS `nis`,`tb_siswa`.`nm_siswa` AS `nm_siswa`,`tb_nilai`.`nik` AS `nik`,`tb_guru`.`nm_guru` AS `nm_guru`,`tb_nilai`.`kd_pel` AS `kd_pel`,`tb_pelajaran`.`nm_pel` AS `nm_pel`,`tb_nilai`.`nil_uts` AS `nil_uts`,`tb_nilai`.`nil_uas` AS `nil_uas`,`tb_nilai`.`nil_tgs` AS `nil_tgs`,`tb_nilai`.`absen` AS `absen` from ((((`tb_nilai` join `tb_kelas` on(`tb_kelas`.`kd_kelas` = `tb_nilai`.`kd_kelas`)) join `tb_siswa` on(`tb_siswa`.`nis` = `tb_nilai`.`nis`)) join `tb_guru` on(`tb_guru`.`nik` = `tb_nilai`.`nik`)) join `tb_pelajaran` on(`tb_pelajaran`.`kd_pel` = `tb_nilai`.`kd_pel`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tb_jadwal_siswa`
--
ALTER TABLE `tb_jadwal_siswa`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_kelas_js` (`kd_kelas`),
  ADD KEY `fk_pel_js` (`kd_pel`),
  ADD KEY `fk_guru_js` (`nik`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD KEY `fk_kelas_n` (`kd_kelas`),
  ADD KEY `fk_pel_n` (`kd_pel`),
  ADD KEY `fk_guru_n` (`nik`),
  ADD KEY `fk_siswa_n` (`nis`);

--
-- Indeks untuk tabel `tb_pelajaran`
--
ALTER TABLE `tb_pelajaran`
  ADD PRIMARY KEY (`kd_pel`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal_siswa`
--
ALTER TABLE `tb_jadwal_siswa`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `kd_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1134;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_jadwal_siswa`
--
ALTER TABLE `tb_jadwal_siswa`
  ADD CONSTRAINT `fk_guru_js` FOREIGN KEY (`nik`) REFERENCES `tb_guru` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kelas_js` FOREIGN KEY (`kd_kelas`) REFERENCES `tb_kelas` (`kd_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pel_js` FOREIGN KEY (`kd_pel`) REFERENCES `tb_pelajaran` (`kd_pel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `fk_guru_n` FOREIGN KEY (`nik`) REFERENCES `tb_guru` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kelas_n` FOREIGN KEY (`kd_kelas`) REFERENCES `tb_kelas` (`kd_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pel_n` FOREIGN KEY (`kd_pel`) REFERENCES `tb_pelajaran` (`kd_pel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_siswa_n` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2020 pada 08.33
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_user` char(15) NOT NULL,
  `hadir` varchar(15) NOT NULL,
  `sakit` varchar(15) NOT NULL,
  `ijin` varchar(15) NOT NULL,
  `lembur` varchar(15) NOT NULL,
  `tgl_ab_awal` varchar(225) NOT NULL,
  `tgl_ab_akhir` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_absensi`
--

INSERT INTO `tb_absensi` (`id_absensi`, `id_user`, `hadir`, `sakit`, `ijin`, `lembur`, `tgl_ab_awal`, `tgl_ab_akhir`) VALUES
(159, 'USER0000006', '29', '1', '1', '10', '2020-09-22', '2020-10-22'),
(160, 'USER0000005', '28', '1', '2', '15', '2020-09-22', '2020-10-22'),
(161, 'USER0000007', '27', '2', '2', '20', '2020-09-22', '2020-10-22'),
(162, 'USER0000010', '27', '2', '2', '15', '2020-09-22', '2020-10-22'),
(163, 'USER0000008', '26', '1', '4', '14', '2020-09-22', '2020-10-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` char(15) NOT NULL,
  `id_jabatan` char(15) NOT NULL,
  `gaji_pokok` varchar(15) NOT NULL,
  `uang_makan` varchar(15) NOT NULL,
  `uang_transport` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `id_jabatan`, `gaji_pokok`, `uang_makan`, `uang_transport`) VALUES
('GJ001', 'JBT001', '5500000', '100000', '150000'),
('GJ002', 'JBT002', '5000000', '100000', '150000'),
('GJ003', 'JBT003', '4500000', '150000', '70000'),
('GJ004', 'JBT004', '4000000', '50000', '70000'),
('GJ005', 'JBT005', '3500000', '50000', '70000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` char(15) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('JBT001', 'Direktur'),
('JBT002', 'Admin/HRD'),
('JBT003', 'Site Manager'),
('JBT004', 'Ass Finance'),
('JBT005', 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_kelamin`
--

CREATE TABLE `tb_jenis_kelamin` (
  `id_jk` int(15) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis_kelamin`
--

INSERT INTO `tb_jenis_kelamin` (`id_jk`, `jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_olah_absen`
--

CREATE TABLE `tb_olah_absen` (
  `id_olah_absen` int(11) NOT NULL,
  `id_user` char(15) NOT NULL,
  `hadir` varchar(15) NOT NULL,
  `sakit` varchar(15) NOT NULL,
  `ijin` varchar(15) NOT NULL,
  `lembur` varchar(15) NOT NULL,
  `tgl_ab_awal` varchar(225) NOT NULL,
  `tgl_ab_akhir` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_olah_absen`
--

INSERT INTO `tb_olah_absen` (`id_olah_absen`, `id_user`, `hadir`, `sakit`, `ijin`, `lembur`, `tgl_ab_awal`, `tgl_ab_akhir`) VALUES
(34, 'USER0000006', '28', '2', '2', '15', '2020-10-23', '2020-11-23'),
(35, 'USER0000005', '27', '2', '3', '16', '2020-10-23', '2020-11-23'),
(36, 'USER0000007', '30', '1', '1', '20', '2020-10-23', '2020-11-23'),
(37, 'USER0000010', '32', '0', '0', '0', '2020-10-23', '2020-11-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengembalian_pinjaman`
--

CREATE TABLE `tb_pengembalian_pinjaman` (
  `id_pengembalian` char(15) NOT NULL,
  `id_pinjaman` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `jumlah_pinjaman` varchar(15) NOT NULL,
  `jumlah_pengembalian` varchar(15) NOT NULL,
  `tgl_pengembalian` varchar(225) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `tb_pengembalian_pinjaman`
--
DELIMITER $$
CREATE TRIGGER `jika_delete_maka_update_tb_pinjaman` BEFORE DELETE ON `tb_pengembalian_pinjaman` FOR EACH ROW BEGIN
	update tb_pinjaman set jumlah_pinjaman = jumlah_pinjaman + old.jumlah_pengembalian where id_pinjaman = old.id_pinjaman;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_tb_pinjaman_jika_input_kembali` AFTER INSERT ON `tb_pengembalian_pinjaman` FOR EACH ROW BEGIN
	update tb_pinjaman SET jumlah_pinjaman = jumlah_pinjaman - new.jumlah_pengembalian where id_pinjaman = new.id_pinjaman;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penggajian`
--

CREATE TABLE `tb_penggajian` (
  `id_penggajian` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `id_jabatan` char(15) NOT NULL,
  `id_gaji` char(15) NOT NULL,
  `id_absensi` char(15) NOT NULL,
  `gaji_pokok` varchar(15) NOT NULL,
  `hadir` varchar(15) NOT NULL,
  `lembur` varchar(15) NOT NULL,
  `jam_perhari` varchar(15) NOT NULL,
  `tot_jamkerja` varchar(15) NOT NULL,
  `upah_prjam` varchar(15) NOT NULL,
  `upah_lembur` varchar(15) NOT NULL,
  `gaji` varchar(15) NOT NULL,
  `tgl_periode_gaji` varchar(225) NOT NULL,
  `tgl_input` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penggajian`
--

INSERT INTO `tb_penggajian` (`id_penggajian`, `id_user`, `id_jabatan`, `id_gaji`, `id_absensi`, `gaji_pokok`, `hadir`, `lembur`, `jam_perhari`, `tot_jamkerja`, `upah_prjam`, `upah_lembur`, `gaji`, `tgl_periode_gaji`, `tgl_input`) VALUES
('GJ0000001', 'USER0000005', 'JBT002', 'GJ002', '160', '5000000', '28', '15', '8', '240', '21875', '328125', '4278125', '2020-10-30', '2020-10-30 02:20:08'),
('GJ0000002', 'USER0000006', 'JBT001', 'GJ001', '159', '5500000', '29', '10', '8', '240', '23958', '239580', '5247836', '2020-10-30', '2020-10-30 02:20:28'),
('GJ0000003', 'USER0000007', 'JBT003', 'GJ003', '161', '4500000', '27', '20', '8', '240', '19667', '393340', '4641412', '2020-10-30', '2020-10-30 02:20:47'),
('GJ0000004', 'USER0000008', 'JBT004', 'GJ004', '163', '4000000', '26', '14', '8', '240', '17167', '240338', '3461074', '2020-10-30', '2020-10-30 06:07:11'),
('GJ0000005', 'USER0000010', 'JBT003', 'GJ003', '162', '4500000', '27', '15', '8', '240', '19667', '295005', '4543077', '2020-10-30', '2020-10-30 06:07:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `id_pinjaman` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `jumlah_pinjaman` varchar(10) NOT NULL,
  `tgl_pinjaman` varchar(225) NOT NULL,
  `tgl_update` varchar(225) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pinjaman`
--

INSERT INTO `tb_pinjaman` (`id_pinjaman`, `id_user`, `jumlah_pinjaman`, `tgl_pinjaman`, `tgl_update`, `keterangan`) VALUES
('PINJ0000001', 'USER0000005', '0', '2020-10-28 04:58:05', '2020-10-30 02:18:58', 'LUNAS'),
('PINJ0000002', 'USER0000006', '0', '2020-10-30 01:37:17', '2020-10-30 02:18:41', 'LUNAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rols_user`
--

CREATE TABLE `tb_rols_user` (
  `id_rols_user` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `id_jabatan` char(15) NOT NULL,
  `tgl_masuk_user` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rols_user`
--

INSERT INTO `tb_rols_user` (`id_rols_user`, `id_user`, `id_jabatan`, `tgl_masuk_user`) VALUES
('ROLS0000005', 'USER0000005', 'JBT002', '2019-10-26 08:23:43'),
('ROLS0000006', 'USER0000006', 'JBT001', '2020-02-26 10:14:47'),
('ROLS0000007', 'USER0000007', 'JBT003', '2019-12-26 03:19:15'),
('ROLS0000008', 'USER0000008', 'JBT004', '2019-05-26 03:31:51'),
('ROLS0000009', 'USER0000009', 'JBT005', '2020-10-28 02:01:25'),
('ROLS0000010', 'USER0000010', 'JBT003', '2020-10-30 06:01:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tabungan_tunjangan`
--

CREATE TABLE `tb_tabungan_tunjangan` (
  `id_tabungan` int(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `tunjangan_kesehatan` varchar(50) NOT NULL,
  `tunjangan_bpjs` varchar(50) NOT NULL,
  `tgl_angsuran` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tabungan_tunjangan`
--

INSERT INTO `tb_tabungan_tunjangan` (`id_tabungan`, `id_user`, `tunjangan_kesehatan`, `tunjangan_bpjs`, `tgl_angsuran`) VALUES
(5, 'USER0000005', '200000', '150000', '2020-10-30 02:20:08'),
(6, 'USER0000008', '200000', '150000', '2020-10-30 06:07:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tunjangan`
--

CREATE TABLE `tb_tunjangan` (
  `id_tunjangan` char(15) NOT NULL,
  `nama_tunjangan` varchar(50) NOT NULL,
  `nominal_tunjangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tunjangan`
--

INSERT INTO `tb_tunjangan` (`id_tunjangan`, `nama_tunjangan`, `nominal_tunjangan`) VALUES
('TUNJ001', 'Kesehatan', '200000'),
('TUNJ002', 'BPJS', '150000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tunjangan_user`
--

CREATE TABLE `tb_tunjangan_user` (
  `id_tunjangan_user` int(15) NOT NULL,
  `id_tunjangan` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `tgl_input` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tunjangan_user`
--

INSERT INTO `tb_tunjangan_user` (`id_tunjangan_user`, `id_tunjangan`, `id_user`, `tgl_input`) VALUES
(1, 'TUNJ001', 'USER0000005', '2020-10-27 11:02:55'),
(2, 'TUNJ001', 'USER0000008', '2020-10-28 09:51:13'),
(3, 'TUNJ002', 'USER0000005', '2020-10-28 10:07:29'),
(4, 'TUNJ002', 'USER0000008', '2020-10-28 10:08:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` char(15) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(225) NOT NULL,
  `confirm_password` varchar(225) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_rekening` varchar(15) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `nama_pemilik_rekening` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nip`, `username`, `password`, `confirm_password`, `nama_user`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `agama`, `no_telp`, `no_rekening`, `nama_bank`, `nama_pemilik_rekening`) VALUES
('USER0000005', '202010260001', 'admin', 'admin', 'admin', 'admin', 'Pemalang', '1992-11-03', 'Laki-laki', 'Pemalang', 'Islam', '089643222222', '123456789', 'BCA', 'Ahmad Admin'),
('USER0000006', '202010260002', 'adminkolam', 'adminkolam', 'adminkolam', 'adminkolam', 'Semarang', '2020-10-02', 'Laki-laki', 'Semarang', 'Islam', '089666677654', '12312314', 'Mandiri', 'Ahmad Admin Kolam'),
('USER0000007', '202010260003', 'dian', 'dian', 'dian', 'dian', 'Pamulang', '2020-10-01', 'Perempuan', 'Pamulang', 'Islam', '089565656878', '12341234', 'Mandiri', 'Dian'),
('USER0000008', '202010260004', 'udin', 'udin', 'udin', 'udin', 'Depok', '2020-10-02', 'Laki-laki', 'Depok', 'Islam', '098786666666', '12367123', 'BNI', 'Udin'),
('USER0000009', '202010280005', 'kopi', 'kopi', 'kopi', 'kopi', 'Semarang', '1995-02-28', 'Laki-laki', 'Semarang', 'Islam', '089877766554', '1231231234', 'BCA', 'Ahmad Kopi'),
('USER0000010', '202010300006', 'winda', 'winda', 'winda', 'winda', 'Palembang', '2020-10-02', 'Perempuan', 'Palembang', 'Islam', '089777778787', '12390897', 'BCA', 'Winda');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_jenis_kelamin`
--
ALTER TABLE `tb_jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `tb_olah_absen`
--
ALTER TABLE `tb_olah_absen`
  ADD PRIMARY KEY (`id_olah_absen`);

--
-- Indeks untuk tabel `tb_pengembalian_pinjaman`
--
ALTER TABLE `tb_pengembalian_pinjaman`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indeks untuk tabel `tb_penggajian`
--
ALTER TABLE `tb_penggajian`
  ADD PRIMARY KEY (`id_penggajian`);

--
-- Indeks untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_rols_user`
--
ALTER TABLE `tb_rols_user`
  ADD PRIMARY KEY (`id_rols_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `tb_tabungan_tunjangan`
--
ALTER TABLE `tb_tabungan_tunjangan`
  ADD PRIMARY KEY (`id_tabungan`);

--
-- Indeks untuk tabel `tb_tunjangan`
--
ALTER TABLE `tb_tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- Indeks untuk tabel `tb_tunjangan_user`
--
ALTER TABLE `tb_tunjangan_user`
  ADD PRIMARY KEY (`id_tunjangan_user`),
  ADD KEY `id_tunjangan` (`id_tunjangan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_kelamin`
--
ALTER TABLE `tb_jenis_kelamin`
  MODIFY `id_jk` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_olah_absen`
--
ALTER TABLE `tb_olah_absen`
  MODIFY `id_olah_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_tabungan_tunjangan`
--
ALTER TABLE `tb_tabungan_tunjangan`
  MODIFY `id_tabungan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_tunjangan_user`
--
ALTER TABLE `tb_tunjangan_user`
  MODIFY `id_tunjangan_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD CONSTRAINT `tb_absensi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD CONSTRAINT `tb_gaji_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD CONSTRAINT `tb_pinjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rols_user`
--
ALTER TABLE `tb_rols_user`
  ADD CONSTRAINT `tb_rols_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rols_user_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tunjangan_user`
--
ALTER TABLE `tb_tunjangan_user`
  ADD CONSTRAINT `tb_tunjangan_user_ibfk_1` FOREIGN KEY (`id_tunjangan`) REFERENCES `tb_tunjangan` (`id_tunjangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_tunjangan_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

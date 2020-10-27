-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2020 pada 15.48
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
(155, 'USER0000006', '19', '1', '1', '15', '2020-10-01', '2020-10-21'),
(156, 'USER0000005', '15', '4', '2', '15', '2020-10-01', '2020-10-21');

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
(23, 'USER0000007', '15', '5', '1', '20', '2020-10-01', '2020-10-21');

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
-- Dumping data untuk tabel `tb_pengembalian_pinjaman`
--

INSERT INTO `tb_pengembalian_pinjaman` (`id_pengembalian`, `id_pinjaman`, `id_user`, `jumlah_pinjaman`, `jumlah_pengembalian`, `tgl_pengembalian`, `keterangan`) VALUES
('KEMB0000001', 'PINJ0000001', 'USER0000005', '700000', '200000', '2020-10-27 04:37:16', 'Oke');

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
('PINJ0000001', 'USER0000005', '700000', '2020-10-27 03:07:49', '2020-10-27 03:28:12', 'Bayar kontrakan');

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
('ROLS0000008', 'USER0000008', 'JBT004', '2019-05-26 03:31:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tunjangan`
--

CREATE TABLE `tb_tunjangan` (
  `id_tunjangan` int(11) NOT NULL,
  `nama_tunjangan` varchar(50) NOT NULL,
  `nominal_tunjangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('USER0000008', '202010260004', 'udin', 'udin', 'udin', 'udin', 'Depok', '2020-10-02', 'Laki-laki', 'Depok', 'Islam', '098786666666', '12367123', 'BNI', 'Udin');

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
-- Indeks untuk tabel `tb_tunjangan`
--
ALTER TABLE `tb_tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

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
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_kelamin`
--
ALTER TABLE `tb_jenis_kelamin`
  MODIFY `id_jk` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_olah_absen`
--
ALTER TABLE `tb_olah_absen`
  MODIFY `id_olah_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_tunjangan`
--
ALTER TABLE `tb_tunjangan`
  MODIFY `id_tunjangan` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

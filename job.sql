-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2021 pada 14.48
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `apply`
--

CREATE TABLE `apply` (
  `id_apply` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `status_apply` int(11) DEFAULT NULL,
  `status_pelamar` int(11) NOT NULL,
  `file` varchar(1000) NOT NULL,
  `files` varchar(1000) NOT NULL,
  `tgl_apply` date NOT NULL,
  `pesan` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `apply`
--

INSERT INTO `apply` (`id_apply`, `id_pelamar`, `id_job`, `id_perusahaan`, `status_apply`, `status_pelamar`, `file`, `files`, `tgl_apply`, `pesan`) VALUES
(3, 5, 16, 22, 1, 1, 'Puty-Syalima-11-23-2020_(1).pdf', 'Puty-Syalima-11-23-2020.pdf', '2020-11-24', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `bidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `bidang`) VALUES
(1, 'IT'),
(2, 'Keuangan'),
(4, 'Edukasi'),
(5, 'Marketing\r\n'),
(6, 'Administasi'),
(7, 'Costumer Relationship'),
(8, 'Tekniks'),
(9, 'Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Teknologi Informasi'),
(2, 'Kedokteran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_industri`
--

CREATE TABLE `jenis_industri` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_industri`
--

INSERT INTO `jenis_industri` (`id_jenis`, `jenis`) VALUES
(1, 'IT & Telecommunication'),
(2, 'Healthcare & Pharmaceutical');

-- --------------------------------------------------------

--
-- Struktur dari tabel `joblist`
--

CREATE TABLE `joblist` (
  `id_job` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `gaji_max` int(11) DEFAULT NULL,
  `gaji_min` int(11) DEFAULT NULL,
  `tgl_akhir` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `syarat` varchar(500) NOT NULL,
  `desk_job` varchar(2000) DEFAULT NULL,
  `status_job` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `joblist`
--

INSERT INTO `joblist` (`id_job`, `id_perusahaan`, `posisi`, `id_bidang`, `gaji_max`, `gaji_min`, `tgl_akhir`, `tgl_posting`, `tipe`, `syarat`, `desk_job`, `status_job`) VALUES
(16, 22, 'Anak kucing', 1, 1000000000, 1000000, '2020-11-28', '0000-00-00', 'full time', 'Bisa main komputer, bisa ngoding.', '<p>Kami membutuhkan pelamar yang memiliki kompetensi seperti anak kucing dengan syarat :</p>\r\n\r\n<p>1. Lucu</p>\r\n\r\n<p>2. Lucu</p>\r\n\r\n<p>3. Lucu</p>\r\n\r\n<p>4. Lucu</p>\r\n', '0'),
(17, 22, 'Boss', 1, 1000000000, 0, '2020-12-12', '2020-11-24', 'full time', 'Suka anime', '<p>Heheehhhe</p>\r\n', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Sistem Informasi'),
(2, 'Pendidikan Dokter'),
(3, 'Teknik Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`) VALUES
(1, 'Padang'),
(2, 'Padang'),
(3, 'Jakarta'),
(4, 'Bali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `organisasi`
--

CREATE TABLE `organisasi` (
  `id_or` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `nama_p` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `id_fakultas` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `keahlian` varchar(1000) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `id_user`, `nama_p`, `telp`, `id_fakultas`, `id_jurusan`, `keahlian`, `tgl_lahir`, `jk`, `tempat_lahir`, `agama`, `alamat`, `tahun_masuk`, `foto`) VALUES
(3, 'riri', 'Riri Cantik', '909', 2, 2, 'Make Up', '2020-11-02', 'Wanita', 'Jepang', 'Islam', 'Padang', 2018, ''),
(5, 'puty', 'Puty Syalima', '081267889865', 1, 1, 'Menyanyi, tidur, makan, main game, masak, cuci piring, jemur baju, cuci baju, berdiam, berbicara dengan kucing.', '2020-11-14', 'Wanita', 'Padang', 'Islam', 'Komp. Rivera Garden Blok C.6', 2018, 'Em0xLfwUYAMFJ8A.jpg'),
(6, 'puty2', 'Puty Syalima2', '812676767676', 1, 1, 'Diam', '2020-11-25', 'Wanita', 'Padang', 'Islam', 'Komplek Rivera Garden Blok C.6', 2018, 'gummy.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `sertifikat` varchar(1000) NOT NULL,
  `desk_pengalaman` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengalaman`
--

INSERT INTO `pengalaman` (`id`, `id_pelamar`, `tahun`, `sertifikat`, `desk_pengalaman`) VALUES
(2, 5, '2020 - Sekarang', 'Puty-Syalima-11-23-2020_(1).pdf', 'Dokutah'),
(4, 5, '2001', 'certificate.pdf', 'Lomba mewarnai tingkat INTERNASIONAL di Amsterdam, Belanda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `npwp` bigint(20) DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `id_kota` int(11) NOT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `npwp`, `id_user`, `id_jenis`, `nama`, `alamat`, `id_kota`, `telp`, `deskripsi`, `logo`) VALUES
(22, 123456, 'Laputty', 1, 'Laputty', 'Jl. Jendral Sudirman No.3', 1, '08263273627', '<p>Perusahaan ini berfokus pada pembuatan vaksin-vaksin</p>\r\n', 'gummy.jpg'),
(23, 2121, 'Budiman', 2, 'Budiman', 'Jl. Sawahan No.3', 1, '0751', '<p>Budiman supermarket terlengkap</p>\r\n', 'unnamed.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload`
--

CREATE TABLE `upload` (
  `id_file` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `upload`
--

INSERT INTO `upload` (`id_file`, `logo`) VALUES
(1, 'Captssssssure.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `uac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `uname`, `pass`, `email`, `tgl_daftar`, `uac`) VALUES
('aaaa', 'aaaa', '123456', 'a@gmail.com', '2021-11-22', 'PERUSAHAAN'),
('admin', 'admin', 'admin', 'admin@gmail.com', '0000-00-00', 'ADM'),
('Budiman', 'Budiman', 'budiman', 'budimansupermarket@gmail.com', '2020-11-24', 'PERUSAHAAN'),
('coba', 'coba', '12345', 'coba@gmail.com', '2021-11-22', 'PERUSAHAAN'),
('Laputty', 'Laputty', 'laputty', 'laputty@gmail.com', '0000-00-00', 'PERUSAHAAN'),
('Meong', 'Meong', 'meong', 'meongucul@gmail.com', '0000-00-00', 'PELAMAR'),
('Meong2', 'Meong2', 'meong2', 'meongucul2@gmail.com', '2020-11-24', 'PELAMAR'),
('puty', 'puty', 'admin', 'puttysalima1@gmail.com', '0000-00-00', 'PELAMAR'),
('puty2', 'puty2', 'puty2', 'puty2@gmail.com', '0000-00-00', 'PELAMAR'),
('riri', 'riri', 'riri', 'riri@gmail.com', '0000-00-00', 'PELAMAR');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id_apply`),
  ADD KEY `id_user` (`id_pelamar`),
  ADD KEY `id_job` (`id_job`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `jenis_industri`
--
ALTER TABLE `jenis_industri`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `joblist`
--
ALTER TABLE `joblist`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `id_perusahaan` (`id_perusahaan`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id_or`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_pelamar`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD UNIQUE KEY `npwp` (`npwp`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indeks untuk tabel `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `apply`
--
ALTER TABLE `apply`
  MODIFY `id_apply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_industri`
--
ALTER TABLE `jenis_industri`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `joblist`
--
ALTER TABLE `joblist`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id_or` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `upload`
--
ALTER TABLE `upload`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`id_job`) REFERENCES `joblist` (`id_job`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apply_ibfk_3` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apply_ibfk_4` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `joblist`
--
ALTER TABLE `joblist`
  ADD CONSTRAINT `joblist_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `joblist_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `organisasi`
--
ALTER TABLE `organisasi`
  ADD CONSTRAINT `organisasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pelamar` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD CONSTRAINT `pelamar_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelamar_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelamar_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD CONSTRAINT `pengalaman_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perusahaan_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_industri` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perusahaan_ibfk_3` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

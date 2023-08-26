-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 26 Agu 2023 pada 16.58
-- Versi server: 5.7.34
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontrak_kerja`
--

CREATE TABLE `kontrak_kerja` (
  `id_kontrak` int(5) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `no_sk_kerja` varchar(50) DEFAULT NULL,
  `penempatan` varchar(100) DEFAULT NULL,
  `tgl_mulai_tugas` date DEFAULT NULL,
  `no_surat_yayasan` varchar(100) DEFAULT NULL,
  `tgl_pengesahan` date DEFAULT NULL,
  `yang_mengesahkan` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `nidn` varchar(100) DEFAULT NULL,
  `jabatan_struktural` varchar(100) DEFAULT NULL,
  `jabatan_akademik` varchar(100) DEFAULT NULL,
  `tgl_awal_mengabdi` date DEFAULT NULL,
  `gaji` int(10) DEFAULT NULL,
  `awal_kontrak` date DEFAULT NULL,
  `akhir_kontrak` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `magang`
--

CREATE TABLE `magang` (
  `id_magang` int(10) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `no_sk_magang` varchar(20) DEFAULT NULL,
  `penempatan_magang` varchar(100) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `no_surat_yayasan` varchar(100) DEFAULT NULL,
  `tgl_pengesahan` date DEFAULT NULL,
  `yang_mengesahkan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `magang`
--

INSERT INTO `magang` (`id_magang`, `nik`, `no_sk_magang`, `penempatan_magang`, `tgl_mulai`, `no_surat_yayasan`, `tgl_pengesahan`, `yang_mengesahkan`) VALUES
(1, '9834', '987', 'Lab Farmasi 2b', '2023-08-08', '1111', '2023-08-24', 'anwar'),
(2, '253412', '1123', 'Lab Farmasi 2b', '2023-08-05', '34453', '2023-08-29', 'anwar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` int(10) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama_pelamar` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `rencana_jabatan` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tanggal_lamaran` date DEFAULT NULL,
  `penilaian_berkas` int(5) DEFAULT NULL,
  `tanggal_test_berkas` date DEFAULT NULL,
  `nilai_test_tulis` int(11) NOT NULL,
  `tanggal_test_tulis` date DEFAULT NULL,
  `tanggal_psikotes` date DEFAULT NULL,
  `tanggal_wawancara` date DEFAULT NULL,
  `nilai_wawancara` int(5) DEFAULT NULL,
  `tanggal_seleksi_pengasuh` date DEFAULT NULL,
  `file_berkas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `nik`, `nama_pelamar`, `tempat_lahir`, `tanggal_lahir`, `rencana_jabatan`, `alamat`, `no_hp`, `email`, `tanggal_lamaran`, `penilaian_berkas`, `tanggal_test_berkas`, `nilai_test_tulis`, `tanggal_test_tulis`, `tanggal_psikotes`, `tanggal_wawancara`, `nilai_wawancara`, `tanggal_seleksi_pengasuh`, `file_berkas`) VALUES
(1, '253412', 'syarif 25', 'jember', '2021-02-12', 'Kepala Lab ', 'Desa Gudang, Kec Asembagus, Kab Situbondo', '082134', 'aminulkhoiri@gmail.com', '2023-08-24', 80, '2023-09-09', 90, '2023-08-15', NULL, '2023-08-05', 78, NULL, '4wiZj9Pp8lfrmt3zYbNGDoJCLHAVXdnSMqkUsx6TcvghF5a7OB1693022168.pdf'),
(2, '9834', 'zainal', 'Sukorejo', '2009-09-09', 'Dekan', 'sodung', '08223', 'dikti.sukorejo@gmail.com', '2023-08-26', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(5) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `level`) VALUES
(1, 'coba', '$2y$10$8AEJC6qmMsbMMF82Bt.G1OYErLb2imBN7UnOg06gobqEYzggcSwjy', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_magang`
--

CREATE TABLE `penilaian_magang` (
  `id_penilaian` int(5) NOT NULL,
  `id_magang` int(5) DEFAULT NULL,
  `nilai_bulan1` int(5) DEFAULT NULL,
  `nilai_bulan2` int(5) DEFAULT NULL,
  `nilai_bulan3` int(5) DEFAULT NULL,
  `tes_mengajar` int(5) DEFAULT NULL,
  `total_nilai` int(5) DEFAULT NULL,
  `keputusan` varchar(100) NOT NULL,
  `status_lanjut` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `tgl_penilaian` date DEFAULT NULL,
  `yang_menilai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penilaian_magang`
--

INSERT INTO `penilaian_magang` (`id_penilaian`, `id_magang`, `nilai_bulan1`, `nilai_bulan2`, `nilai_bulan3`, `tes_mengajar`, `total_nilai`, `keputusan`, `status_lanjut`, `keterangan`, `tgl_penilaian`, `yang_menilai`) VALUES
(1, 1, 20, 30, 40, 45, 70, '5', 'Lanjut Karyawan Tetap', 'sip', '2023-08-05', 'ayu'),
(2, 2, 10, 11, 12, 13, 45, 'ok', 'Tidak', 'ok lanjut', '2023-08-17', 'fitri si');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perizinan`
--

CREATE TABLE `perizinan` (
  `id_perizinan` int(10) NOT NULL,
  `nik` varchar(15) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `izin` varchar(100) DEFAULT NULL,
  `tgl_awal_izin` date DEFAULT NULL,
  `tgl_akhir_izin` date DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lembaga`
--

CREATE TABLE `tb_lembaga` (
  `id_lembaga` varchar(10) NOT NULL,
  `nama_lembaga` varchar(50) DEFAULT NULL,
  `dekan` varchar(100) DEFAULT NULL,
  `wadek1` varchar(100) DEFAULT NULL,
  `wadek2` varchar(100) DEFAULT NULL,
  `wadek3` varchar(100) DEFAULT NULL,
  `ktu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_lembaga`
--

INSERT INTO `tb_lembaga` (`id_lembaga`, `nama_lembaga`, `dekan`, `wadek1`, `wadek2`, `wadek3`, `ktu`) VALUES
('LMB001', 'Fakultas Ilmu Kesehatan', 'Neni', 'Rini', 'nila', 'yuli', 'Yuni'),
('LMB002', 'Fakultas Sains dan Teknologi', 'Abdul Gofur', 'Ahmad Humaidi', 'Abdul Wafi', 'Lutfi', 'Faiqo'),
('LMB003', 'Fakultas Dakwah 1', 'dekanb', 'wadek 1', 'wadek 2', 'wadek 3', 'ktu 1'),
('LMB004', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kontrak_kerja`
--
ALTER TABLE `kontrak_kerja`
  ADD PRIMARY KEY (`id_kontrak`);

--
-- Indeks untuk tabel `magang`
--
ALTER TABLE `magang`
  ADD PRIMARY KEY (`id_magang`);

--
-- Indeks untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `penilaian_magang`
--
ALTER TABLE `penilaian_magang`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `perizinan`
--
ALTER TABLE `perizinan`
  ADD PRIMARY KEY (`id_perizinan`);

--
-- Indeks untuk tabel `tb_lembaga`
--
ALTER TABLE `tb_lembaga`
  ADD PRIMARY KEY (`id_lembaga`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kontrak_kerja`
--
ALTER TABLE `kontrak_kerja`
  MODIFY `id_kontrak` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `magang`
--
ALTER TABLE `magang`
  MODIFY `id_magang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penilaian_magang`
--
ALTER TABLE `penilaian_magang`
  MODIFY `id_penilaian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `perizinan`
--
ALTER TABLE `perizinan`
  MODIFY `id_perizinan` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

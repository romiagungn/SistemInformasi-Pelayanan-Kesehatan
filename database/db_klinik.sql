-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Feb 2017 pada 07.38
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `no_pembayaran` varchar(100) NOT NULL,
  `id_obat` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `total_biaya` int(100) NOT NULL,
  `total_bayar` int(100) NOT NULL,
  `kembalian` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`no_pembayaran`, `id_obat`, `jumlah`, `total_biaya`, `total_bayar`, `kembalian`) VALUES
('PEM-001', 'OB-005', 2, 192000, 200000, 8000),
('PEM-001', 'OB-008', 2, 192000, 200000, 8000),
('PEM-001', 'OB-009', 3, 192000, 200000, 8000),
('PEM-001', 'OB-010', 2, 192000, 200000, 8000),
('PEM-002', 'OB-009', 2, 145000, 150000, 5000),
('PEM-002', 'OB-009', 3, 145000, 150000, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penerimaan`
--

CREATE TABLE `detail_penerimaan` (
  `id_penerimaan` varchar(100) NOT NULL,
  `id_obat` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `sisa` varchar(100) NOT NULL,
  `kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penerimaan`
--

INSERT INTO `detail_penerimaan` (`id_penerimaan`, `id_obat`, `jumlah`, `sisa`, `kadaluarsa`) VALUES
('PE-02-17-0001', 'OB-001', 100, '98', '2017-02-28'),
('PE-02-17-0001', 'OB-002', 100, '96', '2017-02-28'),
('PE-02-17-0001', 'OB-003', 100, '96', '2017-02-28'),
('PE-02-17-0001', 'OB-004', 100, '95', '2017-02-28'),
('PE-02-17-0001', 'OB-005', 100, '95', '2017-02-28'),
('PE-02-17-0001', 'OB-006', 100, '96', '2017-02-28'),
('PE-02-17-0001', 'OB-007', 100, '97', '2017-02-28'),
('PE-02-17-0001', 'OB-008', 100, '95', '2017-02-28'),
('PE-02-17-0001', 'OB-009', 100, '90', '2017-02-28'),
('PE-02-17-0001', 'OB-010', 100, '95', '2017-02-28'),
('PE-02-17-0001', 'OB-011', 100, '100', '2017-02-28'),
('PE-02-17-0001', 'OB-012', 100, '100', '2017-02-28'),
('PE-02-17-0001', 'OB-013', 100, '100', '2017-02-28'),
('PE-02-17-0001', 'OB-014', 100, '100', '2017-02-28'),
('PE-02-17-0001', 'OB-015', 100, '100', '2017-02-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_permintaan`
--

CREATE TABLE `detail_permintaan` (
  `id_permintaan` varchar(100) NOT NULL,
  `id_obat` varchar(100) NOT NULL,
  `id_supplier` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_permintaan`
--

INSERT INTO `detail_permintaan` (`id_permintaan`, `id_obat`, `id_supplier`, `jumlah`, `status`) VALUES
('OP-02-17-0001', 'OB-001', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-002', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-003', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-004', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-005', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-006', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-007', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-008', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-009', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-010', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-011', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-012', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-013', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-014', 'SP-001', '100', '2'),
('OP-02-17-0001', 'OB-015', 'SP-001', '100', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_resep`
--

CREATE TABLE `detail_resep` (
  `id_rekam` varchar(100) NOT NULL,
  `id_obat` varchar(100) NOT NULL,
  `jumlah_obat` int(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `keterangan_Pakai` varchar(100) NOT NULL,
  `dosis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_resep`
--

INSERT INTO `detail_resep` (`id_rekam`, `id_obat`, `jumlah_obat`, `satuan`, `keterangan_Pakai`, `dosis`) VALUES
('MEDREC-001', 'OB-005', 2, 'strip', 'qweqwe', '2 x 1 per hari'),
('MEDREC-001', 'OB-008', 2, 'botol', 'asdsad', '3 x 1 per hari'),
('MEDREC-001', 'OB-009', 3, 'botol', 'zxczxc', '4 x 1 per hari'),
('MEDREC-001', 'OB-010', 2, 'strip', 'mnmnmn', '1 x 1 per hari'),
('MEDREC-002', 'OB-009', 2, 'botol', 'wqeweqwe', '1 x 1 per hari'),
('MEDREC-002', 'OB-009', 3, 'botol', 'sdasdasda', '1 x 1 per hari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_retur`
--

CREATE TABLE `detail_retur` (
  `id_retur` varchar(100) NOT NULL,
  `id_obat` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `jumlah_retur` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id_penerimaan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerimaan`
--

INSERT INTO `penerimaan` (`id_penerimaan`, `tanggal`) VALUES
('PE-02-17-0001', '2017-02-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `persetujuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `tanggal`, `persetujuan`) VALUES
('OP-02-17-0001', '2017-02-03', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur`
--

CREATE TABLE `retur` (
  `id_retur` varchar(110) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(100) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL,
  `no_supplier` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_supplier`) VALUES
('SP-001', 'PT Obat Nusantara', 'Jalan Soekarno Hatta', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_daftar`
--

CREATE TABLE `t_daftar` (
  `id_daftar` varchar(100) NOT NULL,
  `id_pasien` varchar(100) NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `id_dokter` varchar(10) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `jam_daftar` time NOT NULL,
  `antrian` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_daftar`
--

INSERT INTO `t_daftar` (`id_daftar`, `id_pasien`, `keluhan`, `id_dokter`, `tgl_daftar`, `jam_daftar`, `antrian`) VALUES
('DF-001', 'PS-002', 'adas', 'D001', '2017-02-06', '09:58:46', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dokter`
--

CREATE TABLE `t_dokter` (
  `id_dokter` varchar(20) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `ruang_rawat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_dokter`
--

INSERT INTO `t_dokter` (`id_dokter`, `nama_dokter`, `ruang_rawat`) VALUES
('D001', 'Dr. Tita Fatmawati,Mh.Kes ', 'Poli Umum'),
('D002', 'Dr. Risma Sagharani, Sp.RKG', 'Poli Gigi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_obat`
--

CREATE TABLE `t_obat` (
  `id_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `jenis_obat` varchar(20) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga_obat` varchar(20) NOT NULL,
  `stok_obat_awal` varchar(20) NOT NULL,
  `stok_obat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_obat`
--

INSERT INTO `t_obat` (`id_obat`, `nama_obat`, `jenis_obat`, `satuan`, `harga_obat`, `stok_obat_awal`, `stok_obat`) VALUES
('OB-001', 'aetimil', 'Obat Kapsul', 'strip', '16000', '100', '98'),
('OB-002', 'acifar 200mg', 'Obat Kapsul', 'strip', '12000', '100', '96'),
('OB-003', 'anacetin syr', 'Obat Tablet', 'strip', '15000', '100', '96'),
('OB-004', 'actifed syr', 'Obat Kapsul', 'strip', '15000', '100', '95'),
('OB-005', 'acyclovir 200mg', 'Obat Kapsul', 'strip', '12000', '100', '95'),
('OB-006', 'acyclovir 400mg', 'Obat Kapsul', 'strip', '15000', '100', '96'),
('OB-007', 'adrome tab', 'Obat Tablet', 'strip', '19000', '100', '97'),
('OB-008', 'alco syr', 'Obat Cair', 'botol', '23000', '100', '95'),
('OB-009', 'alco plus dmp syr', 'Obat Cair', 'botol', '25000', '100', '90'),
('OB-010', 'alofar 100mg', 'Obat Kapsul', 'strip', '13500', '100', '95'),
('OB-011', 'armacort cr', 'Obat Kapsul', 'strip', '9000', '100', '100'),
('OB-012', 'ambeven caps', 'Obat Kapsul', 'strip', '8900', '100', '100'),
('OB-013', 'amlodipine 10mg tab', 'Obat Kapsul', 'strip', '4800', '100', '100'),
('OB-014', 'amlodipine 5mg tab', 'Obat Kapsul', 'strip', '13000', '100', '100'),
('OB-015', 'anti mage', 'Cair', 'botol', '12000', '100', '100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pasien`
--

CREATE TABLE `t_pasien` (
  `id_pasien` varchar(10) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `rpk` varchar(100) NOT NULL,
  `rps` varchar(100) NOT NULL,
  `kebiasaan` varchar(100) NOT NULL,
  `alergi_obat` varchar(100) NOT NULL,
  `alergi_lain` varchar(100) NOT NULL,
  `alamat_kantor` varchar(100) NOT NULL,
  `penjamin` varchar(100) NOT NULL,
  `jenis_bayar` varchar(100) NOT NULL,
  `no_bpjs` varchar(100) NOT NULL,
  `no_asuransi` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pasien`
--

INSERT INTO `t_pasien` (`id_pasien`, `nama_pasien`, `tgl_lahir`, `umur`, `tempat_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat`, `status`, `pekerjaan`, `rpk`, `rps`, `kebiasaan`, `alergi_obat`, `alergi_lain`, `alamat_kantor`, `penjamin`, `jenis_bayar`, `no_bpjs`, `no_asuransi`, `nama_perusahaan`) VALUES
('PS-001', 'romi agung nugraha', '1994-05-10', '22', 'bandung', 'Pria', 'Islam', '081809160482', 'jalan riung bandung', 'Belum Menikah', 'mahasiswa', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'siapa ya', 'tunai', '', '', ''),
('PS-002', 'muhammad irsyad', '1994-01-11', '22', 'bukit tinggi', 'Pria', 'Islam', '081809160482', 'jalan laswi', 'Belum Menikah', 'mahasiswa', 'tidak ada', 'tidak ada', 'tidak ada', 'obat anti biotik', 'obat anti biotik', 'tidak ada', 'masnidar', 'tunai', '', '', ''),
('PS-003', 'syakhira dini aghnia', '1994-01-03', '22', 'bandung', 'Wanita', 'Islam', '081809160482', 'Gang ahmad yani', 'Belum Menikah', 'ngaggur', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'yani', 'tunai', '', '', ''),
('PS-004', 'Agung Febrian', '1994-01-17', '22', 'bandung', 'Pria', 'Islam', '081809160482', 'jalan sariwates', 'Belum Menikah', 'rekam medis ', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'jalan halmahera', 'pono', 'tunai', '', '', ''),
('PS-005', 'galih faishal', '1994-05-10', '22', 'garut', 'Pria', 'Islam', '081809160482', 'jalan panyileukan', 'Belum Menikah', 'administrator', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'jalan setiaubudi', 'neneng nurmaida', 'tunai', '', '', ''),
('PS-006', 'reza septiansyah ridwan', '1994-05-17', '22', 'bandung', 'Pria', 'Islam', '081809160482', 'jalan padasuka', 'Belum Menikah', 'mahasiswa', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'iwan ridwan', 'tunai', '', '', ''),
('PS-007', 'arief ahmadi', '1994-05-10', '23', 'bandung', 'Pria', 'Islam', '081809160482', 'jalan rancaekek', 'Belum Menikah', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'ahmadi', 'tunai', '', '', ''),
('PS-008', 'irfan rahman hamdun', '1994-06-15', '22', 'bandung', 'Pria', 'Islam', '081809160482', 'jalan cikadut', 'Belum Menikah', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'endun hamdun', 'tunai', '', '', ''),
('PS-009', 'apriliantpo', '1994-08-26', '22 ', 'bandung', 'Pria', 'Islam', '081809160482', 'jalan riung mukti 1', 'Belum Menikah', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tunai', '', '', ''),
('PS-010', 'Edwin Martadinata', '0000-00-00', '22', 'singkawang', 'Pria', 'Islam', '081809160482', 'tidak ada', 'Belum Menikah', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tunai', '', '', ''),
('PS-011', 'qwqwe', '1994-01-10', '1', 'wqeqwe', 'Pilih Jeni', 'Kristen', '123123', 'qwqwe', 'Belum Menikah', 'qweqwe', 'qwewe', 'qwew', 'qww', 'qwqwe', 'qwqwe', 'qweqw', 'qwqew', 'tunai', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pembayaran`
--

CREATE TABLE `t_pembayaran` (
  `no_pembayaran` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_keluar` time NOT NULL,
  `id_daftar` varchar(100) NOT NULL,
  `id_rekam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pembayaran`
--

INSERT INTO `t_pembayaran` (`no_pembayaran`, `tanggal`, `jam_keluar`, `id_daftar`, `id_rekam`) VALUES
('PEM-001', '2017-02-06', '10:00:24', 'DF-001', 'MEDREC-001'),
('PEM-002', '2017-02-06', '10:23:16', 'DF-001', 'MEDREC-002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_proses`
--

CREATE TABLE `t_proses` (
  `id_daftar` varchar(100) NOT NULL,
  `p_pendaftaran` varchar(20) NOT NULL DEFAULT 'Menunggu',
  `p_pemeriksaan` varchar(20) NOT NULL DEFAULT 'Menunggu',
  `p_pembayaran` varchar(20) NOT NULL DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_proses`
--

INSERT INTO `t_proses` (`id_daftar`, `p_pendaftaran`, `p_pemeriksaan`, `p_pembayaran`) VALUES
('DF-001', 'Tuntas', 'Tuntas', 'Tuntas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rekam`
--

CREATE TABLE `t_rekam` (
  `id_rekam` varchar(20) NOT NULL,
  `id_daftar` varchar(100) NOT NULL,
  `id_pasien` varchar(100) NOT NULL,
  `pemeriksaan` varchar(100) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `tindakan` varchar(100) NOT NULL,
  `saran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_rekam`
--

INSERT INTO `t_rekam` (`id_rekam`, `id_daftar`, `id_pasien`, `pemeriksaan`, `diagnosa`, `tindakan`, `saran`) VALUES
('MEDREC-001', 'DF-001', 'PS-002', 'Palpasi', 'sada', 'asdsad', 'asdsad'),
('MEDREC-002', 'DF-001', 'PS-002', 'Palpasi', 'qweqwq', 'wqweq', 'weqweq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama`, `username`, `password`, `level_user`) VALUES
(1, 'ROMI', 'admin', 'admin', 'admin'),
(2, 'Widiana Dwi', 'pendaftaran', '12345', 'pendaftaran'),
(5, 'Mutia Bella S.Ked', 'pemeriksaan', '12345', 'pemeriksaan'),
(6, 'Dian Ratna', 'pembayaran', '12345', 'pembayaran'),
(7, 'pimpinan', 'pimpinan', '12345', 'pimpinan'),
(8, 'dian ratna', 'gigi', '12345', 'pemeriksaangigi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD KEY `no_pembayaran` (`no_pembayaran`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`id_retur`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `t_daftar`
--
ALTER TABLE `t_daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `t_dokter`
--
ALTER TABLE `t_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `t_obat`
--
ALTER TABLE `t_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `t_pasien`
--
ALTER TABLE `t_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD PRIMARY KEY (`no_pembayaran`),
  ADD KEY `id_daftar` (`id_daftar`);

--
-- Indexes for table `t_rekam`
--
ALTER TABLE `t_rekam`
  ADD PRIMARY KEY (`id_rekam`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD CONSTRAINT `detail_pembayaran_ibfk_1` FOREIGN KEY (`no_pembayaran`) REFERENCES `t_pembayaran` (`no_pembayaran`),
  ADD CONSTRAINT `detail_pembayaran_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `t_obat` (`id_obat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

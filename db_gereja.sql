-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 02:38 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gereja`
--

-- --------------------------------------------------------

--
-- Table structure for table `baptisan`
--

CREATE TABLE `baptisan` (
  `bab_id` int(11) NOT NULL,
  `bab_nama` varchar(50) NOT NULL,
  `bab_tgl` date NOT NULL,
  `bab_nos` varchar(100) NOT NULL,
  `bab_pdt` varchar(50) NOT NULL,
  `bab_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baptisan`
--

INSERT INTO `baptisan` (`bab_id`, `bab_nama`, `bab_tgl`, `bab_nos`, `bab_pdt`, `bab_file`) VALUES
(9, 'Melianus Kambu', '2017-10-29', 'D-1.050/GBAI/MART/B/2017', 'pendeta', 'baptisan1602328379.pdf'),
(11, 'Ester Yeni Kambu', '2016-04-17', 'D-1.043/GBAI/MART/B/2016', '', 'baptisan1602328524.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `ibadah`
--

CREATE TABLE `ibadah` (
  `ibd_id` int(11) NOT NULL,
  `ibd_tgl` date NOT NULL,
  `ibd_jam` time NOT NULL,
  `ibd_firman` varchar(50) NOT NULL,
  `ibd_pujian` varchar(50) NOT NULL,
  `ibd_kategori` varchar(50) NOT NULL,
  `ibd_tempat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibadah`
--

INSERT INTO `ibadah` (`ibd_id`, `ibd_tgl`, `ibd_jam`, `ibd_firman`, `ibd_pujian`, `ibd_kategori`, `ibd_tempat`) VALUES
(2, '2020-07-12', '09:00:00', 'Wakil Gembala', 'Sekertaris Jemat', 'Ibadah Minggu', 'Gedung Gereja Baru'),
(3, '2020-07-08', '16:00:00', 'Majelis Nauw', 'Bapak Jitmau', 'Kaum Bapak', 'rumah Bapak Nauw'),
(4, '2020-07-08', '17:00:00', 'Majelis Nauw', 'Bapak Jitmau', 'Kaum Bapak', 'rumah Bapak Rumaropen'),
(5, '2020-07-08', '22:10:00', 'Majelis Nauw', 'Bapak Jitmau', 'Kaum Muda', 'Noel Nauw'),
(6, '2020-08-02', '09:00:00', 'Majelis Nauw', 'Bapak Jitmau', 'Ibadah Minggu', 'Gedung Gereja'),
(10, '2020-08-16', '16:00:00', 'Kaka Marten Jitmau', 'Kaka Mega Nussy', 'Sekolah Minggu', 'AdeLi Kayai'),
(11, '2020-08-17', '19:00:00', 'advsdvacvsa', 'svsdvsfvsdvs', 'Sekolah Minggu', 'adfsdfsd'),
(15, '2020-11-03', '10:56:00', 'kdfmkdfmk', 'ksdfkdfk', 'Kaum Ibu', 'jsdfjsd');

-- --------------------------------------------------------

--
-- Table structure for table `jemaat`
--

CREATE TABLE `jemaat` (
  `jmt_id` int(11) NOT NULL,
  `jmt_nama` varchar(50) NOT NULL,
  `jmt_tgl_lhr` date NOT NULL,
  `jmt_jk` varchar(25) NOT NULL,
  `jmt_alt` varchar(255) NOT NULL,
  `jmt_kat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jemaat`
--

INSERT INTO `jemaat` (`jmt_id`, `jmt_nama`, `jmt_tgl_lhr`, `jmt_jk`, `jmt_alt`, `jmt_kat`) VALUES
(1, 'imanuel nauw', '1997-03-11', 'pria', 'pasar ikan sanggeng', 'kaum muda'),
(2, 'penina nauw', '2002-02-25', 'wanita', 'pasar ikan sanggeng', 'kaum muda'),
(3, 'wellen nauw', '1945-06-18', 'pria', 'pasar ikan sanggen', 'kaum wanita'),
(4, 'feibalina waromi', '1954-12-18', 'wanita', 'pasar ikan sanggeng', 'kaum pria');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `kas_id` int(11) NOT NULL,
  `kas_jenis` varchar(25) NOT NULL,
  `kas_masuk` int(11) NOT NULL,
  `kas_keluar` int(11) NOT NULL,
  `kas_tanggal` date NOT NULL,
  `kas_keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`kas_id`, `kas_jenis`, `kas_masuk`, `kas_keluar`, `kas_tanggal`, `kas_keterangan`) VALUES
(14, 'Persepuluhan', 71744657, 0, '2020-05-31', 'Saldo Awal'),
(15, 'Persepuluhan', 0, 6000000, '2020-06-01', 'operasional gembala sidang'),
(16, 'Persepuluhan', 0, 175000, '2020-06-01', 'pensiun gembala sidang'),
(17, 'Persepuluhan', 0, 500000, '2020-06-01', 'TABPERUM'),
(18, 'Persembahan', 0, 1500000, '2020-06-01', 'Honor PAUD'),
(19, 'Pengijilan', 104000, 0, '2020-06-07', 'Ibadah di Gereja'),
(20, 'Peninjilan', 225000, 0, '0000-00-00', 'Ibadah di Gereja'),
(21, 'Pengijilan', 130000, 0, '2020-06-21', 'Ibadah di Gereja'),
(22, 'Peninjilan', 132000, 0, '2020-06-28', 'Ibadah di Gereja');

-- --------------------------------------------------------

--
-- Table structure for table `panak`
--

CREATE TABLE `panak` (
  `panak_id` int(11) NOT NULL,
  `panak_nos` varchar(100) NOT NULL,
  `panak_tgl` date NOT NULL,
  `panak_nama` varchar(50) NOT NULL,
  `panak_mm` varchar(50) NOT NULL,
  `panak_bp` varchar(50) NOT NULL,
  `panak_pdt` varchar(50) NOT NULL,
  `panak_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panak`
--

INSERT INTO `panak` (`panak_id`, `panak_nos`, `panak_tgl`, `panak_nama`, `panak_mm`, `panak_bp`, `panak_pdt`, `panak_file`) VALUES
(1, '13/P-A/GBAI-MART/X/2015', '2015-10-25', 'Gersie Istia', 'Sience Litamahuputty', 'Roygers D. Istia', 'Jomes Istia, B.Th.', 'penyerahan1602329908.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pernikahan`
--

CREATE TABLE `pernikahan` (
  `per_id` int(11) NOT NULL,
  `per_nos` varchar(100) NOT NULL,
  `per_namap` varchar(50) NOT NULL,
  `per_namaw` varchar(50) NOT NULL,
  `per_tgl` date NOT NULL,
  `per_lks` varchar(100) NOT NULL,
  `per_pdt` varchar(50) NOT NULL,
  `per_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pernikahan`
--

INSERT INTO `pernikahan` (`per_id`, `per_nos`, `per_namap`, `per_namaw`, `per_tgl`, `per_lks`, `per_pdt`, `per_file`) VALUES
(1, '928309103ksmdubah lagi', 'ksdjoa dakoapkubah lagi', 'akjlak dakubahlagi', '2020-06-14', 'lkasmda ak jadlksa poak dalksdubah lagi', 'ksm apoka k awkubah lagi', 'pernikahan1601621132.pdf'),
(2, '453543tgew', 'ksdnfsdn skjfsdfs', 'ksefkoskfos opskp kf', '2020-08-26', 'lkasmda ak jadlksa poak dalksdubah lagi', 'ksm apoka k awk', 'pernikahan1601621114.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `proker`
--

CREATE TABLE `proker` (
  `pro_id` int(11) NOT NULL,
  `pro_tgl` date NOT NULL,
  `pro_ktgr` varchar(25) NOT NULL,
  `pro_jdl` varchar(50) NOT NULL,
  `pro_isi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proker`
--

INSERT INTO `proker` (`pro_id`, `pro_tgl`, `pro_ktgr`, `pro_jdl`, `pro_isi`) VALUES
(2, '2020-11-01', 'unsur', 'Persekutuan Kaum Pria', ''),
(7, '2020-10-15', 'komisi', 'Penginjilan', '<ol>\r\n <li>Penjejakan, perintisan pos pekabaran injil dan pengorganisasian gereja baru</li>\r\n <li>Pelayanan penginjilan ke dalam Internal Jemaat (Pastoral)</li>\r\n</ol>\r\n'),
(8, '2020-10-15', 'komisi', 'Diakonia', '<ol>\r\n <li>Pelayanan Holistik kepada anggota gereja</li>\r\n</ol>\r\n'),
(9, '2020-10-15', 'komisi', 'Pembangunan', '<ol>\r\n <li>Pembangunan gedung serba guna dan PAUD.</li>\r\n <li>Pemetaan dan pematangan Tanah.</li>\r\n <li>Pengsertifikatan.</li>\r\n <li>Pembangunan gedung Gereja Pos Pekabaran Injil Filadelfia Wanggar.</li>\r\n <li>Pembangunan gedung Gereja Pos Pekabaran Injil Pengharapan Bintuni.</li>\r\n <li>Peningkatan dan pemeliharaan gedung.</li>\r\n <li>Penyediaan rumah Gembala (Pastori).</li>\r\n <li>Penyediaan Sarana dan Prasarana sekolah minggu.</li>\r\n <li>Penyediaan inventaris gereja (Kursi Chitos).</li>\r\n <li>Penyediaan sarana dan prasarana PAUD.</li>\r\n</ol>\r\n'),
(10, '2020-10-15', 'komisi', 'Pendidikan', '<ol>\r\n <li>Pengadaan sarana dan prasarana Indoor dan out door.</li>\r\n <li>Fasilitas Diklat berjenjang Tingkat Nasional (wajib).</li>\r\n <li>mengupayakan akreditasi PAUD.</li>\r\n</ol>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sk`
--

CREATE TABLE `sk` (
  `sk_id` int(11) NOT NULL,
  `sk_jenis` varchar(50) NOT NULL,
  `sk_tgl` date NOT NULL,
  `sk_no` varchar(100) NOT NULL,
  `sk_nama` varchar(50) NOT NULL,
  `sk_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sk`
--

INSERT INTO `sk` (`sk_id`, `sk_jenis`, `sk_tgl`, `sk_no`, `sk_nama`, `sk_file`) VALUES
(2, 'Sutar janji penyerahan anak', '2020-08-26', 'SK/KB/M/26/08/20/002', 'penyerahan', 'SK_1602377270.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `struktur`
--

CREATE TABLE `struktur` (
  `so_id` int(11) NOT NULL,
  `so_nama` varchar(50) NOT NULL,
  `so_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struktur`
--

INSERT INTO `struktur` (`so_id`, `so_nama`, `so_tgl`) VALUES
(102030, 'struktur1602053351.jpeg', '2020-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `s_id` int(11) NOT NULL,
  `s_tgl_mk` date NOT NULL,
  `s_jenis` varchar(10) NOT NULL,
  `s_no` varchar(50) NOT NULL,
  `s_tgl` date NOT NULL,
  `s_at` varchar(50) NOT NULL,
  `s_perihal` varchar(255) NOT NULL,
  `s_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`s_id`, `s_tgl_mk`, `s_jenis`, `s_no`, `s_tgl`, `s_at`, `s_perihal`, `s_file`) VALUES
(2, '2020-09-21', 'Keluar', 'surat/keluar/09/2020', '2020-09-20', 'dinas keagamaan', 'musyawara gereja', 'S_Keluar_1602376700.pdf'),
(4, '2020-09-06', 'Masuk', 'surat/masuk/09/2020', '2020-09-05', 'Gereja Logos Sanggeng', 'Pertemuan Terbuka', 'S_Masuk_1602376674.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_status` char(1) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_kata_sandi` varchar(255) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_nohp` varchar(15) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_status`, `user_name`, `user_kata_sandi`, `user_nama`, `user_nohp`, `user_email`) VALUES
(1, 'a', 'admin', '$2y$10$aSP1eKccJcHMgXadpnEOQOsOu8JObTpO4W.Sotem7tI6twqt8o0L2', 'Yulianus Jitmau', '081213141516', 'admin@marturia.com'),
(4, 's', 'sekertaris', '$2y$10$aEL4rJp0tyuF62Ro6mHsC.oyqM.dBfCdYcZ2mRMOVPr7151twH0uy', 'Sekertaris Gereja', '0123456789', 'sek@gmail.com'),
(5, 'b', 'bendahara', '$2y$10$3ZwnB7G2sVrbYuM0G4mPa.HDlJjxButrtUco9nY3cYQPhDLXIAGQW', 'Bendaraha Gereja', '9876543210', 'ben@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `visimisi`
--

CREATE TABLE `visimisi` (
  `vm_id` int(11) NOT NULL,
  `vm_visi` text NOT NULL,
  `vm_misi` text NOT NULL,
  `vm_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visimisi`
--

INSERT INTO `visimisi` (`vm_id`, `vm_visi`, `vm_misi`, `vm_tgl`) VALUES
(101010, '<p>Terwujudnya jemaat mandiri yang misioner dan diberkati Tuhan serta menjadi berkat bagi sesama dan melayani Tuhan dengan apa yang ada pada diri masing-masing serta melayani sesama dengan kasih kristus, sampai mencapai kesempurnaan kristus dan memperole hidup ang kekal (masuk kerajaan surga).</p>\r\n', '<ol>\r\n  <li>melaksanakan amanat Agung Yesus Kristus (Matius, 28 : 19-20) dan perintah Agung Yesus Kristus (Hukum yang terutama dan utama) (Matius, 22 : 37-39; Yohanes, 13 : 34).</li>\r\n  <li>berpegang teguh dan hidup berdasarkan alkitab yaitu firman Tuhan dan satu-satunya sebagai sumber pedoman hidup.</li>\r\n  <li>Agar secara organisasi setiap anggota jemaat&nbsp;dapat memahami asas dan doktrin&nbsp;Baptis dalam bergereja dan berjemaat.</li>\r\n <li>Agar setiap anggota jemaat dapat melayani dan memuliahkan Tuhan dengan semua potensi yang dimilikinya masing-masing.</li>\r\n <li>Memperteguh hubungan kekeluargaan antara sesama anggota jemaat Allah yang juga sebagai anggota Tubuh Kristus (Keluarga Kristus) dengan saling melayani, mengasihi, memperhatikan dan mempedulikan satu dengan yang lain (1 Timotius, 3 : 15).</li>\r\n  <li>Mencari dan menyelamatkan satu jiwa lagi untuk Yesus Kristus (Lukas, 19 : 10).</li>\r\n <li>Agar setiap anggota jemaat dapat hidup dalam berbagai kelimpahan berkat dan kasih karunia Tuhan dan tidak kehilangan tempat tinggal di tanah air sorgawi melainkan beroleh hidup yang kekal (Yohanes, 6 : 39-40, 47; 14 : 2-3).</li>\r\n  <li>Agar dapat membangun kemitraan pelayanan baik secara interen dedominasi (baptis) dan exteren dedominasi serta lembaga pelayanan kristen lainnya.&nbsp;&nbsp;</li>\r\n</ol>\r\n', '2020-06-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baptisan`
--
ALTER TABLE `baptisan`
  ADD PRIMARY KEY (`bab_id`);

--
-- Indexes for table `ibadah`
--
ALTER TABLE `ibadah`
  ADD PRIMARY KEY (`ibd_id`);

--
-- Indexes for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`jmt_id`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`kas_id`);

--
-- Indexes for table `panak`
--
ALTER TABLE `panak`
  ADD PRIMARY KEY (`panak_id`);

--
-- Indexes for table `pernikahan`
--
ALTER TABLE `pernikahan`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `sk`
--
ALTER TABLE `sk`
  ADD PRIMARY KEY (`sk_id`);

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`so_id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visimisi`
--
ALTER TABLE `visimisi`
  ADD PRIMARY KEY (`vm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baptisan`
--
ALTER TABLE `baptisan`
  MODIFY `bab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ibadah`
--
ALTER TABLE `ibadah`
  MODIFY `ibd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jemaat`
--
ALTER TABLE `jemaat`
  MODIFY `jmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `kas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `panak`
--
ALTER TABLE `panak`
  MODIFY `panak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pernikahan`
--
ALTER TABLE `pernikahan`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proker`
--
ALTER TABLE `proker`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sk`
--
ALTER TABLE `sk`
  MODIFY `sk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `struktur`
--
ALTER TABLE `struktur`
  MODIFY `so_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102031;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visimisi`
--
ALTER TABLE `visimisi`
  MODIFY `vm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101011;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

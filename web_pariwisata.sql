-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 07:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_pesanan`
--

CREATE TABLE `daftar_pesanan` (
  `id_daftar_pesanan` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL,
  `nama_pemesan` varchar(150) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `penginapan` varchar(1) NOT NULL,
  `transportasi` varchar(1) NOT NULL,
  `makanan` varchar(1) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `total_tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_pesanan`
--

INSERT INTO `daftar_pesanan` (`id_daftar_pesanan`, `id_paket_wisata`, `nama_pemesan`, `no_telpon`, `tanggal_pemesanan`, `jumlah_peserta`, `jumlah_hari`, `penginapan`, `transportasi`, `makanan`, `harga_paket`, `total_tagihan`) VALUES
(34, 1, 'Rofi Fitriyani', '082129679868', '2024-12-30', 2, 2, 'N', 'Y', 'Y', 150000, 600000);

-- --------------------------------------------------------

--
-- Table structure for table `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `id_paket_wisata` int(11) NOT NULL,
  `nama_paket` varchar(200) NOT NULL,
  `deskripsi_paket` text NOT NULL,
  `img_paket` varchar(150) NOT NULL,
  `link_video` text NOT NULL,
  `harga_tiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket_wisata`
--

INSERT INTO `paket_wisata` (`id_paket_wisata`, `nama_paket`, `deskripsi_paket`, `img_paket`, `link_video`, `harga_tiket`) VALUES
(1, 'Buper Awilega', 'Buper Awilega adalah destinasi wisata alam menarik yang terletak di Desa Wisata Bantaragung, Kecamatan Sindangwangi, Kabupaten Majalengka. Dengan harga tiket masuk sekitar Rp30.000 per orang, pengunjung dapat menikmati keindahan alam yang memukau. Buper Awilega sangat direkomendasikan sebagai tempat liburan bersama keluarga. Tidak hanya sebagai lokasi berkemah, Buper Awilega juga menawarkan berbagai aktivitas menarik yang dapat disesuaikan dengan kebutuhan dan minat pengunjung.', 'Buper Awilega.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Ls42VayChJk?si=8SWmQC9wk4g4meSE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 30000),
(2, 'Camping Ground Curug Leles', 'Buper Leles merupakan tempat wisata yang berlokasi di Blok Leles, Desa Padaherang, Kecamatan Sindangwangi, Kabupaten Majalengka, tempat wisata ini berjarak sekitar 23 km dari pusat kota dengan waktu tempuh kurang lebih 45 menit. Dengan harga tiket masuk sebesar Rp40.000 per orang, Buper Leles menjadi pilihan favorit untuk berkemah dan belajar di alam terbuka. Tidak hanya itu, tempat ini juga menawarkan atraksi menarik seperti air terjun (curug) dan kolam pemandian yang ramah untuk semua kalangan usia, sehingga cocok untuk dinikmati bersama keluarga atau teman.', 'Camping Ground Curug Leles.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/C7KzRATIcAo?si=izFUifAe4OL6ZYkK\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 40000),
(3, 'Talaga Pancar', 'Talaga Pancar merupakan sebuah area bumi perkemahan (Buper) yang dikelilingi oleh hutan pinus, menciptakan suasana nyaman untuk merelaksasi diri dari penatnya hiruk-pikuk perkotaan. Dengan harga tiket masuk sebesar Rp25.000 per orang, wisatawan dapat menikmati keindahan alam yang menenangkan. Lokasi ini dapat dicapai dengan perjalanan sekitar 18 km atau sekitar 45 menit. Selain untuk berkemah, Talaga Pancar juga menawarkan berbagai fasilitas, seperti area playground untuk anak-anak, spot selfie yang menarik, toilet, mushola, dan beragam warung jajanan untuk memenuhi kebutuhan makan dan minum pengunjung.', 'Talaga.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/l8fSrEFlvBM?si=jMnunBTg4mjDuoBT\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 25000),
(4, 'Ciboer Pas & Villa Ciboer Pas', 'Ciboer Pass merupakan salah satu destinasi wisata hits di Majalengka, Jawa Barat. Beralamat di Jl. Ciboer, Desa Bantaragung, Kecamatan Sindangwangi, Kabupaten Majalengka, lokasi wisata ini berada di perbatasan dengan Kabupaten Cirebon. Harga tiket masuk tempat ini berkisar Rp500.000 per orang, meskipun tergolong mahal tetapi pengunjung dapat menikmati pengalaman eksklusif terasering seperti di Ubud, Bali. Selain menikmati pemandangan, Ciboer Pass juga memiliki coffee shop yang instagramable, penginapan, dan villa keren yang sering menjadi pilihan pengunjung dari luar kota untuk menginap.', 'Ciboer Pas & Villa Ciboer Pas.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/IeewZqhqU9c?si=D2FqZYxuPNdilu2i\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_pesanan`
--
ALTER TABLE `daftar_pesanan`
  ADD PRIMARY KEY (`id_daftar_pesanan`);

--
-- Indexes for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD PRIMARY KEY (`id_paket_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_pesanan`
--
ALTER TABLE `daftar_pesanan`
  MODIFY `id_daftar_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  MODIFY `id_paket_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

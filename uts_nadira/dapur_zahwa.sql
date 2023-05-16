-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2023 pada 20.02
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dapur_zahwa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama`) VALUES
(291274, 'Minuman'),
(528089, 'Makanan'),
(747392, 'Cake &amp; Bakery');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pemesan` varchar(45) NOT NULL,
  `alamat_pemesan` varchar(45) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal`, `nama_pemesan`, `alamat_pemesan`, `no_hp`, `email`, `jumlah_pesanan`, `deskripsi`, `produk_id`) VALUES
(270470, '2023-05-15', 'Arbi', 'Apt ITC Roxy Lt.6', '085627252728', 'arbiini@gmail.com', 3, 'tidak usah pedas', 344132),
(578179, '2023-05-15', 'Rio', 'Kali Anyar 5', '08658272522', 'riorio98@gmail.com', 4, 'jangan Terlalu Manis', 558101),
(600270, '2023-05-15', 'Kania', 'Kp.Duri Barat', '08972526282', 'kania123@gmail.com', 2, 'Mix Rasa', 170599);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga_jual` double NOT NULL,
  `harga_beli` double NOT NULL,
  `stok` int(11) NOT NULL,
  `min_stok` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori_produk_id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `harga_jual`, `harga_beli`, `stok`, `min_stok`, `deskripsi`, `kategori_produk_id`, `gambar`) VALUES
(74634, '15662', 'Kuetiaw Goreng', 15000, 15000, 87, 85, 'Kuetiaw Goreng Dengn Topping Melimpah', 528089, '6462576d48534.jpg'),
(118873, '15655', 'Es Alpukat', 10000, 10000, 54, 50, 'Es Alpukat Kocok Kental Asli Alpukat', 291274, '64625b7954a9e.jpg'),
(137641, '15675', 'Bento Cake', 30000, 35000, 30, 25, 'Mini Cake Korean Mini Enak Dapat Request Tema Kue Sesuai Keinginan Mu', 747392, '64625575bdc81.jpg'),
(156404, '15676', 'Roti Kopi', 10000, 12000, 40, 35, 'Roti Kopi Dengan Topping Cream Kopi Bikin Waktu Ngemil Kamu Tambah Seru', 747392, '64625584e0629.jpg'),
(170599, '15673', 'Deseert Box', 25000, 25000, 50, 40, 'Desseret Box Dengan Paduan Coklat, Vanilla Cream Dan Segarnya Buah', 747392, '646253fd540a6.jpg'),
(255080, '15661', 'Seblak', 15000, 15000, 1000, 900, 'Seblak Mantap Dengan Berbagai Macam Topping', 528089, '64625722a427c.jpg'),
(291648, '15671', 'Donut ', 10000, 12000, 106, 97, 'Donat Lembut Dengan Topping Icing Sugar Yang Manis ', 747392, '64624d1788a56.png'),
(344132, '15666', 'Nasi Goreng SeaFood', 30000, 30000, 220, 211, 'Nasi Goreng SeaFood Dengan Isian Melimpah Mantap', 528089, '64625b0f50340.jpg'),
(360192, '15656', 'Es Selendang Mayang', 15000, 15000, 54, 40, 'Es Selendang Mayang Khas Segar', 291274, '64625c5d472b1.jpg'),
(486553, '15665', 'Olahan Seafood Bakar', 50000, 5000, 499, 400, 'Olahan Seafood Ikan Laut Untuk Di Bakar Bumbu Barbeque ', 528089, '6462587b134e0.jpg'),
(492438, '15652', 'Es JEruk', 10000, 10000, 118, 116, 'Segarnya Es JEruk Dibuat Dengan Jeruk Asli', 291274, '6462590bab78d.jpeg'),
(558101, '15651', 'Es Coklat', 10000, 10000, 112, 111, 'Es Coklat Dingin Dengan Topping Double Choco Nikmat', 291274, '646258cdd596c.jpg'),
(630627, '15654', 'Es Campur Mantap', 10000, 10000, 129, 122, 'Es Campur Segar Dengan Macam Isian Buah', 291274, '64625ab38deb6.png'),
(718582, '15663', 'Bihun Goreng', 15000, 15000, 65, 60, 'Bihun Goreng Dengan Toping Melimpah Mantap', 528089, '646257b39de09.jpg'),
(779506, '15674', 'Brownise Sekat', 35000, 40000, 25, 30, 'Sensani Brownise Coklat Yang Crispy Dan DarkChoco Yang Mendominasi  Dengan Ukuran Potong Makin Mudah Untuk MEnyantapnya', 747392, '6462532963e1c.jpeg'),
(803079, '15672', 'Bomboloni Isi', 10000, 12000, 87, 84, 'Bomboloni Lembut Dengan Isi Slay Yang Melimpah ', 747392, '64624f23dd6f1.jpeg'),
(869459, '15653', 'Es Teh', 10000, 10000, 252, 223, 'Es teh Segar Dengan Teh Berkualitas', 291274, '6462593c561ef.jpg'),
(962257, '15664', 'Aneka Topping', 5000, 5000, 120, 100, 'Aneka Topping Olahan Ikan Segar Nikmat (Bisa Untuk Topping Seblak, Kuetiaw, Dan Bihun)', 528089, '6462582912044.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_produk_id` (`kategori_produk_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_produk_id`) REFERENCES `kategori_produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2024 pada 14.07
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visit_lebak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Bayu Ardi S', 'bayu', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `atm`
--

CREATE TABLE `atm` (
  `id_atm` int(11) NOT NULL,
  `nama_atm` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `id_kategori` varchar(25) DEFAULT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `atm`
--

INSERT INTO `atm` (`id_atm`, `nama_atm`, `alamat`, `gambar`, `deskripsi`, `latitude`, `longitude`, `id_kategori`, `id_kecamatan`) VALUES
(2, 'atm cilamata ', 'cilamaya', '2018-11-051.jpg', '', '   -6.800677', '106.052383', '53', 1),
(3, 'ATM Tangerang', 'Bintaro', 'Black-Wallpaper-HD-Laptop.jpg', '<p>dsada</p>', '-6.800677', '106.052383', '53', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `idBerita` bigint(20) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(300) NOT NULL,
  `inertedBy` varchar(300) NOT NULL,
  `insertedDate` date NOT NULL,
  `idkategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`idBerita`, `judul`, `deskripsi`, `foto`, `inertedBy`, `insertedDate`, `idkategori`) VALUES
(22, 'kalangan generasi muda kabupaten lebak gemari produk batik lokal', '<p>Lorem \r\nipsum\r\n dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 'dua.png', 'Bayu Ardi S', '2022-08-19', ''),
(25, 'Tarif Angkutan Umum Di Kabupaten Lebak Naik Karena Dampak Kenaikan Harga BBM', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'tiga.png', 'Bayu Ardi S', '2023-02-19', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_gambar`
--

CREATE TABLE `detail_gambar` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_gambar`
--

INSERT INTO `detail_gambar` (`id`, `jenis`, `id_jenis`, `gambar`) VALUES
(1, 'wisata', 944, 'download1.jpeg'),
(2, 'wisata', 944, '8f75fd05ca42fc5b2328d5de35a5954c.jpg'),
(3, 'wisata', 944, '5fec5602f116e.jpg'),
(4, 'wisata', 945, 'category1688096280_(5).png'),
(5, 'kuliner', 22, 'category1688096280_(4).png'),
(6, 'penginapan', 33, 'category1688096280_(1).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Wisata'),
(2, 'Kuliner'),
(3, 'Penginapan'),
(4, 'SPBU'),
(5, 'ATM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` bigint(20) NOT NULL,
  `namakategori` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`, `jenis`, `icon`) VALUES
(1, 'Wisata Curug', '1', 'waterfall_(1).png'),
(2, 'Wisata Pantai', '1', 'lah_pantai.png'),
(3, 'Wisata Air Panas', '1', 'hot-spring_(2).png'),
(4, 'Wisata Goa', '1', 'goa_goaan.png'),
(5, 'Wisata Pegunungan', '1', 'mountain_(2).png'),
(41, 'Hotel', '3', 'dih_hotel.png'),
(46, 'Resort', '3', 'lodge.png'),
(47, 'Villa', '3', 'villa.png'),
(48, 'Hostel', '3', 'hostel.png'),
(49, 'Homestay', '3', 'homestay.png'),
(50, 'Restoran', '2', 'cutlery_(1).png'),
(51, 'Cafe', '2', 'coffee1.png'),
(52, 'SPBU', '4', 'spbu.png'),
(53, 'ATM', '5', 'atm.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(30) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `geojson` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `warna`, `geojson`) VALUES
(2, 'Bayah', '#F7F7F7', 'Bayah.geojson'),
(3, 'Bojongmanik', '#f7f7f7', 'Bojongmanik.geojson'),
(4, 'Cibadak', '#F7F7F7', 'Cibadak.geojson'),
(5, 'Cibeber', '#F7F7F7', 'Cibeber.geojson'),
(6, 'Cigemblong', '#F7F7F7', 'Cigemblong.geojson'),
(7, 'Cihara', '#F7F7F7', 'Cihara.geojson'),
(8, 'Cijaku', '#F7F7F7', 'Cijaku.geojson'),
(9, 'Cikulur', '#F7F7F7', 'Cikulur.geojson'),
(10, 'Cileles', '#F7F7F7', 'Cileles.geojson'),
(11, 'Cilograng', '#F7F7F7', 'Cilograng.geojson'),
(12, 'Cimarga', '#F7F7F7', 'Cimarga.geojson'),
(13, 'Cipanas', '#F7F7F7', 'Cipanas.geojson'),
(14, 'Cirinten', '#F7F7F7', 'Cirinten.geojson'),
(15, 'Curugbitung', '#F7F7F7', 'Curugbitung.geojson'),
(16, 'Gunungkencana', '#F7F7F7', 'Gunungkencana.geojson'),
(17, 'Kalang Anyar', '#F7F7F7', 'Kalanganyar.geojson'),
(18, 'Lebak Gedong', '#F7F7F7', 'Lebakgedong.geojson'),
(19, 'Leuwidamar', '#F7F7F7', 'Leuwidamar.geojson'),
(20, 'Maja', '#F7F7F7', 'Maja.geojson'),
(21, 'Malingping', '#F7F7F7', 'Malingping.geojson'),
(22, 'Muncang', '#F7F7F7', 'Muncang.geojson'),
(23, 'Panggarangan', '#F7F7F7', 'Panggarangan.geojson'),
(24, 'Rangkasbitung', '#F7F7F7', 'Rangkasbitung.geojson'),
(25, 'Sajira', '#F7F7F7', 'Sajira.geojson'),
(26, 'Sobang', '#F7F7F7', 'Sobang.geojson'),
(27, 'Wanasalam', '#F7F7F7', 'Wanasalam.geojson'),
(28, 'Warunggunung', '#F7F7F7', 'Warunggunung.geojson'),
(29, 'Banjarsari', '#F7F7F7', 'Banjarsari.geojson');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `id_komentar_wisata` int(11) NOT NULL,
  `id_komentar_penginapan` int(11) NOT NULL,
  `id_komentar_kuliner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `id_user`, `komentar`, `id_komentar_wisata`, `id_komentar_penginapan`, `id_komentar_kuliner`) VALUES
(3, 1, 'Bagus', 944, 0, 0),
(4, 1, 'Mat minus', 944, 0, 0),
(5, 1, 'bagus', 0, 0, 30),
(6, 1, 'Login dulu kalau mau komen', 0, 41, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuliner`
--

CREATE TABLE `kuliner` (
  `id_kuliner` int(11) NOT NULL,
  `nama_kuliner` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `idkategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kuliner`
--

INSERT INTO `kuliner` (`id_kuliner`, `nama_kuliner`, `alamat`, `gambar`, `deskripsi`, `latitude`, `longitude`, `idkategori`) VALUES
(22, ' Rm Bahagia Resto Rangkasbitung ', ' Jl. Multatuli No.95, Muara Ciujung Bar., Kec. Rangkasbitung, Kabupaten Lebak, Banten 42312 ', 'rm_bahagia.png', '<p>RM. Bahagia Resto Rangkas bitung  yang berlokasi di Jl. Multatuli No.95, Muara Ciujung Bar., Kec. Rangkasbitung, Kabupaten Lebak, Banten 42312</p><p>memiliki banyak pilihan menu seperti udang saus padang, sapi lada hitam, ayam mentega dan berbagai makanan lainnya.</p><p>harga makanan dan minuman di RM Bahagia Resto Rangkas bitung berkisar Rp. 5.000 sampai Rp. 50.000</p><p>fasilitas yang tersedia toilet bersih, pelayanan ramah, parkir luas dan gratis</p>', ' -6.3533261 ', ' 106.2450937 ', '50'),
(26, ' Rm Ramayana Rangkasbitung ', ' Jl. Multatuli No.71, Muara Ciujung Bar., Kec. Rangkasbitung, Kabupaten Lebak, Banten 42312 ', 'rm_ramayana.png', '<p>RM Ramayana Rangkasbitung  yang berlokasi di Jl. Multatuli No.71, Muara Ciujung Bar., Kec. Rangkasbitung, Kabupaten Lebak, Banten 42312</p><p>memiliki banyak pilihan menu seperti nasi rames daging, sop buntut, sate kambing dan berbagai makanan lainnya.</p><p>harga makanan dan minuman di RM Ramayana Rangkasbitung berkisar Rp. 5.000 sampai Rp. 45.000</p><p>fasilitas yang tersedia toilet bersih, pelayanan ramah, parkir luas dan gratis</p>', ' -6.3523835 ', ' 106.2452084 ', '50'),
(27, ' Rm Parahiyangan ', ' Jl. Sunan Kalijaga No.209, Muara Ciujung Tim., Kec. Rangkasbitung, Kabupaten Lebak, Banten 42314 ', 'rm_parahyangan.png', '<p>RM. Parahiyangan  yang berlokasi di Jl. Sunan Kalijaga No.209, Muara Ciujung Tim., Kec. Rangkasbitung, Kabupaten Lebak, Banten 42314</p><p>memiliki banyak pilihan menu seperti sop daging sapi, soto babat, ayam bakar dan berbagai makanan lainnya.</p><p>harga makanan dan minuman di RM Parahiyangan berkisar Rp. 5.000 sampai Rp. 50.000</p><p>fasilitas yang tersedia toilet bersih, pelayanan ramah, parkir luas dan gratis</p>', ' -6.3523081 ', ' 106.2524852 ', '50'),
(28, ' PS Restaurant ', ' Jl. Soekarno-Hatta, Cijoro Pasir, Kec. Rangkasbitung, Kabupaten Lebak, Banten 42357 ', 'ps_restaurant_.png', '<p>PS Restaurant  yang berlokasi di Jl. Soekarno-Hatta, Cijoro Pasir, Kec. Rangkasbitung, Kabupaten Lebak, Banten 42357</p><p>memiliki banyak pilihan menu seperti steak sirloin, cumi saus tiram, chicken stik crispy dan berbagai makanan lainnya.</p><p>harga makanan dan minuman di PS Restaurant berkisar Rp. 15.000 sampai Rp. 65.000</p><p>fasilitas yang tersedia toilet bersih, pelayanan ramah, parkir luas dan gratis</p>', ' -6.344642 ', ' 106.2510303 ', '50'),
(29, ' Rm Pindang Sehat Rangkasbitung ', ' Jl. Raya Rangkasbitung Pandeglang No.10, Cibuah, Kec. Warunggunung, Kabupaten Lebak, Banten 42352 ', 'rm_pindang.png', '<p>RM Pindang Sehat Rangkasbitung yang berlokasi di Jl. Raya Rangkasbitung Pandeglang No.10, Cibuah, Kec. Warunggunung, Kabupaten Lebak, Banten 42352</p><p>memiliki banyak pilihan menu seperti pepes peda, cumi saus padang, ayam bakar dan berbagai makanan lainnya.</p><p>harga makanan dan minuman di RM Pindang Sehat Rangkasbitung berkisar Rp. 35.000 sampai Rp. 650.000</p><p>fasilitas yang tersedia toilet bersih, pelayanan ramah, parkir luas dan gratis</p>', ' -6.3377882 ', ' 106.1614402 ', '50'),
(30, ' Rm Aqaba ', ' Jl. Raya Rangkasbitung Pandeglang Km 4, No.1, RT.01/Rw01, Mekar Agung, Cibadak, Lebak Regency, Banten 42318 ', 'rm_aqaba.png', '<p>RM Aqaba yang berlokasi di Jl. Raya Rangkasbitung Pandeglang Km 4, No.1, RT.01/Rw01, Mekar Agung, Cibadak, Lebak Regency, Banten 42318</p><p>memiliki banyak pilihan menu seperti udang goreng manis, nasi goreng gila, cah kangkung  dan berbagai makanan lainnya.</p><p>harga makanan dan minuman di RM Aqaba berkisar Rp. 5.000 sampai Rp. 30.000</p><p>fasilitas yang tersedia toilet bersih, pelayanan ramah, parkir luas dan gratis</p>', ' -6.3462199 ', ' 106.2186866 ', '50'),
(31, ' RB One Cafe & Karaoke ', ' Jl. Kimaklum, Muara Ciujung Bar., Kec. Rangkasbitung, Kabupaten Lebak, Banten 42312 ', 'rb_one_cafe.png', '<p>RB One Cafe & Karaoke  yang berlokasi di Jl. Kimaklum, Muara Ciujung Bar., Kec. Rangkasbitung, Kabupaten Lebak, Banten 42312</p><p>memiliki banyak pilihan menu seperti nasi goreng tanjung layar, nasi timbel sawarna, sop iga dan berbagai makanan lainnya.</p><p>harga makanan dan minuman di RB One Cafe & Karaoke berkisar Rp. 20.000 sampai Rp. 90.000</p><p>fasilitas yang tersedia toilet bersih, pelayanan ramah, parkir luas dan gratis</p>', ' -6.3523447 ', ' 106.2463026 ', '51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `like_user`
--

CREATE TABLE `like_user` (
  `id` int(11) NOT NULL,
  `jumlah_like` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_like_wisata` int(11) NOT NULL,
  `id_like_penginapan` int(11) NOT NULL,
  `id_like_kuliner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `like_user`
--

INSERT INTO `like_user` (`id`, `jumlah_like`, `id_user`, `id_like_wisata`, `id_like_penginapan`, `id_like_kuliner`) VALUES
(4, 1, 2, 944, 0, 0),
(6, 1, 1, 0, 0, 30),
(7, 1, 1, 0, 41, 0),
(8, 1, 5, 0, 0, 31),
(9, 1, 5, 0, 46, 0),
(10, 1, 1, 944, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penginapan`
--

CREATE TABLE `penginapan` (
  `id_penginapan` int(11) NOT NULL,
  `nama_penginapan` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `idkategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penginapan`
--

INSERT INTO `penginapan` (`id_penginapan`, `nama_penginapan`, `alamat`, `gambar`, `deskripsi`, `latitude`, `longitude`, `idkategori`) VALUES
(33, ' Horizon Rahaya Resort ', ' Jl. Raya Leuwidamar, Aweh, Kec. Rangkasbitung, Kabupaten Lebak, Banten 42312 ', 'horizon_rahaya_resort.png', '<p>Horizon Rahaya Resort adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di Jl. Raya Leuwidamar, Aweh, Kec. Rangkasbitung, Kabupaten Lebak, Banten 42312.</p><p>Horizon Rahaya Resort memiliki banyak fasilitas seperti restoran, parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Horizon Rahaya Resort memiliki</span><span style=\"background-color: transparent;\"> 3 tipe kamar yaitu superior, deluxe, family dan dibandrol dengan </span>harga permalam Rp. 750.000 sampai Rp. 2.000.000</p>', ' -6.3717169 ', ' 106.243208 ', 46),
(34, ' Villa Mutiara Sawarna ', ' banten, Jawa Barat, Jl. Sangko, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393 ', 'villa_mutiara_sawarna.png', '<p>Villa Mutiara Sawarna adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di banten, Jawa Barat, Jl. Sangko, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393</p><p>Villa Mutiara Sawarna memiliki banyak fasilitas seperti restoran, parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Villa Mutiara Sawarna</span><span style=\"background-color: transparent;\"> memiliki</span><span style=\"background-color: transparent;\"> 2 tipe kamar yaitu deluxe, family dan dibandrol dengan </span>harga permalam Rp. 200.000 sampai Rp. 500.000</p>', ' -6.9781262 ', ' 106.3039466 ', 47),
(35, ' Sawarna Little Hula-Hula ', ' Jl. Raya Sawarna Bayah Cihaseum, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393 ', 'sawarna_little_hula-hula.png', '<p>Sawarna Little Hula-Hula adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di Jl. Raya Sawarna Bayah Cihaseum, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393</p><p>Sawarna Little Hula-Hula memiliki banyak fasilitas seperti restoran, parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Sawarna Little Hula-Hula</span><span style=\"background-color: transparent;\"> memiliki</span><span style=\"background-color: transparent;\"> 4 tipe kamar yaitu rimba, laguna, zamrud, paradiso dan dibandrol dengan </span>harga permalam Rp. 700.000 sampai Rp. 1.200.000</p>', ' -6.9756989 ', ' 106.2978124 ', 48),
(36, ' Panorama Beach Resort ', ' 2856+H89, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393 ', 'panorama_beach_resort.png', '<p>Panorama Beach Resort adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di 2856+H89, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393</p><p>Panorama Beach Resort memiliki banyak fasilitas seperti restoran, parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Panorama Beach Resort</span><span style=\"background-color: transparent;\"> memiliki</span><span style=\"background-color: transparent;\"> 4 tipe kamar yaitu pondok bambu, mini villa, rumah panggung, rumah kayu dan dibandrol dengan </span>harga permalam Rp. 500.000 sampai Rp. 700.000</p>', ' -6.991093 ', ' 106.3086801 ', 47),
(37, ' Hotel GBS Malingping ', ' Jalan Raya Pasar Malingping No.58, Polotot, Malingping Sel., Kec. Malingping, Kabupaten Lebak, Banten 42391 ', 'hotel_gbs_malingping.png', '<p>Hotel GBS Malingping adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di Jalan Raya Pasar Malingping No.58, Polotot, Malingping Sel., Kec. Malingping, Kabupaten Lebak, Banten 42391</p><p>Hotel GBS Malingping memiliki banyak fasilitas seperti restoran, parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Hotel GBS Malingping</span><span style=\"background-color: transparent;\"> memiliki 2</span><span style=\"background-color: transparent;\"> tipe kamar yaitu standart, executive dan dibandrol dengan </span>harga permalam Rp. 150.000 sampai Rp. 300.000</p>', ' -6.7862681 ', ' 106.0151524 ', 41),
(38, '  Sawarna Resort  ', '  Kampung Cikaung RT. 002 RW. 009, Desa Sawarna, Kecamatan Bayah, Lebak, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393  ', 'sawarna_resort.png', '<p>Sawarna Resort adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di Kampung Cikaung RT. 002 RW. 009, Desa Sawarna, Kecamatan Bayah, Lebak, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393</p><p>Sawarna Resort memiliki banyak fasilitas seperti restoran, parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Sawarna Resort</span><span style=\"background-color: transparent;\"> memiliki</span><span style=\"background-color: transparent;\"> 3 tipe kamar yaitu deluxe, barak, family dan dibandrol dengan </span>harga permalam Rp. 750.000 sampai Rp. 1.000.000</p>', '  -6.9836763  ', '  106.3074054  ', 47),
(39, ' Sawarna Bim-Bim Seaview Homestay ', ' 2856+R6Q, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393 ', 'Sawarna_bimbim_seaview.png', '<p>Sawarna Bim-Bim Seaview Homestay adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di 2856+R6Q, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393</p><p>Sawarna Bim-Bim Seaview Homestay memiliki banyak fasilitas seperti parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Sawarna Bim-Bim Seaview Homestay</span><span style=\"background-color: transparent;\"> memiliki</span><span style=\"background-color: transparent;\"> 2 tipe kamar yaitu deluxe, family dan dibandrol dengan </span>harga permalam Rp. 250.000 sampai Rp. 500.000</p>', ' -6.9904156 ', ' 106.3084165 ', 49),
(40, ' Penginapan Srikandi Sawarna Homestay ', ' Kampung Cikaung, Desa, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393 ', 'srikandi_sawarna.png', '<p>Penginapan Srikandi Sawarna Homestay adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di Kampung Cikaung, Desa, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393</p><p>Penginapan Srikandi Sawarna Homestay memiliki banyak fasilitas seperti parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Penginapan Srikandi Sawarna Homestay</span><span style=\"background-color: transparent;\"> memiliki</span><span style=\"background-color: transparent;\"> 2 tipe kamar yaitu srikandi mini, srikandi standart dan dibandrol dengan </span>harga permalam Rp. 350.000 sampai Rp. 500.000</p>', ' -6.9843916 ', ' 106.3081523 ', 49),
(41, ' Bahari Hotel Malingping ', ' Jl. Raya Saketi - Malingping No.46, Malingping Utara, Kec. Malingping, Kabupaten Lebak, Banten 42391 ', 'bahari_hotel.png', '<p>Bahari Hotel Malingping adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di Jl. Raya Saketi - Malingping No.46, Malingping Utara, Kec. Malingping, Kabupaten Lebak, Banten 42391</p><p>Bahari Hotel Malingping memiliki banyak fasilitas seperti restoran, parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Bahari Hotel Malingping</span><span style=\"background-color: transparent;\"> memiliki</span><span style=\"background-color: transparent;\"> 2 tipe kamar yaitu deluxe,  family dan dibandrol dengan </span>harga permalam Rp. 250.000 sampai Rp. 600.000</p>', ' -6.7774864 ', ' 106.01231 ', 41),
(42, ' Devita Beach Sawarna ', ' 28C3+4CC, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393 ', 'devita_beach.png', '<p>Devita Beach Sawarna adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di 28C3+4CC, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393</p><p>Devita Beach Sawarna memiliki banyak fasilitas seperti restoran, parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Devita Beach Sawarna</span><span style=\"background-color: transparent;\"> memiliki</span><span style=\"background-color: transparent;\"> 2 tipe kamar yaitu deluxe,  family dan dibandrol dengan </span>harga permalam Rp. 250.000 sampai Rp. 600.000</p>', ' -6.9796924 ', ' 106.3013254 ', 46),
(43, ' Java Beach Sawarna ', ' 2895+3XR, Kp. Cikaung, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393 ', 'Java_beach.png', '<p>Java Beach Sawarna adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di 28C3+4CC, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393</p><p>Java Beach Sawarna memiliki banyak fasilitas seperti restoran, parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Java Beach Sawarna</span><span style=\"background-color: transparent;\"> memiliki</span><span style=\"background-color: transparent;\"> 2 tipe kamar yaitu standart, family dan dibandrol dengan </span>harga permalam Rp. 200.000 sampai Rp. 500.000</p>', ' -6.9822662 ', ' 106.3077028 ', 48),
(44, ' Penginapan Padi-Padi Sawarna ', ' 2895+3J7, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393 ', 'penginapan_padi.png', '<p>Penginapan Padi-Padi Sawarna adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di 2895+3J7, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393</p><p>Penginapan Padi-Padi Sawarna memiliki banyak fasilitas seperti restoran, parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Penginapan Padi-Padi Sawarna</span><span style=\"background-color: transparent;\"> memiliki</span><span style=\"background-color: transparent;\"> 2 tipe kamar yaitu standart, family dan dibandrol dengan </span>harga permalam Rp. 200.000 sampai Rp. 500.000</p>', ' -6.9823315 ', ' 106.3068709 ', 49),
(45, ' Pondok Ciantir Saawrna ', ' 2876+PF5, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393 ', 'pondok_ciantir.png', '<p>Pondok Ciantir Saawrna adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di 2876+PF5, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393</p><p>Pondok Ciantir Saawrna memiliki banyak fasilitas seperti parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Pondok Ciantir Saawrna</span><span style=\"background-color: transparent;\"> memiliki</span><span style=\"background-color: transparent;\"> 3 tipe kamar yaitu superior, deluxe, family dan dibandrol dengan </span>harga permalam Rp. 750.000 sampai Rp. 2.000.000</p>', ' -6.9857265 ', ' 106.3090544 ', 49),
(46, '  Sawarna Paradiso  ', '  Jalan Raya Sawarna, Bayah, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393  ', 'Desain_tanpa_judul_(5)2.png', '<p>Sawarna Paradiso adalah salah satu penginapan yang dibangun di tanah yang masih asri dan dikelilingi pemandangan yang indah. berlokasi di Jalan Raya Sawarna, Bayah, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393</p><p>Sawarna Paradiso memiliki banyak fasilitas seperti parkir yang luas, resepsionis 24 jam, pelayanan yang ramah dan wifi</p><p><span style=\"background-color: transparent;\">Sawarna Paradiso</span><span style=\"background-color: transparent;\"> memiliki</span><span style=\"background-color: transparent;\"> 3 tipe kamar yaitu superior, deluxe, family dan dibandrol dengan </span>harga permalam Rp. 550.000 sampai Rp. 1.000.000</p>', '  -6.9765134  ', '  106.2990388  ', 46);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `ratings` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `jenisid` bigint(11) NOT NULL,
  `jenis` varchar(90) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id`, `ratings`, `note`, `jenisid`, `jenis`, `iduser`) VALUES
(39, 5, 'ad', 944, 'wisata', 1),
(40, 4, 'ok', 944, 'wisata', 2),
(45, 3, 'r', 22, 'kuliner', 1),
(46, 3, 'r', 944, 'wisata', 1),
(47, 5, '', 33, 'penginapan', 1),
(48, 5, 'ok', 22, 'kuliner', 1),
(49, 5, 'e', 33, 'penginapan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spbu`
--

CREATE TABLE `spbu` (
  `id_spbu` int(11) NOT NULL,
  `nama_spbu` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `id_kategori` varchar(25) DEFAULT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spbu`
--

INSERT INTO `spbu` (`id_spbu`, `nama_spbu`, `alamat`, `gambar`, `deskripsi`, `latitude`, `longitude`, `id_kategori`, `id_kecamatan`) VALUES
(2, 'spbu cilamata ', 'cilamaya', '2018-11-051.jpg', '<p>ok</p>', '   -6.800677', '106.052383', '52', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportasi`
--

CREATE TABLE `transportasi` (
  `id` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `jenis_transportasi` varchar(250) NOT NULL,
  `waktu` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transportasi`
--

INSERT INTO `transportasi` (`id`, `id_wisata`, `jenis_transportasi`, `waktu`) VALUES
(1, 944, 'motor', '1h 30m'),
(2, 956, 'Mobil', '2h 30m');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `nohp`, `alamat`) VALUES
(1, 'ilham udin', 'ilham12@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0895613714317', 'bojong'),
(2, 'ilham ', 'ilham2@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '0895613714317', 'bojong'),
(5, 'ilham ', 'user@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0895613714317', 'bojong'),
(6, 'eqe', 'bimo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '123131', 'sdsa'),
(7, 'adas', 'bimos@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '213', 'dsa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_google`
--

CREATE TABLE `users_google` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(10) NOT NULL,
  `oauth_uid` varchar(50) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor`
--

CREATE TABLE `visitor` (
  `ip` varchar(29) NOT NULL,
  `date` date NOT NULL,
  `hits` int(11) NOT NULL,
  `online` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `visitor`
--

INSERT INTO `visitor` (`ip`, `date`, `hits`, `online`, `time`) VALUES
('::1', '2022-07-02', 1, '1656778183', '2022-07-02 18:09:43'),
('::1', '2022-07-03', 6, '1656830149', '2022-07-03 05:27:52'),
('::1', '2022-07-06', 2, '1657121479', '2022-07-06 16:55:10'),
('::1', '2022-07-08', 2, '1657293937', '2022-07-08 17:04:49'),
('::1', '2022-07-09', 9, '1657330270', '2022-07-09 03:12:28'),
('::1', '2022-07-10', 6, '1657445041', '2022-07-10 08:25:46'),
('::1', '2022-07-11', 7, '1657557599', '2022-07-11 16:50:47'),
('::1', '2022-07-12', 6, '1657639162', '2022-07-12 04:44:41'),
('::1', '2022-07-13', 3, '1657692913', '2022-07-13 02:41:10'),
('::1', '2022-07-15', 16, '1657914517', '2022-07-15 09:49:12'),
('::1', '2022-07-19', 5, '1658258975', '2022-07-19 00:08:20'),
('::1', '2022-07-20', 1, '1658307614', '2022-07-20 11:00:14'),
('::1', '2022-07-25', 6, '1658741533', '2022-07-25 10:04:57'),
('::1', '2022-07-26', 3, '1658813475', '2022-07-26 07:27:17'),
('::1', '2022-07-28', 2, '1659003316', '2022-07-28 11:40:01'),
('::1', '2022-07-29', 2, '1659105827', '2022-07-29 16:40:45'),
('::1', '2022-07-31', 2, '1659257640', '2022-07-31 10:52:07'),
('::1', '2022-08-02', 1, '1659423983', '2022-08-02 09:06:23'),
('::1', '2022-08-03', 9, '1659556338', '2022-08-03 06:48:32'),
('::1', '2022-08-04', 2, '1659587148', '2022-08-04 05:57:56'),
('::1', '2022-08-10', 3, '1660161714', '2022-08-10 18:32:21'),
('::1', '2022-08-16', 1, '1660643479', '2022-08-16 11:51:19'),
('::1', '2022-08-18', 1, '1660855728', '2022-08-18 22:48:48'),
('::1', '2022-08-19', 2, '1660901690', '2022-08-19 11:18:47'),
('::1', '2022-09-13', 2, '1663072966', '2022-09-13 14:40:20'),
('::1', '2022-09-21', 4, '1663756937', '2022-09-21 11:22:37'),
('::1', '2022-09-29', 2, '1664478811', '2022-09-29 11:22:52'),
('::1', '2022-10-03', 1, '1664823256', '2022-10-03 20:54:16'),
('::1', '2022-10-05', 2, '1665001257', '2022-10-05 01:33:45'),
('::1', '2022-10-06', 1, '1665013709', '2022-10-06 01:48:29'),
('::1', '2022-10-09', 3, '1665327734', '2022-10-09 06:17:48'),
('::1', '2022-10-10', 1, '1665434488', '2022-10-10 22:41:28'),
('::1', '2022-10-11', 1, '1665503442', '2022-10-11 17:50:42'),
('::1', '2022-10-12', 2, '1665594014', '2022-10-12 17:31:10'),
('::1', '2022-10-13', 2, '1665636736', '2022-10-13 05:49:56'),
('::1', '2022-11-04', 3, '1667543936', '2022-11-04 07:32:25'),
('::1', '2022-11-15', 3, '1668469357', '2022-11-15 00:37:14'),
('::1', '2022-11-18', 10, '1668808122', '2022-11-18 22:30:43'),
('::1', '2022-11-23', 1, '1669188894', '2022-11-23 08:34:54'),
('::1', '2022-12-27', 2, '1672105765', '2022-12-27 02:48:12'),
('::1', '2022-12-30', 2, '1672374736', '2022-12-30 03:30:02'),
('::1', '2023-01-06', 2, '1672996763', '2023-01-06 10:18:35'),
('158.140.180.65', '2023-01-06', 3, '1673015236', '2023-01-06 21:25:48'),
('139.5.106.114', '2023-01-06', 1, '1673022696', '2023-01-06 23:31:36'),
('84.39.225.141', '2023-01-06', 1, '1673022744', '2023-01-06 23:32:24'),
('47.242.105.176', '2023-01-07', 1, '1673057340', '2023-01-07 09:09:00'),
('180.243.13.121', '2023-01-07', 7, '1673074030', '2023-01-07 11:40:56'),
('182.3.38.159', '2023-01-07', 1, '1673066517', '2023-01-07 11:41:57'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673069836', '2023-01-07 12:37:16'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673070216', '2023-01-07 12:43:36'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673070316', '2023-01-07 12:45:16'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673070319', '2023-01-07 12:45:19'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673070561', '2023-01-07 12:49:21'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673070591', '2023-01-07 12:49:51'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673070621', '2023-01-07 12:50:21'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673070669', '2023-01-07 12:51:09'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673070755', '2023-01-07 12:52:35'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673070757', '2023-01-07 12:52:37'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673070758', '2023-01-07 12:52:38'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673070926', '2023-01-07 12:55:26'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673070994', '2023-01-07 12:56:34'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673071003', '2023-01-07 12:56:43'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673071006', '2023-01-07 12:56:46'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673071009', '2023-01-07 12:56:49'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673071010', '2023-01-07 12:56:50'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673071015', '2023-01-07 12:56:55'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673071019', '2023-01-07 12:56:59'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673071023', '2023-01-07 12:57:03'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673071027', '2023-01-07 12:57:07'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673071053', '2023-01-07 12:57:33'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673071063', '2023-01-07 12:57:43'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673071065', '2023-01-07 12:57:45'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673071369', '2023-01-07 13:02:49'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673071375', '2023-01-07 13:02:55'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673072039', '2023-01-07 13:13:59'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673072255', '2023-01-07 13:17:35'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673072370', '2023-01-07 13:19:30'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673072533', '2023-01-07 13:22:13'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673072551', '2023-01-07 13:22:31'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673072555', '2023-01-07 13:22:35'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673072560', '2023-01-07 13:22:40'),
('2001:448a:2040:45ec:700b:1c05', '2023-01-07', 1, '1673072799', '2023-01-07 13:26:39'),
('2001:448a:2040:45ec:343b:cac5', '2023-01-07', 1, '1673089940', '2023-01-07 18:12:20'),
('31.40.222.67', '2023-01-07', 1, '1673109072', '2023-01-07 23:31:12'),
('185.150.84.165', '2023-01-07', 1, '1673109137', '2023-01-07 23:32:17'),
('188.165.87.109', '2023-01-07', 2, '1673110552', '2023-01-07 23:55:50'),
('188.165.87.111', '2023-01-07', 1, '1673110552', '2023-01-07 23:55:52'),
('150.136.250.6', '2023-01-08', 1, '1673115170', '2023-01-08 01:12:50'),
('168.151.96.110', '2023-01-08', 1, '1673195487', '2023-01-08 23:31:27'),
('180.149.28.57', '2023-01-08', 1, '1673195522', '2023-01-08 23:32:02'),
('152.39.155.191', '2023-01-09', 1, '1673282034', '2023-01-09 23:33:54'),
('168.151.109.86', '2023-01-10', 1, '1673368403', '2023-01-10 23:33:23'),
('77.81.104.223', '2023-01-10', 1, '1673368511', '2023-01-10 23:35:11'),
('180.252.247.182', '2023-01-11', 5, '1673443414', '2023-01-11 19:43:24'),
('103.26.211.5', '2023-01-11', 1, '1673441008', '2023-01-11 19:43:28'),
('180.252.240.145', '2023-01-11', 5, '1673443393', '2023-01-11 20:16:35'),
('185.182.23.232', '2023-01-11', 1, '1673454586', '2023-01-11 23:29:46'),
('213.255.249.234', '2023-01-11', 1, '1673454878', '2023-01-11 23:34:38'),
('180.243.12.116', '2023-01-12', 1, '1673539267', '2023-01-12 23:01:07'),
('180.243.12.116', '2023-01-16', 14, '1673846875', '2023-01-16 04:22:43'),
('103.140.108.58', '2023-01-20', 2, '1674199407', '2023-01-20 14:16:35'),
('119.12.177.191', '2023-01-21', 1, '1674312399', '2023-01-21 21:46:39'),
('45.142.98.56', '2023-01-22', 1, '1674398695', '2023-01-22 21:44:55'),
('94.176.81.56', '2023-01-22', 1, '1674398767', '2023-01-22 21:46:07'),
('168.151.174.198', '2023-01-23', 1, '1674485258', '2023-01-23 21:47:38'),
('168.151.126.3', '2023-01-23', 1, '1674485462', '2023-01-23 21:51:02'),
('116.206.29.91', '2023-01-24', 2, '1674543718', '2023-01-24 13:21:33'),
('180.252.247.156', '2023-01-24', 1, '1674543645', '2023-01-24 14:00:45'),
('180.149.26.172', '2023-01-24', 1, '1674574268', '2023-01-24 22:31:08'),
('198.240.89.192', '2023-01-24', 1, '1674574487', '2023-01-24 22:34:47'),
('120.188.32.103', '2023-01-25', 3, '1674587530', '2023-01-25 01:42:59'),
('103.140.108.58', '2023-01-25', 3, '1674629656', '2023-01-25 13:41:55'),
('110.50.81.196', '2023-01-25', 1, '1674629658', '2023-01-25 13:54:18'),
('101.128.112.118', '2023-01-25', 1, '1674635542', '2023-01-25 15:32:22'),
('223.255.229.75', '2023-01-25', 1, '1674637329', '2023-01-25 16:02:09'),
('114.124.217.118', '2023-01-25', 5, '1674637862', '2023-01-25 16:03:10'),
('209.99.168.132', '2023-01-25', 1, '1674659794', '2023-01-25 22:16:34'),
('94.176.57.224', '2023-01-25', 1, '1674659795', '2023-01-25 22:16:35'),
('45.131.101.137', '2023-01-26', 1, '1674744690', '2023-01-26 21:51:30'),
('216.19.204.91', '2023-01-26', 1, '1674744743', '2023-01-26 21:52:23'),
('114.124.216.93', '2023-01-28', 2, '1674880128', '2023-01-28 11:27:15'),
('180.214.232.17', '2023-01-30', 1, '1675080708', '2023-01-30 19:11:48'),
('114.124.243.253', '2023-01-31', 1, '1675156912', '2023-01-31 16:21:52'),
('2a06:4880:5000::4e', '2023-02-01', 1, '1675268102', '2023-02-01 23:15:02'),
('52.210.255.58', '2023-02-03', 1, '1675383814', '2023-02-03 07:23:34'),
('180.252.242.215', '2023-02-07', 1, '1675733368', '2023-02-07 08:29:28'),
('223.255.229.75', '2023-02-07', 1, '1675768957', '2023-02-07 18:22:37'),
('114.4.214.247', '2023-02-07', 5, '1675778668', '2023-02-07 20:18:27'),
('180.252.242.214', '2023-02-07', 2, '1675788932', '2023-02-07 23:54:26'),
('180.252.248.154', '2023-02-08', 3, '1675831265', '2023-02-08 11:39:25'),
('103.161.128.167', '2023-02-08', 1, '1675867062', '2023-02-08 21:37:42'),
('180.252.248.188', '2023-02-08', 2, '1675871851', '2023-02-08 22:52:45'),
('180.252.248.171', '2023-02-09', 2, '1675898109', '2023-02-09 05:58:57'),
('180.252.248.185', '2023-02-09', 6, '1675911220', '2023-02-09 09:07:08'),
('180.252.248.145', '2023-02-13', 2, '1676299503', '2023-02-13 20:00:45'),
('180.252.243.153', '2023-02-15', 1, '1676437999', '2023-02-15 12:13:19'),
('180.252.255.173', '2023-02-19', 5, '1676786581', '2023-02-19 11:14:39'),
('223.255.230.10', '2023-02-19', 2, '1676788843', '2023-02-19 13:40:18'),
('180.252.254.72', '2023-02-19', 2, '1676804076', '2023-02-19 14:06:57'),
('223.255.229.77', '2023-02-19', 1, '1676805111', '2023-02-19 18:11:51'),
('223.255.229.78', '2023-02-19', 2, '1676815887', '2023-02-19 20:20:50'),
('103.10.66.6', '2023-02-19', 1, '1676817557', '2023-02-19 21:39:17'),
('180.252.244.224', '2023-02-19', 1, '1676822385', '2023-02-19 22:59:45'),
('223.255.229.66', '2023-02-20', 1, '1676855849', '2023-02-20 08:17:29'),
('180.252.243.64', '2023-02-20', 1, '1676867467', '2023-02-20 11:31:07'),
('116.206.29.49', '2023-02-20', 1, '1676877661', '2023-02-20 14:21:01'),
('180.214.232.70', '2023-02-21', 1, '1676960779', '2023-02-21 13:26:19'),
('114.10.31.236', '2023-02-21', 2, '1676992532', '2023-02-21 22:14:42'),
('223.255.230.50', '2023-02-22', 1, '1676999258', '2023-02-22 00:07:38'),
('114.10.31.236', '2023-02-22', 3, '1677004020', '2023-02-22 01:26:50'),
('180.252.240.35', '2023-02-22', 1, '1677042016', '2023-02-22 12:00:16'),
('180.252.255.98', '2023-02-22', 5, '1677050780', '2023-02-22 12:43:23'),
('180.252.242.245', '2023-02-22', 3, '1677048775', '2023-02-22 13:52:16'),
('34.201.49.147', '2023-02-24', 1, '1677257350', '2023-02-24 23:49:10'),
('180.243.8.255', '2023-02-27', 3, '1677486409', '2023-02-27 01:05:43'),
('180.243.8.255', '2023-02-28', 1, '1677517650', '2023-02-28 00:07:30'),
('140.213.130.43', '2023-03-02', 2, '1677736328', '2023-03-02 12:51:04'),
('180.252.254.103', '2023-03-02', 3, '1677737483', '2023-03-02 13:07:54'),
('180.252.247.138', '2023-03-02', 2, '1677759899', '2023-03-02 19:24:42'),
('180.252.247.138', '2023-03-03', 2, '1677782172', '2023-03-03 01:36:04'),
('43.130.123.235', '2023-03-03', 2, '1677860088', '2023-03-03 23:14:44'),
('180.243.14.212', '2023-03-04', 1, '1677901796', '2023-03-04 10:49:56'),
('167.248.133.188', '2023-03-06', 1, '1678108642', '2023-03-06 20:17:22'),
('2001:448a:2042:ffbb:e9f7:ed18', '2023-03-08', 1, '1678278797', '2023-03-08 19:33:17'),
('182.2.228.131', '2023-03-08', 1, '1678278828', '2023-03-08 19:33:48'),
('2001:448a:2042:ffbb:e9f7:ed18', '2023-03-08', 1, '1678278841', '2023-03-08 19:34:01'),
('2001:448a:2042:ffbb:e9f7:ed18', '2023-03-08', 1, '1678278850', '2023-03-08 19:34:10'),
('39.110.218.101', '2023-03-08', 3, '1678287468', '2023-03-08 21:56:31'),
('65.154.226.170', '2023-03-08', 1, '1678287418', '2023-03-08 21:56:58'),
('2001:448a:2042:ffbb:e9f7:ed18', '2023-03-08', 1, '1678289520', '2023-03-08 22:32:00'),
('2001:448a:2042:ffbb:e9f7:ed18', '2023-03-08', 1, '1678289524', '2023-03-08 22:32:04'),
('2001:448a:2042:ffbb:e9f7:ed18', '2023-03-08', 1, '1678289578', '2023-03-08 22:32:58'),
('38.132.193.77', '2023-03-08', 1, '1678290602', '2023-03-08 22:50:02'),
('133.242.174.119', '2023-03-08', 3, '1678294600', '2023-03-08 23:55:18'),
('38.132.193.197', '2023-03-09', 1, '1678295568', '2023-03-09 00:12:48'),
('2a09:bac1:6520:8::278:31', '2023-03-09', 1, '1678327311', '2023-03-09 09:01:51'),
('2001:448a:2042:ffbb:459e:82fd', '2023-03-09', 1, '1678344480', '2023-03-09 13:48:00'),
('2001:448a:2042:ffbb:459e:82fd', '2023-03-09', 1, '1678344940', '2023-03-09 13:55:40'),
('2001:448a:2042:ffbb:e9f7:ed18', '2023-03-09', 1, '1678355938', '2023-03-09 16:58:58'),
('205.169.39.253', '2023-03-09', 2, '1678359210', '2023-03-09 17:53:05'),
('2a09:bac1:6520:8::278:31', '2023-03-10', 1, '1678408529', '2023-03-10 07:35:29'),
('2001:41d0:203:39cb::', '2023-03-10', 1, '1678422110', '2023-03-10 11:21:50'),
('2a09:bac1:6500:8::279:f', '2023-03-11', 1, '1678493146', '2023-03-11 07:05:46'),
('180.252.82.189', '2023-03-11', 3, '1678524981', '2023-03-11 11:50:00'),
('2a09:bac1:6500:8::279:f', '2023-03-12', 2, '1678618370', '2023-03-12 03:47:42'),
('2a09:bac1:6500:8::279:f', '2023-03-13', 1, '1678666695', '2023-03-13 07:18:15'),
('36.69.75.52', '2023-03-13', 1, '1678683988', '2023-03-13 12:06:28'),
('103.147.154.56', '2023-03-13', 1, '1678698364', '2023-03-13 16:06:04'),
('2a09:bac1:6500:8::279:f', '2023-03-14', 1, '1678757525', '2023-03-14 08:32:05'),
('180.252.250.147', '2023-03-14', 1, '1678809141', '2023-03-14 22:52:21'),
('2a09:bac1:6540:8::23:254', '2023-03-15', 2, '1678844587', '2023-03-15 07:12:37'),
('167.248.133.190', '2023-03-15', 1, '1678839823', '2023-03-15 07:23:43'),
('69.167.12.32', '2023-03-16', 1, '1678970101', '2023-03-16 19:35:01'),
('114.124.242.3', '2023-03-26', 1, '1679846495', '2023-03-26 23:01:35'),
('205.169.39.63', '2023-03-29', 1, '1680105185', '2023-03-29 22:53:05'),
('2001:448a:2042:ffbb:fc6e:f911', '2023-03-31', 1, '1680197323', '2023-03-31 00:28:43'),
('180.243.114.193', '2023-04-03', 2, '1680459349', '2023-04-03 01:14:41'),
('180.252.247.32', '2023-04-03', 2, '1680541047', '2023-04-03 23:43:25'),
('180.252.247.32', '2023-04-04', 12, '1680544808', '2023-04-04 00:01:32'),
('180.252.241.39', '2023-04-04', 1, '1680541930', '2023-04-04 00:12:10'),
('180.214.232.74', '2023-04-04', 7, '1680582410', '2023-04-04 10:42:21'),
('182.3.43.180', '2023-04-04', 2, '1680582125', '2023-04-04 11:20:07'),
('114.124.131.69', '2023-04-05', 4, '1680696135', '2023-04-05 19:01:26'),
('2001:448a:2042:ffbb:b401:e3be', '2023-04-09', 1, '1681050827', '2023-04-09 21:33:47'),
('167.248.133.186', '2023-04-12', 1, '1681236748', '2023-04-12 01:12:28'),
('154.12.243.42', '2023-04-16', 1, '1681636370', '2023-04-16 16:12:50'),
('154.92.116.134', '2023-05-08', 1, '1683558480', '2023-05-08 22:08:00'),
('180.252.251.210', '2023-05-09', 2, '1683571080', '2023-05-09 01:37:54'),
('133.242.140.127', '2023-05-09', 1, '1683580015', '2023-05-09 04:06:55'),
('206.41.186.163', '2023-05-09', 1, '1683594131', '2023-05-09 08:02:11'),
('103.30.12.75', '2023-05-10', 1, '1683680667', '2023-05-10 08:04:27'),
('89.38.133.184', '2023-05-10', 1, '1683681075', '2023-05-10 08:11:15'),
('152.39.186.156', '2023-05-11', 1, '1683766524', '2023-05-11 07:55:24'),
('94.176.92.87', '2023-05-11', 1, '1683766682', '2023-05-11 07:58:02'),
('84.39.227.190', '2023-05-12', 1, '1683852707', '2023-05-12 07:51:47'),
('89.38.132.72', '2023-05-12', 1, '1683852758', '2023-05-12 07:52:38'),
('185.150.87.144', '2023-05-13', 1, '1683939228', '2023-05-13 07:53:48'),
('206.204.23.217', '2023-05-13', 1, '1683939316', '2023-05-13 07:55:16'),
('193.200.104.246', '2023-05-14', 1, '1684025912', '2023-05-14 07:58:32'),
('168.151.97.30', '2023-05-14', 1, '1684025972', '2023-05-14 07:59:32'),
('::1', '2023-06-01', 1, '1685615923', '2023-06-01 12:38:43'),
('::1', '2023-06-02', 1, '1685724243', '2023-06-02 18:44:03'),
('::1', '2023-06-03', 15, '1685778651', '2023-06-03 07:16:56'),
('::1', '2023-06-04', 3, '1685858808', '2023-06-04 07:59:16'),
('::1', '2023-10-31', 12, '1698767428', '2023-10-31 13:23:01'),
('::1', '2023-11-01', 1, '1698845904', '2023-11-01 14:38:24'),
('::1', '2024-01-13', 10, '1705143337', '2024-01-13 05:01:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `idkategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `alamat`, `gambar`, `deskripsi`, `latitude`, `longitude`, `idkategori`) VALUES
(944, '   Curug Tujuh   ', '   Pagelaran, Kec. Malingping, Kabupaten Lebak, Banten 42391   ', 'curug_tujuh.png', 'Air terjun ini bernama Curug Tujuh jadi menurut warga setempat bermaksud ada tujuh undakan.Curug ini masih alami dan untuk mengakses ke tempat ini ekstra penuh kesabaran akan tetapi jika sudah sampai ke lokasi akan terbayar dengan keindahan curug ini.', '   -6.800677   ', '106.052383', 1),
(945, '   Curug Kuda   ', '   Jl. El Cilaksana, Cibeber, Kec. Cibeber, Kabupaten Lebak, Banten 42394   ', 'curug_kuda.png', 'Air terjun ini bernama Curug Tujuh jadi menurut warga setempat bermaksud ada tujuh undakan.Curug ini masih alami dan untuk mengakses ke tempat ini ekstra penuh kesabaran akan tetapi jika sudah sampai ke lokasi akan terbayar dengan keindahan curug ini.', '   -6.872137   ', '   106.33566   ', 1),
(946, '  Curug Cikadupunah  ', '  Sukamulya, Kec. Cibeber, Kabupaten Lebak, Banten 42394   ', 'curug_cikadupunah.png', 'Berada di tengah area galian tambang emas tidak membuat Curug Cikadu Punah yang berlokasi di area tambang Blok Cirotan, Desa Sukamulya, Kecamatan Cibeber, Kabupaten Lebak, sepi kunjungan wisatawan. Berada di tengah area tambang emas yang eksis pada tahun 1955, curug ini menyajikan keasrian suasana hutan. Lokasinya berdekatan dengan objek wisata Gunug Luhur yang dijuluki Negeri di atas Awan, menjadi daya tarik lainnya dari Curug Cikadu Punah.', '  -6.784139  ', '  106.313245  ', 1),
(947, '  Curug Cisuren  ', '  Ciusul, Citorek Kidul, Kec. Cibeber, Kabupaten Lebak, Banten 42394   ', 'curug_cisuren.png', 'Site merupakan air terjun dengan ketinggian sekitar 7 meter yang dilalui oleh sungai Cisuren dengan air yang sangat jernih. Pada bagian bawah air terjun, ditemui kolam dengan kedalaman 2,5 m dengan air yang segar. Umumnya pengunjung menyempatkan berenang pada kolam, memngingat perjalanan kaki yang lumayan panjang. Pada bagian tebing air terjun terdapat kolom yang masih dapat diakses. Pemandangan sekitar berupa vegetasi dengan suasana yang tenang. Site ini masuk ke dalam kawasan Taman Nasional Gunung Halimun Salak.', '  -6.725659  ', '  106.357134  ', 1),
(948, '  Curug Ciporolak  ', '  Kp lebak picung, Hegarmanah, Kec. Cibeber, Kabupaten Lebak, Banten 42394  ', 'curug_ciporolak.png', 'Wisata Curug Ciporolak di Cibeber Lebak Banten memiliki alam yang masih terjaga dan terkenal sangat segar dan dingin. Suhu airnya saja selalu stabil berada di kisaran suhu 15 derajat celcius. Pemberian nama curug ini tak kalah unik, Ciporolak berasal dari kata ngaborolak yang berarti berjatuhan atau reruntuhan.', '  -6.773422  ', '  106.366325  ', 1),
(949, '   Curug Kanteh   ', '   Cikatomas, Kec. Cilograng, Kabupaten Lebak, Banten 42393, Indonesia   ', 'curug_kanteh1.png', 'Curug Kanteh memiliki tinggi mencapai sekitar 80 meter. Perjalanan dengan jalan kaki membelah hutan dan menyusuri aliran sungai. Usaha yang penuh dengan tantangan tersebut akan terbayar dengan keindahan Curug Kanteh yang tergambar sempurna.', '   -6.894548   ', '   106.351908   ', 1),
(950, '  Curug Cikeris  ', '  Girilaya, Kec. Cipanas, Kabupaten Lebak, Banten 42372, Indonesia  ', 'curug_cikeris.png', 'Curug ini berjarak 10 km dari arah Rangkasbitung. Diperjalanan menuju ke cikeris kita di suguhkan oleh pemandangan yang bagus berupa hutan,bukit, dan lainnya. tapi setelah hampir sampai ke air terjun harusberjalan dulu sekitar 1 KM. Kadar belerang di kolam pemandian air panas ini sangat sedikit sehinngga sangat cocok untuk pengunjung yang tidak suka dengan belerang', '  -6.573935  ', '  106.356439  ', 1),
(951, '  Curug Sata - Cimanyangray  ', '  Cimanyangray, Kec. Gunungkencana, Kabupaten Lebak, Banten 42354  ', 'curug_sata.png', 'Wisata Curug Sata di Cimanyangray Lebak Banten ini letaknya berada di Gunung Kencana. Curug ini tidak terlalu tinggi tapi punya debit air yang sangat besar dengan air yang jernih.', '  -6.652118  ', '  106.054874  ', 1),
(952, '    Curug Dengdeng    ', '    Jl. Raya Malimping Ps. Kupa, Kadujajar, Kec. Malingping, Kabupaten Lebak, Banten 42395    ', 'curug_dengdeng.png', 'Wisata Curug Dengdeng di Kadujajar Lebak Banten ini masih dibiarkan alami namun ke depan pihak pemerintah desa telah mempunyai rencana untuk mengembangkannya sebagai salah satu aset tempat wisata yang bisa mendatangkan pendapatan desa. Curug ini memiliki tinggi 25 meter serta memiliki akses jalan yang buruk', '    -6.750395    ', '    106.052379    ', 1),
(953, '  Curug Kebo Bolang  ', '  Unnamed Road, Sumberwaras, Kec. Malingping, Kabupaten Lebak, Banten 42391  ', 'curug_kebo_bolang.png', 'Curug Munding merupakan salah satu dari sekian air terjun dengan kisah yang unik, konon menurut cerita rakyat yang tersebar, pernah ada munding (kerbau) yang loncat dari atas curug. Salah satu hal yang menarik dari wisata ini yaitu aliran air terjun setinggi 12 meter dengan bebatuannya yang asri. Ditambah lagi dengan panorama alam hutan yang masih asri', '  -6.749833  ', '  105.993197  ', 1),
(954, '  Curug Butak  ', '  Lebak Tundun, Mugijaya, Kec. Cigemblong, Kabupaten Lebak, Banten 42395  ', 'curug_butak.png', 'Kabupaten Lebak memang mempunyai segudang tempat wisata yang belum terlalu di explore. Salah satu wisata alam yang belum terlalu terexplore yaitu Curug Cibutak. Tempat wisata ini masih sangat tersembunyi, terlihat dari fasilitas dan beberapa pengelolaannya yang belum maksimal. Selain tempatnya yang masih asri, tempat ini juga memiliki tebing bebatuan eksotis, ditambah air terjun berwarna hijau kebiruang, sangat bersih dan jernih. Kedalam kolam air di curug ini yaitu 10-15 meter.', '  -6.794802  ', '  106.177142  ', 1),
(955, '  Curug Kumpay  ', '  Maraya, Kec. Sajira, Kabupaten Lebak, Banten 42371  ', 'curug_kumpay.png', 'Wisata Kebun Curug Kumpay di Sajira Lebak Banten yang sarat dengan cerita misteri. Keberadaan curug ini belum begitu banyak terkuak oleh traveler sebab lokasinya berada di dalam hutan. Wisatawan yang mau mengunjungi curug ini disarankan untuk mencari pemandu dari warga setempat agar tidak tersesat.', '  -6.59068  ', '  106.328226  ', 1),
(956, '  Curug Ngebul  ', '  Maraya, Kec. Sajira, Kabupaten Lebak, Banten 42371  ', 'curug_ngebul.png', 'Wisata Curug Ngebul di Sajira Lebak Banten merupakan tempat wisata yang harus anda kunjungi karena pesona keindahannya tidak ada duanya. Penduduk lokal daerah Lebak juga sangat ramah tamah terhadap wisatawan lokal maupun wisatawan asing. Kota Lebak juga terkenal akan Wisata Curug Ngebul di Sajira Lebak Banten yang sangat menarik untuk dikunjungi.', '  -6.588462  ', '  106.333646  ', 1),
(957, '  Curug Cibangkit  ', '  Kp.Cikancra, Sukamaju, Kec. Sobang, Kabupaten Lebak, Banten 42318  ', 'curug_cibangkit.png', 'Wisata Curug Cibangkit di Majasari Lebak Banten memiliki Informasi yang beredar di internet masih sangat terbatas. Wisata Curug Cibangkit di Majasari Lebak Banten ini terletak di desa Maja, kecamatan Sobang. Wisata Curug Cibangkit di Majasari Lebak Banten merupakan tempat wisata yang harus anda kunjungi karena pesona keindahannya tidak ada duanya. Penduduk lokal daerah Lebak juga sangat ramah tamah terhadap wisatawan lokal maupun wisatawan asing.', '  -6.666678  ', '  106.389758  ', 1),
(958, '  Curug Cipicung  ', '  Sukaresmi, Kec. Sobang, Kabupaten Lebak, Banten 42315  ', 'curug_cipicung.png', 'Curug Cipicung berada di desa Sukaresmi Kecamatan Sobang dengan ketinggian kurang lebih 75 m. Akses transportasi menuju lokasi Curug Cipicung dari kota kabupaten sekitar 72 km. Jarak dari kota kecamatan 3KM dan pada saat ini sebagian jalannya sudah rabat beton dari pintu masuk ke lokasi 1,5 Km. Wisata Curug Cipicung di Sukaresmi Lebak Banten mempunyai pemandangan yang mampu memanjakan mata pengunjung.', '  -6.63811  ', '  106.32718  ', 1),
(959, '  Curug Rame  ', '  Cihujan, Kec. Cijaku, Kabupaten Lebak, Banten 42395   ', 'curug_rame.png', 'Curug Rame yang terletak di Kampung Bojongganteng, Desa Kandang Sapi, Kecamatan Cijaku, Kabupaten Lebak. Curug yang memiliki ketinggan sekitar 15 meter dan dikelilingi hamparan area persawahan tersebut, kondisinya belum tertata dengan baik sehingga belum banyak yang tahu keberadaan curug tersebut. Air yang mengalir dari curug tersebut berasal dari Bendungan Cilangkahan. Aliran air curug itu bukan hanya menghasilkan pemandangan yang indah, namun sejatinya air tersebut menjadi sumber penghidupan petani sekitar lantaran airnya dimanfaatkan mengairi sawah.', '  -6.74767  ', '  106.056126  ', 1),
(960, '  Pantai Pulomanuk  ', '  Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393  ', 'pantai_pulomanuk.png', 'Site merupakan pantai dengan pasir putih yang letaknya dekat dengan salah satu pabrik semen yang beroprasi di Bayah. Di dekat pantai, terdapat pulau yang bernama Pulau Manuk yang pada saat keadaan surut, pengunjung dapat berjalan kesana. Pantai ini juga merupakan tempat sungai Cipamubulan bermuara. Ditemui tempat beristirahat berupa saung bagi pengunjung. Karena letaknya yang dekat dengan hutan (di bagian timur), tak jarang ditemui monyet-monyet yang berkeliaran di pantai', '  -6.969313  ', '  106.265378  ', 2),
(961, '  Pantai Ciantir  ', '  JL Cikaung, Sawarna, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393  ', 'pantai_ciantir.png', 'Wisata Pantai Ciantir di Sawarna Lebak Banten adalah pantai berpasir putih bersih dengan bibir pantai yang cukup panjang. Pantai ini menjadi surga para peselancar. Banyak penginapan di sepanjang jalan menuju ke pantai ini yang tersedia untuk wisatawan yang mau menginap', '  -6.985078  ', '  106.308646  ', 2),
(962, '  Pantai Goa Langir  ', '  Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393   ', 'pantai_goa_langir.png', 'Wisata Pantai Goa Langir Sawarna di Bayah Lebak Banten memiliki angin yang sejuk, pemandangan birunya laut serta gelombang ombak yang tinggi menjadi sajian utama di Pantai Gua Langir. Pantai Gua Langir di batasi dengan tebing yang kokoh di bagian kiri.', '  -6.975314  ', '  106.290051  ', 2),
(963, '    Pantai Karangtaraje    ', '    Jl. Raya Sawarna Bayah, Cibareno, Kec. Bayah, Banten 42393    ', 'pantai_karangtaraje.png', 'Karang di bagian sebelah kiri pantai bahkan menyerupai teras yang luas dan sedikit berundak-undak menyerupai tangga. Oleh karena itu, penduduk menamainya Karang Taraje yang dalam bahasa Sunda Taraje berarti tangga.', '    -6.956187    ', '    106.240972    ', 2),
(964, '  Pantai Karang Beureum  ', '  Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393   ', 'pantai_karang_bereum.png', 'Site ini merupakan pantai yang menghadap ke timur dengan alas batu yang datar, namun di bagian ujung membentuk gundukan batuan yang salahsatu fragmennya berwarna kemerahan sehingga lokasi ini dinamakan Karang Bereum. Bila air surut kita dapat berjalan di hamparan batuan ini. Site ini tersusun dari batuan breksi ignimbrite, batupasir kasar dan breksi aneka bahan. Waktu terbaik untuk mengamati site ini adalah saat fajar sambil menikmati matahari terbit. berjarak sekitar 125 km dari Rangkasbitung', '  -6.991588  ', '  106.319439  ', 2),
(965, '  Pantai Karang Bokor  ', '  Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393  ', 'pantai_karang_bokor.png', 'Wisata Pantai Karang Bokor di Sawarna Lebak Banten ini ada sebuah karang besar di tengah laut yang menjadi ikon. Karang tersebut saat pasang tinggi akan dihempas oleh gelombang laut sehingga menghasilkan suara yang menggelegar.', '  -6.979097  ', '  106.279896  ', 2),
(966, '  Pantai Legon Pari  ', '  Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393  ', 'pantai_legon_pari.png', 'Site ini merupakan pantai pasir putih yang membentuk teluk. Teluk ini diapit oleh dua site yaitu Pantai Karang Bereum dan Karang Taraje. Di bagian tengah teluk terlihat laut yang dalam dibandingkan sisinya. Jika dilihat dari udara, di utara teluk ini terlihat lembahan yang memanjang membentuk kelurusan yang berarah hampir utara-selatan sampai ke Legon Pari. berjarak sekitar 125 km dari Rangkasbitung', '  -6.987266  ', '  106.322451  ', 2),
(967, '  Pantai Sawarna  ', '  Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393  ', 'pantai_sawarna.png', 'Nama pantai Sawarna sendiri diambil dari nama desa sebagai tempat keberadaan pantai tersebut, yaitu Desa Sawarna, yang ada di Kecamatan Bayah, Kabupaten Lebak, Propinsi Banten.', '  -6.98295  ', '  106.305401  ', 2),
(968, '  Pantai Tanjung Layar  ', '  Pesona Sawarna Komplek Tanjung Layar Blok Ciantir, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393  ', 'pantai_tanjung_layar.png', 'Pantai Tanjung Layar merupakan Icon Wisata Sawarna. Nama Tanjung Layar berasal dari dua karang berukuran besar menyerupai layar kapal layar yang siap berlayar. Selain dua karang berukuran besar, ditempat yang sama tepatnya berada di sebelah timur Tanjung Layar terdapat cekungan karang menyerupai tapak kaki berukuran raksasa.', '  -6.993926  ', '  106.307169  ', 2),
(969, '  Pantai Seupang  ', '  Sawarna Tim., Kec. Bayah, Kabupaten Lebak, Banten 42393   ', 'pantai_seupang.png', 'Wisata Pantai Seupang di Sawarna Timur Lebak Banten memiliki akses jalan menuju Pantai Seupang hingga saat ini belum layak untuk lalui oleh kendaraan bermotor. Semenjak tahun 2012 hingga sekarang, pihak Desa sudah berusaha maksimal untuk membenahi akses jalan sepanjang 4 Km ini.', '  -6.986795  ', '  106.338196  ', 2),
(970, '  Pantai Cihara  ', '  Ciparahu, Kec. Cihara, Kabupaten Lebak, Banten   ', 'pantai_cihara.png', 'Pantai Cihara ini terletak di Kabupaten Lebak, Banten. Pantai dengan karakter tebing-tebing menjadi ciri khas yang unik dibandingkan dengan pantai-pantai lain yang berada di kawasan Banten. Pantai Selatan memang identik dengan karang yang indah. Karakter setiap karang menjadi ciri khas dari gugusan pantai selatan, termasuk Pantai Cihara yang dinamai karena terletak di daerah yang bernama Cihara.', '  -6.853728  ', '  106.078129  ', 2),
(971, '  Pantai Suka Hujan  ', '  Ciparahu, Kec. Cihara, Kabupaten Lebak, Banten 42392   ', 'pantai_suka_hujan_.png', 'Pantai ini memiliki pasir putih dengan karang-karang di sekitar pantai. Kondisi awannya yang terlihat sangat dekat dengan laut merupakan daya tarik yang pasti banyak dicari oleh para pecinta fotografi.', '  -6.837032  ', '  106.064251  ', 2),
(973, '  Pantai Kelapa Warna  ', '  Jl. Nasional III, Kabupaten Lebak, Banten 42392  ', 'pantai_kelapa_warna_.png', 'Pada Pantai Kelapa Warna terkadang mengadakan hiburan yang begitu meriah. Biasanya terdapat parade band ”End Of Years Festival” yang diikuti grup band dari kota Rangkasbitung, Sukabumi, Pandeglang dan Tangerang. Di samping mengikuti himbauan dari Pemerintah Kabupaten Lebak, untuk tidak mengadakan kegiatan perayaan yang berlebihan, wisata bahari Kelapa warna, hingga saat ini masih dalam tahap penaataan.', '  -6.902326  ', '  106.14826  ', 2),
(974, '  Pantai Cantigi  ', '  Karangkamulyan, Kec. Cihara, Kabupaten Lebak, Banten 42392  ', 'pantai_cantigi.png', 'Pantai Cantigi merupakan pantai yang berada di Kampung Karangkamulyan, Kecamatan Cihara. Lokasi Pantai Cantigi masi berdekatan dengan Pantai Kelapa Warna. Batuan karang yang menumpuk bisa kita jumpai tepat setelah melewati pepohonan kelapa, diantara batuan karang ada jembatan kecil dengan cat merah yang sengaja dibuat oleh pengelolanya.', '  -6.892675  ', '  106.132782  ', 2),
(975, '  Pantai Karang Babi  ', '  Cibareno, Cilograng, Lebak Regency, Banten 42393   ', 'pantai_karang_babi.png', 'Air terjun ini bernama Curug Tujuh jadi menurut warga setempat bermaksud ada tujuh undakan.Curug ini masih alami dan untuk mengakses ke tempat ini ekstra penuh kesabaran akan tetapi jika sudah sampai ke lokasi akan terbayar dengan keindahan curug ini.', '  -6.982939  ', '  106.393332  ', 2),
(976, '  Pantai Cibareno  ', '  Cibareno, Kec. Cilograng, Kabupaten Lebak, Banten 42393  ', 'pantai_cibareno.png', 'Obyek wisata pesona pantai cibareno terletak di Desa cibareno kecamatan cilograng kabupaten lebak banten jika melewati pelabuhan ratu menuju pantai sawarna. Pantai tersebut mempunyai daya tarik tersendiri , kharisma dan kenyamanan pantai ini sejuk dan menawan.', '  -6.978432  ', '  106.396434  ', 2),
(977, '  Pantai Guha Gede  ', '  Guha Gede, Kab, Sawarna Tim., Kec. Cilograng, Kabupaten Lebak, Banten 42393  ', 'pantai_guha_gede.png', 'Pantai Guha Gede merupakan objek wisata di Kabupaten Lebak yang tak kalah menarik dibandingkan daerah lain di Indonesia. Semisal Bali dan Lombok atau tempat wisata lainnya yang lebih dikenal wisatawan asing dari mancanegara.', '  -6.992156  ', '  106.356026  ', 2),
(978, '  Pantai Muara Citarate  ', '  Unnamed Road, Cireundeu, Kec. Cilograng, Kabupaten Lebak, Banten 42393  ', 'pantai_muara_citarate.png', 'Pantai adalah salah satu destinasi wisata terbaik dan ideal yang bisa memberikan ketenangan jiwa, pikiran dan melepaskan semua rasa penat setelah lelah dengan rutinitas pekerjaan. Kondisi Pantai Muara Citarate masih asri dan belum begitu terjamah oleh banyak orang, dikarenakan jalannya yang lumayan cukup terjal. Akses masuk ke lokasinya pun dari jalan raya membutuhkan waktu sekitar 15 menitan.', '  -6.988327  ', '  106.382091  ', 2),
(979, '  Pantai dan Danau Talanca  ', '  Sukamanah, Kec. Malingping, Kabupaten Lebak, Banten 42391  ', 'pantai_danau_talanca.png', 'Wisata Pantai Talanca di Sukamanah Lebak Banten dikenal dengan sebutan ‘Pantai Emas Beach’. di era 90-an musisi legendaris Iwan Fals pernah menginjakan kakinya di kawasan pantai yang pada saat itu masih dikelola sebuah perusahaan.', '  -6.816675  ', '  106.0091  ', 2),
(980, '  Pantai Karang Nawing  ', '  Pagelaran, Kec. Malingping, Kabupaten Lebak, Banten 42391   ', 'pantai_karang_nawing.png', 'Pantai Karang Nawing merupakan Pantai di Lebak yang berlokasi di Kampung Nambo, Desa Pagelaran, Malingping, Lebak, Banten. Daya tarik dari pantai ini yaitu adanya danau dengan perpaduan air tawar yang akan mengalir dari Sungai Cilangkahan ke Laut. Wisatawan juga dapat menikmati indah alam yang masih alami dengan padang rumput dan hamparan pasir putih yang cocok untuk piknik bersama.', '  -6.822235  ', '  106.033637  ', 2),
(981, '  Pantai Bagedur  ', '  Sukamanah, Kec. Malingping, Kabupaten Lebak, Banten 42391  ', 'pantai_bagedur.png', 'Wisata Pantai Bagedur di Malingping Lebak Banten ini terletak di bagian selatan Banten. Daya tarik Pantai Bagedur ini adalah pantai yang landai dan tanpa karang dengan hamparan pasir putih tanpa panjang dengan panjang sekitar 15 Km membentang luas. Karena pantainya yang landai dan tanpa karang.', '  -6.814007  ', '  105.992534  ', 2),
(982, ' Pantai Cimandiri Panggarangan ', ' Situregen, Kec. Panggarangan, Kabupaten Lebak, Banten 42392 ', '_Pantai_Cimandiri_Panggarangan_.png', 'Pantai Cimandiri merupakan salah satu pantai yang menjadi obyek wisata di Kabupaten Lebak. Pantai ini menawarkan view laut khas pantai selatan yang memiliki ombak besar, Batu Sahulu, dan Batu Putri.', ' -6.910143 ', ' 106.173611 ', 2),
(983, '  Pantai Cibobos  ', '  Jl. Nasional III, Karangkamulyan, Kec. Cihara, Kabupaten Lebak, Banten 42392   ', 'pantai_cibobos.png', 'Pecinta wisata atau traveler akan dimanjakan dengan pemandangan keindahan laut Samudera. Objek wisata ini termasuk ke dalam wilayah Resort Pengelolaan Hutan (RPH) Cibobos yang memiliki luas lahan sekitar 3 hektare (Ha), dengan hutan tanaman yang terdiri dari tanaman Jati, Mahoni, dan lain-lain.', '  -6.887601  ', '  106.118957  ', 2),
(984, '  Pantai Karang Malang  ', '  Muara, Kec. Wanasalam, Kabupaten Lebak, Banten 42396  ', 'pantai_karang_malang.png', 'Wisata Pantai Karang Malang di Muara Lebak Banten ini memiliki potensi untuk dijadikan objek wisata. Selain kondisi pantainya masih alami dan bagus, juga memiliki daya tarik lain, yaitu di sekitar pantai yang berpasir tumbuh tanaman ketela, yang dikenal Ketela Kisik. Karena tumbuh di pasir, rasa ketela kisik berbeda dengan jenis ketela lainnya.', '  -6.84461  ', '  105.88046  ', 2),
(985, '  Pantai Karang Ranjang ', '  Unnamed Road, Muara, Kec. Wanasalam, Kabupaten Lebak, Banten 42396   ', 'pantai_karang_ranjang.png', 'Salah satu keunikan dari pantai ini adalah bentuk pasirnya yang sedikit berbeda dengan pantai pada umumnya, yaitu beberntuk memanjang dan lebih besar, bahkan mungkin tidak bisa dikategorikan sebagai pasir karena ukurannya begitu berbeda dengan pasir-pasir pantai pada umumnya.', '  -6.84096  ', '  105.89827  ', 2),
(986, '  Pantai Karang Seke  ', '  Muara, Kec. Wanasalam, Kabupaten Lebak, Banten 42396  ', 'pantai_karang_seke.png', 'Pantai ini menyimpan sebuah cerita yang cukup melegenda tentang asal muasal penamaan Karang Seke itu sendiri.', '  -6.8297  ', '  105.893342  ', 2),
(987, '   Pantai Binuangeun   ', '   Muara, Kec. Wanasalam, Kabupaten Lebak, Banten 42396    ', 'pantai_binuangeun.png', 'Di Pantai Binuangeun terdapat pelelangan ikan terbesar di Lebak selatan. Aktivitas nelayan setempat menjadikan tempat ini spesial bagi para wisatawan. Aktivitas nelayan merupakan hal menarik di Pantai Binuangeun. Hilir-mudik nelayan selepas mencari ikan atau berangkat melaut menjadi pemandangan biasa di sini. Jual-beli ikan hasil tangkapan nelayan sangat hidup. Binuangeun memang memiliki kekayaan laut yang melimpah.', '   -6.842452   ', '   105.901245   ', 2),
(988, '  Pantai Karang Songsong  ', '  Jl. Kp. Cibobos, Karangkamulyan, Kec. Cihara, Kabupaten Lebak, Banten 42392  ', 'pantai_karang_songsong.png', 'Salah satu pesona Pantai Karang Songsong yakni menawarkan bebatuan karang yang memanjang dan besar hingga ke arah laut. Ini pula yang menjadikan nama pantai ini disebut Songsong. Karena karang yang menyongsong ke arah laut langsung berhadapan dengan kencangnya ombak Laut Jawa bagian selatan. Berada di bagian paling depan membuat karang-karang dipantai ini menjadi objek yang pertama dihempaskan ombak. Percikan air laut inilah yang menjadi daya tarik utama di Pantai Karang Songsong.', '  -6.887878  ', '  106.119196  ', 2),
(989, ' Goa Seribu Candi ', ' Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393  ', 'gao_seribu_candi.png', 'Wisata Gua Seribu Candi di Sawarna Lebak Banten terdapat di belakang pantai menyajikan pemandangan stalagtit dan stalagmit yang indah. Bentuk stalagmit di sini terlihat unik, sekilas mirip stupa yang ada di Candi Borobudur.', ' -6.974771 ', ' 106.291624 ', 4),
(990, ' Goa Lalay ', ' Desa Sawarna, Kec. Bayah, Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393 ', 'gao_lalay.png', 'Wisata Gua Lalay di Sawarna Lebak Banten ini terdapat sebuah tangga alami berupa tanah berlumpur menjadi langkah yang harus ditapaki. Dengan kemiringan mencapai 45 derajat, tangga ini hanya mengandalkan bambu sebagai pegangan. Gua yang memiliki kedalaman 10-15 km ini tidak seperti gua pada umumnya. Jika biasanya gua-gua di Indonesia memiliki dasar yang kering, berbeda dengan Gua lalay. Hampir seluruh isi dalam gua terendam dengan air. Kedalaman air di gua ini bisa mencapai betis orang dewasa. Air yang mengalir di dalam gua diperkirakan dari tetesan yang mengalir deras di dalam Gua Lalay. Air yang mengalir ribuan tahun ini bahkan menjadi bebatuan stalaktit-stalaktit yang cantik di langit-langit gua.', ' -6.979283 ', ' 106.323076 ', 4),
(991, '  Goa Lauk  ', '  Lebaktipar, Kec. Cilograng, Kabupaten Lebak, Banten 42393   ', 'goa_lauk.png', 'Site merupakan gua yang dialiri oleh air sungai yang berkelok-kelok, dan digunakan untuk mengaliri sungai milik warga setempat. Asal usul dari nama gua lauk sendiri berasal dari ditemukannya ikan laut oleh warga di dalam gua. Sumber lainnya menyebutkan bahwa nama lauk berasal dari salah satu ornamen dalam gua yang berbentuk ikan yang dalam bahasa sunda adalah “lauk”. Didalam gua ditemui beberapa sarang burung walet. Ornament khas gua yang ditemui antara lain stalaktit yang menggantung di langit-langit gua', '  -6.954275  ', '  106.331258  ', 4),
(992, '  Goa Wayang  ', '  Cijengkol, Kec. Cilograng, Kabupaten Lebak, Banten 42393   ', 'goa_wayang.png', 'Penamaan goa Wayang lebih berbau mistis dengan cerita-cerita supra natural yang dikaitkan dengan pewayangan, seperti misalnya suara gamelan wayang yang acapkali samar-samar terdengar pada waktu-waktu tertentu.', '  -6.922466  ', '  106.343919  ', 4),
(993, '  Goa Sangiang  ', '  Hariang, Kec. Sobang, Kabupaten Lebak, Banten 42318   ', 'goa_sangiang.png', 'Pemerintah Desa Hariang, Kecamatan Sobang, Kabupaten Lebak saat ini sedang mengembangkan dan melakukan penataan lokasi wisata Goa Sanghiang (Goa Kramat) yang berada di Kampung Cireungit atau sekitar 1,5 kilometer dari pusat desa setempat.', '  -6.634275  ', '  106.272848  ', 4),
(994, '  Air panas Tirta Lebak Buana  ', '  Jl. Raya Rangkasbitung-Bogor Km. 37, Jl. Nasional 1, RW.1, Cipanas, Kec. Cipanas, Kabupaten Lebak, Banten 42372   ', 'tirta_lebak_buana.png', 'Wisata Air Panas Cipanas/Tirta Lebak Buana merupakan tempat permandian air panas umum dengan kondisi air bersuhu ±60oC. terdapat dua sumber mata air panas di lokasi ini, satu diantaranya berada dalam kawasan permandian yang yang lainnya berada di pinggir jalan. Di lokasi terdapat beberapa kolam. Menurut Pembina setempat, umumnya pengunjung menghabiskan hari disini hingga malam hari, kemudian melanjutkan perjalanan ke Gunung Luhur (Negeri datas Awan) tengah malam untuk mengejar sunrise.', '  -6.548716  ', '  106.399434  ', 3),
(995, '  Air Panas Citando  ', '  Senanghati, Kec. Malingping, Kabupaten Lebak, Banten 42391   ', 'citando.png', 'Mata Air Panas Citando berlokasi di area pariwisata yang populer, yang berada dekat perkebunan warga dan merupakan daerah perbukitan. Wisata Air Panas Senanghati di Malingping Lebak Banten atau lebih dikenal dengan Mata Air Panas Citando merupakan salah satu destinasi wisata alam yang menarik dan sangat potensial. Mendengar nama Mata Air Panas Citando mungkin bagi sebagian kita masih terasa asing ditelinga, jangankan untuk dikenal wisatawan asing, bahkan warga sekitaran Malingping pun masih sangat jarang yang menyadari keberadaan sumber mata air panas di Citando ini.   Air Panas Citando ini memiliki air panas dengan suhu diatas 50°C.', '  -6.705274  ', '  105.958107  ', 3),
(996, '  Panorama Cikujang   ', '  Ciginggang, Kec. Gunungkencana, Kabupaten Lebak, Banten 42354  ', 'cikujang.png', 'Terletak di dataran tinggi, Cikujang menawarkan pemandangan cukup indah. Tersedia beberapa spot yang memang digunakan untuk mengundang pelancong berfoto, salah satunya seperti bunga mekar dan tangga kayu. Dengan luas sekitar 5 hektar. Harga tiket masuk Rp. 5000,-', '  -6.538646  ', '  106.037785  ', 5),
(997, '  Negeri Diatas Awan  ', '  Citorek Kidul, Kec. Cibeber, Kabupaten Lebak, Banten 42394   ', 'negeri_diatas_awan.png', 'Wisata alam titik pandang (gugusan awan dan kaldera kompleks gunung api purba) dan wisata minat khusus edukasi geologi. Singkapan batuan di sepanjang lereng Gunung Luhur dan Titik pandang untuk melihat depresi Citorek yang diduga sebuah kaldera. Berdasarkan sejarah geologi, terbentuknya cekungan di sekitar Bayah Dome akibat penerobosan Granodiorit di selatan Bayah. jarak dari Kota Rangkasbitung sekitar ± 77 km.', '  -6.741876  ', '  106.331978  ', 5),
(999, '  Gunung Heas  ', '  Keramatjaya, Kec. Gunungkencana, Kabupaten Lebak, Banten 42354   ', 'gunung_heas.png', 'Air terjun ini bernama Curug Tujuh jadi menurut warga setempat bermaksud ada tujuh undakan.Curug ini masih alami dan untuk mengakses ke tempat ini ekstra penuh kesabaran akan tetapi jika sudah sampai ke lokasi akan terbayar dengan keindahan curug ini.', '  -6.640102  ', '  106.058119  ', 5),
(1000, '  Bukit Sodong  ', '  Cihara, Kec. Cihara, Kabupaten Lebak, Banten 42392  ', 'bukit_sodong.png', 'Site ini merupakan tempat peristirahatan yang berada tepat di pinggir jalan. Lokasinya seakan-akan berada diatas bukit, dimana terdapat persawahan warga pada bagian bawahnya. Tepat di depan persawahan, ditemui pantai berpasir putih. Uniknya, air pantai memiliki 3 warna yaitu kecoklatan, biru muda dan biru tua. Warna kecoklatan ini disebabkan karena adanya sungai yang membawa material sedimen yang bermuara di dekat pantai.', '  -6.869814  ', '  106.092512  ', 5),
(1001, '  Lebak Damar  ', '  Hegarmanah, Kec. Cibeber, Kabupaten Lebak, Banten 42394   ', 'lebak_damar.png', 'Lebak Damar yang merupakan wisata pohon Damar terletak di kawasan Gunung Halimun Salak yang tidak jauh dari wisata alam Kebun Teh Cikuya. Rute menuju wisata Lebak Damar searah dengan wisata alam Kebun Teh Cikuya. Nama Lebak Damar diambil dari tempat yang datar (Lebak) yang banyak ditumbuhi pohon damar di atas keseluruhan luas lahan yang mencapai sekitar 250 hektare.', '  -6.795584  ', '  106.364506  ', 5),
(1003, '  Bukit Senyum  ', '  Sawarna, Kec. Bayah, Kabupaten Lebak, Banten 42393  ', 'bukit_senyum.png', 'Air terjun ini bernama Curug Tujuh jadi menurut warga setempat bermaksud ada tujuh undakan.Curug ini masih alami dan untuk mengakses ke tempat ini ekstra penuh kesabaran akan tetapi jika sudah sampai ke lokasi akan terbayar dengan keindahan curug ini.', '  -6.990602  ', '  106.311679  ', 5),
(1004, '  Panorama Alam Cilebu   ', '  Pasirhaur, Kec. Cipanas, Kabupaten Lebak, Banten 42372  ', 'panorama_cilebu.png', 'Cilebu merupakan nama perkampungan yang berada di kaki Gunung Endut, Desa Pasir Haur, Kecamatan Cipanas, Kabupaten Lebak, Banten. Sesuai dengan julukannya, Cilebu memiliki panorama indah dan asri bak “Negeri di Atas Awan”. Panorama petakan persawahan yang hijau serta hamparan awan putih dapat dinikmati wisatawan saat berkunjung ke perkampungan yang berada di ketinggian mencapai ± 1300 Meter diatas Permukaan Laut (MDPL) ini.', '  -6.599806  ', '  106.347087  ', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `atm`
--
ALTER TABLE `atm`
  ADD PRIMARY KEY (`id_atm`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`idBerita`);

--
-- Indeks untuk tabel `detail_gambar`
--
ALTER TABLE `detail_gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`id_kuliner`);

--
-- Indeks untuk tabel `like_user`
--
ALTER TABLE `like_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id_penginapan`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `spbu`
--
ALTER TABLE `spbu`
  ADD PRIMARY KEY (`id_spbu`);

--
-- Indeks untuk tabel `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_google`
--
ALTER TABLE `users_google`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `atm`
--
ALTER TABLE `atm`
  MODIFY `id_atm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `idBerita` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `detail_gambar`
--
ALTER TABLE `detail_gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kuliner`
--
ALTER TABLE `kuliner`
  MODIFY `id_kuliner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `like_user`
--
ALTER TABLE `like_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penginapan`
--
ALTER TABLE `penginapan`
  MODIFY `id_penginapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `spbu`
--
ALTER TABLE `spbu`
  MODIFY `id_spbu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users_google`
--
ALTER TABLE `users_google`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

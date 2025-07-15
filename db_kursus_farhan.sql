-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2025 pada 03.27
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kursus_farhan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `farhan_admin`
--

CREATE TABLE `farhan_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `farhan_admin`
--

INSERT INTO `farhan_admin` (`id`, `username`, `password`) VALUES
(1, 'dwarves1', '4ce794f5e2e47971ea0c53f463d16b87');

-- --------------------------------------------------------

--
-- Struktur dari tabel `farhan_jadwal`
--

CREATE TABLE `farhan_jadwal` (
  `id` int(11) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `nama_jadwal` varchar(100) DEFAULT NULL,
  `hari` varchar(100) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `farhan_jadwal`
--

INSERT INTO `farhan_jadwal` (`id`, `tanggal_mulai`, `nama_jadwal`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, '2025-08-04', 'Batch Agustus', 'Senin', '08:00:00', '10:00:00'),
(2, '2025-09-01', 'Batch September', 'Senin', '13:00:00', '16:00:00'),
(3, '2025-09-02', 'Batch September', 'Selasa', '16:00:00', '18:00:00'),
(4, '2025-09-03', 'Batch September', 'Rabu', '09:00:00', '11:00:00'),
(5, '2025-09-04', 'Batch September', 'Kamis', '14:00:00', '17:00:00'),
(6, '2025-09-05', 'Batch September', 'Jumat', '08:30:00', '11:00:00'),
(7, '2025-09-01', 'Batch September', 'Senin', '13:30:00', '15:30:00'),
(8, '2025-09-02', 'Batch September', 'Selasa', '09:00:00', '12:00:00'),
(9, '2025-09-03', 'Batch September', 'Rabu', '13:00:00', '15:00:00'),
(10, '2025-09-04', 'Batch September', 'Kamis', '15:30:00', '17:30:00'),
(11, '2025-09-05', 'Batch September', 'Jumat', '08:00:00', '11:00:00'),
(12, '2025-09-01', 'Batch September', 'Senin', '13:00:00', '14:00:00'),
(13, '2025-09-02', 'Batch September', 'Selasa', '14:00:00', '15:00:00'),
(14, '2025-09-03', 'Batch September', 'Rabu', '09:00:00', '12:00:00'),
(15, '2025-09-04', 'Batch September', 'Kamis', '13:00:00', '16:00:00'),
(16, '2025-06-02', 'Batch Juni', 'Senin', '09:00:00', '11:00:00'),
(17, '2025-06-02', 'Batch Juni', 'Senin', '13:00:00', '15:00:00'),
(18, '2025-06-03', 'Batch Juni', 'Selasa', '08:00:00', '11:00:00'),
(19, '2025-06-04', 'Batch Juni', 'Rabu', '09:00:00', '12:00:00'),
(20, '2025-06-05', 'Batch Juni', 'Kamis', '14:00:00', '16:00:00'),
(21, '2025-06-06', 'Batch Juni', 'Jumat', '09:00:00', '12:00:00'),
(22, '2025-05-19', 'Batch Mei', 'Senin', '10:00:00', '12:00:00'),
(23, '2025-05-20', 'Batch Mei', 'Selasa', '13:00:00', '16:00:00'),
(24, '2025-05-21', 'Batch Mei', 'Rabu', '16:00:00', '18:00:00'),
(25, '2025-05-22', 'Batch Mei', 'Kamis', '08:00:00', '10:00:00'),
(26, '2025-06-23', 'Batch Juni', 'Senin', '08:00:00', '11:00:00'),
(27, '2025-06-24', 'Batch Juni', 'Selasa', '13:00:00', '15:00:00'),
(28, '2025-06-25', 'Batch Juni', 'Rabu', '09:00:00', '11:00:00'),
(29, '2025-06-26', 'Batch Juni', 'Kamis', '15:00:00', '18:00:00'),
(30, '2025-06-27', 'Batch Juni', 'Jumat', '09:00:00', '11:00:00'),
(31, '2025-04-07', 'Batch April', 'Senin', '08:00:00', '10:00:00'),
(32, '2025-04-08', 'Batch April', 'Selasa', '13:00:00', '16:00:00'),
(33, '2025-04-09', 'Batch April', 'Rabu', '09:00:00', '11:00:00'),
(34, '2025-04-10', 'Batch April', 'Kamis', '16:00:00', '18:00:00'),
(35, '2025-04-11', 'Batch April', 'Jumat', '09:00:00', '12:00:00'),
(36, '2025-03-03', 'Batch Maret', 'Senin', '14:00:00', '16:00:00'),
(37, '2025-03-04', 'Batch Maret', 'Selasa', '09:00:00', '12:00:00'),
(38, '2025-03-05', 'Batch Maret', 'Rabu', '13:00:00', '15:00:00'),
(39, '2025-02-06', 'Batch Februari', 'Kamis', '08:00:00', '11:00:00'),
(40, '2025-02-07', 'Batch Februari', 'Jumat', '15:00:00', '17:00:00'),
(41, '2025-01-13', 'Batch Januari', 'Senin', '09:00:00', '12:00:00'),
(42, '2025-01-14', 'Batch Januari', 'Selasa', '09:00:00', '12:00:00'),
(43, '2025-01-15', 'Batch Januari', 'Rabu', '09:00:00', '12:00:00'),
(44, '2025-05-01', 'Batch Mei', 'Kamis', '08:00:00', '10:00:00'),
(45, '2025-05-02', 'Batch Mei', 'Jumat', '14:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `farhan_kursus`
--

CREATE TABLE `farhan_kursus` (
  `id` int(11) NOT NULL,
  `nama_kursus` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `level` enum('Beginner','Intermediate','Advance') NOT NULL,
  `durasi` varchar(50) NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `farhan_kursus`
--

INSERT INTO `farhan_kursus` (`id`, `nama_kursus`, `deskripsi`, `harga`, `level`, `durasi`, `gambar`) VALUES
(1, 'Dasar Pemrograman Python untuk Pemula', 'Pelajari fundamental Python dari nol, termasuk variabel, loop, dan fungsi. Cocok untuk yang belum pernah coding sama sekali.', 350000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(2, 'Masterclass JavaScript Modern (ES6+)', 'Dalam-dalam konsep JavaScript modern, asynchronous, dan best practice untuk membangun aplikasi web interaktif.', 750000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(3, 'UI/UX Design dengan Figma', 'Kursus lengkap merancang antarmuka aplikasi mobile dan web yang user-friendly menggunakan Figma, dari wireframe hingga prototipe.', 850000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(4, 'Manajemen Proyek Digital dengan Agile', 'Pelajari metodologi Agile dan Scrum untuk mengelola proyek digital secara efisien, meningkatkan produktivitas tim, dan merilis produk lebih cepat.', 650000, 'Intermediate', '1 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(5, 'Bahasa Inggris untuk Percakapan Bisnis', 'Tingkatkan kepercayaan diri Anda dalam rapat, presentasi, dan negosiasi menggunakan Bahasa Inggris profesional.', 550000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1200&h=675&q=80'),
(6, 'Algoritma dan Struktur Data Lanjutan', 'Kupas tuntas algoritma kompleks dan struktur data untuk persiapan wawancara teknis di perusahaan teknologi terkemuka.', 950000, 'Advance', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(7, 'Dasar Pemasaran Digital (Digital Marketing)', 'Pelajari SEO, SEM, Content Marketing, dan Social Media Marketing untuk meningkatkan visibilitas brand Anda secara online.', 450000, 'Beginner', '2 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(8, 'Fotografi Profesional dengan Smartphone', 'Teknik dan trik mengambil foto berkualitas tinggi hanya dengan menggunakan kamera smartphone Anda, termasuk komposisi dan editing.', 300000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(9, 'Analisis Data dengan SQL dan Tableau', 'Pelajari cara mengambil dan menganalisis data dari database menggunakan SQL, lalu visualisasikan hasilnya dengan Tableau untuk laporan yang insightful.', 900000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(10, 'Pengembangan Diri: Public Speaking Mahir', 'Atasi rasa takut berbicara di depan umum dan sampaikan ide Anda dengan penuh percaya diri dan persuasif.', 400000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(11, 'Musik: Belajar Gitar Akustik dari Nol', 'Kursus ini akan memandu Anda dari cara memegang gitar hingga memainkan lagu-lagu populer dengan kunci dasar.', 250000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(12, 'Sains Data (Data Science) untuk Bisnis', 'Pahami bagaimana data science dapat membantu pengambilan keputusan bisnis, mencakup dasar machine learning dan analisis prediktif.', 1200000, 'Advance', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(13, 'Membuat Aplikasi Android dengan Kotlin', 'Bangun aplikasi Android modern dan fungsional dari awal menggunakan bahasa pemrograman resmi dari Google, Kotlin.', 800000, 'Intermediate', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(14, 'Dasar-dasar Keuangan Pribadi', 'Kelola keuangan Anda dengan lebih baik. Pelajari cara membuat anggaran, berinvestasi, dan merencanakan masa depan finansial.', 200000, 'Beginner', '1 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(15, 'Matematika: Persiapan Ujian Masuk Universitas', 'Review komprehensif materi matematika SMA, termasuk kalkulus, aljabar, dan trigonometri, lengkap dengan soal latihan.', 450000, 'Intermediate', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(16, 'Desain Grafis dengan Adobe Illustrator', 'Buat logo, ikon, dan ilustrasi vektor profesional menggunakan tool paling powerful di industri desain grafis.', 700000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(17, 'Content Writing untuk Website dan Blog', 'Pelajari cara menulis artikel yang menarik, informatif, dan SEO-friendly untuk meningkatkan traffic website Anda.', 350000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(18, 'Keamanan Siber (Cyber Security) Fundamental', 'Pahami ancaman siber dan cara melindungi diri serta organisasi dari serangan digital. Termasuk konsep dasar ethical hacking.', 1100000, 'Advance', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(19, 'Bahasa Jepang Dasar (JLPT N5)', 'Pelajari huruf Hiragana, Katakana, serta pola kalimat dan kosakata dasar untuk percakapan sehari-hari di Jepang.', 500000, 'Beginner', '3 Bulan', 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1200&h=675&q=80'),
(20, 'Manajemen Produk (Product Management)', 'Pelajari siklus hidup produk dari ide, riset pasar, pengembangan, hingga peluncuran. Cocok untuk calon Product Manager.', 950000, 'Intermediate', '2 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(21, 'Pemrograman PHP Lanjutan & Laravel', 'Bangun aplikasi web backend yang robust dan scalable dengan framework PHP paling populer, Laravel.', 750000, 'Advance', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(22, 'Investasi Saham untuk Pemula', 'Pahami cara kerja pasar modal, analisis fundamental & teknikal sederhana, dan mulailah berinvestasi saham dengan percaya diri.', 400000, 'Beginner', '1 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(23, 'Belajar Bahasa Korea (TOPIK 1)', 'Kuasai huruf Hangeul dan tata bahasa dasar Bahasa Korea untuk dapat mengikuti drama tanpa subtitle.', 500000, 'Beginner', '3 Bulan', 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1200&h=675&q=80'),
(24, 'Animasi 3D dengan Blender', 'Buat model dan animasi 3D Anda sendiri dari nol menggunakan software gratis dan open-source, Blender.', 850000, 'Intermediate', '3 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(25, 'Teknik Negosiasi Efektif', 'Pelajari seni negosiasi untuk mencapai kesepakatan yang menguntungkan dalam bisnis maupun kehidupan pribadi.', 350000, 'Intermediate', '1 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(26, 'Dasar Akuntansi untuk Pengusaha', 'Pahami laporan keuangan, arus kas, dan neraca untuk membuat keputusan bisnis yang lebih baik tanpa harus menjadi akuntan.', 450000, 'Beginner', '1 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(27, 'Pengembangan Aplikasi iOS dengan Swift', 'Masuki ekosistem Apple dengan mempelajari cara membuat aplikasi untuk iPhone dan iPad menggunakan bahasa Swift.', 850000, 'Intermediate', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(28, 'Menulis Kreatif: Cerpen dan Novel', 'Asah kemampuan menulis fiksi Anda, mulai dari pengembangan karakter, plot, hingga dialog yang hidup.', 300000, 'Beginner', '2 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(29, 'Machine Learning dengan Python', 'Implementasikan model-model machine learning seperti regresi, klasifikasi, dan clustering menggunakan library Scikit-Learn.', 1300000, 'Advance', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(30, 'Google Ads & SEM Masterclass', 'Optimalkan kampanye iklan Anda di Google Search untuk mendapatkan ROI (Return on Investment) yang maksimal.', 600000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(31, 'Manajemen Waktu dan Produktivitas', 'Stop menunda-nunda pekerjaan. Pelajari teknik untuk fokus, memprioritaskan tugas, dan menyelesaikan lebih banyak hal.', 250000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(32, 'Dasar-dasar Jaringan Komputer (Networking)', 'Pahami bagaimana internet bekerja, mulai dari konsep IP Address, TCP/IP, hingga konfigurasi router sederhana.', 550000, 'Beginner', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(33, 'Matematika Diskrit untuk Ilmu Komputer', 'Pelajari logika, teori himpunan, dan graf yang menjadi fondasi penting dalam dunia ilmu komputer dan pemrograman.', 650000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(34, 'Desain Interior untuk Rumah Minimalis', 'Pelajari prinsip-prinsip desain untuk menata ruang terbatas menjadi hunian yang nyaman, fungsional, dan estetik.', 400000, 'Beginner', '12 Jam Proyek', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(35, 'React.js: Dari Dasar hingga Lanjutan', 'Bangun antarmuka pengguna yang dinamis dan modern dengan library JavaScript paling populer dari Facebook.', 800000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(36, 'Fisika Kuantum: Pengenalan Konsep', 'Jelajahi dunia partikel subatom yang aneh dan menakjubkan. Disampaikan dengan analogi yang mudah dipahami.', 750000, 'Advance', '2 Bulan', 'https://images.unsplash.com/photo-1509228468518-180dd4864904?auto=format&fit=crop&w=1200&h=675&q=80'),
(37, 'Manajemen Stres dan Kesehatan Mental', 'Pelajari teknik relaksasi, mindfulness, dan coping mechanism untuk menjaga kesehatan mental di tengah kesibukan.', 300000, 'Beginner', '1 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(38, 'SEO (Search Engine Optimization) Lanjutan', 'Strategi SEO teknikal, link building, dan content strategy untuk mendominasi halaman pertama Google.', 700000, 'Advance', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(39, 'Bahasa Mandarin HSK 1', 'Mulai perjalanan Anda belajar Bahasa Mandarin dengan menguasai pinyin, nada, dan karakter-karakter dasar.', 550000, 'Beginner', '3 Bulan', 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1200&h=675&q=80'),
(40, 'Database Design & Normalisasi', 'Rancang database yang efisien dan terstruktur. Hindari redundansi data dengan mempelajari teknik normalisasi.', 650000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(41, 'Membuat Game 2D dengan Unity', 'Wujudkan ide game Anda menjadi kenyataan. Pelajari dasar-dasar game development menggunakan Unity engine.', 900000, 'Intermediate', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(42, 'Human Resource (HR) Management', 'Pelajari proses rekrutmen, manajemen talenta, kompensasi, dan hukum ketenagakerjaan untuk menjadi seorang profesional HR.', 600000, 'Intermediate', '2 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(43, 'Cloud Computing dengan AWS', 'Pahami layanan-layanan dasar dari Amazon Web Services (AWS) seperti EC2, S3, dan RDS untuk memulai karir di cloud.', 1000000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(44, 'Seni Rupa: Melukis dengan Cat Air', 'Ekspresikan diri Anda melalui cat air. Pelajari teknik dasar seperti wet-on-wet, gradasi, dan layering.', 350000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(45, 'Pengembangan Backend dengan Node.js & Express', 'Bangun API yang cepat dan efisien menggunakan JavaScript di sisi server dengan Node.js dan framework Express.', 750000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(46, 'Kecerdasan Emosional (Emotional Intelligence)', 'Tingkatkan kemampuan Anda dalam memahami dan mengelola emosi diri sendiri dan orang lain untuk kesuksesan sosial dan profesional.', 400000, 'Beginner', '1 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(47, 'Biologi Molekuler Dasar', 'Pahami proses fundamental dalam sel, seperti replikasi DNA, transkripsi, dan translasi, yang menjadi dasar bioteknologi.', 700000, 'Advance', '2 Bulan', 'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?auto=format&fit=crop&w=1200&h=675&q=80'),
(48, 'Microsoft Excel: Dari Dasar hingga Mahir', 'Maksimalkan penggunaan Excel dengan mempelajari PivotTable, VLOOKUP, dan formula kompleks untuk analisis data.', 500000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(49, 'Kepemimpinan (Leadership) untuk Manajer Baru', 'Pelajari cara mendelegasikan tugas, memberikan feedback, dan memotivasi tim Anda secara efektif.', 650000, 'Intermediate', '1 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(50, 'Pengenalan Blockchain dan Cryptocurrency', 'Pahami teknologi di balik Bitcoin dan aset kripto lainnya, serta potensi dan risikonya.', 800000, 'Advance', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(51, 'Bahasa Arab untuk Pemula', 'Pelajari abjad Arab, penulisan, dan percakapan dasar untuk dapat membaca dan berkomunikasi sederhana.', 450000, 'Beginner', '3 Bulan', 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1200&h=675&q=80'),
(52, 'UI Animation dengan After Effects', 'Hidupkan desain Anda dengan membuat animasi antarmuka yang halus dan interaktif menggunakan Adobe After Effects.', 750000, 'Advance', '2 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(53, 'Dasar-dasar Kimia Organik', 'Memahami struktur, sifat, dan reaksi senyawa berbasis karbon yang menjadi dasar kehidupan dan industri.', 600000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?auto=format&fit=crop&w=1200&h=675&q=80'),
(54, 'Canva untuk Pemasaran Media Sosial', 'Buat konten visual yang menarik untuk Instagram, Facebook, dan platform lainnya dengan cepat dan mudah menggunakan Canva.', 250000, 'Beginner', '1 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(55, 'Filosofi Stoik untuk Kehidupan Modern', 'Temukan ketenangan dan ketangguhan mental dengan mempelajari prinsip-prinsip filsafat Stoik dari para filsuf kuno.', 300000, 'Beginner', '1 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(56, 'Video Editing dengan Adobe Premiere Pro', 'Pelajari cara mengedit video secara profesional, mulai dari memotong klip, grading warna, hingga menambahkan efek suara.', 750000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(57, 'Manajemen Rantai Pasok (Supply Chain)', 'Pahami alur pergerakan barang dari pemasok hingga konsumen untuk efisiensi bisnis yang lebih baik.', 650000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(58, 'Vue.js 3: The Complete Guide', 'Bangun aplikasi web modern dengan framework JavaScript progresif, Vue.js. Mencakup Composition API dan Pinia.', 800000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(59, 'Astronomi 101: Menjelajahi Alam Semesta', 'Kenali planet, bintang, galaksi, dan fenomena alam semesta lainnya dalam kursus pengantar astronomi yang menakjubkan.', 400000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?auto=format&fit=crop&w=1200&h=675&q=80'),
(60, 'Dasar DevOps: Otomatisasi dengan CI/CD', 'Pelajari cara mengotomatiskan proses development dan deployment menggunakan Jenkins dan GitLab CI/CD untuk rilis aplikasi yang lebih cepat dan andal.', 950000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(61, 'Prompt Engineering dengan ChatGPT & Midjourney', 'Kuasai seni membuat prompt yang efektif untuk mendapatkan hasil maksimal dari model AI generatif seperti ChatGPT untuk teks dan Midjourney untuk gambar.', 750000, 'Intermediate', '1 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(62, 'Manajemen Keuangan untuk Startup', 'Pahami cara mengelola burn rate, mencari pendanaan, dan membuat proyeksi keuangan yang solid untuk startup Anda.', 650000, 'Intermediate', '2 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(63, 'Pengenalan Internet of Things (IoT) dengan ESP32', 'Buat proyek IoT pertamamu. Pelajari cara menghubungkan sensor ke internet menggunakan mikrokontroler ESP32.', 800000, 'Beginner', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(64, 'Psikologi Warna dalam Desain dan Branding', 'Pahami bagaimana warna mempengaruhi emosi dan persepsi pengguna untuk menciptakan desain dan brand yang lebih berdampak.', 450000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(65, 'Advanced SQL: Window Functions & CTEs', 'Tingkatkan kemampuan query Anda dengan mempelajari teknik SQL lanjutan yang digunakan untuk analisis data kompleks.', 700000, 'Advance', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(66, 'Creative Writing: Membangun Dunia Fiksi', 'Bagi penulis fiksi, pelajari teknik world-building untuk menciptakan dunia yang imersif dengan sejarah, budaya, dan aturannya sendiri.', 350000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(67, 'Game Development 2D dengan Godot Engine', 'Buat game platformer 2D dari awal menggunakan Godot, game engine open-source yang ringan dan powerful.', 850000, 'Intermediate', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(68, 'UX Research: Metode Wawancara Pengguna', 'Pelajari cara merencanakan dan melakukan wawancara pengguna yang mendalam untuk mendapatkan insight yang valid bagi pengembangan produk.', 600000, 'Intermediate', '1 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(69, 'Data Visualization Storytelling', 'Bukan hanya membuat grafik, tapi bercerita dengan data. Pelajari cara menyajikan data menjadi narasi visual yang persuasif.', 550000, 'Intermediate', '1 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(70, 'Dasar Deep Learning dengan TensorFlow', 'Masuki dunia deep learning dengan membangun jaringan saraf tiruan (neural network) pertamamu menggunakan library TensorFlow dari Google.', 1400000, 'Advance', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(71, 'Bahasa Spanyol untuk Traveler', 'Pelajari frasa dan percakapan esensial dalam Bahasa Spanyol untuk perjalanan Anda ke negara-negara berbahasa Spanyol.', 400000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1200&h=675&q=80'),
(72, 'Manajemen Risiko Proyek', 'Identifikasi, analisis, dan mitigasi risiko yang mungkin muncul dalam proyek Anda untuk memastikan kelancaran dan keberhasilan.', 650000, 'Intermediate', '2 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(73, 'Infrastructure as Code (IaC) dengan Terraform', 'Otomatiskan provisi dan manajemen infrastruktur cloud Anda menggunakan Terraform untuk konsistensi dan skalabilitas.', 1100000, 'Advance', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(74, 'Seni Negosiasi Gaji dan Karier', 'Bekali diri Anda dengan strategi dan kepercayaan diri untuk menegosiasikan gaji, promosi, dan paket kompensasi yang lebih baik.', 350000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(75, 'Pengembangan Aplikasi Cross-Platform dengan React Native', 'Tulis kode sekali, jalankan di Android dan iOS. Pelajari cara membangun aplikasi mobile native dengan React Native.', 950000, 'Intermediate', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(76, 'Teori Musik dan Komposisi Dasar', 'Pahami not balok, harmoni, dan struktur lagu untuk mulai menciptakan komposisi musik orisinal Anda sendiri.', 450000, 'Beginner', '2 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(77, 'Otomatisasi Tugas dengan Python & Selenium', 'Hemat waktu Anda dengan belajar membuat bot untuk mengotomatiskan tugas-tugas repetitif di web, seperti mengisi form atau scraping data.', 600000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(78, 'Dasar-dasar Podcasting: Dari Rekaman hingga Publikasi', 'Pelajari semua yang Anda butuhkan untuk memulai podcast sendiri, termasuk pemilihan alat, teknik rekaman, editing, dan distribusi.', 300000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(79, 'Manajemen Komunitas Online', 'Bangun dan kelola komunitas yang aktif dan suportif di sekitar brand atau produk Anda di berbagai platform media sosial.', 500000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(80, 'Natural Language Processing (NLP) Fundamental', 'Ajarkan komputer untuk memahami bahasa manusia. Pelajari teknik dasar NLP seperti tokenisasi, sentiment analysis, dan text classification.', 1250000, 'Advance', '3 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(81, 'Agile Product Ownership', 'Dalam-dalam peran Product Owner dalam tim Scrum, mulai dari manajemen backlog, penulisan user story, hingga komunikasi dengan stakeholder.', 900000, 'Advance', '2 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(82, 'Personal Branding untuk Profesional', 'Bangun citra profesional Anda secara online dan offline untuk membuka lebih banyak peluang karier dan bisnis.', 450000, 'Intermediate', '1 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(83, 'Docker untuk Developer', 'Pelajari cara mengemas aplikasi Anda dan dependensinya ke dalam container dengan Docker untuk development dan deployment yang konsisten.', 850000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(84, 'Sejarah Seni Dunia: Sebuah Pengantar', 'Jelajahi gerakan-gerakan seni besar dari zaman kuno hingga era modern untuk memperkaya wawasan budaya Anda.', 350000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(85, 'Membangun Toko Online dengan Shopify', 'Luncurkan bisnis e-commerce Anda sendiri dengan mudah. Pelajari cara setup, kustomisasi, dan manajemen toko di platform Shopify.', 400000, 'Beginner', '1 Bulan', 'https://plus.unsplash.com/premium_photo-1705883064233-e56b05f42b07?auto=format&fit=crop&w=1200&h=675&q=80'),
(86, 'Cyber Law dan Etika Digital', 'Pahami aspek hukum dan etika yang berlaku di dunia digital, termasuk privasi data, hak cipta, dan kejahatan siber.', 550000, 'Intermediate', '2 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80'),
(87, 'Bahasa Isyarat Indonesia (BISINDO) Dasar', 'Buka pintu komunikasi baru dengan mempelajari alfabet jari dan isyarat dasar untuk percakapan sehari-hari.', 300000, 'Beginner', '2 Bulan', 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1200&h=675&q=80'),
(88, 'Advanced CSS: Animasi dan Grid Layout', 'Tingkatkan kemampuan frontend Anda dengan menguasai teknik CSS modern seperti Flexbox, Grid, dan keyframe animations.', 650000, 'Advance', '2 Bulan', 'https://images.unsplash.com/photo-1518655048521-f130df041f66?auto=format&fit=crop&w=1200&h=675&q=80'),
(89, 'Sustainable Living: Gaya Hidup Ramah Lingkungan', 'Pelajari langkah-langkah praktis untuk mengurangi jejak karbon dan menerapkan gaya hidup yang lebih berkelanjutan di rumah.', 250000, 'Beginner', '1 Bulan', 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=1200&h=675&q=80');

-- --------------------------------------------------------

--
-- Struktur dari tabel `farhan_kursus_jadwal`
--

CREATE TABLE `farhan_kursus_jadwal` (
  `id` int(11) NOT NULL,
  `kursus_id` int(11) DEFAULT NULL,
  `jadwal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `farhan_kursus_jadwal`
--

INSERT INTO `farhan_kursus_jadwal` (`id`, `kursus_id`, `jadwal_id`) VALUES
(1, 88, 43),
(2, 65, 20),
(3, 81, 36),
(4, 6, 6),
(5, 9, 9),
(6, 24, 24),
(7, 59, 14),
(8, 51, 6),
(9, 5, 5),
(10, 87, 42),
(11, 19, 19),
(12, 39, 39),
(13, 71, 26),
(14, 23, 23),
(15, 47, 2),
(16, 54, 9),
(17, 43, 43),
(18, 17, 17),
(19, 66, 21),
(20, 86, 41),
(21, 26, 26),
(22, 70, 25),
(23, 60, 15),
(24, 7, 7),
(25, 1, 1),
(26, 32, 32),
(27, 14, 14),
(28, 53, 8),
(29, 78, 33),
(30, 69, 24),
(31, 40, 40),
(32, 16, 16),
(33, 34, 34),
(34, 83, 38),
(35, 55, 10),
(36, 36, 36),
(37, 8, 8),
(38, 67, 22),
(39, 30, 30),
(40, 42, 42),
(41, 73, 28),
(42, 22, 22),
(43, 18, 18),
(44, 46, 1),
(45, 49, 4),
(46, 29, 29),
(47, 62, 17),
(48, 79, 34),
(49, 20, 20),
(50, 4, 4),
(51, 57, 12),
(52, 72, 27),
(53, 37, 37),
(54, 31, 31),
(55, 2, 2),
(56, 33, 33),
(57, 15, 15),
(58, 85, 40),
(59, 13, 13),
(60, 41, 41),
(61, 28, 28),
(62, 48, 3),
(63, 11, 11),
(64, 80, 35),
(65, 77, 32),
(66, 21, 21),
(67, 75, 30),
(68, 27, 27),
(69, 45, 45),
(70, 10, 10),
(71, 50, 5),
(72, 63, 18),
(73, 82, 37),
(74, 61, 16),
(75, 64, 19),
(76, 35, 35),
(77, 12, 12),
(78, 84, 39),
(79, 74, 29),
(80, 44, 44),
(81, 38, 38),
(82, 89, 44),
(83, 25, 25),
(84, 76, 31),
(85, 52, 7),
(86, 3, 3),
(87, 68, 23),
(88, 56, 11),
(89, 58, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `farhan_pendaftaran`
--

CREATE TABLE `farhan_pendaftaran` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kursus_jadwal_id` int(11) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status_pendaftaran` enum('Menunggu','Diterima','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `farhan_pendaftaran`
--

INSERT INTO `farhan_pendaftaran` (`id`, `user_id`, `kursus_jadwal_id`, `tanggal_daftar`, `bukti_pembayaran`, `status_pendaftaran`) VALUES
(1, 1, 1, '2025-07-13 13:48:24', 'bukti-1-1752407724.jpg', 'Diterima'),
(2, 2, 1, '2025-07-13 13:48:24', 'bukti-2-1752407967.jpg', 'Diterima'),
(3, 3, 1, '2025-07-13 13:50:25', 'bukti-3-1752408078.png', 'Diterima'),
(4, 1, 21, '2025-07-13 13:50:49', 'bukti-1-1752407724.jpg', 'Diterima'),
(5, 2, 21, '2025-07-13 13:51:17', 'bukti-2-1752407967.jpg', 'Diterima'),
(6, 3, 21, '2025-07-13 13:51:17', 'bukti-3-1752408078.png', 'Diterima'),
(7, 1, 9, '2025-07-13 13:55:24', 'bukti-1-1752407724.jpg', 'Diterima'),
(8, 1, 86, '2025-07-13 13:58:00', 'bukti-1-1752407880.jpg', 'Menunggu'),
(9, 1, 55, '2025-07-13 13:58:16', 'bukti-1-1752407896.jpg', 'Ditolak'),
(10, 2, 37, '2025-07-13 13:59:27', 'bukti-2-1752407967.jpg', 'Diterima'),
(11, 2, 89, '2025-07-13 13:59:40', 'bukti-2-1752407980.jpg', 'Menunggu'),
(12, 2, 16, '2025-07-13 13:59:52', 'bukti-2-1752407992.jpg', 'Ditolak'),
(13, 3, 85, '2025-07-13 14:01:18', 'bukti-3-1752408078.png', 'Diterima'),
(14, 3, 70, '2025-07-13 14:01:29', 'bukti-3-1752408089.png', 'Menunggu'),
(15, 3, 4, '2025-07-13 14:01:43', 'bukti-3-1752408103.png', 'Ditolak'),
(16, 1, 15, '2025-07-13 14:54:46', 'bukti-1-1752411286.jpg', 'Ditolak'),
(17, 1, 28, '2025-07-13 14:55:16', 'bukti-1-1752411316.jpg', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `farhan_user`
--

CREATE TABLE `farhan_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `akun_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `farhan_user`
--

INSERT INTO `farhan_user` (`id`, `nama`, `email`, `password`, `no_hp`, `foto_profil`, `akun_dibuat`) VALUES
(1, 'Azz', 'azz@gmail.com', '07d0e49bc139bcca9d0df1f1304c6360', '11111', 'user-1-1752405305.jpg', '2025-07-13 12:23:59'),
(2, 'Rapipi', 'rapipi@gmail.com', 'e4dccd89eb3bf9d99e244215d3b3a507', '22222', 'user-2-1752405980.jpg', '2025-07-13 18:16:45'),
(3, 'Smol White', 'snow@gmail.com', '0923a3c700bba6757e5aacaea0e2097f', '33333', 'user-3-1752406036.png', '2025-07-13 18:17:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `farhan_admin`
--
ALTER TABLE `farhan_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `farhan_jadwal`
--
ALTER TABLE `farhan_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `farhan_kursus`
--
ALTER TABLE `farhan_kursus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_kursus` (`nama_kursus`);

--
-- Indeks untuk tabel `farhan_kursus_jadwal`
--
ALTER TABLE `farhan_kursus_jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kursus_id` (`kursus_id`),
  ADD KEY `jadwal_id` (`jadwal_id`);

--
-- Indeks untuk tabel `farhan_pendaftaran`
--
ALTER TABLE `farhan_pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_jadwal_unik` (`user_id`,`kursus_jadwal_id`),
  ADD KEY `fk_pendaftaran_kursus_jadwal` (`kursus_jadwal_id`);

--
-- Indeks untuk tabel `farhan_user`
--
ALTER TABLE `farhan_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `farhan_admin`
--
ALTER TABLE `farhan_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `farhan_jadwal`
--
ALTER TABLE `farhan_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `farhan_kursus`
--
ALTER TABLE `farhan_kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `farhan_kursus_jadwal`
--
ALTER TABLE `farhan_kursus_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `farhan_pendaftaran`
--
ALTER TABLE `farhan_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `farhan_user`
--
ALTER TABLE `farhan_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `farhan_admin`
--
ALTER TABLE `farhan_admin`
  ADD CONSTRAINT `farhan_admin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `farhan_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `farhan_kursus_jadwal`
--
ALTER TABLE `farhan_kursus_jadwal`
  ADD CONSTRAINT `farhan_kursus_jadwal_ibfk_1` FOREIGN KEY (`kursus_id`) REFERENCES `farhan_kursus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `farhan_kursus_jadwal_ibfk_2` FOREIGN KEY (`jadwal_id`) REFERENCES `farhan_jadwal` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `farhan_pendaftaran`
--
ALTER TABLE `farhan_pendaftaran`
  ADD CONSTRAINT `fk_pendaftaran_kursus_jadwal` FOREIGN KEY (`kursus_jadwal_id`) REFERENCES `farhan_kursus_jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pendaftaran_user` FOREIGN KEY (`user_id`) REFERENCES `farhan_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

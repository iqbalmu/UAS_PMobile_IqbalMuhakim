-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2024 at 01:54 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_outpatient`
--

-- --------------------------------------------------------

--
-- Table structure for table `admisis`
--

CREATE TABLE `admisis` (
  `id_admisi` int UNSIGNED NOT NULL,
  `foto` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `antrians`
--

CREATE TABLE `antrians` (
  `id_antrian` int UNSIGNED NOT NULL,
  `mrn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poli_id` int UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `nomor` int UNSIGNED NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apotekers`
--

CREATE TABLE `apotekers` (
  `id_apoteker` int UNSIGNED NOT NULL,
  `nomor_sip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id_dokter` int UNSIGNED NOT NULL,
  `nomor_str` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_sip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialisasi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `poli_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokters`
--

INSERT INTO `dokters` (`id_dokter`, `nomor_str`, `nomor_sip`, `foto`, `spesialisasi`, `user_id`, `poli_id`, `created_at`, `updated_at`) VALUES
(1, '123456789012345', '123456789012345', 'sample.png', 'Bedah Hati', 4, 1, '2024-05-07 23:53:48', '2024-05-07 23:53:48'),
(2, '123456789012345', '123456789012345', 'sample.png', 'Bedah Hati', 5, 1, '2024-05-07 23:53:49', '2024-05-07 23:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_prakteks`
--

CREATE TABLE `jadwal_prakteks` (
  `id_jadwal` int UNSIGNED NOT NULL,
  `hari` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `dokter_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_roles_table', 1),
(2, '2014_10_12_000002_create_users_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_03_04_083804_create_polis_table', 1),
(5, '2024_03_05_202100_create_obats_table', 1),
(6, '2024_03_05_202114_create_pasiens_table', 1),
(7, '2024_03_05_202131_create_dokters_table', 1),
(8, '2024_03_05_202249_create_antrians_table', 1),
(9, '2024_03_05_202317_create_reseps_table', 1),
(10, '2024_03_05_202322_create_resep_details_table', 1),
(11, '2024_03_05_202323_create_pemeriksaan_table', 1),
(12, '2024_03_05_202325_create_rekam_mediks_table', 1),
(13, '2024_03_05_202329_create_pembayarans_table', 1),
(14, '2024_03_23_211303_create_jadwal_prakteks_table', 1),
(15, '2024_05_03_221805_create_apotekers_table', 1),
(16, '2024_05_03_221810_create_admisis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obats`
--

CREATE TABLE `obats` (
  `id_obat` int UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `stok` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyedia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kadaluarsa` date NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obats`
--

INSERT INTO `obats` (`id_obat`, `nama`, `kategori`, `harga`, `stok`, `penyedia`, `keterangan`, `kadaluarsa`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'obat 1', 'cat 1', 1000, 'tersedia', 'PT. PNP', NULL, '2025-12-12', 4, NULL, NULL),
(2, 'obat 2', 'cat 2', 1000, 'tersedia', 'PT. PNP', NULL, '2025-12-12', 4, NULL, NULL),
(3, 'obat 3', 'cat 3', 1000, 'tersedia', 'PT. PNP', NULL, '2025-12-12', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id_pasien` int UNSIGNED NOT NULL,
  `mrn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profesi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id_pasien`, `mrn`, `nik`, `jenis_kelamin`, `alamat`, `profesi`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'RM-20240508065349', '1234567890123456', 'L', 'Padang', 'Mahasiswa', 6, '2024-05-07 23:53:49', '2024-05-07 23:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id_pembayaran` int UNSIGNED NOT NULL,
  `total_harga` int NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekam_medik_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaans`
--

CREATE TABLE `pemeriksaans` (
  `id_pemeriksaan` int UNSIGNED NOT NULL,
  `suhu` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tekanan_darah` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nadi` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pernapasan` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi` int DEFAULT NULL,
  `berat` int DEFAULT NULL,
  `laboratorium` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rontgen` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctscan` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usg` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mri` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polis`
--

CREATE TABLE `polis` (
  `id_poli` int UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polis`
--

INSERT INTO `polis` (`id_poli`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'umum', 'poliklinik umum', NULL, NULL),
(2, 'gizi', 'poliklinik gizi', NULL, NULL),
(3, 'bedah', 'poliklinik bedah', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rekam_mediks`
--

CREATE TABLE `rekam_mediks` (
  `id_rekam_medik` int UNSIGNED NOT NULL,
  `mrn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan_utama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `riwayat_kesehatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riwayat_obat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penatalaksanaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan_dokter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokter_id` int UNSIGNED NOT NULL,
  `pemeriksaan_id` int UNSIGNED NOT NULL,
  `resep_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reseps`
--

CREATE TABLE `reseps` (
  `id_resep` int UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum dibayar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resep_details`
--

CREATE TABLE `resep_details` (
  `id_resep_detail` int UNSIGNED NOT NULL,
  `resep_id` int UNSIGNED NOT NULL,
  `obat_id` int UNSIGNED NOT NULL,
  `dosis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frekuensi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int UNSIGNED NOT NULL,
  `roles` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `roles`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'admisi', NULL, NULL),
(3, 'dokter', NULL, NULL),
(4, 'apoteker', NULL, NULL),
(5, 'pasien', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_aktif` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `role_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `nama`, `nomor_hp`, `status_aktif`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '$2y$12$LyMc06c5.iqxmHqov5OpW./aXjUfxvjryDZh4TPgRF37qObWSx8dq', 'admin', '089898989898', 'aktif', 1, NULL, NULL),
(2, 'admisi@admisi.com', '$2y$12$0o.FYvyRCg0key1jes3ZOeeyQ0z2iWgHEL3VHAZ2IQMnRQmNTpJHu', 'admisi', '088989898923', 'aktif', 2, NULL, NULL),
(3, 'apoteker@apoteker.com', '$2y$12$2w8QxXeSHku8/oMpQB4NMeu4ogv8SurIGjBSbViQM2La0z3Hy3rM2', 'apoteker', '081234245323', 'aktif', 4, NULL, NULL),
(4, 'dokter@dokter.com', '$2y$12$H2yqN.SnMlJYtSEcBEyu/uiBCAcm6spLOImbwpE3YUF4b4kFRYs82', 'Dr. Muhakim', '088942123421', 'aktif', 3, '2024-05-07 23:53:48', '2024-05-07 23:53:48'),
(5, 'dokter2@dokter.com', '$2y$12$Qt9P7JR3j800tbciR/.jNeXQhVLQgOY48b6oeVZrNfBNhB8OWbkX2', 'Dr. Joko', '088942123400', 'aktif', 3, '2024-05-07 23:53:49', '2024-05-07 23:53:49'),
(6, 'pasien@pasien.com', '$2y$12$sKmnacU8hDBu7jdrTC4l.uzbTA2csc6k.LpaGFBrmUBzYtNqms5JO', 'pasien satu', '084356532342', 'aktif', 5, '2024-05-07 23:53:49', '2024-05-07 23:53:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admisis`
--
ALTER TABLE `admisis`
  ADD PRIMARY KEY (`id_admisi`),
  ADD KEY `admisis_user_id_foreign` (`user_id`);

--
-- Indexes for table `antrians`
--
ALTER TABLE `antrians`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `antrians_poli_id_foreign` (`poli_id`),
  ADD KEY `antrians_mrn_foreign` (`mrn`);

--
-- Indexes for table `apotekers`
--
ALTER TABLE `apotekers`
  ADD PRIMARY KEY (`id_apoteker`),
  ADD KEY `apotekers_user_id_foreign` (`user_id`);

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `dokters_poli_id_foreign` (`poli_id`),
  ADD KEY `dokters_user_id_foreign` (`user_id`);

--
-- Indexes for table `jadwal_prakteks`
--
ALTER TABLE `jadwal_prakteks`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `jadwal_prakteks_dokter_id_foreign` (`dokter_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `obats_user_id_foreign` (`user_id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `pasiens_mrn_unique` (`mrn`),
  ADD KEY `pasiens_user_id_foreign` (`user_id`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayarans_rekam_medik_id_foreign` (`rekam_medik_id`);

--
-- Indexes for table `pemeriksaans`
--
ALTER TABLE `pemeriksaans`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `polis`
--
ALTER TABLE `polis`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `rekam_mediks`
--
ALTER TABLE `rekam_mediks`
  ADD PRIMARY KEY (`id_rekam_medik`),
  ADD KEY `rekam_mediks_mrn_foreign` (`mrn`),
  ADD KEY `rekam_mediks_dokter_id_foreign` (`dokter_id`),
  ADD KEY `rekam_mediks_pemeriksaan_id_foreign` (`pemeriksaan_id`),
  ADD KEY `rekam_mediks_resep_id_foreign` (`resep_id`);

--
-- Indexes for table `reseps`
--
ALTER TABLE `reseps`
  ADD PRIMARY KEY (`id_resep`),
  ADD UNIQUE KEY `reseps_kode_unique` (`kode`);

--
-- Indexes for table `resep_details`
--
ALTER TABLE `resep_details`
  ADD PRIMARY KEY (`id_resep_detail`),
  ADD KEY `resep_details_obat_id_foreign` (`obat_id`),
  ADD KEY `resep_details_resep_id_foreign` (`resep_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admisis`
--
ALTER TABLE `admisis`
  MODIFY `id_admisi` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `antrians`
--
ALTER TABLE `antrians`
  MODIFY `id_antrian` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apotekers`
--
ALTER TABLE `apotekers`
  MODIFY `id_apoteker` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id_dokter` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_prakteks`
--
ALTER TABLE `jadwal_prakteks`
  MODIFY `id_jadwal` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `obats`
--
ALTER TABLE `obats`
  MODIFY `id_obat` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id_pasien` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id_pembayaran` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemeriksaans`
--
ALTER TABLE `pemeriksaans`
  MODIFY `id_pemeriksaan` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polis`
--
ALTER TABLE `polis`
  MODIFY `id_poli` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rekam_mediks`
--
ALTER TABLE `rekam_mediks`
  MODIFY `id_rekam_medik` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reseps`
--
ALTER TABLE `reseps`
  MODIFY `id_resep` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resep_details`
--
ALTER TABLE `resep_details`
  MODIFY `id_resep_detail` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admisis`
--
ALTER TABLE `admisis`
  ADD CONSTRAINT `admisis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `antrians`
--
ALTER TABLE `antrians`
  ADD CONSTRAINT `antrians_mrn_foreign` FOREIGN KEY (`mrn`) REFERENCES `pasiens` (`mrn`) ON DELETE CASCADE,
  ADD CONSTRAINT `antrians_poli_id_foreign` FOREIGN KEY (`poli_id`) REFERENCES `polis` (`id_poli`) ON DELETE CASCADE;

--
-- Constraints for table `apotekers`
--
ALTER TABLE `apotekers`
  ADD CONSTRAINT `apotekers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `dokters`
--
ALTER TABLE `dokters`
  ADD CONSTRAINT `dokters_poli_id_foreign` FOREIGN KEY (`poli_id`) REFERENCES `polis` (`id_poli`) ON DELETE CASCADE,
  ADD CONSTRAINT `dokters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal_prakteks`
--
ALTER TABLE `jadwal_prakteks`
  ADD CONSTRAINT `jadwal_prakteks_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokters` (`id_dokter`) ON DELETE CASCADE;

--
-- Constraints for table `obats`
--
ALTER TABLE `obats`
  ADD CONSTRAINT `obats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD CONSTRAINT `pasiens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_rekam_medik_id_foreign` FOREIGN KEY (`rekam_medik_id`) REFERENCES `rekam_mediks` (`id_rekam_medik`) ON DELETE CASCADE;

--
-- Constraints for table `rekam_mediks`
--
ALTER TABLE `rekam_mediks`
  ADD CONSTRAINT `rekam_mediks_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokters` (`id_dokter`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekam_mediks_mrn_foreign` FOREIGN KEY (`mrn`) REFERENCES `pasiens` (`mrn`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekam_mediks_pemeriksaan_id_foreign` FOREIGN KEY (`pemeriksaan_id`) REFERENCES `pemeriksaans` (`id_pemeriksaan`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekam_mediks_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `reseps` (`id_resep`) ON DELETE CASCADE;

--
-- Constraints for table `resep_details`
--
ALTER TABLE `resep_details`
  ADD CONSTRAINT `resep_details_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `obats` (`id_obat`) ON DELETE CASCADE,
  ADD CONSTRAINT `resep_details_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `reseps` (`id_resep`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

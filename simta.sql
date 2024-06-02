-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2024 pada 16.23
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(15) NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nip`, `id_users`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '105101', 1, NULL, '2024-05-26 19:44:53', '2024-05-26 19:44:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_acara`
--

CREATE TABLE `berita_acara` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judulTA` varchar(255) NOT NULL,
  `tanggalBA` date NOT NULL,
  `catatanBA` text NOT NULL,
  `status` enum('submitted','approved','rejected') NOT NULL DEFAULT 'submitted',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(15) NOT NULL,
  `tandaTangan` varchar(255) DEFAULT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `tandaTangan`, `id_users`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '105201', NULL, 2, NULL, '2024-05-26 19:44:53', '2024-05-26 19:44:53'),
(2, '105202', NULL, 4, NULL, '2024-05-26 19:45:56', '2024-05-26 19:45:56'),
(3, '105203', NULL, 14, NULL, '2024-05-27 09:24:55', '2024-05-27 09:24:55'),
(4, '105204', NULL, 15, NULL, '2024-05-27 09:25:27', '2024-05-27 09:25:27'),
(5, '105205', NULL, 16, NULL, '2024-05-27 09:25:59', '2024-05-27 09:25:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_pembimbing`
--

CREATE TABLE `dosen_pembimbing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dosen` bigint(20) UNSIGNED NOT NULL,
  `id_log_bimbingan` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_pembimbing_m_h_s`
--

CREATE TABLE `dosen_pembimbing_m_h_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dosen` bigint(20) UNSIGNED DEFAULT NULL,
  `id_mahasiswa` bigint(20) UNSIGNED NOT NULL,
  `tipe` enum('pembimbing1','pembimbing2','penguji1','penguji2','penguji3') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen_pembimbing_m_h_s`
--

INSERT INTO `dosen_pembimbing_m_h_s` (`id`, `id_dosen`, `id_mahasiswa`, `tipe`, `created_at`, `updated_at`) VALUES
(6, 2, 9, 'pembimbing1', '2024-05-28 21:56:49', '2024-05-28 21:56:49'),
(7, NULL, 9, 'pembimbing2', '2024-05-28 21:56:49', '2024-05-28 21:56:49'),
(8, NULL, 9, 'penguji1', '2024-05-28 21:56:49', '2024-05-28 21:56:49'),
(9, NULL, 9, 'penguji2', '2024-05-28 21:56:49', '2024-05-28 21:56:49'),
(10, NULL, 9, 'penguji3', '2024-05-28 21:56:49', '2024-05-28 21:56:49'),
(11, 1, 1, 'pembimbing1', '2024-05-28 22:09:09', '2024-05-28 22:09:09'),
(12, 2, 1, 'pembimbing2', '2024-05-28 22:09:09', '2024-05-28 22:09:09'),
(13, 3, 1, 'penguji1', '2024-05-28 22:09:09', '2024-05-28 22:09:09'),
(14, NULL, 1, 'penguji2', '2024-05-28 22:09:09', '2024-05-28 22:09:09'),
(15, NULL, 1, 'penguji3', '2024-05-28 22:09:09', '2024-05-28 22:09:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi_sidang`
--

CREATE TABLE `informasi_sidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dosen` bigint(20) UNSIGNED NOT NULL,
  `id_RubrikPembimbing` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_sidang`
--

CREATE TABLE `jenis_sidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_BeritaAcara` bigint(20) UNSIGNED NOT NULL,
  `id_InformasiSidang` bigint(20) UNSIGNED NOT NULL,
  `Nama_sidang` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_bimbingan`
--

CREATE TABLE `log_bimbingan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mahasiswa` bigint(20) UNSIGNED NOT NULL,
  `tanggal_bimbingan` date NOT NULL,
  `catatan_bimbingan` text NOT NULL,
  `action_plan` text NOT NULL,
  `status` enum('submitted','approved','rejected') NOT NULL DEFAULT 'submitted',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(15) NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `id_users`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '105220001', 3, NULL, '2024-05-26 19:44:53', '2024-05-26 19:44:53'),
(9, '105200', 12, NULL, '2024-05-27 09:21:53', '2024-05-27 09:21:53'),
(10, '105220003', 13, NULL, '2024-05-27 09:24:18', '2024-05-27 09:24:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_26_141857_create_tabel_mahasiswa', 1),
(6, '2024_05_26_142343_create_dosen_table', 1),
(7, '2024_05_26_142421_create_admin_table', 1),
(8, '2024_05_26_142657_create_log_bimbingan_table', 1),
(9, '2024_05_26_143150_create_dosen_pembimbing_table', 1),
(10, '2024_05_26_143807_create__berita_acara_table', 1),
(11, '2024_05_26_143928_create__jenis_sidang_table', 1),
(12, '2024_05_26_144046_create__informasi_sidang_table', 1),
(13, '2024_05_26_144139_create__rubrik_penilaian_table', 1),
(14, '2024_05_26_163336_create_dosen_pembimbing_m_h_s_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rubrik_penilaian`
--

CREATE TABLE `rubrik_penilaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dosen` bigint(20) UNSIGNED NOT NULL,
  `pembimbing1_nilaiSidang` decimal(5,2) NOT NULL,
  `pembimbing1_nilaiBimbingan` decimal(5,2) NOT NULL,
  `pembimbing2_nilaiSidang` decimal(5,2) NOT NULL,
  `pembimbing2_nilaiBimbingan` decimal(5,2) NOT NULL,
  `nilai_penguji1` decimal(5,2) NOT NULL,
  `nilai_penguji2` decimal(5,2) NOT NULL,
  `nilai_penguji3` decimal(5,2) NOT NULL,
  `bobot` decimal(5,2) NOT NULL,
  `nilaiDGNBobot` decimal(5,2) NOT NULL,
  `totalNilaiAkhir` decimal(5,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','dosen','mahasiswa') NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '105101', 'admin1@gmail.com', NULL, '$2y$10$ze/MbcYVbRttfwXZt9pUAucROT9w4JHGUTw.W99A30l2Qwgir3p8u', 'admin', NULL, '2024-05-26 19:44:53', '2024-05-26 19:44:53'),
(2, 'Dosen 1', '105201', 'dosen1@gmail.com', NULL, '$2y$10$p1fDk5f0iKpiycuyHqqoZOuE6NkONiM2mGBcxBX65IR9ANkdQmXRS', 'dosen', NULL, '2024-05-26 19:44:53', '2024-05-26 19:44:53'),
(3, 'Mahasiswa 1', '105220001', 'mahasiswa1@gmail.com', NULL, '$2y$10$SUgK1pmNulsCmidWXcXxbOQto5DZytup2QUNZ22jlf9h/SL7BPzpW', 'mahasiswa', NULL, '2024-05-26 19:44:53', '2024-05-26 19:44:53'),
(4, 'Dosen 2', '105202', 'd2@gmail.com', NULL, '$2y$10$ia1nRu8jaXH7xWEHN68BEeHixVoC8tOFJAG0OtbLtbLNpJLueYTJS', 'dosen', NULL, '2024-05-26 19:45:56', '2024-05-26 19:45:56'),
(12, 'mahasiswa2', '105220002', 'test@test.com', NULL, '$2y$10$ygS06NndgwLRqDKpiAtVNuHNYWz.Zchjgs1DooohH53Or5B4B1JF2', 'mahasiswa', NULL, '2024-05-27 09:21:53', '2024-05-27 09:23:46'),
(13, 'mahasiswa3', '105220003', 'm3@gmail.com', NULL, '$2y$10$KhwAb3RkVQrjp5hRwupTbun2RvZw40i9evtdXM5ka1oMSqevi11.a', 'mahasiswa', NULL, '2024-05-27 09:24:18', '2024-05-27 09:24:18'),
(14, 'Dosen3', '105203', 'd3@gmail.com', NULL, '$2y$10$m.itx2Oe3sGdJX7fAiBa9eoxbQftrfKDSlz2etqCt3StLyyv5ptzO', 'dosen', NULL, '2024-05-27 09:24:55', '2024-05-27 09:24:55'),
(15, 'Dosen4', '105204', 'd4@gmail.com', NULL, '$2y$10$f9yqkZv0HFxGeiK.bQuN9.AjPQExZ0K8BYSuo4MH5enTQLGuXPY12', 'dosen', NULL, '2024-05-27 09:25:27', '2024-05-27 09:25:27'),
(16, 'Dosen5', '105205', 'd5@gmail.com', NULL, '$2y$10$l5JT0Dikgto4eIa8RMXQHuYZko2AY67DLNydyvEuv1h6qB1TZGM.m', 'dosen', NULL, '2024-05-27 09:25:59', '2024-05-27 09:25:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_nip_unique` (`nip`),
  ADD KEY `admin_deleted_at_index` (`deleted_at`);

--
-- Indeks untuk tabel `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_acara_deleted_at_index` (`deleted_at`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_nip_unique` (`nip`),
  ADD KEY `dosen_deleted_at_index` (`deleted_at`);

--
-- Indeks untuk tabel `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_pembimbing_deleted_at_index` (`deleted_at`);

--
-- Indeks untuk tabel `dosen_pembimbing_m_h_s`
--
ALTER TABLE `dosen_pembimbing_m_h_s`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `informasi_sidang`
--
ALTER TABLE `informasi_sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informasi_sidang_deleted_at_index` (`deleted_at`);

--
-- Indeks untuk tabel `jenis_sidang`
--
ALTER TABLE `jenis_sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_sidang_deleted_at_index` (`deleted_at`);

--
-- Indeks untuk tabel `log_bimbingan`
--
ALTER TABLE `log_bimbingan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_bimbingan_deleted_at_index` (`deleted_at`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  ADD KEY `mahasiswa_deleted_at_index` (`deleted_at`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rubrik_penilaian`
--
ALTER TABLE `rubrik_penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rubrik_penilaian_deleted_at_index` (`deleted_at`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berita_acara`
--
ALTER TABLE `berita_acara`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dosen_pembimbing_m_h_s`
--
ALTER TABLE `dosen_pembimbing_m_h_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `informasi_sidang`
--
ALTER TABLE `informasi_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_sidang`
--
ALTER TABLE `jenis_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_bimbingan`
--
ALTER TABLE `log_bimbingan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rubrik_penilaian`
--
ALTER TABLE `rubrik_penilaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

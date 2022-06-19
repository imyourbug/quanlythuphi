-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 19, 2022 lúc 07:17 AM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlythuphi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `departments`
--

CREATE TABLE `departments` (
  `MaKhoa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenKhoa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `departments`
--

INSERT INTO `departments` (`MaKhoa`, `TenKhoa`, `created_at`, `updated_at`) VALUES
('CNTT', 'Công nghệ thông tin', '2022-06-17 08:52:59', '2022-06-17 08:52:59'),
('KTXD', 'Kỹ thuật - Xây dựng', '2022-06-17 08:53:08', '2022-06-17 08:53:08'),
('QTKD', 'Quản trị kinh doanh', '2022-06-17 08:53:04', '2022-06-17 08:53:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TenDT` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MienGiam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discounts`
--

INSERT INTO `discounts` (`id`, `TenDT`, `MienGiam`, `created_at`, `updated_at`) VALUES
(1, 'Không', 0, '2022-06-17 08:52:24', '2022-06-17 08:52:24'),
(2, 'Hộ nghèo', 10, '2022-06-17 08:52:29', '2022-06-17 08:52:29'),
(3, 'Cận nghèo', 5, '2022-06-17 08:52:34', '2022-06-17 08:52:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lops`
--

CREATE TABLE `lops` (
  `MaLop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenLop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SiSo` int(11) NOT NULL,
  `Khoa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lops`
--

INSERT INTO `lops` (`MaLop`, `TenLop`, `SiSo`, `Khoa`, `created_at`, `updated_at`) VALUES
('70DCTT21', '70DCTT21', 45, 'CNTT', '2022-06-17 08:53:19', '2022-06-17 08:53:19'),
('70DCTT22', '70DCTT22', 45, 'CNTT', '2022-06-17 08:53:19', '2022-06-17 08:53:19'),
('70DCTT23', '70DCTT23', 45, 'CNTT', '2022-06-17 08:53:19', '2022-06-17 08:53:19'),
('70DCTT24', '70DCTT24', 45, 'CNTT', '2022-06-17 08:53:19', '2022-06-17 08:53:19'),
('70DCTT25', '70DCTT25', 45, 'CNTT', '2022-06-17 08:53:19', '2022-06-17 08:53:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2022_04_09_154544_create_subjects_table', 1),
(18, '2022_04_10_031928_create_departments_table', 1),
(19, '2022_04_10_152257_create_discounts_table', 1),
(20, '2022_04_11_044104_create_lops_table', 1),
(21, '2022_04_11_135330_create_students_table', 1),
(22, '2022_04_16_094627_create_receipts_table', 1),
(23, '2022_04_22_075037_create_regis_subjects_table', 1),
(24, '2022_04_29_132753_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MaSV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenNT` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoTienNop` decimal(18,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `receipts`
--

INSERT INTO `receipts` (`id`, `MaSV`, `TenNT`, `SoTienNop`, `created_at`, `updated_at`) VALUES
(3, '70DCTT21001', 'Techcombank', '120000', '2022-06-17 09:34:56', '2022-06-17 09:34:56'),
(4, '70DCTT21002', 'Techcombank', '120000', '2022-06-18 18:41:24', '2022-06-18 18:41:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `regis_subjects`
--

CREATE TABLE `regis_subjects` (
  `MaMH` bigint(20) UNSIGNED NOT NULL,
  `MaSV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `MaSV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenSV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `NgaySinh` date NOT NULL,
  `MaDT` bigint(20) UNSIGNED NOT NULL,
  `Lop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`MaSV`, `TenSV`, `GioiTinh`, `NgaySinh`, `MaDT`, `Lop`, `created_at`, `updated_at`) VALUES
('70DCTT21001', 'Nguyễn Mai Duyên', 0, '2022-06-01', 1, '70DCTT21', '2022-06-17 08:53:33', '2022-06-17 08:53:33'),
('70DCTT21002', 'Dương Văn Khải', 1, '2022-06-07', 2, '70DCTT21', '2022-06-17 08:53:43', '2022-06-17 09:13:28'),
('70DCTT21003', 'Vũ Công Tiến', 1, '2022-06-07', 2, '70DCTT21', '2022-06-18 18:38:28', '2022-06-18 18:38:28'),
('70DCTT21004', 'Đặng Tiến Toàn', 1, '2022-06-15', 1, '70DCTT21', '2022-06-18 18:39:07', '2022-06-18 18:39:07'),
('70DCTT22001', 'Trần Quang Huy', 1, '2022-06-17', 3, '70DCTT22', '2022-06-18 18:38:43', '2022-06-18 18:38:43'),
('70DCTT22002', 'Lê Đức Cường', 1, '2022-06-20', 2, '70DCTT22', '2022-06-18 18:38:57', '2022-06-18 18:39:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TenMH` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoTC` int(11) NOT NULL,
  `HocKy` int(11) NOT NULL,
  `SoTienMotTin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `TenMH`, `SoTC`, `HocKy`, `SoTienMotTin`, `created_at`, `updated_at`) VALUES
(1, 'Toán 1', 3, 1, 120000, '2022-06-17 09:24:39', '2022-06-17 09:24:39'),
(2, 'Toán 2', 3, 2, 123000, '2022-06-17 09:24:46', '2022-06-17 09:24:46'),
(3, 'Lịch sử Đảng', 3, 2, 150000, '2022-06-17 09:24:58', '2022-06-17 09:24:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `roles`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$U2.TELNpLCC3HGDiBAhX5OazPo7LKT9Hwn/fHufH3R38afDtmyDuS', 1, NULL, NULL, NULL),
(2, '70DCTT21001', 'duongvankhai2022001@gmail.com', NULL, '$2y$10$4o4wYb91vaMiBw4PPr8eyO6kkcP0hi2PeX1yCec8WBfXvvevlUgMK', 0, NULL, '2022-06-17 08:53:33', '2022-06-18 18:33:06'),
(3, '70DCTT21002', NULL, NULL, '$2y$10$UHWdHZVyIxHI1cLJemkHn.Q3rnuGWY7LrlAtNT3kvm8LBlkvmVKSu', 0, NULL, '2022-06-17 08:53:43', '2022-06-17 08:53:43'),
(4, '70DCTT21003', NULL, NULL, '$2y$10$IzapKf8g.5MNqmOmBxcnueW7bc7KplmTjBnyQ9rem8TpcWE1gFrsm', 0, NULL, '2022-06-18 18:38:28', '2022-06-18 18:38:28'),
(5, '70DCTT22001', NULL, NULL, '$2y$10$by5iFPeqbqDIDbsvOxd5W.j4.lmbJEGuebJfvTuNCloEDP7fgkTqy', 0, NULL, '2022-06-18 18:38:43', '2022-06-18 18:38:43'),
(6, '70DCTT22002', NULL, NULL, '$2y$10$shv5OS/gqQYerbGS8N/H3uYkbd0bJ6vAWwyni28YPeCOcnwyJYNIG', 0, NULL, '2022-06-18 18:38:57', '2022-06-18 18:38:57'),
(7, '70DCTT21004', NULL, NULL, '$2y$10$T1MZsDRl.Mp3ktrTYNYcr.ARyx/.ki/ncG3mNi7.t2rx6bTIfWtrO', 0, NULL, '2022-06-18 18:39:08', '2022-06-18 18:39:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`MaKhoa`);

--
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `lops`
--
ALTER TABLE `lops`
  ADD PRIMARY KEY (`MaLop`),
  ADD KEY `lops_khoa_foreign` (`Khoa`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipts_masv_foreign` (`MaSV`);

--
-- Chỉ mục cho bảng `regis_subjects`
--
ALTER TABLE `regis_subjects`
  ADD PRIMARY KEY (`MaMH`,`MaSV`),
  ADD KEY `regis_subjects_masv_foreign` (`MaSV`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`MaSV`),
  ADD KEY `students_lop_foreign` (`Lop`),
  ADD KEY `students_madt_foreign` (`MaDT`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `lops`
--
ALTER TABLE `lops`
  ADD CONSTRAINT `lops_khoa_foreign` FOREIGN KEY (`Khoa`) REFERENCES `departments` (`MaKhoa`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_masv_foreign` FOREIGN KEY (`MaSV`) REFERENCES `students` (`MaSV`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `regis_subjects`
--
ALTER TABLE `regis_subjects`
  ADD CONSTRAINT `regis_subjects_mamh_foreign` FOREIGN KEY (`MaMH`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `regis_subjects_masv_foreign` FOREIGN KEY (`MaSV`) REFERENCES `students` (`MaSV`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_lop_foreign` FOREIGN KEY (`Lop`) REFERENCES `lops` (`MaLop`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_madt_foreign` FOREIGN KEY (`MaDT`) REFERENCES `discounts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

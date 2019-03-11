-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 11, 2019 lúc 11:00 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `blog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Trần Quốc Lộc', 'tranquoclocnina@gmail.com', '$2y$10$Jn3ueY7uA8MrgAZ0qtvAY.2AWabBdue.3i.DdiX/jkxHooCXjq15a', 'JSY74pL4cxIFzyobk4I6XmpaiGMoJN8NObLX9ruLH7WVhkDno79YrGsmpn3d', '2019-03-08 08:57:18', '2019-03-08 08:57:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_03_01_093342_create_category_table', 1),
(7, '2019_03_02_082817_add_column_parent_id_category_table', 2),
(8, '2019_03_07_094606_delete_column_category_table', 3),
(9, '2019_03_07_094719_add_column_seo_category_table', 4),
(14, '2019_03_07_095824_create_tags_table', 5),
(15, '2019_03_07_095903_create_tags_link_table', 5),
(16, '2019_03_07_095935_create_posts_table', 5),
(17, '2019_03_07_100215_create_photos_table', 5),
(18, '2019_03_08_102144_create_setting_table', 6),
(19, '2019_03_08_102205_create_users_table', 6),
(20, '2019_03_08_144511_create_admins_table', 7),
(21, '2019_03_11_155633_alter_table_setting', 8),
(22, '2019_03_11_155956_alter_table_setting2', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `value` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_category`
--

CREATE TABLE `table_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hienthi` tinyint(4) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seo` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_category`
--

INSERT INTO `table_category` (`id`, `ten`, `slug`, `hienthi`, `photo`, `thumbnail`, `parent_id`, `type`, `created_at`, `updated_at`, `seo`) VALUES
(18, 'Máy khoan giá rẽ', 'may-khoan-gia-re', 1, '', '', 0, 'post', '2019-03-07 09:41:27', '2019-03-08 06:19:08', '{\"title\":\"M\\u00e1y khoan bosch\",\"keywords\":\"M\\u00e1y khoan bosch\",\"description\":\"M\\u00e1y khoan bosch\"}'),
(19, 'Máy giặt Toshiba', 'may-giat-toshiba', 1, '', '', 0, 'post', '2019-03-07 09:41:51', '2019-03-07 09:41:51', '{\"title\":\"M\\u00e1y gi\\u1eb7t Toshiba\",\"keywords\":\"M\\u00e1y gi\\u1eb7t Toshiba\",\"description\":\"M\\u00e1y gi\\u1eb7t Toshiba\"}'),
(20, 'Máy hàn Nhật', 'may-han', 1, '', '', 0, 'post', '2019-03-07 09:42:19', '2019-03-07 09:42:19', '{\"title\":\"M\\u00e1y h\\u00e0n\",\"keywords\":\"M\\u00e1y h\\u00e0n\",\"description\":\"M\\u00e1y h\\u00e0n\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_photos`
--

CREATE TABLE `table_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_posts`
--

CREATE TABLE `table_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `posts_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_posts`
--

INSERT INTO `table_posts` (`id`, `name`, `slug`, `description`, `content`, `photo`, `thumbnail`, `type`, `seo`, `author_id`, `posts_status`, `alt`, `created_at`, `updated_at`) VALUES
(20, 'Máy khoan bosch tt', 'may-khoan-bosch-tt', 'Máy khoan bosch tt', '<p>Máy khoan bosch tt</p>', '2019/03/may-khoan-bosch-tt-119.png', '', 'post', '{\"title\":\"M\\u00e1y khoan bosch tt\",\"keywords\":\"M\\u00e1y khoan bosch tt\",\"description\":\"M\\u00e1y khoan bosch tt\"}', 0, '1', 'Máy khoan bosch tt', '2019-03-08 07:36:53', '2019-03-08 07:36:53'),
(21, 'Máy khoan bosch', 'may-khoan-bosch', 'Máy khoan bosch', '<p>Máy khoan bosch</p>', '2019/03/may-khoan-bosch-389.png', '', 'post', '{\"title\":\"M\\u00e1y khoan bosch\",\"keywords\":\"M\\u00e1y khoan bosch\",\"description\":\"M\\u00e1y khoan bosch\"}', 2, '1', 'Máy khoan bosch', '2019-03-09 01:24:39', '2019-03-09 01:24:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_setting`
--

CREATE TABLE `table_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_setting`
--

INSERT INTO `table_setting` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'web_title', 'Trần Quốc Lộc - Laravel app', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(2, 'web_description', 'Trần Quốc Lộc - Laravel app', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(3, 'seo_title', 'Laravel app', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(4, 'seo_keyword', 'Laravel app, Laravel, Tran Quoc Loc', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(5, 'seo_description', 'Hello world, my first laravel app', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(6, 'code_head', '<script>var head = \'Code head\';</script>', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(7, 'code_body', '<script>var body = \'Code body\';</script>', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(8, 'code_footer', '<script>var footer = \'Code footer\';</script>', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(9, 'screenshot', 'screenshot.png', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(10, 'logo', 'logo.png', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(11, 'banner', 'banner.png', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(12, 'hotline', '0909 000 000', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(13, 'phone', '0909 000 111', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(14, 'zalo', '0909 111 111', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(15, 'fanpage_facebook', 'https://facebook.com/facebookvietnam', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(16, 'copyright', 'Tran Quoc Loc', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(17, 'author', 'Trần Quốc Lộc', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(18, 'address', 'Công viên phần mềm Quang Trung', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(19, 'smtp', '', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(20, 'mail_password', '', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(21, 'mail', '', '2019-03-11 08:55:31', '2019-03-11 08:55:31'),
(22, 'mail_encryption', 'TLS', '2019-03-11 08:55:31', '2019-03-11 08:55:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_tags`
--

CREATE TABLE `table_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_tags_link`
--

CREATE TABLE `table_tags_link` (
  `id` int(10) UNSIGNED NOT NULL,
  `tags_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Chỉ mục cho bảng `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_photos`
--
ALTER TABLE `table_photos`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_posts`
--
ALTER TABLE `table_posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_setting`
--
ALTER TABLE `table_setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_tags`
--
ALTER TABLE `table_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_tags_link`
--
ALTER TABLE `table_tags_link`
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
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `table_category`
--
ALTER TABLE `table_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `table_photos`
--
ALTER TABLE `table_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `table_posts`
--
ALTER TABLE `table_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `table_setting`
--
ALTER TABLE `table_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `table_tags`
--
ALTER TABLE `table_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `table_tags_link`
--
ALTER TABLE `table_tags_link`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

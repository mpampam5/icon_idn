/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 50532
 Source Host           : localhost:3306
 Source Schema         : icon_idn

 Target Server Type    : MySQL
 Target Server Version : 50532
 File Encoding         : 65001

 Date: 10/10/2019 02:12:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id_groups` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_groups`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (8, 'superadmin', 'superadmin');
INSERT INTO `groups` VALUES (13, 'admin', '');

-- ----------------------------
-- Table structure for groups_menus
-- ----------------------------
DROP TABLE IF EXISTS `groups_menus`;
CREATE TABLE `groups_menus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_groups` int(11) NOT NULL,
  `id_menus` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_menus`(`id_menus`) USING BTREE,
  INDEX `id_groups`(`id_groups`) USING BTREE,
  CONSTRAINT `groups_menus_ibfk_1` FOREIGN KEY (`id_groups`) REFERENCES `groups` (`id_groups`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `groups_menus_ibfk_2` FOREIGN KEY (`id_menus`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 336 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of groups_menus
-- ----------------------------
INSERT INTO `groups_menus` VALUES (307, 8, 1);
INSERT INTO `groups_menus` VALUES (308, 8, 27);
INSERT INTO `groups_menus` VALUES (309, 8, 24);
INSERT INTO `groups_menus` VALUES (310, 8, 29);
INSERT INTO `groups_menus` VALUES (311, 8, 30);
INSERT INTO `groups_menus` VALUES (312, 8, 23);
INSERT INTO `groups_menus` VALUES (313, 8, 22);
INSERT INTO `groups_menus` VALUES (314, 8, 11);
INSERT INTO `groups_menus` VALUES (315, 8, 10);
INSERT INTO `groups_menus` VALUES (316, 8, 15);
INSERT INTO `groups_menus` VALUES (317, 8, 8);
INSERT INTO `groups_menus` VALUES (328, 13, 1);
INSERT INTO `groups_menus` VALUES (329, 13, 27);
INSERT INTO `groups_menus` VALUES (330, 13, 24);
INSERT INTO `groups_menus` VALUES (331, 13, 29);
INSERT INTO `groups_menus` VALUES (332, 13, 30);
INSERT INTO `groups_menus` VALUES (333, 13, 23);
INSERT INTO `groups_menus` VALUES (334, 13, 22);
INSERT INTO `groups_menus` VALUES (335, 13, 15);

-- ----------------------------
-- Table structure for image
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image`  (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `id_portofolio` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_image`, `name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of image
-- ----------------------------
INSERT INTO `image` VALUES (2, 1, 'portofolio_091019225416.jpg');
INSERT INTO `image` VALUES (3, 1, 'portofolio_091019225708.jpg');
INSERT INTO `image` VALUES (4, 1, 'portofolio_091019231125.jpg');
INSERT INTO `image` VALUES (10, 1, 'portofolio_101019010804.jpg');
INSERT INTO `image` VALUES (11, 2, 'portofolio_101019012021.jpg');
INSERT INTO `image` VALUES (12, 2, 'portofolio_101019012026.jpg');
INSERT INTO `image` VALUES (17, 3, 'portofolio_101019014351.jpg');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_delete` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (2, 'Umum', 0);
INSERT INTO `kategori` VALUES (3, 'Couple', 0);
INSERT INTO `kategori` VALUES (4, 'Prawedding', 0);
INSERT INTO `kategori` VALUES (5, 'Cinematic', 0);

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `url` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `is_parent` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Beranda', 'home', 'fa fa-home', 'Beranda', 0, 1, 1);
INSERT INTO `menus` VALUES (2, 'Pengaturan', 'pengaturan', 'fa fa-cogs', 'pengaturan', 0, 13, 1);
INSERT INTO `menus` VALUES (8, 'Manajemen Menu', 'menus', 'fa fa-file-text-o', 'Manajemen Menu', 2, 15, 1);
INSERT INTO `menus` VALUES (9, 'Manajemen Admin', '#', 'fa fa-users', 'Manajemen Admin', 0, 10, 1);
INSERT INTO `menus` VALUES (10, 'admin', 'users', 'fa fa-circle', 'admin', 9, 12, 1);
INSERT INTO `menus` VALUES (11, 'Groups', 'groups', 'fa fa-circle', 'Groups', 9, 11, 1);
INSERT INTO `menus` VALUES (15, 'Pengaturan', 'pengaturan', 'fa fa-circle', 'Pengaturan', 2, 14, 1);
INSERT INTO `menus` VALUES (21, 'Layanan', '#', 'fa fa-camera', 'Layanan', 0, 7, 1);
INSERT INTO `menus` VALUES (22, 'Kategori Layanan', 'kategori_layanan', 'fa fa-circle', 'Kategori Layanan', 21, 9, 1);
INSERT INTO `menus` VALUES (23, 'Paket Layanan', 'paket_layanan', 'fa fa-circle', 'Paket Layanan', 21, 8, 1);
INSERT INTO `menus` VALUES (24, 'Paket member', 'paket', 'fa fa-circle', 'Paket member', 28, 4, 1);
INSERT INTO `menus` VALUES (27, 'Member', 'tb_member', 'fa fa-users', 'Member', 28, 3, 1);
INSERT INTO `menus` VALUES (28, 'Member', '#', 'fa fa-address-card', 'Member', 0, 2, 1);
INSERT INTO `menus` VALUES (29, 'Marketing', 'Marketing', 'fa fa-group', 'Marketing', 0, 5, 1);
INSERT INTO `menus` VALUES (30, 'Portofolio', 'Portofolio', 'fa fa-camera-retro', 'Portofolio', 0, 6, 1);

-- ----------------------------
-- Table structure for paket
-- ----------------------------
DROP TABLE IF EXISTS `paket`;
CREATE TABLE `paket`  (
  `id_paket` int(11) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_paket` int(11) NULL DEFAULT NULL,
  `harga_harian` int(11) NULL DEFAULT NULL,
  `jangka_waktu` int(11) NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created` datetime NULL DEFAULT NULL,
  `modified` datetime NULL DEFAULT NULL,
  `is_delete` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_paket`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of paket
-- ----------------------------
INSERT INTO `paket` VALUES (4, 'PAKET SILVER', 30000, 10000, 1, 'Daftar menjadi member Rp.30.000 berlaku 5 tahun. bayar Rp.10.000 / datang foto. free 3 cetak/ minggu . ukuran 2R.', '2019-08-31 00:58:12', '2019-10-05 16:04:21', 0);
INSERT INTO `paket` VALUES (5, 'PAKET GOLD', 50000, 5000, 2, 'Daftar menjadi member Rp.50.000 berlaku 5 tahun. bayar Rp.5000 / datang foto. free 3x cetak/ minggu . ukuran 2R. dsadas dsa ads', '2019-08-31 01:02:24', '2019-10-05 22:48:04', 0);
INSERT INTO `paket` VALUES (6, 'PAKET PLATINUM', 100000, 3000, 5, 'Daftar menjadi member Rp.100.000 berlaku 5 tahun. bayar Rp.3000 / datang foto. free 3 cetak/ minggu . ukuran 2R.', '2019-08-31 01:03:15', '2019-10-05 16:04:45', 0);

-- ----------------------------
-- Table structure for paket_layanan
-- ----------------------------
DROP TABLE IF EXISTS `paket_layanan`;
CREATE TABLE `paket_layanan`  (
  `id_layanan` int(11) NOT NULL AUTO_INCREMENT,
  `layanan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` int(11) NULL DEFAULT NULL,
  `harga_per_kepala` int(11) NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_kategori` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_layanan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of paket_layanan
-- ----------------------------
INSERT INTO `paket_layanan` VALUES (2, 'Foto sendiri', 20000, 1, 'Free Cetak', 2);
INSERT INTO `paket_layanan` VALUES (3, 'Foto Rombongan 5-20 orang', 15000, 1, 'Free cetak', 2);
INSERT INTO `paket_layanan` VALUES (4, 'foto di atas 20 orang', 10000, 1, 'free cetak', 2);
INSERT INTO `paket_layanan` VALUES (6, 'Couple', 30000, NULL, 'couple', 2);
INSERT INTO `paket_layanan` VALUES (7, 'Prewedding Indor', 1200000, NULL, 'free file dan cetak', 4);
INSERT INTO `paket_layanan` VALUES (8, 'Prewedding Outdor', 2500000, NULL, 'File Dan Cetak', 4);
INSERT INTO `paket_layanan` VALUES (9, 'Ilustrasion', 2500000, NULL, 'Durasi 1 menit', 5);
INSERT INTO `paket_layanan` VALUES (10, 'Instagram', 2500000, NULL, 'durasi 1 menit', 4);

-- ----------------------------
-- Table structure for portofolio
-- ----------------------------
DROP TABLE IF EXISTS `portofolio`;
CREATE TABLE `portofolio`  (
  `id_portofolio` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_portofolio`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of portofolio
-- ----------------------------
INSERT INTO `portofolio` VALUES (1, 'Prawedding', 'dsadsa');
INSERT INTO `portofolio` VALUES (2, 'Coulpe', '');
INSERT INTO `portofolio` VALUES (3, 'Group', '');

-- ----------------------------
-- Table structure for referral
-- ----------------------------
DROP TABLE IF EXISTS `referral`;
CREATE TABLE `referral`  (
  `id_referral` int(11) NOT NULL AUTO_INCREMENT,
  `kode_referral` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_paket` int(11) NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created` datetime NULL DEFAULT NULL,
  `is_active` int(11) NULL DEFAULT NULL,
  `is_delete` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_referral`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of referral
-- ----------------------------
INSERT INTO `referral` VALUES (8, 'REF1009190001', 4, 'dsadsa', '2019-09-10 22:35:17', 1, 0);

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `domain` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `logo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `title_instagram` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `title_facebook` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tentang` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES (999, 'elosi studio', 'ww.mpampam.com', '085288882994', 'Jalan skarda N2 Kota Makassar Sulawesi Selatan', '300819111617_logo.png', 'studioelosi@gmail.com', '@icon.ind', 'https://www.instagram.com/icon.ind/', 'Elosi Studio', 'https://www.facebook.com/elosistudio', 'Elosi Studio, menyediakan jasa fotografi di daerah Makassar, sulawesi selatan dengan background kekinian untuk mengisi konten Media Sosial anda. Mulai dari foto prawedding, graduation, couple, family, maternity, baby, grup, product dll. Ayo foto di Elosi Studio dengan fotografer yang terpercaya dengan harga terjangkau dan hasil memuaskan.');

-- ----------------------------
-- Table structure for tb_marketing
-- ----------------------------
DROP TABLE IF EXISTS `tb_marketing`;
CREATE TABLE `tb_marketing`  (
  `id_marketing` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `modified` datetime NULL DEFAULT NULL,
  `is_delete` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `is_active` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_marketing`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_marketing
-- ----------------------------
INSERT INTO `tb_marketing` VALUES (1, 'Muhammad Irfan Ibnus', '2132131231', 'aktivisuit@gmail.com', 'jl. mannuruki raya', 'mpampam', '$2y$10$ZGSz6s3yB0tdRM/amAChSOCnybJf/W8TzPduF162EOGcP9hbUloZC', '2019-09-22 08:01:16', '2019-09-22 10:02:07', '0', '1');
INSERT INTO `tb_marketing` VALUES (2, 'dsadsa32131', '312321', 'aktivisuit@gmail.com', 'dsadsa', NULL, NULL, '2019-10-09 10:16:14', '2019-10-09 10:16:28', '1', '1');

-- ----------------------------
-- Table structure for tb_member
-- ----------------------------
DROP TABLE IF EXISTS `tb_member`;
CREATE TABLE `tb_member`  (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `jenis_kelamin` enum('pria','wanita') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `image` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `modified` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_member`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_member
-- ----------------------------
INSERT INTO `tb_member` VALUES (15, '123456789', 'Muhammad Irfan Ibnu', 'mpampam5@gmail.com', '08653737937', 'Jl. mannuruki raya', 'pria', 'makassar', '1994-11-29', NULL, '2019-09-22 10:23:40', NULL);
INSERT INTO `tb_member` VALUES (16, '32918392189312', 'irmawati', 'aktivisuit@gmail.com', '08653737937', 'jl. rappocini', 'wanita', 'makassar', '1996-11-13', NULL, '2019-09-22 10:35:41', '2019-09-22 10:43:46');
INSERT INTO `tb_member` VALUES (17, '2321312312', 'irmawati ibnu', 'aktivisuit@gmail.coma', '08653737937', 'muhammad irfan ibnu', 'wanita', 'makassar', '2019-09-18', NULL, '2019-09-22 10:45:07', NULL);
INSERT INTO `tb_member` VALUES (18, '321312', 'Muhammad Irfan Ibnus', 'aktivisuit@gmail.coms', '2132131231', 'uy', 'pria', 'makassar', '2019-09-05', NULL, '2019-09-28 12:51:26', '2019-10-09 01:07:55');
INSERT INTO `tb_member` VALUES (19, '2321312312', 'Muhammad Irfan Ibnus', 'mpampam5@gmail.comsas', '2132131231', 'dsadsa', 'wanita', 'makassar', '2019-10-16', NULL, '2019-09-28 12:52:26', '2019-10-09 01:01:34');
INSERT INTO `tb_member` VALUES (22, '2133222222232323', 'Muhammad Irfan Ibnu', 'irfan@mail.com', '2132131231', 'fdsfds', 'wanita', 'makassar', '1994-09-21', NULL, '2019-10-06 15:28:41', NULL);
INSERT INTO `tb_member` VALUES (23, '3421111111111111', 'dsadsadsa', 'dsadsaas@ddsada.com', '321321312', 'jln makassar', 'pria', 'makassar', '2001-10-10', NULL, '2019-10-06 15:39:31', NULL);

-- ----------------------------
-- Table structure for trans_member
-- ----------------------------
DROP TABLE IF EXISTS `trans_member`;
CREATE TABLE `trans_member`  (
  `id_trans_member` int(11) NOT NULL AUTO_INCREMENT,
  `kode_registrasi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_member` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_paket` int(11) NULL DEFAULT NULL,
  `is_active` int(11) NULL DEFAULT NULL,
  `is_verifikasi` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `modified` datetime NULL DEFAULT NULL,
  `is_delete` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `from_add` enum('admin','marketing') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_personals` int(11) NULL DEFAULT NULL,
  `masa_aktif` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_trans_member`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of trans_member
-- ----------------------------
INSERT INTO `trans_member` VALUES (13, 'ICON2209190001', '15', 4, 1, '1', '2019-09-22 11:23:40', NULL, '0', 'admin', 6, '2020-09-21 10:23:40');
INSERT INTO `trans_member` VALUES (14, 'ICON2209190002', '16', 5, 1, '1', '2019-09-22 11:35:41', '2019-09-22 10:43:46', '0', 'marketing', 1, '2021-09-21 11:35:41');
INSERT INTO `trans_member` VALUES (15, 'ICON2209190003', '17', 6, 1, '1', '2019-09-22 11:45:07', NULL, '0', 'admin', 6, '2024-09-20 10:45:07');
INSERT INTO `trans_member` VALUES (16, 'ICON2809190001', '18', 4, 0, '1', '2019-09-28 01:51:26', '2019-10-09 01:07:55', '0', 'admin', 6, '2020-09-27 01:51:26');
INSERT INTO `trans_member` VALUES (17, 'ICON2809190002', '19', 5, 1, '1', '2019-09-28 01:52:26', '2019-10-09 01:01:34', '0', 'marketing', 1, '2021-09-27 01:52:26');
INSERT INTO `trans_member` VALUES (18, 'ICON0610190001', '22', 5, NULL, '0', '2019-10-06 04:28:41', NULL, '0', NULL, NULL, NULL);
INSERT INTO `trans_member` VALUES (19, 'ICON0610190002', '23', 4, NULL, '0', '2019-10-06 04:39:31', NULL, '0', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `key` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `token_activation` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_login` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `active` enum('y','n') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'y',
  PRIMARY KEY (`id_users`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (6, 'Muhammad', 'ippank', 'mpampam@mail.com', '39843890432', 'admin', '$2y$10$HsivkzwehMSImBhjtIID1.xuwAnbmyF8gmbz4OfvJQ5V1BFddOlK2', '20190311221640', NULL, '2019-10-09 23:55:17', '2019-03-11 22:16:40', NULL, 'y');
INSERT INTO `users` VALUES (7, 'Andi', 'Lutfi  Hidayat', 'lutfi@gmail.com', '08526772989', 'elosilutfi', '$2y$10$44RRfUm3fUuPiegc1DhXZuorbwSpo7U.LnE1cTLKKam7t/PkuUBa6', '20191009235352', NULL, '2019-10-09 23:56:15', '2019-10-09 23:53:52', NULL, 'y');

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups`  (
  `id_users_groups` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `id_groups` int(11) NOT NULL,
  PRIMARY KEY (`id_users_groups`) USING BTREE,
  INDEX `id_users`(`id_users`) USING BTREE,
  INDEX `id_groups`(`id_groups`) USING BTREE,
  CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`id_groups`) REFERENCES `groups` (`id_groups`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES (1, 6, 8);
INSERT INTO `users_groups` VALUES (2, 7, 13);

SET FOREIGN_KEY_CHECKS = 1;

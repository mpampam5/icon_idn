/*
 Navicat Premium Data Transfer

 Source Server         : mpampam
 Source Server Type    : MySQL
 Source Server Version : 50532
 Source Host           : localhost:3306
 Source Schema         : icon_idn

 Target Server Type    : MySQL
 Target Server Version : 50532
 File Encoding         : 65001

 Date: 15/09/2019 16:34:12
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
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (8, 'superadmin', 'superadmin');
INSERT INTO `groups` VALUES (12, 'Operator', 'Operator');

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
) ENGINE = InnoDB AUTO_INCREMENT = 296 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of groups_menus
-- ----------------------------
INSERT INTO `groups_menus` VALUES (102, 12, 1);
INSERT INTO `groups_menus` VALUES (285, 8, 27);
INSERT INTO `groups_menus` VALUES (286, 8, 1);
INSERT INTO `groups_menus` VALUES (287, 8, 26);
INSERT INTO `groups_menus` VALUES (288, 8, 24);
INSERT INTO `groups_menus` VALUES (289, 8, 23);
INSERT INTO `groups_menus` VALUES (290, 8, 22);
INSERT INTO `groups_menus` VALUES (291, 8, 11);
INSERT INTO `groups_menus` VALUES (292, 8, 10);
INSERT INTO `groups_menus` VALUES (293, 8, 15);
INSERT INTO `groups_menus` VALUES (294, 8, 8);
INSERT INTO `groups_menus` VALUES (295, 8, 18);

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
INSERT INTO `kategori` VALUES (4, 'Prewedding', 0);
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
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Beranda', 'home', 'fa fa-home', 'Beranda', 0, 1, 1);
INSERT INTO `menus` VALUES (2, 'Pengaturan', 'pengaturan', 'fa fa-cogs', 'pengaturan', 0, 12, 1);
INSERT INTO `menus` VALUES (8, 'Manajemen Menu', 'menus', 'fa fa-file-text-o', 'Manajemen Menu', 2, 14, 1);
INSERT INTO `menus` VALUES (9, 'Manajemen Admin', '#', 'fa fa-users', 'Manajemen Admin', 0, 9, 1);
INSERT INTO `menus` VALUES (10, 'admin', 'users', 'fa fa-circle', 'admin', 9, 11, 1);
INSERT INTO `menus` VALUES (11, 'Groups', 'groups', 'fa fa-circle', 'Groups', 9, 10, 1);
INSERT INTO `menus` VALUES (15, 'Pengaturan', 'pengaturan', 'fa fa-circle', 'Pengaturan', 2, 13, 1);
INSERT INTO `menus` VALUES (18, 'crud generator', 'mpampam-crud', 'fa fa-file-code-o', 'crud generator', 0, 15, 1);
INSERT INTO `menus` VALUES (21, 'Layanan', '#', 'fa fa-camera', 'Layanan', 0, 6, 1);
INSERT INTO `menus` VALUES (22, 'Kategori Layanan', 'kategori_layanan', 'fa fa-circle', 'Kategori Layanan', 21, 8, 1);
INSERT INTO `menus` VALUES (23, 'Paket Layanan', 'paket_layanan', 'fa fa-circle', 'Paket Layanan', 21, 7, 1);
INSERT INTO `menus` VALUES (24, 'Paket member', 'paket', 'fa fa-circle', 'Paket member', 25, 5, 1);
INSERT INTO `menus` VALUES (25, 'Paket member', '#', 'fa fa-suitcase', 'Paket member', 0, 3, 1);
INSERT INTO `menus` VALUES (26, 'Kode Referral', 'Referral', 'fa fa-circle', 'Kode Referral', 25, 4, 1);
INSERT INTO `menus` VALUES (27, 'Member', 'tb_member', 'fa fa-users', 'Member', 0, 2, 1);

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
INSERT INTO `paket` VALUES (4, 'Paket 1 tahun', 30000, 10000, 1, 'Daftar menjadi member Rp.30.000 berlaku 5 tahun. bayar Rp.10.000 / datang foto. free 3 cetak/ minggu . ukuran 2R.', '2019-08-31 00:58:12', '2019-08-31 17:39:07', 0);
INSERT INTO `paket` VALUES (5, 'Paket 2 tahun', 50000, 5000, 1, 'Daftar menjadi member Rp.50.000 berlaku 5 tahun. bayar Rp.5000 / datang foto. free 3x cetak/ minggu . ukuran 2R.', '2019-08-31 01:02:24', '2019-08-31 17:38:20', 0);
INSERT INTO `paket` VALUES (6, 'Paket 5 tahun', 100000, 3000, 5, 'Daftar menjadi member Rp.100.000 berlaku 5 tahun. bayar Rp.3000 / datang foto. free 3 cetak/ minggu . ukuran 2R.', '2019-08-31 01:03:15', '2019-08-31 17:37:31', 0);

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES (999, 'ICON INDONESIA', 'ww.mpampam.com', '085288882991', 'Jalan kote. Kota Makassar , Provinsi sulawesi-selatan', '300819111617_logo.png');

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_member
-- ----------------------------
INSERT INTO `tb_member` VALUES (1, '321321321213', 'Muhammad Irfan Ibnu', 'mpampam5@gmail.com', '0852888882994', 'makassar', 'pria', 'makassar', '1993-11-25', NULL, '2019-09-10 23:06:09', NULL);
INSERT INTO `tb_member` VALUES (2, '2222222210222222', 'dsadsa', 'mpampam5@gmail.com', '3421', 'dsadsa', 'pria', '123456', '1994-10-11', NULL, '2019-09-12 11:44:49', NULL);

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
  PRIMARY KEY (`id_trans_member`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of trans_member
-- ----------------------------
INSERT INTO `trans_member` VALUES (1, 'ICON12345678', '1', 4, 1, '1', '2019-09-10 23:07:02', NULL, '0');
INSERT INTO `trans_member` VALUES (2, '321312321321', '2', 4, 1, '1', '2019-09-12 23:51:27', NULL, '0');

-- ----------------------------
-- Table structure for trans_member_register
-- ----------------------------
DROP TABLE IF EXISTS `trans_member_register`;
CREATE TABLE `trans_member_register`  (
  `id_trans_member_register` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) NULL DEFAULT NULL,
  `status_register` enum('register','admin') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_referral` int(11) NULL DEFAULT NULL,
  `id_admin` int(11) NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created` datetime NULL DEFAULT NULL,
  `modified` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_trans_member_register`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (6, 'Muhammad', 'ippank', 'mpampam@mail.com', '39843890432', 'admin', '$2y$10$HsivkzwehMSImBhjtIID1.xuwAnbmyF8gmbz4OfvJQ5V1BFddOlK2', '20190311221640', NULL, '2019-09-12 23:13:10', '2019-03-11 22:16:40', NULL, 'y');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES (1, 6, 8);

SET FOREIGN_KEY_CHECKS = 1;

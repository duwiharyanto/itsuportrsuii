/*
 Navicat Premium Data Transfer

 Source Server         : SERVER DATA
 Source Server Type    : MySQL
 Source Server Version : 50730
 Source Host           : 192.168.50.111:3306
 Source Schema         : itsuport_db

 Target Server Type    : MySQL
 Target Server Version : 50730
 File Encoding         : 65001

 Date: 28/09/2020 13:01:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for berkas
-- ----------------------------
DROP TABLE IF EXISTS `berkas`;
CREATE TABLE `berkas`  (
  `berkas_id` int(11) NOT NULL AUTO_INCREMENT,
  `berkas_kategoriid` int(11) NULL DEFAULT NULL,
  `berkas_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `berkas_file` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `berkas_kapasitas` float(10, 0) NULL DEFAULT NULL,
  `berkas_downloaded` int(5) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`berkas_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of berkas
-- ----------------------------
INSERT INTO `berkas` VALUES (4, 4, 'medup', '240e84f6062dbe946654204a40f626a8.pdf', 131, NULL, '2020-08-24 18:42:10');
INSERT INTO `berkas` VALUES (5, 7, 'Permohonan Komputer', NULL, NULL, NULL, '2020-04-06 12:41:58');
INSERT INTO `berkas` VALUES (6, 7, 'Permohonan User', NULL, NULL, NULL, '2020-04-06 13:07:39');
INSERT INTO `berkas` VALUES (7, 8, 'Surat Keterangan Sehat', NULL, NULL, NULL, '2020-05-23 09:09:45');

-- ----------------------------
-- Table structure for chat
-- ----------------------------
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat`  (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chat_pesan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`chat_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of chat
-- ----------------------------
INSERT INTO `chat` VALUES (1, 'duwi', 'admin', '2020-06-05 12:58:20');
INSERT INTO `chat` VALUES (3, 'duwi', 'admin oi', '2020-06-05 13:11:21');

-- ----------------------------
-- Table structure for formatberkas
-- ----------------------------
DROP TABLE IF EXISTS `formatberkas`;
CREATE TABLE `formatberkas`  (
  `formatberkas_id` int(11) NOT NULL AUTO_INCREMENT,
  `formatberkas_iduser` int(5) NULL DEFAULT NULL,
  `formatberkas_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NULL DEFAULT NULL,
  `formatberkas_file` text CHARACTER SET latin1 COLLATE latin1_bin NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`formatberkas_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of formatberkas
-- ----------------------------
INSERT INTO `formatberkas` VALUES (1, 38, 'balasan rujukan', 'surat_balasan_rujukan.xlsx', '2020-04-17 11:04:59');
INSERT INTO `formatberkas` VALUES (2, 38, 'keterangan hamil', 'surat_keterangan_hamil.xlsx', '2020-04-17 11:05:03');
INSERT INTO `formatberkas` VALUES (3, 38, 'keterangan lahir', 'surat_keterangan_lahir.xlsx', '2020-04-17 11:05:03');
INSERT INTO `formatberkas` VALUES (4, 38, 'layak terbang', 'surat_layak_terbang.xlsx', '2020-04-17 11:05:04');
INSERT INTO `formatberkas` VALUES (5, 38, 'rujukan keluar', 'surat_rujukan_keluar.xlsx', '2020-04-17 11:05:04');
INSERT INTO `formatberkas` VALUES (6, 38, 'surat keterangan sehat', 'surat_keterangan_sehat.xlsx', '2020-04-27 08:33:49');
INSERT INTO `formatberkas` VALUES (7, 38, 'surat keterangan sakit', 'surat_keterangan_sakit.xlsx', '2020-04-27 08:34:01');
INSERT INTO `formatberkas` VALUES (8, 38, 'surat keterangan vaksin', 'surat_keterangan_vaksin.xlsx', '2020-05-04 15:02:34');
INSERT INTO `formatberkas` VALUES (9, 38, 'surat keterangan bebas napza', 'surat_keterangan_napza.xlsx', '2020-05-05 09:38:46');

-- ----------------------------
-- Table structure for ip
-- ----------------------------
DROP TABLE IF EXISTS `ip`;
CREATE TABLE `ip`  (
  `ip_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ip_catatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`ip_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ip
-- ----------------------------
INSERT INTO `ip` VALUES (1, '192.168.50.1', 'Gateway lantai 1', '2020-05-23 13:20:38');
INSERT INTO `ip` VALUES (2, '192.168.50.5', 'Printer Acc & Fin', '2020-05-23 13:24:08');
INSERT INTO `ip` VALUES (3, '192.168.51.68', 'Komputer Triase', '2020-06-24 09:08:43');
INSERT INTO `ip` VALUES (4, '192.168.51.62', 'farmasi lobi', '2020-07-01 16:45:41');
INSERT INTO `ip` VALUES (5, '192.168.77.152', 'Anamnesa Anak\r\n', '2020-07-13 13:53:30');
INSERT INTO `ip` VALUES (6, '192.168.77.185', 'Anamnesa LT 2', '2020-07-13 13:53:40');
INSERT INTO `ip` VALUES (7, '192.168.77.125', 'PC FARMASI 2\r\n', '2020-07-13 14:41:33');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_kategori` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`kategori_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (4, 'Undangan', '2020-04-03 13:46:57');
INSERT INTO `kategori` VALUES (5, 'Memorandum', '2020-04-03 13:47:04');
INSERT INTO `kategori` VALUES (6, 'panduan', '2020-04-03 13:47:08');
INSERT INTO `kategori` VALUES (7, 'Permohonan', '2020-04-06 12:41:46');
INSERT INTO `kategori` VALUES (8, 'Surat Keterangan', '2020-04-06 13:08:42');

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level`  (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level_status` bit(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `level_dashboard` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`level_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES (1, 'Administrator', b'1', '2020-04-07 14:01:08', 'Dashboard/Dashboard');
INSERT INTO `level` VALUES (2, 'User', b'1', '2020-08-25 09:02:52', 'Support/Sistem');
INSERT INTO `level` VALUES (4, 'Manajer', b'1', '2020-04-07 14:01:23', 'Dashboard/Dashboard');
INSERT INTO `level` VALUES (6, 'umum', b'1', '2020-06-04 18:38:46', 'Support/Troubleshoot');
INSERT INTO `level` VALUES (7, 'it', b'1', '2020-05-09 14:36:47', 'Dashboard/Dashboard');
INSERT INTO `level` VALUES (8, 'tera', b'1', '2020-08-24 19:40:21', 'Dashboard/Dashboard');

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log`  (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_iduser` int(11) NULL DEFAULT NULL,
  `log_aksi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `log_level` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 726 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES (1, 1, 'login', '2020-01-02 03:40:03', '1');
INSERT INTO `log` VALUES (2, 1, 'login', '2020-01-02 03:40:04', '1');
INSERT INTO `log` VALUES (3, 34, 'login', '2020-01-02 03:40:04', '1');
INSERT INTO `log` VALUES (7, 1, 'password salah', '2020-01-02 03:40:06', '3');
INSERT INTO `log` VALUES (8, 1, 'password salah', '2020-01-02 03:40:07', '3');
INSERT INTO `log` VALUES (9, 1, 'password salah', '2020-01-02 03:40:07', '3');
INSERT INTO `log` VALUES (12, 35, 'password salah', '2020-01-02 03:40:08', '3');
INSERT INTO `log` VALUES (13, 1, 'login', '2020-01-02 05:34:00', '1');
INSERT INTO `log` VALUES (14, 1, 'logout', '2020-01-02 03:38:55', '3');
INSERT INTO `log` VALUES (15, 1, 'login', '2020-01-02 05:33:59', '1');
INSERT INTO `log` VALUES (16, 1, 'logout', '2020-01-02 05:34:09', '3');
INSERT INTO `log` VALUES (17, 1, 'login', '2020-01-02 05:34:13', '1');
INSERT INTO `log` VALUES (18, 1, 'logout', '2020-01-02 06:07:28', '3');
INSERT INTO `log` VALUES (19, 35, 'login', '2020-01-02 06:07:33', '1');
INSERT INTO `log` VALUES (20, 35, 'logout', '2020-01-02 06:07:39', '3');
INSERT INTO `log` VALUES (21, 4, 'login', '2020-01-02 06:07:42', '1');
INSERT INTO `log` VALUES (22, 4, 'logout', '2020-01-02 06:07:55', '3');
INSERT INTO `log` VALUES (23, 29, 'password salah', '2020-01-02 06:07:58', '3');
INSERT INTO `log` VALUES (24, 29, 'password salah', '2020-01-02 06:08:02', '3');
INSERT INTO `log` VALUES (25, 1, 'login', '2020-01-02 06:08:06', '1');
INSERT INTO `log` VALUES (26, 1, 'logout', '2020-01-02 06:08:25', '3');
INSERT INTO `log` VALUES (27, 29, 'login', '2020-01-02 06:08:28', '1');
INSERT INTO `log` VALUES (28, 1, 'password salah', '2020-01-02 06:12:54', '3');
INSERT INTO `log` VALUES (29, 1, 'login', '2020-01-02 06:13:03', '1');
INSERT INTO `log` VALUES (30, 1, 'login', '2020-01-03 03:06:13', '1');
INSERT INTO `log` VALUES (32, 1, 'login', '2020-01-03 03:45:31', '1');
INSERT INTO `log` VALUES (33, 1, 'logout', '2020-01-03 03:48:28', '3');
INSERT INTO `log` VALUES (34, 1, 'login', '2020-01-03 04:06:01', '1');
INSERT INTO `log` VALUES (35, 1, 'logout', '2020-01-03 04:08:25', '3');
INSERT INTO `log` VALUES (36, 1, 'login', '2020-01-03 04:08:28', '1');
INSERT INTO `log` VALUES (37, 1, 'logout', '2020-01-03 04:08:37', '3');
INSERT INTO `log` VALUES (38, 1, 'login', '2020-01-03 04:08:48', '1');
INSERT INTO `log` VALUES (40, 1, 'login', '2020-01-03 04:10:15', '1');
INSERT INTO `log` VALUES (41, 1, 'logout', '2020-01-03 04:14:44', '3');
INSERT INTO `log` VALUES (42, 1, 'login', '2020-01-03 04:17:12', '1');
INSERT INTO `log` VALUES (43, 1, 'logout', '2020-01-03 04:18:20', '3');
INSERT INTO `log` VALUES (44, 1, 'login', '2020-01-03 06:13:46', '1');
INSERT INTO `log` VALUES (45, 1, 'logout', '2020-01-03 06:16:43', '3');
INSERT INTO `log` VALUES (46, 1, 'login', '2020-01-06 05:44:51', '1');
INSERT INTO `log` VALUES (47, 1, 'logout', '2020-01-06 20:22:39', '3');
INSERT INTO `log` VALUES (48, 1, 'login', '2020-01-06 20:22:45', '1');
INSERT INTO `log` VALUES (49, 1, 'login', '2020-01-07 18:18:02', '1');
INSERT INTO `log` VALUES (50, 1, 'login', '2020-01-09 13:39:02', '1');
INSERT INTO `log` VALUES (51, 1, 'login', '2020-01-10 10:45:11', '1');
INSERT INTO `log` VALUES (52, 1, 'logout', '2020-01-10 10:54:19', '3');
INSERT INTO `log` VALUES (53, 1, 'login', '2020-01-14 10:49:03', '1');
INSERT INTO `log` VALUES (54, 1, 'logout', '2020-01-14 11:05:20', '3');
INSERT INTO `log` VALUES (55, 1, 'login', '2020-01-14 11:09:09', '1');
INSERT INTO `log` VALUES (56, 1, 'logout', '2020-01-14 11:10:13', '3');
INSERT INTO `log` VALUES (57, 1, 'login', '2020-01-14 11:28:23', '1');
INSERT INTO `log` VALUES (58, 1, 'logout', '2020-01-14 11:53:38', '3');
INSERT INTO `log` VALUES (59, 1, 'login', '2020-01-20 13:21:25', '1');
INSERT INTO `log` VALUES (60, 1, 'login', '2020-01-24 10:46:31', '1');
INSERT INTO `log` VALUES (61, 1, 'login', '2020-02-01 09:11:33', '1');
INSERT INTO `log` VALUES (62, 1, 'logout', '2020-02-01 09:36:46', '3');
INSERT INTO `log` VALUES (63, 1, 'login', '2020-02-01 09:36:50', '1');
INSERT INTO `log` VALUES (64, 1, 'logout', '2020-02-01 11:11:06', '3');
INSERT INTO `log` VALUES (65, 1, 'login', '2020-02-01 11:11:16', '1');
INSERT INTO `log` VALUES (66, 1, 'logout', '2020-02-01 11:11:37', '3');
INSERT INTO `log` VALUES (67, 29, 'password salah', '2020-02-01 11:11:40', '3');
INSERT INTO `log` VALUES (68, 29, 'login', '2020-02-01 11:11:44', '1');
INSERT INTO `log` VALUES (69, 1, 'login', '2020-02-05 13:15:29', '1');
INSERT INTO `log` VALUES (70, 1, 'logout', '2020-02-05 13:16:05', '3');
INSERT INTO `log` VALUES (71, 29, 'password salah', '2020-02-05 13:16:08', '3');
INSERT INTO `log` VALUES (72, 29, 'login', '2020-02-05 13:16:12', '1');
INSERT INTO `log` VALUES (73, 1, 'login', '2020-02-06 11:46:40', '1');
INSERT INTO `log` VALUES (74, 1, 'login', '2020-02-06 16:08:37', '1');
INSERT INTO `log` VALUES (75, 1, 'login', '2020-02-07 08:43:09', '1');
INSERT INTO `log` VALUES (76, 1, 'logout', '2020-02-07 10:15:44', '3');
INSERT INTO `log` VALUES (77, 37, 'login', '2020-02-07 10:15:52', '1');
INSERT INTO `log` VALUES (78, 37, 'logout', '2020-02-07 10:33:55', '3');
INSERT INTO `log` VALUES (79, 37, 'login', '2020-02-07 10:34:01', '1');
INSERT INTO `log` VALUES (80, 37, 'logout', '2020-02-07 10:35:37', '3');
INSERT INTO `log` VALUES (81, 37, 'login', '2020-02-07 10:35:42', '1');
INSERT INTO `log` VALUES (82, NULL, 'logout', '2020-02-07 15:55:57', '3');
INSERT INTO `log` VALUES (83, 1, 'login', '2020-02-07 16:28:01', '1');
INSERT INTO `log` VALUES (84, 1, 'logout', '2020-02-07 16:28:07', '3');
INSERT INTO `log` VALUES (85, 37, 'login', '2020-02-07 16:28:13', '1');
INSERT INTO `log` VALUES (86, 37, 'login', '2020-02-10 09:54:57', '1');
INSERT INTO `log` VALUES (87, 37, 'logout', '2020-02-10 10:12:24', '3');
INSERT INTO `log` VALUES (88, 37, 'login', '2020-02-10 10:12:31', '1');
INSERT INTO `log` VALUES (89, 37, 'login', '2020-02-11 10:32:28', '1');
INSERT INTO `log` VALUES (90, 37, 'logout', '2020-02-11 11:44:40', '3');
INSERT INTO `log` VALUES (91, 37, 'login', '2020-02-11 12:58:19', '1');
INSERT INTO `log` VALUES (92, 37, 'logout', '2020-02-11 13:07:18', '3');
INSERT INTO `log` VALUES (93, 1, 'login', '2020-02-11 16:10:34', '1');
INSERT INTO `log` VALUES (94, 1, 'logout', '2020-02-11 16:13:29', '3');
INSERT INTO `log` VALUES (95, 1, 'login', '2020-02-11 16:13:41', '1');
INSERT INTO `log` VALUES (96, 1, 'logout', '2020-02-11 16:15:17', '3');
INSERT INTO `log` VALUES (97, 1, 'login', '2020-02-15 08:22:06', '1');
INSERT INTO `log` VALUES (98, 1, 'logout', '2020-02-15 09:07:30', '3');
INSERT INTO `log` VALUES (99, 37, 'login', '2020-02-15 09:10:27', '1');
INSERT INTO `log` VALUES (100, 37, 'logout', '2020-02-15 09:10:32', '3');
INSERT INTO `log` VALUES (101, 1, 'login', '2020-02-15 09:10:35', '1');
INSERT INTO `log` VALUES (102, 1, 'logout', '2020-02-15 09:19:29', '3');
INSERT INTO `log` VALUES (103, 37, 'login', '2020-02-15 09:19:35', '1');
INSERT INTO `log` VALUES (104, 37, 'logout', '2020-02-15 09:21:37', '3');
INSERT INTO `log` VALUES (105, 1, 'login', '2020-02-15 09:21:40', '1');
INSERT INTO `log` VALUES (106, 1, 'logout', '2020-02-15 09:22:49', '3');
INSERT INTO `log` VALUES (107, 1, 'login', '2020-02-15 09:22:52', '1');
INSERT INTO `log` VALUES (108, 1, 'login', '2020-02-15 10:17:29', '1');
INSERT INTO `log` VALUES (109, 1, 'logout', '2020-02-15 10:24:03', '3');
INSERT INTO `log` VALUES (110, 1, 'login', '2020-02-15 10:24:06', '1');
INSERT INTO `log` VALUES (111, 1, 'logout', '2020-02-15 10:27:17', '3');
INSERT INTO `log` VALUES (112, 1, 'login', '2020-02-15 10:27:20', '1');
INSERT INTO `log` VALUES (113, 1, 'logout', '2020-02-15 10:28:06', '3');
INSERT INTO `log` VALUES (114, 37, 'login', '2020-02-15 10:28:15', '1');
INSERT INTO `log` VALUES (115, 37, 'logout', '2020-02-15 10:28:43', '3');
INSERT INTO `log` VALUES (116, 37, 'login', '2020-02-15 10:28:51', '1');
INSERT INTO `log` VALUES (117, 37, 'logout', '2020-02-15 10:29:27', '3');
INSERT INTO `log` VALUES (118, 1, 'login', '2020-02-15 10:29:30', '1');
INSERT INTO `log` VALUES (119, 1, 'logout', '2020-02-15 10:31:54', '3');
INSERT INTO `log` VALUES (120, 1, 'login', '2020-02-15 10:31:59', '1');
INSERT INTO `log` VALUES (121, 1, 'logout', '2020-02-15 10:33:42', '3');
INSERT INTO `log` VALUES (122, 1, 'login', '2020-02-15 10:33:52', '1');
INSERT INTO `log` VALUES (123, 1, 'logout', '2020-02-15 10:39:27', '3');
INSERT INTO `log` VALUES (124, 36, 'login', '2020-02-15 10:39:35', '1');
INSERT INTO `log` VALUES (125, 36, 'logout', '2020-02-15 10:39:44', '3');
INSERT INTO `log` VALUES (126, 1, 'login', '2020-02-15 10:39:49', '1');
INSERT INTO `log` VALUES (127, 36, 'login', '2020-02-15 11:21:09', '1');
INSERT INTO `log` VALUES (128, 1, 'login', '2020-02-15 12:45:36', '1');
INSERT INTO `log` VALUES (129, 1, 'logout', '2020-02-15 15:13:59', '3');
INSERT INTO `log` VALUES (130, 1, 'login', '2020-02-15 15:39:09', '1');
INSERT INTO `log` VALUES (131, 1, 'logout', '2020-02-15 17:02:04', '3');
INSERT INTO `log` VALUES (132, 1, 'login', '2020-02-15 19:36:05', '1');
INSERT INTO `log` VALUES (133, 1, 'login', '2020-02-16 18:53:35', '1');
INSERT INTO `log` VALUES (134, 1, 'logout', '2020-02-16 21:20:43', '3');
INSERT INTO `log` VALUES (135, 1, 'login', '2020-02-16 21:20:46', '1');
INSERT INTO `log` VALUES (136, 1, 'logout', '2020-02-16 21:21:14', '3');
INSERT INTO `log` VALUES (137, 1, 'login', '2020-02-16 21:21:18', '1');
INSERT INTO `log` VALUES (138, 1, 'logout', '2020-02-16 21:22:10', '3');
INSERT INTO `log` VALUES (139, 1, 'login', '2020-02-16 21:22:14', '1');
INSERT INTO `log` VALUES (140, 1, 'logout', '2020-02-16 21:22:39', '3');
INSERT INTO `log` VALUES (141, 1, 'login', '2020-02-16 21:22:43', '1');
INSERT INTO `log` VALUES (142, 1, 'logout', '2020-02-16 21:23:03', '3');
INSERT INTO `log` VALUES (143, 1, 'login', '2020-02-16 21:23:07', '1');
INSERT INTO `log` VALUES (144, 1, 'login', '2020-02-17 15:42:39', '1');
INSERT INTO `log` VALUES (145, 1, 'login', '2020-02-18 11:41:17', '1');
INSERT INTO `log` VALUES (146, 1, 'login', '2020-02-19 08:35:16', '1');
INSERT INTO `log` VALUES (147, 1, 'login', '2020-02-19 11:02:02', '1');
INSERT INTO `log` VALUES (148, 1, 'login', '2020-02-19 15:37:54', '1');
INSERT INTO `log` VALUES (149, 1, 'logout', '2020-02-19 16:24:59', '3');
INSERT INTO `log` VALUES (150, 1, 'login', '2020-02-19 16:34:19', '1');
INSERT INTO `log` VALUES (151, 1, 'logout', '2020-02-19 17:00:36', '3');
INSERT INTO `log` VALUES (152, 1, 'login', '2020-02-20 08:13:06', '1');
INSERT INTO `log` VALUES (153, 1, 'login', '2020-02-25 13:56:36', '1');
INSERT INTO `log` VALUES (154, 1, 'password salah', '2020-02-26 10:27:11', '3');
INSERT INTO `log` VALUES (155, 1, 'login', '2020-02-26 10:27:15', '1');
INSERT INTO `log` VALUES (156, 1, 'login', '2020-02-27 11:02:42', '1');
INSERT INTO `log` VALUES (157, 1, 'login', '2020-02-27 15:33:44', '1');
INSERT INTO `log` VALUES (158, 1, 'login', '2020-02-29 10:11:49', '1');
INSERT INTO `log` VALUES (159, 1, 'login', '2020-02-29 14:06:33', '1');
INSERT INTO `log` VALUES (160, 1, 'login', '2020-02-29 14:25:14', '1');
INSERT INTO `log` VALUES (161, 1, 'login', '2020-02-29 16:14:54', '1');
INSERT INTO `log` VALUES (162, 1, 'login', '2020-03-02 11:40:30', '1');
INSERT INTO `log` VALUES (163, 1, 'logout', '2020-03-02 11:40:42', '3');
INSERT INTO `log` VALUES (164, 1, 'login', '2020-03-02 11:43:24', '1');
INSERT INTO `log` VALUES (165, 1, 'logout', '2020-03-02 11:43:29', '3');
INSERT INTO `log` VALUES (166, 1, 'login', '2020-03-03 16:03:12', '1');
INSERT INTO `log` VALUES (167, 1, 'login', '2020-03-04 15:49:08', '1');
INSERT INTO `log` VALUES (168, 1, 'logout', '2020-03-04 16:47:26', '3');
INSERT INTO `log` VALUES (169, 1, 'login', '2020-03-05 16:57:42', '1');
INSERT INTO `log` VALUES (170, 1, 'login', '2020-03-09 10:34:08', '1');
INSERT INTO `log` VALUES (171, 1, 'login', '2020-03-09 15:45:42', '1');
INSERT INTO `log` VALUES (172, 1, 'login', '2020-03-10 09:49:51', '1');
INSERT INTO `log` VALUES (173, 1, 'login', '2020-03-10 16:05:27', '1');
INSERT INTO `log` VALUES (174, 1, 'logout', '2020-03-10 16:44:11', '3');
INSERT INTO `log` VALUES (175, 1, 'login', '2020-03-11 07:44:12', '1');
INSERT INTO `log` VALUES (176, 1, 'logout', '2020-03-11 09:29:25', '3');
INSERT INTO `log` VALUES (177, 1, 'login', '2020-03-11 16:09:12', '1');
INSERT INTO `log` VALUES (178, 1, 'login', '2020-03-14 10:42:31', '1');
INSERT INTO `log` VALUES (179, 1, 'login', '2020-03-14 10:44:21', '1');
INSERT INTO `log` VALUES (180, 1, 'login', '2020-03-16 15:00:19', '1');
INSERT INTO `log` VALUES (181, 1, 'login', '2020-03-17 07:56:49', '1');
INSERT INTO `log` VALUES (182, 1, 'logout', '2020-03-17 11:54:37', '3');
INSERT INTO `log` VALUES (183, 1, 'login', '2020-03-17 11:55:35', '1');
INSERT INTO `log` VALUES (184, 1, 'logout', '2020-03-17 11:57:30', '3');
INSERT INTO `log` VALUES (185, 1, 'login', '2020-03-17 12:55:04', '1');
INSERT INTO `log` VALUES (186, 1, 'login', '2020-03-18 11:27:10', '1');
INSERT INTO `log` VALUES (187, 1, 'logout', '2020-03-18 11:31:27', '3');
INSERT INTO `log` VALUES (188, 1, 'login', '2020-03-18 15:36:28', '1');
INSERT INTO `log` VALUES (189, 1, 'logout', '2020-03-18 16:00:51', '3');
INSERT INTO `log` VALUES (190, 1, 'login', '2020-03-18 16:06:25', '1');
INSERT INTO `log` VALUES (191, 1, 'logout', '2020-03-18 16:06:36', '3');
INSERT INTO `log` VALUES (192, 1, 'login', '2020-03-18 16:17:00', '1');
INSERT INTO `log` VALUES (193, 1, 'login', '2020-03-19 08:56:29', '1');
INSERT INTO `log` VALUES (194, 1, 'login', '2020-03-19 11:06:57', '1');
INSERT INTO `log` VALUES (195, 1, 'logout', '2020-03-19 11:48:11', '3');
INSERT INTO `log` VALUES (196, 1, 'login', '2020-03-19 12:49:47', '1');
INSERT INTO `log` VALUES (197, 1, 'login', '2020-03-23 13:50:38', '1');
INSERT INTO `log` VALUES (198, 1, 'logout', '2020-03-23 13:51:08', '3');
INSERT INTO `log` VALUES (199, 1, 'login', '2020-03-23 13:51:12', '1');
INSERT INTO `log` VALUES (200, 1, 'logout', '2020-03-23 14:06:06', '3');
INSERT INTO `log` VALUES (201, 1, 'login', '2020-03-23 14:09:00', '1');
INSERT INTO `log` VALUES (202, 1, 'logout', '2020-03-23 14:09:03', '3');
INSERT INTO `log` VALUES (203, 1, 'login', '2020-03-23 14:09:08', '1');
INSERT INTO `log` VALUES (204, 1, 'logout', '2020-03-23 14:09:18', '3');
INSERT INTO `log` VALUES (205, 1, 'login', '2020-03-23 14:09:35', '1');
INSERT INTO `log` VALUES (206, 1, 'logout', '2020-03-23 14:09:44', '3');
INSERT INTO `log` VALUES (207, 1, 'login', '2020-03-23 14:11:57', '1');
INSERT INTO `log` VALUES (208, 1, 'logout', '2020-03-23 14:12:16', '3');
INSERT INTO `log` VALUES (209, 1, 'login', '2020-03-23 14:15:48', '1');
INSERT INTO `log` VALUES (210, 1, 'logout', '2020-03-23 14:23:01', '3');
INSERT INTO `log` VALUES (211, 1, 'login', '2020-03-23 14:23:05', '1');
INSERT INTO `log` VALUES (212, 1, 'logout', '2020-03-23 14:25:48', '3');
INSERT INTO `log` VALUES (213, 1, 'login', '2020-03-23 14:25:52', '1');
INSERT INTO `log` VALUES (214, 1, 'login', '2020-03-23 20:56:14', '1');
INSERT INTO `log` VALUES (215, 1, 'logout', '2020-03-23 22:23:32', '3');
INSERT INTO `log` VALUES (216, 1, 'login', '2020-03-25 17:11:19', '1');
INSERT INTO `log` VALUES (217, 1, 'logout', '2020-03-25 17:48:36', '3');
INSERT INTO `log` VALUES (218, 1, 'login', '2020-03-25 17:48:44', '1');
INSERT INTO `log` VALUES (219, 1, 'logout', '2020-03-25 19:57:38', '3');
INSERT INTO `log` VALUES (220, 1, 'login', '2020-03-25 19:57:44', '1');
INSERT INTO `log` VALUES (221, 1, 'logout', '2020-03-25 20:22:42', '3');
INSERT INTO `log` VALUES (222, 1, 'login', '2020-03-25 21:05:39', '1');
INSERT INTO `log` VALUES (223, 1, 'login', '2020-03-27 10:35:34', '1');
INSERT INTO `log` VALUES (224, 1, 'login', '2020-03-27 19:44:54', '1');
INSERT INTO `log` VALUES (225, 1, 'login', '2020-03-27 19:54:09', '1');
INSERT INTO `log` VALUES (226, 1, 'logout', '2020-03-27 19:54:13', '3');
INSERT INTO `log` VALUES (227, 29, 'password salah', '2020-03-27 20:01:45', '3');
INSERT INTO `log` VALUES (228, 1, 'login', '2020-03-27 20:01:49', '1');
INSERT INTO `log` VALUES (229, 1, 'logout', '2020-03-27 20:01:54', '3');
INSERT INTO `log` VALUES (230, NULL, 'logout', '2020-03-27 20:02:26', '3');
INSERT INTO `log` VALUES (231, 1, 'login', '2020-03-27 20:02:35', '1');
INSERT INTO `log` VALUES (232, 1, 'logout', '2020-03-27 20:02:37', '3');
INSERT INTO `log` VALUES (233, 37, 'login', '2020-03-27 21:52:00', '1');
INSERT INTO `log` VALUES (234, 37, 'logout', '2020-03-27 21:56:14', '3');
INSERT INTO `log` VALUES (235, 1, 'login', '2020-03-28 09:13:15', '1');
INSERT INTO `log` VALUES (236, 1, 'login', '2020-03-28 11:30:38', '1');
INSERT INTO `log` VALUES (237, 1, 'logout', '2020-03-28 11:32:46', '3');
INSERT INTO `log` VALUES (238, 1, 'login', '2020-03-28 11:32:49', '1');
INSERT INTO `log` VALUES (239, 1, 'login', '2020-03-28 13:37:22', '1');
INSERT INTO `log` VALUES (240, 1, 'logout', '2020-03-28 13:46:08', '3');
INSERT INTO `log` VALUES (241, 1, 'login', '2020-03-28 13:46:15', '1');
INSERT INTO `log` VALUES (242, 1, 'login', '2020-03-30 11:19:46', '1');
INSERT INTO `log` VALUES (243, 1, 'logout', '2020-03-30 11:40:31', '3');
INSERT INTO `log` VALUES (244, 1, 'login', '2020-03-30 14:20:50', '1');
INSERT INTO `log` VALUES (245, 1, 'logout', '2020-03-30 14:45:04', '3');
INSERT INTO `log` VALUES (246, 1, 'login', '2020-03-30 14:45:08', '1');
INSERT INTO `log` VALUES (247, 1, 'logout', '2020-03-30 20:33:39', '3');
INSERT INTO `log` VALUES (248, 1, 'login', '2020-03-30 20:33:45', '1');
INSERT INTO `log` VALUES (249, 1, 'login', '2020-04-01 19:05:30', '1');
INSERT INTO `log` VALUES (250, 1, 'logout', '2020-04-01 22:44:01', '3');
INSERT INTO `log` VALUES (251, 1, 'login', '2020-04-02 19:56:13', '1');
INSERT INTO `log` VALUES (252, 1, 'login', '2020-04-03 11:48:12', '1');
INSERT INTO `log` VALUES (253, 1, 'login', '2020-04-06 12:36:26', '1');
INSERT INTO `log` VALUES (254, 1, 'logout', '2020-04-06 15:37:52', '3');
INSERT INTO `log` VALUES (255, 1, 'login', '2020-04-07 08:58:05', '1');
INSERT INTO `log` VALUES (256, 1, 'logout', '2020-04-07 11:30:10', '3');
INSERT INTO `log` VALUES (257, 38, 'password salah', '2020-04-07 11:30:22', '3');
INSERT INTO `log` VALUES (258, 1, 'login', '2020-04-07 11:30:32', '1');
INSERT INTO `log` VALUES (259, 1, 'logout', '2020-04-07 11:30:50', '3');
INSERT INTO `log` VALUES (260, 38, 'password salah', '2020-04-07 11:30:59', '3');
INSERT INTO `log` VALUES (261, 1, 'login', '2020-04-07 11:31:03', '1');
INSERT INTO `log` VALUES (262, 1, 'logout', '2020-04-07 11:31:20', '3');
INSERT INTO `log` VALUES (263, 38, 'password salah', '2020-04-07 11:31:30', '3');
INSERT INTO `log` VALUES (264, 38, 'password salah', '2020-04-07 11:31:42', '3');
INSERT INTO `log` VALUES (265, 1, 'login', '2020-04-07 11:31:47', '1');
INSERT INTO `log` VALUES (266, 38, 'login', '2020-04-07 11:32:31', '1');
INSERT INTO `log` VALUES (267, 38, 'logout', '2020-04-07 11:35:49', '3');
INSERT INTO `log` VALUES (268, 38, 'login', '2020-04-07 11:48:00', '1');
INSERT INTO `log` VALUES (269, 38, 'logout', '2020-04-07 11:48:32', '3');
INSERT INTO `log` VALUES (270, 38, 'login', '2020-04-07 12:38:28', '1');
INSERT INTO `log` VALUES (271, 38, 'logout', '2020-04-07 12:42:43', '3');
INSERT INTO `log` VALUES (272, 1, 'login', '2020-04-07 13:59:22', '1');
INSERT INTO `log` VALUES (273, 1, 'logout', '2020-04-07 14:01:43', '3');
INSERT INTO `log` VALUES (274, 1, 'login', '2020-04-07 14:01:48', '1');
INSERT INTO `log` VALUES (275, 1, 'login', '2020-04-08 08:31:57', '1');
INSERT INTO `log` VALUES (276, 1, 'logout', '2020-04-08 10:19:48', '3');
INSERT INTO `log` VALUES (277, 38, 'password salah', '2020-04-08 10:20:03', '3');
INSERT INTO `log` VALUES (278, 38, 'password salah', '2020-04-08 10:20:13', '3');
INSERT INTO `log` VALUES (279, 1, 'login', '2020-04-08 10:20:15', '1');
INSERT INTO `log` VALUES (280, 1, 'logout', '2020-04-08 10:20:38', '3');
INSERT INTO `log` VALUES (281, 38, 'login', '2020-04-08 10:20:46', '1');
INSERT INTO `log` VALUES (282, 38, 'logout', '2020-04-08 11:12:38', '3');
INSERT INTO `log` VALUES (283, 1, 'login', '2020-04-08 11:17:06', '1');
INSERT INTO `log` VALUES (284, 38, 'login', '2020-04-08 15:05:22', '1');
INSERT INTO `log` VALUES (285, 38, 'login', '2020-04-11 08:32:09', '1');
INSERT INTO `log` VALUES (286, 38, 'logout', '2020-04-11 11:49:07', '3');
INSERT INTO `log` VALUES (287, 1, 'login', '2020-04-11 13:08:39', '1');
INSERT INTO `log` VALUES (288, 1, 'logout', '2020-04-11 14:10:40', '3');
INSERT INTO `log` VALUES (289, 38, 'login', '2020-04-14 11:20:53', '1');
INSERT INTO `log` VALUES (290, 38, 'login', '2020-04-14 14:07:55', '1');
INSERT INTO `log` VALUES (291, 38, 'logout', '2020-04-14 14:11:04', '3');
INSERT INTO `log` VALUES (292, 38, 'login', '2020-04-15 09:10:17', '1');
INSERT INTO `log` VALUES (293, 38, 'logout', '2020-04-15 09:11:57', '3');
INSERT INTO `log` VALUES (294, 38, 'login', '2020-04-15 09:30:19', '1');
INSERT INTO `log` VALUES (295, 1, 'password salah', '2020-04-15 13:52:30', '3');
INSERT INTO `log` VALUES (296, 1, 'login', '2020-04-15 13:52:36', '1');
INSERT INTO `log` VALUES (297, 1, 'logout', '2020-04-15 13:52:41', '3');
INSERT INTO `log` VALUES (298, 38, 'login', '2020-04-15 13:52:51', '1');
INSERT INTO `log` VALUES (299, 38, 'logout', '2020-04-15 15:03:08', '3');
INSERT INTO `log` VALUES (300, 38, 'login', '2020-04-16 11:10:06', '1');
INSERT INTO `log` VALUES (301, 38, 'login', '2020-04-17 09:26:09', '1');
INSERT INTO `log` VALUES (302, 38, 'logout', '2020-04-17 11:40:19', '3');
INSERT INTO `log` VALUES (303, 1, 'login', '2020-04-21 13:59:43', '1');
INSERT INTO `log` VALUES (304, 1, 'login', '2020-04-21 14:18:57', '1');
INSERT INTO `log` VALUES (305, 38, 'login', '2020-04-22 08:44:31', '1');
INSERT INTO `log` VALUES (306, 1, 'login', '2020-04-23 10:50:00', '1');
INSERT INTO `log` VALUES (307, 1, 'logout', '2020-04-23 10:50:05', '3');
INSERT INTO `log` VALUES (308, 38, 'login', '2020-04-23 10:50:13', '1');
INSERT INTO `log` VALUES (309, 38, 'login', '2020-04-27 08:20:17', '1');
INSERT INTO `log` VALUES (310, 1, 'login', '2020-04-27 14:49:08', '1');
INSERT INTO `log` VALUES (311, 38, 'login', '2020-04-28 14:13:56', '1');
INSERT INTO `log` VALUES (312, 38, 'logout', '2020-04-28 14:14:02', '3');
INSERT INTO `log` VALUES (313, 1, 'login', '2020-04-28 14:14:04', '1');
INSERT INTO `log` VALUES (314, 1, 'logout', '2020-04-28 15:48:10', '3');
INSERT INTO `log` VALUES (315, 1, 'password salah', '2020-04-29 08:07:56', '3');
INSERT INTO `log` VALUES (316, 1, 'login', '2020-04-29 08:07:59', '1');
INSERT INTO `log` VALUES (317, 1, 'logout', '2020-04-29 08:25:23', '3');
INSERT INTO `log` VALUES (318, 38, 'login', '2020-04-29 08:25:30', '1');
INSERT INTO `log` VALUES (319, 38, 'logout', '2020-04-29 08:26:12', '3');
INSERT INTO `log` VALUES (320, 1, 'login', '2020-04-29 08:26:14', '1');
INSERT INTO `log` VALUES (321, 1, 'logout', '2020-04-29 08:28:04', '3');
INSERT INTO `log` VALUES (322, 38, 'login', '2020-04-29 08:28:16', '1');
INSERT INTO `log` VALUES (323, 38, 'login', '2020-04-29 13:18:34', '1');
INSERT INTO `log` VALUES (324, 1, 'login', '2020-05-04 12:37:55', '1');
INSERT INTO `log` VALUES (325, 1, 'logout', '2020-05-04 12:39:39', '3');
INSERT INTO `log` VALUES (326, 38, 'login', '2020-05-04 12:40:06', '1');
INSERT INTO `log` VALUES (327, 38, 'login', '2020-05-05 09:09:00', '1');
INSERT INTO `log` VALUES (328, 38, 'login', '2020-05-05 10:37:40', '1');
INSERT INTO `log` VALUES (329, 38, 'login', '2020-05-05 12:07:39', '1');
INSERT INTO `log` VALUES (330, 38, 'logout', '2020-05-05 12:16:19', '3');
INSERT INTO `log` VALUES (331, 1, 'password salah', '2020-05-05 12:16:23', '3');
INSERT INTO `log` VALUES (332, 38, 'login', '2020-05-05 12:16:31', '1');
INSERT INTO `log` VALUES (333, 38, 'logout', '2020-05-05 12:16:47', '3');
INSERT INTO `log` VALUES (334, 1, 'login', '2020-05-05 12:16:50', '1');
INSERT INTO `log` VALUES (335, 1, 'logout', '2020-05-05 12:17:55', '3');
INSERT INTO `log` VALUES (336, 39, 'login', '2020-05-05 12:17:58', '1');
INSERT INTO `log` VALUES (337, 39, 'login', '2020-05-06 08:31:13', '1');
INSERT INTO `log` VALUES (338, 39, 'login', '2020-05-06 11:32:27', '1');
INSERT INTO `log` VALUES (339, 39, 'logout', '2020-05-06 11:41:58', '3');
INSERT INTO `log` VALUES (340, 1, 'login', '2020-05-06 11:42:22', '1');
INSERT INTO `log` VALUES (341, 1, 'logout', '2020-05-06 11:42:37', '3');
INSERT INTO `log` VALUES (342, 39, 'login', '2020-05-06 12:27:41', '1');
INSERT INTO `log` VALUES (343, 39, 'logout', '2020-05-06 12:28:44', '3');
INSERT INTO `log` VALUES (344, 1, 'password salah', '2020-05-06 12:28:56', '3');
INSERT INTO `log` VALUES (345, 1, 'login', '2020-05-06 12:29:08', '1');
INSERT INTO `log` VALUES (346, 1, 'logout', '2020-05-06 12:32:25', '3');
INSERT INTO `log` VALUES (347, 41, 'login', '2020-05-06 12:32:34', '1');
INSERT INTO `log` VALUES (348, 41, 'logout', '2020-05-06 12:33:13', '3');
INSERT INTO `log` VALUES (349, 1, 'login', '2020-05-06 12:33:29', '1');
INSERT INTO `log` VALUES (350, 1, 'logout', '2020-05-06 12:34:29', '3');
INSERT INTO `log` VALUES (351, 42, 'login', '2020-05-06 12:34:37', '1');
INSERT INTO `log` VALUES (352, 39, 'login', '2020-05-06 13:38:03', '1');
INSERT INTO `log` VALUES (353, 39, 'logout', '2020-05-06 13:38:40', '3');
INSERT INTO `log` VALUES (354, 42, 'logout', '2020-05-06 13:58:02', '3');
INSERT INTO `log` VALUES (355, 44, 'login', '2020-05-06 13:58:41', '1');
INSERT INTO `log` VALUES (356, 44, 'logout', '2020-05-06 13:59:18', '3');
INSERT INTO `log` VALUES (357, 43, 'login', '2020-05-06 13:59:29', '1');
INSERT INTO `log` VALUES (358, 44, 'login', '2020-05-06 14:03:56', '1');
INSERT INTO `log` VALUES (359, 44, 'logout', '2020-05-06 14:04:27', '3');
INSERT INTO `log` VALUES (360, 44, 'login', '2020-05-06 14:04:32', '1');
INSERT INTO `log` VALUES (361, 43, 'logout', '2020-05-06 14:06:12', '3');
INSERT INTO `log` VALUES (362, 40, 'login', '2020-05-06 14:07:08', '1');
INSERT INTO `log` VALUES (363, 40, 'logout', '2020-05-06 14:07:20', '3');
INSERT INTO `log` VALUES (364, 43, 'login', '2020-05-06 14:07:42', '1');
INSERT INTO `log` VALUES (365, 43, 'logout', '2020-05-06 14:07:47', '3');
INSERT INTO `log` VALUES (366, 44, 'login', '2020-05-06 14:07:58', '1');
INSERT INTO `log` VALUES (367, 44, 'logout', '2020-05-06 14:08:04', '3');
INSERT INTO `log` VALUES (368, 39, 'login', '2020-05-06 14:16:11', '1');
INSERT INTO `log` VALUES (369, 39, 'logout', '2020-05-06 14:17:31', '3');
INSERT INTO `log` VALUES (370, 44, 'login', '2020-05-06 14:17:48', '1');
INSERT INTO `log` VALUES (371, 39, 'login', '2020-05-06 14:17:53', '1');
INSERT INTO `log` VALUES (372, 39, 'logout', '2020-05-06 14:18:22', '3');
INSERT INTO `log` VALUES (373, 44, 'logout', '2020-05-06 14:18:49', '3');
INSERT INTO `log` VALUES (374, 39, 'login', '2020-05-06 14:23:59', '1');
INSERT INTO `log` VALUES (375, 39, 'logout', '2020-05-06 14:28:04', '3');
INSERT INTO `log` VALUES (376, 39, 'login', '2020-05-06 17:09:41', '1');
INSERT INTO `log` VALUES (377, 39, 'logout', '2020-05-06 18:43:33', '3');
INSERT INTO `log` VALUES (378, 44, 'login', '2020-05-06 20:31:36', '1');
INSERT INTO `log` VALUES (379, 40, 'login', '2020-05-06 20:46:03', '1');
INSERT INTO `log` VALUES (380, 40, 'logout', '2020-05-06 20:48:54', '3');
INSERT INTO `log` VALUES (381, 39, 'login', '2020-05-07 10:17:47', '1');
INSERT INTO `log` VALUES (382, 39, 'login', '2020-05-07 12:32:09', '1');
INSERT INTO `log` VALUES (383, 44, 'login', '2020-05-07 15:45:17', '1');
INSERT INTO `log` VALUES (384, 44, 'login', '2020-05-07 20:24:18', '1');
INSERT INTO `log` VALUES (385, 42, 'login', '2020-05-08 07:12:31', '1');
INSERT INTO `log` VALUES (386, 42, 'logout', '2020-05-08 07:13:22', '3');
INSERT INTO `log` VALUES (387, 45, 'login', '2020-05-08 07:13:28', '1');
INSERT INTO `log` VALUES (388, 45, 'logout', '2020-05-08 07:17:00', '3');
INSERT INTO `log` VALUES (389, 45, 'login', '2020-05-08 07:20:07', '1');
INSERT INTO `log` VALUES (390, 45, 'login', '2020-05-08 10:59:16', '1');
INSERT INTO `log` VALUES (391, 40, 'login', '2020-05-08 13:43:55', '1');
INSERT INTO `log` VALUES (392, 44, 'login', '2020-05-08 13:44:54', '1');
INSERT INTO `log` VALUES (393, 40, 'logout', '2020-05-08 13:47:36', '3');
INSERT INTO `log` VALUES (394, 38, 'login', '2020-05-09 08:40:33', '1');
INSERT INTO `log` VALUES (395, 38, 'logout', '2020-05-09 08:43:08', '3');
INSERT INTO `log` VALUES (396, 1, 'login', '2020-05-09 08:43:12', '1');
INSERT INTO `log` VALUES (397, 1, 'logout', '2020-05-09 08:44:00', '3');
INSERT INTO `log` VALUES (398, 46, 'login', '2020-05-09 08:44:04', '1');
INSERT INTO `log` VALUES (399, 46, 'logout', '2020-05-09 11:18:23', '3');
INSERT INTO `log` VALUES (400, 1, 'login', '2020-05-09 11:18:50', '1');
INSERT INTO `log` VALUES (401, 1, 'logout', '2020-05-09 11:19:01', '3');
INSERT INTO `log` VALUES (402, 1, 'login', '2020-05-09 11:23:10', '1');
INSERT INTO `log` VALUES (403, 1, 'logout', '2020-05-09 14:12:09', '3');
INSERT INTO `log` VALUES (404, 12, 'login', '2020-05-09 14:12:13', '1');
INSERT INTO `log` VALUES (405, 12, 'logout', '2020-05-09 14:13:44', '3');
INSERT INTO `log` VALUES (406, 12, 'login', '2020-05-09 14:13:48', '1');
INSERT INTO `log` VALUES (407, 12, 'logout', '2020-05-09 14:15:11', '3');
INSERT INTO `log` VALUES (408, 12, 'login', '2020-05-09 14:15:15', '1');
INSERT INTO `log` VALUES (409, 12, 'logout', '2020-05-09 14:35:58', '3');
INSERT INTO `log` VALUES (410, 1, 'login', '2020-05-09 14:36:00', '1');
INSERT INTO `log` VALUES (411, 1, 'logout', '2020-05-09 14:36:26', '3');
INSERT INTO `log` VALUES (412, 1, 'password salah', '2020-05-09 14:36:27', '3');
INSERT INTO `log` VALUES (413, 1, 'login', '2020-05-09 14:36:32', '1');
INSERT INTO `log` VALUES (414, 1, 'logout', '2020-05-09 14:40:42', '3');
INSERT INTO `log` VALUES (415, 29, 'login', '2020-05-09 14:40:45', '1');
INSERT INTO `log` VALUES (416, 29, 'logout', '2020-05-09 14:40:52', '3');
INSERT INTO `log` VALUES (417, 12, 'login', '2020-05-09 14:40:56', '1');
INSERT INTO `log` VALUES (418, 12, 'logout', '2020-05-09 14:50:55', '3');
INSERT INTO `log` VALUES (419, 29, 'login', '2020-05-09 14:50:58', '1');
INSERT INTO `log` VALUES (420, 29, 'logout', '2020-05-09 14:51:57', '3');
INSERT INTO `log` VALUES (421, 12, 'login', '2020-05-09 14:52:01', '1');
INSERT INTO `log` VALUES (422, 1, 'password salah', '2020-05-12 12:14:51', '3');
INSERT INTO `log` VALUES (423, 1, 'password salah', '2020-05-20 08:31:47', '3');
INSERT INTO `log` VALUES (424, 1, 'password salah', '2020-05-20 08:31:51', '3');
INSERT INTO `log` VALUES (425, 1, 'login', '2020-05-20 08:31:56', '1');
INSERT INTO `log` VALUES (426, 1, 'login', '2020-05-20 10:09:11', '1');
INSERT INTO `log` VALUES (427, 1, 'password salah', '2020-05-20 14:18:08', '3');
INSERT INTO `log` VALUES (428, 1, 'login', '2020-05-20 14:18:20', '1');
INSERT INTO `log` VALUES (429, 1, 'logout', '2020-05-20 15:28:27', '3');
INSERT INTO `log` VALUES (430, 1, 'login', '2020-05-20 15:31:55', '1');
INSERT INTO `log` VALUES (431, 1, 'login', '2020-05-23 08:26:54', '1');
INSERT INTO `log` VALUES (432, 1, 'logout', '2020-05-23 08:42:19', '3');
INSERT INTO `log` VALUES (433, 1, 'login', '2020-05-23 08:42:27', '1');
INSERT INTO `log` VALUES (434, 1, 'login', '2020-05-26 08:43:42', '1');
INSERT INTO `log` VALUES (435, 1, 'logout', '2020-05-26 08:58:25', '3');
INSERT INTO `log` VALUES (436, 1, 'login', '2020-05-26 14:21:17', '1');
INSERT INTO `log` VALUES (437, 1, 'login', '2020-05-27 11:17:12', '1');
INSERT INTO `log` VALUES (438, 1, 'logout', '2020-05-27 11:27:21', '3');
INSERT INTO `log` VALUES (439, 1, 'login', '2020-05-27 13:25:59', '1');
INSERT INTO `log` VALUES (440, 1, 'password salah', '2020-05-28 08:59:49', '3');
INSERT INTO `log` VALUES (441, 1, 'login', '2020-05-28 09:00:00', '1');
INSERT INTO `log` VALUES (442, 1, 'password salah', '2020-06-02 17:29:41', '3');
INSERT INTO `log` VALUES (443, 1, 'password salah', '2020-06-02 17:29:46', '3');
INSERT INTO `log` VALUES (444, 1, 'login', '2020-06-02 17:29:50', '1');
INSERT INTO `log` VALUES (445, 1, 'password salah', '2020-06-03 17:01:29', '3');
INSERT INTO `log` VALUES (446, 1, 'login', '2020-06-03 17:01:35', '1');
INSERT INTO `log` VALUES (447, 1, 'logout', '2020-06-03 17:05:38', '3');
INSERT INTO `log` VALUES (448, NULL, 'logout', '2020-06-03 17:10:23', '3');
INSERT INTO `log` VALUES (449, 1, 'password salah', '2020-06-03 17:28:39', '3');
INSERT INTO `log` VALUES (450, 1, 'password salah', '2020-06-04 17:20:10', '3');
INSERT INTO `log` VALUES (451, 1, 'password salah', '2020-06-04 17:20:14', '3');
INSERT INTO `log` VALUES (452, 1, 'password salah', '2020-06-04 17:20:17', '3');
INSERT INTO `log` VALUES (453, 1, 'login', '2020-06-04 17:20:20', '1');
INSERT INTO `log` VALUES (454, 1, 'logout', '2020-06-04 17:33:10', '3');
INSERT INTO `log` VALUES (455, 53, 'login', '2020-06-04 18:37:50', '1');
INSERT INTO `log` VALUES (456, 53, 'logout', '2020-06-04 18:38:19', '3');
INSERT INTO `log` VALUES (457, 1, 'password salah', '2020-06-04 18:38:22', '3');
INSERT INTO `log` VALUES (458, 1, 'login', '2020-06-04 18:38:26', '1');
INSERT INTO `log` VALUES (459, 1, 'logout', '2020-06-04 18:38:59', '3');
INSERT INTO `log` VALUES (460, 53, 'password salah', '2020-06-04 18:39:02', '3');
INSERT INTO `log` VALUES (461, 53, 'login', '2020-06-04 18:39:06', '1');
INSERT INTO `log` VALUES (462, 53, 'logout', '2020-06-04 18:39:15', '3');
INSERT INTO `log` VALUES (463, 1, 'login', '2020-06-04 18:39:17', '1');
INSERT INTO `log` VALUES (464, 1, 'logout', '2020-06-04 18:39:33', '3');
INSERT INTO `log` VALUES (465, 53, 'password salah', '2020-06-04 18:39:37', '3');
INSERT INTO `log` VALUES (466, 1, 'login', '2020-06-04 18:39:41', '1');
INSERT INTO `log` VALUES (467, 1, 'logout', '2020-06-04 18:39:53', '3');
INSERT INTO `log` VALUES (468, 53, 'login', '2020-06-04 18:39:56', '1');
INSERT INTO `log` VALUES (469, 53, 'logout', '2020-06-04 18:40:34', '3');
INSERT INTO `log` VALUES (470, 54, 'password salah', '2020-06-04 18:42:49', '3');
INSERT INTO `log` VALUES (471, 54, 'login', '2020-06-04 18:42:53', '1');
INSERT INTO `log` VALUES (472, 54, 'logout', '2020-06-04 18:42:57', '3');
INSERT INTO `log` VALUES (473, 1, 'password salah', '2020-06-04 19:00:03', '3');
INSERT INTO `log` VALUES (474, 1, 'login', '2020-06-04 19:00:05', '1');
INSERT INTO `log` VALUES (475, 1, 'login', '2020-06-05 08:27:31', '1');
INSERT INTO `log` VALUES (476, 1, 'login', '2020-06-05 12:31:55', '1');
INSERT INTO `log` VALUES (477, 1, 'login', '2020-06-11 10:26:10', '1');
INSERT INTO `log` VALUES (478, 1, 'login', '2020-06-11 11:15:21', '1');
INSERT INTO `log` VALUES (479, 1, 'logout', '2020-06-11 13:10:39', '3');
INSERT INTO `log` VALUES (480, 1, 'password salah', '2020-06-24 09:05:37', '3');
INSERT INTO `log` VALUES (481, 1, 'login', '2020-06-24 09:05:43', '1');
INSERT INTO `log` VALUES (482, NULL, 'logout', '2020-06-24 11:50:57', '3');
INSERT INTO `log` VALUES (483, 1, 'login', '2020-07-01 16:45:10', '1');
INSERT INTO `log` VALUES (484, 1, 'logout', '2020-07-01 16:47:15', '3');
INSERT INTO `log` VALUES (485, 1, 'login', '2020-07-02 08:51:41', '1');
INSERT INTO `log` VALUES (486, 1, 'login', '2020-07-02 09:52:03', '1');
INSERT INTO `log` VALUES (487, 1, 'login', '2020-07-02 10:30:32', '1');
INSERT INTO `log` VALUES (488, 1, 'login', '2020-07-02 12:00:48', '1');
INSERT INTO `log` VALUES (489, 1, 'logout', '2020-07-02 13:45:46', '3');
INSERT INTO `log` VALUES (490, 1, 'login', '2020-07-02 13:45:51', '1');
INSERT INTO `log` VALUES (491, 1, 'logout', '2020-07-02 13:47:37', '3');
INSERT INTO `log` VALUES (492, 55, 'login', '2020-07-02 13:47:46', '1');
INSERT INTO `log` VALUES (493, 55, 'logout', '2020-07-02 13:47:54', '3');
INSERT INTO `log` VALUES (494, 1, 'login', '2020-07-03 12:28:37', '1');
INSERT INTO `log` VALUES (495, 1, 'password salah', '2020-07-07 07:21:10', '3');
INSERT INTO `log` VALUES (496, 1, 'login', '2020-07-07 07:21:15', '1');
INSERT INTO `log` VALUES (497, 1, 'logout', '2020-07-07 07:21:47', '3');
INSERT INTO `log` VALUES (498, 1, 'login', '2020-07-07 07:22:32', '1');
INSERT INTO `log` VALUES (499, 1, 'logout', '2020-07-07 07:23:09', '3');
INSERT INTO `log` VALUES (500, 1, 'login', '2020-07-07 08:34:42', '1');
INSERT INTO `log` VALUES (501, 1, 'login', '2020-07-07 10:42:22', '1');
INSERT INTO `log` VALUES (502, 1, 'login', '2020-07-07 11:09:38', '1');
INSERT INTO `log` VALUES (503, 1, 'login', '2020-07-07 16:02:18', '1');
INSERT INTO `log` VALUES (504, 1, 'login', '2020-07-08 06:56:36', '1');
INSERT INTO `log` VALUES (505, 1, 'login', '2020-07-08 07:04:04', '1');
INSERT INTO `log` VALUES (506, 1, 'login', '2020-07-08 07:06:36', '1');
INSERT INTO `log` VALUES (507, 1, 'login', '2020-07-08 10:01:51', '1');
INSERT INTO `log` VALUES (508, 1, 'login', '2020-07-08 16:28:59', '1');
INSERT INTO `log` VALUES (509, 55, 'password salah', '2020-07-10 10:30:54', '3');
INSERT INTO `log` VALUES (510, 1, 'login', '2020-07-10 10:31:02', '1');
INSERT INTO `log` VALUES (511, 1, 'logout', '2020-07-10 10:32:43', '3');
INSERT INTO `log` VALUES (512, 1, 'login', '2020-07-13 13:45:31', '1');
INSERT INTO `log` VALUES (513, 1, 'logout', '2020-07-13 13:53:49', '3');
INSERT INTO `log` VALUES (514, 55, 'password salah', '2020-07-13 13:53:54', '3');
INSERT INTO `log` VALUES (515, 55, 'password salah', '2020-07-13 13:54:03', '3');
INSERT INTO `log` VALUES (516, 1, 'login', '2020-07-13 13:54:09', '1');
INSERT INTO `log` VALUES (517, 1, 'logout', '2020-07-13 13:54:23', '3');
INSERT INTO `log` VALUES (518, 55, 'password salah', '2020-07-13 13:54:28', '3');
INSERT INTO `log` VALUES (519, 55, 'password salah', '2020-07-13 13:54:35', '3');
INSERT INTO `log` VALUES (520, 55, 'login', '2020-07-13 13:54:41', '1');
INSERT INTO `log` VALUES (521, 55, 'logout', '2020-07-13 13:54:59', '3');
INSERT INTO `log` VALUES (522, 55, 'login', '2020-07-13 13:55:04', '1');
INSERT INTO `log` VALUES (523, 55, 'logout', '2020-07-13 13:55:13', '3');
INSERT INTO `log` VALUES (524, 1, 'login', '2020-07-13 14:40:40', '1');
INSERT INTO `log` VALUES (525, 1, 'logout', '2020-07-13 14:41:37', '3');
INSERT INTO `log` VALUES (526, 1, 'login', '2020-07-13 14:54:17', '1');
INSERT INTO `log` VALUES (527, 1, 'logout', '2020-07-13 14:55:46', '3');
INSERT INTO `log` VALUES (528, 1, 'login', '2020-07-20 11:12:35', '1');
INSERT INTO `log` VALUES (529, 1, 'logout', '2020-07-20 11:29:28', '3');
INSERT INTO `log` VALUES (530, 1, 'login', '2020-07-22 08:45:15', '1');
INSERT INTO `log` VALUES (531, 1, 'logout', '2020-07-22 08:47:06', '3');
INSERT INTO `log` VALUES (532, 1, 'password salah', '2020-07-22 11:00:01', '3');
INSERT INTO `log` VALUES (533, 1, 'login', '2020-07-22 11:00:08', '1');
INSERT INTO `log` VALUES (534, 1, 'logout', '2020-07-22 11:02:35', '3');
INSERT INTO `log` VALUES (535, 1, 'password salah', '2020-08-03 14:44:05', '3');
INSERT INTO `log` VALUES (536, 1, 'login', '2020-08-03 14:44:48', '1');
INSERT INTO `log` VALUES (537, 1, 'login', '2020-08-04 09:58:07', '1');
INSERT INTO `log` VALUES (538, 1, 'logout', '2020-08-04 10:12:29', '3');
INSERT INTO `log` VALUES (539, 55, 'password salah', '2020-08-04 10:12:36', '3');
INSERT INTO `log` VALUES (540, 55, 'password salah', '2020-08-04 10:12:43', '3');
INSERT INTO `log` VALUES (541, 1, 'password salah', '2020-08-04 10:12:47', '3');
INSERT INTO `log` VALUES (542, 1, 'login', '2020-08-04 10:12:52', '1');
INSERT INTO `log` VALUES (543, 1, 'logout', '2020-08-04 10:13:13', '3');
INSERT INTO `log` VALUES (544, 55, 'login', '2020-08-04 10:13:18', '1');
INSERT INTO `log` VALUES (545, 55, 'logout', '2020-08-04 10:13:25', '3');
INSERT INTO `log` VALUES (546, 29, 'password salah', '2020-08-18 13:46:24', '3');
INSERT INTO `log` VALUES (547, 1, 'login', '2020-08-18 13:46:29', '1');
INSERT INTO `log` VALUES (548, 1, 'logout', '2020-08-18 13:49:34', '3');
INSERT INTO `log` VALUES (549, 1, 'login', '2020-08-21 14:19:55', '1');
INSERT INTO `log` VALUES (550, 1, 'password salah', '2020-08-24 13:31:13', '3');
INSERT INTO `log` VALUES (551, 1, 'login', '2020-08-24 13:31:17', '1');
INSERT INTO `log` VALUES (552, 1, 'login', '2020-08-24 17:17:54', '1');
INSERT INTO `log` VALUES (553, 1, 'logout', '2020-08-24 17:32:59', '3');
INSERT INTO `log` VALUES (554, 1, 'login', '2020-08-24 17:42:04', '1');
INSERT INTO `log` VALUES (555, 1, 'logout', '2020-08-24 17:42:49', '3');
INSERT INTO `log` VALUES (556, 1, 'login', '2020-08-24 17:49:31', '1');
INSERT INTO `log` VALUES (557, 1, 'logout', '2020-08-24 17:49:36', '3');
INSERT INTO `log` VALUES (558, 1, 'login', '2020-08-24 17:59:48', '1');
INSERT INTO `log` VALUES (559, 1, 'logout', '2020-08-24 18:12:36', '3');
INSERT INTO `log` VALUES (560, 1, 'login', '2020-08-24 18:12:38', '1');
INSERT INTO `log` VALUES (561, 1, 'logout', '2020-08-24 18:14:55', '3');
INSERT INTO `log` VALUES (562, 1, 'login', '2020-08-24 18:14:56', '1');
INSERT INTO `log` VALUES (563, 1, 'logout', '2020-08-24 18:16:06', '3');
INSERT INTO `log` VALUES (564, 1, 'login', '2020-08-24 18:16:08', '1');
INSERT INTO `log` VALUES (565, 1, 'logout', '2020-08-24 18:20:16', '3');
INSERT INTO `log` VALUES (566, 1, 'login', '2020-08-24 18:20:18', '1');
INSERT INTO `log` VALUES (567, 1, 'logout', '2020-08-24 18:22:10', '3');
INSERT INTO `log` VALUES (568, 1, 'login', '2020-08-24 18:22:11', '1');
INSERT INTO `log` VALUES (569, 1, 'logout', '2020-08-24 18:41:32', '3');
INSERT INTO `log` VALUES (570, 1, 'login', '2020-08-24 18:41:34', '1');
INSERT INTO `log` VALUES (571, 1, 'logout', '2020-08-24 18:58:31', '3');
INSERT INTO `log` VALUES (572, 1, 'password salah', '2020-08-24 18:59:50', '3');
INSERT INTO `log` VALUES (573, 1, 'login', '2020-08-24 18:59:57', '1');
INSERT INTO `log` VALUES (574, 1, 'logout', '2020-08-24 19:41:42', '3');
INSERT INTO `log` VALUES (575, 56, 'login', '2020-08-24 19:41:47', '1');
INSERT INTO `log` VALUES (576, 56, 'logout', '2020-08-24 19:49:22', '3');
INSERT INTO `log` VALUES (577, 1, 'login', '2020-08-25 08:09:15', '1');
INSERT INTO `log` VALUES (578, 1, 'logout', '2020-08-25 08:13:25', '3');
INSERT INTO `log` VALUES (579, 1, 'login', '2020-08-25 08:15:30', '1');
INSERT INTO `log` VALUES (580, 1, 'logout', '2020-08-25 08:20:09', '3');
INSERT INTO `log` VALUES (581, 1, 'login', '2020-08-25 08:20:13', '1');
INSERT INTO `log` VALUES (582, 1, 'logout', '2020-08-25 08:57:24', '3');
INSERT INTO `log` VALUES (583, 56, 'login', '2020-08-25 08:57:32', '1');
INSERT INTO `log` VALUES (584, 56, 'logout', '2020-08-25 09:00:19', '3');
INSERT INTO `log` VALUES (585, 1, 'login', '2020-08-25 09:01:21', '1');
INSERT INTO `log` VALUES (586, 1, 'logout', '2020-08-25 09:03:34', '3');
INSERT INTO `log` VALUES (587, 57, 'login', '2020-08-25 09:03:40', '1');
INSERT INTO `log` VALUES (588, 57, 'logout', '2020-08-25 09:04:54', '3');
INSERT INTO `log` VALUES (589, 1, 'login', '2020-08-25 09:05:01', '1');
INSERT INTO `log` VALUES (590, 1, 'logout', '2020-08-25 09:06:28', '3');
INSERT INTO `log` VALUES (591, 57, 'login', '2020-08-25 09:06:34', '1');
INSERT INTO `log` VALUES (592, 57, 'logout', '2020-08-25 09:08:20', '3');
INSERT INTO `log` VALUES (593, 57, 'login', '2020-08-25 09:08:26', '1');
INSERT INTO `log` VALUES (594, 57, 'logout', '2020-08-25 09:19:31', '3');
INSERT INTO `log` VALUES (595, 1, 'password salah', '2020-08-25 13:22:17', '3');
INSERT INTO `log` VALUES (596, 1, 'login', '2020-08-25 13:22:22', '1');
INSERT INTO `log` VALUES (597, 1, 'logout', '2020-08-25 13:32:24', '3');
INSERT INTO `log` VALUES (598, 1, 'login', '2020-08-25 13:32:52', '1');
INSERT INTO `log` VALUES (599, 1, 'logout', '2020-08-25 13:45:36', '3');
INSERT INTO `log` VALUES (600, 1, 'login', '2020-08-25 14:52:38', '1');
INSERT INTO `log` VALUES (601, 1, 'logout', '2020-08-25 14:52:52', '3');
INSERT INTO `log` VALUES (602, 57, 'login', '2020-08-26 12:52:47', '1');
INSERT INTO `log` VALUES (603, 57, 'logout', '2020-08-26 12:52:55', '3');
INSERT INTO `log` VALUES (604, 57, 'login', '2020-08-26 12:53:58', '1');
INSERT INTO `log` VALUES (605, 57, 'logout', '2020-08-26 13:32:02', '3');
INSERT INTO `log` VALUES (606, 1, 'login', '2020-08-26 13:32:06', '1');
INSERT INTO `log` VALUES (607, 1, 'logout', '2020-08-26 13:32:50', '3');
INSERT INTO `log` VALUES (608, 57, 'login', '2020-08-26 14:06:28', '1');
INSERT INTO `log` VALUES (609, 57, 'logout', '2020-08-26 14:12:48', '3');
INSERT INTO `log` VALUES (610, 1, 'login', '2020-08-26 14:12:53', '1');
INSERT INTO `log` VALUES (611, 1, 'logout', '2020-08-26 16:19:12', '3');
INSERT INTO `log` VALUES (612, 1, 'login', '2020-08-26 17:07:49', '1');
INSERT INTO `log` VALUES (613, 1, 'login', '2020-08-26 17:38:09', '1');
INSERT INTO `log` VALUES (614, 1, 'logout', '2020-08-26 19:05:34', '3');
INSERT INTO `log` VALUES (615, 57, 'login', '2020-08-26 19:05:40', '1');
INSERT INTO `log` VALUES (616, 57, 'logout', '2020-08-26 19:05:52', '3');
INSERT INTO `log` VALUES (617, 57, 'login', '2020-08-26 19:13:55', '1');
INSERT INTO `log` VALUES (618, 57, 'logout', '2020-08-26 19:33:15', '3');
INSERT INTO `log` VALUES (619, 1, 'login', '2020-08-26 19:33:24', '1');
INSERT INTO `log` VALUES (620, 1, 'logout', '2020-08-26 19:48:55', '3');
INSERT INTO `log` VALUES (621, 57, 'login', '2020-08-27 14:02:18', '1');
INSERT INTO `log` VALUES (622, 57, 'logout', '2020-08-27 14:04:40', '3');
INSERT INTO `log` VALUES (623, 1, 'login', '2020-08-27 14:04:46', '1');
INSERT INTO `log` VALUES (624, 1, 'logout', '2020-08-27 14:05:23', '3');
INSERT INTO `log` VALUES (625, 1, 'login', '2020-08-27 14:59:59', '1');
INSERT INTO `log` VALUES (626, 56, 'password salah', '2020-08-31 09:22:45', '3');
INSERT INTO `log` VALUES (627, 56, 'login', '2020-08-31 09:22:50', '1');
INSERT INTO `log` VALUES (628, 56, 'logout', '2020-08-31 09:29:32', '3');
INSERT INTO `log` VALUES (629, 56, 'login', '2020-08-31 09:30:12', '1');
INSERT INTO `log` VALUES (630, 56, 'logout', '2020-08-31 09:36:44', '3');
INSERT INTO `log` VALUES (631, 56, 'login', '2020-09-01 10:58:33', '1');
INSERT INTO `log` VALUES (632, 1, 'login', '2020-09-01 11:29:31', '1');
INSERT INTO `log` VALUES (633, 1, 'logout', '2020-09-01 11:30:36', '3');
INSERT INTO `log` VALUES (634, 58, 'login', '2020-09-01 11:30:42', '1');
INSERT INTO `log` VALUES (635, 58, 'logout', '2020-09-01 11:30:52', '3');
INSERT INTO `log` VALUES (636, 57, 'login', '2020-09-01 11:30:58', '1');
INSERT INTO `log` VALUES (637, 57, 'logout', '2020-09-01 11:31:04', '3');
INSERT INTO `log` VALUES (638, 1, 'login', '2020-09-01 11:31:09', '1');
INSERT INTO `log` VALUES (639, 1, 'logout', '2020-09-01 11:31:54', '3');
INSERT INTO `log` VALUES (640, 58, 'login', '2020-09-01 11:32:03', '1');
INSERT INTO `log` VALUES (641, 58, 'login', '2020-09-02 13:19:04', '1');
INSERT INTO `log` VALUES (642, 56, 'login', '2020-09-08 14:56:24', '1');
INSERT INTO `log` VALUES (643, 1, 'login', '2020-09-08 19:31:58', '1');
INSERT INTO `log` VALUES (644, 56, 'login', '2020-09-09 15:43:52', '1');
INSERT INTO `log` VALUES (645, 56, 'logout', '2020-09-09 15:47:55', '3');
INSERT INTO `log` VALUES (646, 56, 'login', '2020-09-10 09:18:21', '1');
INSERT INTO `log` VALUES (647, 56, 'logout', '2020-09-10 09:18:56', '3');
INSERT INTO `log` VALUES (648, 56, 'login', '2020-09-10 09:19:13', '1');
INSERT INTO `log` VALUES (649, 57, 'password salah', '2020-09-10 12:28:56', '3');
INSERT INTO `log` VALUES (650, 57, 'login', '2020-09-10 12:29:03', '1');
INSERT INTO `log` VALUES (651, 57, 'logout', '2020-09-10 12:37:19', '3');
INSERT INTO `log` VALUES (652, 29, 'password salah', '2020-09-10 12:37:25', '3');
INSERT INTO `log` VALUES (653, 1, 'login', '2020-09-10 12:37:30', '1');
INSERT INTO `log` VALUES (654, 1, 'logout', '2020-09-10 12:44:14', '3');
INSERT INTO `log` VALUES (655, 56, 'login', '2020-09-10 13:47:10', '1');
INSERT INTO `log` VALUES (656, 56, 'logout', '2020-09-10 16:44:19', '3');
INSERT INTO `log` VALUES (657, 1, 'login', '2020-09-10 17:35:44', '1');
INSERT INTO `log` VALUES (658, 1, 'logout', '2020-09-10 17:41:54', '3');
INSERT INTO `log` VALUES (659, 57, 'login', '2020-09-10 17:42:00', '1');
INSERT INTO `log` VALUES (660, 57, 'logout', '2020-09-10 17:42:52', '3');
INSERT INTO `log` VALUES (661, 58, 'login', '2020-09-10 17:43:16', '1');
INSERT INTO `log` VALUES (662, 58, 'logout', '2020-09-10 17:43:31', '3');
INSERT INTO `log` VALUES (663, 1, 'login', '2020-09-10 18:45:41', '1');
INSERT INTO `log` VALUES (664, 56, 'login', '2020-09-10 19:41:23', '1');
INSERT INTO `log` VALUES (665, 1, 'logout', '2020-09-10 19:48:19', '3');
INSERT INTO `log` VALUES (666, 57, 'login', '2020-09-10 19:48:27', '1');
INSERT INTO `log` VALUES (667, 57, 'logout', '2020-09-10 19:58:56', '3');
INSERT INTO `log` VALUES (668, 1, 'login', '2020-09-10 19:59:03', '1');
INSERT INTO `log` VALUES (669, 56, 'login', '2020-09-11 10:22:52', '1');
INSERT INTO `log` VALUES (670, 56, 'login', '2020-09-11 15:44:24', '1');
INSERT INTO `log` VALUES (671, 1, 'password salah', '2020-09-12 09:34:59', '3');
INSERT INTO `log` VALUES (672, 1, 'login', '2020-09-12 09:35:02', '1');
INSERT INTO `log` VALUES (673, 1, 'logout', '2020-09-12 10:21:38', '3');
INSERT INTO `log` VALUES (674, 57, 'login', '2020-09-12 10:21:45', '1');
INSERT INTO `log` VALUES (675, 56, 'login', '2020-09-12 11:19:33', '1');
INSERT INTO `log` VALUES (676, 56, 'login', '2020-09-14 09:19:51', '1');
INSERT INTO `log` VALUES (677, 1, 'login', '2020-09-14 13:19:25', '1');
INSERT INTO `log` VALUES (678, 56, 'login', '2020-09-14 14:39:31', '1');
INSERT INTO `log` VALUES (679, 1, 'login', '2020-09-15 08:46:44', '1');
INSERT INTO `log` VALUES (680, 1, 'logout', '2020-09-15 08:48:12', '3');
INSERT INTO `log` VALUES (681, 56, 'login', '2020-09-15 14:32:21', '1');
INSERT INTO `log` VALUES (682, 1, 'login', '2020-09-16 08:07:30', '1');
INSERT INTO `log` VALUES (683, 1, 'logout', '2020-09-16 08:07:58', '3');
INSERT INTO `log` VALUES (684, 59, 'login', '2020-09-16 08:08:03', '1');
INSERT INTO `log` VALUES (685, 56, 'login', '2020-09-16 09:17:28', '1');
INSERT INTO `log` VALUES (686, 1, 'login', '2020-09-18 15:55:53', '1');
INSERT INTO `log` VALUES (687, 56, 'login', '2020-09-18 16:33:35', '1');
INSERT INTO `log` VALUES (688, 56, 'logout', '2020-09-18 16:52:56', '3');
INSERT INTO `log` VALUES (689, 56, 'login', '2020-09-21 10:02:01', '1');
INSERT INTO `log` VALUES (690, 1, 'login', '2020-09-21 13:19:29', '1');
INSERT INTO `log` VALUES (691, 56, 'login', '2020-09-22 10:01:45', '1');
INSERT INTO `log` VALUES (692, 56, 'login', '2020-09-22 15:23:21', '1');
INSERT INTO `log` VALUES (693, 1, 'login', '2020-09-22 15:35:20', '1');
INSERT INTO `log` VALUES (694, 1, 'logout', '2020-09-22 16:02:15', '3');
INSERT INTO `log` VALUES (695, 1, 'password salah', '2020-09-22 16:56:10', '3');
INSERT INTO `log` VALUES (696, 1, 'login', '2020-09-22 16:56:16', '1');
INSERT INTO `log` VALUES (697, 56, 'login', '2020-09-23 09:17:12', '1');
INSERT INTO `log` VALUES (698, 56, 'login', '2020-09-23 10:40:51', '1');
INSERT INTO `log` VALUES (699, 57, 'login', '2020-09-23 12:46:32', '1');
INSERT INTO `log` VALUES (700, 57, 'logout', '2020-09-23 12:46:58', '3');
INSERT INTO `log` VALUES (701, 1, 'login', '2020-09-23 12:47:03', '1');
INSERT INTO `log` VALUES (702, 1, 'logout', '2020-09-23 12:53:05', '3');
INSERT INTO `log` VALUES (703, 57, 'login', '2020-09-23 12:53:12', '1');
INSERT INTO `log` VALUES (704, 57, 'login', '2020-09-23 20:06:40', '1');
INSERT INTO `log` VALUES (705, 57, 'logout', '2020-09-23 20:10:22', '3');
INSERT INTO `log` VALUES (706, 1, 'login', '2020-09-23 20:10:26', '1');
INSERT INTO `log` VALUES (707, 56, 'login', '2020-09-24 09:18:50', '1');
INSERT INTO `log` VALUES (708, 56, 'login', '2020-09-24 13:09:55', '1');
INSERT INTO `log` VALUES (709, 1, 'password salah', '2020-09-24 13:11:04', '3');
INSERT INTO `log` VALUES (710, 1, 'login', '2020-09-24 13:11:09', '1');
INSERT INTO `log` VALUES (711, 1, 'logout', '2020-09-24 13:11:34', '3');
INSERT INTO `log` VALUES (712, 1, 'login', '2020-09-24 13:41:33', '1');
INSERT INTO `log` VALUES (713, 1, 'logout', '2020-09-24 13:42:56', '3');
INSERT INTO `log` VALUES (714, 56, 'logout', '2020-09-24 15:57:40', '3');
INSERT INTO `log` VALUES (715, 56, 'login', '2020-09-25 09:29:27', '1');
INSERT INTO `log` VALUES (716, 56, 'logout', '2020-09-25 09:53:32', '3');
INSERT INTO `log` VALUES (717, 56, 'login', '2020-09-25 14:31:48', '1');
INSERT INTO `log` VALUES (718, 1, 'login', '2020-09-28 08:53:16', '1');
INSERT INTO `log` VALUES (719, 1, 'logout', '2020-09-28 10:23:20', '3');
INSERT INTO `log` VALUES (720, 57, 'login', '2020-09-28 10:23:27', '1');
INSERT INTO `log` VALUES (721, 57, 'logout', '2020-09-28 10:28:38', '3');
INSERT INTO `log` VALUES (722, 1, 'login', '2020-09-28 10:28:40', '1');
INSERT INTO `log` VALUES (723, 56, 'login', '2020-09-28 11:20:00', '1');
INSERT INTO `log` VALUES (724, 56, 'logout', '2020-09-28 11:22:05', '3');
INSERT INTO `log` VALUES (725, 1, 'login', '2020-09-28 12:45:54', '1');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_ikon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_is_mainmenu` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_akses_level` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_urutan` int(5) NULL DEFAULT NULL,
  `menu_status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_akses` int(2) NULL DEFAULT NULL,
  `menu_baru` int(2) NULL DEFAULT NULL,
  `menu_label` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 202 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (9, 'user', 'flaticon-layers', '102', 'Setting/User', '1', 1, '1', 1, NULL, NULL);
INSERT INTO `menu` VALUES (102, 'setting', 'flaticon-settings', '0', 'Setting', '1,3', 90, '1', 1, 0, NULL);
INSERT INTO `menu` VALUES (103, 'dashboard', 'flaticon-home', '0', 'Dashboard/Dashboard', '1,8', 1, '1', 1, 0, NULL);
INSERT INTO `menu` VALUES (104, 'log', ' flaticon-time', '0', 'Log/Log', '1', 91, '1', 1, 2, NULL);
INSERT INTO `menu` VALUES (105, 'logout', 'flaticon-arrow', '0', 'Login/logout', '1,2,3', 99, '1', 1, NULL, NULL);
INSERT INTO `menu` VALUES (111, 'level', 'flaticon-setting', '102', 'Setting/level', '1', 2, '1', 1, NULL, NULL);
INSERT INTO `menu` VALUES (112, 'menu_akses', 'flaticon-setting', '102', 'Setting/menuakses', '1', 3, '1', 1, NULL, NULL);
INSERT INTO `menu` VALUES (113, 'backup', 'flaticon-setting', '102', 'Setting/backup', '1', 4, '1', 1, 2, NULL);
INSERT INTO `menu` VALUES (114, 'import', 'flaticon-file', '0', 'Import/admin', '1', 6, '0', 1, NULL, NULL);
INSERT INTO `menu` VALUES (116, 'sistem', 'flaticon-seting', '102', 'Setting/sistem', '1', 5, '1', 1, 2, NULL);
INSERT INTO `menu` VALUES (152, 'font_awesome', 'flaticon-file', '102', 'Setting/fontawesome', '1', 8, '1', 1, 0, NULL);
INSERT INTO `menu` VALUES (165, 'registrasi', 'flaticon-file', '0', 'Registrasi/Registrasi', '1,2', 1, '', 1, 1, NULL);
INSERT INTO `menu` VALUES (166, 'registrasi', 'flaticon-file', '165', 'Registrasi/Registrasidetail', '1', 1, '0', 1, NULL, NULL);
INSERT INTO `menu` VALUES (167, 'Berkas', 'flaticon-file', '0', 'Berkas/berkas', '1', 5, '', 1, 0, NULL);
INSERT INTO `menu` VALUES (169, 'master', 'flaticon-file', '0', 'Master', '1', 2, '1', 1, NULL, NULL);
INSERT INTO `menu` VALUES (170, 'kategori', 'flaticon-file', '169', 'Master/Kategori', '1', 1, '1', 1, NULL, NULL);
INSERT INTO `menu` VALUES (171, 'berkas', 'flaticon-file', '169', 'Master/Berkas', '1', 2, '1', 1, NULL, NULL);
INSERT INTO `menu` VALUES (190, 'support', 'flaticon-file', '0', 'Support', '1,2,6,7,8', 6, '1', 1, 0, NULL);
INSERT INTO `menu` VALUES (191, 'troubelshoot', 'flaticon-file', '190', 'Support/Troubleshoot', '1,2,6,7', 1, '1', 1, 0, NULL);
INSERT INTO `menu` VALUES (192, 'notulen', 'flaticon-file', '0', 'Notulen/Notulen', '1,6,7', 7, '1', 1, NULL, NULL);
INSERT INTO `menu` VALUES (193, 'ip_address', 'flaticon-file', '169', 'Master/Ipaddress', '1,6,7', 3, '1', 1, NULL, NULL);
INSERT INTO `menu` VALUES (194, 'surat', 'flaticon-file', '0', 'Surat', '1,6,7', 6, '1', 1, NULL, NULL);
INSERT INTO `menu` VALUES (195, 'serah_terima_pekerjaan', 'flaticon-file', '194', 'It/Serahterimapekerjaan', '1,6,7', 1, '1', 1, 0, NULL);
INSERT INTO `menu` VALUES (196, 'sistem', 'flaticon-file', '190', 'Support/sistem', '1,2,6,7,8', 2, '1', 1, 0, NULL);
INSERT INTO `menu` VALUES (198, 'upload', 'flaticon-file', '0', 'Upload/upload', '1,2,6,7,8', 7, '1', 1, NULL, NULL);
INSERT INTO `menu` VALUES (199, 'laporan', 'flaticon-file', '0', 'Laporan', '1', 8, '1', 1, NULL, NULL);
INSERT INTO `menu` VALUES (200, 'lap_trobel', 'flaticon-file', '199', 'Laporan/Trobel', '1', 1, '1', 1, NULL, NULL);
INSERT INTO `menu` VALUES (201, 'lap_sistem', 'flaticon-file', '199', 'Laporan/Sistem', '1', 2, '1', 1, NULL, NULL);

-- ----------------------------
-- Table structure for notulen
-- ----------------------------
DROP TABLE IF EXISTS `notulen`;
CREATE TABLE `notulen`  (
  `notulen_id` int(11) NOT NULL AUTO_INCREMENT,
  `notulen_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `notulen_isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `notulen_param` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `notulen_status` bit(1) NULL DEFAULT NULL,
  `notulen_iduser` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`notulen_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notulen
-- ----------------------------
INSERT INTO `notulen` VALUES (2, 'Vaksin mpr', 'sesi 1\r\n1. px vaksin dianggap sebagai Uang Muka saat appointment untuk tindakan di hari H\r\n2. px membayrakan sejumlah uang total per paket vaksin yg telah disetujui\r\n\r\nsesi 2 hari H\r\n1. admisi mendaftarkan px dihari H dari list daftar pasien di sesi1\r\n\r\n2. dokter/perawat input tindakan vaksin dan tindakan medis\r\n2a. apabila ada tambahan obat dokter input via emr\r\n\r\n3. kasir memproses pembayaran dari uang yg telah diterima di sesi 1 (secara sistem saja)\r\n3a. apabila ada tambahan inputan obat/tindakan diluar harga yg sudah disepakati di sesi 1, kasir memproses kurang bayar px diluar paket sesi1\r\n\r\n\r\nNyiapain\r\n1. Laptop dokter\r\n2. Aio ke salvia\r\nPindahan magnolia\r\n3. Printer', '312gws4', b'0', 1, '2020-05-28 09:09:32');
INSERT INTO `notulen` VALUES (3, 'Simulasi PO gizi', 'Rapat koordinasi, implementasi sistem pengaadan barang di unit gizi\r\nPenentuan alur disistem\r\nPenyesuaian form tampilan pada menu pengadaan\r\nAlur aproval pengadaan barang di sistem', '5n9hw6a', b'0', 1, '2020-06-11 13:10:34');
INSERT INTO `notulen` VALUES (4, 'Rapat pkpo', 'Motong video untuk akreditasi\r\nCover buku saku\r\nCetak buku saku', '4pv6hwoj', b'0', 1, '2020-07-02 10:04:59');
INSERT INTO `notulen` VALUES (5, 'Rapat EMR VK', '<ol><li>Keabsahan tanda tangan\r\n-dibuatkan upload ttd masing - masing user dokter, </li><li>tanda tangan virtual\r\n- Laporan dimasukkan ke sistem, biar tersimpan\r\n- tanda tangan \r\n- jika ada permintaan dari asuransi akan dicetak</li></ol>', '5nngrwbfj', b'0', 1, '2020-08-24 18:44:18');
INSERT INTO `notulen` VALUES (7, 'HPK', 'Dr. Rr.Tutik Sri Hariyati, SKp.,MARS is inviting you to a scheduled Zoom meeting.\r\n\r\nTopic: Bimbingan HPK SKP RSUII\r\nTime: Jul 7, 2020 07:30 AM Jakarta\r\n\r\nJoin Zoom Meeting\r\nhttps://us02web.zoom.us/j/81819828474?pwd=TzVHcndCNFpWSFZDNnhITzh3WE41UT09\r\n\r\nMeeting ID: 818 1982 8474\r\nPassword: 483002\r\nOne tap mobile\r\n+12532158782,,81819828474#,,,,0#,,483002# US (Tacoma)\r\n+13017158592,,81819828474#,,,,0#,,483002# US (Germantown)\r\n\r\nDial by your location\r\n        +1 253 215 8782 US (Tacoma)\r\n        +1 301 715 8592 US (Germantown)\r\n        +1 312 626 6799 US (Chicago)\r\n        +1 346 248 7799 US (Houston)\r\n        +1 669 900 6833 US (San Jose)\r\n        +1 929 436 2866 US (New York)\r\nMeeting ID: 818 1982 8474\r\nPassword: 483002\r\nFind your local number: https://us02web.zoom.us/u/kcLo7yQ1tZ', '5de23hsp', b'0', 1, '2020-07-07 07:21:31');
INSERT INTO `notulen` VALUES (8, 'TKRS', 'nina sekartina is inviting you to a scheduled Zoom meeting.\r\n\r\nTopic: bimbingan on line\r\nTime: Jul 8, 2020 08:00 AM Jakarta\r\n\r\nJoin Zoom Meeting\r\nhttps://us02web.zoom.us/j/89009209910?pwd=RHZhQmZxcGVwT1BXUkRENmVHSndqQT09\r\n\r\nMeeting ID: 890 0920 9910\r\nPassword: 220667\r\nOne tap mobile\r\n+16699006833,,89009209910#,,,,0#,,220667# US (San Jose)\r\n+19292056099,,89009209910#,,,,0#,,220667# US (New York)\r\n\r\nDial by your location\r\n        +1 669 900 6833 US (San Jose)\r\n        +1 929 205 6099 US (New York)\r\n        +1 253 215 8782 US (Tacoma)\r\n        +1 301 715 8592 US (Germantown)\r\n        +1 312 626 6799 US (Chicago)\r\n        +1 346 248 7799 US (Houston)\r\nMeeting ID: 890 0920 9910\r\nPassword: 220667\r\nFind your local number: https://us02web.zoom.us/u/kdwV9Wl6I', '4e662m8', b'0', 1, '2020-07-08 07:04:45');
INSERT INTO `notulen` VALUES (9, 'ADMIN RADIOLOGI', 'ADMINRSUII', '1f810ox0l', b'0', 1, '2020-09-15 08:47:53');

-- ----------------------------
-- Table structure for serahterimapekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `serahterimapekerjaan`;
CREATE TABLE `serahterimapekerjaan`  (
  `serahterimapekerjaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `serahterimapekerjaan_iduser` int(255) NULL DEFAULT NULL,
  `serahterimapekerjaan_nomor` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `serahterimapekerjaan_bulan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `serahterimapekerjaan_tanggal` datetime(0) NULL DEFAULT NULL,
  `serahterimapekerjaan_catatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `serahterimapekerjaan_jabatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `serahterimapekerjaan_pemohon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `serahterimapekerjaan_pengajuan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `serahterimapekerjaan_berkas` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`serahterimapekerjaan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 89 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of serahterimapekerjaan
-- ----------------------------
INSERT INTO `serahterimapekerjaan` VALUES (84, 1, '001/K.3/MPR-IT/RSUII/V/2020', 'mei', '2020-05-14 00:00:00', '', 'Spv. keperawatan', 'Retno daryanti', 'Penambahan kalimat No di surat kematian dan rujukan\r\nPenambahan ICDX untuk covid 19\r\nPenambhaan kolom di laporan kematian kode RM00020', '2020-05-14 16:01:30', '13e1a5439592a2a81ceab7229c348721.docx');
INSERT INTO `serahterimapekerjaan` VALUES (86, 1, '002/K.3/MPR-IT/RSUII/V/2020', 'mei', '2020-05-14 00:00:00', '', 'Koor. Rekam Medis', 'Trimulyati', 'Pengajuan penulisan no pada surat rujukan dan kematian\r\nPengajuan ICDX', '2020-05-27 11:29:22', NULL);
INSERT INTO `serahterimapekerjaan` VALUES (87, 1, '003/K.3/MPR-IT/RSUII/V/2020', 'mei', '2020-05-14 00:00:00', '', 'Koor. Fin Conn', 'Fafang', 'Pengajuan/revisi laporan tera', '2020-05-27 11:30:17', NULL);
INSERT INTO `serahterimapekerjaan` VALUES (88, 1, '004/K.3/MPR-IT/RSUII/V/2020', 'mei', '2020-05-27 00:00:00', '', 'koor.Purchasing', 'yuanda Aji', 'Perubahan role user yuanda aji(Pak Ajik) seperti mas wahyu(diganti)\r\nPengantian nama di kolom ttd di surat yang dikeluarkan gudang ', '2020-05-27 11:31:55', NULL);

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_namasistem` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `setting_namatempat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `setting_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `setting_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `setting_notlp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `setting_logo` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `setting_namapemilik` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`setting_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES (1, 'IT SUPPORT', 'Array Motion', 'Rumah Sakit UII', 'it@rsuii.co.id', '(0274) 2812-999', '0a3082d75e0e87f6bda77bb48186a8ae.png', 'Duwi haryanto');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`status_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 'open', '2020-05-09 11:05:20');
INSERT INTO `status` VALUES (2, 'close', '2020-05-09 11:05:22');
INSERT INTO `status` VALUES (3, 'pending', '2020-05-09 11:05:31');
INSERT INTO `status` VALUES (4, 'not_solved', '2020-05-09 11:06:03');
INSERT INTO `status` VALUES (5, 'email', '2020-09-08 19:33:28');
INSERT INTO `status` VALUES (6, 'proses', '2020-09-10 17:40:00');

-- ----------------------------
-- Table structure for trobelsistem
-- ----------------------------
DROP TABLE IF EXISTS `trobelsistem`;
CREATE TABLE `trobelsistem`  (
  `trobelsistem_id` int(11) NOT NULL AUTO_INCREMENT,
  `trobelsistem_ticket` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `trobelsistem_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `trobelsistem_deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `trobelsistem_tglselesai` date NULL DEFAULT NULL,
  `trobelsistem_idstatus` int(255) NULL DEFAULT NULL,
  `trobelsistem_catatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `trobelsistem_iduser` int(255) NULL DEFAULT NULL,
  `trobelsistem_idpic` int(255) NULL DEFAULT NULL,
  `trobelsistem_image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `trobelsistem_unitid` int(255) NULL DEFAULT NULL,
  `trobelsistem_send` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`trobelsistem_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trobelsistem
-- ----------------------------
INSERT INTO `trobelsistem` VALUES (35, 'x39mu9c', 'Insentive Care tidak muncul nominalnya', '<p>Input intesive care tidak muncul nominalnya, selalu muncul nominal 0 \r\npadahal ada nominalnya harusnya.</p><p>\r\nselama ini cara mengatasinya dengan memindahkan pasien keluar kamar/bed \r\nyang dipakai kemudian kembalikan lagi ke ruangan sebelumnya trs dinput \r\ntindakan lagi insentive care\r\nperubahan nama bed</p>', NULL, 2, '<p>1.Sebelumnya tim tarif sudah mengeluarkan memo terkait kelas di ICU kepada ADMISI.</p><p>2.Kemungkinan admisi belum aware atau lupa saat mendaftarkan pasien<br></p>', '2020-08-24 08:16:33', 1, 1, NULL, 11, NULL);
INSERT INTO `trobelsistem` VALUES (36, 'emzgw351', 'Laporan gejala penyakit', '<p>Lpaoran tersebut untuk di akomodir di tera, untuk detailnya terlampir</p><p>Tambah an<br></p>', NULL, 3, '<p>Konfirmasi ke Rekam Medis<br></p>', '2020-08-24 09:04:23', 57, 1, '43ce70e1f5140d86ef897c793d48e578.pdf', 3, NULL);
INSERT INTO `trobelsistem` VALUES (38, '5451dgqu', 'Penambahan kolom laporan', '<p>Penambahan kolom kategori barang disamping nama barang(otomatis) kode laporan(LG03)<br></p>', NULL, 2, '<p>sudah ditambahkan sesuai intruksi, silahkan dicek<br></p>', '2020-08-25 13:28:48', 1, 1, NULL, 9, NULL);
INSERT INTO `trobelsistem` VALUES (39, 'mnmlt6l', 'penambahan laporan Gizi', '<p>Penambahan rekan Asuhan Gizi untuk laporan bulanan<br></p>', NULL, 2, '<p>-<br></p>', '2020-08-25 13:29:33', 1, 1, NULL, 10, NULL);
INSERT INTO `trobelsistem` VALUES (40, 'e0nrvh', 'Perubahan SOAPE', '<p>Penyesuaian kolom E dalam SOAPE di ubah I (instruksi)<br></p>', NULL, 2, '<p>sudah dirubah menjadi instruksi<br></p>', '2020-08-25 13:30:35', 1, 1, NULL, 4, NULL);
INSERT INTO `trobelsistem` VALUES (41, 't2guztt', 'Terjadi Kekeliuran Input Resume Medis', '<p>Terjadi kekeliruan klik resume medis atas nama Ny sumiyem No. RM 2739, keaddan pasien saat keluar seharusnya mati > 48.<br></p>', NULL, 2, '<p>sudah dikerjakan, sialhkan dicek<br></p>', '2020-08-26 12:55:53', 57, 1, NULL, 3, NULL);
INSERT INTO `trobelsistem` VALUES (42, '3c94vn', 'Pengajuan Laporan ICOPIM', '<p>Pengajuan Laporan ICOPIM, </p><p>1. Penambahan menu pilihan operasi (Besar, sedang , Kecil) pada menu icopim<br></p><p>2. Pada laporan icopim, kolom dokter dan icopim jika tidak di isi data yang ditampilkan adalah semua data icopim(tanpa filter)</p><p>3. Penambahan kolom Informed consent, anestesi dan jenis operasi(format terlampir)<br></p>', NULL, 3, 'Karena penambahan tabel baru, jadi nunggu data dari Pak Santo<br>', '2020-08-26 13:31:46', 57, 1, 'f9660211e916e94dcf61c8954a1f081d.pdf', 2, NULL);
INSERT INTO `trobelsistem` VALUES (43, '7jcxsi97', 'Revisi Form EMR', '<p>Revisi Form yang ada di EMR, karena form yang ada di EMR berbeda dengan form yang diajukan sehingga perlu dilakukan revisi meliputi :</p><p>1. Judul diganti menjadi ATURAN MAKAN SETELAH OPERASI(TONSIL/AMANDEL)</p><p>2. Pada poin nomor 5 hanya 1 kolom tanggal</p><p>3. Oebanvagab Point 6,7,8</p><p>4. Mengganti kata ahli gizi menjadi dokter yang merawat</p><p>5. Menambah kop RS</p><p>Format Terlampir<br></p>', NULL, 2, 'Sudah selesai dikerjakan ', '2020-09-01 12:15:40', 58, 56, 'b66f2537c9253a7802dd0ef2a5e4b26a.pdf', 10, NULL);
INSERT INTO `trobelsistem` VALUES (44, '18f4jck9', 'PENAMBAHAN LAPORAN TRIAGE INTERNAL', '<p>--COBA KIRIM EMAIL OTOMATIS--<br></p><p>Penambahan laporan TRIAGE untuk pelaporan internal yang diminta oleh manajer yanmed</p><p>untuk format laporan yang diajukan ada di permohonan<br></p>', NULL, 2, '<p>Sudah selesai dikerjakan judul LAPORAN HASIL TRIAGE kode UGD008<br></p>', '2020-09-10 12:37:00', 57, 56, 'd041a4c72fae61f6ee6cd3fe5da0c2be.pdf', 3, NULL);
INSERT INTO `trobelsistem` VALUES (46, '843unbj9', 'Perubahan ERM BASIRAN', '<p>Perubahan ERM PX BASIRAN dengan nomor RM  14639, karena terjadi kesalahan input<br></p>', NULL, 2, '<p>Sudah dirubah oleh mas ari<br></p>', '2020-09-21 14:40:22', 1, 56, '0d1387a033df4d0b9778fd78f7e60098.pdf', 3, NULL);
INSERT INTO `trobelsistem` VALUES (47, 'e1g3uk', 'Penambahan laporan vlos', '<p>penambahan laporan baru untuk menampilkan vlos untuk keperluan laporan internal,</p><ol><li>laporan vlos per bangsal</li><li>laporan vlos per penjamin(asuransi dan pribadi)</li><li>laporan vlos per ksm </li></ol><p>untuk kolom dan rumus ada dilampiran<br></p>', NULL, 6, '<p>Kurang nomor 3 yaitu laporan vlos per ksm</p><p>Sudah dikerjakan untuk laporan nomor 1 & 2 dengan kode laporan DM008XX judul LAPORAN ALOS DR KAUTSAR<br></p>', '2020-09-23 20:09:33', 57, 56, 'd6ab9e5c330587e5c3df28de6c604e6c.pdf', 3, NULL);
INSERT INTO `trobelsistem` VALUES (48, '62x7gted', 'Pengajuan revisi salah input keterangan kematian', '<p>Mohon penghapusan surat keterangan kematian an Tyaga Marvel No RM 21886, dikarenakan salah input<br></p>', NULL, 2, '<p>Sudah dihapus oleh mas ari<br></p>', '2020-09-28 10:24:53', 57, 56, '12476f4e64d45fcbb6c5c724c24baf34.pdf', 3, NULL);

-- ----------------------------
-- Table structure for troubleshoot
-- ----------------------------
DROP TABLE IF EXISTS `troubleshoot`;
CREATE TABLE `troubleshoot`  (
  `troubleshoot_id` int(11) NOT NULL AUTO_INCREMENT,
  `troubleshoot_ticket` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `troubleshoot_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `troubleshoot_deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `troubleshoot_tglselesai` date NULL DEFAULT NULL,
  `troubleshoot_idstatus` int(255) NULL DEFAULT NULL,
  `troubleshoot_catatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `troubleshoot_iduser` int(255) NULL DEFAULT NULL,
  `troubleshoot_idpic` int(255) NULL DEFAULT NULL,
  `troubleshoot_image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `troubleshoot_komputer` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`troubleshoot_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of troubleshoot
-- ----------------------------
INSERT INTO `troubleshoot` VALUES (1, '4rzqavx', 'antrian tidak bunyi', 'antrian tidak berbunyi', NULL, 2, NULL, '2020-05-09 11:51:14', 29, NULL, NULL, NULL);
INSERT INTO `troubleshoot` VALUES (4, '5vgd48qq', 'Antrian Mati', 'Antrian mati dan tidak muncul suara', NULL, 2, NULL, '2020-05-09 14:11:03', 12, NULL, NULL, 'Antrian Poli Obsgn');
INSERT INTO `troubleshoot` VALUES (5, 'hdn96h', 'EMR tidak tersimpan', 'EMR tidak tersimpan, sudah dicoba 2x masih samas', NULL, 2, 'update browser ke versi 76', '2020-06-01 14:20:05', 12, 29, NULL, 'poli anak');
INSERT INTO `troubleshoot` VALUES (6, '3uunt1d5', 'PC kena virus', 'terkena virus ransomeware', NULL, 3, 'data dibackup terlebih dahulu\r\n kemuadian dicarikan decryptor', '2020-05-23 13:25:12', 1, 1, NULL, 'Pc mbk pepy');
INSERT INTO `troubleshoot` VALUES (7, '2q51nw5kg', 'Komputer TRIASE lemot', 'komputer terasa lambat, tidak bisa buka aplikasi MS excel', NULL, 2, 'update antivirus, insatall crack, clear aplikasi yang berjalan di background', '2020-06-24 09:07:38', 1, 1, NULL, '192.168.51.68');
INSERT INTO `troubleshoot` VALUES (8, '4wuvr02', 'pc farmasi lobi lambat', 'komputer terasa lambat,', NULL, 2, 'update antivirus, clear browser, pasang adblock', '2020-07-01 16:46:29', 1, 1, NULL, '192.168.51.62');
INSERT INTO `troubleshoot` VALUES (9, 'ipledc', 'pemasangan printer billing hall', 'pemasangan printer biliing hall', NULL, 2, '-', '2020-07-02 12:01:22', 1, 1, NULL, '-');
INSERT INTO `troubleshoot` VALUES (10, '55j7otn', 'Updgrade kecepatan PC admisi  ', 'penambahan kecepatan akses internet ke 5m pc dan hp 5mb', NULL, 2, 'update selesai', '2020-07-02 12:02:14', 1, 1, NULL, '192.168.51.184');
INSERT INTO `troubleshoot` VALUES (11, '29f8i16', 'emai & web down', 'niagahoster bermasalah, diakses terasa lambat', NULL, 2, 'konfirmasi ke bagian cs niagahoster, sudah up tgl 2/7/2020. ada kendala pada server yang meningkatkan latency akses ke server niagahoster', '2020-07-02 13:44:35', 1, 1, NULL, '-');
INSERT INTO `troubleshoot` VALUES (12, '93ruwy0f', 'PC Poli Anak', 'POLIANAK1013 lemot', NULL, 2, 'update antivirus avast, uninstall mcaffe, disable update windows, setting browser clear cache otomatis', '2020-07-03 12:29:35', 1, 1, NULL, '192.168.51.54');
INSERT INTO `troubleshoot` VALUES (13, 'rd65et', 'Install PC koperasi', 'Instalasi perlengkapan pc koperasi', NULL, 2, 'sudah terpasang PC, Monitor dan UPS', '2020-07-03 12:33:18', 1, 1, NULL, '-');
INSERT INTO `troubleshoot` VALUES (14, 'k0w3ze', 'PC ANAMNESA ANAK LT 1', 'Kena limit wifi dokter', NULL, 2, 'LIMIT 10 MB, dibuat static', '2020-07-13 13:51:54', 1, 1, NULL, '192.168.77.152');
INSERT INTO `troubleshoot` VALUES (15, '2658581bqb', 'PC ANAMNESA LT 2', 'PC lambat kena limit wifi dokter', NULL, 2, 'LIMIT 10 MB, dibuat static', '2020-07-13 13:52:41', 1, 1, NULL, '192.168.77.185');
INSERT INTO `troubleshoot` VALUES (16, 'w4cv8h9h', 'PC FARMASI LEMOT', 'LEMOT KENA LIMIT WIFI DOKTER', NULL, 2, 'UNLIMIT KE 5MB', '2020-07-13 14:41:08', 1, 1, NULL, '192.168.77.125');
INSERT INTO `troubleshoot` VALUES (17, '6dz5id', 'PC FARAMSI LEMOT', 'lemot karena limit wifi dokter', NULL, 2, 'unlimit ke 5mb', '2020-07-13 14:55:14', 1, 1, NULL, '192.168.77.21');
INSERT INTO `troubleshoot` VALUES (18, '13g75clz', 'Insatall Office', 'pasang ms office di pc lab(lis)', NULL, 2, 'pasang ms office 2013', '2020-07-20 11:13:10', 1, 1, NULL, 'PC Lab');
INSERT INTO `troubleshoot` VALUES (19, 'hmk9m0zv', 'server sismadak down', 'service web server mati', NULL, 2, 'restart xampp', '2020-07-20 11:14:56', 1, 1, NULL, '192.168.14.2');
INSERT INTO `troubleshoot` VALUES (20, '1nybchlx', 'pc obsgyn lemot', 'tune up, hilangkan browser cache', NULL, 2, 'matikan automatic update windows, bersihkan cache', '2020-07-20 11:17:02', 1, 1, NULL, '192.168.51.34');
INSERT INTO `troubleshoot` VALUES (21, 'w8eb', 'PC POLI VIP 1004 LEMOT', 'PC LEMOT CACHE BROWSER BANYAK', NULL, 2, 'DISABLE AUTO UPFATE, CLEAR CACHE SETTING BROWSER, UPDATE ANVIR', '2020-07-22 08:46:05', 1, 1, NULL, '192.168.51.125');
INSERT INTO `troubleshoot` VALUES (22, '13739ks7z', 'antiran POLI Kulit & Kelamin', 'NUC ERROR BOOTING', NULL, 2, 'Ganti Perangkat NUC yang sebelumnya dipakai di tv loby', '2020-07-22 11:00:56', 1, 1, NULL, '192.168.52.9');
INSERT INTO `troubleshoot` VALUES (23, '9pq1vt8c', 'PC Perinatal Mati', 'PC mati', NULL, 2, 'cek kabel dan peletakan ulang,biar tidak lepas', '2020-08-03 14:49:00', 1, 1, NULL, '-');
INSERT INTO `troubleshoot` VALUES (24, 'u15ywh', 'Printer Admisi IGD Jamm', 'Printer Admisi IGD Jamm', NULL, 2, 'dipangglikan vendor printer, di diganti dengan printer magnolia', '2020-08-03 14:50:17', 1, 1, NULL, '-');
INSERT INTO `troubleshoot` VALUES (25, 'y4nuesi', 'Laporan RM tidak muncul', 'laporan RM tidak muncul,', NULL, 2, 'sudah di edukasi sesuai arahan tera, tapi laporan ttp tidak muncul,\r\nalhasil memengil mas adi, dan dilaporkan mas adi ke tim tera', '2020-08-03 14:53:37', 1, 1, NULL, '-');
INSERT INTO `troubleshoot` VALUES (26, '536s46yq1', 'Tutorial Trace Cov19', 'tutorial pegawai rekam medis terkait sistem dari dinkes untuk tracing cov19', NULL, 2, 'di beri penjelasan sesuai panduan dari dinkes, dan membuatkan bookmark sistem dan user', '2020-08-03 14:55:41', 1, 1, NULL, '-');
INSERT INTO `troubleshoot` VALUES (27, '2dimipgk', 'Pembuatan User VPN  HRGA', 'Pembuatan user vpn hrga', NULL, 2, 'user hrga pass r5u11hrga untuk hp pak adit', '2020-08-04 10:04:05', 1, 1, NULL, '-');
INSERT INTO `troubleshoot` VALUES (28, 'y1axu0k', 'Laporan Tera tidak muncul', 'laporan lst001 unit farmasi lama muncul ketika pagi hari', NULL, 2, 'dicek koneksi ke server tera baik, sudah ditangani oleh pak santo', '2020-08-04 10:08:59', 1, 1, NULL, '-');
INSERT INTO `troubleshoot` VALUES (29, '10urld2w', 'TV antiran lantai 1 sering mati', 'sering mati sendiri, mau di crack', NULL, 1, 'update crack, rubah setting timeout', '2020-08-04 10:10:53', 1, 1, NULL, '192.168.51.25');
INSERT INTO `troubleshoot` VALUES (30, 'xm4kuys', 'PC ns lt 1 lemot', 'update anvir. clear cache browser dan cek aplikasi tidak penting lainnya', NULL, 2, 'update anvir. clear cache browser dan cek aplikasi tidak penting lainnya', '2020-08-04 10:11:31', 1, 1, NULL, '-');
INSERT INTO `troubleshoot` VALUES (31, 'dxvapz2', 'Sistem TERA Lemot', 'Akses Sistem TERA terasa lemot, untuk jam2 tertentu, asumsu awal lemot terjadi ketika banyak yang akses tera', NULL, 1, '', '2020-08-18 13:48:50', 1, 1, NULL, 'Poli VIP ANAK');
INSERT INTO `troubleshoot` VALUES (32, 'u6gyk4', 'Tindakan ICU', 'Input intesive care tidak muncul nominalnya, selalu muncul nominal 0 padahal ada nominalnya harusnya\r\nselama ini cara mengatasinya dengan memindahkan pasien keluar kamar/bed yang dipakai kemudian kembalikan lagi ke ruangan sebelumnya trs dinput tindakan lagi insentive care\r\nperubahan nama bed', NULL, 1, '-', '2020-08-21 14:30:02', 1, 1, NULL, 'ICU');

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit`  (
  `unit_id` int(255) NOT NULL AUTO_INCREMENT,
  `unit_nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created-at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`unit_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unit
-- ----------------------------
INSERT INTO `unit` VALUES (1, 'IT', '2020-08-24 19:07:31');
INSERT INTO `unit` VALUES (2, 'Marketing', '2020-08-24 19:07:41');
INSERT INTO `unit` VALUES (3, 'Rekam Medis', '2020-08-24 19:07:42');
INSERT INTO `unit` VALUES (4, 'Keperawatan', '2020-08-24 19:08:04');
INSERT INTO `unit` VALUES (5, 'Finance & Accounting', '2020-08-24 19:08:13');
INSERT INTO `unit` VALUES (6, 'HR', '2020-08-24 19:08:15');
INSERT INTO `unit` VALUES (7, 'Admisi', '2020-08-24 19:08:33');
INSERT INTO `unit` VALUES (8, 'Kasir', '2020-08-24 19:08:36');
INSERT INTO `unit` VALUES (9, 'Farmasi', '2020-08-24 19:08:38');
INSERT INTO `unit` VALUES (10, 'Gizi', '2020-08-24 19:08:41');
INSERT INTO `unit` VALUES (11, 'VK', '2020-08-24 19:08:48');
INSERT INTO `unit` VALUES (12, 'Perina', '2020-08-24 19:08:52');
INSERT INTO `unit` VALUES (13, 'ICU', '2020-08-24 19:08:56');

-- ----------------------------
-- Table structure for upload
-- ----------------------------
DROP TABLE IF EXISTS `upload`;
CREATE TABLE `upload`  (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_namaberkas` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `upload_deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `upload_userid` int(11) NULL DEFAULT NULL,
  `upload_berkas` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`upload_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of upload
-- ----------------------------
INSERT INTO `upload` VALUES (5, 'Petunjuk pengisian form bantuan teknis IT', '<p>Petunjuk pengisian form bantuan teknis terkait IT di RS UII<br></p>', 1, '4395827a9cf8f9efbc424e214a149f42.docx', '2020-09-28 08:54:38');
INSERT INTO `upload` VALUES (6, 'Form bantuan teknis', '<p>Form bantuan teknis terkait IT di RS UII, silahkan di isi jika mengajukan bantuan ke IT<br></p>', 1, '4c0f39cccc2a95817c2ca46a1169e654.docx', '2020-09-28 09:00:45');
INSERT INTO `upload` VALUES (7, 'Petunjuk pengisian form penanganan error dan penambahan modul sistem', '<p>Tata cara pengisian form penanganan error dan penambahan modul sistem di RS UII<br></p>', 1, '94177880534905b81c258bb8a46af003.docx', '2020-09-28 09:20:27');
INSERT INTO `upload` VALUES (8, 'Form penanganan error dan penambahan modul sistem', '<p>Form penanganan error dan penambahan modul sistem tera <br></p>', 1, '284d581613efdddb600c4bcb8719f6d7.docx', '2020-09-28 09:21:18');
INSERT INTO `upload` VALUES (9, 'Form revisi kesalahan input sistem', '<p>Form revisi kesalahan input sistem tera(EMR, dll)<br></p>', 1, 'a38c491c2a69e3377dc95ef47012b5ab.docx', '2020-09-28 09:23:48');
INSERT INTO `upload` VALUES (10, 'Form permohonan akses sistem', '<p>Form permohonan akses sistem tera(user dll)<br></p>', 1, '6b1cfdccb445ce2bfd8356a738ba9f89.docx', '2020-09-28 09:24:50');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_password` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `user_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_level` int(5) NULL DEFAULT NULL,
  `user_terdaftar` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `user_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_status` bit(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `user_foto` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '55b8fc9d106b1124cdd1ea3cbf98bd6e', 'Duwi Haryanto', 1, '2018-09-28 17:00:00', 'Admin@gmail.com', b'1', '2020-04-07 11:29:50', '0f399c2d6fa3cc467c01736f16eb0334.jpg');
INSERT INTO `user` VALUES (3, 'haryanto', '8e7173cb9b869db115f77688e70b8ff7', 'haryanto duwi', 3, '2018-10-20 17:00:00', 'admin@gmail.com', b'1', '2020-04-07 11:29:50', NULL);
INSERT INTO `user` VALUES (12, 'mita', 'bae3d929b274a4cd35c38fe92f059f1a', 'mita', 6, '2019-12-30 12:38:01', 'mitaduwi@gmail.com', b'1', '2020-04-07 11:29:50', NULL);
INSERT INTO `user` VALUES (29, 'duwi', '3155e562d357a7c301d2ccafadb05e17', 'duwi', 7, '2019-12-30 14:14:49', 'haryanto.duwi@gmail.com', b'1', '2020-04-07 11:29:50', NULL);
INSERT INTO `user` VALUES (35, 'mika', '07af613eea059030daaed3bde1fd1ce7', 'mika', 1, '2019-12-31 07:45:32', 'mika@gmail.com', b'1', '2020-01-02 10:15:30', NULL);
INSERT INTO `user` VALUES (36, 'hanabi', 'd43fcce13f4c88fd28c279cc2859f579', 'hanabi', 3, '2020-01-06 17:23:31', 'hanabi@gmail.com', b'1', '2020-01-06 17:23:31', NULL);
INSERT INTO `user` VALUES (38, 'trimulyati', '316027d64b3fe60461671f8d6b62e394', 'tri mulyati', 5, '2020-04-07 11:29:50', 'trimulyani@gmail.com', b'1', '2020-04-07 11:29:50', NULL);
INSERT INTO `user` VALUES (39, 'rini', 'b86872751de1e13c142d050acfd09842', 'rini', 5, '2020-05-05 12:17:23', 'rini@rsuii.net', NULL, '2020-05-05 12:17:23', NULL);
INSERT INTO `user` VALUES (40, 'admisi', 'a848d8acf561e2d412238742f6b46bcd', 'admisi', 5, '2020-05-05 12:17:51', 'admisi@rsuii.net', NULL, '2020-05-05 12:17:51', NULL);
INSERT INTO `user` VALUES (41, 'ning', '8aa285d2dc45e75428411e559a01cc72', 'ning', 5, '2020-05-06 12:30:15', 'rekammedis@gmail.com', NULL, '2020-05-06 12:30:15', NULL);
INSERT INTO `user` VALUES (42, 'puput', 'f95c24c42b0f2ea683727cc47cde3ad2', 'puput', 5, '2020-05-06 12:30:53', 'rekammedis@gmail.com', NULL, '2020-05-06 12:30:53', NULL);
INSERT INTO `user` VALUES (43, 'winda', 'aed2aec41bfd7ddb55b21f3ce206c66b', 'winda', 5, '2020-05-06 12:31:35', 'rekammedis@gmail.com', NULL, '2020-05-06 12:31:35', NULL);
INSERT INTO `user` VALUES (44, 'khusnul', '54eb2a3a371675e5aeddcf902e35fb21', 'khusnul', 5, '2020-05-06 12:32:16', 'rekammedis@gmail.com', NULL, '2020-05-06 12:32:16', NULL);
INSERT INTO `user` VALUES (45, 'ega', 'b6f6c91fba2d093099ba04f42a1d65a3', 'ega', 5, '2020-05-06 12:34:19', 'rekammedis@gmail.com', NULL, '2020-05-06 12:34:19', NULL);
INSERT INTO `user` VALUES (54, 'tika', '21232f297a57a5a743894a0e4a801fc3', 'tika', 6, '2020-06-04 18:42:42', 'tika@rsuii.co.id', b'1', '2020-06-04 18:42:42', NULL);
INSERT INTO `user` VALUES (55, 'ichsan', '3938eed097dc4741b186f7c18f36cf4b', 'ichsan', 1, '2020-07-02 13:47:33', 'ichsan@gmail.com', b'1', '2020-07-02 13:47:33', NULL);
INSERT INTO `user` VALUES (56, 'adi', '26f376b985716377bdbaae52c941525a', 'adi', 8, '2020-08-24 19:39:59', 'adi@tera.com', b'1', '2020-08-24 19:39:59', NULL);
INSERT INTO `user` VALUES (57, 'rekammedis', '93bb1af9d4be31f1c375a21bd284dace', 'rekammedis', 2, '2020-08-25 09:02:00', 'rm@rsuii.co.id', b'1', '2020-08-25 09:02:00', NULL);
INSERT INTO `user` VALUES (58, 'gizirsuii', 'd376f8562380287161c00c202641b921', 'gizi rsuii', 2, '2020-09-01 11:30:27', 'gizirsuii@gmail.com', b'1', '2020-09-01 11:30:27', NULL);
INSERT INTO `user` VALUES (59, 'rsuii', 'dce04015752db44911c2d81621ee0ac6', 'rsuii', 1, '2020-09-16 08:07:55', 'it@gmail.com', b'1', '2020-09-16 08:07:55', NULL);

SET FOREIGN_KEY_CHECKS = 1;

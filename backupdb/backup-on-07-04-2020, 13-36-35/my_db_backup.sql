#
# TABLE STRUCTURE FOR: berkas
#

DROP TABLE IF EXISTS `berkas`;

CREATE TABLE `berkas` (
  `berkas_id` int(11) NOT NULL AUTO_INCREMENT,
  `berkas_kategoriid` int(11) DEFAULT NULL,
  `berkas_nama` varchar(255) DEFAULT NULL,
  `berkas_file` text,
  `berkas_kapasitas` float(10,0) DEFAULT NULL,
  `berkas_downloaded` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`berkas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `berkas` (`berkas_id`, `berkas_kategoriid`, `berkas_nama`, `berkas_file`, `berkas_kapasitas`, `berkas_downloaded`, `created_at`) VALUES (4, 4, 'medups', '240e84f6062dbe946654204a40f626a8.pdf', '131', NULL, '2020-04-03 14:40:59');
INSERT INTO `berkas` (`berkas_id`, `berkas_kategoriid`, `berkas_nama`, `berkas_file`, `berkas_kapasitas`, `berkas_downloaded`, `created_at`) VALUES (5, 7, 'Permohonan Komputer', NULL, NULL, NULL, '2020-04-06 12:41:58');
INSERT INTO `berkas` (`berkas_id`, `berkas_kategoriid`, `berkas_nama`, `berkas_file`, `berkas_kapasitas`, `berkas_downloaded`, `created_at`) VALUES (6, 7, 'Permohonan User', NULL, NULL, NULL, '2020-04-06 13:07:39');
INSERT INTO `berkas` (`berkas_id`, `berkas_kategoriid`, `berkas_nama`, `berkas_file`, `berkas_kapasitas`, `berkas_downloaded`, `created_at`) VALUES (7, 4, 'Surat Keterangan Sehat', NULL, NULL, NULL, '2020-04-06 13:07:59');


#
# TABLE STRUCTURE FOR: kategori
#

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_kategori` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kategori_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `kategori` (`kategori_id`, `kategori_kategori`, `created_at`) VALUES (4, 'Undangan', '2020-04-03 13:46:57');
INSERT INTO `kategori` (`kategori_id`, `kategori_kategori`, `created_at`) VALUES (5, 'Memorandum', '2020-04-03 13:47:04');
INSERT INTO `kategori` (`kategori_id`, `kategori_kategori`, `created_at`) VALUES (6, 'panduan', '2020-04-03 13:47:08');
INSERT INTO `kategori` (`kategori_id`, `kategori_kategori`, `created_at`) VALUES (7, 'Permohonan', '2020-04-06 12:41:46');
INSERT INTO `kategori` (`kategori_id`, `kategori_kategori`, `created_at`) VALUES (8, 'Surat Keterangan', '2020-04-06 13:08:42');


#
# TABLE STRUCTURE FOR: level
#

DROP TABLE IF EXISTS `level`;

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_nama` varchar(255) DEFAULT NULL,
  `level_status` bit(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `level_dashboard` text,
  PRIMARY KEY (`level_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

INSERT INTO `level` (`level_id`, `level_nama`, `level_status`, `created_at`, `level_dashboard`) VALUES (1, 'Administrator', '1', '2020-02-16 21:22:59', 'dashboard/dashboard');
INSERT INTO `level` (`level_id`, `level_nama`, `level_status`, `created_at`, `level_dashboard`) VALUES (2, 'User', '1', '2020-02-15 08:59:01', 'dashboard/dashboard');
INSERT INTO `level` (`level_id`, `level_nama`, `level_status`, `created_at`, `level_dashboard`) VALUES (3, 'notulen', '1', '2020-02-15 08:53:02', 'notulen/index');
INSERT INTO `level` (`level_id`, `level_nama`, `level_status`, `created_at`, `level_dashboard`) VALUES (11, 'Manajer', '1', '2020-03-27 21:55:34', 'Dashboard/dashboard');
INSERT INTO `level` (`level_id`, `level_nama`, `level_status`, `created_at`, `level_dashboard`) VALUES (12, 'rekammedis', '1', '2020-04-07 11:29:11', 'nomorsurat/nomorsurat');


#
# TABLE STRUCTURE FOR: log
#

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_iduser` int(11) DEFAULT NULL,
  `log_aksi` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_level` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=272 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (1, 1, 'login', '2020-01-02 03:40:03', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (2, 1, 'login', '2020-01-02 03:40:04', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (3, 34, 'login', '2020-01-02 03:40:04', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (7, 1, 'password salah', '2020-01-02 03:40:06', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (8, 1, 'password salah', '2020-01-02 03:40:07', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (9, 1, 'password salah', '2020-01-02 03:40:07', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (12, 35, 'password salah', '2020-01-02 03:40:08', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (13, 1, 'login', '2020-01-02 05:34:00', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (14, 1, 'logout', '2020-01-02 03:38:55', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (15, 1, 'login', '2020-01-02 05:33:59', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (16, 1, 'logout', '2020-01-02 05:34:09', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (17, 1, 'login', '2020-01-02 05:34:13', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (18, 1, 'logout', '2020-01-02 06:07:28', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (19, 35, 'login', '2020-01-02 06:07:33', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (20, 35, 'logout', '2020-01-02 06:07:39', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (21, 4, 'login', '2020-01-02 06:07:42', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (22, 4, 'logout', '2020-01-02 06:07:55', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (23, 29, 'password salah', '2020-01-02 06:07:58', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (24, 29, 'password salah', '2020-01-02 06:08:02', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (25, 1, 'login', '2020-01-02 06:08:06', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (26, 1, 'logout', '2020-01-02 06:08:25', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (27, 29, 'login', '2020-01-02 06:08:28', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (28, 1, 'password salah', '2020-01-02 06:12:54', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (29, 1, 'login', '2020-01-02 06:13:03', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (30, 1, 'login', '2020-01-03 03:06:13', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (32, 1, 'login', '2020-01-03 03:45:31', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (33, 1, 'logout', '2020-01-03 03:48:28', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (34, 1, 'login', '2020-01-03 04:06:01', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (35, 1, 'logout', '2020-01-03 04:08:25', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (36, 1, 'login', '2020-01-03 04:08:28', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (37, 1, 'logout', '2020-01-03 04:08:37', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (38, 1, 'login', '2020-01-03 04:08:48', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (40, 1, 'login', '2020-01-03 04:10:15', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (41, 1, 'logout', '2020-01-03 04:14:44', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (42, 1, 'login', '2020-01-03 04:17:12', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (43, 1, 'logout', '2020-01-03 04:18:20', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (44, 1, 'login', '2020-01-03 06:13:46', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (45, 1, 'logout', '2020-01-03 06:16:43', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (46, 1, 'login', '2020-01-06 05:44:51', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (47, 1, 'logout', '2020-01-06 20:22:39', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (48, 1, 'login', '2020-01-06 20:22:45', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (49, 1, 'login', '2020-01-07 18:18:02', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (50, 1, 'login', '2020-01-09 13:39:02', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (51, 1, 'login', '2020-01-10 10:45:11', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (52, 1, 'logout', '2020-01-10 10:54:19', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (53, 1, 'login', '2020-01-14 10:49:03', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (54, 1, 'logout', '2020-01-14 11:05:20', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (55, 1, 'login', '2020-01-14 11:09:09', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (56, 1, 'logout', '2020-01-14 11:10:13', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (57, 1, 'login', '2020-01-14 11:28:23', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (58, 1, 'logout', '2020-01-14 11:53:38', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (59, 1, 'login', '2020-01-20 13:21:25', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (60, 1, 'login', '2020-01-24 10:46:31', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (61, 1, 'login', '2020-02-01 09:11:33', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (62, 1, 'logout', '2020-02-01 09:36:46', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (63, 1, 'login', '2020-02-01 09:36:50', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (64, 1, 'logout', '2020-02-01 11:11:06', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (65, 1, 'login', '2020-02-01 11:11:16', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (66, 1, 'logout', '2020-02-01 11:11:37', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (67, 29, 'password salah', '2020-02-01 11:11:40', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (68, 29, 'login', '2020-02-01 11:11:44', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (69, 1, 'login', '2020-02-05 13:15:29', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (70, 1, 'logout', '2020-02-05 13:16:05', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (71, 29, 'password salah', '2020-02-05 13:16:08', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (72, 29, 'login', '2020-02-05 13:16:12', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (73, 1, 'login', '2020-02-06 11:46:40', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (74, 1, 'login', '2020-02-06 16:08:37', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (75, 1, 'login', '2020-02-07 08:43:09', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (76, 1, 'logout', '2020-02-07 10:15:44', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (77, 37, 'login', '2020-02-07 10:15:52', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (78, 37, 'logout', '2020-02-07 10:33:55', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (79, 37, 'login', '2020-02-07 10:34:01', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (80, 37, 'logout', '2020-02-07 10:35:37', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (81, 37, 'login', '2020-02-07 10:35:42', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (82, NULL, 'logout', '2020-02-07 15:55:57', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (83, 1, 'login', '2020-02-07 16:28:01', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (84, 1, 'logout', '2020-02-07 16:28:07', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (85, 37, 'login', '2020-02-07 16:28:13', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (86, 37, 'login', '2020-02-10 09:54:57', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (87, 37, 'logout', '2020-02-10 10:12:24', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (88, 37, 'login', '2020-02-10 10:12:31', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (89, 37, 'login', '2020-02-11 10:32:28', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (90, 37, 'logout', '2020-02-11 11:44:40', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (91, 37, 'login', '2020-02-11 12:58:19', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (92, 37, 'logout', '2020-02-11 13:07:18', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (93, 1, 'login', '2020-02-11 16:10:34', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (94, 1, 'logout', '2020-02-11 16:13:29', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (95, 1, 'login', '2020-02-11 16:13:41', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (96, 1, 'logout', '2020-02-11 16:15:17', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (97, 1, 'login', '2020-02-15 08:22:06', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (98, 1, 'logout', '2020-02-15 09:07:30', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (99, 37, 'login', '2020-02-15 09:10:27', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (100, 37, 'logout', '2020-02-15 09:10:32', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (101, 1, 'login', '2020-02-15 09:10:35', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (102, 1, 'logout', '2020-02-15 09:19:29', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (103, 37, 'login', '2020-02-15 09:19:35', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (104, 37, 'logout', '2020-02-15 09:21:37', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (105, 1, 'login', '2020-02-15 09:21:40', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (106, 1, 'logout', '2020-02-15 09:22:49', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (107, 1, 'login', '2020-02-15 09:22:52', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (108, 1, 'login', '2020-02-15 10:17:29', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (109, 1, 'logout', '2020-02-15 10:24:03', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (110, 1, 'login', '2020-02-15 10:24:06', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (111, 1, 'logout', '2020-02-15 10:27:17', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (112, 1, 'login', '2020-02-15 10:27:20', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (113, 1, 'logout', '2020-02-15 10:28:06', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (114, 37, 'login', '2020-02-15 10:28:15', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (115, 37, 'logout', '2020-02-15 10:28:43', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (116, 37, 'login', '2020-02-15 10:28:51', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (117, 37, 'logout', '2020-02-15 10:29:27', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (118, 1, 'login', '2020-02-15 10:29:30', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (119, 1, 'logout', '2020-02-15 10:31:54', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (120, 1, 'login', '2020-02-15 10:31:59', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (121, 1, 'logout', '2020-02-15 10:33:42', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (122, 1, 'login', '2020-02-15 10:33:52', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (123, 1, 'logout', '2020-02-15 10:39:27', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (124, 36, 'login', '2020-02-15 10:39:35', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (125, 36, 'logout', '2020-02-15 10:39:44', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (126, 1, 'login', '2020-02-15 10:39:49', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (127, 36, 'login', '2020-02-15 11:21:09', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (128, 1, 'login', '2020-02-15 12:45:36', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (129, 1, 'logout', '2020-02-15 15:13:59', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (130, 1, 'login', '2020-02-15 15:39:09', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (131, 1, 'logout', '2020-02-15 17:02:04', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (132, 1, 'login', '2020-02-15 19:36:05', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (133, 1, 'login', '2020-02-16 18:53:35', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (134, 1, 'logout', '2020-02-16 21:20:43', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (135, 1, 'login', '2020-02-16 21:20:46', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (136, 1, 'logout', '2020-02-16 21:21:14', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (137, 1, 'login', '2020-02-16 21:21:18', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (138, 1, 'logout', '2020-02-16 21:22:10', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (139, 1, 'login', '2020-02-16 21:22:14', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (140, 1, 'logout', '2020-02-16 21:22:39', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (141, 1, 'login', '2020-02-16 21:22:43', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (142, 1, 'logout', '2020-02-16 21:23:03', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (143, 1, 'login', '2020-02-16 21:23:07', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (144, 1, 'login', '2020-02-17 15:42:39', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (145, 1, 'login', '2020-02-18 11:41:17', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (146, 1, 'login', '2020-02-19 08:35:16', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (147, 1, 'login', '2020-02-19 11:02:02', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (148, 1, 'login', '2020-02-19 15:37:54', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (149, 1, 'logout', '2020-02-19 16:24:59', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (150, 1, 'login', '2020-02-19 16:34:19', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (151, 1, 'logout', '2020-02-19 17:00:36', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (152, 1, 'login', '2020-02-20 08:13:06', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (153, 1, 'login', '2020-02-25 13:56:36', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (154, 1, 'password salah', '2020-02-26 10:27:11', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (155, 1, 'login', '2020-02-26 10:27:15', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (156, 1, 'login', '2020-02-27 11:02:42', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (157, 1, 'login', '2020-02-27 15:33:44', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (158, 1, 'login', '2020-02-29 10:11:49', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (159, 1, 'login', '2020-02-29 14:06:33', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (160, 1, 'login', '2020-02-29 14:25:14', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (161, 1, 'login', '2020-02-29 16:14:54', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (162, 1, 'login', '2020-03-02 11:40:30', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (163, 1, 'logout', '2020-03-02 11:40:42', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (164, 1, 'login', '2020-03-02 11:43:24', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (165, 1, 'logout', '2020-03-02 11:43:29', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (166, 1, 'login', '2020-03-03 16:03:12', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (167, 1, 'login', '2020-03-04 15:49:08', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (168, 1, 'logout', '2020-03-04 16:47:26', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (169, 1, 'login', '2020-03-05 16:57:42', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (170, 1, 'login', '2020-03-09 10:34:08', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (171, 1, 'login', '2020-03-09 15:45:42', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (172, 1, 'login', '2020-03-10 09:49:51', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (173, 1, 'login', '2020-03-10 16:05:27', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (174, 1, 'logout', '2020-03-10 16:44:11', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (175, 1, 'login', '2020-03-11 07:44:12', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (176, 1, 'logout', '2020-03-11 09:29:25', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (177, 1, 'login', '2020-03-11 16:09:12', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (178, 1, 'login', '2020-03-14 10:42:31', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (179, 1, 'login', '2020-03-14 10:44:21', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (180, 1, 'login', '2020-03-16 15:00:19', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (181, 1, 'login', '2020-03-17 07:56:49', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (182, 1, 'logout', '2020-03-17 11:54:37', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (183, 1, 'login', '2020-03-17 11:55:35', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (184, 1, 'logout', '2020-03-17 11:57:30', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (185, 1, 'login', '2020-03-17 12:55:04', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (186, 1, 'login', '2020-03-18 11:27:10', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (187, 1, 'logout', '2020-03-18 11:31:27', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (188, 1, 'login', '2020-03-18 15:36:28', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (189, 1, 'logout', '2020-03-18 16:00:51', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (190, 1, 'login', '2020-03-18 16:06:25', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (191, 1, 'logout', '2020-03-18 16:06:36', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (192, 1, 'login', '2020-03-18 16:17:00', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (193, 1, 'login', '2020-03-19 08:56:29', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (194, 1, 'login', '2020-03-19 11:06:57', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (195, 1, 'logout', '2020-03-19 11:48:11', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (196, 1, 'login', '2020-03-19 12:49:47', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (197, 1, 'login', '2020-03-23 13:50:38', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (198, 1, 'logout', '2020-03-23 13:51:08', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (199, 1, 'login', '2020-03-23 13:51:12', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (200, 1, 'logout', '2020-03-23 14:06:06', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (201, 1, 'login', '2020-03-23 14:09:00', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (202, 1, 'logout', '2020-03-23 14:09:03', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (203, 1, 'login', '2020-03-23 14:09:08', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (204, 1, 'logout', '2020-03-23 14:09:18', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (205, 1, 'login', '2020-03-23 14:09:35', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (206, 1, 'logout', '2020-03-23 14:09:44', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (207, 1, 'login', '2020-03-23 14:11:57', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (208, 1, 'logout', '2020-03-23 14:12:16', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (209, 1, 'login', '2020-03-23 14:15:48', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (210, 1, 'logout', '2020-03-23 14:23:01', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (211, 1, 'login', '2020-03-23 14:23:05', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (212, 1, 'logout', '2020-03-23 14:25:48', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (213, 1, 'login', '2020-03-23 14:25:52', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (214, 1, 'login', '2020-03-23 20:56:14', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (215, 1, 'logout', '2020-03-23 22:23:32', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (216, 1, 'login', '2020-03-25 17:11:19', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (217, 1, 'logout', '2020-03-25 17:48:36', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (218, 1, 'login', '2020-03-25 17:48:44', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (219, 1, 'logout', '2020-03-25 19:57:38', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (220, 1, 'login', '2020-03-25 19:57:44', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (221, 1, 'logout', '2020-03-25 20:22:42', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (222, 1, 'login', '2020-03-25 21:05:39', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (223, 1, 'login', '2020-03-27 10:35:34', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (224, 1, 'login', '2020-03-27 19:44:54', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (225, 1, 'login', '2020-03-27 19:54:09', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (226, 1, 'logout', '2020-03-27 19:54:13', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (227, 29, 'password salah', '2020-03-27 20:01:45', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (228, 1, 'login', '2020-03-27 20:01:49', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (229, 1, 'logout', '2020-03-27 20:01:54', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (230, NULL, 'logout', '2020-03-27 20:02:26', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (231, 1, 'login', '2020-03-27 20:02:35', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (232, 1, 'logout', '2020-03-27 20:02:37', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (233, 37, 'login', '2020-03-27 21:52:00', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (234, 37, 'logout', '2020-03-27 21:56:14', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (235, 1, 'login', '2020-03-28 09:13:15', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (236, 1, 'login', '2020-03-28 11:30:38', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (237, 1, 'logout', '2020-03-28 11:32:46', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (238, 1, 'login', '2020-03-28 11:32:49', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (239, 1, 'login', '2020-03-28 13:37:22', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (240, 1, 'logout', '2020-03-28 13:46:08', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (241, 1, 'login', '2020-03-28 13:46:15', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (242, 1, 'login', '2020-03-30 11:19:46', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (243, 1, 'logout', '2020-03-30 11:40:31', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (244, 1, 'login', '2020-03-30 14:20:50', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (245, 1, 'logout', '2020-03-30 14:45:04', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (246, 1, 'login', '2020-03-30 14:45:08', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (247, 1, 'logout', '2020-03-30 20:33:39', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (248, 1, 'login', '2020-03-30 20:33:45', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (249, 1, 'login', '2020-04-01 19:05:30', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (250, 1, 'logout', '2020-04-01 22:44:01', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (251, 1, 'login', '2020-04-02 19:56:13', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (252, 1, 'login', '2020-04-03 11:48:12', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (253, 1, 'login', '2020-04-06 12:36:26', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (254, 1, 'logout', '2020-04-06 15:37:52', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (255, 1, 'login', '2020-04-07 08:58:05', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (256, 1, 'logout', '2020-04-07 11:30:10', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (257, 38, 'password salah', '2020-04-07 11:30:22', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (258, 1, 'login', '2020-04-07 11:30:32', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (259, 1, 'logout', '2020-04-07 11:30:50', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (260, 38, 'password salah', '2020-04-07 11:30:59', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (261, 1, 'login', '2020-04-07 11:31:03', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (262, 1, 'logout', '2020-04-07 11:31:20', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (263, 38, 'password salah', '2020-04-07 11:31:30', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (264, 38, 'password salah', '2020-04-07 11:31:42', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (265, 1, 'login', '2020-04-07 11:31:47', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (266, 38, 'login', '2020-04-07 11:32:31', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (267, 38, 'logout', '2020-04-07 11:35:49', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (268, 38, 'login', '2020-04-07 11:48:00', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (269, 38, 'logout', '2020-04-07 11:48:32', '3');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (270, 38, 'login', '2020-04-07 12:38:28', '1');
INSERT INTO `log` (`log_id`, `log_iduser`, `log_aksi`, `created_at`, `log_level`) VALUES (271, 38, 'logout', '2020-04-07 12:42:43', '3');


#
# TABLE STRUCTURE FOR: menu
#

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nama` varchar(255) DEFAULT NULL,
  `menu_ikon` varchar(255) DEFAULT NULL,
  `menu_is_mainmenu` varchar(5) DEFAULT NULL,
  `menu_link` varchar(255) DEFAULT NULL,
  `menu_akses_level` varchar(50) DEFAULT NULL,
  `menu_urutan` int(5) DEFAULT NULL,
  `menu_status` varchar(1) DEFAULT NULL,
  `menu_akses` int(2) DEFAULT NULL,
  `menu_baru` int(2) DEFAULT NULL,
  `menu_label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (9, 'user', 'flaticon-layers', '102', 'setting/user', '1', 1, '1', 1, NULL, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (102, 'setting', 'flaticon-settings', '0', 'setting', '1,3', 90, '1', 1, 0, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (103, 'dashboard', 'flaticon-home', '0', 'dashboard/dashboard', '1,11', 1, '1', 1, 0, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (104, 'log', ' flaticon-time', '0', 'log/log', '1', 91, '1', 1, 2, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (105, 'logout', 'flaticon-arrow', '0', 'login/logout', '1,2,3', 99, '1', 1, NULL, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (111, 'level', 'flaticon-setting', '102', 'setting/level', '1', 2, '1', 1, NULL, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (112, 'menu_akses', 'flaticon-setting', '102', 'setting/menuakses', '1', 3, '1', 1, NULL, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (113, 'backup', 'flaticon-setting', '102', 'setting/backup', '1', 4, '1', 1, 2, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (114, 'import', 'flaticon-file', '0', 'import/admin', '1', 6, '0', 1, NULL, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (116, 'sistem', 'flaticon-seting', '102', 'setting/sistem', '1', 5, '1', 1, 2, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (152, 'font_awesome', 'flaticon-file', '102', 'setting/fontawesome', '1', 8, '1', 1, 0, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (165, 'registrasi', 'flaticon-file', '0', 'Registrasi/Registrasi', '1,2', 1, '', 1, 1, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (166, 'registrasi', 'flaticon-file', '165', 'Registrasi/Registrasidetail', '1', 1, '0', 1, NULL, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (167, 'Berkas', 'flaticon-file', '0', 'Berkas/berkas', '1', 5, '1', 1, NULL, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (169, 'master', 'flaticon-file', '0', 'Master', '1', 2, '1', 1, NULL, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (170, 'kategori', 'flaticon-file', '169', 'Master/Kategori', '1', 1, '1', 1, NULL, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (171, 'berkas', 'flaticon-file', '169', 'Master/Berkas', '1', 2, '1', 1, NULL, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (172, 'surat', 'flaticon-file', '0', 'Surat', '1,12', 3, '1', 1, 0, NULL);
INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_ikon`, `menu_is_mainmenu`, `menu_link`, `menu_akses_level`, `menu_urutan`, `menu_status`, `menu_akses`, `menu_baru`, `menu_label`) VALUES (173, 'surat_keterangan_sehat', 'flaticon-file', '172', 'Nomorsurat/Nomorsurat', '1,12', 1, '1', 1, NULL, NULL);


#
# TABLE STRUCTURE FOR: nomorsurat
#

DROP TABLE IF EXISTS `nomorsurat`;

CREATE TABLE `nomorsurat` (
  `nomorsurat_id` int(11) NOT NULL AUTO_INCREMENT,
  `nomorsurat_iduser` int(255) DEFAULT NULL,
  `nomorsurat_nomor` varchar(50) DEFAULT NULL,
  `nomorsurat_bulan` varchar(50) DEFAULT NULL,
  `nomorsurat_tanggal` datetime DEFAULT NULL,
  `nomorsurat_norm` int(20) DEFAULT NULL,
  `nomorsurat_nama` varchar(255) DEFAULT NULL,
  `nomorsurat_unit` text,
  `nomorsurat_ijin` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nomorsurat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO `nomorsurat` (`nomorsurat_id`, `nomorsurat_iduser`, `nomorsurat_nomor`, `nomorsurat_bulan`, `nomorsurat_tanggal`, `nomorsurat_norm`, `nomorsurat_nama`, `nomorsurat_unit`, `nomorsurat_ijin`, `created_at`) VALUES (3, 1, '0001/B.4/RSUII/IV/2020', 'april', '2020-04-07 00:00:00', 1234, 'duwi', 'it', '2', '2020-04-07 11:02:18');
INSERT INTO `nomorsurat` (`nomorsurat_id`, `nomorsurat_iduser`, `nomorsurat_nomor`, `nomorsurat_bulan`, `nomorsurat_tanggal`, `nomorsurat_norm`, `nomorsurat_nama`, `nomorsurat_unit`, `nomorsurat_ijin`, `created_at`) VALUES (7, 1, '0002/B.4/RSUII/IV/2020', 'april', '2020-04-07 00:00:00', 1233, 'duwi', 'it', '23', '2020-04-07 11:05:25');
INSERT INTO `nomorsurat` (`nomorsurat_id`, `nomorsurat_iduser`, `nomorsurat_nomor`, `nomorsurat_bulan`, `nomorsurat_tanggal`, `nomorsurat_norm`, `nomorsurat_nama`, `nomorsurat_unit`, `nomorsurat_ijin`, `created_at`) VALUES (8, 1, '0003/B.4/RSUII/IV/2020', 'april', '2020-04-07 00:00:00', 123, 'duwi', 'it', '2', '2020-04-07 11:15:37');
INSERT INTO `nomorsurat` (`nomorsurat_id`, `nomorsurat_iduser`, `nomorsurat_nomor`, `nomorsurat_bulan`, `nomorsurat_tanggal`, `nomorsurat_norm`, `nomorsurat_nama`, `nomorsurat_unit`, `nomorsurat_ijin`, `created_at`) VALUES (11, 1, '0004/B.4/RSUII/IV/2020', 'april', '2020-04-07 00:00:00', 123, 'duwi', 'it', '2', '2020-04-07 11:21:57');
INSERT INTO `nomorsurat` (`nomorsurat_id`, `nomorsurat_iduser`, `nomorsurat_nomor`, `nomorsurat_bulan`, `nomorsurat_tanggal`, `nomorsurat_norm`, `nomorsurat_nama`, `nomorsurat_unit`, `nomorsurat_ijin`, `created_at`) VALUES (12, 38, '0005/B.4/RSUII/IV/2020', 'april', '2020-04-07 00:00:00', 12134, 'trimulyani', 'rekam medis', '2', '2020-04-07 11:39:51');
INSERT INTO `nomorsurat` (`nomorsurat_id`, `nomorsurat_iduser`, `nomorsurat_nomor`, `nomorsurat_bulan`, `nomorsurat_tanggal`, `nomorsurat_norm`, `nomorsurat_nama`, `nomorsurat_unit`, `nomorsurat_ijin`, `created_at`) VALUES (13, 38, '0006/B.4/RSUII/IV/2020', 'april', '2020-04-07 00:00:00', 112266, 'tri', 'igd', '3', '2020-04-07 12:41:49');


#
# TABLE STRUCTURE FOR: setting
#

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_namasistem` varchar(255) DEFAULT NULL,
  `setting_namatempat` text,
  `setting_alamat` text,
  `setting_email` varchar(100) DEFAULT NULL,
  `setting_notlp` varchar(20) DEFAULT NULL,
  `setting_logo` text,
  `setting_namapemilik` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`setting_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

INSERT INTO `setting` (`setting_id`, `setting_namasistem`, `setting_namatempat`, `setting_alamat`, `setting_email`, `setting_notlp`, `setting_logo`, `setting_namapemilik`) VALUES (1, 'Berkas', 'Array Motion', 'Rumah Sakit UII', 'rekammedis@rsuii.co.id', '(0274) 2812-999', 'd17eecb86d82aadff65edf6a6e062697.png', 'Trimulyani, AMD');


#
# TABLE STRUCTURE FOR: user
#

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `user_password` text CHARACTER SET latin1,
  `user_nama` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `user_level` int(5) DEFAULT NULL,
  `user_terdaftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `user_status` bit(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_foto` text,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_level`, `user_terdaftar`, `user_email`, `user_status`, `created_at`, `user_foto`) VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Duwi Haryanto', 1, '2018-09-28 17:00:00', 'Admin@gmail.com', '1', '0000-00-00 00:00:00', '0f399c2d6fa3cc467c01736f16eb0334.jpg');
INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_level`, `user_terdaftar`, `user_email`, `user_status`, `created_at`, `user_foto`) VALUES (3, 'haryanto', '8e7173cb9b869db115f77688e70b8ff7', 'haryanto duwi', 3, '2018-10-20 17:00:00', 'admin@gmail.com', '1', '0000-00-00 00:00:00', NULL);
INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_level`, `user_terdaftar`, `user_email`, `user_status`, `created_at`, `user_foto`) VALUES (12, 'mita', 'bae3d929b274a4cd35c38fe92f059f1a', 'mita', 1, '2019-12-30 12:38:01', 'mitaduwi@gmail.com', '1', '0000-00-00 00:00:00', NULL);
INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_level`, `user_terdaftar`, `user_email`, `user_status`, `created_at`, `user_foto`) VALUES (29, 'duwi', '3155e562d357a7c301d2ccafadb05e17', 'duwi haryanto', 10, '2019-12-30 14:14:49', 'haryanto.duwi@gmail.com', '1', '0000-00-00 00:00:00', NULL);
INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_level`, `user_terdaftar`, `user_email`, `user_status`, `created_at`, `user_foto`) VALUES (35, 'mika', '07af613eea059030daaed3bde1fd1ce7', 'mika', 1, '2019-12-31 07:45:32', 'mika@gmail.com', '1', '2020-01-02 10:15:30', NULL);
INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_level`, `user_terdaftar`, `user_email`, `user_status`, `created_at`, `user_foto`) VALUES (36, 'hanabi', 'd43fcce13f4c88fd28c279cc2859f579', 'hanabi', 3, '2020-01-06 17:23:31', 'hanabi@gmail.com', '1', '2020-01-06 17:23:31', NULL);
INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_level`, `user_terdaftar`, `user_email`, `user_status`, `created_at`, `user_foto`) VALUES (37, 'manajer', '69b731ea8f289cf16a192ce78a37b4f0', 'manajer', 11, '2020-03-27 21:51:47', 'manajer@gmail.com', NULL, '2020-03-27 21:51:47', NULL);
INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_level`, `user_terdaftar`, `user_email`, `user_status`, `created_at`, `user_foto`) VALUES (38, 'trimulyani', '23afaa74932756a0f16a25ed51ad9a71', 'tri mulyani', 12, '2020-04-07 11:29:50', 'trimulyani@gmail.com', '1', '2020-04-07 11:29:50', NULL);



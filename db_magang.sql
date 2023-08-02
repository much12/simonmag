/*
Navicat MySQL Data Transfer

Source Server         : Server Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_magang

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-07-25 23:13:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_bidang
-- ----------------------------
DROP TABLE IF EXISTS `t_bidang`;
CREATE TABLE `t_bidang` (
  `bidang_id` int(5) NOT NULL,
  `bidang_nama` varchar(50) NOT NULL,
  `bidang_ketua` varchar(50) NOT NULL,
  PRIMARY KEY (`bidang_id`),
  CONSTRAINT `t_bidang_ibfk_1` FOREIGN KEY (`bidang_id`) REFERENCES `t_user` (`bidang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_bidang
-- ----------------------------
INSERT INTO `t_bidang` VALUES ('1', 'Bidang Informasi Publik & Statistik', 'TARWIN PATIK MUSTAFA,S.Kom., M.M');
INSERT INTO `t_bidang` VALUES ('2', 'Bidang Komunikasi Publik', 'JAJANG MARKONI,S.Sos.,M.M');
INSERT INTO `t_bidang` VALUES ('3', 'Bidang E-Goverment', 'WAHDATUN NISSA ALKAFF, S.H');
INSERT INTO `t_bidang` VALUES ('4', 'Bidang Persandian Dan Keamanan Informasi', 'DR. TANWIRIAH, S.Kep, Ns, M.M,Kes');

-- ----------------------------
-- Table structure for t_kategori_l
-- ----------------------------
DROP TABLE IF EXISTS `t_kategori_l`;
CREATE TABLE `t_kategori_l` (
  `laporan_status` int(5) NOT NULL,
  `kategori_laporan` varchar(50) NOT NULL,
  PRIMARY KEY (`laporan_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_kategori_l
-- ----------------------------
INSERT INTO `t_kategori_l` VALUES ('0', 'Menunggu Persetujuan');
INSERT INTO `t_kategori_l` VALUES ('1', 'Disetujui');
INSERT INTO `t_kategori_l` VALUES ('2', 'Ditolak');

-- ----------------------------
-- Table structure for t_kategori_p
-- ----------------------------
DROP TABLE IF EXISTS `t_kategori_p`;
CREATE TABLE `t_kategori_p` (
  `peserta_status` int(5) NOT NULL,
  `kategori_peserta` varchar(50) NOT NULL,
  PRIMARY KEY (`peserta_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_kategori_p
-- ----------------------------
INSERT INTO `t_kategori_p` VALUES ('0', 'Selesai');
INSERT INTO `t_kategori_p` VALUES ('1', 'Aktif');
INSERT INTO `t_kategori_p` VALUES ('2', 'Pendaftar');
INSERT INTO `t_kategori_p` VALUES ('3', 'Ditolak');

-- ----------------------------
-- Table structure for t_laporan
-- ----------------------------
DROP TABLE IF EXISTS `t_laporan`;
CREATE TABLE `t_laporan` (
  `laporan_id` int(5) NOT NULL AUTO_INCREMENT,
  `laporan_tanggal` date NOT NULL,
  `peserta_id` int(5) NOT NULL,
  `laporan_kegiatan` varchar(50) NOT NULL,
  `laporan_status` int(5) NOT NULL,
  `nilai` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`laporan_id`),
  KEY `peserta_id` (`peserta_id`),
  KEY `laporan_status` (`laporan_status`),
  CONSTRAINT `t_laporan_ibfk_1` FOREIGN KEY (`peserta_id`) REFERENCES `t_peserta` (`peserta_id`),
  CONSTRAINT `t_laporan_ibfk_2` FOREIGN KEY (`laporan_status`) REFERENCES `t_kategori_l` (`laporan_status`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_laporan
-- ----------------------------
INSERT INTO `t_laporan` VALUES ('17', '2023-01-31', '21', 'Belajar', '1', null);
INSERT INTO `t_laporan` VALUES ('18', '2023-01-31', '21', 'Anu', '2', null);
INSERT INTO `t_laporan` VALUES ('19', '2023-01-30', '21', 'Tidur', '1', null);
INSERT INTO `t_laporan` VALUES ('20', '2023-02-23', '24', 'Mengerjakan Desain Grafis', '1', null);
INSERT INTO `t_laporan` VALUES ('21', '2023-02-23', '24', 'Meunjun', '1', null);
INSERT INTO `t_laporan` VALUES ('22', '2023-02-24', '27', 'Mengerjakan Desain Grafis', '1', null);
INSERT INTO `t_laporan` VALUES ('23', '2023-02-24', '27', 'Apel Pagi', '2', null);
INSERT INTO `t_laporan` VALUES ('24', '2023-02-25', '27', 'Mengerjakan Project Aplikasi', '1', null);
INSERT INTO `t_laporan` VALUES ('25', '2023-02-24', '36', 'Mengerjakan Desain Grafis', '1', null);
INSERT INTO `t_laporan` VALUES ('26', '2023-02-24', '36', 'Mengerjakan Project Aplikasi', '2', null);
INSERT INTO `t_laporan` VALUES ('27', '2023-02-24', '36', 'Apel Pagi', '0', null);
INSERT INTO `t_laporan` VALUES ('28', '2023-03-01', '38', 'Mengerjakan Desain Grafis', '1', null);
INSERT INTO `t_laporan` VALUES ('29', '2023-03-02', '38', 'Mengerjakan Project Aplikasi', '0', 'A');
INSERT INTO `t_laporan` VALUES ('30', '2023-07-25', '41', 'Mancing', '1', 'A');

-- ----------------------------
-- Table structure for t_peserta
-- ----------------------------
DROP TABLE IF EXISTS `t_peserta`;
CREATE TABLE `t_peserta` (
  `peserta_id` int(5) NOT NULL AUTO_INCREMENT,
  `peserta_nama` varchar(30) NOT NULL,
  `peserta_nim` varchar(20) NOT NULL,
  `peserta_prodi` varchar(30) NOT NULL,
  `peserta_kampus` varchar(30) NOT NULL,
  `peserta_alamat` varchar(50) NOT NULL,
  `peserta_notelp` varchar(15) NOT NULL,
  `peserta_status` int(5) NOT NULL,
  `surat_pengantar` varchar(100) DEFAULT NULL,
  `surat_balasan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`peserta_id`),
  KEY `peserta_status` (`peserta_status`),
  CONSTRAINT `t_peserta_ibfk_1` FOREIGN KEY (`peserta_status`) REFERENCES `t_kategori_p` (`peserta_status`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_peserta
-- ----------------------------
INSERT INTO `t_peserta` VALUES ('21', 'Udin Sedunia', '1710817210011', 'Teknologi Informasi', 'UNISKA', 'Banjarmasin', '08972828383', '1', null, null);
INSERT INTO `t_peserta` VALUES ('22', 'Udin Seindonesia', '1710817210012', 'Teknologi Informasi', 'UBAYA', 'Banjarmasin', '089728283831', '2', null, null);
INSERT INTO `t_peserta` VALUES ('23', 'Udin Sekalimantan', '1710817210013', 'IT', 'Universitas Indonesia', 'Banjarmasin', '08972829997', '3', null, null);
INSERT INTO `t_peserta` VALUES ('24', 'Ahmad', '1001', 'teknik informatika', 'Unlam', 'banjarmasin', '1234', '1', null, null);
INSERT INTO `t_peserta` VALUES ('25', 'Zainal Abidin', '1002', 'Manajemen Bisnis', 'Uniska', 'Martapura', '12345', '2', null, null);
INSERT INTO `t_peserta` VALUES ('26', 'Sandi Irawan', '1003', 'Teknik Informatika', 'Unlam', 'Banjarbaru', '0812415313', '3', null, null);
INSERT INTO `t_peserta` VALUES ('27', 'Ahmad Zikri Zega', '19630432', 'Teknik Informatika', 'Uniska', 'Banjarbaru', '12412513', '0', null, null);
INSERT INTO `t_peserta` VALUES ('28', 'Randi Aris Setiawan', '1234', 'Teknik Informatika', 'Uniska', 'Banjarmasin', '12143151', '2', null, '860d1fe40556717c4b6c7d26f2f4e575.pdf');
INSERT INTO `t_peserta` VALUES ('29', 'Muhammad Rudi', '12345', 'Ilmu Komputer', 'Unlam', 'Cindai Alus', '13151214', '1', null, null);
INSERT INTO `t_peserta` VALUES ('30', 'Fadillah Isan', '123456', 'Teknik Komputer Jaringan', 'STIMIK', 'Kandangan', '1319124', '1', null, null);
INSERT INTO `t_peserta` VALUES ('31', 'Jordy Septiawan', '1234567', 'Ilmu Komunikasi', 'Uniska', 'Balangan', '10331913', '1', null, null);
INSERT INTO `t_peserta` VALUES ('32', 'Muhammad Renaldy Rifqi', '12345678', 'Ilmu Pemerintahan', 'Unlam', 'Landasan Ulin', '12041240', '1', null, '35ca1a2a1c8f94e96b920952a8a9a2c6.pdf');
INSERT INTO `t_peserta` VALUES ('33', 'Andi Aldiki', '1005', 'Teknik Informatika ', 'Unlam', 'Banjarmasin', '31251351', '1', null, null);
INSERT INTO `t_peserta` VALUES ('34', 'Arief', '1006', 'Sistem Informasi', 'Unisma', 'Kandangan', '1234910', '3', null, null);
INSERT INTO `t_peserta` VALUES ('35', 'Isan', '1001', 'Teknik Informatika', 'Uniska', 'Banjarmasin', '012412', '2', null, null);
INSERT INTO `t_peserta` VALUES ('36', 'Aris gunawan', '1007', 'Teknik Informatika', 'Uniska', 'Landasan Ulin', '02141353', '1', null, null);
INSERT INTO `t_peserta` VALUES ('37', 'Jordy', '1008', 'Teknik Mesin', 'Uniska', 'Cindai Alus', '1312011', '3', null, null);
INSERT INTO `t_peserta` VALUES ('38', 'Abdussalam', '001', 'Manajemen Bisnis', 'UNISKA', 'Cindai Alus', '124135135', '1', null, null);
INSERT INTO `t_peserta` VALUES ('39', 'MOCH ARIZAL FAUZI', '19954', 'Teknik Informatika', 'Universitas Merdeka', 'Jl. Karang Ampel Dusun Karang Widoro', '6285885263097', '1', null, null);
INSERT INTO `t_peserta` VALUES ('40', 'MOCH ARIZAL FAUZI', '19958', 'Teknik Informatika', 'Universitas Merdeka', 'Jl. Karang Ampel Dusun Karang Widoro', '6285885263097', '1', '16ea229150e6c7ea21228ae9385c4582.png', null);
INSERT INTO `t_peserta` VALUES ('41', 'Nakula', '19959', 'Teknik Informatika', 'Universitas Merdeka', 'Jl. Karang Ampel Dusun Karang Widoro', '6285885263097', '1', 'ce83d13ba88c5699a5ba1b46d4961705.pdf', 'c4d9fa0b3b14f363b8e80f90f3a8e01f.pdf');

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_nama` varchar(30) NOT NULL,
  `user_notelp` varchar(15) NOT NULL,
  `user_level` int(2) NOT NULL,
  `bidang_id` int(5) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `bidang_id` (`bidang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('1', 'admin_bips', 'admin_bips', 'Bidang Informasi Publik & Stat', '0', '0', '1');
INSERT INTO `t_user` VALUES ('2', 'admin_kompub', 'admin_kompub', 'Bidang Komunikasi Publik', '0', '0', '2');
INSERT INTO `t_user` VALUES ('3', 'admin_egov', 'admin_egov', 'Bidang E-Goverment', '0', '0', '3');
INSERT INTO `t_user` VALUES ('4', 'admin_perkin', 'admin_perkin', 'Bidang Persandian Dan Keamanan', '0', '0', '4');
INSERT INTO `t_user` VALUES ('5', 'admin', 'admin', 'admin', '0', '99', '0');
INSERT INTO `t_user` VALUES ('27', '19630432', '19630432', 'Ahmad Zikri Zega', '12412513', '1', '3');
INSERT INTO `t_user` VALUES ('28', '1234', '1234', 'Randi Aris Setiawan', '12143151', '1', '1');
INSERT INTO `t_user` VALUES ('29', '12345', '12345', 'Muhammad Rudi', '13151214', '1', '4');
INSERT INTO `t_user` VALUES ('30', '123456', '123456', 'Fadillah Isan', '1319124', '1', '1');
INSERT INTO `t_user` VALUES ('31', '1234567', '1234567', 'Jordy Septiawan', '10331913', '1', '2');
INSERT INTO `t_user` VALUES ('32', '12345678', '12345678', 'Muhammad Renaldy Rifqi', '12041240', '1', '1');
INSERT INTO `t_user` VALUES ('33', '1005', '1005', 'Andi Aldiki', '31251351', '1', '2');
INSERT INTO `t_user` VALUES ('34', '1006', '1006', 'Arief', '1234910', '1', '3');
INSERT INTO `t_user` VALUES ('36', '1007', '1007', 'Aris gunawan', '02141353', '1', '3');
INSERT INTO `t_user` VALUES ('37', '1008', '1008', 'Jordy', '1312011', '1', '1');
INSERT INTO `t_user` VALUES ('38', '001', '001', 'Abdussalam', '124135135', '1', '4');
INSERT INTO `t_user` VALUES ('39', '19954', '19954', 'MOCH ARIZAL FAUZI', '6285885263097', '1', '4');
INSERT INTO `t_user` VALUES ('40', '19955', '19955', 'MOCH ARIZAL FAUZI', '6285885263097', '1', '1');
INSERT INTO `t_user` VALUES ('41', '19956', '19956', 'MOCH ARIZAL FAUZI', '6285885263097', '1', '1');
INSERT INTO `t_user` VALUES ('42', '19958', '19958', 'MOCH ARIZAL FAUZI', '6285885263097', '1', '1');
INSERT INTO `t_user` VALUES ('43', '19959', '19959', 'Nakula', '6285885263097', '1', '1');

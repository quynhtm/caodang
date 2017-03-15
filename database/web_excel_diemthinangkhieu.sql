/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : caodang

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-15 16:27:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for web_excel_diemthinangkhieu
-- ----------------------------
DROP TABLE IF EXISTS `web_excel_diemthinangkhieu`;
CREATE TABLE `web_excel_diemthinangkhieu` (
  `nangkhieu_id` int(11) NOT NULL AUTO_INCREMENT,
  `nangkhieu_sobaodanh` varchar(200) DEFAULT NULL,
  `nangkhieu_hoten` varchar(255) DEFAULT NULL,
  `nangkhieu_ngaysinh` int(12) DEFAULT NULL,
  `nangkhieu_cmt` varchar(200) DEFAULT NULL,
  `nangkhieu_sophach` int(11) DEFAULT NULL,
  `nangkhieu_monthi_mot` float(3,0) DEFAULT NULL,
  `nangkhieu_monthi_hai` float(3,0) DEFAULT NULL,
  `nangkhieu_monthi_ba` float(3,0) DEFAULT NULL,
  `nangkhieu_monthi_bon` float(3,0) DEFAULT NULL,
  `nangkhieu_monthi_nam` float(3,0) DEFAULT NULL,
  `nangkhieu_monthi_sau` float(3,0) DEFAULT NULL,
  `nangkhieu_ngaythi` int(11) DEFAULT NULL,
  `nangkhieu_ngaytao` int(11) DEFAULT NULL,
  `nangkhieu_nguoitao` varchar(250) DEFAULT NULL,
  `nangkhieu_ngaycapnhat` int(11) DEFAULT NULL,
  `nangkhieu_nguoicapnhat` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`nangkhieu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of web_excel_diemthinangkhieu
-- ----------------------------

-- ----------------------------
-- Table structure for web_excel_tuyensinh
-- ----------------------------
DROP TABLE IF EXISTS `web_excel_tuyensinh`;
CREATE TABLE `web_excel_tuyensinh` (
  `tuyensinh_id` int(11) NOT NULL AUTO_INCREMENT,
  `tuyensinh_sohoso` int(10) DEFAULT NULL,
  `tuyensinh_sobaodanh` varchar(250) DEFAULT NULL,
  `tuyensinh_hoten` varchar(250) DEFAULT NULL,
  `tuyensinh_ngaysinh` int(12) DEFAULT NULL,
  `tuyensinh_gioitinh` varchar(50) DEFAULT NULL,
  `tuyensinh_cmt` varchar(100) DEFAULT NULL,
  `tuyensinh_khuvuc_uutien` varchar(50) DEFAULT NULL,
  `tuyensinh_diem_uutien` int(5) DEFAULT NULL,
  `tuyensinh_tinhthanh` varchar(200) DEFAULT NULL,
  `tuyensinh_quanhuyen` varchar(200) DEFAULT NULL,
  `tuyensinh_monthi_mot` varchar(50) DEFAULT NULL,
  `tuyensinh_diem_monthimot` float(3,0) DEFAULT NULL,
  `tuyensinh_monthi_hai` varchar(50) DEFAULT NULL,
  `tuyensinh_diem_monthihai` float(3,0) DEFAULT NULL,
  `tuyensinh_monthi_ba` varchar(50) DEFAULT NULL,
  `tuyensinh_diem_monthiba` float(3,0) DEFAULT NULL,
  `tuyensinh_diemlech` float(3,0) DEFAULT NULL,
  `tuyensinh_tongdiemchua_uutien` float(3,0) DEFAULT NULL,
  `tuyensinh_diem_uutien_quydoi` float(3,0) DEFAULT NULL,
  `tuyensinh_tongdiemco_uutien` float(3,0) DEFAULT NULL,
  `tuyensinh_nganhtrungtuyen` varchar(200) DEFAULT NULL,
  `tuyensinh_dotxettuyen` varchar(200) DEFAULT NULL,
  `tuyensinh_trinhdo` varchar(200) DEFAULT NULL,
  `tuyensinh_hinhthucxettuyen` varchar(200) DEFAULT NULL,
  `tuyensinh_ngaytao` int(12) DEFAULT NULL,
  `tuyensinh_nguoitao` varchar(250) DEFAULT NULL,
  `tuyensinh_ngaycapnhat` int(12) DEFAULT NULL,
  `tuyensinh_nguoicapnhat` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`tuyensinh_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of web_excel_tuyensinh
-- ----------------------------

-- ----------------------------
-- Table structure for web_excel_vanbangchungchi
-- ----------------------------
DROP TABLE IF EXISTS `web_excel_vanbangchungchi`;
CREATE TABLE `web_excel_vanbangchungchi` (
  `vanbang_id` int(11) NOT NULL AUTO_INCREMENT,
  `vanbang_hoten` varchar(255) DEFAULT NULL,
  `vanbang_ngaysinh` int(12) DEFAULT NULL,
  `vanbang_noisinh` varchar(255) DEFAULT NULL,
  `vanbang_gioitinh` varchar(50) DEFAULT NULL,
  `vanbang_dantoc` varchar(50) DEFAULT NULL,
  `vanbang_nganhdaotao` varchar(200) DEFAULT NULL,
  `vanbang_namtotnghiep` int(10) DEFAULT NULL,
  `vanbang_xeploai` varchar(200) DEFAULT NULL,
  `vanbang_machungchi` varchar(255) DEFAULT NULL,
  `vanbang_chungchiso` varchar(255) DEFAULT NULL,
  `vanbang_khoahoc` varchar(255) DEFAULT NULL,
  `vanbang_trinhdo` varchar(255) DEFAULT NULL,
  `vanbang_htdaotao` varchar(250) DEFAULT NULL,
  `vanbang_sototnghiep` int(10) DEFAULT NULL,
  `vanbang_ngaytotnghiep` int(11) DEFAULT NULL,
  `vanbang_ngaytao` int(11) DEFAULT NULL,
  `vanbang_nguoitao` varchar(50) DEFAULT NULL,
  `vanbang_capnhat` int(11) DEFAULT NULL,
  `vanbang_nguoicapnhat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`vanbang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of web_excel_vanbangchungchi
-- ----------------------------

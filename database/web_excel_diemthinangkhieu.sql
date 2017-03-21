/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : caodang

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-21 16:35:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for web_excel_diemthinangkhieu
-- ----------------------------
DROP TABLE IF EXISTS `web_excel_diemthinangkhieu`;
CREATE TABLE `web_excel_diemthinangkhieu` (
  `nangkhieu_id` int(11) NOT NULL AUTO_INCREMENT,
  `nangkhieu_sobaodanh` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `nangkhieu_hoten` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `nangkhieu_ngaysinh` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `nangkhieu_cmt` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `nangkhieu_sophach` int(11) DEFAULT NULL,
  `nangkhieu_monthi_mot` float(3,0) DEFAULT NULL,
  `nangkhieu_monthi_hai` float(3,0) DEFAULT NULL,
  `nangkhieu_monthi_ba` float(3,0) DEFAULT NULL,
  `nangkhieu_monthi_bon` float(3,0) DEFAULT NULL,
  `nangkhieu_monthi_nam` float(3,0) DEFAULT NULL,
  `nangkhieu_monthi_sau` float(3,0) DEFAULT NULL,
  `nangkhieu_ngaythi` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `nangkhieu_ngaytao` int(11) DEFAULT NULL,
  `nangkhieu_nguoitao` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `nangkhieu_ngaycapnhat` int(11) DEFAULT NULL,
  `nangkhieu_nguoicapnhat` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
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
  `tuyensinh_sobaodanh` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_hoten` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_ngaysinh` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_gioitinh` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_cmt` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_khuvuc_uutien` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_diem_uutien` float(5,0) DEFAULT NULL,
  `tuyensinh_tinhthanh` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_quanhuyen` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_monthi_mot` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_diem_monthimot` float(3,0) DEFAULT NULL,
  `tuyensinh_monthi_hai` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_diem_monthihai` float(3,0) DEFAULT NULL,
  `tuyensinh_monthi_ba` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_diem_monthiba` float(3,0) DEFAULT NULL,
  `tuyensinh_diemlech` float(3,0) DEFAULT NULL,
  `tuyensinh_tongdiemchua_uutien` float(3,0) DEFAULT NULL,
  `tuyensinh_diem_uutien_quydoi` float(3,0) DEFAULT NULL,
  `tuyensinh_tongdiemco_uutien` float(3,0) DEFAULT NULL,
  `tuyensinh_nganhtrungtuyen` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_dotxettuyen` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_trinhdo` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_hinhthucxettuyen` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_ngaytao` int(12) DEFAULT NULL,
  `tuyensinh_nguoitao` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `tuyensinh_ngaycapnhat` int(12) DEFAULT NULL,
  `tuyensinh_nguoicapnhat` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
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
  `vanbang_hoten` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_ngaysinh` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_noisinh` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_gioitinh` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_dantoc` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_nganhdaotao` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_namtotnghiep` int(10) DEFAULT NULL,
  `vanbang_xeploai` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_machungchi` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_chungchiso` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_khoahoc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_trinhdo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_htdaotao` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_sototnghiep` int(10) DEFAULT NULL,
  `vanbang_ngaytotnghiep` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_ngaytao` int(11) DEFAULT NULL,
  `vanbang_nguoitao` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `vanbang_capnhat` int(11) DEFAULT NULL,
  `vanbang_nguoicapnhat` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`vanbang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of web_excel_vanbangchungchi
-- ----------------------------
INSERT INTO `web_excel_vanbangchungchi` VALUES ('1', 'Phạm Ngọc Ánh', '01-15-94', 'Vĩnh Phúc', 'Nữ', 'Kinh', 'Quản lý Văn hóa', '2015', 'Khá', 'B 445657', '15-CĐ-01', '2012-1015', 'Cao đẳng', 'Chính quy', '643', '03-12-15', '1490088493', 'Admin', null, null);
INSERT INTO `web_excel_vanbangchungchi` VALUES ('2', 'Trần Thị Biên', '08-06-94', 'Hà Nội', 'Nữ', 'Kinh', 'Quản lý Văn hóa', '2015', 'Khá', 'B 445659', '15-CĐ-02', '2012-1015', 'Cao đẳng', 'Chính quy', '643', '03-12-15', '1490088493', 'Admin', null, null);
INSERT INTO `web_excel_vanbangchungchi` VALUES ('3', 'Nguyễn Trung Bộ', '11-10-93', 'Tuyên Quang', 'Nam', 'Tày', 'Quản lý Văn hóa', '2015', 'Khá', 'B 445660', '15-CĐ-03', '2012-1015', 'Cao đẳng', 'Chính quy', '643', '03-12-15', '1490088493', 'Admin', null, null);
INSERT INTO `web_excel_vanbangchungchi` VALUES ('4', 'Hoàng Thế Đạt', '01-05-93', 'Cao Bằng', 'Nam', 'Tày', 'Quản lý Văn hóa', '2015', 'Trung bình khá', 'B 445661', '15-CĐ-04', '2012-1015', 'Cao đẳng', 'Chính quy', '643', '03-12-15', '1490088493', 'Admin', null, null);
INSERT INTO `web_excel_vanbangchungchi` VALUES ('5', 'Nguyễn Thị Hòa', '09-05-94', 'Thanh Hóa', 'Nữ', 'Kinh', 'Quản lý Văn hóa', '2015', 'Khá', 'B 445662', '15-CĐ-05', '2012-1015', 'Trung cấp', 'Chính quy', '643', '07-15-16', '1490088493', 'Admin', null, null);

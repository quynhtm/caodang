/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : caodang

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-03-08 11:36:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for group_user
-- ----------------------------
DROP TABLE IF EXISTS `group_user`;
CREATE TABLE `group_user` (
  `group_user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id nhom nguoi dung',
  `group_user_name` varchar(50) NOT NULL COMMENT 'Ten nhom nguoi dung',
  `group_user_status` int(1) NOT NULL DEFAULT '1' COMMENT '1 : hiá»‡n , 0 : áº©n',
  `group_user_type` int(1) NOT NULL DEFAULT '1' COMMENT '1:admin;2:shop',
  PRIMARY KEY (`group_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group_user
-- ----------------------------
INSERT INTO `group_user` VALUES ('1', 'Quyền Boss', '1', '1');
INSERT INTO `group_user` VALUES ('2', 'Root', '1', '1');
INSERT INTO `group_user` VALUES ('3', 'Quyền Admin site', '1', '1');
INSERT INTO `group_user` VALUES ('4', 'Quyền quản lý bài viết', '1', '1');

-- ----------------------------
-- Table structure for group_user_permission
-- ----------------------------
DROP TABLE IF EXISTS `group_user_permission`;
CREATE TABLE `group_user_permission` (
  `group_user_id` int(11) NOT NULL COMMENT 'id nhÃ³m',
  `permission_id` int(11) NOT NULL COMMENT 'id quyÃ¨n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group_user_permission
-- ----------------------------
INSERT INTO `group_user_permission` VALUES ('2', '2');
INSERT INTO `group_user_permission` VALUES ('1', '1');
INSERT INTO `group_user_permission` VALUES ('3', '2');
INSERT INTO `group_user_permission` VALUES ('4', '13');
INSERT INTO `group_user_permission` VALUES ('4', '14');
INSERT INTO `group_user_permission` VALUES ('4', '18');
INSERT INTO `group_user_permission` VALUES ('4', '19');
INSERT INTO `group_user_permission` VALUES ('4', '28');
INSERT INTO `group_user_permission` VALUES ('4', '29');

-- ----------------------------
-- Table structure for permission
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_code` varchar(50) NOT NULL COMMENT 'MÃ£ quyá»n',
  `permission_name` varchar(50) NOT NULL COMMENT 'TÃªn quyá»n',
  `permission_status` int(1) NOT NULL DEFAULT '1' COMMENT '1:hiá»‡n , 0:áº©n',
  `permission_group_name` varchar(255) DEFAULT NULL COMMENT 'group ten controller',
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES ('1', 'is_boss', 'Boss', '1', 'Boss');
INSERT INTO `permission` VALUES ('2', 'root', 'Quản trị Site', '1', 'Quản trị Site');
INSERT INTO `permission` VALUES ('3', 'user_create', 'Tạo user Admin', '1', 'Tài khoản Admin');
INSERT INTO `permission` VALUES ('4', 'user_edit', 'Sửa user Admin', '1', 'Tài khoản Admin');
INSERT INTO `permission` VALUES ('5', 'user_change_pass', 'Thay đổi user Admin', '1', 'Tài khoản Admin');
INSERT INTO `permission` VALUES ('6', 'user_remove', 'Xóa user Admin', '1', 'Tài khoản Admin');
INSERT INTO `permission` VALUES ('7', 'group_user_view', 'Xem nhóm quyền', '1', 'Nhóm quyền');
INSERT INTO `permission` VALUES ('8', 'group_user_create', 'Tạo nhóm quyền', '1', 'Nhóm quyền');
INSERT INTO `permission` VALUES ('9', 'group_user_edit', 'Sửa nhóm quyền', '1', 'Nhóm quyền');
INSERT INTO `permission` VALUES ('10', 'permission_full', 'Full tạo quyền', '1', 'Tạo quyền');
INSERT INTO `permission` VALUES ('11', 'permission_create', 'Tạo tạo quyền', '1', 'Tạo quyền');
INSERT INTO `permission` VALUES ('12', 'permission_edit', 'Sửa tạo quyền', '1', 'Tạo quyền');
INSERT INTO `permission` VALUES ('13', 'banner_full', 'Full quảng cáo', '1', 'Quyền quảng cáo');
INSERT INTO `permission` VALUES ('14', 'banner_view', 'Xem quảng cáo', '1', 'Quyền quảng cáo');
INSERT INTO `permission` VALUES ('15', 'banner_delete', 'Xóa quảng cáo', '1', 'Quyền quảng cáo');
INSERT INTO `permission` VALUES ('16', 'banner_create', 'Tạo quảng cáo', '1', 'Quyền quảng cáo');
INSERT INTO `permission` VALUES ('17', 'banner_edit', 'Sửa quảng cáo', '1', 'Quyền quảng cáo');
INSERT INTO `permission` VALUES ('18', 'category_full', 'Full danh mục', '1', 'Quyền danh mục');
INSERT INTO `permission` VALUES ('19', 'category_view', 'Xem danh mục', '1', 'Quyền danh mục');
INSERT INTO `permission` VALUES ('20', 'category_delete', 'Xóa danh mục', '1', 'Quyền danh mục');
INSERT INTO `permission` VALUES ('21', 'category_create', 'Tạo danh mục', '1', 'Quyền danh mục');
INSERT INTO `permission` VALUES ('22', 'category_edit', 'Sửa danh mục', '1', 'Quyền danh mục');
INSERT INTO `permission` VALUES ('23', 'items_full', 'Full tin rao', '1', 'Quyền tin rao');
INSERT INTO `permission` VALUES ('24', 'items_view', 'Xem tin rao', '1', 'Quyền tin rao');
INSERT INTO `permission` VALUES ('25', 'items_delete', 'Xóa tin rao', '1', 'Quyền tin rao');
INSERT INTO `permission` VALUES ('26', 'items_create', 'Tạo tin rao', '1', 'Quyền tin rao');
INSERT INTO `permission` VALUES ('27', 'items_edit', 'Sửa tin rao', '1', 'Quyền tin rao');
INSERT INTO `permission` VALUES ('28', 'news_full', 'Full tin tức', '1', 'Quyền tin tức');
INSERT INTO `permission` VALUES ('29', 'news_view', 'Xem tin tức', '1', 'Quyền tin tức');
INSERT INTO `permission` VALUES ('30', 'news_delete', 'Xóa tin tức', '1', 'Quyền tin tức');
INSERT INTO `permission` VALUES ('31', 'news_create', 'Tạo tin tức', '1', 'Quyền tin tức');
INSERT INTO `permission` VALUES ('32', 'news_edit', 'Sửa tin tức', '1', 'Quyền tin tức');
INSERT INTO `permission` VALUES ('33', 'province_full', 'Full tỉnh thành', '1', 'Quyền tỉnh thành');
INSERT INTO `permission` VALUES ('34', 'province_view', 'Xem tỉnh thành', '1', 'Quyền tỉnh thành');
INSERT INTO `permission` VALUES ('35', 'province_delete', 'Xóa tỉnh thành', '1', 'Quyền tỉnh thành');
INSERT INTO `permission` VALUES ('36', 'province_create', 'Tạo tỉnh thành', '1', 'Quyền tỉnh thành');
INSERT INTO `permission` VALUES ('37', 'province_edit', 'Sửa tỉnh thành', '1', 'Quyền tỉnh thành');
INSERT INTO `permission` VALUES ('38', 'user_customer_full', 'Full khách hàng', '1', 'Quyền khách hàng');
INSERT INTO `permission` VALUES ('39', 'user_customer_view', 'Xem khách hàng', '1', 'Quyền khách hàng');
INSERT INTO `permission` VALUES ('40', 'user_customer_delete', 'Xóa khách hàng', '1', 'Quyền khách hàng');
INSERT INTO `permission` VALUES ('41', 'user_customer_create', 'Tạo khách hàng', '1', 'Quyền khách hàng');
INSERT INTO `permission` VALUES ('42', 'user_customer_edit', 'Sửa khách hàng', '1', 'Quyền khách hàng');
INSERT INTO `permission` VALUES ('43', 'toolsCommon_full', 'Full quyền', '1', 'Full quyền Share link');
INSERT INTO `permission` VALUES ('45', 'user_view', 'Xem danh sách user Admin', '1', 'Tài khoản Admin');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `user_sex` tinyint(5) DEFAULT '0' COMMENT '0: nữ: 1 nam',
  `user_email` varchar(255) DEFAULT NULL,
  `user_phone` varchar(11) DEFAULT NULL,
  `user_service` varchar(255) DEFAULT NULL COMMENT 'Chức vụ',
  `user_time_work_start` int(11) DEFAULT '0' COMMENT 'Thời gian bắt đầu làm việc',
  `user_time_work_end` int(11) DEFAULT NULL COMMENT 'Thời gian nghỉ',
  `user_group_depart` varchar(200) DEFAULT NULL COMMENT 'Thuộc nhóm khoa: 1,2,3..',
  `user_status` int(2) NOT NULL DEFAULT '1' COMMENT '-1: xÃ³a , 1: active',
  `user_group` varchar(255) DEFAULT NULL,
  `user_last_login` int(11) DEFAULT NULL,
  `user_last_ip` varchar(15) DEFAULT NULL,
  `user_create_id` int(11) DEFAULT NULL,
  `user_create_name` varchar(255) DEFAULT NULL,
  `user_edit_id` int(11) DEFAULT NULL,
  `user_edit_name` varchar(255) DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `user_updated` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2', 'admin', 'eef828faf0754495136af05c051766cb', 'Admin', '0', '', '', '', '0', '0', '', '1', '1,2', '1488939082', '127.0.0.1', null, null, null, null, null, null);
INSERT INTO `user` VALUES ('19', 'tech_code', '273704d8aff01015b6bdd001f5e73463', 'Tech code 3555', '0', '', '', '', '0', '0', '', '1', '2', '1487301492', '::1', null, null, '2', 'admin', null, '1481772561');
INSERT INTO `user` VALUES ('20', 'svquynhtm', 'fa268d7af7410dbf1b860075e9074889', 'Trương Mạnh Quỳnh', '1', 'manhquynh1984@gmail.com', '0938413368', 'Cộng tác viên', '1483203600', '1484240400', '1,6,7,8,9', '1', '3', '1482826054', '::1', '2', 'admin', '2', 'admin', '1482823830', '1482824272');
INSERT INTO `user` VALUES ('21', 'quantricaodang', '8223661a604a916364b6581ce1ca44db', 'Quản trị site', '0', '', '', 'Admin site', '0', '0', '1,2,3,4,5,6,7,8,9', '1', '3', null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('22', 'congtacvien', 'b899cec2f6ecfaf912ff013647d0a9e8', 'Cộng tác viên', '0', '', '', '', '0', '0', '1,7', '1', '4', '1487306266', '::1', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for web_banner
-- ----------------------------
DROP TABLE IF EXISTS `web_banner`;
CREATE TABLE `web_banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `banner_link` varchar(255) DEFAULT NULL,
  `banner_page` tinyint(5) DEFAULT '0' COMMENT '1: trang chủ, 2: trang list,3: trang detail, 4: trang list danh mục',
  `banner_type` tinyint(5) DEFAULT '0' COMMENT '1:banner home to, 2: banner home nhỏ,3: banner trái, 4 banner phải',
  `banner_province_id` int(11) DEFAULT '0' COMMENT 'tỉnh thành hiển thị',
  `banner_category_id` int(11) DEFAULT '0',
  `banner_order` tinyint(5) DEFAULT '1' COMMENT 'thứ tự hiển thị',
  `banner_position` tinyint(2) DEFAULT '1' COMMENT 'Vị trí hiển thị banner 1;top, 2:center,3Bottom',
  `banner_parent_id` int(11) DEFAULT '0' COMMENT 'Lưu id banner cha để lấy ảnh của banner cha hiển thị',
  `banner_is_target` tinyint(5) DEFAULT '0' COMMENT '0: Không mở tab mới, 1: mở tab mới',
  `banner_is_rel` tinyint(5) DEFAULT '0' COMMENT '0:nofollow, 1:follow',
  `banner_status` tinyint(5) DEFAULT '0',
  `banner_is_run_time` tinyint(5) DEFAULT '0' COMMENT '0: không có time chay,1: có thời gian chạy quảng cáo',
  `banner_start_time` int(11) DEFAULT '0',
  `banner_end_time` int(11) DEFAULT '0',
  `banner_total_click` int(11) DEFAULT '0' COMMENT 'lượt click banner theo id',
  `banner_create_time` int(11) DEFAULT '0',
  `banner_time_click` int(11) DEFAULT '0' COMMENT 'Time click gần nhất',
  `banner_update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_banner
-- ----------------------------
INSERT INTO `web_banner` VALUES ('7', 'Banner đầu trang', '1487058142-1.png', '', '0', '1', '0', '0', '1', '1', '0', '0', '0', '1', '0', '0', '0', '0', '1487047213', '0', '1487058811');
INSERT INTO `web_banner` VALUES ('8', 'Banner slider 1', '1487231176-banner.png', 'http://cdsptw.edu.vn', '0', '6', '0', '0', '1', '1', '0', '0', '0', '1', '0', '0', '0', '0', '1487047791', '0', '1487231178');
INSERT INTO `web_banner` VALUES ('9', 'Banner slider 2', '1488431115-1.png', 'http://cdsptw.edu.vn', '0', '6', '0', '0', '2', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1487047807', '0', '1488431118');
INSERT INTO `web_banner` VALUES ('10', 'Chuyên đề 3 công khai', '1487065545-chuyen-de.gif', 'http://cdsptw.edu.vn', '0', '2', '0', '0', '1', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1487065545', '0', '1487065549');
INSERT INTO `web_banner` VALUES ('11', 'Văn bằng chứng chỉ', '1487065576-hoc-phi-copy.jpg', 'http://cdsptw.edu.vn', '0', '3', '0', '0', '1', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1487065576', '0', '1487065787');
INSERT INTO `web_banner` VALUES ('12', 'Thư điện tử', '1487065610-thu-dien-tu.gif', 'http://cdsptw.edu.vn', '0', '3', '0', '0', '2', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1487065610', '0', '1487065613');
INSERT INTO `web_banner` VALUES ('13', 'Lịch công tác tuần', '1488440273-lich-cong-tac.jpg', 'http://cdsptw.edu.vn', '0', '7', '0', '0', '1', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1488440272', '0', '1488440678');
INSERT INTO `web_banner` VALUES ('14', 'Banner đối tác Viettel', '1488441983-y-nghia-logo-viettel.jpg', 'http://cdsptw.edu.vn', '0', '8', '0', '0', '1', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1488441983', '0', '1488442041');
INSERT INTO `web_banner` VALUES ('15', 'Banner đối tác Agribank', '1488442027-agribank.png', 'http://cdsptw.edu.vn', '0', '8', '0', '0', '2', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1488442027', '0', '1488442033');
INSERT INTO `web_banner` VALUES ('16', 'Banner đối tác BIDV', '1488442074-thanh-toan-bidv.jpg', 'http://cdsptw.edu.vn', '0', '-1', '0', '0', '3', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1488442074', '0', '1488442079');
INSERT INTO `web_banner` VALUES ('17', 'Banner đối tác MB', '1488442090-4fe3f2f8logonganhangquandoi.jpg', 'http://cdsptw.edu.vn', '0', '8', '0', '0', '4', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1488442090', '0', '1488442102');
INSERT INTO `web_banner` VALUES ('18', 'Banner đối tác Maritimebank', '1488442109-images.png', 'http://cdsptw.edu.vn', '0', '8', '0', '0', '5', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1488442109', '0', '1488442133');
INSERT INTO `web_banner` VALUES ('19', 'Banner đối tác Vpbank', '1488442146-vpbank.png', 'http://cdsptw.edu.vn', '0', '8', '0', '0', '6', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1488442146', '0', '1488442157');
INSERT INTO `web_banner` VALUES ('20', 'Banner đối tác Vin', '1488442165-logovg.jpg', 'http://cdsptw.edu.vn', '0', '8', '0', '0', '7', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1488442165', '0', '1488442208');
INSERT INTO `web_banner` VALUES ('21', 'Banner đối tác Vietcombank', '1488442181-logo-vietcombank-moi-2014.jpg', 'http://cdsptw.edu.vn', '0', '8', '0', '0', '8', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1488442181', '0', '1488442201');
INSERT INTO `web_banner` VALUES ('22', 'Banner đối tác Pico', '1488442227-kt1.jpg', 'http://cdsptw.edu.vn', '0', '8', '0', '0', '9', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1488442227', '0', '1488442236');
INSERT INTO `web_banner` VALUES ('23', 'Banner đối tác Vinacoma', '1488442282-logo-2.png', 'http://cdsptw.edu.vn', '0', '8', '0', '0', '10', '1', '0', '1', '0', '1', '0', '0', '0', '0', '1488442282', '0', '1488442298');

-- ----------------------------
-- Table structure for web_category_depart
-- ----------------------------
DROP TABLE IF EXISTS `web_category_depart`;
CREATE TABLE `web_category_depart` (
  `category_depart_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_depart_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `department_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_depart_status` tinyint(1) DEFAULT '0',
  `category_depart_order` tinyint(5) DEFAULT '0',
  PRIMARY KEY (`category_depart_id`),
  KEY `status` (`category_depart_status`) USING BTREE,
  KEY `id_parrent` (`department_id`,`category_depart_status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of web_category_depart
-- ----------------------------
INSERT INTO `web_category_depart` VALUES ('1', '1', '0', null, '0', '0');

-- ----------------------------
-- Table structure for web_category_new
-- ----------------------------
DROP TABLE IF EXISTS `web_category_new`;
CREATE TABLE `web_category_new` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_depart_id` int(11) DEFAULT NULL COMMENT 'thuộc danh mục của khoa nào ',
  `category_parent_id` int(11) unsigned DEFAULT '0',
  `category_show_top` tinyint(2) DEFAULT '0',
  `category_show_left` tinyint(2) DEFAULT '1',
  `category_show_right` tinyint(2) DEFAULT NULL,
  `category_show_center` tinyint(2) DEFAULT '0',
  `category_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_status` tinyint(1) DEFAULT '0',
  `category_order` tinyint(5) DEFAULT '0',
  `category_date_creater` int(11) DEFAULT NULL,
  `category_user_id_creater` int(11) DEFAULT NULL,
  `category_user_name_creater` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_date_update` int(11) DEFAULT NULL,
  `category_user_id_update` int(11) DEFAULT NULL,
  `category_user_name_update` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  KEY `status` (`category_status`) USING BTREE,
  KEY `id_parrent` (`category_parent_id`,`category_status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=308 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of web_category_new
-- ----------------------------
INSERT INTO `web_category_new` VALUES ('266', 'Giới thiệu', '7', '0', '1', '1', '0', '0', null, null, '1', '1', '1487045320', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('267', 'Tuyển sinh', '7', '0', '1', '0', '1', '0', null, null, '1', '3', '1487045387', '2', 'admin', '1488431387', '2', 'admin');
INSERT INTO `web_category_new` VALUES ('268', 'Đào tạo', '7', '0', '1', '1', '0', '0', null, null, '1', '4', '1487045820', '2', 'admin', '1488431402', '2', 'admin');
INSERT INTO `web_category_new` VALUES ('269', 'Đoàn thanh niên - Hội sinh viên', '7', '0', '1', '0', '0', '0', '', null, '1', '6', '1487045915', '2', 'admin', '1488939099', '2', 'admin');
INSERT INTO `web_category_new` VALUES ('270', 'Nghiên cứu khoa học', '7', '296', '1', '0', '1', '0', null, null, '1', '5', '1487045947', '2', 'admin', '1487148699', '2', 'admin');
INSERT INTO `web_category_new` VALUES ('271', 'Thông báo', '7', '0', '0', '0', '0', '0', null, null, '1', '6', '1487045974', '2', 'admin', '1488431477', '2', 'admin');
INSERT INTO `web_category_new` VALUES ('272', 'Trung tâm, trường MNTH', '7', '0', '0', '0', '0', '0', null, null, '1', '7', '1487046211', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('273', 'Giới thiệu Đoàn thể', '7', '0', '0', '0', '0', '0', null, null, '1', '7', '1487046261', '2', 'admin', '1487066530', '2', 'admin');
INSERT INTO `web_category_new` VALUES ('276', 'Tin tức', '7', '0', '1', '1', '0', '0', null, null, '1', '2', '1487147165', '2', 'admin', '1488431364', '2', 'admin');
INSERT INTO `web_category_new` VALUES ('277', 'Lịch công tác tuần', '7', '276', '0', '0', '0', '0', null, null, '1', '1', '1487147582', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('278', 'Văn bản chỉ đạo, điều hành của Bộ Giáo dục và Đào tạo', '7', '276', '0', '0', '0', '0', null, null, '1', '2', '1487147608', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('279', 'Tin tuyển sinh', '7', '276', '0', '0', '0', '0', null, null, '1', '3', '1487147630', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('280', 'Hoạt động đào tạo', '7', '276', '0', '0', '0', '0', null, null, '1', '4', '1487147655', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('281', 'Hoạt động đoàn thể', '7', '276', '0', '0', '0', '0', null, null, '1', '5', '1487147673', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('282', 'Hoạt động của các trường Mầm non thực hành', '7', '276', '0', '0', '0', '0', null, null, '1', '6', '1487147690', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('283', 'Thư viện ảnh, video hoạt động', '7', '0', '0', '0', '0', '0', null, null, '1', '10', '1487147781', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('284', 'Thư viện ảnh', '7', '283', '0', '0', '0', '0', null, null, '1', '1', '1487147797', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('285', 'Video hoạt động', '7', '283', '0', '0', '0', '0', null, null, '1', '2', '1487147814', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('286', 'Trình độ cao đẳng', '7', '267', '0', '0', '0', '0', null, null, '1', '1', '1487148138', '2', 'admin', '1487148190', '2', 'admin');
INSERT INTO `web_category_new` VALUES ('287', 'Trình độ Trung cấp chuyên nghiệp', '7', '267', '0', '0', '0', '0', null, null, '1', '2', '1487148157', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('288', 'Các khóa ngắn hạn', '7', '267', '0', '0', '0', '0', null, null, '1', '3', '1487148184', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('289', 'Tra cứu điểm tuyển sinh', '7', '267', '0', '0', '0', '0', null, null, '1', '4', '1487148213', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('290', 'Thông báo', '7', '268', '0', '0', '0', '0', null, null, '1', '1', '1487148239', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('291', 'Trình độ cao đẳng', '7', '268', '0', '0', '0', '0', null, null, '1', '2', '1487148257', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('292', 'Trình độ Trung cấp chuyên nghiệp', '7', '268', '0', '0', '0', '0', null, null, '1', '3', '1487148272', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('293', 'Bồi dưỡng thường xuyên', '7', '268', '0', '0', '0', '0', null, null, '1', '5', '1487148289', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('294', 'Phối hợp đào tạo', '7', '268', '0', '0', '0', '0', null, null, '1', '6', '1487148303', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('295', 'Văn bản pháp quy', '7', '0', '0', '0', '0', '0', '', null, '1', '6', '1487148318', '2', 'admin', '1488893872', '2', 'admin');
INSERT INTO `web_category_new` VALUES ('296', 'Nghiên cứu khoa học và hợp tác quốc tế', '7', '0', '0', '0', '0', '0', null, null, '1', '5', '1487148671', '2', 'admin', '1488431416', '2', 'admin');
INSERT INTO `web_category_new` VALUES ('297', 'Hợp tác quốc tế', '7', '296', '0', '0', '0', '0', null, null, '1', '2', '1487148823', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('298', 'Tốt nghiệp-Cựu sinh viên', '7', '0', '0', '0', '0', '0', null, null, '1', '12', '1487148927', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('299', 'Tra cứu văn bằng chứng chỉ', '7', '298', '0', '0', '0', '0', null, null, '1', '1', '1487148963', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('300', 'Khảo sát tình trạng việc làm', '7', '298', '0', '0', '0', '0', null, null, '1', '2', '1487148980', '2', 'admin', null, null, null);
INSERT INTO `web_category_new` VALUES ('301', 'Hoạt động sinh viên', '7', '0', '0', '0', '0', '0', '', '11.jpg', '1', '15', '1488945394', '2', 'admin', '1488946760', '2', 'admin');
INSERT INTO `web_category_new` VALUES ('302', 'Báo cáo Ba công khai', '7', '266', '0', '0', '0', '0', '', '', '1', '21', '1488945616', '2', 'admin', null, null, null);

-- ----------------------------
-- Table structure for web_contact
-- ----------------------------
DROP TABLE IF EXISTS `web_contact`;
CREATE TABLE `web_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_title` varchar(255) DEFAULT NULL COMMENT 'tên liên hệ',
  `contact_content` mediumtext,
  `contact_content_reply` mediumtext,
  `contact_user_id_send` int(11) DEFAULT '0' COMMENT '0: khách vãng lai gửi, > 0 shop gửi liên hệ',
  `contact_user_name_send` varchar(255) DEFAULT NULL,
  `contact_phone_send` varchar(255) DEFAULT NULL,
  `contact_email_send` varchar(255) DEFAULT NULL,
  `contact_type` tinyint(5) DEFAULT '1' COMMENT '1:loại gửi , 2: loại nhận',
  `contact_reason` tinyint(5) DEFAULT '1' COMMENT 'Lý do gửi liên hệ: 1: liên hệ ở ngoài site, 2: shop liên hệ với quản trị',
  `contact_status` tinyint(5) DEFAULT '1' COMMENT '1: liên hệ mới, 2: đã xác nhận,3: đã xử lý',
  `contact_time_creater` int(11) DEFAULT NULL,
  `contact_user_id_update` int(11) DEFAULT NULL COMMENT 'Người xử lý liên hệ',
  `contact_user_name_update` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `contact_time_update` int(11) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_contact
-- ----------------------------
INSERT INTO `web_contact` VALUES ('1', 'Testing...', 'Testing...', null, '0', 'Nguyễn Duy', '0913922986', 'nguyenduypt86@gmail.com', '1', '1', '0', '1487043189', null, null, null);

-- ----------------------------
-- Table structure for web_department
-- ----------------------------
DROP TABLE IF EXISTS `web_department`;
CREATE TABLE `web_department` (
  `department_id` int(10) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_alias` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'giá trị type_keword',
  `department_layouts` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'giá trị type_keword',
  `department_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_status` tinyint(1) DEFAULT '0',
  `department_order` tinyint(5) DEFAULT '0',
  PRIMARY KEY (`department_id`),
  KEY `status` (`department_status`) USING BTREE,
  KEY `id_parrent` (`department_status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of web_department
-- ----------------------------
INSERT INTO `web_department` VALUES ('1', 'Khoa âm nhạc', 'khoaamnhac', 'type_khoa', 'layouts_khoa', null, '1', '1');
INSERT INTO `web_department` VALUES ('2', 'Trung tâm tiếng anh', 'trungtamtienganh', 'type_trung tâm', 'layouts_khoa', null, '1', '2');
INSERT INTO `web_department` VALUES ('3', 'Khoa cơ bản', 'khoacoban', 'type_khoa', 'layouts_home', null, '1', '3');
INSERT INTO `web_department` VALUES ('4', 'Khoa Giáo dục đặc biệt', 'khoagiaoducdacbiet', 'type_khoa', 'layouts_home', null, '1', '4');
INSERT INTO `web_department` VALUES ('5', 'Khoa Giáo dục mầm non', 'khoagiaoducmamnon', 'type_khoa', 'layouts_home', null, '1', '5');
INSERT INTO `web_department` VALUES ('6', 'Khoa Mỹ thuật', 'khoamythuat', 'type_khoa', 'layouts_home', null, '1', '6');
INSERT INTO `web_department` VALUES ('7', 'Khoa Công Nghệ Thông Tin', 'khoacongnghethongtin', 'type_khoa', 'layouts_home', null, '1', '7');
INSERT INTO `web_department` VALUES ('8', 'Khoa Quản lý - Văn thư', 'khoaquanlyvanthu', 'type_khoa', 'layouts_home', null, '1', '8');
INSERT INTO `web_department` VALUES ('9', 'Khoa Xã hội - Nhân văn', 'khoaxahoinhanvan', 'type_khoa', 'layouts_home', null, '1', '9');

-- ----------------------------
-- Table structure for web_event
-- ----------------------------
DROP TABLE IF EXISTS `web_event`;
CREATE TABLE `web_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) DEFAULT NULL,
  `event_desc_sort` text,
  `event_content` text,
  `event_depart_id` int(11) DEFAULT NULL,
  `event_category_id` int(11) DEFAULT NULL,
  `event_category_name` varchar(255) DEFAULT NULL,
  `event_image` varchar(255) DEFAULT NULL COMMENT 'ảnh đại diện của bài viết',
  `event_image_other` mediumtext COMMENT 'Lưu ảnh của bài viết',
  `event_type` tinyint(5) DEFAULT '1' COMMENT 'Kiểu tin',
  `event_order` int(11) DEFAULT '1' COMMENT 'Thứ tự hiển thị',
  `event_show_cate_id` int(11) DEFAULT '0' COMMENT 'ID của danh mục tin cần hiển thị ở menu',
  `event_common_page` tinyint(2) DEFAULT '0' COMMENT '0: không là tin tức chung, 1: là tin tức chung các page',
  `event_status` tinyint(5) DEFAULT NULL,
  `event_create` int(11) DEFAULT NULL,
  `event_time_start` int(12) DEFAULT '0',
  `event_time_end` int(12) DEFAULT '0',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_event
-- ----------------------------
INSERT INTO `web_event` VALUES ('13', ' Lịch công tác tuần Thời gian 22/12/2016 KẾ HOẠCH Tổ chức Hội thi ', '', '<p>Đang cập nhật...</p>\r\n', '7', null, null, null, null, '1', '1', '0', '0', '1', null, '0', '0');
INSERT INTO `web_event` VALUES ('14', 'Hoạt động ngoại khóa kết hợp với Thanh niên tình nguyện', '', '<p>Đang cập nhật...<br />\r\n&nbsp;</p>\r\n', '7', null, null, null, null, '1', '2', '0', '0', '1', null, '0', '0');
INSERT INTO `web_event` VALUES ('15', 'Hoạt động ngoại khóa kết hợp với Thanh niên tình nguyện', '', '<p>Đang cập nhật...<br />\r\n&nbsp;</p>\r\n', '7', null, '', '', '', '1', '2', '0', '0', '1', null, '0', '0');
INSERT INTO `web_event` VALUES ('16', ' Lịch công tác tuần Thời gian 22/12/2016 KẾ HOẠCH Tổ chức Hội thi ', '', '<p>Đang cập nhật...</p>\r\n', '7', null, '', '', '', '1', '1', '0', '0', '1', null, '0', '0');
INSERT INTO `web_event` VALUES ('17', 'Hoạt động ngoại khóa kết hợp với Thanh niên tình nguyện', '', '<p>Đang cập nhật...<br />\r\n&nbsp;</p>\r\n', '7', null, '', '', '', '1', '2', '0', '0', '1', null, '0', '0');
INSERT INTO `web_event` VALUES ('18', ' Lịch công tác tuần Thời gian 22/12/2016 KẾ HOẠCH Tổ chức Hội thi', '', '<p>Đang cập nhật...</p>\r\n', '7', null, '', '', '', '1', '1', '0', '0', '1', null, '0', '0');

-- ----------------------------
-- Table structure for web_info
-- ----------------------------
DROP TABLE IF EXISTS `web_info`;
CREATE TABLE `web_info` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `info_title` varchar(255) DEFAULT NULL,
  `info_keyword` varchar(255) DEFAULT NULL COMMENT 'keyword',
  `info_intro` longtext,
  `info_content` longtext,
  `info_img` varchar(255) DEFAULT NULL,
  `info_created` varchar(15) DEFAULT NULL,
  `info_order_no` int(11) DEFAULT '0',
  `info_status` tinyint(4) DEFAULT '0' COMMENT 'Item enabled status (1 = enabled, 0 = disabled)',
  `meta_title` text COMMENT 'Meta title',
  `meta_keywords` text COMMENT 'Meta keywords',
  `meta_description` text COMMENT 'Meta description',
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Stores news content.';

-- ----------------------------
-- Records of web_info
-- ----------------------------
INSERT INTO `web_info` VALUES ('1', null, 'Thông tin chân trang', 'SITE_FOOTER_LEFT', '', '<p><strong>TRƯỜNG CAO ĐẲNG SƯ PHẠM TRUNG ƯƠNG</strong></p>\r\n\r\n<p>Địa chỉ: 387 Ho&agrave;ng Quốc Việt - Cầu Giấy - H&agrave; Nội. ĐT: (04) 37565209. Fax: (04) 37914850</p>\r\n\r\n<p>Copyright @2011 Khoa Th&ocirc;ng tin m&aacute;y t&iacute;nh</p>\r\n\r\n<p>Email: admin@cdsptw.edu.vn</p>\r\n\r\n<p>Th&ocirc;ng tin Tuyển sinh: ĐT (04) 37565209 - 37562670</p>\r\n\r\n<p>Email:cdsptw.qldt@gmail.com</p>\r\n', '1481877283-573cb4258e810763aa000001.jpg', '1447794727', '1', '1', '', '', '');
INSERT INTO `web_info` VALUES ('2', null, 'Meta SEO trang liên hệ', 'SITE_SEO_CONTACT', '', '', '1487040720-anhtruong.jpg', '1487040558', '2', '1', 'Liên hệ - Trường Cao Đẳng Sư Phạm Trung Ương - Hà Nội', 'Trường Cao Đẳng Sư Phạm Trung Ương,Trường Cao Đẳng,Cao Đẳng Sư Phạm Trung Ương,Sư Phạm Trung Ương,Cao Đẳng Sư Phạm,Trường Cao Đẳng Sư Phạm', 'Thông tin liên hệ trường Cao Đẳng Sư Phạm Trung Ương - Hà Nội');
INSERT INTO `web_info` VALUES ('3', null, 'Meta SEO trang chủ', 'SITE_SEO_HOME', '', '', '1487040710-anhtruong.jpg', '1487040663', '3', '1', 'Trường Cao Đẳng Sư Phạm Trung Ương - Hà Nội', 'Trường Cao Đẳng Sư Phạm Trung Ương,Trường Cao Đẳng,Cao Đẳng Sư Phạm Trung Ương,Sư Phạm Trung Ương,Cao Đẳng Sư Phạm,Trường Cao Đẳng Sư Phạm', 'Trường Cao Đẳng Sư Phạm Trung Ương - Hà Nội');
INSERT INTO `web_info` VALUES ('4', null, 'Thông tin trang liên hệ', 'SITE_INFO_CONTACT', '', '<p><strong>TRƯỜNG CAO ĐẲNG SƯ PHẠM TRUNG ƯƠNG</strong></p>\r\n\r\n<p>Địa chỉ: 387 Ho&agrave;ng Quốc Việt - Cầu Giấy - H&agrave; Nội. ĐT: (04) 37565209. Fax: (04) 37914850</p>\r\n\r\n<p>Email: admin@cdsptw.edu.vn</p>\r\n\r\n<p>Th&ocirc;ng tin Tuyển sinh: ĐT (04) 37565209 - 37562670</p>\r\n\r\n<p>Email:cdsptw.qldt@gmail.com</p>\r\n', '', '1487042227', '4', '1', '', '', '');
INSERT INTO `web_info` VALUES ('5', null, 'Số danh mục cha hiển thị ở menu ngang', 'SITE_NUM_MENU_HORIZONTAL', '', '<p>6</p>\r\n', '', '1488437897', '5', '1', '', '', '');
INSERT INTO `web_info` VALUES ('6', null, 'Số lịch công tác tuần hiển thị ở trang chủ', 'SITE_NUM_CALENDAR_HOME', '', '<p>5</p>\r\n', '', '1488440966', '6', '1', '', '', '');
INSERT INTO `web_info` VALUES ('7', null, 'Danh mục trang chủ: thông tin hoạt động Đoàn thanh niên', 'SITE_CATID_DOANTHANHNIEN_HOISINHVIEN', '', '301\r\n', '', '1488875066', '7', '1', '', '', '');
INSERT INTO `web_info` VALUES ('8', null, 'Danh mục trang chủ: Tin tuyển sinh-Tin đào tạo- Tin về cựu sinh viên', 'SITE_CATID_TUYENSINH_DAOTAO_CUUSINHVIEN', '- Tin tuyển sinh (mục 1.3.1, 1.3.2. 1.3.3)\r\n- Tin đào tạo (mục 1.4.1, 1.4.4)\r\n- Tin về cựu sinh viên (mục 1.7.1, 1.7.2)', '<p>279,268,298</p>\r\n', '', '1488881362', '8', '1', '', '', '');
INSERT INTO `web_info` VALUES ('9', null, 'Danh mục trang chủ: Hợp tác quốc tế-Hoạt động đoàn thể, công tác sinh viên, trường MNTH, tin khác', 'SITE_CATID_HOPTACQUOCTE_KHAC', '', '<p>296,272</p>\r\n', '', '1488884289', '9', '1', '', '', '');

-- ----------------------------
-- Table structure for web_library_images
-- ----------------------------
DROP TABLE IF EXISTS `web_library_images`;
CREATE TABLE `web_library_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_title` varchar(255) DEFAULT NULL,
  `image_title_alias` varchar(255) DEFAULT NULL,
  `image_desc_sort` text,
  `image_content` longtext,
  `image_image` varchar(255) DEFAULT NULL COMMENT 'ảnh đại diện của bài viết',
  `image_image_other` longtext COMMENT 'Lưu ảnh của bài viết',
  `image_category` int(10) DEFAULT NULL,
  `image_status` tinyint(5) DEFAULT NULL,
  `image_hot` tinyint(5) DEFAULT NULL,
  `image_create` int(11) DEFAULT NULL,
  `type_language` tinyint(5) DEFAULT '1',
  `image_meta_title` text,
  `image_meta_keyword` text,
  `image_meta_description` text,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_library_images
-- ----------------------------
INSERT INTO `web_library_images` VALUES ('1', 'Các thắng cảnh của đất nước Lào', null, null, '<div class=\"library-intro\">\r\n<p>Về ph&iacute;a Trường Cao đẳng Sư phạm Trung ương: Trưởng đo&agrave;n l&agrave; NGƯT. TS Đặng Lộc Thọ - B&iacute; thư Đảng uỷ, Hiệu trưởng Nh&agrave; trường, đi c&ugrave;ng đo&agrave;n c&oacute; l&atilde;nh đạo c&aacute;c khoa X&atilde; hội Nh&acirc;n văn, &Acirc;m Nhạc v&agrave; Mĩ thuật v&agrave; 25 đo&agrave;n vi&ecirc;n l&agrave; c&aacute;n bộ v&agrave; sinh vi&ecirc;n Nh&agrave; trường; Về ph&iacute;a Huyện uỷ, Huyện đo&agrave;n Ho&agrave;ng Su Ph&igrave; c&oacute; Đ/c Ho&agrave;ng Ngọc Đ&iacute;ch - UVBTV Huyện ủy, Trưởng ban Tuy&ecirc;n gi&aacute;o Huyện ủy; Đ/c Triệu Tiến Quang - Huyện ủy vi&ecirc;n, B&iacute; thư Huyện Đo&agrave;n; Đ/c Ho&agrave;ng Xu&acirc;n H&ograve;a - Ph&oacute; B&iacute; thư Huyện đo&agrave;n&nbsp; v&agrave; đại diện c&aacute;c ph&ograve;ng, ban ng&agrave;nh của Huyện uỷ...; Về ph&iacute;a L&atilde;nh đạo Đảng ủy, HĐND, UBND, Đo&agrave;n Thanh ni&ecirc;n x&atilde; c&oacute; Đ/c Gi&agrave;ng Văn L&acirc;m - B&iacute; thư Đảng ủy x&atilde;; Đ/c Trịnh C&ocirc;ng Hiển - Chủ tịch UBND x&atilde;; Đ/c Ly Seo V&agrave;ng - UVBCH Đảng ủy, B&iacute; thư Đo&agrave;n x&atilde; v&agrave; c&aacute;c đồng ch&iacute; Ph&oacute; B&iacute; thư Đảng ủy, Ph&oacute; Chủ tịch UBND, HĐND, BCH Đo&agrave;n x&atilde; v&agrave; c&aacute;c ph&ograve;ng ban x&atilde; Th&egrave;n Chu Ph&igrave;n.</p>\r\n\r\n<p>Trong 3 ng&agrave;y hoạt động, đo&agrave;n đ&atilde; phối hợp thực hiện c&aacute;c nội dung: x&acirc;y dựng c&ocirc;ng tr&igrave;nh &quot;M&aacute;i che cho em&quot; trị gi&aacute; 30 triệu đồng; trang tr&iacute; trong v&agrave; ngo&agrave;i khu&ocirc;n vi&ecirc;n trường Mầm non x&atilde;; tặng qu&agrave; c&aacute;c gia đ&igrave;nh ch&iacute;nh s&aacute;ch v&agrave; học sinh ngh&egrave;o, trị gi&aacute; 3 triệu đồng, tặng qu&agrave; Đảng uỷ, UBND, HĐND v&agrave; CB Gi&aacute;o vi&ecirc;n trường mầm non x&atilde; trị gi&aacute; 5 triệu đồng. Tổ chức chương tr&igrave;nh giao lưu văn nghệ với Huyện đo&agrave;n, UBND, HĐND, Đo&agrave;n x&atilde;, trường MN...v&agrave; b&agrave; con nh&acirc;n d&acirc;n địa phương.</p>\r\n</div>\r\n', '1488862823-1.jpg', 'a:3:{i:0;s:16:\"1488862823-1.jpg\";i:1;s:16:\"1488862830-3.jpg\";i:2;s:16:\"1488862830-2.jpg\";}', null, '1', '1', '1488862823', '1', null, null, null);
INSERT INTO `web_library_images` VALUES ('2', 'Kinh nghiệm du lịch và điểm đến nổi tiếng ở Lào', null, null, '<div class=\"library-intro\">\r\n<p>Về ph&iacute;a Trường Cao đẳng Sư phạm Trung ương: Trưởng đo&agrave;n l&agrave; NGƯT. TS Đặng Lộc Thọ - B&iacute; thư Đảng uỷ, Hiệu trưởng Nh&agrave; trường, đi c&ugrave;ng đo&agrave;n c&oacute; l&atilde;nh đạo c&aacute;c khoa X&atilde; hội Nh&acirc;n văn, &Acirc;m Nhạc v&agrave; Mĩ thuật v&agrave; 25 đo&agrave;n vi&ecirc;n l&agrave; c&aacute;n bộ v&agrave; sinh vi&ecirc;n Nh&agrave; trường; Về ph&iacute;a Huyện uỷ, Huyện đo&agrave;n Ho&agrave;ng Su Ph&igrave; c&oacute; Đ/c Ho&agrave;ng Ngọc Đ&iacute;ch - UVBTV Huyện ủy, Trưởng ban Tuy&ecirc;n gi&aacute;o Huyện ủy; Đ/c Triệu Tiến Quang - Huyện ủy vi&ecirc;n, B&iacute; thư Huyện Đo&agrave;n; Đ/c Ho&agrave;ng Xu&acirc;n H&ograve;a - Ph&oacute; B&iacute; thư Huyện đo&agrave;n&nbsp; v&agrave; đại diện c&aacute;c ph&ograve;ng, ban ng&agrave;nh của Huyện uỷ...; Về ph&iacute;a L&atilde;nh đạo Đảng ủy, HĐND, UBND, Đo&agrave;n Thanh ni&ecirc;n x&atilde; c&oacute; Đ/c Gi&agrave;ng Văn L&acirc;m - B&iacute; thư Đảng ủy x&atilde;; Đ/c Trịnh C&ocirc;ng Hiển - Chủ tịch UBND x&atilde;; Đ/c Ly Seo V&agrave;ng - UVBCH Đảng ủy, B&iacute; thư Đo&agrave;n x&atilde; v&agrave; c&aacute;c đồng ch&iacute; Ph&oacute; B&iacute; thư Đảng ủy, Ph&oacute; Chủ tịch UBND, HĐND, BCH Đo&agrave;n x&atilde; v&agrave; c&aacute;c ph&ograve;ng ban x&atilde; Th&egrave;n Chu Ph&igrave;n.</p>\r\n\r\n<p>Trong 3 ng&agrave;y hoạt động, đo&agrave;n đ&atilde; phối hợp thực hiện c&aacute;c nội dung: x&acirc;y dựng c&ocirc;ng tr&igrave;nh &quot;M&aacute;i che cho em&quot; trị gi&aacute; 30 triệu đồng; trang tr&iacute; trong v&agrave; ngo&agrave;i khu&ocirc;n vi&ecirc;n trường Mầm non x&atilde;; tặng qu&agrave; c&aacute;c gia đ&igrave;nh ch&iacute;nh s&aacute;ch v&agrave; học sinh ngh&egrave;o, trị gi&aacute; 3 triệu đồng, tặng qu&agrave; Đảng uỷ, UBND, HĐND v&agrave; CB Gi&aacute;o vi&ecirc;n trường mầm non x&atilde; trị gi&aacute; 5 triệu đồng. Tổ chức chương tr&igrave;nh giao lưu văn nghệ với Huyện đo&agrave;n, UBND, HĐND, Đo&agrave;n x&atilde;, trường MN...v&agrave; b&agrave; con nh&acirc;n d&acirc;n địa phương.</p>\r\n</div>\r\n', '1488873316-5.jpg', 'a:8:{i:0;s:16:\"1488873316-5.jpg\";i:1;s:16:\"1488873316-4.jpg\";i:2;s:16:\"1488873316-7.jpg\";i:3;s:16:\"1488873316-6.jpg\";i:4;s:16:\"1488873316-8.jpg\";i:5;s:16:\"1488873395-9.jpg\";i:6;s:17:\"1488873395-10.jpg\";i:7;s:17:\"1488873395-11.jpg\";}', null, '1', '2', '1488862955', '1', null, null, null);

-- ----------------------------
-- Table structure for web_news
-- ----------------------------
DROP TABLE IF EXISTS `web_news`;
CREATE TABLE `web_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) DEFAULT NULL,
  `news_desc_sort` text,
  `news_content` text,
  `news_depart_id` int(11) DEFAULT NULL,
  `news_category_id` int(11) DEFAULT NULL,
  `news_category_name` varchar(255) DEFAULT NULL,
  `news_image` varchar(255) DEFAULT NULL COMMENT 'ảnh đại diện của bài viết',
  `news_image_other` mediumtext COMMENT 'Lưu ảnh của bài viết',
  `news_type` tinyint(5) DEFAULT '1' COMMENT 'Kiểu tin',
  `news_order` int(11) DEFAULT '1' COMMENT 'Thứ tự hiển thị',
  `news_show_cate_id` int(11) DEFAULT '0' COMMENT 'ID của danh mục tin cần hiển thị ở menu',
  `news_common_page` tinyint(2) DEFAULT '0' COMMENT '0: không là tin tức chung, 1: là tin tức chung các page',
  `news_status` tinyint(5) DEFAULT NULL,
  `news_create` int(11) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_news
-- ----------------------------
INSERT INTO `web_news` VALUES ('3', 'Giới thiệu chung, lịch sử phát triển của Nhà trường', 'TRƯỜNG CAO ĐẲNG SƯ PHẠM TRUNG ƯƠNG - NHỮNG THẬP KỶ XÂY DỰNG VÀ ĐỔI MỚI\r\nCách đây 22 năm, theo Nghị định 93/HĐBT của Hội đồng Bộ trưởng (nay là Chính phủ) Trường Cao đẳng Sư phạm Nhà trẻ - Mẫu giáo Trung ương I được thành lập với nhiệm vụ là đào tạo, bồi dưỡng Giáo viên, Cán bộ quản lý mẫu giáo với trình độ Cao đẳng và nghiên cứu khoa học giáo dục trước tuổi đến Trường phổ hông. Trường được hình thành trên nền thành tựu đã đạt được của hai Trường Sư phạm Mẫu giáo TW Hà Nam (1964 - 1988) và Trường Trung cấp nuôi dạy trẻ TW (1972 - 1988). Hai trường này đã hoàn thành tốt nhiệm vụ chính trị của mình, đào tạo hàng nghìn giáo viên Nhà trẻ, Mẫu giáo, đóng góp to lớn cho việc xây dựng, phát triển đội ngũ cán bộ, giáo viên bậc Mầm non nước nhà.                                                                                                                                                                         Hai mươi năm qua là một chặng đường quan trọng trong lịch sử phát triển của một Trường Cao đẳng sư phạm - chặng đường đổi mới, phát triển liên tục và luôn giữ vững vai trò là một Trường trọng điểm số một trong khối các Trường Sư phạm Mầm non của cả nước.', '<p style=\"text-align:center\"><img alt=\"null\" src=\"http://project.vn/KHAC/cdsptw.edu.vn/uploads/thumbs/news/3/600x600/1487066904-anhtruong.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">TRƯỜNG CAO ĐẲNG SƯ PHẠM TRUNG ƯƠNG NHỮNG THẬP KỶ X&Acirc;Y DỰNG V&Agrave; ĐỔI MỚI</p>\r\n\r\n<p>C&aacute;ch đ&acirc;y 28 năm, theo Nghị định 93/HĐBT của Hội đồng Bộ trưởng (nay l&agrave; Ch&iacute;nh phủ) Trường Cao đẳng Sư phạm Nh&agrave; trẻ - Mẫu gi&aacute;o Trung ương I được th&agrave;nh lập với nhiệm vụ l&agrave; đ&agrave;o tạo, bồi dưỡng Gi&aacute;o vi&ecirc;n, C&aacute;n bộ quản l&yacute; mẫu gi&aacute;o với tr&igrave;nh độ Cao đẳng v&agrave; nghi&ecirc;n cứu khoa học gi&aacute;o dục trước tuổi đến Trường phổ h&ocirc;ng. Trường được h&igrave;nh th&agrave;nh tr&ecirc;n nền th&agrave;nh tựu đ&atilde; đạt được của hai Trường Sư phạm Mẫu gi&aacute;o TW H&agrave; Nam (1964 - 1988) v&agrave; Trường Trung cấp nu&ocirc;i dạy trẻ TW (1972 - 1988). Hai trường n&agrave;y đ&atilde; ho&agrave;n th&agrave;nh tốt nhiệm vụ ch&iacute;nh trị của m&igrave;nh, đ&agrave;o tạo h&agrave;ng ngh&igrave;n gi&aacute;o vi&ecirc;n Nh&agrave; trẻ, Mẫu gi&aacute;o, đ&oacute;ng g&oacute;p to lớn cho việc x&acirc;y dựng, ph&aacute;t triển đội ngũ c&aacute;n bộ, gi&aacute;o vi&ecirc;n bậc Mầm non nước nh&agrave;.</p>\r\n\r\n<p>Hai mươi năm qua l&agrave; một chặng đường quan trọng trong lịch sử ph&aacute;t triển của một Trường Cao đẳng sư phạm - chặng đường đổi mới, ph&aacute;t triển li&ecirc;n tục v&agrave; lu&ocirc;n giữ vững vai tr&ograve; l&agrave; một Trường trọng điểm số một trong khối c&aacute;c Trường Sư phạm Mầm non của cả nước. &nbsp;</p>\r\n\r\n<p>C&ocirc;ng t&aacute;c đ&agrave;o tạo lu&ocirc;n được Nh&agrave; trường x&aacute;c định l&agrave; nhiệm vụ trọng t&acirc;m v&agrave; mọi hoạt động trong c&ocirc;ng t&aacute;c đ&agrave;o tạo lu&ocirc;n được thực hiện nghi&ecirc;m t&uacute;c, đ&uacute;ng quy chế. Từ 2003 trở về trước, Nh&agrave; trường mới chuy&ecirc;n đ&agrave;o tạo Gi&aacute;o vi&ecirc;n Mầm non, với quy m&ocirc; ng&agrave;y c&agrave;ng lớn v&agrave; lu&ocirc;n c&oacute; những đổi mới về mục ti&ecirc;u, nội dung, phương ph&aacute;p gi&aacute;o dục, thực h&agrave;nh, thực tập. Do vậy, chất lượng đ&agrave;o tạo của Nh&agrave; trường ng&agrave;y c&agrave;ng được n&acirc;ng cao v&agrave; sinh vi&ecirc;n tốt nghiệp ra trường c&oacute; tay nghề vững v&agrave;ng đ&aacute;p ứng y&ecirc;u cầu của Ng&agrave;nh v&agrave; được x&atilde; hội chấp nhận, đ&aacute;nh gi&aacute; cao. Tỷ lệ sinh vi&ecirc;n tốt nghiệp c&oacute; việc l&agrave;m đ&uacute;ng ng&agrave;nh đ&agrave;o tạo kh&ocirc;ng ngừng tăng l&ecirc;n.</p>\r\n\r\n<p>Từ năm học 2003 - 2004, xuất ph&aacute;t từ nhu cầu của x&atilde; hội v&agrave; tiềm lực của Nh&agrave; trường, được sự đồng &yacute; của Bộ Gi&aacute;o dục v&agrave; Đ&agrave;o tạo, Nh&agrave; trường đ&atilde; dần chuyển th&agrave;nh Trường đ&agrave;o tạo đa ng&agrave;nh bằng việc mở th&ecirc;m nhiều ng&agrave;nh đ&agrave;o tạo mới như Sư phạm &acirc;m nhạc, Gi&aacute;o dục Đặc biệt, Sư phạm Mỹ thuật, Gi&aacute;o dục c&ocirc;ng d&acirc;n, Sư phạm C&ocirc;ng nghệ, Th&ocirc;ng tin - Thư viện, Tin học, C&ocirc;ng t&aacute;c x&atilde; hội, Văn thư lưu trữ, Quản trị văn ph&ograve;ng, Thư k&yacute; văn ph&ograve;ng.... V&agrave; đến nay Nh&agrave; trường đ&atilde; c&oacute; 17 ng&agrave;nh đ&agrave;o tạo cả tr&igrave;nh độ Cao đẳng v&agrave; Trung cấp chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>Để phản &aacute;nh đ&uacute;ng nhiệm vụ ch&iacute;nh trị của Trường, cuối năm 2005 Nh&agrave; trường đ&atilde; x&acirc;y dựng Đề &aacute;n đổi t&ecirc;n Trường v&agrave; ng&agrave;y 26/01/2006 Bộ Gi&aacute;o dục v&agrave; Đ&agrave;o tạo đ&atilde; ra Quyết định số 509/QĐ-BGD&amp;ĐT đổi t&ecirc;n Trường th&agrave;nh Trường Cao đẳng Sư phạm Trung ương. Trường Cao đẳng Sư phạm Trung ương c&oacute; nhiệm vụ:</p>\r\n\r\n<p>- Đ&agrave;o tạo v&agrave; bồi dưỡng gi&aacute;o vi&ecirc;n c&oacute; tr&igrave;nh độ cao đẳng cho Gi&aacute;o dục Mầm non v&agrave; c&aacute;c Trường chuy&ecirc;n biệt.</p>\r\n\r\n<p>- Đ&agrave;o tạo v&agrave; bồi dưỡng c&aacute;n bộ c&oacute; tr&igrave;nh độ cao đẳng v&agrave; c&aacute;c tr&igrave;nh độ thấp hơn một số chuy&ecirc;n ng&agrave;nh kh&aacute;c: Nghệ thuật, Nh&acirc;n văn, Th&ocirc;ng tin - Thư viện, Dịch vụ x&atilde; hội, Quản l&yacute; gi&aacute;o dục.</p>\r\n\r\n<p>- Nghi&ecirc;n cứu khoa học phục vụ y&ecirc;u cầu ph&aacute;t triển kinh tế - x&atilde; hội.</p>\r\n\r\n<p>Những năm gần đ&acirc;y, do c&aacute;c m&atilde; ng&agrave;nh đ&agrave;o tạo tăng l&ecirc;n c&ugrave;ng với uy t&iacute;n của Nh&agrave; trường n&ecirc;n lượng th&iacute; sinh đăng k&yacute; thi v&agrave;o Trường ng&agrave;y c&agrave;ng đ&ocirc;ng v&agrave; quy m&ocirc; đ&agrave;o tạo của Trường ng&agrave;y c&agrave;ng mở rộng. H&agrave;ng năm, Nh&agrave; trường tuyển sinh gần 5000 th&iacute; sinh cho c&aacute;c hệ Cao đẳng v&agrave; Trung cấp chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>Việc x&acirc;y dựng chương tr&igrave;nh đ&agrave;o tạo cũng lu&ocirc;n được ch&uacute; trọng v&agrave; chỉ đạo triển khai c&oacute; hiệu quả. Đến nay, chương tr&igrave;nh khung v&agrave; chương tr&igrave;nh chi tiết của c&aacute;c ng&agrave;nh đ&agrave;o tạo đều đ&atilde; được ho&agrave;n th&agrave;nh, trong đ&oacute; c&oacute; chương tr&igrave;nh đ&agrave;o tạo ng&agrave;nh Gi&aacute;o dục Mầm non v&agrave; Gi&aacute;o dục Đặc biệt tr&igrave;nh độ Cao đẳng đ&atilde; được Bộ trưởng ph&ecirc; chuẩn d&ugrave;ng cho c&aacute;c trường đ&agrave;o tạo Gi&aacute;o vi&ecirc;n Mầm non trong cả nước.</p>\r\n\r\n<p>Để n&acirc;ng cao chất lượng đ&agrave;o tạo, Nh&agrave; trường lu&ocirc;n quan t&acirc;m, chỉ đạo việc bi&ecirc;n soạn v&agrave; dịch t&agrave;i liệu, gi&aacute;o tr&igrave;nh phục vụ cho c&ocirc;ng t&aacute;c giảng dạy v&agrave; học tập.</p>\r\n\r\n<p>Ngo&agrave;i việc thực hiện tốt c&ocirc;ng t&aacute;c đ&agrave;o tạo hệ Cao đẳng v&agrave; Trung cấp chuy&ecirc;n nghiệp tại Trường v&agrave; tại c&aacute;c cơ sở li&ecirc;n kết, những năm qua Nh&agrave; trường đ&atilde; v&agrave; đang hợp t&aacute;c với một số Trường Đại học để mở c&aacute;c lớp đ&agrave;o tạo li&ecirc;n th&ocirc;ng l&ecirc;n đại học cho c&aacute;c ng&agrave;nh Gi&aacute;o dục Mầm non, Quản l&yacute; gi&aacute;o dục, Gi&aacute;o dục c&ocirc;ng d&acirc;n, Sư phạm &acirc;m nhạc, Sư phạm Mỹ thuật v.v...</p>\r\n\r\n<p>B&ecirc;n cạnh việc mở rộng quy m&ocirc; đ&agrave;o tạo, đổi mới nội dung v&agrave; phương ph&aacute;p giảng dạy, Trường Cao đẳng Sư phạm Trung ương c&ograve;n đẩy mạnh c&ocirc;ng t&aacute;c Nghi&ecirc;n cứu khoa học v&agrave; Hợp t&aacute;c Quốc tế, xem đ&acirc;y l&agrave; những k&ecirc;nh quan trọng n&acirc;ng cao chất lượng đ&agrave;o tạo v&agrave; uy t&iacute;n của Nh&agrave; trường.</p>\r\n\r\n<p>Hoạt động nghi&ecirc;n cứu khoa học trong Nh&agrave; trường ng&agrave;y c&agrave;ng được tăng cường. Trong những năm qua, c&aacute;n bộ của Nh&agrave; trường đ&atilde; chủ tr&igrave; thực hiện 65 đề t&agrave;i, dự &aacute;n nghi&ecirc;n cứu khoa học cấp Bộ v&agrave; h&agrave;ng trăm đề t&agrave;i nghi&ecirc;n cứu cấp Trường. Trong đ&oacute; c&oacute; 01 đề t&agrave;i nghi&ecirc;n cứu khoa học cấp Nh&agrave; nước, 04 đề t&agrave;i nghi&ecirc;n cứu khoa học trọng điểm cấp Bộ, 06 đề t&agrave;i nghi&ecirc;n cứu khoa học về gi&aacute;o dục bảo vệ m&ocirc;i trường trong lĩnh vực Gi&aacute;o dục Mầm non. Hầu hết c&aacute;c đề t&agrave;i nghi&ecirc;n cứu khoa học nghiệm thu đều được đ&aacute;nh gi&aacute; loại tốt v&agrave; kết quả nghi&ecirc;n cứu đ&atilde; được triển khai, ứng dụng trong c&ocirc;ng t&aacute;c đ&agrave;o tạo, trong việc chăm s&oacute;c v&agrave; gi&aacute;o dục trẻ. C&ocirc;ng t&aacute;c nghi&ecirc;n cứu khoa học của sinh vi&ecirc;n cũng được quan t&acirc;m, ph&aacute;t triển v&agrave; đ&oacute;ng g&oacute;p to lớn v&agrave;o việc n&acirc;ng cao chất lượng đ&agrave;o tạo.</p>\r\n\r\n<p>Hoạt động hợp t&aacute;c quốc tế ng&agrave;y c&agrave;ng được mở rộng v&agrave; ng&agrave;y c&agrave;ng ph&aacute;t huy hiệu quả. Th&ocirc;ng qua c&aacute;c hoạt động hợp t&aacute;c với c&aacute;c tổ chức, đơn vị trong v&agrave; ngo&agrave;i nước, Nh&agrave; trường đ&atilde; tổ chức được nhiều Hội nghị, Hội thảo khoa học mang t&iacute;nh chất quốc gia. Bốn năm qua kể từ 2004, Nh&agrave; trường tổ chức c&aacute;c lớp bồi dưỡng chuy&ecirc;n m&ocirc;n cho đội ngũ giảng vi&ecirc;n c&aacute;c trường sư phạm c&oacute; đ&agrave;o tạo Gi&aacute;o vi&ecirc;n Mầm non v&agrave; đội ngũ Gi&aacute;o vi&ecirc;n c&aacute;c trường Mầm non, c&aacute;n bộ quản l&yacute; gi&aacute;o dục Mầm non của tr&ecirc;n 50 tỉnh th&agrave;nh với sự tham gia giảng dạy của nhiều chuy&ecirc;n gia nước ngo&agrave;i. C&aacute;c Hội thảo khoa học v&agrave; c&aacute;c lớp bồi dưỡng đều được Bộ v&agrave; c&aacute;c đơn vị cơ sở đ&aacute;nh gi&aacute; cao.</p>\r\n\r\n<p>Đồng thời, Nh&agrave; trường đ&atilde; mở rộng quan hệ với nhiều nước như Singapore, Đan Mạch, H&agrave;n Quốc, Hoa Kỳ, H&agrave; Lan, L&agrave;o..., nhiều tổ chức quốc tế như VSO (Anh), SIF (Singapore), Uỷ ban II H&agrave; Lan, Plan International, Nipon Foundation,... Đồng thời thường xuy&ecirc;n c&oacute; sự trao đổi, giao lưu, học tập lẫn nhau v&agrave; mời chuy&ecirc;n gia giảng dạy cho sinh vi&ecirc;n một số ng&agrave;nh như Gi&aacute;o dục Mầm non, Gi&aacute;o dục Đặc biệt...</p>\r\n\r\n<p>Tr&ecirc;n cơ sở nhận thức đ&uacute;ng đắn về tầm quan trọng của chiến l&shy;ược c&aacute;n bộ, trong nhiều năm qua Đảng uỷ, Ban gi&aacute;m hiệu Nh&agrave; tr&shy;ường đ&atilde; qu&aacute;n triệt s&acirc;u sắc v&agrave; thực hiện tốt từ c&ocirc;ng t&aacute;c tuyển dụng, đến c&ocirc;ng t&aacute;c đ&agrave;o tạo, bồi dư&shy;ỡng c&aacute;n bộ về mọi mặt. Do đ&oacute; đội ngũ c&aacute;n bộ của Nh&agrave; tr&shy;ường đặc biệt l&agrave; c&aacute;n bộ giảng dạy ng&agrave;y c&agrave;ng lớn mạnh cả về số lư&shy;ợng v&agrave; chất lượng. Đến nay, tổng số c&aacute;n bộ của Tr&shy;ường l&agrave; 574 (Kể cả ba Trư&shy;ờng Mầm non thực h&agrave;nh), trong đ&oacute; c&oacute; : TS: 13; Ths: 188; Giảng vi&ecirc;n ch&iacute;nh: 24; Giảng vi&ecirc;n c&oacute; tr&igrave;nh độ đại học: 42/206; NCS: 18; Cao học: 20.</p>\r\n\r\n<p>Ng&agrave;nh nghề được mở rộng, th&iacute;ch ứng với nhu cầu của x&atilde; hội, kh&ocirc;ng ngừng đổi mới đ&agrave;o tạo, với đội ngũ c&aacute;n bộ ng&agrave;y c&agrave;ng vững mạnh về chuy&ecirc;n m&ocirc;n nghiệp vụ, đẩy mạnh nghi&ecirc;n cứu khoa học v&agrave; hợp t&aacute;c Quốc tế để ho&agrave;n thiện chất lượng, Trường Cao đẳng Sư phạm Trung ương đ&atilde; tạo được sức hấp dẫn với người học v&agrave; trở th&agrave;nh địa chỉ đ&aacute;ng tin cậy c&oacute; nhiều đ&oacute;ng g&oacute;p to lớn trong việc đ&agrave;o tạo đội ngũ c&aacute;n bộ, gi&aacute;o vi&ecirc;n, đặc biệt l&agrave; Gi&aacute;o vi&ecirc;n Mầm non. Trường Cao đẳng Sư phạm Trung ương đ&atilde; vinh dự được đ&oacute;n nhận Hu&acirc;n chương Lao động hạng Nhất do Nh&agrave; nước trao tặng.</p>\r\n', '7', '266', 'Giới thiệu', '1487066904-anhtruong.jpg', 'a:2:{i:0;s:24:\"1487066904-anhtruong.jpg\";i:1;s:24:\"1487067496-chuyen-de.gif\";}', '0', '1', '266', '0', '1', '1487066904');
INSERT INTO `web_news` VALUES ('13', 'Lộ diện 10 gương mặt trong đội hình chính thức của Game show Vua bán hàng', 'Vượt qua các đối thủ “nặng ký” trong vòng bình chọn quyết liệt của Game show “Vua bán hàng”, 18 sinh viên xuất sắc của NTU chính thức bước vào vòng casting ghi hình để lựa chọn 10 thành viên có mặt trong đội chơi.', '<p>Để trở th&agrave;nh th&agrave;nh vi&ecirc;n ch&iacute;nh thức của chương tr&igrave;nh &ldquo;Vua b&aacute;n h&agrave;ng&rdquo; (Game Show truyền h&igrave;nh lần đầu ti&ecirc;n xuất hiện tại Việt Nam), đ&ograve;i hỏi c&aacute;c bạn sinh vi&ecirc;n phải c&oacute; tr&iacute; tuệ, đam m&ecirc;, y&ecirc;u th&iacute;ch kinh doanh v&agrave; kh&aacute;t vọng khởi nghiệp ngay từ khi c&ograve;n ngồi tr&ecirc;n ghế Nh&agrave; trường.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"http://daihocnguyentrai.edu.vn/lo-dien-10-guong-mat-trong-doi-hinh-chinh-thuc-cua-game-show-vua-ban-hang/16805248_1877734399169712_625645136_o/\" rel=\"attachment wp-att-7384\"><img alt=\"16805248_1877734399169712_625645136_o\" height=\"600\" src=\"http://daihocnguyentrai.edu.vn/wp-content/uploads/2017/02/16805248_1877734399169712_625645136_o.jpg\" width=\"800\" /></a></p>\r\n\r\n<p style=\"text-align:center\"><em>Trước giờ casting</em></p>\r\n\r\n<p>Buổi casting ghi h&igrave;nh cũng l&agrave; dịp để Ban tổ chức lựa chọn ra những c&aacute; nh&acirc;n xuất sắc nhất sẽ tham gia v&agrave;o c&aacute;c đội chơi ch&iacute;nh thức. C&aacute;c đội v&agrave;o v&ograve;ng chơi ch&iacute;nh thức sẽ được c&aacute;c chuy&ecirc;n gia h&agrave;ng đầu Việt Nam cũng l&agrave; CEO c&aacute;c Doanh nghiệp danh tiếng h&agrave;ng đầu Việt Nam đ&agrave;o tạo c&aacute;c kiến thức, kỹ năng thực tế, đồng thời được c&aacute;c Doanh nghiệp đồng h&agrave;nh tương t&aacute;c c&aacute;c t&igrave;nh huống thực tế tại thị trường.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"http://daihocnguyentrai.edu.vn/lo-dien-10-guong-mat-trong-doi-hinh-chinh-thuc-cua-game-show-vua-ban-hang/16763903_1877734132503072_1969292911_o/\" rel=\"attachment wp-att-7385\"><img alt=\"16763903_1877734132503072_1969292911_o\" height=\"600\" src=\"http://daihocnguyentrai.edu.vn/wp-content/uploads/2017/02/16763903_1877734132503072_1969292911_o.jpg\" width=\"800\" /></a></p>\r\n\r\n<p>Tham gia buổi tuyển chọn casting ghi h&igrave;nh, NTU g&oacute;p mặt 18 sinh vi&ecirc;n đ&atilde; vượt qua v&ograve;ng b&igrave;nh chọn trước đ&oacute;. Đ&acirc;y đều l&agrave; những gương mặt xuất sắc cả trong học tập lẫn kinh doanh thực tế. Đ&aacute;ng ch&uacute; &yacute; l&agrave; những c&aacute;i t&ecirc;n nằm trong top 10 b&igrave;nh chọn như: Đinh An Khang, Phạm Thu Phương, Vũ Minh Quyết, Nguyễn Vũ Đức Hiếu&hellip;</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"http://daihocnguyentrai.edu.vn/lo-dien-10-guong-mat-trong-doi-hinh-chinh-thuc-cua-game-show-vua-ban-hang/16809306_1877734745836344_1411270493_n/\" rel=\"attachment wp-att-7386\"><img alt=\"16809306_1877734745836344_1411270493_n\" height=\"800\" src=\"http://daihocnguyentrai.edu.vn/wp-content/uploads/2017/02/16809306_1877734745836344_1411270493_n.jpg\" width=\"600\" /></a></p>\r\n\r\n<p>Trong buổi casting, 18 sinh vi&ecirc;n NTU đ&atilde; c&oacute; những thể hiện rất tốt, c&ugrave;ng tinh thần sẵn s&agrave;ng, h&agrave;o hứng tham gia cuộc thi. Tuy nhi&ecirc;n, do số lượng mỗi đội chơi hạn chế n&ecirc;n Ban tổ chức đ&atilde; t&igrave;m ra&nbsp;&nbsp; 10 gương mặt xuất sắc dựa v&agrave;o c&aacute;c ti&ecirc;u ch&iacute; như: ngoại h&igrave;nh, &nbsp;giọng n&oacute;i, biểu cảm, sự ứng biến nhanh nhạy với c&aacute;c c&acirc;u hỏi về kiến thức, hiểu biết x&atilde; hội v&agrave; truyền th&ocirc;ng của c&aacute;c chuy&ecirc;n gia.</p>\r\n', '7', '296', 'Nghiên cứu khoa học và hợp tác quốc tế', '1488875467-12.jpg', 'a:1:{i:0;s:17:\"1488875467-12.jpg\";}', '2', '1', '296', '1', '1', '1488875467');
INSERT INTO `web_news` VALUES ('14', 'Vượt qua các đối thủ nặng ký trong vòng bình chọn quyết liệt của Game show “Vua bán hàng', '', '<p>Đang cập nhật...<br />\r\n&nbsp;</p>\r\n', '7', '279', 'Tin tuyển sinh', '1488886282-5.jpg', 'a:2:{i:0;s:17:\"1488875648-11.jpg\";i:1;s:16:\"1488886282-5.jpg\";}', '2', '2', '279', '1', '1', '1488875648');
INSERT INTO `web_news` VALUES ('15', 'NTU là 1 trong 6 trường có tỷ lệ sinh viên tham gia “Vua bán hàng” đông nhất', '', '<p>Đang cập nhật...<br />\r\n&nbsp;</p>\r\n', '7', '301', 'Hoạt động sinh viên', '1488875692-9.jpg', 'a:1:{i:0;s:16:\"1488875692-9.jpg\";}', '2', '3', '301', '0', '1', '1488875692');
INSERT INTO `web_news` VALUES ('16', 'Chọn Đại học hàn lâm lý thuyết hay Đại học ứng dụng?', 'Trong khi đám bạn tôi đang quay cuồng với các môn tư tưởng, triết, mác – lê… trời ơi đất hỡi, thì chúng mình – những sinh viên năm nhất của “Nờ tờ u” đã được thỏa sức sáng tạo với các môn chuyên ngành.', '<p>M&igrave;nh c&oacute; thằng bạn đang học tại một trường Đại học hệ C&ocirc;ng lập c&oacute; tiếng ở H&agrave; Nội. Được c&aacute;i 2 đứa hay n&oacute;i chuyện, chia sẻ với nhau. V&agrave; c&acirc;u mở đầu mỗi cuộc tr&ograve; chuyện n&oacute; lu&ocirc;n than v&atilde;n với m&igrave;nh, đại kh&aacute;i l&agrave; trường m&agrave;y học sướng v&atilde;i, b&acirc;y giờ trường tao mới đang học mấy m&ocirc;n triết, m&aacute;c&hellip; ch&aacute;n kinh&hellip; N&oacute; kể, s&aacute;ng cắp s&aacute;ch đến trường, tối cắp s&aacute;ch về, ng&agrave;y n&agrave;o cũng học l&yacute; thuyết m&agrave; to&agrave;n l&agrave; những thứ trời ơi đất hỡi tư tưởng g&igrave; ấy.</p>\r\n', '7', '301', 'Hoạt động sinh viên', '1488875727-11.jpg', 'a:1:{i:0;s:17:\"1488875727-11.jpg\";}', '2', '4', '301', '0', '1', '1488875727');
INSERT INTO `web_news` VALUES ('17', 'Sứ mạng và Định hướng phát triển ', 'TRƯỜNG CAO ĐẲNG SƯ PHẠM TRUNG ƯƠNG - NHỮNG THẬP KỶ XÂY DỰNG VÀ ĐỔI MỚI Cách đây 22 năm, theo Nghị định 93/HĐBT của Hội đồng Bộ trưởng (nay là Chính phủ) Trường Cao đẳng Sư phạm Nhà trẻ - Mẫu giáo Trung ương I được thành lập với nhiệm vụ là đào tạo, bồi dưỡng Giáo viên, Cán bộ quản lý mẫu giáo với trình độ Cao đẳng và nghiên cứu khoa học giáo dục trước tuổi đến Trường phổ hông. Trường được hình thành trên nền thành tựu đã đạt được của hai Trường Sư phạm Mẫu giáo TW Hà Nam (1964 - 1988) và Trường Trung cấp nuôi dạy trẻ TW (1972 - 1988). Hai trường này đã hoàn thành tốt nhiệm vụ chính trị của mình, đào tạo hàng nghìn giáo viên Nhà trẻ, Mẫu giáo, đóng góp to lớn cho việc xây dựng, phát triển đội ngũ cán bộ, giáo viên bậc Mầm non nước nhà. Hai mươi năm qua là một chặng đường quan trọng trong lịch sử phát triển của một Trường Cao đẳng sư phạm - chặng đường đổi mới, phát triển liên tục và luôn giữ vững vai trò là một Trường trọng điểm số một trong khối các Trường Sư phạm Mầm non của cả nước.', '<div class=\"library-intro\">\r\n<p style=\"text-align:center\"><img alt=\"null\" src=\"http://project.vn/KHAC/cdsptw.edu.vn/uploads/thumbs/news/3/600x600/1487066904-anhtruong.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">TRƯỜNG CAO ĐẲNG SƯ PHẠM TRUNG ƯƠNG NHỮNG THẬP KỶ X&Acirc;Y DỰNG V&Agrave; ĐỔI MỚI</p>\r\n\r\n<p>C&aacute;ch đ&acirc;y 28 năm, theo Nghị định 93/HĐBT của Hội đồng Bộ trưởng (nay l&agrave; Ch&iacute;nh phủ) Trường Cao đẳng Sư phạm Nh&agrave; trẻ - Mẫu gi&aacute;o Trung ương I được th&agrave;nh lập với nhiệm vụ l&agrave; đ&agrave;o tạo, bồi dưỡng Gi&aacute;o vi&ecirc;n, C&aacute;n bộ quản l&yacute; mẫu gi&aacute;o với tr&igrave;nh độ Cao đẳng v&agrave; nghi&ecirc;n cứu khoa học gi&aacute;o dục trước tuổi đến Trường phổ h&ocirc;ng. Trường được h&igrave;nh th&agrave;nh tr&ecirc;n nền th&agrave;nh tựu đ&atilde; đạt được của hai Trường Sư phạm Mẫu gi&aacute;o TW H&agrave; Nam (1964 - 1988) v&agrave; Trường Trung cấp nu&ocirc;i dạy trẻ TW (1972 - 1988). Hai trường n&agrave;y đ&atilde; ho&agrave;n th&agrave;nh tốt nhiệm vụ ch&iacute;nh trị của m&igrave;nh, đ&agrave;o tạo h&agrave;ng ngh&igrave;n gi&aacute;o vi&ecirc;n Nh&agrave; trẻ, Mẫu gi&aacute;o, đ&oacute;ng g&oacute;p to lớn cho việc x&acirc;y dựng, ph&aacute;t triển đội ngũ c&aacute;n bộ, gi&aacute;o vi&ecirc;n bậc Mầm non nước nh&agrave;.</p>\r\n\r\n<p>Hai mươi năm qua l&agrave; một chặng đường quan trọng trong lịch sử ph&aacute;t triển của một Trường Cao đẳng sư phạm - chặng đường đổi mới, ph&aacute;t triển li&ecirc;n tục v&agrave; lu&ocirc;n giữ vững vai tr&ograve; l&agrave; một Trường trọng điểm số một trong khối c&aacute;c Trường Sư phạm Mầm non của cả nước. &nbsp;</p>\r\n\r\n<p>C&ocirc;ng t&aacute;c đ&agrave;o tạo lu&ocirc;n được Nh&agrave; trường x&aacute;c định l&agrave; nhiệm vụ trọng t&acirc;m v&agrave; mọi hoạt động trong c&ocirc;ng t&aacute;c đ&agrave;o tạo lu&ocirc;n được thực hiện nghi&ecirc;m t&uacute;c, đ&uacute;ng quy chế. Từ 2003 trở về trước, Nh&agrave; trường mới chuy&ecirc;n đ&agrave;o tạo Gi&aacute;o vi&ecirc;n Mầm non, với quy m&ocirc; ng&agrave;y c&agrave;ng lớn v&agrave; lu&ocirc;n c&oacute; những đổi mới về mục ti&ecirc;u, nội dung, phương ph&aacute;p gi&aacute;o dục, thực h&agrave;nh, thực tập. Do vậy, chất lượng đ&agrave;o tạo của Nh&agrave; trường ng&agrave;y c&agrave;ng được n&acirc;ng cao v&agrave; sinh vi&ecirc;n tốt nghiệp ra trường c&oacute; tay nghề vững v&agrave;ng đ&aacute;p ứng y&ecirc;u cầu của Ng&agrave;nh v&agrave; được x&atilde; hội chấp nhận, đ&aacute;nh gi&aacute; cao. Tỷ lệ sinh vi&ecirc;n tốt nghiệp c&oacute; việc l&agrave;m đ&uacute;ng ng&agrave;nh đ&agrave;o tạo kh&ocirc;ng ngừng tăng l&ecirc;n.</p>\r\n\r\n<p>Từ năm học 2003 - 2004, xuất ph&aacute;t từ nhu cầu của x&atilde; hội v&agrave; tiềm lực của Nh&agrave; trường, được sự đồng &yacute; của Bộ Gi&aacute;o dục v&agrave; Đ&agrave;o tạo, Nh&agrave; trường đ&atilde; dần chuyển th&agrave;nh Trường đ&agrave;o tạo đa ng&agrave;nh bằng việc mở th&ecirc;m nhiều ng&agrave;nh đ&agrave;o tạo mới như Sư phạm &acirc;m nhạc, Gi&aacute;o dục Đặc biệt, Sư phạm Mỹ thuật, Gi&aacute;o dục c&ocirc;ng d&acirc;n, Sư phạm C&ocirc;ng nghệ, Th&ocirc;ng tin - Thư viện, Tin học, C&ocirc;ng t&aacute;c x&atilde; hội, Văn thư lưu trữ, Quản trị văn ph&ograve;ng, Thư k&yacute; văn ph&ograve;ng.... V&agrave; đến nay Nh&agrave; trường đ&atilde; c&oacute; 17 ng&agrave;nh đ&agrave;o tạo cả tr&igrave;nh độ Cao đẳng v&agrave; Trung cấp chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>Để phản &aacute;nh đ&uacute;ng nhiệm vụ ch&iacute;nh trị của Trường, cuối năm 2005 Nh&agrave; trường đ&atilde; x&acirc;y dựng Đề &aacute;n đổi t&ecirc;n Trường v&agrave; ng&agrave;y 26/01/2006 Bộ Gi&aacute;o dục v&agrave; Đ&agrave;o tạo đ&atilde; ra Quyết định số 509/QĐ-BGD&amp;ĐT đổi t&ecirc;n Trường th&agrave;nh Trường Cao đẳng Sư phạm Trung ương. Trường Cao đẳng Sư phạm Trung ương c&oacute; nhiệm vụ:</p>\r\n\r\n<p>- Đ&agrave;o tạo v&agrave; bồi dưỡng gi&aacute;o vi&ecirc;n c&oacute; tr&igrave;nh độ cao đẳng cho Gi&aacute;o dục Mầm non v&agrave; c&aacute;c Trường chuy&ecirc;n biệt.</p>\r\n\r\n<p>- Đ&agrave;o tạo v&agrave; bồi dưỡng c&aacute;n bộ c&oacute; tr&igrave;nh độ cao đẳng v&agrave; c&aacute;c tr&igrave;nh độ thấp hơn một số chuy&ecirc;n ng&agrave;nh kh&aacute;c: Nghệ thuật, Nh&acirc;n văn, Th&ocirc;ng tin - Thư viện, Dịch vụ x&atilde; hội, Quản l&yacute; gi&aacute;o dục.</p>\r\n\r\n<p>- Nghi&ecirc;n cứu khoa học phục vụ y&ecirc;u cầu ph&aacute;t triển kinh tế - x&atilde; hội.</p>\r\n\r\n<p>Những năm gần đ&acirc;y, do c&aacute;c m&atilde; ng&agrave;nh đ&agrave;o tạo tăng l&ecirc;n c&ugrave;ng với uy t&iacute;n của Nh&agrave; trường n&ecirc;n lượng th&iacute; sinh đăng k&yacute; thi v&agrave;o Trường ng&agrave;y c&agrave;ng đ&ocirc;ng v&agrave; quy m&ocirc; đ&agrave;o tạo của Trường ng&agrave;y c&agrave;ng mở rộng. H&agrave;ng năm, Nh&agrave; trường tuyển sinh gần 5000 th&iacute; sinh cho c&aacute;c hệ Cao đẳng v&agrave; Trung cấp chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>Việc x&acirc;y dựng chương tr&igrave;nh đ&agrave;o tạo cũng lu&ocirc;n được ch&uacute; trọng v&agrave; chỉ đạo triển khai c&oacute; hiệu quả. Đến nay, chương tr&igrave;nh khung v&agrave; chương tr&igrave;nh chi tiết của c&aacute;c ng&agrave;nh đ&agrave;o tạo đều đ&atilde; được ho&agrave;n th&agrave;nh, trong đ&oacute; c&oacute; chương tr&igrave;nh đ&agrave;o tạo ng&agrave;nh Gi&aacute;o dục Mầm non v&agrave; Gi&aacute;o dục Đặc biệt tr&igrave;nh độ Cao đẳng đ&atilde; được Bộ trưởng ph&ecirc; chuẩn d&ugrave;ng cho c&aacute;c trường đ&agrave;o tạo Gi&aacute;o vi&ecirc;n Mầm non trong cả nước.</p>\r\n\r\n<p>Để n&acirc;ng cao chất lượng đ&agrave;o tạo, Nh&agrave; trường lu&ocirc;n quan t&acirc;m, chỉ đạo việc bi&ecirc;n soạn v&agrave; dịch t&agrave;i liệu, gi&aacute;o tr&igrave;nh phục vụ cho c&ocirc;ng t&aacute;c giảng dạy v&agrave; học tập.</p>\r\n\r\n<p>Ngo&agrave;i việc thực hiện tốt c&ocirc;ng t&aacute;c đ&agrave;o tạo hệ Cao đẳng v&agrave; Trung cấp chuy&ecirc;n nghiệp tại Trường v&agrave; tại c&aacute;c cơ sở li&ecirc;n kết, những năm qua Nh&agrave; trường đ&atilde; v&agrave; đang hợp t&aacute;c với một số Trường Đại học để mở c&aacute;c lớp đ&agrave;o tạo li&ecirc;n th&ocirc;ng l&ecirc;n đại học cho c&aacute;c ng&agrave;nh Gi&aacute;o dục Mầm non, Quản l&yacute; gi&aacute;o dục, Gi&aacute;o dục c&ocirc;ng d&acirc;n, Sư phạm &acirc;m nhạc, Sư phạm Mỹ thuật v.v...</p>\r\n\r\n<p>B&ecirc;n cạnh việc mở rộng quy m&ocirc; đ&agrave;o tạo, đổi mới nội dung v&agrave; phương ph&aacute;p giảng dạy, Trường Cao đẳng Sư phạm Trung ương c&ograve;n đẩy mạnh c&ocirc;ng t&aacute;c Nghi&ecirc;n cứu khoa học v&agrave; Hợp t&aacute;c Quốc tế, xem đ&acirc;y l&agrave; những k&ecirc;nh quan trọng n&acirc;ng cao chất lượng đ&agrave;o tạo v&agrave; uy t&iacute;n của Nh&agrave; trường.</p>\r\n\r\n<p>Hoạt động nghi&ecirc;n cứu khoa học trong Nh&agrave; trường ng&agrave;y c&agrave;ng được tăng cường. Trong những năm qua, c&aacute;n bộ của Nh&agrave; trường đ&atilde; chủ tr&igrave; thực hiện 65 đề t&agrave;i, dự &aacute;n nghi&ecirc;n cứu khoa học cấp Bộ v&agrave; h&agrave;ng trăm đề t&agrave;i nghi&ecirc;n cứu cấp Trường. Trong đ&oacute; c&oacute; 01 đề t&agrave;i nghi&ecirc;n cứu khoa học cấp Nh&agrave; nước, 04 đề t&agrave;i nghi&ecirc;n cứu khoa học trọng điểm cấp Bộ, 06 đề t&agrave;i nghi&ecirc;n cứu khoa học về gi&aacute;o dục bảo vệ m&ocirc;i trường trong lĩnh vực Gi&aacute;o dục Mầm non. Hầu hết c&aacute;c đề t&agrave;i nghi&ecirc;n cứu khoa học nghiệm thu đều được đ&aacute;nh gi&aacute; loại tốt v&agrave; kết quả nghi&ecirc;n cứu đ&atilde; được triển khai, ứng dụng trong c&ocirc;ng t&aacute;c đ&agrave;o tạo, trong việc chăm s&oacute;c v&agrave; gi&aacute;o dục trẻ. C&ocirc;ng t&aacute;c nghi&ecirc;n cứu khoa học của sinh vi&ecirc;n cũng được quan t&acirc;m, ph&aacute;t triển v&agrave; đ&oacute;ng g&oacute;p to lớn v&agrave;o việc n&acirc;ng cao chất lượng đ&agrave;o tạo.</p>\r\n\r\n<p>Hoạt động hợp t&aacute;c quốc tế ng&agrave;y c&agrave;ng được mở rộng v&agrave; ng&agrave;y c&agrave;ng ph&aacute;t huy hiệu quả. Th&ocirc;ng qua c&aacute;c hoạt động hợp t&aacute;c với c&aacute;c tổ chức, đơn vị trong v&agrave; ngo&agrave;i nước, Nh&agrave; trường đ&atilde; tổ chức được nhiều Hội nghị, Hội thảo khoa học mang t&iacute;nh chất quốc gia. Bốn năm qua kể từ 2004, Nh&agrave; trường tổ chức c&aacute;c lớp bồi dưỡng chuy&ecirc;n m&ocirc;n cho đội ngũ giảng vi&ecirc;n c&aacute;c trường sư phạm c&oacute; đ&agrave;o tạo Gi&aacute;o vi&ecirc;n Mầm non v&agrave; đội ngũ Gi&aacute;o vi&ecirc;n c&aacute;c trường Mầm non, c&aacute;n bộ quản l&yacute; gi&aacute;o dục Mầm non của tr&ecirc;n 50 tỉnh th&agrave;nh với sự tham gia giảng dạy của nhiều chuy&ecirc;n gia nước ngo&agrave;i. C&aacute;c Hội thảo khoa học v&agrave; c&aacute;c lớp bồi dưỡng đều được Bộ v&agrave; c&aacute;c đơn vị cơ sở đ&aacute;nh gi&aacute; cao.</p>\r\n\r\n<p>Đồng thời, Nh&agrave; trường đ&atilde; mở rộng quan hệ với nhiều nước như Singapore, Đan Mạch, H&agrave;n Quốc, Hoa Kỳ, H&agrave; Lan, L&agrave;o..., nhiều tổ chức quốc tế như VSO (Anh), SIF (Singapore), Uỷ ban II H&agrave; Lan, Plan International, Nipon Foundation,... Đồng thời thường xuy&ecirc;n c&oacute; sự trao đổi, giao lưu, học tập lẫn nhau v&agrave; mời chuy&ecirc;n gia giảng dạy cho sinh vi&ecirc;n một số ng&agrave;nh như Gi&aacute;o dục Mầm non, Gi&aacute;o dục Đặc biệt...</p>\r\n\r\n<p>Tr&ecirc;n cơ sở nhận thức đ&uacute;ng đắn về tầm quan trọng của chiến l&shy;ược c&aacute;n bộ, trong nhiều năm qua Đảng uỷ, Ban gi&aacute;m hiệu Nh&agrave; tr&shy;ường đ&atilde; qu&aacute;n triệt s&acirc;u sắc v&agrave; thực hiện tốt từ c&ocirc;ng t&aacute;c tuyển dụng, đến c&ocirc;ng t&aacute;c đ&agrave;o tạo, bồi dư&shy;ỡng c&aacute;n bộ về mọi mặt. Do đ&oacute; đội ngũ c&aacute;n bộ của Nh&agrave; tr&shy;ường đặc biệt l&agrave; c&aacute;n bộ giảng dạy ng&agrave;y c&agrave;ng lớn mạnh cả về số lư&shy;ợng v&agrave; chất lượng. Đến nay, tổng số c&aacute;n bộ của Tr&shy;ường l&agrave; 574 (Kể cả ba Trư&shy;ờng Mầm non thực h&agrave;nh), trong đ&oacute; c&oacute; : TS: 13; Ths: 188; Giảng vi&ecirc;n ch&iacute;nh: 24; Giảng vi&ecirc;n c&oacute; tr&igrave;nh độ đại học: 42/206; NCS: 18; Cao học: 20.</p>\r\n\r\n<p>Ng&agrave;nh nghề được mở rộng, th&iacute;ch ứng với nhu cầu của x&atilde; hội, kh&ocirc;ng ngừng đổi mới đ&agrave;o tạo, với đội ngũ c&aacute;n bộ ng&agrave;y c&agrave;ng vững mạnh về chuy&ecirc;n m&ocirc;n nghiệp vụ, đẩy mạnh nghi&ecirc;n cứu khoa học v&agrave; hợp t&aacute;c Quốc tế để ho&agrave;n thiện chất lượng, Trường Cao đẳng Sư phạm Trung ương đ&atilde; tạo được sức hấp dẫn với người học v&agrave; trở th&agrave;nh địa chỉ đ&aacute;ng tin cậy c&oacute; nhiều đ&oacute;ng g&oacute;p to lớn trong việc đ&agrave;o tạo đội ngũ c&aacute;n bộ, gi&aacute;o vi&ecirc;n, đặc biệt l&agrave; Gi&aacute;o vi&ecirc;n Mầm non. Trường Cao đẳng Sư phạm Trung ương đ&atilde; vinh dự được đ&oacute;n nhận Hu&acirc;n chương Lao động hạng Nhất do Nh&agrave; nước trao tặng.</p>\r\n</div>\r\n', '7', '266', 'Giới thiệu', '1488944647-2.jpg', 'a:1:{i:0;s:16:\"1488944647-2.jpg\";}', '1', '0', '266', '1', '1', '1488944647');
INSERT INTO `web_news` VALUES ('18', ' Đoàn thanh niên - Hội sinh viên', 'TRƯỜNG CAO ĐẲNG SƯ PHẠM TRUNG ƯƠNG - NHỮNG THẬP KỶ XÂY DỰNG VÀ ĐỔI MỚI Cách đây 22 năm, theo Nghị định 93/HĐBT của Hội đồng Bộ trưởng (nay là Chính phủ) Trường Cao đẳng Sư phạm Nhà trẻ - Mẫu giáo Trung ương I được thành lập với nhiệm vụ là đào tạo, bồi dưỡng Giáo viên, Cán bộ quản lý mẫu giáo với trình độ Cao đẳng và nghiên cứu khoa học giáo dục trước tuổi đến Trường phổ hông. Trường được hình thành trên nền thành tựu đã đạt được của hai Trường Sư phạm Mẫu giáo TW Hà Nam (1964 - 1988) và Trường Trung cấp nuôi dạy trẻ TW (1972 - 1988). Hai trường này đã hoàn thành tốt nhiệm vụ chính trị của mình, đào tạo hàng nghìn giáo viên Nhà trẻ, Mẫu giáo, đóng góp to lớn cho việc xây dựng, phát triển đội ngũ cán bộ, giáo viên bậc Mầm non nước nhà. Hai mươi năm qua là một chặng đường quan trọng trong lịch sử phát triển của một Trường Cao đẳng sư phạm - chặng đường đổi mới, phát triển liên tục và luôn giữ vững vai trò là một Trường trọng điểm số một trong khối các Trường Sư phạm Mầm non của cả nước.', '<div class=\"library-intro\">\r\n<p style=\"text-align:center\"><img alt=\"null\" src=\"http://project.vn/KHAC/cdsptw.edu.vn/uploads/thumbs/news/3/600x600/1487066904-anhtruong.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">TRƯỜNG CAO ĐẲNG SƯ PHẠM TRUNG ƯƠNG NHỮNG THẬP KỶ X&Acirc;Y DỰNG V&Agrave; ĐỔI MỚI</p>\r\n\r\n<p>C&aacute;ch đ&acirc;y 28 năm, theo Nghị định 93/HĐBT của Hội đồng Bộ trưởng (nay l&agrave; Ch&iacute;nh phủ) Trường Cao đẳng Sư phạm Nh&agrave; trẻ - Mẫu gi&aacute;o Trung ương I được th&agrave;nh lập với nhiệm vụ l&agrave; đ&agrave;o tạo, bồi dưỡng Gi&aacute;o vi&ecirc;n, C&aacute;n bộ quản l&yacute; mẫu gi&aacute;o với tr&igrave;nh độ Cao đẳng v&agrave; nghi&ecirc;n cứu khoa học gi&aacute;o dục trước tuổi đến Trường phổ h&ocirc;ng. Trường được h&igrave;nh th&agrave;nh tr&ecirc;n nền th&agrave;nh tựu đ&atilde; đạt được của hai Trường Sư phạm Mẫu gi&aacute;o TW H&agrave; Nam (1964 - 1988) v&agrave; Trường Trung cấp nu&ocirc;i dạy trẻ TW (1972 - 1988). Hai trường n&agrave;y đ&atilde; ho&agrave;n th&agrave;nh tốt nhiệm vụ ch&iacute;nh trị của m&igrave;nh, đ&agrave;o tạo h&agrave;ng ngh&igrave;n gi&aacute;o vi&ecirc;n Nh&agrave; trẻ, Mẫu gi&aacute;o, đ&oacute;ng g&oacute;p to lớn cho việc x&acirc;y dựng, ph&aacute;t triển đội ngũ c&aacute;n bộ, gi&aacute;o vi&ecirc;n bậc Mầm non nước nh&agrave;.</p>\r\n\r\n<p>Hai mươi năm qua l&agrave; một chặng đường quan trọng trong lịch sử ph&aacute;t triển của một Trường Cao đẳng sư phạm - chặng đường đổi mới, ph&aacute;t triển li&ecirc;n tục v&agrave; lu&ocirc;n giữ vững vai tr&ograve; l&agrave; một Trường trọng điểm số một trong khối c&aacute;c Trường Sư phạm Mầm non của cả nước. &nbsp;</p>\r\n\r\n<p>C&ocirc;ng t&aacute;c đ&agrave;o tạo lu&ocirc;n được Nh&agrave; trường x&aacute;c định l&agrave; nhiệm vụ trọng t&acirc;m v&agrave; mọi hoạt động trong c&ocirc;ng t&aacute;c đ&agrave;o tạo lu&ocirc;n được thực hiện nghi&ecirc;m t&uacute;c, đ&uacute;ng quy chế. Từ 2003 trở về trước, Nh&agrave; trường mới chuy&ecirc;n đ&agrave;o tạo Gi&aacute;o vi&ecirc;n Mầm non, với quy m&ocirc; ng&agrave;y c&agrave;ng lớn v&agrave; lu&ocirc;n c&oacute; những đổi mới về mục ti&ecirc;u, nội dung, phương ph&aacute;p gi&aacute;o dục, thực h&agrave;nh, thực tập. Do vậy, chất lượng đ&agrave;o tạo của Nh&agrave; trường ng&agrave;y c&agrave;ng được n&acirc;ng cao v&agrave; sinh vi&ecirc;n tốt nghiệp ra trường c&oacute; tay nghề vững v&agrave;ng đ&aacute;p ứng y&ecirc;u cầu của Ng&agrave;nh v&agrave; được x&atilde; hội chấp nhận, đ&aacute;nh gi&aacute; cao. Tỷ lệ sinh vi&ecirc;n tốt nghiệp c&oacute; việc l&agrave;m đ&uacute;ng ng&agrave;nh đ&agrave;o tạo kh&ocirc;ng ngừng tăng l&ecirc;n.</p>\r\n\r\n<p>Từ năm học 2003 - 2004, xuất ph&aacute;t từ nhu cầu của x&atilde; hội v&agrave; tiềm lực của Nh&agrave; trường, được sự đồng &yacute; của Bộ Gi&aacute;o dục v&agrave; Đ&agrave;o tạo, Nh&agrave; trường đ&atilde; dần chuyển th&agrave;nh Trường đ&agrave;o tạo đa ng&agrave;nh bằng việc mở th&ecirc;m nhiều ng&agrave;nh đ&agrave;o tạo mới như Sư phạm &acirc;m nhạc, Gi&aacute;o dục Đặc biệt, Sư phạm Mỹ thuật, Gi&aacute;o dục c&ocirc;ng d&acirc;n, Sư phạm C&ocirc;ng nghệ, Th&ocirc;ng tin - Thư viện, Tin học, C&ocirc;ng t&aacute;c x&atilde; hội, Văn thư lưu trữ, Quản trị văn ph&ograve;ng, Thư k&yacute; văn ph&ograve;ng.... V&agrave; đến nay Nh&agrave; trường đ&atilde; c&oacute; 17 ng&agrave;nh đ&agrave;o tạo cả tr&igrave;nh độ Cao đẳng v&agrave; Trung cấp chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>Để phản &aacute;nh đ&uacute;ng nhiệm vụ ch&iacute;nh trị của Trường, cuối năm 2005 Nh&agrave; trường đ&atilde; x&acirc;y dựng Đề &aacute;n đổi t&ecirc;n Trường v&agrave; ng&agrave;y 26/01/2006 Bộ Gi&aacute;o dục v&agrave; Đ&agrave;o tạo đ&atilde; ra Quyết định số 509/QĐ-BGD&amp;ĐT đổi t&ecirc;n Trường th&agrave;nh Trường Cao đẳng Sư phạm Trung ương. Trường Cao đẳng Sư phạm Trung ương c&oacute; nhiệm vụ:</p>\r\n\r\n<p>- Đ&agrave;o tạo v&agrave; bồi dưỡng gi&aacute;o vi&ecirc;n c&oacute; tr&igrave;nh độ cao đẳng cho Gi&aacute;o dục Mầm non v&agrave; c&aacute;c Trường chuy&ecirc;n biệt.</p>\r\n\r\n<p>- Đ&agrave;o tạo v&agrave; bồi dưỡng c&aacute;n bộ c&oacute; tr&igrave;nh độ cao đẳng v&agrave; c&aacute;c tr&igrave;nh độ thấp hơn một số chuy&ecirc;n ng&agrave;nh kh&aacute;c: Nghệ thuật, Nh&acirc;n văn, Th&ocirc;ng tin - Thư viện, Dịch vụ x&atilde; hội, Quản l&yacute; gi&aacute;o dục.</p>\r\n\r\n<p>- Nghi&ecirc;n cứu khoa học phục vụ y&ecirc;u cầu ph&aacute;t triển kinh tế - x&atilde; hội.</p>\r\n\r\n<p>Những năm gần đ&acirc;y, do c&aacute;c m&atilde; ng&agrave;nh đ&agrave;o tạo tăng l&ecirc;n c&ugrave;ng với uy t&iacute;n của Nh&agrave; trường n&ecirc;n lượng th&iacute; sinh đăng k&yacute; thi v&agrave;o Trường ng&agrave;y c&agrave;ng đ&ocirc;ng v&agrave; quy m&ocirc; đ&agrave;o tạo của Trường ng&agrave;y c&agrave;ng mở rộng. H&agrave;ng năm, Nh&agrave; trường tuyển sinh gần 5000 th&iacute; sinh cho c&aacute;c hệ Cao đẳng v&agrave; Trung cấp chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>Việc x&acirc;y dựng chương tr&igrave;nh đ&agrave;o tạo cũng lu&ocirc;n được ch&uacute; trọng v&agrave; chỉ đạo triển khai c&oacute; hiệu quả. Đến nay, chương tr&igrave;nh khung v&agrave; chương tr&igrave;nh chi tiết của c&aacute;c ng&agrave;nh đ&agrave;o tạo đều đ&atilde; được ho&agrave;n th&agrave;nh, trong đ&oacute; c&oacute; chương tr&igrave;nh đ&agrave;o tạo ng&agrave;nh Gi&aacute;o dục Mầm non v&agrave; Gi&aacute;o dục Đặc biệt tr&igrave;nh độ Cao đẳng đ&atilde; được Bộ trưởng ph&ecirc; chuẩn d&ugrave;ng cho c&aacute;c trường đ&agrave;o tạo Gi&aacute;o vi&ecirc;n Mầm non trong cả nước.</p>\r\n\r\n<p>Để n&acirc;ng cao chất lượng đ&agrave;o tạo, Nh&agrave; trường lu&ocirc;n quan t&acirc;m, chỉ đạo việc bi&ecirc;n soạn v&agrave; dịch t&agrave;i liệu, gi&aacute;o tr&igrave;nh phục vụ cho c&ocirc;ng t&aacute;c giảng dạy v&agrave; học tập.</p>\r\n\r\n<p>Ngo&agrave;i việc thực hiện tốt c&ocirc;ng t&aacute;c đ&agrave;o tạo hệ Cao đẳng v&agrave; Trung cấp chuy&ecirc;n nghiệp tại Trường v&agrave; tại c&aacute;c cơ sở li&ecirc;n kết, những năm qua Nh&agrave; trường đ&atilde; v&agrave; đang hợp t&aacute;c với một số Trường Đại học để mở c&aacute;c lớp đ&agrave;o tạo li&ecirc;n th&ocirc;ng l&ecirc;n đại học cho c&aacute;c ng&agrave;nh Gi&aacute;o dục Mầm non, Quản l&yacute; gi&aacute;o dục, Gi&aacute;o dục c&ocirc;ng d&acirc;n, Sư phạm &acirc;m nhạc, Sư phạm Mỹ thuật v.v...</p>\r\n\r\n<p>B&ecirc;n cạnh việc mở rộng quy m&ocirc; đ&agrave;o tạo, đổi mới nội dung v&agrave; phương ph&aacute;p giảng dạy, Trường Cao đẳng Sư phạm Trung ương c&ograve;n đẩy mạnh c&ocirc;ng t&aacute;c Nghi&ecirc;n cứu khoa học v&agrave; Hợp t&aacute;c Quốc tế, xem đ&acirc;y l&agrave; những k&ecirc;nh quan trọng n&acirc;ng cao chất lượng đ&agrave;o tạo v&agrave; uy t&iacute;n của Nh&agrave; trường.</p>\r\n\r\n<p>Hoạt động nghi&ecirc;n cứu khoa học trong Nh&agrave; trường ng&agrave;y c&agrave;ng được tăng cường. Trong những năm qua, c&aacute;n bộ của Nh&agrave; trường đ&atilde; chủ tr&igrave; thực hiện 65 đề t&agrave;i, dự &aacute;n nghi&ecirc;n cứu khoa học cấp Bộ v&agrave; h&agrave;ng trăm đề t&agrave;i nghi&ecirc;n cứu cấp Trường. Trong đ&oacute; c&oacute; 01 đề t&agrave;i nghi&ecirc;n cứu khoa học cấp Nh&agrave; nước, 04 đề t&agrave;i nghi&ecirc;n cứu khoa học trọng điểm cấp Bộ, 06 đề t&agrave;i nghi&ecirc;n cứu khoa học về gi&aacute;o dục bảo vệ m&ocirc;i trường trong lĩnh vực Gi&aacute;o dục Mầm non. Hầu hết c&aacute;c đề t&agrave;i nghi&ecirc;n cứu khoa học nghiệm thu đều được đ&aacute;nh gi&aacute; loại tốt v&agrave; kết quả nghi&ecirc;n cứu đ&atilde; được triển khai, ứng dụng trong c&ocirc;ng t&aacute;c đ&agrave;o tạo, trong việc chăm s&oacute;c v&agrave; gi&aacute;o dục trẻ. C&ocirc;ng t&aacute;c nghi&ecirc;n cứu khoa học của sinh vi&ecirc;n cũng được quan t&acirc;m, ph&aacute;t triển v&agrave; đ&oacute;ng g&oacute;p to lớn v&agrave;o việc n&acirc;ng cao chất lượng đ&agrave;o tạo.</p>\r\n\r\n<p>Hoạt động hợp t&aacute;c quốc tế ng&agrave;y c&agrave;ng được mở rộng v&agrave; ng&agrave;y c&agrave;ng ph&aacute;t huy hiệu quả. Th&ocirc;ng qua c&aacute;c hoạt động hợp t&aacute;c với c&aacute;c tổ chức, đơn vị trong v&agrave; ngo&agrave;i nước, Nh&agrave; trường đ&atilde; tổ chức được nhiều Hội nghị, Hội thảo khoa học mang t&iacute;nh chất quốc gia. Bốn năm qua kể từ 2004, Nh&agrave; trường tổ chức c&aacute;c lớp bồi dưỡng chuy&ecirc;n m&ocirc;n cho đội ngũ giảng vi&ecirc;n c&aacute;c trường sư phạm c&oacute; đ&agrave;o tạo Gi&aacute;o vi&ecirc;n Mầm non v&agrave; đội ngũ Gi&aacute;o vi&ecirc;n c&aacute;c trường Mầm non, c&aacute;n bộ quản l&yacute; gi&aacute;o dục Mầm non của tr&ecirc;n 50 tỉnh th&agrave;nh với sự tham gia giảng dạy của nhiều chuy&ecirc;n gia nước ngo&agrave;i. C&aacute;c Hội thảo khoa học v&agrave; c&aacute;c lớp bồi dưỡng đều được Bộ v&agrave; c&aacute;c đơn vị cơ sở đ&aacute;nh gi&aacute; cao.</p>\r\n\r\n<p>Đồng thời, Nh&agrave; trường đ&atilde; mở rộng quan hệ với nhiều nước như Singapore, Đan Mạch, H&agrave;n Quốc, Hoa Kỳ, H&agrave; Lan, L&agrave;o..., nhiều tổ chức quốc tế như VSO (Anh), SIF (Singapore), Uỷ ban II H&agrave; Lan, Plan International, Nipon Foundation,... Đồng thời thường xuy&ecirc;n c&oacute; sự trao đổi, giao lưu, học tập lẫn nhau v&agrave; mời chuy&ecirc;n gia giảng dạy cho sinh vi&ecirc;n một số ng&agrave;nh như Gi&aacute;o dục Mầm non, Gi&aacute;o dục Đặc biệt...</p>\r\n\r\n<p>Tr&ecirc;n cơ sở nhận thức đ&uacute;ng đắn về tầm quan trọng của chiến l&shy;ược c&aacute;n bộ, trong nhiều năm qua Đảng uỷ, Ban gi&aacute;m hiệu Nh&agrave; tr&shy;ường đ&atilde; qu&aacute;n triệt s&acirc;u sắc v&agrave; thực hiện tốt từ c&ocirc;ng t&aacute;c tuyển dụng, đến c&ocirc;ng t&aacute;c đ&agrave;o tạo, bồi dư&shy;ỡng c&aacute;n bộ về mọi mặt. Do đ&oacute; đội ngũ c&aacute;n bộ của Nh&agrave; tr&shy;ường đặc biệt l&agrave; c&aacute;n bộ giảng dạy ng&agrave;y c&agrave;ng lớn mạnh cả về số lư&shy;ợng v&agrave; chất lượng. Đến nay, tổng số c&aacute;n bộ của Tr&shy;ường l&agrave; 574 (Kể cả ba Trư&shy;ờng Mầm non thực h&agrave;nh), trong đ&oacute; c&oacute; : TS: 13; Ths: 188; Giảng vi&ecirc;n ch&iacute;nh: 24; Giảng vi&ecirc;n c&oacute; tr&igrave;nh độ đại học: 42/206; NCS: 18; Cao học: 20.</p>\r\n\r\n<p>Ng&agrave;nh nghề được mở rộng, th&iacute;ch ứng với nhu cầu của x&atilde; hội, kh&ocirc;ng ngừng đổi mới đ&agrave;o tạo, với đội ngũ c&aacute;n bộ ng&agrave;y c&agrave;ng vững mạnh về chuy&ecirc;n m&ocirc;n nghiệp vụ, đẩy mạnh nghi&ecirc;n cứu khoa học v&agrave; hợp t&aacute;c Quốc tế để ho&agrave;n thiện chất lượng, Trường Cao đẳng Sư phạm Trung ương đ&atilde; tạo được sức hấp dẫn với người học v&agrave; trở th&agrave;nh địa chỉ đ&aacute;ng tin cậy c&oacute; nhiều đ&oacute;ng g&oacute;p to lớn trong việc đ&agrave;o tạo đội ngũ c&aacute;n bộ, gi&aacute;o vi&ecirc;n, đặc biệt l&agrave; Gi&aacute;o vi&ecirc;n Mầm non. Trường Cao đẳng Sư phạm Trung ương đ&atilde; vinh dự được đ&oacute;n nhận Hu&acirc;n chương Lao động hạng Nhất do Nh&agrave; nước trao tặng.</p>\r\n</div>\r\n', '7', '266', 'Giới thiệu', '1488944813-8.jpg', 'a:1:{i:0;s:16:\"1488944813-8.jpg\";}', '1', '0', '266', '0', '1', '1488944813');

-- ----------------------------
-- Table structure for web_type_setting
-- ----------------------------
DROP TABLE IF EXISTS `web_type_setting`;
CREATE TABLE `web_type_setting` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_title` varchar(255) DEFAULT NULL,
  `type_infor` text,
  `type_keyword` varchar(255) DEFAULT NULL,
  `type_group` varchar(255) DEFAULT NULL COMMENT 'Nhóm các thuộc tính cùng nhau',
  `type_order` int(10) DEFAULT '0',
  `type_status` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_type_setting
-- ----------------------------
INSERT INTO `web_type_setting` VALUES ('1', 'Kiểu khoa', 'định nghĩa kiểu khoa hay trung tâm ', 'type_khoa', 'group_type', '1', '1');
INSERT INTO `web_type_setting` VALUES ('2', 'Kiểu trung tâm', 'định nghĩa kiểu khoa hay trung tâm', 'type_trung tâm', 'group_type', '2', '1');
INSERT INTO `web_type_setting` VALUES ('3', 'Giao diện trang chủ', 'kiểu hiển thị page', 'layouts_home', 'group_layouts', '3', '1');
INSERT INTO `web_type_setting` VALUES ('4', 'Giao diện khoa', 'kiểu hiển thị page', 'layouts_khoa', 'group_layouts', '4', '1');

-- ----------------------------
-- Table structure for web_video
-- ----------------------------
DROP TABLE IF EXISTS `web_video`;
CREATE TABLE `web_video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `video_name_alias` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `video_sort_desc` text CHARACTER SET utf8,
  `video_content` text CHARACTER SET utf8,
  `video_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `video_file` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `video_img` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `video_img_temp` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `video_status` tinyint(5) DEFAULT NULL,
  `video_view` int(11) DEFAULT '0' COMMENT 'lượt view xem video tren site',
  `video_hot` tinyint(4) DEFAULT NULL,
  `video_time_creater` int(11) DEFAULT '0',
  `video_category` int(10) DEFAULT NULL,
  `type_language` tinyint(5) DEFAULT '1',
  `video_time_update` int(11) DEFAULT '0',
  `video_meta_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `video_meta_keyword` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `video_meta_description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of web_video
-- ----------------------------
INSERT INTO `web_video` VALUES ('2', 'Học gì để không thất nghiệp', null, null, '<p>Một m&oacute;n qu&agrave; d&agrave;nh tặng cho c&aacute;c bạn học sinh lớp 12 chuẩn bị thi đại học. H&atilde;y d&agrave;nh ra 5 ph&uacute;t để thay đổi cuộc đời bạn từ đ&acirc;y.</p>\r\n\r\n<p>Về ph&iacute;a Trường Cao đẳng Sư phạm Trung ương: Trưởng đo&agrave;n l&agrave; NGƯT. TS Đặng Lộc Thọ - B&iacute; thư Đảng uỷ, Hiệu trưởng Nh&agrave; trường, đi c&ugrave;ng đo&agrave;n c&oacute; l&atilde;nh đạo c&aacute;c khoa X&atilde; hội Nh&acirc;n văn, &Acirc;m Nhạc v&agrave; Mĩ thuật v&agrave; 25 đo&agrave;n vi&ecirc;n l&agrave; c&aacute;n bộ v&agrave; sinh vi&ecirc;n Nh&agrave; trường; Về ph&iacute;a Huyện uỷ, Huyện đo&agrave;n Ho&agrave;ng Su Ph&igrave; c&oacute; Đ/c Ho&agrave;ng Ngọc Đ&iacute;ch - UVBTV Huyện ủy, Trưởng ban Tuy&ecirc;n gi&aacute;o Huyện ủy; Đ/c Triệu Tiến Quang - Huyện ủy vi&ecirc;n, B&iacute; thư Huyện Đo&agrave;n; Đ/c Ho&agrave;ng Xu&acirc;n H&ograve;a - Ph&oacute; B&iacute; thư Huyện đo&agrave;n&nbsp; v&agrave; đại diện c&aacute;c ph&ograve;ng, ban ng&agrave;nh của Huyện uỷ...; Về ph&iacute;a L&atilde;nh đạo Đảng ủy, HĐND, UBND, Đo&agrave;n Thanh ni&ecirc;n x&atilde; c&oacute; Đ/c Gi&agrave;ng Văn L&acirc;m - B&iacute; thư Đảng ủy x&atilde;; Đ/c Trịnh C&ocirc;ng Hiển - Chủ tịch UBND x&atilde;; Đ/c Ly Seo V&agrave;ng - UVBCH Đảng ủy, B&iacute; thư Đo&agrave;n x&atilde; v&agrave; c&aacute;c đồng ch&iacute; Ph&oacute; B&iacute; thư Đảng ủy, Ph&oacute; Chủ tịch UBND, HĐND, BCH Đo&agrave;n x&atilde; v&agrave; c&aacute;c ph&ograve;ng ban x&atilde; Th&egrave;n Chu Ph&igrave;n.</p>\r\n\r\n<p>Trong 3 ng&agrave;y hoạt động, đo&agrave;n đ&atilde; phối hợp thực hiện c&aacute;c nội dung: x&acirc;y dựng c&ocirc;ng tr&igrave;nh &quot;M&aacute;i che cho em&quot; trị gi&aacute; 30 triệu đồng; trang tr&iacute; trong v&agrave; ngo&agrave;i khu&ocirc;n vi&ecirc;n trường Mầm non x&atilde;; tặng qu&agrave; c&aacute;c gia đ&igrave;nh ch&iacute;nh s&aacute;ch v&agrave; học sinh ngh&egrave;o, trị gi&aacute; 3 triệu đồng, tặng qu&agrave; Đảng uỷ, UBND, HĐND v&agrave; CB Gi&aacute;o vi&ecirc;n trường mầm non x&atilde; trị gi&aacute; 5 triệu đồng. Tổ chức chương tr&igrave;nh giao lưu văn nghệ với Huyện đo&agrave;n, UBND, HĐND, Đo&agrave;n x&atilde;, trường MN...v&agrave; b&agrave; con nh&acirc;n d&acirc;n địa phương.</p>\r\n', 'https://www.youtube.com/watch?v=Hil4b8lNC7s', null, null, null, '1', '0', '2', '1471363334', null, '1', '1488943441', null, null, null);
INSERT INTO `web_video` VALUES ('3', 'Đến giờ học thì làm gì?', null, null, '<p>Về ph&iacute;a Trường Cao đẳng Sư phạm Trung ương: Trưởng đo&agrave;n l&agrave; NGƯT. TS Đặng Lộc Thọ - B&iacute; thư Đảng uỷ, Hiệu trưởng Nh&agrave; trường, đi c&ugrave;ng đo&agrave;n c&oacute; l&atilde;nh đạo c&aacute;c khoa X&atilde; hội Nh&acirc;n văn, &Acirc;m Nhạc v&agrave; Mĩ thuật v&agrave; 25 đo&agrave;n vi&ecirc;n l&agrave; c&aacute;n bộ v&agrave; sinh vi&ecirc;n Nh&agrave; trường; Về ph&iacute;a Huyện uỷ, Huyện đo&agrave;n Ho&agrave;ng Su Ph&igrave; c&oacute; Đ/c Ho&agrave;ng Ngọc Đ&iacute;ch - UVBTV Huyện ủy, Trưởng ban Tuy&ecirc;n gi&aacute;o Huyện ủy; Đ/c Triệu Tiến Quang - Huyện ủy vi&ecirc;n, B&iacute; thư Huyện Đo&agrave;n; Đ/c Ho&agrave;ng Xu&acirc;n H&ograve;a - Ph&oacute; B&iacute; thư Huyện đo&agrave;n&nbsp; v&agrave; đại diện c&aacute;c ph&ograve;ng, ban ng&agrave;nh của Huyện uỷ...; Về ph&iacute;a L&atilde;nh đạo Đảng ủy, HĐND, UBND, Đo&agrave;n Thanh ni&ecirc;n x&atilde; c&oacute; Đ/c Gi&agrave;ng Văn L&acirc;m - B&iacute; thư Đảng ủy x&atilde;; Đ/c Trịnh C&ocirc;ng Hiển - Chủ tịch UBND x&atilde;; Đ/c Ly Seo V&agrave;ng - UVBCH Đảng ủy, B&iacute; thư Đo&agrave;n x&atilde; v&agrave; c&aacute;c đồng ch&iacute; Ph&oacute; B&iacute; thư Đảng ủy, Ph&oacute; Chủ tịch UBND, HĐND, BCH Đo&agrave;n x&atilde; v&agrave; c&aacute;c ph&ograve;ng ban x&atilde; Th&egrave;n Chu Ph&igrave;n.</p>\r\n\r\n<p>Trong 3 ng&agrave;y hoạt động, đo&agrave;n đ&atilde; phối hợp thực hiện c&aacute;c nội dung: x&acirc;y dựng c&ocirc;ng tr&igrave;nh &quot;M&aacute;i che cho em&quot; trị gi&aacute; 30 triệu đồng; trang tr&iacute; trong v&agrave; ngo&agrave;i khu&ocirc;n vi&ecirc;n trường Mầm non x&atilde;; tặng qu&agrave; c&aacute;c gia đ&igrave;nh ch&iacute;nh s&aacute;ch v&agrave; học sinh ngh&egrave;o, trị gi&aacute; 3 triệu đồng, tặng qu&agrave; Đảng uỷ, UBND, HĐND v&agrave; CB Gi&aacute;o vi&ecirc;n trường mầm non x&atilde; trị gi&aacute; 5 triệu đồng. Tổ chức chương tr&igrave;nh giao lưu văn nghệ với Huyện đo&agrave;n, UBND, HĐND, Đo&agrave;n x&atilde;, trường MN...v&agrave; b&agrave; con nh&acirc;n d&acirc;n địa phương.</p>\r\n', 'https://www.youtube.com/watch?v=9QabhxE1N7U', null, null, null, '1', '0', '1', '1488853954', null, '1', '1488943455', null, null, null);

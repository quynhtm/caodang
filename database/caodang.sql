/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : caodang

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-07 12:06:36
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group_user
-- ----------------------------
INSERT INTO `group_user` VALUES ('1', 'Root', '1', '1');
INSERT INTO `group_user` VALUES ('2', 'Quyền xem lượt Share', '1', '1');

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
INSERT INTO `group_user_permission` VALUES ('1', '1');
INSERT INTO `group_user_permission` VALUES ('2', '43');

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES ('1', 'root', 'Root', '1', 'Root');
INSERT INTO `permission` VALUES ('2', 'user_view', 'Xem danh sách user Admin', '1', 'Tài khoản Admin');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2', 'admin', 'eef828faf0754495136af05c051766cb', 'Root', '0', '', null, null, '0', null, null, '1', '1', '1486434699', '::1', null, null, null, null, null, null);
INSERT INTO `user` VALUES ('19', 'tech_code', '7eb3b9aba1960c22aa9bc8d1f27ebfb9', 'Tech code 3555', '0', '', '', '', '0', '0', null, '1', '2', '1481772767', '::1', null, null, '2', 'admin', null, '1481772561');
INSERT INTO `user` VALUES ('20', 'svquynhtm', 'fa268d7af7410dbf1b860075e9074889', '', '1', 'manhquynh1984@gmail.com', '0938413368', 'Cộng tác viên', '1483203600', '1484240400', '3,4,5', '1', '2', '1482826054', '::1', '2', 'admin', '2', 'admin', '1482823830', '1482824272');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_banner
-- ----------------------------
INSERT INTO `web_banner` VALUES ('3', 'test banner quảng cáo', '', 'http://localhost/goingay/admin/banner/edit/3', '0', '4', '0', '0', '12', '4', '14', '1', '0', '1', '0', '0', '0', '0', '1478768319', '0', '1482998823');
INSERT INTO `web_banner` VALUES ('4', 'hiển thị banner không có ảnh', '', 'http://localhost/goingay/admin/banner/edit/3', '0', '3', '0', '0', '1', '3', '3', '1', '0', '1', '0', '0', '0', '0', '1482380269', '0', '1482998790');
INSERT INTO `web_banner` VALUES ('5', 'hiển thị banner không có ảnh', '', 'http://localhost/goingay/admin/banner/edit/3', '0', '5', '0', '0', '1', '7', '13', '1', '0', '1', '0', '0', '0', '0', '1482998971', '0', '0');
INSERT INTO `web_banner` VALUES ('6', 'hiển thị banner không có ảnh', '1482998992-573cb4258e810763aa000001.jpg', 'http://localhost/goingay/admin/banner/edit/3', '0', '5', '0', '0', '1', '6', '0', '1', '0', '1', '0', '0', '0', '0', '1482998991', '0', '1482999333');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of web_category_depart
-- ----------------------------

-- ----------------------------
-- Table structure for web_category_new
-- ----------------------------
DROP TABLE IF EXISTS `web_category_new`;
CREATE TABLE `web_category_new` (
  `category_new_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_new_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_new_depart_id` int(11) DEFAULT NULL COMMENT 'thuộc danh mục của khoa nào ',
  `category_new_parent_id` int(11) unsigned DEFAULT '0',
  `category_new_show_top` tinyint(2) DEFAULT '0',
  `category_new_show_left` tinyint(2) DEFAULT '1',
  `category_new_show_right` tinyint(2) DEFAULT NULL,
  `category_new_show_center` tinyint(2) DEFAULT '0',
  `category_new_status` tinyint(1) DEFAULT '0',
  `category_new_order` tinyint(5) DEFAULT '0',
  PRIMARY KEY (`category_new_id`),
  KEY `status` (`category_new_status`) USING BTREE,
  KEY `id_parrent` (`category_new_parent_id`,`category_new_status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=265 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of web_category_new
-- ----------------------------
INSERT INTO `web_category_new` VALUES ('253', 'Mua bán nhà đất', null, '0', '1', '1', null, '1', '1', '1');
INSERT INTO `web_category_new` VALUES ('254', 'Thuê nhà đất', null, '0', '1', '1', null, '2', '1', '2');
INSERT INTO `web_category_new` VALUES ('255', 'Ôtô', null, '0', '1', '1', null, '3', '1', '3');
INSERT INTO `web_category_new` VALUES ('256', 'Xe máy - Xe đạp', null, '0', '1', '1', null, '4', '1', '4');
INSERT INTO `web_category_new` VALUES ('257', 'Tuyển sinh - Tuyển dụng', null, '0', '0', '1', null, '5', '1', '5');
INSERT INTO `web_category_new` VALUES ('258', 'Điện thoại - Sim', null, '0', '1', '1', null, '6', '1', '6');
INSERT INTO `web_category_new` VALUES ('259', 'PC - Laptop', null, '0', '1', '1', null, '7', '1', '7');
INSERT INTO `web_category_new` VALUES ('260', 'Điện tử - Kỹ thuật số', null, '0', '1', '1', null, '8', '1', '8');
INSERT INTO `web_category_new` VALUES ('261', 'Thời trang - Làm đẹp', null, '0', '1', '1', null, '9', '1', '9');
INSERT INTO `web_category_new` VALUES ('262', 'Ẩm thực - Du lịch', null, '0', '0', '1', null, '10', '1', '10');
INSERT INTO `web_category_new` VALUES ('263', 'Dịch vụ', null, '0', '0', '1', null, '11', '1', '11');
INSERT INTO `web_category_new` VALUES ('264', 'Khác', null, '0', '1', '1', null, '12', '1', '12');

-- ----------------------------
-- Table structure for web_department
-- ----------------------------
DROP TABLE IF EXISTS `web_department`;
CREATE TABLE `web_department` (
  `department_id` int(10) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_alias` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_status` tinyint(1) DEFAULT '0',
  `department_order` tinyint(5) DEFAULT '0',
  PRIMARY KEY (`department_id`),
  KEY `status` (`department_status`) USING BTREE,
  KEY `id_parrent` (`department_status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of web_department
-- ----------------------------
INSERT INTO `web_department` VALUES ('1', 'Khoa âm nhạc', null, '1', '1');
INSERT INTO `web_department` VALUES ('2', 'Khoa tiếng anh', null, '1', '2');
INSERT INTO `web_department` VALUES ('3', 'Khoa cơ bản', null, '1', '3');
INSERT INTO `web_department` VALUES ('4', 'Khoa Giáo dục đặc biệt', null, '1', '4');
INSERT INTO `web_department` VALUES ('5', 'Khoa Giáo dục mầm non', null, '1', '5');
INSERT INTO `web_department` VALUES ('6', 'Khoa Mỹ thuật', null, '1', '6');
INSERT INTO `web_department` VALUES ('7', 'Khoa Công Nghệ Thông Tin', null, '1', '7');
INSERT INTO `web_department` VALUES ('8', 'Khoa Quản lý - Văn thư', null, '1', '8');
INSERT INTO `web_department` VALUES ('9', 'Khoa Xã hội - Nhân văn', 'khoaxahoinhanvan', '1', '9');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Stores news content.';

-- ----------------------------
-- Records of web_info
-- ----------------------------
INSERT INTO `web_info` VALUES ('1', null, 'Thông tin chân trang bên trái', 'SITE_FOOTER_LEFT', '', '<p><strong>T&ecirc;n đăng k&yacute;: </strong>C&ocirc;ng ty Cổ truyền th&ocirc;ng raovat30s</p>\r\n\r\n<p><strong>T&ecirc;n giao dịch: </strong>Raovat30s Online JSC</p>\r\n\r\n<p><strong>Địa chỉ trụ sở: </strong>Tầng 2, T&ograve;a nh&agrave; CT2A - KĐT Nghĩa Đ&ocirc;, Ho&agrave;ng Quốc Việt, Cầu Giấy, H&agrave; Nội.</p>\r\n\r\n<p><strong>Điện thoại: </strong>0913.922.986</p>\r\n\r\n<p><strong>Email: </strong>raovat@raovat30s.vn</p>\r\n\r\n<p><strong>Giấy chứng nhận đăng k&yacute; kinh doanh số 0305056245 do Sở Kế hoạch v&agrave; Đầu tư Th&agrave;nh phố H&agrave; Nội cấp ng&agrave;y 22/12/2016</strong></p>\r\n', '1481877283-573cb4258e810763aa000001.jpg', '1447794727', '1', '1', '', '', '');

-- ----------------------------
-- Table structure for web_news
-- ----------------------------
DROP TABLE IF EXISTS `web_news`;
CREATE TABLE `web_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) DEFAULT NULL,
  `news_desc_sort` text,
  `news_content` text,
  `news_image` varchar(255) DEFAULT NULL COMMENT 'ảnh đại diện của bài viết',
  `news_image_other` varchar(255) DEFAULT NULL COMMENT 'Lưu ảnh của bài viết',
  `news_type` tinyint(5) DEFAULT '1' COMMENT 'Kiểu tin',
  `news_category_new_id` int(11) DEFAULT NULL,
  `news_category_new_title` varchar(255) DEFAULT NULL,
  `news_status` tinyint(5) DEFAULT NULL,
  `news_create` int(11) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_news
-- ----------------------------
INSERT INTO `web_news` VALUES ('1', 'tin tức hàng ngày', 'Hôm nay (5/12) sẽ là thời điểm điều chỉnh giá xăng dầu của chu kỳ mới. Theo dữ liệu giá thành phẩm trên thị trường Singapore được Bộ Công Thương công bố, bình quân giá xăng RON 92 ở mức 58 USD một thùng, tăng 5,4% so với chu kỳ trước (55 USD một thùng). Đáng chú ý, những ngày gần đây giá xăng tăng lên gần 60 USD một thùng.', '<p>H&ocirc;m nay (5/12) sẽ l&agrave; thời điểm điều chỉnh gi&aacute; xăng dầu của chu kỳ mới.&nbsp;Theo dữ liệu gi&aacute; th&agrave;nh phẩm tr&ecirc;n thị trường Singapore được Bộ C&ocirc;ng&nbsp;Thương c&ocirc;ng bố, b&igrave;nh qu&acirc;n gi&aacute; xăng RON 92 ở mức 58 USD một th&ugrave;ng, tăng 5,4% so với chu kỳ trước (55 USD một th&ugrave;ng). Đ&aacute;ng ch&uacute; &yacute;, những ng&agrave;y gần đ&acirc;y gi&aacute; xăng tăng l&ecirc;n gần 60 USD một th&ugrave;ng.</p>\r\n\r\n<p>Chia sẻ với <em>VnExpress</em>, nhiều doanh nghiệp đầu mối ở TP HCM cho biết, những ng&agrave;y qua gi&aacute; xăng thế giới lại tiếp tục tăng, do vậy tại chu kỳ điều chỉnh mới xăng sẽ đứng trước &aacute;p lực tăng gi&aacute; mạnh.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"xang-co-the-tang-gia-manh-hom-nay\" src=\"http://img.f25.kinhdoanh.vnecdn.net/2016/12/04/xang-6751-1480822899.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Gi&aacute; xăng c&oacute; thể tăng mạnh ng&agrave;y mai theo gi&aacute; thế giới.&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>L&atilde;nh đạo 2 doanh nghiệp đầu mối ở TP HCM cho biết, cơ quan quản l&yacute; c&oacute; thể kết hợp song song biện ph&aacute;p vừa sử dụng quỹ b&igrave;nh ổn vừa tăng gi&aacute;. Đối với trường hợp n&agrave;y, gi&aacute; xăng c&oacute; thể chỉ tăng quanh mức 200-400 đồng một l&iacute;t v&agrave; gi&aacute; dầu cũng được điều chỉnh tăng ở mức tương tự.</p>\r\n\r\n<p>&ldquo;B&ecirc;n cạnh đ&oacute;, nếu cơ quan quản l&yacute; kh&ocirc;ng sử dụng quỹ b&igrave;nh ổn th&igrave; gi&aacute; xăng c&oacute; thể tăng 500-600 đồng một l&iacute;t. Đ&acirc;y cũng l&agrave; kỳ điều chỉnh khiến gi&aacute; b&aacute;n lẻ c&oacute; thể quay về mốc của kỳ điều chỉnh đầu th&aacute;ng 11&rdquo;, l&atilde;nh đạo doanh nghiệp đầu mối ở Thủ Đức n&oacute;i.</p>\r\n\r\n<p>Tại kỳ điều chỉnh trước, gi&aacute; cơ sở mỗi l&iacute;t xăng RON 92 được y&ecirc;u cầu giảm 521 đồng, khiến gi&aacute; b&aacute;n lẻ kh&ocirc;ng được cao hơn 16.371 đồng. Xăng E5 giảm 355 đồng, xuống mức tối đa l&agrave; 16.221 đồng một l&iacute;t. Gi&aacute; dầu diesel cũng giảm 514 đồng, trong khi dầu hỏa v&agrave; mad&uacute;t lần lượt giảm 578 v&agrave; 373 đồng một l&iacute;t, kg.</p>\r\n\r\n<p>Từ đầu năm đến nay, mặt h&agrave;ng n&agrave;y trải qua 21 lần điều chỉnh, với 11 lần tăng v&agrave; 10 lần giảm.</p>\r\n', '1480910791-573cb4258e810763aa000001.jpg', 'a:1:{i:0;s:39:\"1480910791-573cb4258e810763aa000001.jpg\";}', '3', '7', null, '1', '1480910791');
INSERT INTO `web_news` VALUES ('2', 'dang test 333', 'Trong thời gian hồ thủy lợi Phú Ninh (Quảng Nam) xả lũ, nhiều người dùng lưới chắn phía trên cống đón cá mè chui vào lồng và bắt được 2-3 tấn/ngày.', '<p>Ng&agrave;y 23/11, với tr&ecirc;n 95% đại biểu t&aacute;n th&agrave;nh, Quốc hội đ&atilde; th&ocirc;ng qua Nghị quyết về chất vấn v&agrave; trả lời chất vấn tại kỳ họp thứ 2, Quốc hội kh&oacute;a 14.</p>\r\n\r\n<p>Theo đ&oacute;, Quốc hội ph&ecirc; ph&aacute;n nghi&ecirc;m khắc &ocirc;ng Vũ Huy Ho&agrave;ng, Bộ trưởng C&ocirc;ng Thương nhiệm kỳ 2011-2016, do đ&atilde; c&oacute; những vi phạm về c&ocirc;ng t&aacute;c c&aacute;n bộ trong thời gian đảm nhiệm chức vụ n&ecirc;u tr&ecirc;n, g&acirc;y hậu quả nghi&ecirc;m trọng, ảnh hưởng xấu đến uy t&iacute;n của Đảng, Nh&agrave; nước, Bộ C&ocirc;ng Thương, g&acirc;y bức x&uacute;c trong x&atilde; hội.</p>\r\n\r\n<p>Quốc hội giao Ủy ban Thường vụ Quốc hội, Ch&iacute;nh phủ, c&aacute;c cơ quan bảo vệ ph&aacute;p luật tiếp tục l&agrave;m r&otilde; v&agrave; xử l&yacute; theo quy định của ph&aacute;p luật những vi phạm của cựu Bộ trưởng Vũ Huy Ho&agrave;ng. Đồng thời, tăng cường c&ocirc;ng t&aacute;c gi&aacute;m s&aacute;t, quản l&yacute; c&aacute;n bộ; tạo cơ sở ph&aacute;p l&yacute; đồng bộ để xử l&yacute; c&ocirc;ng bằng v&agrave; nghi&ecirc;m minh c&aacute;c h&agrave;nh vi vi phạm của c&aacute;n bộ, c&ocirc;ng chức, vi&ecirc;n chức, kể cả khi đ&atilde; chuyển c&ocirc;ng t&aacute;c hoặc nghỉ hưu.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"quoc-hoi-yeu-cau-lam-ro-vi-pham-cua-ong-vu-huy-hoang\" src=\"http://img.f29.vnecdn.net/2016/11/23/ky-thu-2-quoc-hoi-4930-1479103-5305-4580-1479869719.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Quốc hội ph&ecirc; ph&aacute;n cựu Bộ trưởng C&ocirc;ng Thương Vũ Huy Ho&agrave;ng. Ảnh minh họa: <em>Giang Huy</em></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Quốc hội cũng y&ecirc;u cầu rà soát, đánh giá t&ocirc;̉ng th&ecirc;̉ về thực trạng, mức đ&ocirc;̣ thi&ecirc;̣t hại, khẩn trương xử lý dứt điểm đ&ocirc;́i với các dự án thua lỗ, kém hi&ecirc;̣u quả, kh&ocirc;ng đ&ecirc;̉ tiếp tục kéo dài g&acirc;y thi&ecirc;̣t hại cho Nhà nước. Đồng thời, xác định rõ trách nhi&ecirc;̣m v&agrave; xử l&yacute; nghi&ecirc;m đối với c&aacute;c cơ quan, tổ chức, c&aacute; nh&acirc;n có sai phạm trong qu&aacute; tr&igrave;nh đầu tư.</p>\r\n\r\n<p>Trước đ&oacute;, nhiều đại biểu đ&atilde; chất vấn Bộ trưởng C&ocirc;ng Thương Trần Tuấn Anh về 5 dự &aacute;n ngh&igrave;n tỷ thua lỗ, nguy cơ ph&aacute; sản, gồm: Nh&agrave; m&aacute;y sản xuất xơ sợi Đ&igrave;nh Vũ; nh&agrave; m&aacute;y Nhi&ecirc;n liệu sinh học Bio-Ethanol Dung Quất; nh&agrave; m&aacute;y gang th&eacute;p Th&aacute;i Nguy&ecirc;n giai đoạn 2; nh&agrave; m&aacute;y bột giấy Phương Nam, tỉnh Long An; nh&agrave; m&aacute;y Đạm Ninh B&igrave;nh.</p>\r\n\r\n<p>Trong lĩnh vực t&agrave;i nguy&ecirc;n m&ocirc;i trường, Quốc hội y&ecirc;u cầu gi&aacute;m s&aacute;t chặt chẽ c&aacute;c t&aacute;c nh&acirc;n g&acirc;y &ocirc; nhiễm m&ocirc;i trường của dự &aacute;n Formosa H&agrave; Tĩnh, theo d&otilde;i v&agrave; c&oacute; biện ph&aacute;p phục hồi m&ocirc;i trường biển, thực hiện c&oacute; hiệu quả c&ocirc;ng t&aacute;c bồi thường, sớm ổn định sản xuất v&agrave; đời sống của người d&acirc;n trong v&ugrave;ng bị thiệt hại ở c&aacute;c tỉnh miền Trung.</p>\r\n\r\n<p>&quot;Bảo đảm thực hiện đầy đủ c&aacute;c cam kết của chủ dự &aacute;n trước khi đi v&agrave;o sản xuất&quot;, Nghị quyết n&ecirc;u r&otilde;.</p>\r\n\r\n<p>Phi&ecirc;n chất vấn của kỳ họp thứ 2, Quốc hội kh&oacute;a 14 diễn ra trong 2,5 ng&agrave;y (từ 15 đến s&aacute;ng 17/11), với 4 Bộ trưởng: C&ocirc;ng Thương; T&agrave;i nguy&ecirc;n M&ocirc;i trường; Gi&aacute;o dục Đ&agrave;o tạo; Nội vụ v&agrave; Thủ tướng đ&atilde; đăng đ&agrave;n.</p>\r\n', '1480921480-57355c1302b01f7898000001.jpg', 'a:1:{i:0;s:39:\"1480921480-57355c1302b01f7898000001.jpg\";}', '3', '7', null, '1', '1480921480');

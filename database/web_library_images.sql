/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : shopnew

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-06 15:37:17
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_library_images
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of web_video
-- ----------------------------
INSERT INTO `web_video` VALUES ('1', 'Khai thác quặng Quaczit trên sông chảy - Bảo Nhai - Bắc Hà - Lào Cai', 'khai-thac-quang-quaczit-tren-song-chay-bao-nhai-bac-ha-lao-cai', 'Khai thác quặng Quaczit trên sông chảy - Bảo Nhai - Bắc Hà - Lào Cai', '<p>Khai th&aacute;c quặng Quaczit tr&ecirc;n s&ocirc;ng chảy - Bảo Nhai - Bắc H&agrave; - L&agrave;o Cai</p>\r\n', 'https://www.youtube.com/watch?v=5eRaOPJqklg', '', '10-54-44-16-08-2016-426631.jpg', null, '1', '0', '1', '1470872365', '19', '1', '1471363174', 'Khai thác quặng Quaczit trên sông chảy - Bảo Nhai - Bắc Hà - Lào Cai', 'Khai thác quặng Quaczit trên sông chảy - Bảo Nhai - Bắc Hà - Lào Cai', 'Khai thác quặng Quaczit trên sông chảy - Bảo Nhai - Bắc Hà - Lào Cai');
INSERT INTO `web_video` VALUES ('2', 'Khai thác quặng đồng lộ thiên ', 'khai-thac-quang-dong-lo-thien', 'Khai thác quặng đồng lộ thiên ', '<p>Khai th&aacute;c quặng đồng lộ thi&ecirc;n</p>\r\n', 'https://www.youtube.com/watch?v=4LtujnxxOic', '11-51-17-16-08-2016-khai-thac-quang-dong-lo-thien.mp4', '11-02-14-16-08-2016-2.jpg', null, '1', '0', '1', '1471363334', '19', '1', '1471369027', 'Khai thác quặng đồng lộ thiên ', 'Khai thác quặng đồng lộ thiên ', 'Khai thác quặng đồng lộ thiên ');

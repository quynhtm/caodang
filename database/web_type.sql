/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : caodang

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-01-13 10:47:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for web_type
-- ----------------------------
DROP TABLE IF EXISTS `web_type`;
CREATE TABLE `web_type` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT '1',
  `type_title` varchar(255) DEFAULT NULL,
  `type_intro` text,
  `type_keyword` varchar(255) DEFAULT NULL COMMENT 'Từ khóa để sau: phân loại các hiển thị và nhóm danh mục cùng loại',
  `type_order_no` int(10) DEFAULT '0',
  `type_created` int(11) DEFAULT '0',
  `type_status` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_type
-- ----------------------------
INSERT INTO `web_type` VALUES ('18', '1', 'Kiểu tin tức', null, 'group_news', '2', '0', '1');
INSERT INTO `web_type` VALUES ('28', '1', 'Kiểu bài viết tĩnh', null, 'group_static', '3', '0', '1');

/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : caodang

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-01-13 10:59:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for web_category
-- ----------------------------
DROP TABLE IF EXISTS `web_category`;
CREATE TABLE `web_category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT '1',
  `category_parent_id` int(11) DEFAULT '0',
  `category_type_id` int(10) DEFAULT '0',
  `category_type_keyword` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `category_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `category_title_alias` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `category_intro` text COLLATE utf8_bin,
  `category_content` longtext COLLATE utf8_bin,
  `category_image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `category_menu` tinyint(2) DEFAULT '0',
  `category_menu_left` tinyint(2) DEFAULT NULL,
  `category_menu_content` tinyint(2) DEFAULT NULL,
  `category_created` int(10) DEFAULT NULL,
  `category_order_no` int(10) DEFAULT NULL,
  `category_status` tinyint(2) DEFAULT NULL,
  `meta_title` text COLLATE utf8_bin,
  `meta_keywords` text COLLATE utf8_bin,
  `meta_description` text COLLATE utf8_bin,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=522 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of web_category
-- ----------------------------

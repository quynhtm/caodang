/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : caodang

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-08 15:16:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for web_tab
-- ----------------------------
DROP TABLE IF EXISTS `web_tab`;
CREATE TABLE `web_tab` (
  `tab_id` int(10) NOT NULL AUTO_INCREMENT,
  `tab_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tab_order` smallint(5) unsigned DEFAULT '0',
  `tab_status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tab_id`),
  KEY `status` (`tab_status`) USING BTREE,
  KEY `id_parrent` (`tab_order`,`tab_status`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of web_tab
-- ----------------------------

-- ----------------------------
-- Table structure for web_tab_sub
-- ----------------------------
DROP TABLE IF EXISTS `web_tab_sub`;
CREATE TABLE `web_tab_sub` (
  `tab_sub_id` int(10) NOT NULL AUTO_INCREMENT,
  `tab_sub_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tab_parent_id` int(10) DEFAULT NULL,
  `tab_sub_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tab_sub_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tab_sub_order` smallint(5) unsigned DEFAULT '0',
  `tab_sub_status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tab_sub_id`),
  KEY `status` (`tab_sub_status`) USING BTREE,
  KEY `id_parrent` (`tab_sub_order`,`tab_sub_status`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of web_tab_sub
-- ----------------------------

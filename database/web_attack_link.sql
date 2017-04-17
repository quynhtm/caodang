/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : caodang

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-04-17 17:05:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for web_attack_link
-- ----------------------------
DROP TABLE IF EXISTS `web_attack_link`;
CREATE TABLE `web_attack_link` (
  `link_id` int(10) NOT NULL AUTO_INCREMENT,
  `link_title` varchar(255) DEFAULT NULL,
  `link_type` tinyint(2) DEFAULT NULL,
  `link_url` text,
  `link_order` int(10) DEFAULT '0',
  `link_status` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_attack_link
-- ----------------------------

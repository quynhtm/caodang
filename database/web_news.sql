/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : caodang

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-14 15:57:17
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_news
-- ----------------------------
INSERT INTO `web_news` VALUES ('1', 'tin tức hàng ngày', 'Hôm nay (5/12) sẽ là thời điểm điều chỉnh giá xăng dầu của chu kỳ mới. Theo dữ liệu giá thành phẩm trên thị trường Singapore được Bộ Công Thương công bố, bình quân giá xăng RON 92 ở mức 58 USD một thùng, tăng 5,4% so với chu kỳ trước (55 USD một thùng). Đáng chú ý, những ngày gần đây giá xăng tăng lên gần 60 USD một thùng.', '<p>H&ocirc;m nay (5/12) sẽ l&agrave; thời điểm điều chỉnh gi&aacute; xăng dầu của chu kỳ mới.&nbsp;Theo dữ liệu gi&aacute; th&agrave;nh phẩm tr&ecirc;n thị trường Singapore được Bộ C&ocirc;ng&nbsp;Thương c&ocirc;ng bố, b&igrave;nh qu&acirc;n gi&aacute; xăng RON 92 ở mức 58 USD một th&ugrave;ng, tăng 5,4% so với chu kỳ trước (55 USD một th&ugrave;ng). Đ&aacute;ng ch&uacute; &yacute;, những ng&agrave;y gần đ&acirc;y gi&aacute; xăng tăng l&ecirc;n gần 60 USD một th&ugrave;ng.</p>\r\n\r\n<p>Chia sẻ với <em>VnExpress</em>, nhiều doanh nghiệp đầu mối ở TP HCM cho biết, những ng&agrave;y qua gi&aacute; xăng thế giới lại tiếp tục tăng, do vậy tại chu kỳ điều chỉnh mới xăng sẽ đứng trước &aacute;p lực tăng gi&aacute; mạnh.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"xang-co-the-tang-gia-manh-hom-nay\" src=\"http://img.f25.kinhdoanh.vnecdn.net/2016/12/04/xang-6751-1480822899.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Gi&aacute; xăng c&oacute; thể tăng mạnh ng&agrave;y mai theo gi&aacute; thế giới.&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>L&atilde;nh đạo 2 doanh nghiệp đầu mối ở TP HCM cho biết, cơ quan quản l&yacute; c&oacute; thể kết hợp song song biện ph&aacute;p vừa sử dụng quỹ b&igrave;nh ổn vừa tăng gi&aacute;. Đối với trường hợp n&agrave;y, gi&aacute; xăng c&oacute; thể chỉ tăng quanh mức 200-400 đồng một l&iacute;t v&agrave; gi&aacute; dầu cũng được điều chỉnh tăng ở mức tương tự.</p>\r\n\r\n<p>&ldquo;B&ecirc;n cạnh đ&oacute;, nếu cơ quan quản l&yacute; kh&ocirc;ng sử dụng quỹ b&igrave;nh ổn th&igrave; gi&aacute; xăng c&oacute; thể tăng 500-600 đồng một l&iacute;t. Đ&acirc;y cũng l&agrave; kỳ điều chỉnh khiến gi&aacute; b&aacute;n lẻ c&oacute; thể quay về mốc của kỳ điều chỉnh đầu th&aacute;ng 11&rdquo;, l&atilde;nh đạo doanh nghiệp đầu mối ở Thủ Đức n&oacute;i.</p>\r\n\r\n<p>Tại kỳ điều chỉnh trước, gi&aacute; cơ sở mỗi l&iacute;t xăng RON 92 được y&ecirc;u cầu giảm 521 đồng, khiến gi&aacute; b&aacute;n lẻ kh&ocirc;ng được cao hơn 16.371 đồng. Xăng E5 giảm 355 đồng, xuống mức tối đa l&agrave; 16.221 đồng một l&iacute;t. Gi&aacute; dầu diesel cũng giảm 514 đồng, trong khi dầu hỏa v&agrave; mad&uacute;t lần lượt giảm 578 v&agrave; 373 đồng một l&iacute;t, kg.</p>\r\n\r\n<p>Từ đầu năm đến nay, mặt h&agrave;ng n&agrave;y trải qua 21 lần điều chỉnh, với 11 lần tăng v&agrave; 10 lần giảm.</p>\r\n', '2', '2', null, '1480910791-573cb4258e810763aa000001.jpg', 'a:8:{i:0;s:39:\"1487061792-573cb4258e810763aa000001.jpg\";i:1;s:39:\"1487061800-57355c1302b01f7898000001.jpg\";i:2;s:46:\"1487061800-946717743789938968592831120266n.jpg\";i:3;s:29:\"1487061800-957158d02c3c80.jpg\";i:4;s:47:\"1487061800-5765685797948854094221412382588n.jpg\";i:5;s:29:\"1487061800-9572042c1a3f27.jpg\";i:6;s:58:\"1487061800-131027889420768959100431436571395761168472n.jpg\";i:7;s:59:\"1487061800-1323299717367536732369379167136563154391026n.jpg\";}', '0', '1', '3', '1', '1', '1480910791');
INSERT INTO `web_news` VALUES ('2', 'dang test 333', 'Trong thời gian hồ thủy lợi Phú Ninh (Quảng Nam) xả lũ, nhiều người dùng lưới chắn phía trên cống đón cá mè chui vào lồng và bắt được 2-3 tấn/ngày.', '<p>Ng&agrave;y 23/11, với tr&ecirc;n 95% đại biểu t&aacute;n th&agrave;nh, Quốc hội đ&atilde; th&ocirc;ng qua Nghị quyết về chất vấn v&agrave; trả lời chất vấn tại kỳ họp thứ 2, Quốc hội kh&oacute;a 14.</p>\r\n\r\n<p>Theo đ&oacute;, Quốc hội ph&ecirc; ph&aacute;n nghi&ecirc;m khắc &ocirc;ng Vũ Huy Ho&agrave;ng, Bộ trưởng C&ocirc;ng Thương nhiệm kỳ 2011-2016, do đ&atilde; c&oacute; những vi phạm về c&ocirc;ng t&aacute;c c&aacute;n bộ trong thời gian đảm nhiệm chức vụ n&ecirc;u tr&ecirc;n, g&acirc;y hậu quả nghi&ecirc;m trọng, ảnh hưởng xấu đến uy t&iacute;n của Đảng, Nh&agrave; nước, Bộ C&ocirc;ng Thương, g&acirc;y bức x&uacute;c trong x&atilde; hội.</p>\r\n\r\n<p>Quốc hội giao Ủy ban Thường vụ Quốc hội, Ch&iacute;nh phủ, c&aacute;c cơ quan bảo vệ ph&aacute;p luật tiếp tục l&agrave;m r&otilde; v&agrave; xử l&yacute; theo quy định của ph&aacute;p luật những vi phạm của cựu Bộ trưởng Vũ Huy Ho&agrave;ng. Đồng thời, tăng cường c&ocirc;ng t&aacute;c gi&aacute;m s&aacute;t, quản l&yacute; c&aacute;n bộ; tạo cơ sở ph&aacute;p l&yacute; đồng bộ để xử l&yacute; c&ocirc;ng bằng v&agrave; nghi&ecirc;m minh c&aacute;c h&agrave;nh vi vi phạm của c&aacute;n bộ, c&ocirc;ng chức, vi&ecirc;n chức, kể cả khi đ&atilde; chuyển c&ocirc;ng t&aacute;c hoặc nghỉ hưu.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"quoc-hoi-yeu-cau-lam-ro-vi-pham-cua-ong-vu-huy-hoang\" src=\"http://img.f29.vnecdn.net/2016/11/23/ky-thu-2-quoc-hoi-4930-1479103-5305-4580-1479869719.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Quốc hội ph&ecirc; ph&aacute;n cựu Bộ trưởng C&ocirc;ng Thương Vũ Huy Ho&agrave;ng. Ảnh minh họa: <em>Giang Huy</em></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Quốc hội cũng y&ecirc;u cầu rà soát, đánh giá t&ocirc;̉ng th&ecirc;̉ về thực trạng, mức đ&ocirc;̣ thi&ecirc;̣t hại, khẩn trương xử lý dứt điểm đ&ocirc;́i với các dự án thua lỗ, kém hi&ecirc;̣u quả, kh&ocirc;ng đ&ecirc;̉ tiếp tục kéo dài g&acirc;y thi&ecirc;̣t hại cho Nhà nước. Đồng thời, xác định rõ trách nhi&ecirc;̣m v&agrave; xử l&yacute; nghi&ecirc;m đối với c&aacute;c cơ quan, tổ chức, c&aacute; nh&acirc;n có sai phạm trong qu&aacute; tr&igrave;nh đầu tư.</p>\r\n\r\n<p>Trước đ&oacute;, nhiều đại biểu đ&atilde; chất vấn Bộ trưởng C&ocirc;ng Thương Trần Tuấn Anh về 5 dự &aacute;n ngh&igrave;n tỷ thua lỗ, nguy cơ ph&aacute; sản, gồm: Nh&agrave; m&aacute;y sản xuất xơ sợi Đ&igrave;nh Vũ; nh&agrave; m&aacute;y Nhi&ecirc;n liệu sinh học Bio-Ethanol Dung Quất; nh&agrave; m&aacute;y gang th&eacute;p Th&aacute;i Nguy&ecirc;n giai đoạn 2; nh&agrave; m&aacute;y bột giấy Phương Nam, tỉnh Long An; nh&agrave; m&aacute;y Đạm Ninh B&igrave;nh.</p>\r\n\r\n<p>Trong lĩnh vực t&agrave;i nguy&ecirc;n m&ocirc;i trường, Quốc hội y&ecirc;u cầu gi&aacute;m s&aacute;t chặt chẽ c&aacute;c t&aacute;c nh&acirc;n g&acirc;y &ocirc; nhiễm m&ocirc;i trường của dự &aacute;n Formosa H&agrave; Tĩnh, theo d&otilde;i v&agrave; c&oacute; biện ph&aacute;p phục hồi m&ocirc;i trường biển, thực hiện c&oacute; hiệu quả c&ocirc;ng t&aacute;c bồi thường, sớm ổn định sản xuất v&agrave; đời sống của người d&acirc;n trong v&ugrave;ng bị thiệt hại ở c&aacute;c tỉnh miền Trung.</p>\r\n\r\n<p>&quot;Bảo đảm thực hiện đầy đủ c&aacute;c cam kết của chủ dự &aacute;n trước khi đi v&agrave;o sản xuất&quot;, Nghị quyết n&ecirc;u r&otilde;.</p>\r\n\r\n<p>Phi&ecirc;n chất vấn của kỳ họp thứ 2, Quốc hội kh&oacute;a 14 diễn ra trong 2,5 ng&agrave;y (từ 15 đến s&aacute;ng 17/11), với 4 Bộ trưởng: C&ocirc;ng Thương; T&agrave;i nguy&ecirc;n M&ocirc;i trường; Gi&aacute;o dục Đ&agrave;o tạo; Nội vụ v&agrave; Thủ tướng đ&atilde; đăng đ&agrave;n.</p>\r\n', null, '2', null, '1480921480-57355c1302b01f7898000001.jpg', null, '0', '1', '2', '1', '1', '1480921480');

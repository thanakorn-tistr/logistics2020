-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `registration`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `member`
-- 

CREATE TABLE `member` (
  `user_id` int(20) NOT NULL auto_increment,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `status` enum('USER','ADMIN') NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `member`
-- 

INSERT INTO `member` VALUES (1, 'pvs', '25131970', 'Patharawut', 'Saengsiri', 'pvs@tistr.or.th', '35 Moo 3 Technotanee ', '08-2492-5795', 'USER');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `roster`
-- 

CREATE TABLE `roster` (
  `ros_id` int(11) NOT NULL auto_increment,
  `ros_ref` varchar(10) collate utf8_unicode_ci default NULL COMMENT 'เลขอ้างอิง',
  `ros_title` varchar(20) collate utf8_unicode_ci default NULL COMMENT 'คำนำหน้า',
  `ros_name` text collate utf8_unicode_ci,
  `ros_surname` text collate utf8_unicode_ci,
  `ros_position` text collate utf8_unicode_ci COMMENT 'ตำแหน่ง',
  `ros_organization` text collate utf8_unicode_ci COMMENT 'องค์กร',
  `ros_tel` varchar(50) collate utf8_unicode_ci default NULL,
  `ros_fax` varchar(50) collate utf8_unicode_ci default NULL,
  `ros_mobile` varchar(12) collate utf8_unicode_ci default NULL,
  `ros_email` text collate utf8_unicode_ci,
  `ros_time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `datein` varchar(5) collate utf8_unicode_ci NOT NULL,
  `seminar` varchar(100) collate utf8_unicode_ci NOT NULL,
  `valid` int(2) NOT NULL,
  `pass` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`ros_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- dump ตาราง `roster`
-- 

INSERT INTO `roster` VALUES (17, 'mem0009785', '', 'Trerasak', 'Talumpusut', 'Service Manager ', 'DataExtreme Co.,Ltd', '025309140', '025309141', '0624594914', 'trerasak.talumpusut@dataextreme.co.th', '2016-11-08 00:37:36', '', '', 0, '');
INSERT INTO `roster` VALUES (18, 'mem0004836', '', 'Tidarat', 'Nansing', 'Government Officer', 'NSO', '021417406', '02', '0614169923', 'tdarat@gmail.com', '2016-11-08 00:44:51', '', '', 1, '');
INSERT INTO `roster` VALUES (20, 'mem0004056', '', 'ปกรณพัฒน์', 'สุพานิช', 'System Analyst', 'One to One Contacts Public co. Ltd.', '', '', '0835454274', 'pakornpat.s@oto.samartcorp.com', '2016-11-08 01:03:53', '', '', 0, '');
INSERT INTO `roster` VALUES (25, 'mem0003986', '', 'Woravit', 'Pisarnjunthakoon', 'System Analyst', 'dtac', '0816550598', '', '0816550598', 'woravitp@dtac.co.th', '2016-11-08 02:13:14', '', '', 0, '');
INSERT INTO `roster` VALUES (26, 'mem0005138', '', 'Thitima', 'Tularak', 'System Analyst', 'dtac', '0944873679', '', '0944873679', 'thitima.tularak@dtac.co.th', '2016-11-08 02:13:47', '', '', 1, '');
INSERT INTO `roster` VALUES (29, 'mem0008129', '', 'วงศกร', 'ปรีดานันต์', 'นัหศึกษา', 'SIIT ', '', '', '0944120777', 'job.preedanan@gmail.com', '2016-11-08 02:22:33', '', '', 0, '');
INSERT INTO `roster` VALUES (32, 'mem0003941', '', 'พงษ์เทพ', 'ประกอบบุญ', '-', '-', '', '', '0814509880', 'phongthp@hotmail.com', '2016-11-08 02:41:20', '', '', 0, '');
INSERT INTO `roster` VALUES (34, 'mem0006235', '', 'วัชราภรณ์', 'ทาระปัญญา', 'Digital Campaign Analyst ', 'Nok Airlines Public Company Limited', '0882682417', '', '0882682417', 'watcharaporn.tar@nokair.com', '2016-11-08 02:48:26', '', '', 0, '');
INSERT INTO `roster` VALUES (36, 'mem0003974', '', 'อริสา', 'พูนศรี', 'นักศึกษา', 'kmutt', '', '', '0922637478', 'msarisapim@gnail.com', '2016-11-08 02:55:21', '', '', 0, '');
INSERT INTO `roster` VALUES (37, 'mem0007193', '', 'ธนัท', 'ศิวสิริสกุล', 'CTO', 'Datasense (Thailand) co.,ltd.', '', '', '0888979975', 'datasense.jim@gmail.com', '2016-11-08 03:14:55', '', '', 0, '');
INSERT INTO `roster` VALUES (40, 'mem0009360', '', 'นฤมล', 'หวังอัมพา', 'Senior Programmer', 'Group M', '0865153112', '', '0865153112', 'namtaohoo@gmail.com', '2016-11-08 03:32:00', '', '', 0, '');
INSERT INTO `roster` VALUES (43, NULL, NULL, 'ชาญชัย', 'ผึ่งผาย', NULL, 'Thai Name Server Co.,Ltd', NULL, NULL, NULL, 'chanchai@thains.co.th', '2016-11-16 03:32:00', '', '', 0, '');
INSERT INTO `roster` VALUES (45, NULL, NULL, 'ศราวุฒิ', 'โคตรชา', NULL, 'ธกส.', '0894494692', NULL, NULL, 'sarawut.kot@baac.or.th', '2016-11-16 04:39:21', '', '', 0, '');
INSERT INTO `roster` VALUES (47, 'mem0007392', '', 'วาทินี', 'นุ้ยเพียร', 'อาจารย์', 'มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ', '', '', '0834267259', 'vtn@kmutnb.ac.th', '2016-11-16 07:59:09', '', '', 0, '');
INSERT INTO `roster` VALUES (48, 'mem0009752', '', 'พิลาพรรณ', '  โพธิ์นรินทร์', 'อาจารย์', 'มหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ', '', '', '0879777959', 'pilapanp@hotmail.com', '2016-11-16 08:05:51', '', '', 0, '');
INSERT INTO `roster` VALUES (49, 'mem0007290', '', 'มาลีรัตน์', 'โสดานิล', 'อาจารย์', 'มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ', '', '', '0942417419', 'maleerat.s@it.kmutnb.ac.th', '2016-11-16 08:09:36', '', '', 0, '');
INSERT INTO `roster` VALUES (50, 'mem0009875', '', 'ดวงกมล', 'โพธิ์นาค', 'อาจารย์', 'มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหลือ', '0863529289', '', '0863529289', 'tantawan_ple@hotmail.com', '2016-11-16 08:10:16', '', '', 0, '');
INSERT INTO `roster` VALUES (51, 'mem0006945', '', 'ฐิติพงศ์', 'ธรรมวิสุทธิ์', 'พนักงานเอกชน', 'บริษัทเน็กคอป', '', '', '0822452329', 'a.apple2013@gmail.com', '2016-11-16 08:21:55', '', '', 0, '');
INSERT INTO `roster` VALUES (52, 'mem0009734', '', 'กิตติพงศ์', 'กลิ่นจันทร์', 'อาจารย์', 'มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี', '025494137', '025494137', '0894109092', 'kittipongklinjan@gmail.com', '2016-11-16 10:51:31', '', '', 1, '');
INSERT INTO `roster` VALUES (53, 'mem0007580', '', 'ผศ.ดร.วันทะนี', 'ประจวบศุภกิจ', '-', 'มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี', '', '', '-', '', '2016-11-16 11:03:54', '', '', 0, '');
INSERT INTO `roster` VALUES (55, 'mem0001794', '', 'สุภาพร', 'นนทนำ', 'อาจารย์', 'Rmu', '', '', '', '', '2016-11-16 13:09:31', '', '', 0, '');
INSERT INTO `roster` VALUES (56, 'mem0000573', '', 'นงลักษณ์', 'พรมทอง', 'อาจารย์', 'คณะวิทยาศาสตร์และเทคโนโลยี  ม.เทคโนโลยีราชมงคลธัญบุรี', '025494194-5', '025494195', '0863329036', 'nongluk@mail.rmutt.ac.th', '2016-11-16 14:13:03', '', '', 0, '');
INSERT INTO `roster` VALUES (57, NULL, NULL, 'ดร.บุรัสกร', 'อยู่สุข', 'อาจารย์', 'คณะวิทยาศาสตร์และเทคโนโลยี มทร.ธัญบุรี', NULL, NULL, NULL, NULL, '2016-11-16 08:21:55', '', '', 0, '');
INSERT INTO `roster` VALUES (58, NULL, NULL, 'เอกรัฐ', 'หล่อพิเชียร', 'อาจารย์', 'ม.เทคโนโลยีราชมงคลธัญบุรี', NULL, NULL, NULL, NULL, '2016-11-07 22:57:37', '', '', 0, '');
INSERT INTO `roster` VALUES (59, NULL, NULL, 'นิรุตติ์', 'พองาม', 'อาจารย์', 'ม.เทคโนโลยีราชมงคลธัญบุรี', NULL, NULL, NULL, NULL, '2016-11-07 22:57:37', '', '', 0, '');
INSERT INTO `roster` VALUES (60, NULL, NULL, 'ธัญญาภรณ์', 'บุญยัง', 'อาจารย์', 'ม.เทคโนโลยีราชมงคลธัญบุรี', NULL, NULL, NULL, NULL, '2016-11-07 22:57:37', '', '', 0, '');
INSERT INTO `roster` VALUES (61, NULL, NULL, 'รวีชัย', 'จักรพิสุทธิ์', 'supervisor', 'True operation', '026159231', NULL, '', 'raveechai_jak@truecorp.co.th ', '2016-11-16 08:21:55', '', '', 0, '');
INSERT INTO `roster` VALUES (62, NULL, NULL, 'ปิยวิทย์', 'บุรินทร์สุชาติ', 'supervisor', 'True operation', '026159234', NULL, NULL, 'piyavit_Bur@truecorp.co.th', '2016-11-16 08:21:55', '', '', 0, '');
INSERT INTO `roster` VALUES (63, NULL, NULL, 'อัคร์วัฒน์', 'ศรีพรหมมา', 'supervisor', 'True operation', NULL, NULL, NULL, 'akarawat_Sri@truecorp.co.th ', '2016-11-16 08:21:55', '', '', 0, '');
INSERT INTO `roster` VALUES (64, 'mem0009260', '', 'วิษณุ', 'เรืองวิทยานนท์', 'นักเทคโนโลยีสารสนเทศ', 'สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย', '025779357', '025779353', '0896800608', 'pvs@tistr.or.th', '2017-04-05 09:16:25', '12', 'RMB&RBI', 0, '');

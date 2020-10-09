-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.1.33
-- รุ่นของ PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `registration`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `doc`
--

CREATE TABLE IF NOT EXISTS `doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(255) NOT NULL,
  `file_upload` varchar(255) NOT NULL,
  `seminar` varchar(50) NOT NULL,
  `flag` varchar(10) NOT NULL,
  `sorted` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- dump ตาราง `doc`
--

INSERT INTO `doc` (`id`, `doc_name`, `file_upload`, `seminar`, `flag`, `sorted`) VALUES
(1, 'test4', '20170416090224-0.pdf', 'RMB&RBI', '0', 0),
(2, 'test2', '20170417024319-0.pdf', 'Food', '0', 0),
(3, 'Link สมัคร', '20170418094437-0.pdf', 'RMB&RBI', '0', 0),
(4, 'Link สมัคร', '20170418094633-0.pdf', 'RMB&RBI', '0', 0),
(5, 'Agenda RBI&RBM', '20170504100158-0.pdf', 'RMB&RBI', '0', 0),
(6, 'Agenda_FoodSafety', '20170509092414-0.pdf', 'Foodsafety', '0', 0),
(7, 'test1', '20170602030732-0.pdf', 'RMB&RBI', '0', 0),
(8, 'test1', '20170602033345-0.pdf', 'Food', '0', 0),
(9, 'Agenda', '20170602072137-0.pdf', 'Foodsafety', '0', 0),
(10, 'Annocement', '20170603084517-0.pdf', 'RMB&RBI', '1', 0),
(11, 'Agenda RBI&RBM', '20170605114659-0.pdf', 'RMB&RBI', '0', 0),
(12, '[Abstract] From Fuctional Agriculture to Functional Foods: A Ten year research and practice of functional agriculture in China - Prof. Dr. Xuebin Yin', '20170608091511-0.pdf', 'Food', '1', 0),
(13, '[Presentation] From Fuctional Agriculture to Functional Foods: A Ten year research and practice of functional agriculture in China - Prof. Dr. Xuebin Yin', '20170608091705-0.pdf', 'Food', '1', 0),
(14, '[Presentation] Food Innopolis - Asst. Prof. Dr. Akkharawit Kanjana-Opas', '', 'Food', '0', 0),
(15, '[Presentation] Food Innopolis - Asst. Prof. Dr. Akkharawit Kanjana-Opas', '20170608092336-0.pdf', 'Food', '1', 0),
(16, 'From Local to Global Success Case 2 : Mighty Taste Innovation Makes "Local Ingredients to Global Food" - Mrs. Watchareekul Rattananupap', '20170608092916-0.pdf', 'Food', '1', 0),
(17, '[Abstract] Herbal Ingredient and Product Trends in Taiwan - Dr. Tony J. Fang', '20170608093037-0.pdf', 'Food', '1', 0),
(18, '[Presentation] Herbal Ingredient and Product Trends in Taiwan - Dr. Tony J. Fang', '20170608093144-0.pdf', 'Food', '1', 0),
(19, '[Abstract] Functional Food and Dietary Supplement Trends in Japan - Prof. Dr. Shizuo Yamada', '20170608094203-0.pdf', 'Food', '1', 0),
(20, '[Abstract] Advanced Technology in Functional Food and Dietary Supplement - Prof. Dr. Yoshihiro Ohmiya', '20170608094712-0.pdf', 'Food', '1', 0),
(21, '[Presentation] Advanced Technology in Functional Food and Dietary Supplement - Prof. Dr. Yoshihiro Ohmiya', '20170608094901-0.pdf', 'Food', '1', 0),
(22, 'Growth Opportunity for SMEs in Thai Dietary Supplement Industry - Mr. Nakah Thawichawatt', '20170608095522-0.pdf', 'Food', '1', 0),
(23, '[CV] Mr. Nakah Thawichawatt [English]', '20170608095747-0.pdf', 'Food', '1', 0),
(24, '[CV] Mr. Nakah Thawichawatt [Thai]', '20170608095806-0.pdf', 'Food', '1', 0),
(25, '[Abstract] Marketing Strategy for SMEs towards Food Industry 4.0 - Asst. Prof. Dr. Buppa Lapawattanaphun', '20170608095954-0.pdf', 'Food', '1', 0),
(26, '[Presentation] Marketing Strategy for SMEs towards Food Industry 4.0 - Asst. Prof. Dr. Buppa Lapawattanaphun', '20170608100011-0.pdf', 'Food', '1', 0),
(27, 'Greenday Global as Successful Thai Food Company - Mr. Chairat Kongsuphamanon', '20170608100233-0.pdf', 'Food', '1', 0),
(28, '[Presentation] Development of Food Safety in Japan - Ms. Setsuko Sakao', '20170608102408-0.pdf', 'Foodsafety', '1', 0),
(29, '[CV] Ms. Setsuko Sakao', '20170608102449-0.pdf', 'Foodsafety', '1', 0),
(30, '[Presentation] Do you even HILIC? Latest Shodex polymer-based HILIC HPLC columns for Food-related Analysis - Mr. Jamie Tan', '20170608103022-0.pdf', 'Foodsafety', '1', 0),
(31, '[CV] Mr. Jamie Tan', '20170608103041-0.pdf', 'Foodsafety', '1', 0),
(32, '[Presentation] Analytics Package to Control Residual Pesticides and Mycotoxins in Food Using Chromatography Technologies - Mr. Yuichi Yotsuyanagi', '20170608103647-0.pdf', 'Foodsafety', '1', 0),
(33, '[CV] Mr. Yuichi Yotsuyanagi', '20170608103719-0.pdf', 'Foodsafety', '1', 0),
(34, '[Presentation] Extend Capability of Food Quality Control by Fast Analytical Instrument - Mr. Chutchai Juntasaro', '20170608104931-0.pdf', 'Foodsafety', '1', 0),
(36, '[CV] Mr. Chutchai Juntasaro', '20170608104951-0.pdf', 'Foodsafety', '1', 0),
(37, '[Presentation] Application to Halal Foods by Thermal Analysis - Dr. Tadashi Arii', '20170608105256-0.pdf', 'Foodsafety', '1', 0),
(38, '[CV] Dr. Tadashi Arii', '20170608105314-0.pdf', 'Foodsafety', '1', 0),
(39, '[Presentation] Metrology of Food Safety - Dr. Kazumi Inagaki', '20170608105533-0.pdf', 'Foodsafety', '1', 0),
(40, '[CV] Dr. Kazumi Inagaki', '20170608105910-0.pdf', 'Foodsafety', '1', 0),
(41, '[Presentation] National Quality Infrastructure (NQI) for Food Safety : Role of TISTR - Dr. Jittra Chaivimol', '20170608012446-0.pdf', 'Foodsafety', '1', 0),
(42, '[CV] Dr. Jittra Chaivimol', '20170608012526-0.pdf', 'Foodsafety', '1', 0),
(43, '[Abstract] RBI: Key Elements of Modern International Practice - Dr. Brian Cane CEng', '20170608020801-0.pdf', 'RMB&RBI', '1', 1),
(44, '[Presentation] RBI: Key Elements of Modern International Practice - Dr. Brian Cane CEng', '20170608020846-0.pdf', 'RMB&RBI', '1', 2),
(45, '[Abstract] Introduction of RBM for thermal power plant using software (uni-Planner) executed by Japanese senior bioler engineers team - Dr. Shigemitsu Kihara', '20170608021047-0.pdf', 'RMB&RBI', '1', 3),
(46, '[Presentation] Introduction of RBM for thermal power plant using software (uni-Planner) executed by Japanese senior bioler engineers team - Dr. Shigemitsu Kihara', '20170608021110-0.pdf', 'RMB&RBI', '1', 4),
(79, '[Abstract] Maintenance Excellence - Dr. Gundula Stadie', '20170608021509-0.pdf', 'RMB&RBI', '1', 5),
(48, '[Abstract] How RBI can help to improve integrity of pressure equipment - Mr. Kornnasate Pitiariyanan', '20170608021707-0.pdf', 'RMB&RBI', '1', 7),
(49, '[Abstract] "Facility Life Assessment" to "Asset Life Assessment" - Mr. Jonathan Cook', '20170608021900-0.pdf', 'RMB&RBI', '1', 8),
(50, '[Presentation] Food Safety : Care for Customers and Society - Ms. Pornpen Nartpiriyarat', '20170608023156-0.pdf', 'Foodsafety', '1', 0),
(51, '[CV] Ms. Pornpen Nartpiriyarat', '20170608023219-0.pdf', 'Foodsafety', '1', 0),
(35, '[Presentation2] Extend Capability of Food Quality Control by Fast Analytical Instrument - Mr. Chutchai Juntasaro', '20170608023342-0.pdf', 'Foodsafety', '1', 0),
(53, 'Thailand 4.0 : From Local to Global - H.E. Dr. Atchaka Sibunruang', '20170609014115-0.pdf', 'Food', '1', 0),
(54, '[Presentation] Growth Opportunity for SMEs in Thai Dietary Supplement Industry - Mr. Nakah Thawichawatt', '20170609015653-0.pdf', 'Food', '1', 0),
(55, '[Abstract] Challenge of establish of Japan style RBM/RBI - Prof. Dr. Eng. Masatoshi Kubouchi', '20170609021535-0.pdf', 'RMB&RBI', '1', 9),
(56, '[Abstract] The Risk Assessment Method for UT Inspection for FRP Equipment in Chemical Plants Based on Case Studies - Prof. Dr. Eng. Masatoshi Kubouchi', '20170609021642-0.pdf', 'RMB&RBI', '1', 10),
(57, '[Abstract] Case Study : Removing Redundant Pipeline Inspection Program after RBI and Key to Success - Mr. Thalerngsak Trachoo', '20170609021833-0.pdf', 'RMB&RBI', '1', 11),
(58, '[Presentation] Case Study : Risk Based Inspection of Coal Fired Power Plant Components - Dr. Duangporn Ounpanich', '20170609023551-0.pdf', 'RMB&RBI', '0', 0),
(59, '[Presentation2] Case Study : Risk Based Inspection of Coal Fired Power Plant Components - Dr. Duangporn Ounpanich', '20170609023612-0.pdf', 'RMB&RBI', '0', 0),
(60, '[Presentation] TISTR towards Food Industry 4.0 - Dr. Luxsamee Plangsangmas', '20170609044529-0.pdf', 'Food', '1', 0),
(61, 'OpeningRemarks_and_Keynote_Local_Global_TISTR_Forum', '20170610123509-0.pdf', 'Food', '0', 0),
(62, 'Overview of Power Plant RBI: Technology and Method - Prof. Kee Bong Yoon', '', 'RMB&RBI', '0', 0),
(63, '[Presentation] Overview of Power Plant RBI: Technology and Method - Prof. Kee Bong Yoon', '20170612031008-0.pdf', 'RMB&RBI', '0', 0),
(64, '[Presentation] Residual Life and Failure Risk Management of Reformer Tubes in Petrochemical Plants - Mr. Jong Min Yu', '20170612031202-0.pdf', 'RMB&RBI', '1', 12),
(65, '[Presentation] Overview of Power Plant RBI: Technology and Method - Prof. Kee Bong Yoon', '20170612031248-0.pdf', 'RMB&RBI', '1', 13),
(66, 'Opening Remarks and Keynote Address on "Thailand 4.0: From Local to Global" - H.E. Dr. Atchaka Sibunruang', '20170613062702-0.pdf', 'Food', '1', 0),
(67, 'Duangporn_RBI', '20170613073932-0.pdf', 'RMB&RBI', '0', 0),
(68, 'Presentation_Case study: Risk Based Inspection of Coal-fired Power Plant Components', '20170613074320-0.pdf', 'RMB&RBI', '0', 0),
(72, '[Presentation] Case study: Risk Based Inspection of Coal-fired Power Plant Components - Duangporn Ounpanich', '20170613074424-0.pdf', 'RMB&RBI', '1', 14),
(70, '[Presentation] Role of WAITRO to Support R&D for Food Safety - Dr. Rohani Hashim', '20170613114346-0.pdf', 'Foodsafety', '1', 0),
(71, '[CV] Dr. Rohani Hashim', '20170613114440-0.pdf', 'Foodsafety', '1', 0),
(73, '[Presentation] Case study on the problem of CFB boiler tube erosion and unbalanced fludizing - Mr. Jae Yun Cho', '20170619024837-0.pdf', 'RMB&RBI', '1', 15),
(80, '[Presentation] Maintenance Excellence - Dr. Gundula Stadie', '20170619024949-0.pdf', 'RMB&RBI', '1', 6),
(74, '[Presentation] RBI Key Elements of Modern International Practice - Dr. Brian Cane CEng', '20170619025030-0.pdf', 'RMB&RBI', '1', 16),
(75, '[Presentation] Safety Policy for Thai Industry and Perspective for RBIRBM - Mr.  Panotson Sujayanont', '20170619025108-0.pdf', 'RMB&RBI', '1', 17),
(76, '[Abstract] Risk-Based Inspection and Maintenance HRSG in Combined Cycle Plant -Mr. Sayan Pansang', '20170619025217-0.pdf', 'RMB&RBI', '1', 18),
(77, '[Presentation] Risk-Based Inspection and Maintenance HRSG in Combined Cycle Plant -Mr. Sayan Pansang', '20170619025241-0.pdf', 'RMB&RBI', '1', 19),
(78, '[Presentation] Case Study  Removing Redundant Pipeline Inspection Program after RBI and Key to Success - Mr. Thalerngsak Trachoo', '20170619025314-0.pdf', 'RMB&RBI', '1', 11);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `status` enum('USER','ADMIN','REG') NOT NULL,
  `ros_id` int(10) NOT NULL,
  `seminar` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- dump ตาราง `member`
--

INSERT INTO `member` (`user_id`, `user_name`, `password`, `name`, `surname`, `email`, `address`, `tel`, `status`, `ros_id`, `seminar`) VALUES
(1, 'tistr', 'tistr54', 'TISTR', 'STAFF', 'pvs@tistr.or.th', '35 Moo 3 Technotanee ', '08-2492-5795', 'REG', 0, ''),
(5, 'chalermchai_s@tistr.or.th', 'tistr54321', '', '', '', '', '', 'REG', 0, ''),
(4, 'wisanu', '123', 'วิษณุ13', 'เรืองวิทยานนท์', '', '', '', 'USER', 64, 'Food'),
(7, 'rmbrmi', '123456', '', '', '', '', '', 'ADMIN', 0, ''),
(9, 'foodindustry', 'food123', '', '', '', '', '', 'ADMIN', 0, ''),
(11, 'pornnapa', 'pornnapa123', 'พรนภา', 'เรืองจรูญ', '', '', '', 'USER', 67, 'Food'),
(12, 'Rumpai', '123', '', '', '', '', '', 'USER', 97, 'Foodsafety'),
(13, 'foodsafety', 'food456', '', '', '', '', '', 'ADMIN', 0, ''),
(14, 'aaa', '123456', 'aaa8', 'aaa', '', '', '', 'USER', 92, 'TISTR54');
-- --------------------------------------------------------

--
-- โครงสร้างตาราง `roster`
--

CREATE TABLE IF NOT EXISTS `roster` (
  `ros_id` int(11) NOT NULL AUTO_INCREMENT,
  `ros_ref` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เลขอ้างอิง',
  `ros_title` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'คำนำหน้า',
  `ros_name` text COLLATE utf8_unicode_ci,
  `ros_surname` text COLLATE utf8_unicode_ci,
  `ros_position` text COLLATE utf8_unicode_ci COMMENT 'ตำแหน่ง',
  `ros_organization` text COLLATE utf8_unicode_ci COMMENT 'องค์กร',
  `ros_tel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ros_fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ros_mobile` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ros_email` text COLLATE utf8_unicode_ci,
  `ros_time` datetime NOT NULL,
  `datein` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `seminar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valid` int(2) NOT NULL,
  `pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `memo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `arrived` int(11) NOT NULL,
  `ns` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vip` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ros_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `roster`
--

INSERT INTO `roster` (`ros_id`, `ros_ref`, `ros_title`, `ros_name`, `ros_surname`, `ros_position`, `ros_organization`, `ros_tel`, `ros_fax`, `ros_mobile`, `ros_email`, `ros_time`, `datein`, `seminar`, `valid`, `pass`, `memo`, `user_name`, `arrived`, `ns`, `vip`) VALUES
(1, 'C1', '', 'อารี', 'นราธิปกร', 'ผู้จัดการฝ่ายวิจัยและพัฒนา', 'บริษัท กรีนสปอต จำกัด', '02-5330280 ต่อ 1407', '02-5330280 ต่อ 1409', '02-5330280 ต', 'research@greenspot.co.th', '2017-05-18 10:30:31', '13', 'Foodsafety', 1, 'PMJaRkt', '', 'foodsafety1', 1, '', ''),
(2, 'C2', NULL, 'ผู้จัดการฝ่ายคุณภาพ', NULL, 'ผู้จัดการฝ่ายคุณภาพ', 'บริษัท ซี.พี.อินเตอร์เทรด จำกัด', '081-3823139(มือถือ)', '02-4203994', NULL, 'factory@bkkstarch.com', '2017-05-08 17:56:53', '', 'Foodsafety', 0, '', '', 'foodsafety2', 0, '', ''),
(3, 'C3', NULL, 'ผู้จัดการฝ่ายคุณภาพ', NULL, 'ผู้จัดการฝ่ายคุณภาพ', 'บริษัท ซีพีเอฟ (ประเทศไทย) จำกัด (มหาชน)', NULL, '02-9367837', NULL, 'piyawan@goodservemew.com', '2017-05-08 17:56:53', '', 'Foodsafety', 0, '', '', 'foodsafety3', 0, '', ''),
(4, 'C4', NULL, 'ผู้จัดการฝ่ายวิจัยและพัฒนาผลิตภัณฑ์', NULL, 'ผู้จัดการฝ่ายวิจัยและพัฒนาผลิตภัณฑ์', 'บริษัท ดัชมิลล์อินเตอร์เนชั่นแนล รีเสิร์ช เซ็นเตอร์ จำกัด', NULL, '02 2586305', NULL, 'kmlp@asianet.co.th.', '2017-05-08 17:56:53', '', 'Foodsafety', 0, '', '', 'foodsafety4', 0, '', '');
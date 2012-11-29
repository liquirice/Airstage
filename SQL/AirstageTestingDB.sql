-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2012 at 08:25 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `Airstage`
--

-- --------------------------------------------------------

--
-- Table structure for table `Activities`
--

CREATE TABLE `Activities` (
  `rno` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` date NOT NULL,
  `extratime` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `venue` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fee` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `host` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `poster` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('hot','clubs','departments','authorities','concerts') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url1` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url2` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `signup` enum('yes','no') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`rno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `Activities`
--

INSERT INTO `Activities` VALUES(1, '2012社團聯展 「社彩繽紛」', '2012社團聯展', '新生舊生歡迎來看看\r\n支持自己喜歡或是屬於的社團!!!\r\n也來看看各家社團的十八般武藝!!', '2012-09-10', '18:30表演正式開始', '逸仙館', '免費', '課外組', '1346793750.jpg', 'clubs', 'https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-snc6/228502_465643156790280_47516304_n.jpg', 'https://www.facebook.com/photo.php?fbid=465643156790280&set=a.287806307907300.70609.202030546484877&type=1&theater', 'b996060015', '', 'no');
INSERT INTO `Activities` VALUES(2, '情定吸紫彎', '福爾摩沙社迎新活動', '「押注」將讓您願望成真喔！透過特別的吸管組合，參賽者可以呈現自己"獨特"的臉部表情吸引押注者的目光來獲得焦點！\r\n耶', '2012-09-18', '12:00 翠亨L棟前', '翠亨L棟前', '免費', '福爾摩沙社', '1346078419.jpg', 'clubs', '', 'https://www.facebook.com/events/178563308944526/', 'b996060015', '', 'no');
INSERT INTO `Activities` VALUES(3, 'ELV HOT 英志熱＂開學趴', 'ELV HOT ALL NIGHT ♥♥', '又到了最青春洋溢的時刻，在這個新鮮的世界中，我想要...★★★ PARTY TIME ★★★最好玩的【遊戲】、最精彩的【表演】、最浪漫的【聯誼】、最豐富的【抽獎', '2012-09-20', '18:30 準時入場', '多用途大廳（全家樓上', '酌收50元入場費，', '英語志工社', '13466003504_277764882332723_945756243_n.jpg', 'clubs', 'https://docs.google.com/spreadsheet/viewform?formkey=dGdFWE11ZUZsY1hkYTIxQTJuTzdrZ0E6MQ', 'https://www.facebook.com/events/277764882332723/', 'b996060015', '', 'no');
INSERT INTO `Activities` VALUES(4, '報名系統測試', '測試', '我們正在測試報名系統，可以讓有註冊的學生們報名並顯示有誰報名。', '2012-08-29', '網路上', 'computer', 'free', 'Airstage', '1346203326_118794034852557_884410_n.jpg', 'clubs', '', '', 'B992040061', '', 'yes');
INSERT INTO `Activities` VALUES(5, '2012 這夏，忍不住了！之 基服迎新', '基服迎新', '讓我們帶你暢遊中山及附近秘密基地，當天不僅有好玩的大型遊戲，同時也有精緻buffet餐點、趣味夜烤，還有融合視覺與聽覺的精采晚會饗宴喔！', '2012-09-14', '', '中山大學、旗津', '300元(含保險)', '基服社', '13467764016_468930433128219_783344495_n.jpg', 'clubs', 'http://www.beclass.com/default.php?name=ShowList&op=regist&rgstid=15304f0502ca665d7f1d', 'https://www.facebook.com/GF21and22', 'b996060015', '', 'no');
INSERT INTO `Activities` VALUES(6, '原學社期初夜烤大會-風火燎原', '原學社期初夜烤大會', '可以認識更多的朋友，可以吃到好吃的烤肉，可以喝到特調的小米酒雪碧，還可以看到最屌最屌的表演!!有車備車，沒車備帽!一起呼朋引伴參加吧!!!GO!\r\n', '2012-09-20', '19:00', ' L停', '$50餐費', '原學社', '1346600329.jpg', 'clubs', 'http://www.youtube.com/embed/IvoS_aPEFAs', 'https://www.facebook.com/events/403746759674881/', 'b996060015', '', 'no');
INSERT INTO `Activities` VALUES(7, '夏一戰，中山', '中山大學第六屆學生會期初活動', '想多多認識學生會是什麼嗎??想多認識朋友嗎?"夏一戰 中山"將在9/22 菩提樹下集合進行!!歡迎各位105級同學來報名!!!\r\n開始報名囉!! 因為只有120', '2012-09-22', '', '菩提樹下(行政大樓後', '報名免費，120個名', '學生會', '1346594966h.jpg', 'clubs', '', 'https://www.facebook.com/events/411118405604363/', 'b996060015', '', 'no');
INSERT INTO `Activities` VALUES(8, '中山颺韻合唱團招生囉！', '中山颺韻合唱團招生', '中山颺韻合唱團招生囉！順道一提，這學期我們計畫參加省賽，所以我們需要很多很多新血的加入，有興趣的朋友一起來吧！', '2012-09-25', '', '中山全家', '無', '中山颺韻合唱團', '13467756591_222155657913842_1005592845_n.jpg', 'clubs', 'https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-snc6/199191_222155657913842_1005592845_n.jpg', 'https://www.facebook.com/pages/%E4%B8%AD%E5%B1%B1%E5%A4%A7%E5%AD%B8%E9%A2%BA%E9%9F%BB%E5%90%88%E5%94%B1%E5%9C%98/113853002077442?ref=stream', 'b996060015', '', 'no');
INSERT INTO `Activities` VALUES(9, '柏林愛樂小號首席賈柏.塔柯比與高雄市管樂團', '2012西灣表演藝術季 第一檔節目', '以成為國內職業管樂團為目標的高雄市管樂團又來囉，此次除了由王戰老師所領軍的高雄市管樂團之外，特別邀請柏林愛樂現任小號首席Gabor Tarkovi一起共同演出，', '2012-09-25', '19:30', '中山大學逸仙館', '票價$300~$1500，兩人同行8折等(詳見官網)', '國立中山大學藝文中心', '1346789029tthj.jpg', 'concerts', 'http://www.ticket.com.tw/dm.asp?P1=0000013619', 'https://www.facebook.com/photo.php?fbid=408901739164659&set=a.214278698626965.70441.203432009711634&type=1&theater', 'b996060015', '', 'no');
INSERT INTO `Activities` VALUES(10, '悲歡中國-王苗攝影回顧展', '2012西灣表演藝術季 Visual A', '王苗被譽為「中國最具影響力的攝影家之一」，本次展出收錄其四十年攝影生涯中，中國大地自中原而邊陲異地逐漸消失的人文景觀與地貌，分為西藏篇、新疆篇與大地篇三個章節.', '2012-09-27', '到10/21，上午10:00-下午5:0', '蔣公行館西灣藝廊', '自由參觀，週一休館', '中山大學藝文中心', '1346789732j.jpg', 'concerts', 'http://www.trend.org/arts_info.php?pid=532&p=4', 'https://www.facebook.com/photo.php?fbid=410255742362592&set=a.214278698626965.70441.203432009711634&type=1&theater', 'b996060015', '', 'no');
INSERT INTO `Activities` VALUES(11, '打破定律, 創造奇蹟', '魔術社、扶青社聯合魔術盛宴', '中山魔術社與中山扶青團將於9/9 晚上聯合舉行一場魔術盛宴,喜歡看魔術,喜變魔術,希望培養人際關係與溝通能力的同學, 一定要參加魔術社!', '2012-09-09', '晚上6:00', '中山大學演藝廳', '無', '中山魔術社x扶青社', '1347103536grh5rh.jpg', 'clubs', 'http://www.youtube.com/embed/tkTvn-IGA6g', 'https://www.facebook.com/events/152114484927859/', 'b996060015', '', 'no');
INSERT INTO `Activities` VALUES(12, '第八屆學生大使團即將開始徵選', 'Student Ambassador', '介紹學生大使團服務性質、說明學生大使福利及優勢、分享各種活動經驗 (暑期志工團、外交部青年大使、海工系海外參訪等等)、講解甄選方式及應試技巧', '2012-09-21', '(五)12:15~13:30', '管院1032教室', '無', '中山大學國際事務處', '1347122619.jpg', 'authorities', 'http://www.youtube.com/embed/19B3BDsicsE', 'https://www.facebook.com/SA.NSYSU', 'b996060015', '', 'no');
INSERT INTO `Activities` VALUES(13, '中山迴馨 ~ 別相馨任何人', '中山迴馨期初活動', '如果時間化作竊取記憶的小偷 每段記憶將只有24小時的時效限制 你將用什麼方法捍衛自己?  錯置的真實與謊言 實為最親密的人所為 誰該被相信又有誰該被背棄? ', '2012-09-26', '晚間7:00', '多用途大廳（全家樓上）', '此次活動將酌收費用20元,並提供清涼飲料', '中山迴馨社', '1346962051.jpg', 'clubs', '', 'https://www.facebook.com/events/269973369781538/', 'b996060015', '要穿布鞋~全家有紅衣', 'no');
INSERT INTO `Activities` VALUES(14, '中秋前夕-期初大會', '天文社期初大會', '天文社將舉辦本學期期初大會，當天備有烤雞、pizza、飲料等餐點，歡迎各位共襄盛舉！', '2012-09-27', '(四) p.m 7:30', '西5006 ', '無', '中山天文社', '1347074275ejty.jpg', 'clubs', 'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-snc6/253061_515674988446214_1472317245_n.jpg', 'https://www.facebook.com/photo.php?fbid=515674988446214&set=a.341903775823337.99223.100000111526061&type=1&theater', 'b996060015', '', 'no');
INSERT INTO `Activities` VALUES(15, '拳擊社期初大會！', '拳擊社新社員招募', '當天有詳細社團介紹、專業動作示範、精彩影片、豐富buffet吃到飽及神秘的續攤活動，敬請期待！！！', '2012-09-18', '(二)下午6:00開放入場 6:30活動', '社科院四樓4004-2視聽教室', '活動費用100元(已繳交社費或社費訂金者完全免費)', '中山大學拳擊社', '1347074275ejty.jpg', 'clubs', 'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-snc6/253061_515674988446214_1472317245_n.jpg', 'https://www.facebook.com/photo.php?fbid=515674988446214&set=a.341903775823337.99223.100000111526061&type=1&theater', 'b996060015', '連絡電話：周潔0933860024\r\n中山大學菩提樹下威爾西斯(行政大樓正後方)，將有專人為您帶位', 'no');
INSERT INTO `Activities` VALUES(16, '中山大學自學園英文小老師招募', '自學園英文小老師招募', '不限系所、英語能力好之中山大學在籍學生，提供諮詢者英語學習上或應用上的諮詢輔導 。', '2012-09-16', '（日）前email報名', '【白天】外文系R309自學園／圖書館4樓【晚上】宿舍區L棟English Plaza ', '【待遇】200元／小時（以實際諮詢時數計算）', '外文系英語文教學中心', '1347099287grh5rh.jpg', 'authorities', 'http://zephyr.nsysu.edu.tw/self_access/news_system/show_news_detail.php?tid=201208237787', '', 'b996060015', 'eugenew.language@gmail.com或eugenew@staff.nsysu.edu.tw ', 'no');
INSERT INTO `Activities` VALUES(17, 'CDPA 中山網推會期初大會！', '中山網推會期初大會！', '一群熱心宿網的同學所組成的「中山校園宿舍網路推廣協會」， 為提供同學更好的宿網品質，由本協會負責宿舍網路的服務， 以維持網路的品質並減少計中實際管理上的困難！', '2012-09-26', '(三)18:00', '圖資大樓 B1', '免費', '中山校園宿舍網路推廣', '1347104182.jpg', 'clubs', 'http://www.cdpa.nsysu.edu.tw/2011/', 'https://www.facebook.com/NSYSUCDPA?ref=stream', 'b996060015', '新生入住宿舍網路問題諮詢，同學有問題歡迎詢問CDPA服務人員！', 'no');
INSERT INTO `Activities` VALUES(18, '中山滋青Forever Young極限營', '中山滋青迎新活動', '中山滋青也迎向新活動！煩擾的新生訓練後.....無趣的等開學~做甚麼好呢？繩索，漆彈，攀岩，烤肉.... 精華兩天行程 不可思議的探索活動！', '2012-09-13', '(13:30)~9/14(22:00)', '高雄澄清湖', '1000元(包吃包玩包住包交通)', '中山滋青社', '1347105535yujj.jpg', 'clubs', 'https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-ash3/538896_224356777692278_1208045780_n.jpg', 'https://www.facebook.com/pages/%E4%B8%AD%E5%B1%B1%E6%BB%8B%E9%9D%92Forever-Young/222987804495842', 'b996060015', '名額40要報要快！13:30體育館前集合，聯絡0975717973', 'no');
INSERT INTO `Activities` VALUES(19, '2012CSE中山資工週', '中山資工週', '有流星，快許願望!!!今夏想買電腦嗎? 中山資工週讓你用最優惠的價格 美!夢!成!真!!!!!', '2012-09-17', '~9/25', '理工長廊', '無', '中山大學資工系', '1347131597.jpg', 'departments', '', 'https://www.facebook.com/pages/2012%E4%B8%AD%E5%B1%B1%E8%B3%87%E5%B7%A5%E9%80%B1/330857047004183', 'b996060015', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `display_check`
--

CREATE TABLE `display_check` (
  `stu_id` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stu_id_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'on',
  `name_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'on',
  `gender_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `grade_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `facebook_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'on',
  `msn_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `twitter_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `plurk_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `skype_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `home_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dorm_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `outAddr_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `car_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile_pic_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `display_check`
--

INSERT INTO `display_check` VALUES('B993040017', 'on', 'on', 'on', '', '', 'on', '', '', '', '', '', '', 'on', '', '', 'on', 'on');
INSERT INTO `display_check` VALUES('B996060015', 'on', 'on', 'on', '', '', 'on', '', '', '', '', '', '', 'on', '', '', 'on', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `marketSecondHand_bidList`
--

CREATE TABLE `marketSecondHand_bidList` (
  `bidder_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `trade_id` int(10) NOT NULL,
  `exchange_type` int(1) NOT NULL COMMENT '0=錢, 1=物, 2=錢+物',
  `exchange_info` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `wanted_number` int(2) NOT NULL,
  `buy_list` int(1) NOT NULL DEFAULT '0' COMMENT '0=未成交, 1=已成交',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  KEY `buyer_id` (`bidder_id`,`trade_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketSecondHand_bidList`
--

INSERT INTO `marketSecondHand_bidList` VALUES('B996060015', 4, 3, 'ttt+ttt', 1, 0, '2012-10-21 22:43:32');
INSERT INTO `marketSecondHand_bidList` VALUES('B993040016', 4, 1, '500', 2, 0, '2012-10-31 22:35:20');
INSERT INTO `marketSecondHand_bidList` VALUES('B993040017', 3, 1, '600', 6, 0, '2012-10-31 09:53:26');
INSERT INTO `marketSecondHand_bidList` VALUES('B993040017', 4, 1, '100+昨晚便當', 1, 1, '2012-10-31 22:35:10');
INSERT INTO `marketSecondHand_bidList` VALUES('B996060019', 6, 0, '10000', 2, 1, '2012-10-21 22:02:51');
INSERT INTO `marketSecondHand_bidList` VALUES('B996060015', 3, 2, '這不重要', 2, 1, '2012-10-22 01:53:19');
INSERT INTO `marketSecondHand_bidList` VALUES('B992040061', 3, 2, '一個晚上', 2, 1, '2012-10-22 01:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `marketSecondHand_chasingList`
--

CREATE TABLE `marketSecondHand_chasingList` (
  `stu_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `trade_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `markTime` datetime NOT NULL,
  `star` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketSecondHand_chasingList`
--

INSERT INTO `marketSecondHand_chasingList` VALUES('B993040017', '3', '2012-10-25 00:00:00', 0);
INSERT INTO `marketSecondHand_chasingList` VALUES('B996060015', '3', '2012-10-06 00:00:00', 1);
INSERT INTO `marketSecondHand_chasingList` VALUES('B996060015', '4', '2012-10-20 23:56:21', 1);
INSERT INTO `marketSecondHand_chasingList` VALUES('B993040017', '2', '2012-12-25 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `marketSecondHand_comment`
--

CREATE TABLE `marketSecondHand_comment` (
  `trade_id` int(10) NOT NULL,
  `buyer_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(1) NOT NULL,
  `feedback_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketSecondHand_comment`
--

INSERT INTO `marketSecondHand_comment` VALUES(3, 'B993040019', 1, 'good');
INSERT INTO `marketSecondHand_comment` VALUES(3, 'test03', 3, 'GJ');
INSERT INTO `marketSecondHand_comment` VALUES(3, 'B993040019', 5, '');
INSERT INTO `marketSecondHand_comment` VALUES(3, 'B993040010', 5, '');
INSERT INTO `marketSecondHand_comment` VALUES(3, 'B993040021', 2, '');
INSERT INTO `marketSecondHand_comment` VALUES(3, 'B993040027', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `marketSecondHand_productInfo`
--

CREATE TABLE `marketSecondHand_productInfo` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_pic` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `marketSecondHand_productInfo`
--

INSERT INTO `marketSecondHand_productInfo` VALUES(1, '腳踏車', '出清一台捷安特腳踏車~\r\n\r\n無法變速~\r\n\r\n不影響騎乘\r\n\r\n狀況還OK', 'http://ppt.cc/dz38');
INSERT INTO `marketSecondHand_productInfo` VALUES(2, 'Costco 無穀鮭魚馬鈴薯狗飼料', '一大包15.87公斤 售價1199元，1公斤平均75.55元\r\n   收單每單位為2公斤，加上夾鏈袋雜費一包 每一單位共75.55*2+5 = 156元', 'http://www.naturesdomainpetfood.com/about-natures-domain');
INSERT INTO `marketSecondHand_productInfo` VALUES(3, '二手大創鵝黃色圓盤', '二手大創鵝黃色圓盤，欲售$10\r\n**可於翠亨L棟或圖書館前面交，請回站內信，謝謝**', 'http://dl.dropbox.com/u/46956923/2012-07-30%2020.55.04.jpg');
INSERT INTO `marketSecondHand_productInfo` VALUES(4, '全新3M口紅膠(大)，欲售$20', '全新3M口紅膠(大)，欲售$20', 'http://dl.dropbox.com/u/46956923/2012-07-01%2017.05.52.jpg');
INSERT INTO `marketSecondHand_productInfo` VALUES(5, '', '', '');
INSERT INTO `marketSecondHand_productInfo` VALUES(6, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `marketSecondHand_time`
--

CREATE TABLE `marketSecondHand_time` (
  `time_id` int(10) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `marketSecondHand_time`
--

INSERT INTO `marketSecondHand_time` VALUES(1, '2012-10-10', '00:00:00', '2012-12-26', '00:00:00');
INSERT INTO `marketSecondHand_time` VALUES(2, '2012-10-10', '00:00:00', '2012-11-20', '00:00:00');
INSERT INTO `marketSecondHand_time` VALUES(3, '2012-10-01', '00:00:00', '2012-11-20', '00:00:00');
INSERT INTO `marketSecondHand_time` VALUES(4, '2012-10-01', '00:00:00', '2012-10-02', '00:00:00');
INSERT INTO `marketSecondHand_time` VALUES(5, '2012-10-01', '00:00:00', '2012-10-18', '00:00:00');
INSERT INTO `marketSecondHand_time` VALUES(6, '2012-10-01', '00:00:00', '2012-10-18', '00:00:00');
INSERT INTO `marketSecondHand_time` VALUES(7, '2012-10-31', '09:25:13', '0000-00-00', '00:00:00');
INSERT INTO `marketSecondHand_time` VALUES(8, '2012-11-27', '12:55:53', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `marketSecondHand_trade`
--

CREATE TABLE `marketSecondHand_trade` (
  `stu_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `trade_id` int(10) NOT NULL AUTO_INCREMENT,
  `least_price` int(5) NOT NULL,
  `number` int(2) NOT NULL,
  `product_id` int(10) NOT NULL,
  `time_id` int(10) NOT NULL,
  `category` int(20) NOT NULL,
  `exist` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`trade_id`),
  KEY `stu_id` (`stu_id`,`product_id`,`time_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `marketSecondHand_trade`
--

INSERT INTO `marketSecondHand_trade` VALUES('B996060015', 1, 100, 1, 1, 1, 20304, 1);
INSERT INTO `marketSecondHand_trade` VALUES('B996060015', 2, 100, 5, 2, 2, 20401, 1);
INSERT INTO `marketSecondHand_trade` VALUES('B993040017', 3, 100, 10, 3, 3, 20305, 1);
INSERT INTO `marketSecondHand_trade` VALUES('B993040017', 4, 120, 7, 4, 4, 20401, 0);
INSERT INTO `marketSecondHand_trade` VALUES('B993040017', 8, 0, 0, 6, 8, 0, 1);
INSERT INTO `marketSecondHand_trade` VALUES('B993040017', 7, 0, 0, 5, 7, 0, -1);

-- --------------------------------------------------------

--
-- Table structure for table `Member`
--

CREATE TABLE `Member` (
  `rno` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `psw` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `grade` enum('100','101','102','103','104','105') COLLATE utf8_unicode_ci NOT NULL,
  `department` enum('中文系','外文系','音樂系','劇藝系','應數系','物理系','化學系','生科系','財管系','企管系','資管系','社會系','資工系','電機系','機電系') COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('男','女') COLLATE utf8_unicode_ci NOT NULL,
  `AUTH` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Member`
--

INSERT INTO `Member` VALUES(1, '2saki', '0146139775a', '103', '應數系', 'B992040061', '甘忠禾', 'two_saki@hotmail.com', '男', 0);
INSERT INTO `Member` VALUES(2, '黑崎', '291339', '103', '企管系', 'B996060015', '郭宇軒', 'shdowwings@gmail.com', '男', 0);
INSERT INTO `Member` VALUES(3, 'adachua90', 'chua19905309', '103', '財管系', 'B994030050', '蔡昆達', 'dada_chua_90@hotmail.com', '男', 0);
INSERT INTO `Member` VALUES(4, 'Michael', '006215', '100', '中文系', 'b984000133', '陳冠勳', 'goalmichael100000@gmail.com', '男', 0);
INSERT INTO `Member` VALUES(5, 'simba', 'simba130', '100', '中文系', 'B983100041', '石萬里', 'simba08130@gmail.com', '男', 0);
INSERT INTO `Member` VALUES(6, 'B993100001', '1111', '100', '中文系', 'B993100001', '不清楚', 'l204130@rtrtr.com', '男', 0);
INSERT INTO `Member` VALUES(7, 'HUNG', '811128', '100', '中文系', 'B003022011', '陳浤', 'jimhung.chen@gmail.com', '男', 0);
INSERT INTO `Member` VALUES(8, '叮噹', 'lovefang', '100', '中文系', 'B985040037', '邱章傑', 'masakiq@hotmail.com', '男', 0);
INSERT INTO `Member` VALUES(15, 'Arwindy', '3961e0913508d4ce626c13392b5c688588087e6e', '103', '資工系', 'B993040017', '江緯宸', 'archerwindy@gmail.com', '男', 2);
INSERT INTO `Member` VALUES(10, 'Yes.yu79', '2310203', '100', '中文系', 'b001020039', '葉士瑜', 'Yes.yu79@gmail.com', '女', 0);
INSERT INTO `Member` VALUES(12, '開發者', '89756232', '100', '中文系', 'b000000000', '開發者', 'airstageforstudio@gmail.com', '男', 0);
INSERT INTO `Member` VALUES(13, 'hv42002', 's123456', '100', '中文系', 'b996060044', '蘇柏昀', 'b996060044@student.nsysu.edu.tw', '男', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_check`
--

CREATE TABLE `member_check` (
  `student_id` varchar(15) NOT NULL,
  `student_id_check` varbinary(1) NOT NULL,
  `gender_check` varbinary(1) NOT NULL,
  `email_check` varbinary(1) NOT NULL,
  `hp_check` varbinary(1) NOT NULL,
  `fb_check` varbinary(1) NOT NULL,
  `twitter_check` varbinary(1) NOT NULL,
  `plurk_check` varbinary(1) NOT NULL,
  `skype_check` varbinary(1) NOT NULL,
  `msn_check` varbinary(1) NOT NULL,
  `second_email_check` varbinary(1) NOT NULL,
  `dorm_check` varbinary(1) NOT NULL,
  `food_check` varbinary(1) NOT NULL,
  `address_check` varbinary(1) NOT NULL,
  `club_check` varbinary(1) NOT NULL,
  `club_id_check` varbinary(1) NOT NULL,
  `hometown_check` varbinary(1) NOT NULL,
  `transport_check` varbinary(1) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='member check';

--
-- Dumping data for table `member_check`
--

INSERT INTO `member_check` VALUES('B996060015', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0');
INSERT INTO `member_check` VALUES('B996211115', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1');
INSERT INTO `member_check` VALUES('w133433333', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '1', '1');
INSERT INTO `member_check` VALUES('w133436223', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '1', '1');
INSERT INTO `member_check` VALUES('w133436666', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `member_Info`
--

CREATE TABLE `member_Info` (
  `stu_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `msn` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `plurk` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `food` tinyint(1) NOT NULL,
  `home` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dorm` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room` smallint(3) NOT NULL,
  `outAddr` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `car` tinyint(1) NOT NULL,
  `profile_pic` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_Info`
--

INSERT INTO `member_Info` VALUES('B993040017', 'http://www.facebook.com/weichen.chiang.39', '', '', '', '', '0989858692', 0, 'Taipei', 'A127479868', 'E', 307, '', 2, '');
INSERT INTO `member_Info` VALUES('B996060015', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `online_list`
--

CREATE TABLE `online_list` (
  `stu_id` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_ip` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `online_time` datetime NOT NULL,
  `last_time` datetime NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_list`
--


-- phpMyAdmin SQL Dump
-- version 3.5.0-alpha1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2012 at 02:59 PM
-- Server version: 5.1.52
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airstage`
--

-- --------------------------------------------------------

--
-- Table structure for table `Activities`
--

CREATE TABLE IF NOT EXISTS `Activities` (
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

INSERT INTO `Activities` (`rno`, `title`, `name`, `description`, `time`, `extratime`, `venue`, `fee`, `host`, `poster`, `type`, `url1`, `url2`, `stu_id`, `note`, `signup`) VALUES
(1, '2012社團聯展 「社彩繽紛」', '2012社團聯展', '新生舊生歡迎來看看\r\n支持自己喜歡或是屬於的社團!!!\r\n也來看看各家社團的十八般武藝!!', '2012-09-10', '18:30表演正式開始', '逸仙館', '免費', '課外組', '1346793750.jpg', 'clubs', 'https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-snc6/228502_465643156790280_47516304_n.jpg', 'https://www.facebook.com/photo.php?fbid=465643156790280&set=a.287806307907300.70609.202030546484877&type=1&theater', 'b996060015', '', 'no'),
(2, '情定吸紫彎', '福爾摩沙社迎新活動', '「押注」將讓您願望成真喔！透過特別的吸管組合，參賽者可以呈現自己"獨特"的臉部表情吸引押注者的目光來獲得焦點！\r\n耶', '2012-09-18', '12:00 翠亨L棟前', '翠亨L棟前', '免費', '福爾摩沙社', '1346078419.jpg', 'clubs', '', 'https://www.facebook.com/events/178563308944526/', 'b996060015', '', 'no'),
(3, 'ELV HOT 英志熱＂開學趴', 'ELV HOT ALL NIGHT ♥♥', '又到了最青春洋溢的時刻，在這個新鮮的世界中，我想要...★★★ PARTY TIME ★★★最好玩的【遊戲】、最精彩的【表演】、最浪漫的【聯誼】、最豐富的【抽獎', '2012-09-20', '18:30 準時入場', '多用途大廳（全家樓上', '酌收50元入場費，', '英語志工社', '13466003504_277764882332723_945756243_n.jpg', 'clubs', 'https://docs.google.com/spreadsheet/viewform?formkey=dGdFWE11ZUZsY1hkYTIxQTJuTzdrZ0E6MQ', 'https://www.facebook.com/events/277764882332723/', 'b996060015', '', 'no'),
(4, '報名系統測試', '測試', '我們正在測試報名系統，可以讓有註冊的學生們報名並顯示有誰報名。', '2012-08-29', '網路上', 'computer', 'free', 'Airstage', '1346203326_118794034852557_884410_n.jpg', 'clubs', '', '', 'B992040061', '', 'yes'),
(5, '2012 這夏，忍不住了！之 基服迎新', '基服迎新', '讓我們帶你暢遊中山及附近秘密基地，當天不僅有好玩的大型遊戲，同時也有精緻buffet餐點、趣味夜烤，還有融合視覺與聽覺的精采晚會饗宴喔！', '2012-09-14', '', '中山大學、旗津', '300元(含保險)', '基服社', '13467764016_468930433128219_783344495_n.jpg', 'clubs', 'http://www.beclass.com/default.php?name=ShowList&op=regist&rgstid=15304f0502ca665d7f1d', 'https://www.facebook.com/GF21and22', 'b996060015', '', 'no'),
(6, '原學社期初夜烤大會-風火燎原', '原學社期初夜烤大會', '可以認識更多的朋友，可以吃到好吃的烤肉，可以喝到特調的小米酒雪碧，還可以看到最屌最屌的表演!!有車備車，沒車備帽!一起呼朋引伴參加吧!!!GO!\r\n', '2012-09-20', '19:00', ' L停', '$50餐費', '原學社', '1346600329.jpg', 'clubs', 'http://www.youtube.com/embed/IvoS_aPEFAs', 'https://www.facebook.com/events/403746759674881/', 'b996060015', '', 'no'),
(7, '夏一戰，中山', '中山大學第六屆學生會期初活動', '想多多認識學生會是什麼嗎??想多認識朋友嗎?"夏一戰 中山"將在9/22 菩提樹下集合進行!!歡迎各位105級同學來報名!!!\r\n開始報名囉!! 因為只有120', '2012-09-22', '', '菩提樹下(行政大樓後', '報名免費，120個名', '學生會', '1346594966h.jpg', 'clubs', '', 'https://www.facebook.com/events/411118405604363/', 'b996060015', '', 'no'),
(8, '中山颺韻合唱團招生囉！', '中山颺韻合唱團招生', '中山颺韻合唱團招生囉！順道一提，這學期我們計畫參加省賽，所以我們需要很多很多新血的加入，有興趣的朋友一起來吧！', '2012-09-25', '', '中山全家', '無', '中山颺韻合唱團', '13467756591_222155657913842_1005592845_n.jpg', 'clubs', 'https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-snc6/199191_222155657913842_1005592845_n.jpg', 'https://www.facebook.com/pages/%E4%B8%AD%E5%B1%B1%E5%A4%A7%E5%AD%B8%E9%A2%BA%E9%9F%BB%E5%90%88%E5%94%B1%E5%9C%98/113853002077442?ref=stream', 'b996060015', '', 'no'),
(9, '柏林愛樂小號首席賈柏.塔柯比與高雄市管樂團', '2012西灣表演藝術季 第一檔節目', '以成為國內職業管樂團為目標的高雄市管樂團又來囉，此次除了由王戰老師所領軍的高雄市管樂團之外，特別邀請柏林愛樂現任小號首席Gabor Tarkovi一起共同演出，', '2012-09-25', '19:30', '中山大學逸仙館', '票價$300~$1500，兩人同行8折等(詳見官網)', '國立中山大學藝文中心', '1346789029tthj.jpg', 'concerts', 'http://www.ticket.com.tw/dm.asp?P1=0000013619', 'https://www.facebook.com/photo.php?fbid=408901739164659&set=a.214278698626965.70441.203432009711634&type=1&theater', 'b996060015', '', 'no'),
(10, '悲歡中國-王苗攝影回顧展', '2012西灣表演藝術季 Visual A', '王苗被譽為「中國最具影響力的攝影家之一」，本次展出收錄其四十年攝影生涯中，中國大地自中原而邊陲異地逐漸消失的人文景觀與地貌，分為西藏篇、新疆篇與大地篇三個章節.', '2012-09-27', '到10/21，上午10:00-下午5:0', '蔣公行館西灣藝廊', '自由參觀，週一休館', '中山大學藝文中心', '1346789732j.jpg', 'concerts', 'http://www.trend.org/arts_info.php?pid=532&p=4', 'https://www.facebook.com/photo.php?fbid=410255742362592&set=a.214278698626965.70441.203432009711634&type=1&theater', 'b996060015', '', 'no'),
(11, '打破定律, 創造奇蹟', '魔術社、扶青社聯合魔術盛宴', '中山魔術社與中山扶青團將於9/9 晚上聯合舉行一場魔術盛宴,喜歡看魔術,喜變魔術,希望培養人際關係與溝通能力的同學, 一定要參加魔術社!', '2012-09-09', '晚上6:00', '中山大學演藝廳', '無', '中山魔術社x扶青社', '1347103536grh5rh.jpg', 'clubs', 'http://www.youtube.com/embed/tkTvn-IGA6g', 'https://www.facebook.com/events/152114484927859/', 'b996060015', '', 'no'),
(12, '第八屆學生大使團即將開始徵選', 'Student Ambassador', '介紹學生大使團服務性質、說明學生大使福利及優勢、分享各種活動經驗 (暑期志工團、外交部青年大使、海工系海外參訪等等)、講解甄選方式及應試技巧', '2012-09-21', '(五)12:15~13:30', '管院1032教室', '無', '中山大學國際事務處', '1347122619.jpg', 'authorities', 'http://www.youtube.com/embed/19B3BDsicsE', 'https://www.facebook.com/SA.NSYSU', 'b996060015', '', 'no'),
(13, '中山迴馨 ~ 別相馨任何人', '中山迴馨期初活動', '如果時間化作竊取記憶的小偷 每段記憶將只有24小時的時效限制 你將用什麼方法捍衛自己?  錯置的真實與謊言 實為最親密的人所為 誰該被相信又有誰該被背棄? ', '2012-09-26', '晚間7:00', '多用途大廳（全家樓上）', '此次活動將酌收費用20元,並提供清涼飲料', '中山迴馨社', '1346962051.jpg', 'clubs', '', 'https://www.facebook.com/events/269973369781538/', 'b996060015', '要穿布鞋~全家有紅衣', 'no'),
(14, '中秋前夕-期初大會', '天文社期初大會', '天文社將舉辦本學期期初大會，當天備有烤雞、pizza、飲料等餐點，歡迎各位共襄盛舉！', '2012-09-27', '(四) p.m 7:30', '西5006 ', '無', '中山天文社', '1347074275ejty.jpg', 'clubs', 'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-snc6/253061_515674988446214_1472317245_n.jpg', 'https://www.facebook.com/photo.php?fbid=515674988446214&set=a.341903775823337.99223.100000111526061&type=1&theater', 'b996060015', '', 'no'),
(15, '拳擊社期初大會！', '拳擊社新社員招募', '當天有詳細社團介紹、專業動作示範、精彩影片、豐富buffet吃到飽及神秘的續攤活動，敬請期待！！！', '2012-09-18', '(二)下午6:00開放入場 6:30活動', '社科院四樓4004-2視聽教室', '活動費用100元(已繳交社費或社費訂金者完全免費)', '中山大學拳擊社', '1347074275ejty.jpg', 'clubs', 'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-snc6/253061_515674988446214_1472317245_n.jpg', 'https://www.facebook.com/photo.php?fbid=515674988446214&set=a.341903775823337.99223.100000111526061&type=1&theater', 'b996060015', '連絡電話：周潔0933860024\r\n中山大學菩提樹下威爾西斯(行政大樓正後方)，將有專人為您帶位', 'no'),
(16, '中山大學自學園英文小老師招募', '自學園英文小老師招募', '不限系所、英語能力好之中山大學在籍學生，提供諮詢者英語學習上或應用上的諮詢輔導 。', '2012-09-16', '（日）前email報名', '【白天】外文系R309自學園／圖書館4樓【晚上】宿舍區L棟English Plaza ', '【待遇】200元／小時（以實際諮詢時數計算）', '外文系英語文教學中心', '1347099287grh5rh.jpg', 'authorities', 'http://zephyr.nsysu.edu.tw/self_access/news_system/show_news_detail.php?tid=201208237787', '', 'b996060015', 'eugenew.language@gmail.com或eugenew@staff.nsysu.edu.tw ', 'no'),
(17, 'CDPA 中山網推會期初大會！', '中山網推會期初大會！', '一群熱心宿網的同學所組成的「中山校園宿舍網路推廣協會」， 為提供同學更好的宿網品質，由本協會負責宿舍網路的服務， 以維持網路的品質並減少計中實際管理上的困難！', '2012-09-26', '(三)18:00', '圖資大樓 B1', '免費', '中山校園宿舍網路推廣', '1347104182.jpg', 'clubs', 'http://www.cdpa.nsysu.edu.tw/2011/', 'https://www.facebook.com/NSYSUCDPA?ref=stream', 'b996060015', '新生入住宿舍網路問題諮詢，同學有問題歡迎詢問CDPA服務人員！', 'no'),
(18, '中山滋青Forever Young極限營', '中山滋青迎新活動', '中山滋青也迎向新活動！煩擾的新生訓練後.....無趣的等開學~做甚麼好呢？繩索，漆彈，攀岩，烤肉.... 精華兩天行程 不可思議的探索活動！', '2012-09-13', '(13:30)~9/14(22:00)', '高雄澄清湖', '1000元(包吃包玩包住包交通)', '中山滋青社', '1347105535yujj.jpg', 'clubs', 'https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-ash3/538896_224356777692278_1208045780_n.jpg', 'https://www.facebook.com/pages/%E4%B8%AD%E5%B1%B1%E6%BB%8B%E9%9D%92Forever-Young/222987804495842', 'b996060015', '名額40要報要快！13:30體育館前集合，聯絡0975717973', 'no'),
(19, '2012CSE中山資工週', '中山資工週', '有流星，快許願望!!!今夏想買電腦嗎? 中山資工週讓你用最優惠的價格 美!夢!成!真!!!!!', '2012-09-17', '~9/25', '理工長廊', '無', '中山大學資工系', '1347131597.jpg', 'departments', '', 'https://www.facebook.com/pages/2012%E4%B8%AD%E5%B1%B1%E8%B3%87%E5%B7%A5%E9%80%B1/330857047004183', 'b996060015', '', 'no');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

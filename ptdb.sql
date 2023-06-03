-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2023-06-03 19:14:11
-- 伺服器版本： 8.0.31
-- PHP 版本： 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ptdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `order_pri`
--

DROP TABLE IF EXISTS `order_pri`;
CREATE TABLE IF NOT EXISTS `order_pri` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `user_number` int NOT NULL DEFAULT '0',
  `buyer_name` varchar(30) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` text,
  `carrier` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tax_id` varchar(10) DEFAULT NULL,
  `price` int NOT NULL DEFAULT '0',
  `trans_state` int NOT NULL DEFAULT '1' COMMENT '1/2/3 訂單已成立/訂單已出貨/訂單已完成',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `user_number` (`user_number`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `order_pri`
--

INSERT INTO `order_pri` (`ID`, `user_number`, `buyer_name`, `phone`, `address`, `carrier`, `tax_id`, `price`, `trans_state`, `create_time`) VALUES
(13, 1, '王小明', '0912345678', '台中市西屯區文華路100號', '/EXAMPLE1', '43214321', 1855, 1, '2023-06-03 16:01:03'),
(14, 1, '李小美', '0988776655', '台中市西屯區文華路1號', '', '', 2080, 1, '2023-06-03 16:17:33'),
(15, 19, '林大壯', '0965432100', '臺北市中正區重慶南路一段122號', '', '87654321', 410, 1, '2023-06-03 16:20:10');

-- --------------------------------------------------------

--
-- 資料表結構 `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` int NOT NULL,
  `prod_id` int NOT NULL,
  `amount` int NOT NULL,
  PRIMARY KEY (`order_id`,`prod_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `order_product`
--

INSERT INTO `order_product` (`order_id`, `prod_id`, `amount`) VALUES
(13, 1, 2),
(13, 2, 3),
(14, 3, 4),
(14, 8, 1),
(14, 19, 1),
(15, 7, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `Author` text,
  `Price` int UNSIGNED DEFAULT NULL,
  `Info` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `ISBN` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `prodType` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `Remaining` int UNSIGNED DEFAULT NULL,
  `sellType` int NOT NULL DEFAULT '1' COMMENT '1/2/3 normal/ebook/both',
  `hot` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb3;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`ID`, `Name`, `Author`, `Price`, `Info`, `ISBN`, `prodType`, `Remaining`, `sellType`, `hot`) VALUES
(1, 'STEAM科學了不起：70個小孩在家就可以玩的超酷科學遊戲', '羅伯．比提', 299, '風靡國外的STEAM科學小遊戲來了~\r\n超受歡迎的史萊姆、自己造雨、把蛋吸進瓶子裡、讓某人的臉消失...\r\n這不過是70個超好玩實驗中的幾種而已！\r\n\r\n　　70個在家就可以玩的超酷科學遊戲\r\n\r\n　　‧授權多國，國外雜誌媒體與親子平台熱烈推薦，Amazon讀者5顆星滿分好評\r\n　　‧滿足好奇心，建立科學素養，中小學生必備優質科普圖書\r\n　　‧科學才藝班、安親班寒暑假才藝課的科學實驗最佳指南\r\n\r\n　　科學實作、原理與生活資訊並重，立即長知識！\r\n\r\n　　‧超過500張彩色插圖，步驟清楚呈現。\r\n　　‧真正大開本設計，閱讀更加舒適。\r\n　　‧幽默的文字解說，玩科學也能很開心。\r\n　　‧每個實驗約1~2頁就完成，簡單又好玩。\r\n　　‧運用生活中的小物品，在家就能動手做。', '9789865025120', 'science', 20, 1, 222),
(2, '晨讀10分鐘：科學和你想的不一樣', '李鍾旻', 399, '　　臺灣最大的科學網站及社群──PanSci泛科學\r\n　　精選20篇超有梗又絕不冷場的科普好文\r\n　　帶領你探究真相，養成科學思辨力\r\n　　隨書配備超級強大的閱讀素養題本\r\n　　幫助你秒懂PISA和108課綱的閱讀策略\r\n\r\n　　科學，是檢視世界的透鏡\r\n　　運用觀察、提問、假設等科學研究步驟，\r\n　　透過大量實驗及數據來驗證各種可能的假設，\r\n　　你會發現所謂的真理不一定為真，\r\n　　權威其實破綻百出，真相原來還有多重解釋的可能……\r\n\r\n　　昆蟲其實是住在你家的親密室友？\r\n　　海鳥竟然也有嚴重的食安危機？\r\n　　熒惑守心的天文異象與政治陰謀有關？\r\n　　長頸鹿的長脖子其實是最具爭議的演化議題？\r\n　　男女朋友的速配指數竟然可用貝氏定理解析？\r\n　　看日劇也可以學心理分析！原來「逃避雖可恥但有用」這麼有道理......\r\n\r\n　　這些問題是不是超級吸引你的眼球？讓人好想趕快破解其中的「為什麼」！好奇心其實就是養成科學思辨力的第一步。一起跟著臺灣最熱血的科普網站與社群──PanSci泛科學，運用科學研究方法，探看生活中超有趣問題的背後真相，從而建立科學思辨力，學習運用科學觀點去挑戰未知，勇踏前人的未至之境。', '4717211025956', 'science', 13, 1, 146),
(3, '射鵰英雄傳(一)新修版', '金庸', 280, '　　《射鵰》最成功之處，是在人物的創造。《射鵰》的故事，甚至可以說是平舖直敘的，所有精采的部分，全來自所創造出來的、活龍活現、無時無刻不在讀者眼前跳躍的人物，如眾所周知的郭靖、黃蓉。《射鵰》在金庸的作品中，流傳最廣，最易為讀者接受，也在於這一點。《射鵰》中的「東邪西毒南帝北丐中神通」，有傳統武俠小說的影子，但也成了無數武俠小說競相仿效的寫法。\r\n\r\n　　在最新修訂版中，金庸最主要的企圖是：改正了全書情節年代上的錯誤，解決「黃蓉年紀比郭靖大」的問題，並藉此將桃花島上黃藥師與諸弟子的關係重新改寫。尤其金庸特別提到，新修版參考了許多【金庸茶館】網站上金迷的意見，台灣金迷貢獻良多。\r\n\r\n　　在梅超風的回憶裡，黃藥師與她有著怎樣一段若有似無的情愫？陳玄風與梅超風偷取《九陰真經》後，如何成為殺人不眨眼的「黑風雙煞」？《九陰真經》的奧秘，有著怎樣重大的變革？書末，郭靖黃蓉原本鎮守襄陽，如何變作了「青州城」？……種種新奇情節，只在新修版《射鵰》中。\r\n\r\n　　費時一年半修改完成，兩岸三地首度發表，二○○三年新修版《射鵰》，絕對值得先睹為快！', '9789573249702', 'novel', 4, 1, 1554),
(4, '射鵰英雄傳(二)新修版', '金庸', 280, '　　《射鵰》最成功之處，是在人物的創造。《射鵰》的故事，甚至可以說是平舖直敘的，所有精采的部分，全來自所創造出來的、活龍活現、無時無刻不在讀者眼前跳躍的人物，如眾所周知的郭靖、黃蓉。《射鵰》在金庸的作品中，流傳最廣，最易為讀者接受，也在於這一點。《射鵰》中的「東邪西毒南帝北丐中神通」，有傳統武俠小說的影子，但也成了無數武俠小說競相仿效的寫法。\r\n\r\n　　在最新修訂版中，金庸最主要的企圖是：改正了全書情節年代上的錯誤，解決「黃蓉年紀比郭靖大」的問題，並藉此將桃花島上黃藥師與諸弟子的關係重新改寫。尤其金庸特別提到，新修版參考了許多【金庸茶館】網站上金迷的意見，台灣金迷貢獻良多。\r\n\r\n　　在梅超風的回憶裡，黃藥師與她有著怎樣一段若有似無的情愫？陳玄風與梅超風偷取《九陰真經》後，如何成為殺人不眨眼的「黑風雙煞」？《九陰真經》的奧秘，有著怎樣重大的變革？書末，郭靖黃蓉原本鎮守襄陽，如何變作了「青州城」？……種種新奇情節，只在新修版《射鵰》中。\r\n\r\n　　費時一年半修改完成，兩岸三地首度發表，二○○三年新修版《射鵰》，絕對值得先睹為快！', '9789573249719', 'novel', 10, 1, 1225),
(5, '從4件事學英文：母語人士最常用的生活單字', '張瑩安', 350, '想要開始學習英文，卻為了背不起單字而煩惱怎麼辦？\r\n背了很多單字，卻找不到使用時機怎麼辦？\r\n要與外國人交流，到底該背哪些單字才好呢？\r\n \r\n學習英文，最重要的不是單字的深與難，\r\n而是單字的實用與活用！\r\n生活瑣「事」╳人生大「事」╳外出辦「事」╳休閒樂「事」\r\n用四件「事」，從單字書走進外國人的日常生活！\r\n \r\n　　四大類單字，囊括生活方方面面\r\n　　本書將60個生活主題分為四大類，明確的分類讓學習更有系統性，也將生活中需要的單字全都收錄，在國內可以輕鬆講英文，到國外也能輕鬆融入！\r\n \r\n　　單字大補帖，相關知識一把抓\r\n　　每個單元都精選4個單字來深入延伸補充，讓你學習不只是背單字，也是學習相關的背景知識，更能加碼學到與其相關的補充單字，是最全面的學習！\r\n \r\n　　例句╳會話╳補充，英文學習樣樣不漏\r\n　　每個單元都附有例句，讓你熟悉學習過的單字，並瞭解如何使用。例句中出現的單字也有補充說明，讓你再多學一些！除了例句之外，也有英文會話，讓你瞭解如何實際使用生活單字，學以致用才是真正學會！\r\n \r\n　　特別聘請專業老師錄音，隨時隨地學英文\r\n　　本書特別聘請專業老師錄音，透過清晰的發音，自然而然學會說一口標準的英文！同時附有中英文音檔，讓你隨時隨地都能學習英文！只要掃描封面的QRcode，就能下載全書音檔！', '9789865507671', 'language', 205, 3, 106),
(6, '沖繩最好玩旅遊全攻略【全新升級版】', '吳相鎔', 299, '吃、喝、玩、樂、購，完整收錄\r\n一個主題搭配一張詳細地圖，\r\n清晰指引＋圖文並茂＋交通規畫\r\n不迷路、免問人，\r\n用省下來的時間玩更多地方，讓你的行程精采度Up Up。\r\n\r\n　　最完美的假期～～\r\n　　陽光、沙灘、海洋\r\n　　現在就往沖繩出發吧！\r\n\r\n　　第一次出國也OK！\r\n　　省找路、免比價、不採地雷，\r\n　　帶你遊遍沖繩精彩景點、必吃美食，\r\n　　訂到便宜飯店和機票的達人終極旅遊書\r\n\r\n　　最與眾不同，好玩度百分百的沖繩遊\r\n　　主題遊：75個必訪精彩景點＋145間必吃美食餐廳＋60間獨家嚴選商家，達人帶路，沖繩這樣玩最滿足\r\n　　天數遊：週末遊、連假遊、3～5日遊，隨你想在沖繩玩幾天，天天都精采，免請假，下班後就能出發的旅行計畫\r\n　　玩伴遊：依照同行對象設計的獨家行程，家族旅遊、好友同事出遊、新婚夫妻、小情侶等，每個人都能找到適合自己的吃喝玩樂點\r\n　　季節遊：一年四季都能遊沖繩，給你春夏秋冬，沖繩的氣溫、雨量等，方便準備適當穿著，同時還有賞櫻、浮潛、水上活動等遊覽看點，以及歡樂祭典活動，並能搭配打折季，買回滿滿的戰利品', '9789869474924', 'travel', 403, 1, 99),
(7, '享受吧！曼谷小旅行：購物╳文創╳美食╳景點，旅遊達人帶你搭地鐵遊曼谷', '蔡志良', 350, '你對曼谷的印象是什麼？\r\n潑水節、泰式奶茶、炙熱的天氣？\r\n曼谷的多滋多味，就等你來細細品嘗！\r\n\r\n　　搭火車衝進市場，蹲低才能參拜的佛像，\r\n　　在船上吃飯賞夜景，到佛寺學傳統按摩……\r\n　　最超值的玩法，五星級的享受，\r\n　　不用花大錢，就能來場很「文青」的曼谷小旅行！\r\n\r\n　　除了物美價廉的當地美食、消除疲憊的泰式按摩，\r\n　　百貨精品店和市集小販、新舊並存的文化景點等，\r\n　　還有平價的優質旅店、送禮自用兩相宜的伴手禮，\r\n　　出發前的基本功課、到泰國不可不知的禁忌……\r\n　　讓旅遊達人帶你搭地鐵玩曼谷，\r\n　　搭配推薦行程與景點QR code使用，\r\n　　享受多滋多味的曼谷時光，小旅行即刻啟程！', '9789578587182', 'travel', 22, 1, 144),
(8, '跟著課本去旅行【新課綱增訂版】：20條玩遍台灣的親子旅遊X素養生活提案', '親子天下編輯部', 420, '第一本對應新課綱的中小學課本知識，\r\n語文╳數學╳社會╳自然╳聯合國永續發展目標SDGs\r\n20條旅遊學習路線，56個素養提問，\r\n走讀台灣、享用美食，親師生旅學素養。\r\n \r\n　　用「課本」規劃島內旅行，以「深度」設計素養旅學\r\n　　呼應108課綱素養導向的學習，《跟著課本去旅行》2022年全新改版--\r\n　　\r\n　　一本親師生的「旅學寶典」--永遠背不起來的知識，親身造訪景點讓你一玩就會\r\n \r\n　　● 旅學台灣戰史：訪新北淡水，科技體驗帶你跨越時空\r\n　　● 旅學幾何數學：玩台中中央公園，實境遊具體驗抽象數學\r\n　　● 旅學動植物繁衍：屏東潮州一日遊，理解繁衍過程\r\n　　● 旅學牡丹事件：走一趟台東恆春，了解歷史故事\r\n　　● 旅學板塊運動：親臨花蓮玉里，看兩個板塊擠出台灣島\r\n　　● 旅學立院、法院：上一堂實境公民課', '9786263050174', 'travel', 300, 2, 92),
(9, 'Python最強入門邁向頂尖高手之路：王者歸來(第二版)全彩版', '洪錦魁', 1080, '本書第一版曾經榮登博客來、天瓏、Momo暢銷排行榜第一名\r\n\r\n　　本書除了贈送全書1101個程式實例，所有是非與選擇題皆附有習題解答，實作題部分有約260多個程式實例則是贈送所有偶數題的解答，有了這些解答讀者可以自行驗證學習成果。\r\n\r\n　　多次與教育界的朋友相聚，談到電腦語言的發展趨勢，大家一致公認Python已經是當今最重要的電腦語言了，幾乎所有知名公司，例如：Google、Facebook、…等皆已經將此語言列為必備電腦語言。了解許多人想學Python，市面上的書也不少了，許多人買了許多書，學習Python路上仍感障礙重重，原因是沒有選到好的書籍，市面上許多書籍的缺點是：\r\n\r\n　　1：Python語法講解不完整，沒有建立Python紮實語法的觀念\r\n　　2：用C、C++、Java觀念撰寫實例\r\n　　3：Python語法的精神與內涵未做說明\r\n　　4：Python進階語法未做解說\r\n　　5：基礎實例太少，沒經驗的讀者無法舉一反三\r\n　　6：模組介紹不足，應用範圍有限\r\n\r\n　　許多讀者因此買了一些書，讀完了，好像學會了，但到了網路看專家撰寫的程式往往看不懂。就這樣我決定撰寫一本用豐富、實用、有趣實例完整且深入講解Python語法的入門書籍。其實這本書也是目前市面上講解Python書籍中語法最完整、應用範圍最廣、範例最豐富的書籍。整本書從Python風格說起，拋棄C、C++、Java思維，將Python語法、內涵與精神功能火力全開，完全融入矽谷頂尖Python工程師的邏輯與設計風格。\r\n\r\n　　這是史上最多範例的Python書籍，有約1101個程式實例搭配約500個模組的函數，輔助約260個習題，外加126頁的習題電子書，用極深入、最詳細的態度講解Python語法的基礎與進階知識，例如：utf-8中文編碼、list、tuple、dict、set、bytes、bytearray、closure、lambda、Decorator、@property、@classmethod、@staticmathod…等。', '9789865501532', 'computer', 111, 2, 38),
(10, '陳零九 NINE CHEN / Sing to L9VE', '陳零九', 1079, '— 在愛裡絕望，就在愛裡重生 —\r\n \r\nSing to love.\r\nSing to me, and to you all.\r\n\r\n在回憶中創作，在音樂中前行；\r\n一趟遠赴他方的自我重生之旅。\r\n\r\n陳零九 Nine Chen\r\n第九張個人創作專輯【 Sing to L9VE 】\r\n2023年5月8號啟程預購，7月7號全球發行。', NULL, 'cd', 205, 3, 32),
(11, '魚丁糸 / 池堂怪談', '魚丁糸', 559, '翻開魚丁糸創團第一頁\r\n這是．．什麼怪談！\r\n魚丁糸首張全新專輯\r\n《池堂怪談》\r\n一場奇幻搖滾音樂冒險之旅\r\n收錄：〈我就奇怪〉、〈終點起點〉等全新單曲\r\n7/30 平行時空 開始預購\r\n9/17 池堂小心 怪談發行', NULL, 'cd', 98, 2, 500),
(12, '周杰倫 / 最偉大的作品', '周杰倫', 589, '當一件偉大的作品被創作出來時\r\n藝術家並不會知道\r\n自己成就了一整個藝術時代\r\n\r\n終於等到\r\n周杰倫JAY CHOU\r\n最偉大的作品Greatest Works Of Art\r\n「床邊故事」還在耳邊縈繞\r\n6年之後\r\n最偉大的作品\r\n即將問世！', NULL, 'cd', 40, 1, 1028),
(13, '碧昂絲 / 潮流復興', '碧昂絲', 489, '全球聽令 女帝駕到\r\n睽違六年 再度制霸樂壇\r\n混炸節奏 主宰流行樣貌\r\n流行女帝 碧昂絲 引領世界重生專輯 潮流復興\r\n8月12日 女帝駕到 引領重生', NULL, 'cd', 42, 2, 505),
(14, '怪奇科學研究所：42個腦洞大開的趣味科學故事', 'SME', 360, '　　法老王的詛咒？離奇死亡案件？你敢進去金字塔嗎？\r\n　　章魚哥用手「談戀愛」？記憶與學習能力近乎人類的章魚，為何至今尚未統治地球？\r\n　　什麼？電燈泡不是愛迪生發明的？史上最激烈的專利權爭奪戰！\r\n　　我們都是從小被騙到大的？百慕達三角的神祕真相！\r\n\r\n　　科學謎團＋驚人實驗＋里程時刻＋關鍵人物\r\n　　＊滿足每一位青少年好奇心的趣味科普書＊', '9789571380902', 'science', 102, 1, 43),
(15, '最有梗的理科教室：燒杯君與他的理科小夥伴', '学研プラス', 380, '最KUSO的漫畫、最好懂的理論\r\n你保證想上的理科教室！\r\n這間理科教室超有事、自然課好學好笑！\r\n連大人都驚呼，為什麼以前都讀不到！', '9789575035518', 'science', 32, 3, 77),
(16, '最有梗的元素教室：週期表君與他的元素小夥伴', 'うえたに夫婦', 380, '最KUSO的漫畫、最好懂的理論\r\n你保證想上的元素教室！\r\n化學元素超有梗，組成生活萬物大小事！\r\n這群陌生又很難念的化學元素，竟跟我們如此親近！\r\n\r\n繼《理科教室》燒杯君、《單位教室》公尺君後，\r\n上谷夫婦的新角色「週期表君」登場！\r\n死背的元素名詞，原來像尋寶密碼一樣有趣，\r\n枯燥直述的知識內容，變成暢快閱讀的漫畫！', '9789575039639', 'science', 22, 1, 115),
(17, '「科學偵探謎野真實」系列', '佐東みどり', 1750, '繼推理冒險小說必讀雙經典\r\n「怪盜亞森‧羅蘋」系列+「名偵探福爾摩斯」系列後，\r\n偵探界最受矚目的推理新星──謎野真實耀眼登場！', NULL, 'science', 32, 1, 65),
(18, '四大科學家：阿基米德、牛頓、達爾文、愛因斯坦', '劉思源', 320, '站在巨人的肩膀上看未來\r\n怎麼才能讓孩子站在巨人的肩膀上？\r\n唯一的方法就是，讓孩子閱讀偉人的故事。\r\n從偉大的生命中學習：\r\n如何發現問題？如何克服困難？\r\n如何提出解答？如何改變世界？', '9789861899978', 'science', 30, 3, 33),
(19, '小小科學人：100地球大發現', '傑羅姆‧馬丁', 480, '100% 你一定想跟朋友分享的圖解酷知識！\r\n一頁就解答一個你最想知道的地球大驚奇！\r\n \r\n　　為什麼沒有月球，地球就會劇烈擺動，造成災難？\r\n　　黃色橡皮小鴨如何協助海洋學家探索地球上的洋流？\r\n　　星期五、星期六和星期日，可以在同一時間出現？', '9789865535384', 'science', 84, 1, 23),
(20, '當河馬想動的時候再去推牠：52個科學家的趣味思考，改變了這世界！', '張文亮', 260, '晨讀最佳短篇科學故事集\r\n三屆金鼎獎、好書大家讀年度好書、開卷年度最佳童書得主\r\n臺大教授 張文亮 暢銷代表作 全新改版！\r\n★ 好書大家讀年度好書\r\n★ 行政院新聞局優良讀物\r\n★ 新北市滿天星閱讀計畫選書\r\n\r\n科學的發現，常始於一些有趣的人，問了不一樣的問題！\r\n世界的新知，常因科學家們以生命投入一些微不足道的小問題！', '9789577516862', 'science', 21, 1, 12),
(21, '草上飛科學世界探險：誰能在馬桶上拉小提琴？', '張文亮', 250, '臺大教授張文亮 暢銷代表作 全新改版！\r\n\r\n　　如何欣賞與使用馬桶？\r\n\r\n　　平凡的馬桶中，其實藏著精密的科學巧思！\r\n\r\n　　科學家是大自然之美的翻譯者，也是解決問題的實踐家。\r\n\r\n　　跟著愛發問的「草上飛」和無所不知的「教授」一起探索，你會發現：科學離我們好近，以科學的眼光看世界真有趣！\r\n\r\n　　叉子、筷子、時鐘、波羅麵包……最初是如何發明的？\r\n\r\n　　除夕夜和除法有什麼關係？中秋節的螃蟹會微笑？讀地圖可以訓練邏輯思考；菜市場是最棒的科學教室……\r\n\r\n　　讓孩子親近科學，引發主動追尋知識的嚮往，開闊人文視野！', '9789577516527', 'science', 56, 1, 45),
(22, '為什麼是這樣?超有趣自然生活科學圖解一點通！', 'Old Stairs Editorial Team', 350, '　　風靡國外自然生活百科全圖解知識書！\r\n　　滿足好奇，輕鬆成為自然生活科學知識王！\r\n\r\n　　聰明的人往往擁有好奇心，也是因為好奇讓聰明人不斷尋求新知識。\r\n　　就像小孩總是不停地問「為什麼？」，\r\n　　而充滿好奇與會問問題的孩子常常是聰明又富有創造力的。\r\n　　不過，重點是需滿足他的好奇，才會有所成長。\r\n　　大人不是百科全書，不可能每次都可以解答孩子的疑惑，\r\n　　所以可培養孩子從書上或網路找尋答案，也可以讓他們主動詢問其他師長。\r\n　　如果遏止提問或隨意給個答案，時間久了，孩子可能就不敢問了或不問了，\r\n　　這是非常可惜的事。\r\n　　其實，就算是大人，心中不時也會冒出「為什麼是這樣」的想法，\r\n　　只是沒有說出來。', '9786263240407', 'science', 53, 1, 23),
(23, '來自北海道的科學家：14位改變臺灣的日籍開拓者', '張文亮', 350, '　　張文亮教授感動分享\r\n　　◆改變臺灣的日籍開拓者的故事◆\r\n \r\n　　▌起先，科普作家張文亮教授在臺灣大學典藏室，找到一些日治時期關於學校及農學院創建的斷簡殘編，他爬梳這些塵封已久的素材，說故事給妻子聽。\r\n　　▌後來，妻子鼓勵他到日本北海道蒐集更多資料，把故事寫出來。\r\n　　▌遺憾的是，故事書寫還在進行，妻子卻已翩然遠行……\r\n　　▌張文亮教授強忍著淚水，將這些故事分享給更多讀者，並獻給天上的妻子。\r\n　　▌因為，生活在這片地上的人，都應該來認識這群改變臺灣的日籍開拓者！  ', '9786267200599', 'science', 45, 1, 98),
(24, '學生一定要認識01 西方科學家', '莊典亮', 380, '　　以清晰流暢的文筆，介紹動人心弦的科學家故事，以及他們在科學領域上的貢獻，讓孩子們建立脈絡、了解科學史，激發學習動機，一起來探究有趣的科學！\r\n \r\n　　✓精選15位學生一定要認識的西洋科學家，建立學習脈略。\r\n　　✓注音文字輕鬆讀，提升識字學習力。\r\n　　✓白話文全新改寫，閱讀能力沒負擔。\r\n　　✓劇情文字搭插圖，豐富視覺吸引目光專注力。\r\n　　✓閱讀理解策略和簡易寫作技巧教學，協助親師引導陪讀。\r\n　　✓附引導提問學習單，有效掌握閱讀重點。 \r\n　　✓提供小讀者閱讀心得選文範例，寫作力UP UP。', '9789860670974', 'science', 76, 1, 78),
(25, '科學柯南新聞直播室1：人工智慧', '青山剛昌', 350, '　　新聞×推理×科學×邏輯\r\n　　超前部署學習計畫！\r\n　　跟柯南一起掌握最強的科技新知！\r\n \r\n　　★符合108課綱提升跨領域素養\r\n \r\n　　阿笠博士與少年偵探團受邀體驗AI智慧屋，\r\n　　從水溫控管到防盜設備，都由人工智慧掌控，\r\n　　當眾人對科技的便利讚嘆不已時，\r\n　　卻不知已落入危及性命的圈套之中......', '9789576583513', 'science', 47, 1, 104),
(26, '【跟世界說嗨！】改變世界的19位科學家', '黃福基', 250, '不只有偉大成就，原來科學家並非完美天才！\r\n「跟世界說嗨！」系列，帶你認識世界人事物的大小事！\r\n \r\n　　．愛因斯坦討厭穿襪子？\r\n　　．牛頓差點成為農夫？\r\n \r\n　　你知道嗎？鼎鼎有名的科學家雖有了不起的成就，但一路順遂的人生勝利組其實少之又少！\r\n \r\n　　有的人從小生活貧困，有的人因戰爭被迫離鄉，有的人因為性別或性向被排擠……還有更多科學家因為突破性的創舉，無法受到社會認可。', '9789865588021', 'science', 78, 1, 122),
(27, '數學大圖鑑：伽利略科學大圖鑑1', '日本Newton Press', 630, '收納82個重要數學概念！\r\n掌握數學關鍵字，是學好數學的第一步！\r\n\r\n　　數學是許多學科的基礎，數學沒學好，理科很難學得好。而且，數學非常講究「先備知識」，重要的觀念沒有建立好，以後的學習一定會碰到瓶頸。\r\n\r\n　　人人出版取得日本牛頓授權，推出全新「伽利略科學大圖鑑系列」，第一本就推出《數學大圖鑑》，完整收入重要的數學觀念，使用關鍵字引導學習，以一個跨頁來呈現一個主題，好學習，好吸收。除了基礎的方程式、對數、三角函數、機率，也有較為深奧的四色問題、費馬最終定理等，精采圖解，由淺而深，循序漸進。', '9789864612352', 'science', 53, 1, 178),
(28, '天天在家玩科學（暢銷改版）', 'Om Books出版', 450, '★清楚標明實驗難易程度（共3級）、操作所需時間。\r\n★圖示的實驗材料大多家中可得，無需花大錢就能輕鬆動手做。\r\n★詳列實驗步驟，一步一步做就能體驗有趣的科學實驗。\r\n★每個實驗都附上簡單的原理解釋，方便孩子理解。\r\n★適時輔以生活周遭可見的科學趣聞與現象，讓孩子更容易親近科學。', '9789864778614', 'science', 87, 1, 46),
(29, '小小科學人：100食物大發現', '山姆．巴爾', 480, '100% 你一定想跟朋友分享的圖解酷知識！\r\n一頁就解答一個你最想知道的食物大驚奇！\r\n\r\n　　吃太多糖會讓你變得暴躁易怒！\r\n　　被人吃掉的鯊魚，其實比鯊魚吃的人多好多倍！\r\n　　帶榴槤不能坐公車？\r\n　　討厭吃某種蔬菜，祕密其實藏在DNA裡？\r\n　　乳牛想睡的時候擠的奶，你喝了也會想睡覺？', '9789864796472', 'science', 34, 3, 78),
(30, '歡喜來過節：中國節日繪本故事（端午節、中秋節、過年、中元節、清明節、十二生肖）', '艾德娜', 792, '為孩子量身打造最好看節日故事\r\n閱讀節日由來　了解民間習俗\r\n\r\n　　過節對孩子的意義在於可以和孩子談天、讓孩子感受家人團聚的意義，並且讓孩子描述過節的經驗、想法，充分表達「分享」和傳達祝福。繪本以生動詳實的描述，交代年節的來龍去脈，建立節日故事的基本認識，內容包括節日故事、習俗活動、節日遊戲三部分。', '4715006453397', 'discount', 369, 1, 545),
(31, '中秋端午節夜光版套組', '呦呦童', 550, '立體壯觀的端午情景，可以動手操作的多元小機關，全家過個熱熱鬧鬧端午節！\r\n「粽子香，香廚房；艾葉香，香滿堂。桃枝插在大門上，\r\n出門一望麥兒黃。這兒端陽，那兒端陽，處處都端陽。」\r\n「端午節」是華人迎接夏季的重要傳統節日，\r\n灑掃屋舍、插艾草菖蒲、包粽子、賽龍舟等習俗，流傳至今。\r\n透過這本書《熱鬧端午節》帶著孩子重新感受端午節的習俗，傳承千年文化傳統。', '9786267013847', 'discount', 456, 1, 654),
(32, '歡樂節慶點心', '王景茹', 182, '60道健康美味，16個節日文化典故。\r\n陪您一整年節慶，凝聚全家人情感！\r\n\r\n\r\n　　傳統文化中有許多節日與慶典，都帶著豐富的相關典故與食俗。本書收錄最完整的16個中西節日糕點，包含中式三大節慶：春節、端午節、中秋節，尚有元宵節、清明節、七夕情人節，甚至有暖心豐收的立冬、冬至、臘八節。再加上現今中西文化融合，許多西洋的節日，例如：西洋情人節、白色情人節、復活節、萬聖節、感恩節、聖誕節受到人們的喜愛，以及表達對父母撫育之情的父親節、母親節。透過色香味俱全的美食，不僅可以讓您大飽口福，享受做點心的樂趣外，更能凝聚一家人歡樂的氣氛，讓生活充滿笑聲與樂趣！', '9789865813215', 'discount', 330, 1, 322),
(33, '樂高小小世界3：我的節日造型積木DIY！耶誕節、萬聖節、春節、端午、中秋', '戴樂高', 164, '跟著戴樂高老師疊樂高\r\n發揮創意堆砌屬於自己節日吧！\r\n    成為造字高手，拚磚、平面到立體字都辦得到\r\n    小朋友最愛的節慶童遊趣，用積木角色說故事\r\n    中國與西洋三大節慶盛會，處處發現驚奇\r\n    翻轉積木創作，輕鬆組出具個人特色又有趣的主題及場景', '9789869499736', 'discount', 741, 1, 501),
(34, '端午故事', '韓貴新', 138, '　　「五月五，慶端午。」童謠吟唱出流傳久遠的風俗，\r\n　　帶來了中國民間歡度佳節的愉快氣氛！\r\n\r\n　　鬥百草、製香包，賽龍舟、插艾草，妙趣橫生古風存；\r\n　　熱熱鬧鬧的端午節因各種活動而繽紛繁盛。\r\n\r\n　　舊傳，農曆五月是「毒」月，所謂：「正陰陽衝會之時。」\r\n\r\n　　因此，古人便憑此形形色色的慣習以擋災抗煞。\r\n\r\n　　祭屈原、緬介子，憶句踐、悲曹娥，當年史事遺韻遠；\r\n　　承續千載的端午節有諸多傳說而底蘊深厚。\r\n\r\n　　在過節的悠久歷史中，傳統習俗亦有所淘洗與流變，\r\n　　然而，人民百姓就在這滾滾逝水中立命安身。\r\n\r\n　　有關端午的起源，至今仍說法不一、意見分歧，\r\n　　是「惡自端午生」有理？還是「神龍在心中」可信？\r\n\r\n　　本書採擷風謠、臚列史實，期能將端午節的每個故事，\r\n　　精彩呈現在你的面前，深刻烙印於你的心田！', '9789573613282', 'discount', 102, 1, 95),
(35, '粽子歷險記：端午節的故事', '詹夢莉', 193, '端午節的故事\r\n\r\n　　全身胖嘟嘟的粽子，肚子裡裝著香菇、蛋黃、瘦肉、花生，穿著竹葉作的衣服。突然來了一艘好大的船，像一條彩色的龍，粽子兄弟要上船旅行去囉！\r\n\r\n本書特色\r\n\r\n　　格林希爾［傳承系列］繪本，將中國傳統節慶用最生動有趣的方式重新詮釋，給您家小寶貝全新的幻想空間，並學習中國文化與傳統；中英文簡易教學，配上精美的圖畫，更能夠幫助小朋友記住單字與練習簡單的英文句型。家長可以透過QRcode與孩子一起閱讀學習，讓閱讀不只是平面的紙上活動喔！', '9789574516476', 'discount', 132, 1, 78),
(36, '吉他手 / 陳綺貞 (白膠)', '陳綺貞', 1519, '在台上唱的 吉他手陳綺貞 vs Groupies\r\n學生時代的陳綺貞，經常翹課去聽演唱會。這樣的習慣一直維持到現在，在演唱會中變回小歌迷。她不只看台上的演出，也觀察台下的歌迷，以新歌「吉他手」寫出小歌迷想要引起偶像注意，在短短一秒的視線交錯中投注了所有期待的心情。那種Groupies式衝鋒陷陣，義無反顧的熱情，也是最狂熱的愛情形式\r\n——愛情是一場演唱會，每個人都是裡面的瘋狂小歌迷。', NULL, 'cd', 132, 1, 55),
(37, '紅髮艾德 / 新專輯《-》普通盤 Softpak', '紅髮艾德', 519, '◎締造全球破1.5億銷量的英倫唱作天王經歷人生低潮，推出一張對生命反思、對自我療癒的全新專輯，也是數學音樂方程式最終章！\r\n◎協助泰勒絲音樂轉型的幕後重要推手Aaron Dessner，還有操刀過艾薇兒、布蘭妮、海爾希等天后作品的多位製作人攜手掌盤！\r\n◎首波主打〈Eyes Closed〉寫給過世摯友賈瑪爾，Spotify累積7643萬串流量，空降英國金榜冠軍！\r\n \r\n紅髮艾德(Ed Sheeran)數學音樂方程式進入最終章《−》，領悟減法的人生態度，看透生死，從失去中學會重新愛自己，準備迎接全新減號時代！紅髮艾德累積多達7座全英音樂獎(入圍22次)＋4座葛萊美獎(入圍15次)肯定，選進英國首本貴族年鑑德倍禮(Debrett’s)的『英國最具影響力人物』名單。才不過12年的時間，驚人締造全球破1.5億銷量的英倫唱作天王，2019年12月英國金榜官方認證，加總專輯和單曲銷量，紅髮艾德立足2010年代全英最成功的藝人；截自2022年4月，入席Spotify最受關注的藝人；僅次於Elton John(2018統計到2023年)，憑藉《÷ Tour》(2017統計到2019年)締造有史以來第二高巡演票房(7.7億美金)紀錄；2022年4月起跑，預計2023年9月結束的《+–=÷× Tour》，已破3.3億美金票房，在新專輯《−》推出後，勢必再造一波高潮！', NULL, 'cd', 52, 1, 87),
(38, '李榮浩 / 縱橫四海', '李榮浩', 689, '『唱作大神』李榮浩\r\n2022全新專輯 《縱橫四海》\r\n\r\n李榮浩全新創作 10首最具李榮浩風格的歌曲\r\n借那些浪盡的青春 以儆此生\r\n\r\n華語樂壇2022年末壓軸震撼\r\n\r\n『唱作大神』李榮浩\r\n全新創作大碟【縱橫四海】\r\n12.21正式發行 華納音樂', NULL, 'cd', 89, 1, 87),
(39, '邱鋒澤 Feng Ze / DEEP AWAKENING 見過深淵的人 (平裝版)', '邱鋒澤', 609, '[DEEP AWAKENING見過深淵的人]\r\n \r\n閉上眼睛， 將情緒鬆綁，沉入自己最深的海。\r\n卸下多餘的防衛、解掉龐雜的慾念，用誠實的心靈面對海底的幽暗。\r\n \r\n幽暗並不會把我們帶走。\r\n幽暗只是教導我們凝視深淵的方法，教導我們不看見其他的，只看見自己。\r\n教導我們不需要光也能變得透明。\r\n \r\n變得透明以後，記得再次睜開眼。\r\n是否想起了誰？或是想起生活裡令你留戀的一切。\r\n這一次，會用更強壯的姿態甦醒，找到繼續生活的重心。', NULL, 'cd', 53, 1, 78),
(40, '理想混蛋－ 關掉／打開', '理想混蛋', 534, '「過份扭曲的世界，誰來按下重啟鍵？」\r\n先關掉，再打開；\r\n雙耳全面重置，心靈重新啟動。\r\n關掉最壞的時代，打開最好的時代。\r\n理想混蛋 第二張全創作專輯 【關掉／打開】', NULL, 'cd', 80, 1, 73),
(41, '韋禮安 / 明天再見', '韋禮安', 649, '中英日韓音樂金榜四冠王\r\n韋禮安WEIBIRD\r\n2022全新華語專輯\r\n明天再見\r\nGood Afternoon\r\nGood Evening\r\n and \r\nGoodnight\r\n\r\n從「生活的聲音相簿搜集」\r\n到「生命電影詩的音樂導演」\r\n懷抱著製作「最後一張專輯的心情」\r\n創作出各種形式的「再見」', NULL, 'cd', 235, 1, 123),
(42, '吳青峰 / 《冊葉一：一與一》2LP黑膠', '吳青峰', 2180, '經歷《16葉》 翻過《上下冊》\r\n這是你的印象深刻  也是他的集結成冊\r\n吳青峰《冊葉一：一與一》\r\n黑膠典藏 就是現在\r\n\r\n德國Optimal Media製造  給聽覺最細膩的感動\r\n180 Grams 33 1/3 R.P.M.\r\n質感珍藏 大幅擁有\r\n吳青峰《冊葉一：一與一》 2LPs 黑膠\r\n11月12日 正式發行 \r\n\r\n翻開他的詩詞曲，闔上我們的《冊葉一》', NULL, 'cd', 43, 1, 234),
(43, '魯迅作品精選6：中國小說史略【經典新版】', '魯迅', 240, '※中國現代文學的奠基人和開山巨匠；最勇於面對時代與人性黑暗的作家；掀起文壇筆戰與爭議最多的創作者！\r\n※原是魯迅在北大講「中國小說史」的講義，後編輯成書，共有廿八篇，一九二年集結成書。\r\n※敘述中國古代小說發生、發展、演變過程，始於神話與傳說，迄於清末譴責小說，是中國第一部小說專史，被譽為是開山之作。\r\n\r\n　　中國之小說自來無史；有之，則先見於外國人所作之中國文學史中，而後中國人所作者中亦有之，然其量皆不及全書之什一，故於小說仍不詳。此稿雖專史，亦粗略也。自慮不善言談，聽者或多不憭，則疏其大要，寫印以賦同人。——魯迅', '9789863525530', 'novel', 238, 1, 141),
(44, '西遊記(典藏版)', '吳承恩', 340, '　　由意志堅定、全心向佛的名僧領隊，\r\n　　無論是上鬧天宮、下掃地府的石猴大聖，\r\n　　或者好吃懶做、貪愛美色的豬頭元帥，\r\n　　以及外表猙獰、內心老實的河妖將軍，\r\n　　甚至是會說人話的白龍馬，\r\n　　都將各就各位，挑擔上路。\r\n\r\n　　且看最強小隊如何走過十萬八千里，披荊斬棘、斬妖除魔，\r\n　　通過重重劫難，上西天取得經書，普渡聚生！', '4718373540318', 'novel', 463, 1, 43),
(45, '白話西遊記', '吳承恩', 200, '　　◎《西遊記》是中國古典文學四大名著之一，進入古典文學世界，就從西遊記開始。\r\n\r\n　　◎《白話西遊記》全書共一冊，分三十六回編排。每回都用白話文來敘述故事大綱，文字淺顯易懂，內容生動活潑，適合國小程度的學生閱讀。\r\n\r\n　　◎在每一回的內容中，適時放入與故事相關的成語，並附有成語解釋和舉例應用，讓孩子一邊看故事，一邊學成語；而在每回故事之後，還附有閱讀測驗，可以即時驗收讀後成果。\r\n\r\n　　◎另外全冊穿插趣味歇後語、趣味諺語等內容，並附精美插畫，增加整本書的精彩度和可讀性。', '9789868576711', 'novel', 432, 1, 124),
(46, '旅跑．日本：歐陽靖寫給大家的跑步旅遊書（一般版）', '歐陽靖', 350, '你一定要去日本跑步，\r\n不只是一場賽事，\r\n而且讓你再活第二次。\r\n\r\n　　東京、沖繩、靜崗、鳥取、長野、北海道千歲，\r\n　　6場非去不可的日本經典馬拉松賽事，\r\n　　10個來自各行各業的跑者故事，\r\n　　50個作者私藏的旅跑景點，熱血起跑中！\r\n\r\n　　「跑過不同國家的賽事，享受當地美景美食。\r\n　　但我一直相信『馬拉松場上最美的風景是人』，\r\n　　沿途為跑者全力應援的加油民眾，\r\n　　滿懷笑容真切地說：『您辛苦了！』的志工，\r\n　　帶著感恩的心回頭向終點線鞠躬的跑者。\r\n　　還有用盡全力通過終點線的那一刻，\r\n　　原來那就是我人生中最圓滿的一刻。」——歐陽靖', '9789862136249', 'travel', 132, 1, 45),
(47, '遊樂園：親子旅遊團長小禎最強樂園攻略！機票、門票一起撿便宜，嗨玩16座世界樂園、買翻附近outlet', '小禎（胡盈禎）', 390, '　　行程聰明規劃，大人小孩需求一次滿足，機票、門票、住宿一起撿便宜！\r\n　　童心滿滿、回憶滿滿，戰利品也滿滿的完美之旅！\r\n\r\n　　※全世界16座知名主題樂園，完整收錄\r\n　　類型不同的樂園，玩法自然也不同！大型樂園掌握必玩必買重點，中小型樂園一天開心玩透透，複合型樂園寓教於樂最有趣。\r\n\r\n　　※迪士尼、環球影城，最省時省力通關攻略\r\n　　熱門主題樂園該怎麼玩才不用大排長龍？教你利用快速通關、排隊密技、好用APP，輕鬆玩到所有熱門遊樂設施。\r\n\r\n　　※親子共遊，滿足大人小孩的行程規劃心法\r\n　　根據孩子的年齡，挑選他喜愛的遊樂設施，不可錯過的遊行與煙火，是旅程中最棒的回憶；再到outlet shopping一番，大人也樂開懷。\r\n\r\n　　※機票、門票、住宿，撿便宜祕訣不藏私\r\n　　善用比價網站，把握促銷時機，搶到便宜機票與優質住宿。樂園門票、套票上網購，票價瞬間省超多。', '9789571370477', 'travel', 425, 1, 25),
(48, '北歐女孩日本旅遊好吃驚', 'Åsa Ekström', 260, '　　★日本各地充滿著比東京更多的不可思議！？\r\n　　★北歐女孩系列累計銷售130000本！瑞典漫畫家歐莎啟程環遊日本！\r\n　　★看過本書後會覺得日常變得不一樣，日本「異」文化圖文日記，眾所期盼的最新作品！\r\n\r\n　　北歐女孩歐莎前往沖繩、京都、南東北、廣島與福岡，尋找未知的日本奧秘，\r\n　　在旅途中發現新鮮的驚奇，還有感動的邂逅。\r\n　　在京都挑戰舞妓體驗、\r\n　　在沖繩的超商聽到店員問「要加熱飯糰嗎？」感到驚奇、\r\n　　在南東北看到空無一人的路邊販售著蔬菜，而深受感動。\r\n　　即使對日本人而言是熟悉的光景，\r\n　　從外國人的角度來看，就會有許多不同的新發現。\r\n　　收錄八十頁以上未刊登在部落格上的全新繪製漫畫，\r\n　　看過本書後會覺得日常變得不一樣，日本「異」文化圖文日記，眾所期盼的最新作品！', '9789864733149', 'travel', 78, 1, 79),
(49, '量子電腦與量子計算：IBM Q Experience實作', '張元翔', 580, '　　本書介紹量子電腦與量子計算的理論基礎，並結合IBM Q Experience實作，帶領讀者初步窺探這個嶄新而有趣的領域，迎接「量子霸權」時代的來臨。\r\n\r\n　　採主題介紹方式，循序漸進、深入淺出。內容涵蓋量子電腦、量子力學、數學、量子硬體、量子計算、量子演算法等理論基礎，並結合IBM Q Experience進行電路作曲家、Python與Qiskit程式等實作過程，強調理論與實務的緊密結合，實現「做中學」的學習理念，期望協助您快速入門。\r\n\r\n　　同時介紹具有代表性的量子計算與量子演算法，包含豐富的Python程式範例，協助您實際體驗IBM Q量子電腦的模擬與實作。', '9789865025199', 'computer', 42, 1, 78),
(50, '一本書秒殺電腦視覺最新應用：80個Python大師級實例', '張德豐', 880, '★★★★★【電腦視覺】、【80個Python大師級實例】★★★★★\r\n\r\n鷹眼王者的銳利捕捉，電腦視覺應用精準秒殺！\r\n\r\n　　本書技術重點\r\n　　✪Python電腦視覺基礎，包括常用的函數庫\r\n　　✪各種去霧演算法、空域增強，時域增強，色階調整、Hough變換檢測\r\n　　✪分割車牌處理、包括定位，字元處理及辨識\r\n　　✪分水嶺演算法，用在醫學診斷\r\n　　✪CNN及SVC手寫數字辨識、使用AlexNet\r\n　　✪OCR原理及實作、小波技術處理\r\n　　✪SVD、PCA、K-Means圖型壓縮原理\r\n　　✪圖型搜尋、比對、角點特徵偵測、Harris演算法、FAST演算法\r\n　　✪運動目標偵測、幀差分法、背景差分法、光流法\r\n　　✪浮水印技術、大腦影像分析、閾值分割、區域生長實作\r\n　　✪自動駕駛實作、包括環境感知、行為決策，路徑規劃及運動控制\r\n　　✪物件偵測，包括RCNN及YOLO\r\n　　✪視覺分析應用實例，包括Arcade Game製作，停車場自動車牌辨識系統開發', '9789860776812', 'computer', 57, 1, 78),
(51, '電腦視覺機器學習實務｜建立端到端的影像機器學習', 'Valliappa Lakshmanan', 780, '　　「本書全面介紹深度電腦視覺的最先進作法，在Keras中建構端到端生產系統，提供經過實戰檢驗的最佳實務解決方案。」\r\n　　—François Chollet\r\n　　深度學習研究者和Keras創造者\r\n\r\n　　這本實用指南向您展示了如何使用機器學習模型從影像中淬取資訊。ML工程師和資料科學家將會學習經過驗證的ML技術來解決各種影像問題，包括分類、物件偵測、自編碼器、影像產生、計數和圖說產生。本書卓越的介紹了端到端深度學習：資料集建立、資料前置處理、模型設計、模型訓練、評估、部署和可解釋性。\r\n\r\n　　Google工程師Valliappa Lakshmanan、Martin Görner和Ryan Gillard向您展示了如何開發準確且可解釋的電腦視覺ML模型，並使用強大的ML架構以靈活且可維護的方式將它們投入大規模生產。您將學習如何使用以TensorFlow和Keras編寫的模型進行設計、訓練、評估和預測。', '9786263242074', 'computer', 102, 1, 457),
(52, '電腦科學LinkIt設計物聯網應用', '曾希哲', 480, '　　本書以LinkIt7697開發板為主，帶您進入物聯網的世界，適合入門玩家學習，或作為中學開設物聯網特色課程的教材。\r\n\r\n本書特色\r\n\r\n　　1、以LinkIt7697為控制核心，帶您手把手由基礎學習入門，最後進入手機及Wi-Fi遠端遙控，每個範例簡單易懂。\r\n　　2、手機遙控部分搭配聯發科的LinkIt Remote App，只需撰寫7697開發板上的程式，而且Android及iSO中均可使用。\r\n　　3、Wi-Fi遠端遙控部分搭配聯發科的MCS物聯網服務平台，免架設伺服器，免寫伺服端程式。\r\n　　4、書中延伸學習提供學習眉角，讓您輕鬆學習，不卡關!!', '9789869329965', 'computer', 345, 1, 78),
(53, '量子電腦應用與世界級競賽實務-社會用書(一品)', '林志鴻', 780, '　　適用對象\r\n　　本書為Q世代而生，適合對量子電腦有興趣的中學、大學生，到想了解趨勢與技術細節的企業老闆\r\n \r\n　　使用功效\r\n　　本書從簡到難，從入門到進階都有詳細的講解，我們以粗淺，而不失深度的量子物理和量子計算的基礎數學開場，再到編寫量子程式的 QISKIT 套件，緊接著的是各個發揮量子優勢的演算法，Deutsch-Josza演算法、量子傅立葉轉換、量子相位估計，破解RSA用的Shor演算法，模擬化學的新希望VQE演算法、量子隨機行走，後續也有量子搜尋Grove演算法的教學和實例 。接著是其他書中少見的作者親自參加量子計算相關競賽收穫到的經驗與其中各個題目的詳解，最後以現在最有希望的幾種量子電腦硬體作法簡介壓軸。', '9789860693140', 'computer', 123, 1, 321),
(54, 'Stranger in a Strange Land', 'Heinlein', 630, 'The complete, uncut version of Robert A. Heinlein\'s all-time masterpiece, the brilliant novel that grew from a cult favorite to a bestseller to a science fiction classic.\r\n\r\nRaised by Martians on Mars, Valentine Michael Smith is a human who has never seen another member of his species. Sent to Earth, he is a stranger who must learn what it is to be a man. But his own beliefs and his powers far exceed the limits of humankind, and as he teaches them about grokking and water-sharing, he also inspires a transformation that will alter Earth\'s inhabitants forever...', '9780441788385', 'bill', 213, 1, 124),
(55, 'Surrender: 40 Songs, One Story', 'Bono', 1190, '傳奇愛爾蘭U2樂隊主唱－波諾，完整個人回憶錄\r\n \r\n        波諾，藝術家、社會運動家，同時為世界知名樂團U2主唱，開誠布公地寫下關於自己的回憶錄，紀錄他這一路精彩不凡的人生，紀錄那些他面對的挑戰，以及紀錄那些人生路上的美好相遇。\r\n \r\n        「當我開始著手寫這本書，我希望的是能夠更詳細地去描述那些我曾經寫進歌裡的人事物，那些我人生曾有的可能性。挑選『Surrender』一詞為書名，對我而言非常有意義，當初在整理本書內容時，這是唯一盤旋在我腦海裡的詞彙。至今我仍奉其為旨，無論在樂團裡、婚姻裡、信仰裡，甚至我作為社會運動家的生活裡。這是關於一個朝聖者遲遲無進展的故事⋯⋯以及一路上好玩的事。」\r\n \r\n        身為世界樂壇中指標性的人物，同時是公益組織ONE的共同創辦人，波諾的職業生涯已被報導、書寫過無數次，然而此次是由波諾親手執筆，以他本人角度重新寫下其不同凡響的人生故事。且看這個來自都柏林的男孩，如何面對14歲時突如其來的喪母之痛，一路走到成軍U2並帶領成員們成為世界最具影響力樂團之一，以及近20年，他又投入了多少心力在消除世界上的貧窮與愛滋病現象等社會運動。以坦率並幽默的文筆，自我揭露，向眾人展現關於波諾的世界。(文/博客來編譯)', '9780525521044', 'bill', 123, 1, 458),
(56, 'Team of Rivals: The Political Genius of Abraham Lincoln', 'Goodwin', 770, '除了聖經，美國總統歐巴馬最想帶進白宮的書\r\n如何讓敵人變戰友\r\n普立茲獎得主Doris Kearns Goodwin經典巨著\r\n\r\n\r\n　　林肯獎\r\n　　美國歷史圖書獎\r\n　　美國全國圖書評論獎決選\r\n　　《紐約時報》暢銷書', '9780743270755', 'bill', 365, 1, 122),
(57, 'Mendeleyev’s Dream: The Quest for the Elements', 'Strathern', 978, 'The wondrous and illuminating story of humankind’s quest to discover the fundamentals of chemistry, culminating in Mendeleyev’s dream of the Periodic Table.\r\n\r\n**One of Bill Gates’ Top Five Book Recommendations**\r\n\r\nIn 1869 Russian scientist Dmitri Mendeleyev was puzzling over a way to bring order to the fledgling science of chemistry. Wearied by the effort, he fell asleep at his desk. What he dreamed would fundamentally change the way we see the world.\r\n\r\nFraming this history is the life story of the nineteenth-century Russian scientist Dmitri Mendeleyev, who fell asleep at his desk and awoke after conceiving the periodic table in a dream-the template upon which modern chemistry is founded and the formulation of which marked chemistry’s coming of age as a science. From ancient philosophy through medieval alchemy to the splitting of the atom, this is the true story of the birth of chemistry and the role of one man’s dream.\r\n\r\nIn this elegant, erudite, and entertaining book, Paul Strathern unravels the quixotic history of chemistry through the quest for the elements.', '9781643130699', 'bill', 254, 1, 87),
(58, 'The Inner Game of Tennis: The Classic Guide to the Mental Side of Peak Performance', 'Gallwey', 595, 'An accessible, invaluable guide to mastering your ＂inner game＂ to ensure success on and off the court--part of the bestselling Inner Game series, with more than one million copies sold!\r\n\r\n＂Groundbreaking . . . [The Inner Game of Tennis is] the best book on tennis that I have ever read, and its profound advice applies to many other parts of life.＂--Bill Gates, GatesNotes (＂Five of my All-Time Favorite Books＂)\r\n\r\nMaster your game from the inside out!', '9780679778318', 'bill', 45, 1, 80);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_number` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `user_pw` varchar(255) NOT NULL,
  `Rank` int UNSIGNED NOT NULL DEFAULT '1' COMMENT '1/2/3 brown/silver/gold',
  `email` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `phone` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `birth` date DEFAULT NULL,
  PRIMARY KEY (`user_number`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `user_number` (`user_number`),
  KEY `user_number_2` (`user_number`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COMMENT='for user';

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_number`, `user_id`, `user_pw`, `Rank`, `email`, `phone`, `birth`) VALUES
(1, 'ubereats', '$2y$10$wF/0.PwAAa.QPGZt7zR8DOQ9Jz102Fi8WW9btEsNX/6dpqqOGUVGK', 1, 'ubereats@gmail.com', '', '2010-01-10'),
(11, 'aaa', '$2y$10$AfvJNS5lbzN/tBs6DzwnWeT.ZnuRIBao9AtmHRMIr18BGC3RAc8Ti', 1, 'abc@gmail.com', '', '2020-10-10'),
(12, 'zzz', '$2y$10$2qVYrJVNNHAxbnH.jklYbuWkEgEG3Yo2LtdOfQNqksj9Hg.XRX5N2', 1, 'abc@gmail.com', '0912345678', '2020-10-15'),
(13, 'test', '$2y$10$tkeKknW/hEQaN5KJHF2iRep1PT5xLUi9aSOf3iq7PVHn2Mp0d7rx.', 1, 'abc@gmail.com', '', '2000-10-20'),
(14, 'qwe', '$2y$10$sbf.H4S5IBgYpncw6hHko.sCzfwMzgEDxNSqQf674hbhI8visHJr.', 1, 'abcd@gmail.com', '', '2000-10-20'),
(15, 'asd', '$2y$10$YVly9z1onc3GD2R/JV5qL.R2HBuhYg3/y4UCB2vhLundsVpL9pRde', 1, 'asdd@gmail.com', '0912345680', '2000-10-20'),
(16, 'zxc', '$2y$10$TBMtlcMFMIDM12/1AhHhCOewOthyRvuJhnhJL.gPZTzZOKhtse2um', 1, 'zxcc@gmail.com', '0987654321', '2000-10-15'),
(17, 'qqqqq', '$2y$10$4YwZMOiEG6DwY0ljd1K8mO.DC5r5FnJqugJywOa.IDBogFeYmBsF.', 1, 'qqqqqq@gmail.com', '0987654321', '2000-10-20'),
(18, 'aaaaa', '$2y$10$aba/PDfbedcz/iDRczxVq.aCs6H.x81oc8mQ2kMXtJud904samldy', 1, 'aaaaa@gmail.com', '0987654123', '2000-10-15'),
(19, 'qwerty', '$2y$10$R000mIMkBtVS.2AovHP92efyOuSrCtpR3xcp/eMdJNXfEb3mmbf7y', 1, 'qwerty@yahoo.com.tw', '0987654321', '2000-01-01');

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `order_pri`
--
ALTER TABLE `order_pri`
  ADD CONSTRAINT `order_pri_ibfk_1` FOREIGN KEY (`user_number`) REFERENCES `user` (`user_number`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- 資料表的限制式 `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_pri` (`ID`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `product` (`ID`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

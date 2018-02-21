-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-04-18 08:02:18
-- 服务器版本： 5.5.23-log
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ele`
--

-- --------------------------------------------------------

--
-- 表的结构 `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shopname` varchar(50) NOT NULL,
  `name` varchar(8) NOT NULL,
  `info` varchar(100) NOT NULL,
  `price` int(3) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `ad` varchar(10) NOT NULL DEFAULT '否',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `food`
--

INSERT INTO `food` (`id`, `shopname`, `name`, `info`, `price`, `pic`, `type`, `ad`) VALUES
(10, '状元茶', '罗宋汤', '美味可口', 10, '/fooduploads/7dfe051f8c560c42be592d72a873306c.jpg', '主打菜', '否'),
(11, '状元茶', '铜锣烧', '哆啦A梦的最爱', 5, '/fooduploads/2585feb91854647e8e2282b866a89481.jpg', '甜点', '否'),
(12, '状元茶', '鲜芋仙招牌', '清凉避暑', 22, '/fooduploads/83f642eb56be01311943f087079236c0.jpg', '主打菜', '否'),
(13, '状元茶', '红豆牛奶冰', '红豆甜甜的', 15, '/fooduploads/0c906413879095cad8ea3b6e85c43163.jpg', '主打菜', '否'),
(14, '状元茶', '招牌烧仙草', '烧仙草具备有去干降火，美容养颜的功效，备受当下女性的青睐。', 33, '/fooduploads/8256fdc22bcc9b2812c60b79799e0241.jpg', '甜点', '否'),
(15, '年糕火锅', '单人套餐', '6荤6素约450克（荤素随机搭配营养又实惠）送米饭1份', 34, '/fooduploads/b47156b4f549b04b4370aabe8b2543e6.jpg', '主打菜', '已加入'),
(9, '状元茶', '四果汤', '味甜爽口，清凉解毒。', 12, '/fooduploads/3826d1a9a01084ee1a2e59d5a0fafb10.jpg', '主打菜', '否'),
(16, '年糕火锅', '双人套餐', '8荤8素约800克（荤素随机搭配营养又美味）送2份米饭', 68, '/fooduploads/7f1c7af6dd13864a0932f095f3a08481.jpg', '主打菜', '否'),
(17, '年糕火锅', '3人豪华套餐', '8荤8素约1.3千克（荤素随机搭配）送3份米饭', 99, '/fooduploads/f20f02a8ce9dd683953a5adfe5799c77.jpg', '主打菜', '否'),
(18, '皇府', '吉味双拼饭', '火腿+鸡肉', 25, '/fooduploads/82eb917829d5c2d329d0fea4943ba1e7.jpg', '主打菜', '已加入'),
(19, '皇府', '照烧鸡排饭', '鸡肉+蔬菜（西兰花、胡萝卜、菜花）', 24, '/fooduploads/7025b45462d015152a54f6ab7f831058.jpg', '主打菜', '已加入'),
(20, '皇府', '金枪鱼土豆泥', '鸡肉+牛肉+洋葱+蔬菜（西兰花、胡萝卜、菜花）', 33, '/fooduploads/8cf3bd074c06f6036e0664330df2f1bb.jpg', '主打菜', '否'),
(21, '皇府', '芝士培根碗', '芝士培根吉多士+茶碗蒸+经典港式奶茶（大）', 33, '/fooduploads/c18094fd3ebf2974645e20bb9d369755.jpg', '主食', '否'),
(22, '快乐时光', '美式咖啡', '意大利进口咖啡豆现磨制作', 15, '/fooduploads/1b680f938fba66787743b8b8632e0b63.jpg', '主打菜', '否'),
(23, '快乐时光', '现榨橙汁', '100%纯果蔬汁，现点现榨。\r\n100%纯果蔬汁，现点现榨。\r\n100%鲜榨果汁', 18, '/fooduploads/644dba017218a14081ab6d4719a0341e.jpg', '主打菜', '否'),
(24, '六德麻辣烫', '京都八点', '三文鱼、蟹钳肉、凤尾虾、烤鳗鱼、芥末章鱼、龙虾沙拉、', 44, '/fooduploads/e5ab829154ebcbb6ddacf08311462daf.jpg', '主打菜', '已加入'),
(25, '王一碗糕点', '天然奶油水果蛋糕', '18cmX18cm', 99, '/fooduploads/8af8df606fb6d1c10c06f0ba22f4d0e4.jpg', '主打菜', '否'),
(26, '麦谷粒', '慕斯蛋糕', '纯手工制作', 128, '/fooduploads/14e961b0b134bbb008b35b96957ae839.jpg', '主打菜', '否'),
(27, '麦谷粒', '红丝绒裸蛋糕', '甜甜丝滑', 75, '/fooduploads/fcc717dd24e5775dbc428f2b5550bc98.jpg', '主打菜', '已加入'),
(28, '麦谷粒', '迷恋|果缤纷', '七彩水果', 221, '/fooduploads/d4f38e1880cbf7e53bf1a4bcfa16290d.jpg', '主打菜', '否'),
(29, '嘻嘻甜品', '猫山王榴莲', '猫山王是最顶级的榴莲品种', 150, '/fooduploads/6f1c4dd95033c527bab9f9e76356175b.jpg', '主打菜', '否'),
(30, '嘻嘻甜品', '缤纷水果戚风', '蛋糕坯内含有满满的当季水果', 33, '/fooduploads/0d4123813757cfaa4b6f36e5abf45dce.jpg', '主打菜', '已加入'),
(31, '嘻嘻甜品', '泡泡公主', '表面有芭比娃娃泡泡浴的造型', 52, '/fooduploads/80a4337bbbdd21544a02a18c450bc9c4.jpg', '主食', '否'),
(32, '嘻嘻甜品', '榴莲冰淇淋', '蛋糕为八喜冰淇淋蛋糕', 23, '/fooduploads/9d2b564621540a633740b6eaa19335a0.jpg', '甜点', '否'),
(33, '嘻嘻甜品', '牛奶椰子冻', '3个装', 15, '/fooduploads/5e2ab79db6755e6a4a864dc345931e5d.jpg', '汤饮', '否'),
(34, '状元茶', '蛋炒饭', '好吃', 23, '/fooduploads/49098fceab717c4fd4cd8b70680163d0.jpg', '主食', '否');

-- --------------------------------------------------------

--
-- 表的结构 `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `link`
--

INSERT INTO `link` (`id`, `name`, `url`) VALUES
(1, '百度', 'https://www.baidu.com/'),
(3, '豆瓣', 'https://www.douban.com/'),
(4, '知乎', 'https://www.zhihu.com/'),
(6, '小鱼网', 'http://www.xmfish.com/');

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordernum` int(10) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `nickphone` varchar(255) NOT NULL,
  `pos` varchar(255) NOT NULL,
  `sum` varchar(255) NOT NULL,
  `pay_id` varchar(255) NOT NULL,
  `shopname` varchar(255) NOT NULL,
  `best_time` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `creat_time` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '等待商家接单',
  `evaluate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`id`, `ordernum`, `phone`, `nickname`, `nickphone`, `pos`, `sum`, `pay_id`, `shopname`, `best_time`, `remark`, `creat_time`, `status`, `evaluate`) VALUES
(117, 88527, '15000000004', '范冰冰', '15393214552', '朝阳区18号', '52', '银联支付', '嘻嘻甜品', '早晨 7:00~9:00', '', '2017-04-13 07:13:08', '派送中', NULL),
(103, 96064, '15000000001', '李思思', '17000000001', '清华大学18号', '242', '微信', '年糕火锅 状元茶', '中午 11:00~14:00', '不要辣椒哦', '2017-04-12 04:33:20', '已完成', '味道还是棒棒的'),
(104, 21203, '15000000001', '张珊珊', '17000000002', '清华大学1号', '33', '银联支付', '状元茶', '早晨 7:00~9:00', '多加糖', '2017-04-12 04:34:11', '派送中', NULL),
(105, 67131, '15000000001', '王五五', '17000000003', '北京大学13号', '99', '银联支付', '年糕火锅', '晚上17:00~20:00', '米饭也带三碗', '2017-04-12 04:34:35', '等待商家接单', NULL),
(106, 70957, '15000000001', '张珊珊', '17000000002', '清华大学1号', '48', '微信', '快乐时光', '中午 11:00~14:00', '要西瓜的', '2017-04-12 04:35:49', '已完成', '配送可以再快点嘛'),
(107, 76610, '15000000001', '李思思', '17000000001', '清华大学18号', '99', '银联支付', '王一碗糕点', '早晨 7:00~9:00', '生日蜡烛', '2017-04-12 04:51:55', '退单中', NULL),
(108, 28564, '15000000001', '李思思', '17000000001', '清华大学18号', '85', '银联支付', '嘻嘻甜品', '早晨 7:00~9:00', '要微甜', '2017-04-12 04:52:34', '退单中', ' 还不错'),
(109, 28918, '15000000001', '张珊珊', '17000000002', '清华大学1号', '84', '微信', '嘻嘻甜品 皇府 快乐时光', '中午 11:00~14:00', '快一点', '2017-04-12 04:58:04', '已退款', NULL),
(110, 43332, '15000000001', '张珊珊', '17000000002', '清华大学1号', '198', '微信', '年糕火锅', '中午 11:00~14:00', '', '2017-04-13 03:19:27', '等待商家接单', NULL),
(111, 14757, '15000000002', '李易峰', '13903115692', '北京回龙观', '198', '微信', '年糕火锅', '中午 11:00~14:00', '多放辣椒', '2017-04-13 03:27:13', '退单中', NULL),
(112, 70062, '15000000004', '范冰冰', '15393214552', '朝阳区18号', '44', '银联支付', '六德麻辣烫', '晚上17:00~20:00', '快一点', '2017-04-13 05:31:08', '等待商家接单', NULL),
(113, 91180, '15000000004', '范冰冰', '15393214552', '朝阳区18号', '58', '银联支付', '皇府', '早晨 7:00~9:00', '', '2017-04-13 05:32:08', '退单中', NULL),
(114, 56304, '15000000004', '李晨', '13500001111', '朝阳区9号', '73', '银联支付', '状元茶 快乐时光', '晚上17:00~20:00', '', '2017-04-13 05:34:00', '派送中', NULL),
(115, 99785, '15000000004', '李晨', '13500001111', '朝阳区9号', '154', '银联支付', '状元茶', '晚上17:00~20:00', '呵呵', '2017-04-13 05:35:08', '派送中', NULL),
(116, 62701, '15000000004', '李晨', '13500001111', '朝阳区9号', '33', '微信', '皇府', '中午 11:00~14:00', '123', '2017-04-13 06:58:43', '等待商家接单', NULL),
(118, 54984, '18501229977', '123', '1212123414', '12414', '33', '银联支付', '状元茶', '早晨 7:00~9:00', '', '2017-04-16 06:11:25', '派送中', NULL),
(119, 48726, '18279179704', '洋气', '123232321312', '地产', '99', '微信', '年糕火锅', '中午 11:00~14:00', '不加糖', '2017-04-16 07:26:51', '等待商家接单', NULL),
(120, 44345, '15000000005', '姚明', '13455559999', '北京一中', '101', '微信', '六德麻辣烫 状元茶', '中午 11:00~14:00', '多放点葱', '2017-04-16 08:27:41', '已退款', '好吃呢'),
(121, 98178, '15000000005', '姚明', '13455559999', '北京一中', '78', '银联支付', '状元茶', '早晨 7:00~9:00', '', '2017-04-16 08:59:34', '等待商家接单', NULL),
(122, 57372, '15000000001', '张珊珊', '17000000002', '清华大学1号', '99', '银联支付', '年糕火锅', '早晨 7:00~9:00', '啊', '2017-04-18 12:17:42', '等待商家接单', NULL),
(123, 63859, '15000000001', '李思思', '17000000001', '清华大学18号', '99', '银联支付', '年糕火锅', '早晨 7:00~9:00', 'a', '2017-04-18 12:17:42', '等待商家接单', NULL),
(124, 78742, '15000000001', '李思思', '17000000001', '清华大学18号', '231', '微信', '年糕火锅 皇府', '中午 11:00~14:00', '不要辣椒', '2017-04-18 01:36:41', '等待商家接单', NULL),
(125, 48627, '15000000001', '孙杨', '17000000001', '清华大学18号', '132', '银联支付', '年糕火锅 皇府', '早晨 7:00~9:00', '', '2017-04-18 01:37:45', '已退款', '123');

-- --------------------------------------------------------

--
-- 表的结构 `ordergoods`
--

CREATE TABLE IF NOT EXISTS `ordergoods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordernum` int(10) NOT NULL,
  `shopname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `num` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

--
-- 转存表中的数据 `ordergoods`
--

INSERT INTO `ordergoods` (`id`, `ordernum`, `shopname`, `name`, `price`, `num`) VALUES
(76, 96064, '年糕火锅', '3人豪华套餐', '99', 1),
(77, 96064, '状元茶', '招牌烧仙草', '33', 1),
(78, 96064, '状元茶', '鲜芋仙招牌', '22', 5),
(79, 21203, '状元茶', '招牌烧仙草', '33', 1),
(80, 67131, '年糕火锅', '3人豪华套餐', '99', 1),
(81, 70957, '快乐时光', '美式咖啡', '15', 2),
(82, 70957, '快乐时光', '现榨橙汁', '18', 1),
(83, 76610, '王一碗糕点', '天然奶油水果蛋糕', '99', 1),
(84, 28564, '嘻嘻甜品', '泡泡公主', '52', 1),
(85, 28564, '嘻嘻甜品', '缤纷水果戚风', '33', 1),
(86, 28918, '嘻嘻甜品', '缤纷水果戚风', '33', 1),
(87, 28918, '皇府', '金枪鱼土豆泥', '33', 1),
(88, 28918, '快乐时光', '现榨橙汁', '18', 1),
(89, 43332, '年糕火锅', '3人豪华套餐', '99', 2),
(90, 14757, '年糕火锅', '3人豪华套餐', '99', 2),
(91, 70062, '六德麻辣烫', '京都八点', '44', 1),
(92, 91180, '皇府', '芝士培根碗', '33', 1),
(93, 91180, '皇府', '吉味双拼饭', '25', 1),
(94, 56304, '状元茶', '招牌烧仙草', '33', 1),
(95, 56304, '状元茶', '鲜芋仙招牌', '22', 1),
(96, 56304, '快乐时光', '现榨橙汁', '18', 1),
(97, 99785, '状元茶', '鲜芋仙招牌', '22', 7),
(98, 62701, '皇府', '芝士培根碗', '33', 1),
(99, 88527, '嘻嘻甜品', '泡泡公主', '52', 1),
(100, 54984, '状元茶', '招牌烧仙草', '33', 1),
(101, 48726, '年糕火锅', '3人豪华套餐', '99', 1),
(102, 44345, '六德麻辣烫', '京都八点', '44', 1),
(103, 44345, '状元茶', '四果汤', '12', 2),
(104, 44345, '状元茶', '招牌烧仙草', '33', 1),
(105, 98178, '状元茶', '蛋炒饭', '23', 1),
(106, 98178, '状元茶', '鲜芋仙招牌', '22', 1),
(107, 98178, '状元茶', '招牌烧仙草', '33', 1),
(108, 57372, '年糕火锅', '3人豪华套餐', '99', 1),
(109, 63859, '年糕火锅', '3人豪华套餐', '99', 1),
(110, 78742, '年糕火锅', '3人豪华套餐', '99', 2),
(111, 78742, '皇府', '芝士培根碗', '33', 1),
(112, 48627, '年糕火锅', '3人豪华套餐', '99', 1),
(113, 48627, '皇府', '芝士培根碗', '33', 1);

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  `shopname` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `pos` varchar(255) NOT NULL,
  `count` int(10) NOT NULL DEFAULT '0',
  `money` int(10) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT '上线',
  `info` varchar(255) NOT NULL DEFAULT '店家很懒,什么都没有留下',
  `type` varchar(255) NOT NULL,
  `auth` int(2) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- 转存表中的数据 `shop`
--

INSERT INTO `shop` (`id`, `phone`, `password`, `shopname`, `pic`, `pos`, `count`, `money`, `status`, `info`, `type`, `auth`) VALUES
(28, '18000000001', '$2y$10$018kssJarr5ukfRhSrq1lODJUcJHQBblkGtxhSaZdJRq3dd7rLZf2', '状元茶', '/shopuploads/53c64755101bb9f873d795cddb9b34b7.gif', '北京市中关村1号', 7, 553, '上线', '你想醉茶吗 速度来哦', '奶茶果汁', 1),
(29, '18000000002', '$2y$10$zdyRPzplyCiEtg8i3s8AduW8rwPkV8KJ5USQZdwEiqVZSVdkcKWZK', '年糕火锅', '/shopuploads/0f57c021183e7769206aa200471214cb.gif', '北京市中关村2号', 9, 1188, '上线', '比初恋还甜的年糕 满20减3元', '麻辣烫', 1),
(30, '18000000003', '$2y$10$6CddhlbU2yLlxsPFSXqSAegsaqeJc.IszBfDKmxu4cVCIQhv.re7G', '皇府', '/shopuploads/0ec1f3b852572288a6dacc7381a7e746.gif', '北京市中关村3号', 5, 190, '上线', '店家很懒,什么都没有留下', '简餐', 1),
(31, '18000000004', '$2y$10$FJOlGMz4tw.uDjyUnaSdF.aEp27UB97OtsiFj60W9qTrZjJAwT1Ia', '快乐时光', '/shopuploads/4e7e116e15d08a5ff5b1422d054d4d80.gif', '北京市中关村4号', 3, 84, '上线', '店家很懒,什么都没有留下', '咖啡', 1),
(32, '18000000005', '$2y$10$KI1IQdWfc5P4.JzcMhoT3OccaZJelc/YGbqhSnMajj6nxL97eQCJK', '六德麻辣烫', '/shopuploads/14a22af96df519e93da9d970e7fd1fdf.gif', '北京市中关村5号', 2, 88, '上线', '今日活动满50减5元', '香锅米线', 1),
(33, '18000000006', '$2y$10$bkhqYTxFdhaatLy1Zcug5eL2AcOGun8cNeMq4Yy5R/9PQ/sdlYe52', '王一碗糕点', '/shopuploads/0b4d9a063fd708272f3da5af5d06dc5b.gif', '北京市中关村6号', 1, 99, '上线', '不上火的蒸蛋糕 还在犹豫什么', '蛋糕', 1),
(34, '18000000007', '$2y$10$cXuDdn6K/.Nvrm8BV4Q7vuRXQ8Sibqa2SI2.DZ8ZBUha98mFv.Ki2', '麦谷粒', '/shopuploads/caaadc47838f4f4990d34c8d8353b8ad.gif', '北京市中关村7号', 0, 0, '上线', '满100减20元', '蛋糕', 1),
(35, '18000000008', '$2y$10$7R5xgItd4V.vXSND1fF81Oa0DljGfYePYidwLV9Mr9EpRNBEbXvYi', '韩式拌饭', '/shopuploads/e57d3972a131e042f579035daa7b1cee.gif', '北京市中关村8号', 0, 0, '上线', '三菜一汤20元', '简餐', 1),
(36, '18000000009', '$2y$10$K7W6jZlNFPKS2if8oonRv.GrINn/yXWR0L0iggstfW/TtdjL5spRW', '老顽童水果', '/shopuploads/d59754da3b30e887a49ac1a72ea1f234.gif', '北京市中关村9号', 0, 0, '上线', '最新鲜的水果 来自热带哦', '水果', 1),
(37, '18000000010', '$2y$10$kG7GBXVLvyoDGR10ISw33O5aBD3a8TUBc.VhPjyJLZmI8HYfQ0wk2', '胖子海鲜', '/shopuploads/c2c2c544566a172eb24afa66a3c7b1b2.gif', '北京市中关村10号', 0, 0, '上线', '扇贝、鲍鱼、鱼翅、海参', '海鲜', 1),
(38, '13000000011', '$2y$10$9gWcCwBujuuEFduRoPUYtePzZMd367Z.UUIpFmMsZaT/BVxr15V2O', '嘻嘻甜品', '/shopuploads/0931274becdeef616e97bb15d701077b.gif', '北京市五道口1号', 3, 170, '上线', '满32减2元', '甜品', 1),
(27, '13000000000', '$2y$10$m1P9udAWNiluizZIsAVuQeNL8sEw54W9BxR3Gctk0c6/U62ItHRQC', '管理员', '/shopuploads/11e06db296a022e630229f956a65a8e8.gif', '北京', 0, 0, '上线', '店家很懒,什么都没有留下', '简餐', 2),
(39, '18000000012', '$2y$10$xutJ/Vki86guxy0AMGP.AuDknMd57y6qBj6miCQUqf1hJOZR10ldi', '麦乐鸡汉堡', '/shopuploads/bb6f50ff76956c35104de3d1297e60aa.gif', '北京市五道口2号', 0, 0, '上线', '工作午餐17元', '汉堡速食', 1),
(40, '18000000013', '$2y$10$eNauo/Qkao9X4GYNVBlIzOPK/0eLj6rwouUsFLLRTIljy0xfiwhxG', '渔人码头', '/shopuploads/f739e71f778d1ce09be31eeea02c1077.gif', '北京市中关村12号', 0, 0, '上线', '店家很懒,什么都没有留下', '海鲜', 1),
(41, '18000000014', '$2y$10$srf35iJY935ezx/kRJezOum9QoTV.gGenCj/rHUo9h2oBp3.TyZbu', '朝阳花店', '/shopuploads/6e863e951e7c57f7613d028385acab84.gif', '北京市中关村18号', 0, 0, '上线', '今天鲜花8折哦', '鲜花', 1),
(42, '18000000015', '$2y$10$6IyJxP/NkLIwWLsieTjZC.VyY1uEu0ZRCmKakF3PeRTyuy1LCf2uS', '泰国水果', '/shopuploads/1dd0bc10bf35a54c29a90b0ba3e1609b.gif', '北京市五道口5号', 0, 0, '上线', '店家很懒,什么都没有留下', '水果', 1),
(43, '18000000016', '$2y$10$QveDWPV5F5SDK0g8lR01WubqUqz3A.UJ6ZaHONFR7b/tkmiKaCLM2', '叶子蔬菜', '/shopuploads/5732f78ddbfbb3a012f948b09be47271.gif', '北京市中关村19号', 0, 0, '上线', '店家很懒,什么都没有留下', '蔬菜', 1),
(44, '13000000017', '$2y$10$bz4m/jpxh3fu5uHV.OTV.uhn0VlYJIynmvHR484TMgvURy2Uaubqm', '上瘾咖啡', '/shopuploads/5e66f78298cfa1251d0da5212a912958.gif', '北京市五道口7号', 0, 0, '上线', '店家很懒,什么都没有留下', '咖啡', 1),
(45, '18000000018', '$2y$10$kj3UHzHtwBqUzN/MTVUtluo.IfSgLEuTzuYi3bFDrRH3kW3IjlAK.', '外婆特香包', '/shopuploads/057c4ad10c3e33b85f31d2ea0ee0fcf5.gif', '北京市中关村15号', 0, 0, '上线', '店家很懒,什么都没有留下', '面包', 1),
(46, '18000000087', '$2y$10$bSTTagEaj.AB.UAgXRMlNOyaPzuZfKIZZRGXqtHj63.0PHxtRkA2q', 'cafe', '/shopuploads/c84a071503679288ba68219cff9ca0cc.gif', '北京市五道口123号', 0, 0, '上线', '店家很懒,什么都没有留下', '甜品', 1);

-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT NULL,
  `pic` varchar(255) DEFAULT '/uploads/default.jpg',
  `name` varchar(255) DEFAULT '食客',
  `email` varchar(255) DEFAULT NULL,
  `count` int(10) DEFAULT '0',
  `pay` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `userinfo`
--

INSERT INTO `userinfo` (`id`, `uid`, `pic`, `name`, `email`, `count`, `pay`) VALUES
(63, 85, '/uploads/99fe15252f889dfc9e9082e1736aa4b8.jpeg', '食客', '', 12, 1449),
(64, 86, '/uploads/default.jpg', '食客', NULL, 1, 198),
(65, 87, '/uploads/default.jpg', '食客', NULL, 0, 0),
(66, 88, '/uploads/default.jpg', '食客', NULL, 6, 414),
(67, 89, '/uploads/default.jpg', '食客', NULL, 1, 33),
(68, 90, '/uploads/default.jpg', '食客', NULL, 1, 99),
(69, 91, '/uploads/default.jpg', '食客', NULL, 2, 179);

-- --------------------------------------------------------

--
-- 表的结构 `userpos`
--

CREATE TABLE IF NOT EXISTS `userpos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `nickname1` varchar(255) DEFAULT NULL,
  `nickphone1` varchar(255) DEFAULT NULL,
  `pos1` varchar(255) DEFAULT NULL,
  `nickname2` varchar(255) DEFAULT NULL,
  `nickphone2` varchar(255) DEFAULT NULL,
  `pos2` varchar(255) DEFAULT NULL,
  `nickname3` varchar(255) DEFAULT NULL,
  `nickphone3` varchar(255) DEFAULT NULL,
  `pos3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- 转存表中的数据 `userpos`
--

INSERT INTO `userpos` (`id`, `uid`, `nickname1`, `nickphone1`, `pos1`, `nickname2`, `nickphone2`, `pos2`, `nickname3`, `nickphone3`, `pos3`) VALUES
(38, 85, '孙杨', '17000000001', '清华大学18号', '张珊珊', '17000000002', '清华大学1号', '王五五', '17000000003', '北京大学13号'),
(39, 86, '李易峰', '13903115692', '北京回龙观', '马老师', '17603225691', '五道口123号', '1', '1', '1'),
(40, 87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 88, '范冰冰', '15393214552', '朝阳区18号', '李晨', '13500001111', '朝阳区9号', NULL, NULL, NULL),
(42, 89, '123', '1212123414', '12414', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 91, '姚明', '13455559999', '北京一中', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `auth` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=92 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`, `auth`) VALUES
(87, '15000000003', '$2y$10$V8pXwhwEWEZjgCZ6QTnBluVwbEfQZkreICvmleU/uS6tGQQMmZgWe', 'KqaqZbnrMb1DwtiC7KbHgcztrMtUCIRtQgrbvO2ttVOT76xvJEy4cyBU2hGU', '2017-04-13 03:53:43', '2017-04-13 06:17:43', 3),
(88, '15000000004', '$2y$10$JanfPGxOIixyGqunsELZUuGB96yhhFOlq/mHYzxWenCUDW.VSQY2C', '$2y$10$cpjHbr0o.gM9ZmC9qBqkLOz67IvaGb6futwT..yW0qAL2vV9a3y0u', '2017-04-13 09:29:35', '2017-04-13 09:29:35', 1),
(85, '15000000001', '$2y$10$1uPd8zDnZKusuFuHhfTAoOA5cXoo9C43YvsA.eUscUzkcLQtM7QgC', '9gZ3BWzgUlIDb9VqZG2CFVmuzC6VHrr9bueib00Cl2hS9Oac5L8dGU71ydFq', '2017-04-16 10:38:45', '2017-04-16 10:38:45', 1),
(86, '15000000002', '$2y$10$Ada30KVxBQ4Tqcs.SXAV6uLYm60VSvowTe/CtcEXkITQHm137yR8O', 'qTmREBLC39ssDJBSOOKxFjg5Y6qXVmqWXVxv6hN7E0m3tFxhpW9IGV1BGmKn', '2017-04-13 01:09:25', '2017-04-13 09:26:42', 1),
(89, '18501229977', '$2y$10$4CgWzKgBwQ5vrnU5GsSga.zAJSAOytxvHfuRiWk4R0oFJXJQzYxgG', 'Jf6TeNqUXx2yIGi8WGJmB0XD2JBvn0eHXuEi8ENCAdZ4OlapESm6W0VDFcvn', '2017-04-16 10:11:45', '2017-04-16 10:11:45', 1),
(90, '18279179704', '$2y$10$dZ8dm2Q95nR86oiUHwdZHOA5P/rVKt6YS4lsJEEqzvjY/at/qphl6', 's51Kpfp4O3EiWn67m6AiuoC7UnIobPd41K52jCWynCAwIsjpvn5vhsP7OsAu', '2017-04-16 11:30:24', '2017-04-16 11:30:24', 1),
(91, '15000000005', '$2y$10$LIxxGTLC1VSLw/MbpgLeiO42qsR.gRmKU/3p4ne3u9TXGQZNTLf3G', '7ZjMNERBR7abETT0NzxtJD3728QYyKvCobTKmLi2M1h7RyVqsn0i8MNNyICf', '2017-04-18 05:47:00', '2017-04-16 12:45:36', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

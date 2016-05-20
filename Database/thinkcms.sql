-- phpMyAdmin SQL Dump
-- version 4.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-05-20 15:05:11
-- 服务器版本： 5.7.10
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thinkcms`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL,
  `cid` int(10) NOT NULL DEFAULT '0' COMMENT '栏目分组',
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(100) DEFAULT NULL,
  `abstract` text,
  `content` text NOT NULL,
  `views` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量 ',
  `comments` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论量',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布人id',
  `updated` int(10) unsigned NOT NULL DEFAULT '0',
  `created` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1正常，0删除'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `cid`, `title`, `thumbnail`, `abstract`, `content`, `views`, `comments`, `uid`, `updated`, `created`, `status`) VALUES
(2, 2, 'Ghost 桌面版 APP 正式发布，能同时管理多个 Ghost 博客', '/Public/Uploads/201605/573a8d5127afe.png', '', '虽然通过浏览器管理 Ghost 博客虽然很方便，但是在多个 tab 之间切换有时候也会很麻烦，嗯，如果能有一个独立的 app 应该使用起来会更爽一些！\r\n今天的主角来了，Ghost 桌面版 APP -- Ghost Desktop！\r\n目前，Ghost Desktop 还处于早期阶段，但是已经是一个全功能版本了，并且 Ghost Desktop 运行良好，支持自动更新，已经完全支持 Mac、Windows 和 Linux 平台了。补充一下，Ghost Desktop 是完全开源的（这还用说吗？）\r\n其实 Ghost Desktop 于数周前就已经开放给大家预览了。\r\n众所周知，Ghost 是一个有非盈利组织支持的开源项目。Ghost Desktop 由志愿者 Felix Rieseberg 独立开发的，并且他还是一位微软的开源布道者。\r\n官方下载地址（且慢点击，先看下面）：https://ghost.org/downloads/\r\n\r\n由于 众所周知 的原因，某些网站或服务在国内是不存在的，这其中就包括 Amazon 的云存储，悲伤的是 Github 用的就是 Amazon 的云存储，更悲伤的是 Ghost Desktop 利用的是 Github 提供的下载，说白了，你在国内还真下载不了。所以 GhostChina 把安装包搬运到墙内给大家提供一点儿方便：\r\nWindows(For Windows 7 &amp; newer): http://dl.ghostchina.com/desktop/ghost-desktop-0.3.2-windows-setup.exe\r\nMac(For OS X 10.9 &amp; newer): http://dl.ghostchina.com/desktop/ghost-desktop-0.3.2-osx.zip\r\nLinux(For Ubuntu 64-bit): http://dl.ghostchina.com/desktop/ghost-desktop-0.3.2-debian.deb', 0, 0, 1, 1463643730, 1463455032, 1),
(3, 2, '为 Ubuntu 和 Debian 安装最新版本的 Node.js', NULL, '', '运行 Ghost 必须要安装 Node.js。但是 Ubuntu 或 Debian 的软件仓库中的 Node.js 更新较慢，甚至只能等到新版本发布才能有最新的 Node.js 用。下面我们说一下从 NodeSource 提供的仓库中安装最新版本的 Node.js。\r\n![igg](/Public/Uploads/201605/573d7aca1f10e.jpg &quot;igg&quot;)\r\n\r\n支持的操作系统版本\r\n\r\n被支持的 Ubuntu 版本：\r\n\r\nUbuntu 12.04 LTS (Precise Pangolin)\r\nUbuntu 14.04 LTS (Trusty Tahr)\r\nUbuntu 15.04 (Vivid Vervet)\r\nUbuntu 15.10 (Wily Werewolf) [For Node &gt;= 4.2.x]\r\n被支持的 Debian 版本：\r\n\r\nDebian 7 (wheezy)\r\nDebian 8 / stable (jessie)\r\nDebian testing (stretch, aliased to jessie)\r\nDebian unstable (sid)\r\n\r\n\r\n[========]\r\n\r\n\r\n\r\n安装步骤\r\n\r\nGhost 目前支持 0.10.*、0.12.* 和 &gt;=4.2 &lt;5.* (LTS) 版本的 Node.js，推荐的是 &gt;0.10.40 (最新版本)。详细说明请看这里：http://support.ghost.org/supported-node-versions/\r\n\r\n根据我们的安装经验，推荐安装 4.x（LTS）版本的 Node.js。\r\n\r\n安装 Node.js v4.x\r\n\r\nUbuntu 系统\r\n\r\ncurl -sL https://deb.nodesource.com/setup_4.x | sudo -E bash -  \r\nsudo apt-get install -y nodejs  \r\nDebian 系统。以 root 权限执行下列指令\r\n\r\ncurl -sL https://deb.nodesource.com/setup_4.x | bash -  \r\napt-get install -y nodejs  \r\n安装 Node.js v0.10\r\n\r\nUbuntu 系统\r\n\r\ncurl -sL https://deb.nodesource.com/setup_0.10 | sudo -E bash -  \r\nsudo apt-get install -y nodejs  \r\nDebian 系统。以 root 权限执行下列指令\r\n\r\ncurl -sL https://deb.nodesource.com/setup_0.10 | bash -  \r\napt-get install -y nodejs  \r\n安装 Node.js v0.12\r\n\r\nUbuntu 系统\r\n\r\ncurl -sL https://deb.nodesource.com/setup_0.12 | sudo -E bash -  \r\nsudo apt-get install -y nodejs  \r\nDebian 系统。以 root 权限执行下列指令\r\n\r\ncurl -sL https://deb.nodesource.com/setup_0.12 | bash -  \r\napt-get install -y nodejs  \r\n安装 Node.js v5.x\r\n\r\n注意：v5.x 的 Node.js 不被 Ghost 支持，以下安装介绍只为了完整介绍 Node.js 各个版本的安装！\r\n\r\nUbuntu 系统\r\n\r\ncurl -sL https://deb.nodesource.com/setup_5.x | sudo -E bash -  \r\nsudo apt-get install -y nodejs  \r\nDebian 系统。以 root 权限执行下列指令\r\n\r\ncurl -sL https://deb.nodesource.com/setup_5.x | bash -  \r\napt-get install -y nodejs  ', 0, 0, 1, 1463647587, 1463455181, 1),
(4, 2, '测试缩略图', '/Public/Uploads/201605/573d7deb92430.jpg', 'Nginx出现的413 Request Entity Too Large错误,这个错误一般在上传文件的时候出现，打开nginx主配置文件nginx conf，找到http{}段，添加解决方法就是打开nginx主配置文件nginx conf，一般在 usr local ngin&lt;br&gt;\r\nNginx出现的413 Request Entity Too Large错误,这个错误一般在上传文件的时候出现，打开nginx主配置文件nginx conf，找到http{}段，添加解决方法就是打开nginx主配置文件nginx conf，一般在 usr local ngin', '1177777777', 0, 0, 1, 1463647723, 1463455236, 1);

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL COMMENT '分类id',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `title` varchar(45) NOT NULL COMMENT '分类名称',
  `content` mediumtext NOT NULL COMMENT '内容，仅用于单页内容',
  `sort` int(3) unsigned NOT NULL DEFAULT '0' COMMENT '显示顺序',
  `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示，1：显示，0：不显示，默认1',
  `created` int(10) unsigned NOT NULL COMMENT '添加时间',
  `updated` int(10) unsigned NOT NULL COMMENT '更新时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='栏目表';

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `pid`, `title`, `content`, `sort`, `is_show`, `created`, `updated`, `status`) VALUES
(1, 0, 'php', 'PHP，是英文超文本预处理语言 Hypertext Preprocessor 的缩写。PHP 是一种开源的通用计算机脚本语言，尤其适用于网络开发并可嵌入HTML中使用。PHP 的语法借鉴吸收C语言、Java和Perl等流行计算机语言的特点，易于一般程序员学习。', 1, 1, 1463444377, 1463448395, 1),
(2, 0, 'mysql', 'MySQL是一个小型关系型数据库管理系统，开发者为瑞典MySQL AB公司。在2008年1月16号被Sun公司收购。而2009年，SUN又被Oracle收购。MySQL是一种关联数据库管理系统，关联数据库将数据保存在不同的表中，而不是将所有数据放在一个大仓库内。这样就增加了速度并提高了灵活性。MySQL的SQL“结构化查询语言”。SQL是用于访问数据库的最常用标准化语言。MySQL软件采用了GPL（GNU通用公共许可证）。由于其体积小、速度快、总体拥有成本低，尤其是开放源码这一特点，许多中小型网站为了降低网站总体拥有成本而选择了MySQL作为网站数据库。', 1, 1, 1463444390, 1463448415, 1),
(3, 0, 'python', 'Python（发音：英[ˈpaɪθən]，美[ˈpaɪθɑ:n]），是一种面向对象、直译式电脑编程语言，也是一种功能强大的通用型语言，已经具有近二十年的发展历史，成熟且稳定。它包含了一组完善而且容易理解的标准库，能够轻松完成很多常见的任务。它的语法非常简捷和清晰，与其它大多数程序设计语言不一样，它使用缩进来定义语句。\r\n\r\nPython支持命令式程序设计、面向对象程序设计、函数式编程、面向切面编程、泛型编程多种编程范式。与Scheme、Ruby、Perl、Tcl等动态语言一样，Python具备垃圾回收功能，能够自动管理存储器使用。它经常被当作脚本语言用于处理系统管理任务和网络程序编写，然而它也非常适合完成各种高级任务。Python虚拟机本身几乎可以在所有的作业系统中运行。使用一些诸如py2exe、PyPy、PyInstaller之类的工具可以将Python源代码转换成可以脱离Python解释器运行的程序。\r\n\r\nPython的主要参考实现是CPython，它是一个由社区驱动的自由软件。目前由Python软件基金会管理。基于这种语言的相关技术正在飞快的发展，用户数量快速扩大，相关的资源非常多。', 1, 1, 1463444410, 1463448440, 1),
(4, 0, 'javascript', 'JavaScript 是一门弱类型的动态脚本语言，支持多种编程范式，包括面向对象和函数式编程，被广泛用于 web 开发。\r\n\r\n一般来说，完整的JavaScript包括以下几个部分：\r\n\r\nECMAScript，描述了该语言的语法和基本对象\r\n文档对象模型（DOM），描述处理网页内容的方法和接口\r\n浏览器对象模型（BOM），描述与浏览器进行交互的方法和接口\r\n它的基本特点如下：\r\n\r\n是一种解释性脚本语言（代码不进行预编译）。\r\n主要用来向HTML页面添加交互行为。\r\n可以直接嵌入HTML页面，但写成单独的js文件有利于结构和行为的分离。\r\nJavaScript常用来完成以下任务：\r\n\r\n嵌入动态文本于HTML页面\r\n对浏览器事件作出响应\r\n读写HTML元素\r\n在数据被提交到服务器之前验证数据\r\n检测访客的浏览器信息', 1, 1, 1463461146, 1463461146, 1),
(5, 0, 'java', 'Java 是一种可以撰写跨平台应用软件的面向对象的程序设计语言，是由 Sun Microsystems 公司于 1995 年 5 月推出的 Java 程序设计语言和 Java 平台（即 JavaSE, JavaEE, JavaME）的总称。Java 技术具有卓越的通用性、高效性、平台移植性和安全性。\r\n\r\nJava编程语言的风格十分接近 C++ 语言。继承了 C++ 语言面向对象技术的核心，Java舍弃了 C++ 语言中容易引起错误的指針，改以引用取代，同时卸载原 C++ 与原来运算符重载，也卸载多重继承特性，改用接口取代，增加垃圾回收器功能。在 Java SE 1.5 版本中引入了泛型编程、类型安全的枚举、不定长参数和自动装/拆箱特性。太阳微系统对 Java 语言的解释是：“Java编程语言是个简单、面向对象、分布式、解释性、健壮、安全与系统无关、可移植、高性能、多线程和动态的语言”。', 1, 1, 1463461173, 1463461173, 1),
(7, 1, 'laravel', 'laravel', 1, 1, 1463545109, 1463545109, 1),
(8, 1, 'thinkphp', 'thinkphp', 1, 1, 1463545123, 1463545123, 1),
(9, 1, 'demo', 'demo', 1, 1, 1463548805, 1463548822, 1),
(10, 1, 'yii', 'yii2.0', 1, 1, 1463710273, 1463710273, 1);

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` text NOT NULL COMMENT '配置值'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `config`
--

INSERT INTO `config` (`name`, `value`) VALUES
('WEB_SITE_TITLE', 'ThinkCMS'),
('WEB_SITE_DESCRIPTION', 'ThinkPHP,thinkcms,thinkblog'),
('WEB_SITE_KEYWORDS', 'ThinkPHP,thinkcms,thinkblog'),
('WEB_SITE_CLOSE', '1'),
('WEB_SITE_ABOUT', '<blockquote>\r\n        <p><code>github</code>   https://github.com/art-coder/thinkcms</p>\r\n    </blockquote>\r\n    <p>thinkcms是使用thinkphp3.2版本闲暇之余写的一个简单的cms，主要是研究thinkphp的相关用法，代码托管在<a href="https://github.com/art-coder/thinkcms" target="_blank">github</a>上</p>\r\n'),
('USER_ALLOW_REGISTER', '0'),
('WEB_SITE_JUMBOTRON', 'thinkcms是使用thinkphp3.2版本闲暇之余写的一个简单的cms，主要是研究thinkphp的相关用法，代码托管在<a href="https://github.com/art-coder/thinkcms"  target="_blank">github</a>上'),
('WEB_SITE_CLOSE_MSG', '网站升级中...'),
('USER_CLOSE_MSG', '当前禁止用户注册，开放注册时间为下个月！');

-- --------------------------------------------------------

--
-- 表的结构 `manage`
--

CREATE TABLE IF NOT EXISTS `manage` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `truename` varchar(30) DEFAULT NULL COMMENT '真实名字',
  `password` varchar(32) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `last_login_time` int(11) NOT NULL DEFAULT '0',
  `last_login_ip` varchar(20) DEFAULT NULL,
  `updated` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `manage`
--

INSERT INTO `manage` (`id`, `username`, `email`, `truename`, `password`, `role_id`, `last_login_time`, `last_login_ip`, `updated`, `created`, `status`) VALUES
(1, 'admin', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 0, 1463710101, '127.0.0.1', 1463710101, 0, 1),
(9, 'demo', 'demo@demo.com', 'demo', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, NULL, 1463727191, 1463727191, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD UNIQUE KEY `uk_name` (`name`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`), ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '分类id',AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `manage`
--
ALTER TABLE `manage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

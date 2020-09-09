-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-09-09 14:51:41
-- 服务器版本： 8.0.21
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `qqphp`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_config`
--

CREATE TABLE `admin_config` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `admin_config`
--

INSERT INTO `admin_config` (`id`, `name`, `value`, `description`, `created_at`, `updated_at`) VALUES
(1, '__configx__', 'do not delete', '{\"base.website_title\":{\"options\":[],\"element\":\"normal\",\"help\":null,\"name\":\"\\u7ad9\\u70b9\\u6807\\u9898\",\"order\":15},\"base.website_switch\":{\"options\":[],\"element\":\"yes_or_no\",\"help\":\"\\u7ad9\\u70b9\\u5173\\u95ed\\u540e\\u5c06\\u4e0d\\u80fd\\u8bbf\\u95ee\\uff0c\\u540e\\u53f0\\u53ef\\u6b63\\u5e38\\u767b\\u5f55\",\"name\":\"\\u7ad9\\u70b9\\u5f00\\u5173\",\"order\":5},\"base.website_keyword\":{\"options\":[],\"element\":\"tags\",\"help\":\"\\u7f51\\u7ad9\\u5173\\u952e\\u8bcd\\u5c31\\u662f\\u4e00\\u4e2a\\u7f51\\u7ad9\\u7ed9\\u9996\\u9875\\u8bbe\\u5b9a\\u7684\\u4ee5\\u4fbf\\u7528\\u6237\\u901a\\u8fc7\\u641c\\u7d22\\u5f15\\u64ce\\u80fd\\u641c\\u5230\\u672c\\u7f51\\u7ad9\\u7684\\u8bcd\\u6c47\",\"name\":\"\\u7ad9\\u70b9\\u5173\\u952e\\u8bcd\",\"order\":20},\"base.website_icon\":{\"options\":[],\"element\":\"file\",\"help\":\"\\u914d\\u7f6e\\u7ad9\\u70b9icon\\u56fe\\u6807\",\"name\":\"\\u7ad9\\u70b9ICON\",\"order\":25},\"base.website_desc\":{\"options\":[],\"element\":\"textarea\",\"help\":\"\\u901a\\u8fc7\\u63cf\\u8ff0\\u80fd\\u5438\\u5f15\\u7528\\u6237\\u7684\\u70b9\\u51fb\\uff0c\\u4ece\\u800c\\u6e10\\u63a5\\u63d0\\u5347\\u7f51\\u7ad9\\u7684\\u5173\\u952e\\u8bcd\\u6392\\u540d\",\"name\":\"\\u7ad9\\u70b9\\u63cf\\u8ff0\",\"order\":30},\"base.website_keep\":{\"options\":[],\"element\":\"normal\",\"help\":\"\\u901a\\u8fc7\\u57df\\u540d\\u53ef\\u67e5\\u8be2\\u8be5\\u57df\\u540d\\u662f\\u5426\\u6709\\u5907\\u6848\\u53ca\\u76f8\\u5173\\u7684ICP\\u5907\\u6848\\u8bb8\\u53ef\\u4fe1\\u606f\",\"name\":\"\\u5907\\u6848\\u4fe1\\u606f\",\"order\":35},\"base.new_key_here\":{\"options\":[],\"element\":\"textarea\",\"help\":\"\\u6dfb\\u52a0\\u7b2c\\u4e09\\u65b9\\u5e73\\u53f0\\u4ee3\\u7801,\\u7edf\\u8ba1\\u7f51\\u7ad9\\u8bbf\\u95ee\\u6570\\u636e\\u3002\",\"name\":\"\\u7f51\\u7ad9\\u7edf\\u8ba1\\u4ee3\\u7801\",\"order\":40},\"user_info.user_qq\":{\"options\":[],\"element\":\"normal\",\"help\":null,\"name\":\"\\u4e2a\\u4ebaQQ\",\"order\":30},\"user_info.user_wechat\":{\"options\":[],\"element\":\"normal\",\"help\":null,\"name\":\"\\u4e2a\\u4eba\\u5fae\\u4fe1\",\"order\":35},\"user_info.full_name\":{\"options\":[],\"element\":\"normal\",\"help\":\"\\u7528\\u4e8e\\u5173\\u4e8e\\u6211\\u5c55\\u793a\\u4e2a\\u4eba\\u59d3\\u540d\",\"name\":\"\\u4e2a\\u4eba\\u59d3\\u540d\",\"order\":5},\"user_info.portrait\":{\"options\":[],\"element\":\"image\",\"help\":\"\\u7528\\u4e8e\\u5173\\u4e8e\\u6211\\u4e2d\\u5c55\\u793a\\u4e2a\\u4eba\\u5934\\u50cf\",\"name\":\"\\u4e2a\\u4eba\\u5934\\u50cf\",\"order\":10},\"user_info.background\":{\"options\":[],\"element\":\"image\",\"help\":\"\\u7528\\u4e8e\\u5173\\u4e8e\\u6211\\u4e2d\\u5361\\u7247\\u80cc\\u666f\",\"name\":\"\\u4e2a\\u4eba\\u80cc\\u666f\",\"order\":15},\"user_info.occupation\":{\"options\":[],\"element\":\"normal\",\"help\":\"\\u7528\\u4e8e\\u5173\\u4e8e\\u6211\\u4e2d\\u5c55\\u793a\\u4e2a\\u4eba\\u804c\\u4e1a\",\"name\":\"\\u4e2a\\u4eba\\u804c\\u4e1a\",\"order\":20},\"user_info.motto\":{\"options\":[],\"element\":\"normal\",\"help\":\"\\u7528\\u4e8e\\u5173\\u4e8e\\u6211\\u4e2d\\u5c55\\u793a\\u5ea7\\u53f3\\u94ed\",\"name\":\"\\u4e2a\\u4eba\\u5ea7\\u53f3\\u94ed\",\"order\":25},\"base.motto\":{\"options\":[],\"element\":\"normal\",\"help\":\"\\u7528\\u4e8e\\u9875\\u9762\\u5c3e\\u90e8\\u5c55\\u793a\\u5ea7\\u53f3\\u94ed\",\"name\":\"\\u5c3e\\u90e8\\u5ea7\\u53f3\\u94ed\",\"order\":45},\"base.website_background\":{\"options\":{\"@name\":\"newname\"},\"element\":\"file\",\"help\":\"\\u7528\\u4e8e\\u535a\\u5ba2\\u5404\\u4e2a\\u5bfc\\u822a\\u7684\\u80cc\\u666f\",\"name\":\"\\u535a\\u5ba2\\u80cc\\u666f\",\"order\":55},\"base.website_open_bg\":{\"options\":[],\"element\":\"yes_or_no\",\"help\":null,\"name\":\"\\u542f\\u7528\\u535a\\u5ba2\\u80cc\\u666f\",\"order\":50},\"base.website_seo_title\":{\"options\":[],\"element\":\"normal\",\"help\":\"\\u6b64\\u6807\\u9898\\u7528\\u4e8eSEO\\uff0c\\u53ef\\u4ee5\\u591a\\u52a0\\u4e00\\u4e9b\\u5173\\u952e\\u8bcd\\u3002\",\"name\":\"SEO\\u7ad9\\u70b9\\u6807\\u9898\",\"order\":10}}', '2019-08-28 19:06:19', '2019-10-16 01:30:40'),
(4, 'base.website_title', 'Laravel诗词博客', '站点标题', '2019-08-28 19:38:36', '2019-10-16 01:31:20'),
(5, 'base.website_switch', '1', '站点开关', '2019-08-28 19:40:54', '2019-09-30 01:03:10'),
(6, 'base.website_keyword', 'php,博客,blog,建站,Laravel', '站点关键词', '2019-08-28 19:49:08', '2019-10-16 01:43:20'),
(7, 'base.website_icon', 'files/85f609c82abf4a56cced64e7acd9701c.ico', '站点ICON', '2019-08-28 19:50:24', '2019-10-07 23:30:03'),
(8, 'base.website_desc', '博客，个人博客，博客模板，雷勇个人博客，雷勇PHP博客，laravel学习，laravel博客，laravel论坛，PHP论坛，PHP博客，网站模板，博客网站，个人网站，个人博客模板，个人博客网站，个人网站模板，原创网站模板，原创博客模板，个人原创模板，免费网站模板，个人博客免费模板，个人网站免费模板，个人博客模板免费下载，个人网站模板免费下载', '站点描述', '2019-08-28 19:54:15', '2019-10-16 01:43:37'),
(9, 'base.website_keep', '备案号信息', '备案信息', '2019-08-28 19:57:55', '2020-09-09 05:38:19'),
(10, 'base.new_key_here', '<!-- Global site tag (gtag.js) - Google Analytics -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-K9FS7QZ0R3\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'G-K9FS7QZ0R3\');\r\n</script>', '网站统计代码', '2019-08-28 19:59:17', '2019-10-21 18:48:54'),
(11, 'user_info.user_qq', 'QQ', '个人QQ', '2019-08-28 20:10:20', '2020-09-09 05:37:24'),
(12, 'user_info.user_wechat', 'Wechat', '个人微信', '2019-08-28 20:10:40', '2020-09-09 05:37:24'),
(13, 'user_info.full_name', '面壁者-罗辑', '个人姓名', '2019-09-02 01:43:58', '2020-09-09 05:37:24'),
(14, 'user_info.portrait', 'images/3a653c7487b3e927933a8a27105a95cf.jpg', '个人头像', '2019-09-02 01:45:30', '2019-10-16 01:50:14'),
(15, 'user_info.background', 'images/f81762bd35ab9356e799925d5c57f5b7.jpg', '个人背景', '2019-09-02 01:46:28', '2019-10-07 23:22:05'),
(16, 'user_info.occupation', 'PHP世界上最好的语言', '个人职业', '2019-09-02 01:47:11', '2019-10-07 23:22:54'),
(17, 'user_info.motto', '老当益壮，宁知白首之心；穷且益坚，不坠青云之志。', '个人座右铭', '2019-09-02 01:47:53', '2019-09-02 19:36:54'),
(18, 'base.motto', '路漫漫其修远兮，吾将上下而求索', '尾部座右铭', '2019-09-02 01:56:46', '2019-09-02 01:57:21'),
(19, 'base.website_background', 'files/567351328a4d2fc2b143df942b4373d5.jpg', '博客背景', '2019-09-30 00:24:21', '2019-10-17 04:32:53'),
(20, 'base.website_open_bg', '0', '启用博客背景', '2019-09-30 00:58:21', '2019-10-17 04:34:42'),
(21, 'base.website_seo_title', 'Laravel诗词博客_雷勇博客_Laravel博客_Laravel框架_PHP框架', 'SEO站点标题', '2019-10-16 01:30:25', '2019-10-16 01:44:06');

-- --------------------------------------------------------

--
-- 表的结构 `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `order` int NOT NULL DEFAULT '0',
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
(1, 0, 1, '博客总览', 'fa-bar-chart', '/', NULL, NULL, '2019-08-25 20:24:14'),
(2, 0, 2, '后台管理', 'fa-tasks', NULL, NULL, NULL, '2019-08-25 20:24:29'),
(3, 2, 3, '管理员', 'fa-users', 'auth/users', NULL, NULL, '2019-08-25 20:24:46'),
(4, 2, 4, '角色管理', 'fa-user', 'auth/roles', NULL, NULL, '2019-08-25 20:25:09'),
(5, 2, 5, '行为日志', 'fa-ban', 'auth/permissions', NULL, NULL, '2019-08-25 20:25:26'),
(6, 2, 6, '菜单管理', 'fa-bars', 'auth/menu', NULL, NULL, '2019-08-25 20:25:36'),
(7, 2, 7, '操作日志', 'fa-history', 'auth/logs', NULL, NULL, '2019-08-25 20:25:46'),
(8, 0, 8, '导航管理', 'fa-circle-o', NULL, NULL, '2019-08-25 20:26:29', '2019-08-27 00:35:57'),
(9, 8, 9, '导航列表', 'fa-align-justify', 'blog-navs', NULL, '2019-08-25 20:26:52', '2019-08-27 00:35:57'),
(11, 17, 11, '文章管理', 'fa-file-text-o', 'blog-nav-articles', NULL, '2019-08-27 00:30:57', '2019-08-27 00:35:57'),
(12, 17, 12, '相册管理', 'fa-photo', 'blog-nav-photos', NULL, '2019-08-27 00:31:17', '2019-08-27 00:35:57'),
(13, 17, 13, '歌单管理', 'fa-music', 'blog-nav-musics', NULL, '2019-08-27 00:32:37', '2019-08-27 00:35:57'),
(14, 17, 14, '视频管理', 'fa-video-camera', 'blog-nav-videos', NULL, '2019-08-27 00:32:54', '2019-08-27 03:20:38'),
(15, 17, 15, '分享卡片一', 'fa-credit-card-alt', 'blog-nav-share-ones', NULL, '2019-08-27 00:33:49', '2019-08-27 00:35:57'),
(16, 17, 16, '分享卡片二', 'fa-credit-card', 'blog-nav-share-twos', NULL, '2019-08-27 00:34:16', '2019-08-27 00:35:57'),
(17, 0, 10, '内容管理', 'fa-bars', NULL, NULL, '2019-08-27 00:34:52', '2019-08-27 00:35:57'),
(18, 0, 17, '留言管理', 'fa-envelope-o', NULL, NULL, '2019-08-28 00:31:21', '2019-08-28 22:08:35'),
(19, 18, 18, '留言列表', 'fa-file-text-o', 'blog-messages', NULL, '2019-08-28 00:32:24', '2019-08-28 22:08:35'),
(20, 0, 19, '友链管理', 'fa-unlink', NULL, NULL, '2019-08-28 06:53:51', '2019-08-28 22:08:35'),
(21, 20, 20, '链接列表', 'fa-link', 'blog-friends', NULL, '2019-08-28 06:59:05', '2019-08-28 22:08:35'),
(23, 0, 28, '网站管理', 'fa-cog', NULL, NULL, '2019-08-28 18:58:14', '2019-08-29 06:20:38'),
(24, 23, 29, '网站配置', 'fa-hospital-o', 'configx/edit', NULL, '2019-08-28 18:59:01', '2019-08-29 06:20:38'),
(28, 0, 21, '公告管理', 'fa-bullhorn', NULL, NULL, '2019-08-28 21:55:14', '2019-08-28 22:08:35'),
(29, 28, 22, '公告列表', 'fa-building-o', 'blog-notices', NULL, '2019-08-28 21:55:48', '2019-08-28 22:08:35'),
(30, 0, 23, '关于管理', 'fa-adn', NULL, NULL, '2019-08-28 22:27:23', '2019-08-29 06:20:38'),
(31, 30, 24, '关于列表', 'fa-align-left', 'blog-abouts', NULL, '2019-08-28 22:28:04', '2019-08-29 06:20:38'),
(32, 30, 25, '单页管理', 'fa-file-word-o', 'blog-about-articles', NULL, '2019-08-29 06:18:42', '2019-08-29 06:28:28'),
(33, 30, 26, '卡片管理', 'fa-credit-card', 'blog-about-card-ones', NULL, '2019-08-29 06:19:49', '2019-08-29 06:20:38'),
(34, 30, 27, '图标管理', 'fa-fonticons', 'blog-about-card-twos', NULL, '2019-08-29 06:20:18', '2019-08-29 06:20:38'),
(35, 0, 30, '订阅管理', 'fa-calendar-check-o', NULL, NULL, '2019-09-15 05:34:16', '2019-09-24 20:07:31'),
(36, 35, 31, '订阅列表', 'fa-bookmark', 'blog-subscribes', NULL, '2019-09-15 05:37:03', '2019-09-24 20:07:31');

-- --------------------------------------------------------

--
-- 表的结构 `admin_operation_log`
--

CREATE TABLE `admin_operation_log` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `admin_operation_log`
--

INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin/blog-navs', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-09 06:25:01', '2020-09-09 06:25:01'),
(2, 1, 'admin/blog-navs', 'POST', '127.0.0.1', '{\"nav_pid\":\"0\",\"nav_title\":\"Linux\\u7b14\\u8bb0\",\"nav_type\":\"0\",\"nav_open\":\"on\",\"nav_sort\":\"100\",\"_token\":\"ZvvcIfJprqoSgiTgBd0xo5a7DQjGv5zzMSvmIRr3\",\"_previous_\":\"http:\\/\\/www.laravelblog.com\\/admin\\/auth\\/logs?page=1\"}', '2020-09-09 06:25:36', '2020-09-09 06:25:36'),
(3, 1, 'admin/blog-navs', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-09 06:25:39', '2020-09-09 06:25:39'),
(4, 1, 'admin/blog-navs/19', 'DELETE', '127.0.0.1', '{\"_method\":\"delete\",\"_token\":\"ZvvcIfJprqoSgiTgBd0xo5a7DQjGv5zzMSvmIRr3\"}', '2020-09-09 06:30:36', '2020-09-09 06:30:36'),
(5, 1, 'admin/blog-navs', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-09 06:30:36', '2020-09-09 06:30:36'),
(6, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-09 06:31:39', '2020-09-09 06:31:39'),
(7, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-09 06:31:41', '2020-09-09 06:31:41'),
(8, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-09 06:31:41', '2020-09-09 06:31:41'),
(9, 1, 'admin/blog-nav-musics', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-09 06:31:46', '2020-09-09 06:31:46'),
(10, 1, 'admin/blog-nav-musics/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-09 06:31:50', '2020-09-09 06:31:50'),
(11, 1, 'admin/blog-nav-musics', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-09 06:38:44', '2020-09-09 06:38:44'),
(12, 1, 'admin/blog-nav-musics/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-09 06:38:46', '2020-09-09 06:38:46'),
(13, 1, 'admin/blog-nav-musics/1', 'PUT', '127.0.0.1', '{\"key\":\"0\",\"music_json\":\"_file_del_\",\"_file_del_\":null,\"_token\":\"ZvvcIfJprqoSgiTgBd0xo5a7DQjGv5zzMSvmIRr3\",\"_method\":\"PUT\"}', '2020-09-09 06:38:49', '2020-09-09 06:38:49'),
(14, 1, 'admin/blog-nav-musics/1', 'PUT', '127.0.0.1', '{\"nav_id\":\"7\",\"music_title\":\"\\u6211\\u7684\\u6b4c\\u5355\",\"music_tag\":[\"\\u6d41\\u884c\",\"\\u53e4\\u98ce\",\"\\u70ed\\u95e8\",null],\"music_describe\":\"\\u5e38\\u5e38\\u5728\\u591c\\u6df1\\u4eba\\u9759\\u4e4b\\u65f6\\u4ef0\\u671b\\u661f\\u7a7a\\uff0c\\r\\n\\u770b\\u8fd9\\u4e00\\u7247\\u95ea\\u70c1\\u7684\\u6d77\\u6d0b\\uff0c\\r\\n\\u4e0d\\u7981\\u60f3\\uff0c\\u5934\\u4e0a\\u662f\\u6570\\u4ee5\\u4ebf\\u8ba1\\u5b64\\u72ec\\u7684\\u96c6\\u5408\\u554a\\u3002\\r\\n\\u661f\\u661f\\u4eec\\u770b\\u8d77\\u6765\\u53ea\\u6709\\u4e00\\u6307\\u4e4b\\u9694\\uff0c\\u4e8b\\u5b9e\\u4e0a\\u5374\\u6bd4\\u4eba\\u4e16\\u95f4\\u6240\\u6709\\u7684\\u8ddd\\u79bb\\u90fd\\u9065\\u4e0d\\u53ef\\u53ca\\uff0c\\r\\n\\u5b83\\u4eec\\u4f1a\\u96be\\u8fc7\\u5417\\uff1f\\r\\n\\u5e94\\u8be5\\u4f1a\\u7684\\u5427\\uff0c\\u81f3\\u5c11\\u5b83\\u4eec\\u4e00\\u65e6\\u76f8\\u9047\\u4fbf\\u662f\\u6bc1\\u706d\\uff0c\\r\\n\\u5982\\u540c\\u6211\\u548c\\u4f60\\u7684\\u76f8\\u9047\\uff0c\\u4ece\\u4e00\\u5f00\\u59cb\\u5c31\\u6ce8\\u5b9a\\u662f\\u573a\\u6d69\\u52ab\\uff0c\\r\\n\\u4e0d\\u53ef\\u907f\\u514d\\u5730\\u8d70\\u5411\\u5206\\u522b\\u3002\",\"music_click\":\"7\",\"music_sort\":\"100\",\"music_show\":\"on\",\"music_play\":\"on\",\"_file_sort_\":{\"music_json\":null},\"_token\":\"ZvvcIfJprqoSgiTgBd0xo5a7DQjGv5zzMSvmIRr3\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/www.laravelblog.com\\/admin\\/blog-nav-musics\"}', '2020-09-09 06:38:54', '2020-09-09 06:38:54'),
(15, 1, 'admin/blog-nav-musics', 'GET', '127.0.0.1', '[]', '2020-09-09 06:38:54', '2020-09-09 06:38:54'),
(16, 1, 'admin/blog-nav-musics/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2020-09-09 06:38:57', '2020-09-09 06:38:57');

-- --------------------------------------------------------

--
-- 表的结构 `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
(1, 'All permission', '*', '', '*', NULL, NULL),
(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL),
(6, 'Admin Configx', 'ext.configx', NULL, '/configx/*', '2019-08-28 18:56:32', '2019-08-28 18:56:32'),
(7, 'Admin Config', 'ext.config', NULL, '/config*', '2019-08-28 19:05:14', '2019-08-28 19:05:14'),
(10, 'Redis Manager', 'ext.redis-manager', NULL, '/redis*', '2019-10-07 00:26:10', '2019-10-07 00:26:10');

-- --------------------------------------------------------

--
-- 表的结构 `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2019-08-25 20:18:57', '2019-08-25 20:18:57');

-- --------------------------------------------------------

--
-- 表的结构 `admin_role_menu`
--

CREATE TABLE `admin_role_menu` (
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `role_id` int NOT NULL,
  `permission_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `role_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$WXgjWZV1EuEtTiMWyzakLu2Sf5C3JjbWJtTiqXu/B98FHiQxqcr72', 'Administrator', NULL, 'rce6OKq1dYK2j8zYGwSj6exYTdx9e7QLadn5WwsU0DHZpJ9ZSc6i6RpTgF4Q', '2019-08-25 20:18:57', '2019-10-21 22:06:12');

-- --------------------------------------------------------

--
-- 表的结构 `admin_user_permissions`
--

CREATE TABLE `admin_user_permissions` (
  `user_id` int NOT NULL,
  `permission_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `blog_about`
--

CREATE TABLE `blog_about` (
  `id` bigint UNSIGNED NOT NULL,
  `about_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '关于标题',
  `about_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '关于描述',
  `about_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '关于类型【1单页2卡片页3图标页】',
  `about_sort` int NOT NULL DEFAULT '100' COMMENT '关于排序',
  `about_show` tinyint NOT NULL DEFAULT '1' COMMENT '是否显示【1是2否】',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `blog_about`
--

INSERT INTO `blog_about` (`id`, `about_title`, `about_describe`, `about_type`, `about_sort`, `about_show`, `created_at`, `updated_at`) VALUES
(1, '自我介绍', 'GitHub 是一个面向开源及私有软件项目的托管平台，因为只支持 Git 作为唯一的版本库格式进行托管，故名 GitHub。\r\nGitHub 于 2008 年 4 月 10 日正式上线，除了 Git 代码仓库托管及基本的 Web 管理界面以外，还提供了订阅、讨论组、文本渲染、在线文件编辑器、协作图谱（报表）、代码片段分享（Gist）等功能。目前，其注册用户已经超过 350 万，托管版本数量也是非常之多，其中不乏知名开源项目 Ruby on Rails、jQuery、python 等。', '1', 100, 1, '2019-08-28 23:35:54', '2020-09-09 05:43:40'),
(2, '我的技能', 'Manjaro Linux（或简称 Manjaro）是基于 Arch Linux 的 Linux 发行版，使用 Xfce 、GNOME和 KDE Plasma 作为默认桌面环境，和 Arch 一样，采用滚动更新。其目标是为 PC 提供易于使用的自由的操作系统。', '2', 100, 1, '2019-08-28 23:36:03', '2020-09-09 05:44:59'),
(3, '我的爱好', 'Linux 内核最初只是由芬兰人林纳斯·托瓦兹（Linus Torvalds）在赫尔辛基大学上学时出于个人爱好而编写的。\r\n\r\nLinux 是一套免费使用和自由传播的类 Unix 操作系统，是一个基于 POSIX 和 UNIX 的多用户、多任务、支持多线程和多 CPU 的操作系统。\r\n\r\nLinux 能运行主要的 UNIX 工具软件、应用程序和网络协议。它支持 32 位和 64 位硬件。Linux 继承了 Unix 以网络为核心的设计思想，是一个性能稳定的多用户网络操作系统。', '3', 100, 1, '2019-08-28 23:36:17', '2020-09-09 05:46:20');

-- --------------------------------------------------------

--
-- 表的结构 `blog_about_articles`
--

CREATE TABLE `blog_about_articles` (
  `id` bigint UNSIGNED NOT NULL,
  `articles_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '单页标题',
  `articles_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '单页内容',
  `article_show` tinyint NOT NULL DEFAULT '1' COMMENT '是否显示【1是2否】',
  `article_sort` int NOT NULL DEFAULT '100' COMMENT '单页排序',
  `notice_id` int NOT NULL DEFAULT '0' COMMENT '所属关于id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `blog_about_card_ones`
--

CREATE TABLE `blog_about_card_ones` (
  `id` bigint UNSIGNED NOT NULL,
  `card_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '卡片标题',
  `card_icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '卡片ICON',
  `card_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '卡片描述',
  `card_show` tinyint NOT NULL DEFAULT '1' COMMENT '是否显示【1是2否】',
  `card_sort` int NOT NULL DEFAULT '100' COMMENT '卡片排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notice_id` int NOT NULL DEFAULT '0' COMMENT '所属关于id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `blog_about_card_twos`
--

CREATE TABLE `blog_about_card_twos` (
  `id` bigint UNSIGNED NOT NULL,
  `card_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '卡片标题',
  `card_icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '卡片ICON',
  `card_show` tinyint NOT NULL DEFAULT '1' COMMENT '是否显示【1是2否】',
  `card_sort` int NOT NULL DEFAULT '100' COMMENT '卡片排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `card_background` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '卡片背景',
  `updated_at` timestamp NULL DEFAULT NULL,
  `notice_id` int NOT NULL DEFAULT '0' COMMENT '所属关于id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `blog_apply`
--

CREATE TABLE `blog_apply` (
  `id` bigint UNSIGNED NOT NULL,
  `apply_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '申请人博客名称',
  `apply_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '申请人博客网址',
  `apply_contact` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '申请人联系方式',
  `apply_ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '申请人IP',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `blog_friends`
--

CREATE TABLE `blog_friends` (
  `id` bigint UNSIGNED NOT NULL,
  `friends_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '博客名称',
  `friends_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '博客链接',
  `friends_describe` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '博客描述',
  `friends_contact` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '联系方式',
  `friends_show` tinyint NOT NULL DEFAULT '1' COMMENT '是否显示【1是2否】',
  `friends_type` tinyint NOT NULL DEFAULT '0' COMMENT '添加方式【1申请添加2后台添加】',
  `friends_sort` int NOT NULL DEFAULT '100' COMMENT '排序',
  `friends_recommend` tinyint(1) NOT NULL DEFAULT '2' COMMENT '是否推荐【1是2否】',
  `friends_examine` tinyint(1) DEFAULT '2' COMMENT '审核状态【1通过2正在审核3审核失败】',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `blog_friends`
--

INSERT INTO `blog_friends` (`id`, `friends_title`, `friends_link`, `friends_describe`, `friends_contact`, `friends_show`, `friends_type`, `friends_sort`, `friends_recommend`, `friends_examine`, `created_at`, `updated_at`) VALUES
(1, 'Laravel诗词博客', 'https://qqphp.com', 'Laravel诗词博客-匠心编程，热爱生活。', 'https://qqphp.com', 1, 2, 999999, 2, 1, '2019-10-12 03:54:15', '2019-10-15 23:54:05');

-- --------------------------------------------------------

--
-- 表的结构 `blog_message`
--

CREATE TABLE `blog_message` (
  `id` bigint UNSIGNED NOT NULL,
  `msg_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '留言内容',
  `msg_blog_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '留言博客名称',
  `msg_blog_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '留言博客链接',
  `msg_blog_contact` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '留言联系方式',
  `msg_ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '留言人ip',
  `msg_show` tinyint NOT NULL DEFAULT '1' COMMENT '是否显示【1是2否】',
  `msg_type` tinyint DEFAULT '0' COMMENT '留言类型【1文章2视频3留言板块】',
  `foreign_id` int DEFAULT '0' COMMENT '所属类型主键id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `blog_message`
--

INSERT INTO `blog_message` (`id`, `msg_content`, `msg_blog_name`, `msg_blog_link`, `msg_blog_contact`, `msg_ip`, `msg_show`, `msg_type`, `foreign_id`, `created_at`, `updated_at`) VALUES
(1, '此词是一曲生命的哀歌，词人通过对自然永恒与人生无常的尖锐矛盾的对比，抒发了亡国后顿感生命落空的悲哀。“问君能有几多愁？恰似一江春水向东流。”词人用满江的春水来比喻满腹的愁恨，不仅显示了愁恨的悠长深远，而且显示了愁恨的汹涌翻腾，充分体现出奔腾中的感情所具有的力度和深度。全词语言明净、凝练、优美、清新，以问起，以答结，由问天、问人而到自问，通过凄楚中不无激越的音调和曲折回旋、流转自如的艺术结构，使作者沛然莫御的愁思贯穿始终，形成沁人心脾的美感效应。', '李白', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-07 23:24:31', '2020-09-09 05:51:19'),
(2, '此曲以多种景物并置，组合成一幅秋郊夕照图，让天涯游子骑一匹瘦马出现在一派凄凉的背景上，抒发了一个飘零天涯的游子在秋天思念故乡、倦于漂泊的凄苦愁楚之情。曲中“枯藤老树昏鸦”与“小桥流水人家”是两种截然不同的画面，将哀物与喜物放在一起，形成鲜明的对比，反衬“天涯”人的思归愁绪。', '李白', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-07 23:24:35', '2020-09-09 05:51:35'),
(3, '此词开篇从滚滚东流的长江着笔，随即用“浪淘尽”，把倾注不尽的大江与名高累世的历史人物联系起来，布置了一个极为广阔而悠久的空间时间背景。然后通过对月夜江上壮美景色的描绘，借对古代战场的凭吊和对风流人物才略、气度、功业的追念，曲折地表达了作者怀才不遇、功业未就、老大未成的忧愤之情，和词人关注历史和人生的旷达之心。全词雄浑苍凉，大气磅礴，笔力遒劲，境界宏阔，给人以撼魂荡魄的艺术力量，被誉为“古今绝唱”。', '李白', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-07 23:24:38', '2020-09-09 05:51:43'),
(4, '此诗以登临凤凰台时的所见所感而起兴唱叹，以寓目山河为线索，把“凤凰”的高飞与“凤凰台”的“空”，“登临”的内在精神与“埋幽径”、“成古丘”的冷落清凉；“三山”、“二水”的自然境界，与忧谗畏讥的“浮云”惆怅和不见“长安”无奈凄凉，都被恰切的语词链条紧紧地钩连在一起，构造出阔大的境界和深沉的历史感，使诗中回荡着充沛、浑厚之气。气韵高古，格调悠远，体现了李白诗歌以气夺人的艺术特色。', '李白', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-07 23:24:42', '2020-09-09 05:52:20'),
(5, '全首中属于空间的有阁、江、栋、帘、云、雨、山、浦、潭影；属于时间的有日悠悠、物换、星移、几度秋、今何在，这些词融混在一起，都环绕着一个中心──滕王阁，而发挥着众星拱月的作用。通过在空间、时间双重维度展开对滕王阁的吟咏，笔意纵横，穷形尽象，语言凝练，感慨遥深。气度高远，境界宏大，与《滕王阁序》真可谓双璧同辉，相得益彰。', '李白', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-07 23:25:11', '2020-09-09 05:52:30'),
(6, '清秋佳节，皓月银辉，朗照南湖，波平如镜，澄彻如画，使人心旷神怡，宠辱皆忘，置身清风明月、绿水清波的南湖，诗人忘怀尘世，摆脱俗务，竟然想遗世独立，羽化成仙，乘流直上，飞升青天。洞庭湖面辽阔，水天相接，遥看湖畔酒家自在白云生处。诗人说“买酒白云边”，足见湖面之壮阔。同时又与“直上天”的异想呼应，人间酒家被诗人的想象移到天上。这即景之句充满了奇情异趣，丰富了全诗的情韵。此诗即景发兴，艺术想象奇特，铸词造语独到，启人逸思。', '李白', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-07 23:25:34', '2020-09-09 05:51:08'),
(7, '此诗借游览古迹，表达了诗人对蜀汉丞相诸葛亮雄才大略、辅佐两朝、忠心报国的称颂以及对他出师未捷而身死的惋惜之情。诗中既有尊蜀正统的观念，又有才困时艰的感慨，字里行间寄寓感物思人的情怀。全篇由景到人，由寻找瞻仰到追述回顾，由感叹缅怀到泪流满襟，章法曲折宛转，自然紧凑，顿挫豪迈，几度层折。全诗所怀者大，所感者深，雄浑悲壮，沉郁顿挫，具有震撼人心的巨大力量。', '李白', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-07 23:25:36', '2020-09-09 05:52:57');

-- --------------------------------------------------------

--
-- 表的结构 `blog_nav`
--

CREATE TABLE `blog_nav` (
  `id` bigint UNSIGNED NOT NULL,
  `nav_title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '导航名称',
  `nav_type` int NOT NULL DEFAULT '0' COMMENT '导航类型【1文章2照片3音乐4视频5软件(分享1)6图书(分享2)】',
  `nav_open` tinyint NOT NULL DEFAULT '1' COMMENT '导航是否启用【1启用2关闭】',
  `nav_sort` int NOT NULL DEFAULT '100' COMMENT '导航排序',
  `nav_pid` int NOT NULL DEFAULT '0' COMMENT '导航上级id',
  `nav_route` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '导航前端路由',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `blog_nav`
--

INSERT INTO `blog_nav` (`id`, `nav_title`, `nav_type`, `nav_open`, `nav_sort`, `nav_pid`, `nav_route`, `created_at`, `updated_at`) VALUES
(1, '我的博文', 0, 1, 1, 0, '', '2019-08-26 20:14:32', '2019-09-02 19:08:53'),
(3, 'PHP', 1, 1, 2, 1, 'article', '2019-08-26 20:33:43', '2019-09-24 20:25:32'),
(5, '我的记录', 0, 1, 7, 0, '', '2019-08-27 00:38:41', '2019-10-08 01:03:51'),
(6, '我的相册', 2, 1, 10, 5, 'photo', '2019-08-27 00:39:16', '2019-10-08 01:03:51'),
(7, '我的音乐', 3, 1, 9, 5, 'music', '2019-08-27 00:39:24', '2019-10-08 01:03:51'),
(8, '我的视频', 4, 1, 8, 5, 'video', '2019-08-27 00:39:33', '2019-10-08 01:03:51'),
(9, '我的分享', 0, 1, 11, 0, '', '2019-08-27 00:39:48', '2019-09-24 20:36:33'),
(10, 'Tp5扩展', 5, 1, 12, 9, 'card1', '2019-08-27 00:40:18', '2019-10-09 17:48:56'),
(11, 'Laravel扩展', 5, 1, 13, 9, 'card1', '2019-08-27 00:40:37', '2019-10-09 17:49:04'),
(12, '我的读书', 6, 1, 14, 9, 'card2', '2019-08-27 00:44:55', '2019-09-24 20:36:33'),
(13, '我的电影', 6, 1, 15, 9, 'card2', '2019-08-27 00:45:07', '2019-09-24 20:36:33'),
(15, '报错日记', 1, 1, 5, 1, 'article', '2019-10-07 22:30:13', '2019-10-15 17:56:22'),
(16, '解决方案', 1, 1, 6, 1, 'article', '2019-10-07 22:31:32', '2019-10-08 01:03:58'),
(17, '随想杂谈', 1, 1, 100, 1, 'article', '2019-10-15 17:57:50', '2019-10-15 17:57:50'),
(18, '工具推荐', 5, 1, 100, 9, 'card1', '2019-10-16 00:26:55', '2019-10-16 00:26:55');

-- --------------------------------------------------------

--
-- 表的结构 `blog_nav_article`
--

CREATE TABLE `blog_nav_article` (
  `id` bigint UNSIGNED NOT NULL,
  `article_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章标题',
  `article_tag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '文章标签',
  `article_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '文章描述',
  `article_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章内容',
  `article_click` int NOT NULL DEFAULT '0' COMMENT '点击量',
  `article_show` tinyint NOT NULL DEFAULT '1' COMMENT '是否显示【1是2否】',
  `article_sort` int NOT NULL DEFAULT '100' COMMENT '文章排序',
  `nav_id` int NOT NULL DEFAULT '0' COMMENT '所属导航id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `blog_nav_music`
--

CREATE TABLE `blog_nav_music` (
  `id` bigint UNSIGNED NOT NULL,
  `music_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '歌单标题',
  `music_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '歌单描述',
  `music_tag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '歌单标签',
  `music_json` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '歌单上传歌曲',
  `music_img` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '歌单封面',
  `music_click` int NOT NULL DEFAULT '0' COMMENT '点击量',
  `music_show` tinyint NOT NULL DEFAULT '1' COMMENT '是否显示【1是2否】',
  `music_play` tinyint NOT NULL DEFAULT '1' COMMENT '添加播放列表【1是2否】',
  `music_sort` int NOT NULL DEFAULT '100' COMMENT '歌单排序',
  `nav_id` int NOT NULL DEFAULT '0' COMMENT '所属导航id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `blog_nav_music`
--

INSERT INTO `blog_nav_music` (`id`, `music_title`, `music_describe`, `music_tag`, `music_json`, `music_img`, `music_click`, `music_show`, `music_play`, `music_sort`, `nav_id`, `created_at`, `updated_at`) VALUES
(1, '我的歌单', '常常在夜深人静之时仰望星空，\r\n看这一片闪烁的海洋，\r\n不禁想，头上是数以亿计孤独的集合啊。\r\n星星们看起来只有一指之隔，事实上却比人世间所有的距离都遥不可及，\r\n它们会难过吗？\r\n应该会的吧，至少它们一旦相遇便是毁灭，\r\n如同我和你的相遇，从一开始就注定是场浩劫，\r\n不可避免地走向分别。', '流行,古风,热门', '[\"files\\/love.mp3\"]', 'images/63a94b407b9266d1dd2771e3ce028592.gif', 7, 1, 1, 100, 7, '2020-09-09 05:58:02', '2020-09-09 06:38:54');

-- --------------------------------------------------------

--
-- 表的结构 `blog_nav_photo`
--

CREATE TABLE `blog_nav_photo` (
  `id` bigint UNSIGNED NOT NULL,
  `photo_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '相册标题',
  `photo_img` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '相册封面',
  `photo_tag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '相册标签',
  `photo_json` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '相册上传图片',
  `photo_click` int NOT NULL DEFAULT '0' COMMENT '点击量',
  `photo_show` tinyint NOT NULL DEFAULT '1' COMMENT '是否显示【1是2否】',
  `photo_sort` int NOT NULL DEFAULT '100' COMMENT '相册排序',
  `nav_id` int NOT NULL DEFAULT '0' COMMENT '所属导航id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `blog_nav_share1`
--

CREATE TABLE `blog_nav_share1` (
  `id` bigint UNSIGNED NOT NULL,
  `share_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分享标题',
  `share_icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'icon图标',
  `share_src` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分享封面',
  `share_intro` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '描述',
  `share_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '内容详情',
  `share_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '访问链接',
  `share_sort` int NOT NULL DEFAULT '100' COMMENT '排序',
  `share_show` tinyint NOT NULL DEFAULT '1' COMMENT '是否显示【1是2否】',
  `nav_id` int NOT NULL DEFAULT '0' COMMENT '所属导航id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `blog_nav_share2`
--

CREATE TABLE `blog_nav_share2` (
  `id` bigint UNSIGNED NOT NULL,
  `share_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分享标题',
  `share_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分享描述',
  `share_note` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '分享副标题',
  `share_src` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分享封面',
  `share_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分享链接',
  `share_sort` int NOT NULL DEFAULT '100' COMMENT '排序',
  `share_show` tinyint NOT NULL DEFAULT '1' COMMENT '是否显示【1是2否】',
  `nav_id` int NOT NULL DEFAULT '0' COMMENT '所属导航id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `blog_nav_video`
--

CREATE TABLE `blog_nav_video` (
  `id` bigint UNSIGNED NOT NULL,
  `video_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '视频标题',
  `video_tag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '视频标签',
  `video_img` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '视频封面',
  `video_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '视频路径',
  `video_click` int NOT NULL DEFAULT '0' COMMENT '点击量',
  `video_sort` int NOT NULL DEFAULT '100' COMMENT '视频排序',
  `video_recommend` int NOT NULL DEFAULT '2' COMMENT '是否推荐【1是2否】',
  `video_show` tinyint NOT NULL DEFAULT '1' COMMENT '是否显示【1是2否】',
  `nav_id` int NOT NULL DEFAULT '0' COMMENT '所属导航id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '视频描述'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `blog_notices`
--

CREATE TABLE `blog_notices` (
  `id` bigint UNSIGNED NOT NULL,
  `notice_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公告标题',
  `notice_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公告内容',
  `notice_sort` int NOT NULL DEFAULT '100' COMMENT '公告排序',
  `notice_show` tinyint NOT NULL DEFAULT '1' COMMENT '是否显示【1是2否】',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `blog_subscribes`
--

CREATE TABLE `blog_subscribes` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '申请邮箱',
  `ip` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '申请IP',
  `is_pass` tinyint NOT NULL DEFAULT '1' COMMENT '审核状态【1待审核2审核通过3冻结封禁】',
  `add_mode` tinyint NOT NULL DEFAULT '1' COMMENT '申请方式【1申请添加2后台添加】',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `aid` int DEFAULT '0' COMMENT '文章id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `blog_subscribes`
--

INSERT INTO `blog_subscribes` (`id`, `email`, `ip`, `is_pass`, `add_mode`, `created_at`, `updated_at`, `aid`) VALUES
(1, '1549684884@qq.com', NULL, 2, 2, '2019-10-08 01:19:57', '2019-10-09 19:18:24', 0);

-- --------------------------------------------------------

--
-- 表的结构 `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_content` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标签内容',
  `tag_click` int NOT NULL DEFAULT '0' COMMENT '点击量',
  `a_id` int NOT NULL DEFAULT '0' COMMENT '文章id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `blog_upload_files`
--

CREATE TABLE `blog_upload_files` (
  `id` bigint UNSIGNED NOT NULL,
  `img_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件名称',
  `img_src` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件路径',
  `img_suffix` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件后缀',
  `img_type` int NOT NULL COMMENT '文件类型【1EditorMD编辑器文件2Simditor编辑器文件】',
  `img_ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '上传ip',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(108, '2019_08_24_022201_create_blog_nav_table', 2),
(109, '2019_08_24_025115_create_blog_nav_article_table', 2),
(110, '2019_08_24_025134_create_blog_nav_photo_table', 2),
(111, '2019_08_24_025151_create_blog_nav_music_table', 2),
(112, '2019_08_24_025209_create_blog_nav_video_table', 2),
(113, '2019_08_24_025230_create_blog_nav_share1_table', 2),
(114, '2019_08_24_025240_create_blog_nav_share2_table', 2),
(115, '2019_08_25_102118_create_blog_message_table', 2),
(116, '2019_08_25_131502_create_blog_friends_table', 2),
(117, '2019_08_26_021306_create_blog_apply_table', 2),
(118, '2019_08_26_021945_create_blog_about_table', 2),
(119, '2019_08_26_104822_create_blog_upload_files_table', 2),
(120, '2017_07_17_040159_create_config_table', 3),
(121, '2019_08_29_042857_create_blog_notices_table', 4),
(125, '2019_08_29_140729_create_blog_about_articles_table', 5),
(126, '2019_08_29_140755_create_blog_about_card_ones_table', 5),
(127, '2019_08_29_140807_create_blog_about_card_twos_table', 5),
(130, '2019_09_15_132631_create_blog_subscribes_table', 6),
(131, '2019_09_27_084944_create_blog_tags_table', 7),
(133, '2019_10_07_060955_create_jobs_table', 8),
(134, '2019_10_07_071533_create_failed_jobs_table', 9);

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转储表的索引
--

--
-- 表的索引 `admin_config`
--
ALTER TABLE `admin_config`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `admin_config_name_unique` (`name`) USING BTREE;

--
-- 表的索引 `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `admin_operation_log_user_id_index` (`user_id`) USING BTREE;

--
-- 表的索引 `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `admin_permissions_name_unique` (`name`) USING BTREE,
  ADD UNIQUE KEY `admin_permissions_slug_unique` (`slug`) USING BTREE;

--
-- 表的索引 `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `admin_roles_name_unique` (`name`) USING BTREE,
  ADD UNIQUE KEY `admin_roles_slug_unique` (`slug`) USING BTREE;

--
-- 表的索引 `admin_role_menu`
--
ALTER TABLE `admin_role_menu`
  ADD KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`) USING BTREE;

--
-- 表的索引 `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`) USING BTREE;

--
-- 表的索引 `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`) USING BTREE;

--
-- 表的索引 `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `admin_users_username_unique` (`username`) USING BTREE;

--
-- 表的索引 `admin_user_permissions`
--
ALTER TABLE `admin_user_permissions`
  ADD KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`) USING BTREE;

--
-- 表的索引 `blog_about`
--
ALTER TABLE `blog_about`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_about_articles`
--
ALTER TABLE `blog_about_articles`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_about_card_ones`
--
ALTER TABLE `blog_about_card_ones`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_about_card_twos`
--
ALTER TABLE `blog_about_card_twos`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_apply`
--
ALTER TABLE `blog_apply`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_friends`
--
ALTER TABLE `blog_friends`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_message`
--
ALTER TABLE `blog_message`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_nav`
--
ALTER TABLE `blog_nav`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_nav_article`
--
ALTER TABLE `blog_nav_article`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_nav_music`
--
ALTER TABLE `blog_nav_music`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_nav_photo`
--
ALTER TABLE `blog_nav_photo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_nav_share1`
--
ALTER TABLE `blog_nav_share1`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_nav_share2`
--
ALTER TABLE `blog_nav_share2`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_nav_video`
--
ALTER TABLE `blog_nav_video`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_notices`
--
ALTER TABLE `blog_notices`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_subscribes`
--
ALTER TABLE `blog_subscribes`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `blog_upload_files`
--
ALTER TABLE `blog_upload_files`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `jobs_queue_index` (`queue`) USING BTREE;

--
-- 表的索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin_config`
--
ALTER TABLE `admin_config`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用表AUTO_INCREMENT `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- 使用表AUTO_INCREMENT `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用表AUTO_INCREMENT `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用表AUTO_INCREMENT `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `blog_about`
--
ALTER TABLE `blog_about`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `blog_about_articles`
--
ALTER TABLE `blog_about_articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog_about_card_ones`
--
ALTER TABLE `blog_about_card_ones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog_about_card_twos`
--
ALTER TABLE `blog_about_card_twos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog_apply`
--
ALTER TABLE `blog_apply`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog_friends`
--
ALTER TABLE `blog_friends`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用表AUTO_INCREMENT `blog_message`
--
ALTER TABLE `blog_message`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- 使用表AUTO_INCREMENT `blog_nav`
--
ALTER TABLE `blog_nav`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用表AUTO_INCREMENT `blog_nav_article`
--
ALTER TABLE `blog_nav_article`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog_nav_music`
--
ALTER TABLE `blog_nav_music`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `blog_nav_photo`
--
ALTER TABLE `blog_nav_photo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog_nav_share1`
--
ALTER TABLE `blog_nav_share1`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog_nav_share2`
--
ALTER TABLE `blog_nav_share2`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog_nav_video`
--
ALTER TABLE `blog_nav_video`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog_notices`
--
ALTER TABLE `blog_notices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog_subscribes`
--
ALTER TABLE `blog_subscribes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog_upload_files`
--
ALTER TABLE `blog_upload_files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*
 Navicat Premium Data Transfer

 Source Server         : hqj_sql
 Source Server Type    : MySQL
 Source Server Version : 50560
 Source Host           : 39.108.229.126:3306
 Source Schema         : hqj_blog

 Target Server Type    : MySQL
 Target Server Version : 50560
 File Encoding         : 65001

 Date: 22/10/2019 15:54:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_config
-- ----------------------------
DROP TABLE IF EXISTS `admin_config`;
CREATE TABLE `admin_config`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_config_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_config
-- ----------------------------
INSERT INTO `admin_config` VALUES (1, '__configx__', 'do not delete', '{\"base.website_title\":{\"options\":[],\"element\":\"normal\",\"help\":null,\"name\":\"\\u7ad9\\u70b9\\u6807\\u9898\",\"order\":15},\"base.website_switch\":{\"options\":[],\"element\":\"yes_or_no\",\"help\":\"\\u7ad9\\u70b9\\u5173\\u95ed\\u540e\\u5c06\\u4e0d\\u80fd\\u8bbf\\u95ee\\uff0c\\u540e\\u53f0\\u53ef\\u6b63\\u5e38\\u767b\\u5f55\",\"name\":\"\\u7ad9\\u70b9\\u5f00\\u5173\",\"order\":5},\"base.website_keyword\":{\"options\":[],\"element\":\"tags\",\"help\":\"\\u7f51\\u7ad9\\u5173\\u952e\\u8bcd\\u5c31\\u662f\\u4e00\\u4e2a\\u7f51\\u7ad9\\u7ed9\\u9996\\u9875\\u8bbe\\u5b9a\\u7684\\u4ee5\\u4fbf\\u7528\\u6237\\u901a\\u8fc7\\u641c\\u7d22\\u5f15\\u64ce\\u80fd\\u641c\\u5230\\u672c\\u7f51\\u7ad9\\u7684\\u8bcd\\u6c47\",\"name\":\"\\u7ad9\\u70b9\\u5173\\u952e\\u8bcd\",\"order\":20},\"base.website_icon\":{\"options\":[],\"element\":\"file\",\"help\":\"\\u914d\\u7f6e\\u7ad9\\u70b9icon\\u56fe\\u6807\",\"name\":\"\\u7ad9\\u70b9ICON\",\"order\":25},\"base.website_desc\":{\"options\":[],\"element\":\"textarea\",\"help\":\"\\u901a\\u8fc7\\u63cf\\u8ff0\\u80fd\\u5438\\u5f15\\u7528\\u6237\\u7684\\u70b9\\u51fb\\uff0c\\u4ece\\u800c\\u6e10\\u63a5\\u63d0\\u5347\\u7f51\\u7ad9\\u7684\\u5173\\u952e\\u8bcd\\u6392\\u540d\",\"name\":\"\\u7ad9\\u70b9\\u63cf\\u8ff0\",\"order\":30},\"base.website_keep\":{\"options\":[],\"element\":\"normal\",\"help\":\"\\u901a\\u8fc7\\u57df\\u540d\\u53ef\\u67e5\\u8be2\\u8be5\\u57df\\u540d\\u662f\\u5426\\u6709\\u5907\\u6848\\u53ca\\u76f8\\u5173\\u7684ICP\\u5907\\u6848\\u8bb8\\u53ef\\u4fe1\\u606f\",\"name\":\"\\u5907\\u6848\\u4fe1\\u606f\",\"order\":35},\"base.new_key_here\":{\"options\":[],\"element\":\"textarea\",\"help\":\"\\u6dfb\\u52a0\\u7b2c\\u4e09\\u65b9\\u5e73\\u53f0\\u4ee3\\u7801,\\u7edf\\u8ba1\\u7f51\\u7ad9\\u8bbf\\u95ee\\u6570\\u636e\\u3002\",\"name\":\"\\u7f51\\u7ad9\\u7edf\\u8ba1\\u4ee3\\u7801\",\"order\":40},\"user_info.user_qq\":{\"options\":[],\"element\":\"normal\",\"help\":null,\"name\":\"\\u4e2a\\u4ebaQQ\",\"order\":30},\"user_info.user_wechat\":{\"options\":[],\"element\":\"normal\",\"help\":null,\"name\":\"\\u4e2a\\u4eba\\u5fae\\u4fe1\",\"order\":35},\"user_info.full_name\":{\"options\":[],\"element\":\"normal\",\"help\":\"\\u7528\\u4e8e\\u5173\\u4e8e\\u6211\\u5c55\\u793a\\u4e2a\\u4eba\\u59d3\\u540d\",\"name\":\"\\u4e2a\\u4eba\\u59d3\\u540d\",\"order\":5},\"user_info.portrait\":{\"options\":[],\"element\":\"image\",\"help\":\"\\u7528\\u4e8e\\u5173\\u4e8e\\u6211\\u4e2d\\u5c55\\u793a\\u4e2a\\u4eba\\u5934\\u50cf\",\"name\":\"\\u4e2a\\u4eba\\u5934\\u50cf\",\"order\":10},\"user_info.background\":{\"options\":[],\"element\":\"image\",\"help\":\"\\u7528\\u4e8e\\u5173\\u4e8e\\u6211\\u4e2d\\u5361\\u7247\\u80cc\\u666f\",\"name\":\"\\u4e2a\\u4eba\\u80cc\\u666f\",\"order\":15},\"user_info.occupation\":{\"options\":[],\"element\":\"normal\",\"help\":\"\\u7528\\u4e8e\\u5173\\u4e8e\\u6211\\u4e2d\\u5c55\\u793a\\u4e2a\\u4eba\\u804c\\u4e1a\",\"name\":\"\\u4e2a\\u4eba\\u804c\\u4e1a\",\"order\":20},\"user_info.motto\":{\"options\":[],\"element\":\"normal\",\"help\":\"\\u7528\\u4e8e\\u5173\\u4e8e\\u6211\\u4e2d\\u5c55\\u793a\\u5ea7\\u53f3\\u94ed\",\"name\":\"\\u4e2a\\u4eba\\u5ea7\\u53f3\\u94ed\",\"order\":25},\"base.motto\":{\"options\":[],\"element\":\"normal\",\"help\":\"\\u7528\\u4e8e\\u9875\\u9762\\u5c3e\\u90e8\\u5c55\\u793a\\u5ea7\\u53f3\\u94ed\",\"name\":\"\\u5c3e\\u90e8\\u5ea7\\u53f3\\u94ed\",\"order\":45},\"base.website_background\":{\"options\":{\"@name\":\"newname\"},\"element\":\"file\",\"help\":\"\\u7528\\u4e8e\\u535a\\u5ba2\\u5404\\u4e2a\\u5bfc\\u822a\\u7684\\u80cc\\u666f\",\"name\":\"\\u535a\\u5ba2\\u80cc\\u666f\",\"order\":55},\"base.website_open_bg\":{\"options\":[],\"element\":\"yes_or_no\",\"help\":null,\"name\":\"\\u542f\\u7528\\u535a\\u5ba2\\u80cc\\u666f\",\"order\":50},\"base.website_seo_title\":{\"options\":[],\"element\":\"normal\",\"help\":\"\\u6b64\\u6807\\u9898\\u7528\\u4e8eSEO\\uff0c\\u53ef\\u4ee5\\u591a\\u52a0\\u4e00\\u4e9b\\u5173\\u952e\\u8bcd\\u3002\",\"name\":\"SEO\\u7ad9\\u70b9\\u6807\\u9898\",\"order\":10}}', '2019-08-29 03:06:19', '2019-10-16 09:30:40');
INSERT INTO `admin_config` VALUES (4, 'base.website_title', 'Laravel诗词博客', '站点标题', '2019-08-29 03:38:36', '2019-10-16 09:31:20');
INSERT INTO `admin_config` VALUES (5, 'base.website_switch', '1', '站点开关', '2019-08-29 03:40:54', '2019-09-30 09:03:10');
INSERT INTO `admin_config` VALUES (6, 'base.website_keyword', 'php,博客,blog,建站,Laravel', '站点关键词', '2019-08-29 03:49:08', '2019-10-16 09:43:20');
INSERT INTO `admin_config` VALUES (7, 'base.website_icon', 'files/85f609c82abf4a56cced64e7acd9701c.ico', '站点ICON', '2019-08-29 03:50:24', '2019-10-08 07:30:03');
INSERT INTO `admin_config` VALUES (8, 'base.website_desc', '博客，个人博客，博客模板，雷勇个人博客，雷勇PHP博客，laravel学习，laravel博客，laravel论坛，PHP论坛，PHP博客，网站模板，博客网站，个人网站，个人博客模板，个人博客网站，个人网站模板，原创网站模板，原创博客模板，个人原创模板，免费网站模板，个人博客免费模板，个人网站免费模板，个人博客模板免费下载，个人网站模板免费下载', '站点描述', '2019-08-29 03:54:15', '2019-10-16 09:43:37');
INSERT INTO `admin_config` VALUES (9, 'base.website_keep', '湘ICP备17024317号', '备案信息', '2019-08-29 03:57:55', '2019-08-29 04:07:52');
INSERT INTO `admin_config` VALUES (10, 'base.new_key_here', '<!-- Global site tag (gtag.js) - Google Analytics -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-K9FS7QZ0R3\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'G-K9FS7QZ0R3\');\r\n</script>', '网站统计代码', '2019-08-29 03:59:17', '2019-10-22 02:48:54');
INSERT INTO `admin_config` VALUES (11, 'user_info.user_qq', '1549684884', '个人QQ', '2019-08-29 04:10:20', '2019-08-29 04:11:01');
INSERT INTO `admin_config` VALUES (12, 'user_info.user_wechat', 'leiyong208', '个人微信', '2019-08-29 04:10:40', '2019-08-29 04:11:01');
INSERT INTO `admin_config` VALUES (13, 'user_info.full_name', '德玛西亚', '个人姓名', '2019-09-02 09:43:58', '2019-10-08 07:22:37');
INSERT INTO `admin_config` VALUES (14, 'user_info.portrait', 'images/3a653c7487b3e927933a8a27105a95cf.jpg', '个人头像', '2019-09-02 09:45:30', '2019-10-16 09:50:14');
INSERT INTO `admin_config` VALUES (15, 'user_info.background', 'images/f81762bd35ab9356e799925d5c57f5b7.jpg', '个人背景', '2019-09-02 09:46:28', '2019-10-08 07:22:05');
INSERT INTO `admin_config` VALUES (16, 'user_info.occupation', 'PHP世界上最好的语言', '个人职业', '2019-09-02 09:47:11', '2019-10-08 07:22:54');
INSERT INTO `admin_config` VALUES (17, 'user_info.motto', '老当益壮，宁知白首之心；穷且益坚，不坠青云之志。', '个人座右铭', '2019-09-02 09:47:53', '2019-09-03 03:36:54');
INSERT INTO `admin_config` VALUES (18, 'base.motto', '路漫漫其修远兮，吾将上下而求索', '尾部座右铭', '2019-09-02 09:56:46', '2019-09-02 09:57:21');
INSERT INTO `admin_config` VALUES (19, 'base.website_background', 'files/567351328a4d2fc2b143df942b4373d5.jpg', '博客背景', '2019-09-30 08:24:21', '2019-10-17 12:32:53');
INSERT INTO `admin_config` VALUES (20, 'base.website_open_bg', '0', '启用博客背景', '2019-09-30 08:58:21', '2019-10-17 12:34:42');
INSERT INTO `admin_config` VALUES (21, 'base.website_seo_title', 'Laravel诗词博客_雷勇博客_Laravel博客_Laravel框架_PHP框架', 'SEO站点标题', '2019-10-16 09:30:25', '2019-10-16 09:44:06');

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `permission` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES (1, 0, 1, '博客总览', 'fa-bar-chart', '/', NULL, NULL, '2019-08-26 04:24:14');
INSERT INTO `admin_menu` VALUES (2, 0, 2, '后台管理', 'fa-tasks', NULL, NULL, NULL, '2019-08-26 04:24:29');
INSERT INTO `admin_menu` VALUES (3, 2, 3, '管理员', 'fa-users', 'auth/users', NULL, NULL, '2019-08-26 04:24:46');
INSERT INTO `admin_menu` VALUES (4, 2, 4, '角色管理', 'fa-user', 'auth/roles', NULL, NULL, '2019-08-26 04:25:09');
INSERT INTO `admin_menu` VALUES (5, 2, 5, '行为日志', 'fa-ban', 'auth/permissions', NULL, NULL, '2019-08-26 04:25:26');
INSERT INTO `admin_menu` VALUES (6, 2, 6, '菜单管理', 'fa-bars', 'auth/menu', NULL, NULL, '2019-08-26 04:25:36');
INSERT INTO `admin_menu` VALUES (7, 2, 7, '操作日志', 'fa-history', 'auth/logs', NULL, NULL, '2019-08-26 04:25:46');
INSERT INTO `admin_menu` VALUES (8, 0, 8, '导航管理', 'fa-circle-o', NULL, NULL, '2019-08-26 04:26:29', '2019-08-27 08:35:57');
INSERT INTO `admin_menu` VALUES (9, 8, 9, '导航列表', 'fa-align-justify', 'blog-navs', NULL, '2019-08-26 04:26:52', '2019-08-27 08:35:57');
INSERT INTO `admin_menu` VALUES (11, 17, 11, '文章管理', 'fa-file-text-o', 'blog-nav-articles', NULL, '2019-08-27 08:30:57', '2019-08-27 08:35:57');
INSERT INTO `admin_menu` VALUES (12, 17, 12, '相册管理', 'fa-photo', 'blog-nav-photos', NULL, '2019-08-27 08:31:17', '2019-08-27 08:35:57');
INSERT INTO `admin_menu` VALUES (13, 17, 13, '歌单管理', 'fa-music', 'blog-nav-musics', NULL, '2019-08-27 08:32:37', '2019-08-27 08:35:57');
INSERT INTO `admin_menu` VALUES (14, 17, 14, '视频管理', 'fa-video-camera', 'blog-nav-videos', NULL, '2019-08-27 08:32:54', '2019-08-27 11:20:38');
INSERT INTO `admin_menu` VALUES (15, 17, 15, '分享卡片一', 'fa-credit-card-alt', 'blog-nav-share-ones', NULL, '2019-08-27 08:33:49', '2019-08-27 08:35:57');
INSERT INTO `admin_menu` VALUES (16, 17, 16, '分享卡片二', 'fa-credit-card', 'blog-nav-share-twos', NULL, '2019-08-27 08:34:16', '2019-08-27 08:35:57');
INSERT INTO `admin_menu` VALUES (17, 0, 10, '内容管理', 'fa-bars', NULL, NULL, '2019-08-27 08:34:52', '2019-08-27 08:35:57');
INSERT INTO `admin_menu` VALUES (18, 0, 17, '留言管理', 'fa-envelope-o', NULL, NULL, '2019-08-28 08:31:21', '2019-08-29 06:08:35');
INSERT INTO `admin_menu` VALUES (19, 18, 18, '留言列表', 'fa-file-text-o', 'blog-messages', NULL, '2019-08-28 08:32:24', '2019-08-29 06:08:35');
INSERT INTO `admin_menu` VALUES (20, 0, 19, '友链管理', 'fa-unlink', NULL, NULL, '2019-08-28 14:53:51', '2019-08-29 06:08:35');
INSERT INTO `admin_menu` VALUES (21, 20, 20, '链接列表', 'fa-link', 'blog-friends', NULL, '2019-08-28 14:59:05', '2019-08-29 06:08:35');
INSERT INTO `admin_menu` VALUES (23, 0, 28, '网站管理', 'fa-cog', NULL, NULL, '2019-08-29 02:58:14', '2019-08-29 14:20:38');
INSERT INTO `admin_menu` VALUES (24, 23, 29, '网站配置', 'fa-hospital-o', 'configx/edit', NULL, '2019-08-29 02:59:01', '2019-08-29 14:20:38');
INSERT INTO `admin_menu` VALUES (28, 0, 21, '公告管理', 'fa-bullhorn', NULL, NULL, '2019-08-29 05:55:14', '2019-08-29 06:08:35');
INSERT INTO `admin_menu` VALUES (29, 28, 22, '公告列表', 'fa-building-o', 'blog-notices', NULL, '2019-08-29 05:55:48', '2019-08-29 06:08:35');
INSERT INTO `admin_menu` VALUES (30, 0, 23, '关于管理', 'fa-adn', NULL, NULL, '2019-08-29 06:27:23', '2019-08-29 14:20:38');
INSERT INTO `admin_menu` VALUES (31, 30, 24, '关于列表', 'fa-align-left', 'blog-abouts', NULL, '2019-08-29 06:28:04', '2019-08-29 14:20:38');
INSERT INTO `admin_menu` VALUES (32, 30, 25, '单页管理', 'fa-file-word-o', 'blog-about-articles', NULL, '2019-08-29 14:18:42', '2019-08-29 14:28:28');
INSERT INTO `admin_menu` VALUES (33, 30, 26, '卡片管理', 'fa-credit-card', 'blog-about-card-ones', NULL, '2019-08-29 14:19:49', '2019-08-29 14:20:38');
INSERT INTO `admin_menu` VALUES (34, 30, 27, '图标管理', 'fa-fonticons', 'blog-about-card-twos', NULL, '2019-08-29 14:20:18', '2019-08-29 14:20:38');
INSERT INTO `admin_menu` VALUES (35, 0, 30, '订阅管理', 'fa-calendar-check-o', NULL, NULL, '2019-09-15 13:34:16', '2019-09-25 04:07:31');
INSERT INTO `admin_menu` VALUES (36, 35, 31, '订阅列表', 'fa-bookmark', 'blog-subscribes', NULL, '2019-09-15 13:37:03', '2019-09-25 04:07:31');

-- ----------------------------
-- Table structure for admin_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE `admin_operation_log`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `admin_operation_log_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_operation_log
-- ----------------------------
INSERT INTO `admin_operation_log` VALUES (1, 1, 'admin/blog-friends', 'GET', '113.109.21.15', '{\"_pjax\":\"#pjax-container\"}', '2019-10-22 06:07:17', '2019-10-22 06:07:17');
INSERT INTO `admin_operation_log` VALUES (2, 1, 'admin/configx/edit', 'GET', '113.109.21.15', '{\"_pjax\":\"#pjax-container\"}', '2019-10-22 06:48:53', '2019-10-22 06:48:53');
INSERT INTO `admin_operation_log` VALUES (3, 1, 'admin/configx/edit/0', 'GET', '113.109.21.15', '{\"do\":\"new_config\",\"_pjax\":\"#pjax-container\"}', '2019-10-22 06:49:24', '2019-10-22 06:49:24');
INSERT INTO `admin_operation_log` VALUES (4, 1, 'admin', 'GET', '113.109.21.15', '{\"_pjax\":\"#pjax-container\"}', '2019-10-22 07:29:53', '2019-10-22 07:29:53');

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `http_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_permissions_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `admin_permissions_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_permissions
-- ----------------------------
INSERT INTO `admin_permissions` VALUES (1, 'All permission', '*', '', '*', NULL, NULL);
INSERT INTO `admin_permissions` VALUES (2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL);
INSERT INTO `admin_permissions` VALUES (3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL);
INSERT INTO `admin_permissions` VALUES (4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL);
INSERT INTO `admin_permissions` VALUES (5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL);
INSERT INTO `admin_permissions` VALUES (6, 'Admin Configx', 'ext.configx', NULL, '/configx/*', '2019-08-29 02:56:32', '2019-08-29 02:56:32');
INSERT INTO `admin_permissions` VALUES (7, 'Admin Config', 'ext.config', NULL, '/config*', '2019-08-29 03:05:14', '2019-08-29 03:05:14');
INSERT INTO `admin_permissions` VALUES (10, 'Redis Manager', 'ext.redis-manager', NULL, '/redis*', '2019-10-07 08:26:10', '2019-10-07 08:26:10');

-- ----------------------------
-- Table structure for admin_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu`  (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  INDEX `admin_role_menu_role_id_menu_id_index`(`role_id`, `menu_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_role_menu
-- ----------------------------
INSERT INTO `admin_role_menu` VALUES (1, 2, NULL, NULL);

-- ----------------------------
-- Table structure for admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions`  (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  INDEX `admin_role_permissions_role_id_permission_id_index`(`role_id`, `permission_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_role_permissions
-- ----------------------------
INSERT INTO `admin_role_permissions` VALUES (1, 1, NULL, NULL);

-- ----------------------------
-- Table structure for admin_role_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users`  (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  INDEX `admin_role_users_role_id_user_id_index`(`role_id`, `user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES (1, 1, NULL, NULL);

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_roles_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `admin_roles_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES (1, 'Administrator', 'administrator', '2019-08-26 04:18:57', '2019-08-26 04:18:57');

-- ----------------------------
-- Table structure for admin_user_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE `admin_user_permissions`  (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  INDEX `admin_user_permissions_user_id_permission_id_index`(`user_id`, `permission_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_users_username_unique`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES (1, 'admin', '$2y$10$WXgjWZV1EuEtTiMWyzakLu2Sf5C3JjbWJtTiqXu/B98FHiQxqcr72', 'Administrator', NULL, '90pf4cYtTfayIFGhh7o6ZeXhhtmMdPJ4NB1WpxEAZPusKFAaLiUb7XguJyg0', '2019-08-26 04:18:57', '2019-10-22 06:06:12');

-- ----------------------------
-- Table structure for blog_about
-- ----------------------------
DROP TABLE IF EXISTS `blog_about`;
CREATE TABLE `blog_about`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `about_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '关于标题',
  `about_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '关于描述',
  `about_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '关于类型【1单页2卡片页3图标页】',
  `about_sort` int(11) NOT NULL DEFAULT 100 COMMENT '关于排序',
  `about_show` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示【1是2否】',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of blog_about
-- ----------------------------
INSERT INTO `blog_about` VALUES (1, '自我介绍', '海鲜，尤其是虾，砷的含量比较高。特别是当今海水和海鲜都不同程度受到污染，海水里和海鲜里砷的含量也相对比以前高。因为海鲜里含有的砷为五价砷，人食用 后是无毒的。但是，如果将海鲜与维生素C一起食用，因为后者具有还原作用，会将五价砷转变成三价砷（三氧化二砷），而三价砷就是砒霜，是有毒的。', '1', 100, 1, '2019-08-29 07:35:54', '2019-10-08 09:43:59');
INSERT INTO `blog_about` VALUES (2, '我的技能', '炖鸡、鸭、蹄汤里面油脂成分太重，建议吃肉不喝汤；补钙请喝牛奶，吃钙片；哦，对了，正常科学饮食、喝奶奶、可晒温热太阳的小朋友就不用额外补钙了。', '2', 100, 1, '2019-08-29 07:36:03', '2019-10-08 09:44:44');
INSERT INTO `blog_about` VALUES (3, '我的爱好', '朋友在网上卖蓝牙耳机的，这天跟我说买家给了个好评，差点没把我笑趴下。评论是这样写的;耳机真心不错，信号场强，听着电话逛了三条街才发现手机被偷了。', '3', 100, 1, '2019-08-29 07:36:17', '2019-10-09 07:24:41');

-- ----------------------------
-- Table structure for blog_about_articles
-- ----------------------------
DROP TABLE IF EXISTS `blog_about_articles`;
CREATE TABLE `blog_about_articles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `articles_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '单页标题',
  `articles_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '单页内容',
  `article_show` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示【1是2否】',
  `article_sort` int(11) NOT NULL DEFAULT 100 COMMENT '单页排序',
  `notice_id` int(11) NOT NULL DEFAULT 0 COMMENT '所属关于id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for blog_about_card_ones
-- ----------------------------
DROP TABLE IF EXISTS `blog_about_card_ones`;
CREATE TABLE `blog_about_card_ones`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `card_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '卡片标题',
  `card_icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '卡片ICON',
  `card_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '卡片描述',
  `card_show` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示【1是2否】',
  `card_sort` int(11) NOT NULL DEFAULT 100 COMMENT '卡片排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notice_id` int(11) NOT NULL DEFAULT 0 COMMENT '所属关于id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for blog_about_card_twos
-- ----------------------------
DROP TABLE IF EXISTS `blog_about_card_twos`;
CREATE TABLE `blog_about_card_twos`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `card_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '卡片标题',
  `card_icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '卡片ICON',
  `card_show` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示【1是2否】',
  `card_sort` int(11) NOT NULL DEFAULT 100 COMMENT '卡片排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `card_background` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '卡片背景',
  `updated_at` timestamp NULL DEFAULT NULL,
  `notice_id` int(11) NOT NULL DEFAULT 0 COMMENT '所属关于id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for blog_apply
-- ----------------------------
DROP TABLE IF EXISTS `blog_apply`;
CREATE TABLE `blog_apply`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `apply_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '申请人博客名称',
  `apply_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '申请人博客网址',
  `apply_contact` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '申请人联系方式',
  `apply_ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '申请人IP',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for blog_friends
-- ----------------------------
DROP TABLE IF EXISTS `blog_friends`;
CREATE TABLE `blog_friends`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `friends_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '博客名称',
  `friends_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '博客链接',
  `friends_describe` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '博客描述',
  `friends_contact` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '联系方式',
  `friends_show` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示【1是2否】',
  `friends_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '添加方式【1申请添加2后台添加】',
  `friends_sort` int(11) NOT NULL DEFAULT 100 COMMENT '排序',
  `friends_recommend` tinyint(1) NOT NULL DEFAULT 2 COMMENT '是否推荐【1是2否】',
  `friends_examine` tinyint(1) NULL DEFAULT 2 COMMENT '审核状态【1通过2正在审核3审核失败】',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of blog_friends
-- ----------------------------
INSERT INTO `blog_friends` VALUES (1, 'Laravel诗词博客', 'https://qqphp.com', 'Laravel诗词博客-匠心编程，热爱生活。', 'https://qqphp.com', 1, 2, 999999, 2, 1, '2019-10-12 11:54:15', '2019-10-16 07:54:05');
INSERT INTO `blog_friends` VALUES (2, 'LearnKu', 'https://learnku.com', '专为终身学习者定制的编程知识社区', 'https://learnku.com', 1, 2, 100, 1, 1, '2019-10-12 11:58:15', '2019-10-12 11:58:55');
INSERT INTO `blog_friends` VALUES (4, 'Laravel-admin', 'https://laravel-admin.org/', '在十分钟内构建一个功能齐全的管理后台', 'https://laravel-admin.org/', 1, 2, 100, 1, 1, '2019-10-12 12:31:51', '2019-10-12 12:31:51');
INSERT INTO `blog_friends` VALUES (5, '创意蒂姆', 'https://creative-tim.com/', '完全编码的UI工具可创建Web和移动应用。', 'https://creative-tim.com/', 1, 2, 100, 1, 1, '2019-10-12 12:32:46', '2019-10-12 12:32:46');
INSERT INTO `blog_friends` VALUES (8, '宝塔面板', 'https://www.bt.cn', '简单好用的服务器运维面板。', 'https://www.bt.cn', 1, 2, 100, 1, 1, '2019-10-16 07:43:01', '2019-10-16 07:43:14');
INSERT INTO `blog_friends` VALUES (9, 'PhpStudy', 'https://www.xp.cn', '为服务器环境提供最优配置的解决方案。', 'https://www.xp.cn', 1, 2, 100, 1, 1, '2019-10-16 07:44:36', '2019-10-16 07:44:42');
INSERT INTO `blog_friends` VALUES (10, 'Layui', 'https://www.layui.com', '经典模块化前端框架', 'https://www.layui.com', 1, 2, 100, 1, 1, '2019-10-16 07:47:31', '2019-10-16 07:47:31');
INSERT INTO `blog_friends` VALUES (11, 'Editor.md', 'http://editor.md.ipandao.com/', '开源在线 Markdown 编辑器', 'http://editor.md.ipandao.com/', 1, 2, 100, 1, 1, '2019-10-16 07:49:57', '2019-10-16 07:49:57');
INSERT INTO `blog_friends` VALUES (12, 'Laravel', 'https://laravel.com/', 'Web Artisans的PHP框架。', 'https://laravel.com/', 1, 2, 100, 1, 1, '2019-10-16 07:51:04', '2019-10-16 07:51:04');
INSERT INTO `blog_friends` VALUES (13, 'JetBrains', 'https://www.jetbrains.com', '专业人员和团队的开发工具', 'https://www.jetbrains.com', 1, 2, 100, 1, 1, '2019-10-16 07:53:02', '2019-10-16 07:53:02');
INSERT INTO `blog_friends` VALUES (14, '阿里云', 'https://www.aliyun.com', '上云就上阿里云', 'https://www.aliyun.com', 1, 2, 100, 1, 1, '2019-10-16 07:53:50', '2019-10-16 07:53:50');
INSERT INTO `blog_friends` VALUES (15, 'ThinkPHP', 'http://www.thinkphp.cn', '中文最佳实践PHP开源框架,专注WEB应用快速开发8年！', 'http://www.thinkphp.cn', 1, 2, 100, 1, 1, '2019-10-17 07:41:07', '2019-10-17 07:41:07');
INSERT INTO `blog_friends` VALUES (16, 'Composer', 'https://getcomposer.org', 'Composer是用于PHP中的依赖项管理的工具。', 'https://getcomposer.org', 1, 2, 100, 1, 1, '2019-10-17 07:42:25', '2019-10-17 07:42:25');

-- ----------------------------
-- Table structure for blog_message
-- ----------------------------
DROP TABLE IF EXISTS `blog_message`;
CREATE TABLE `blog_message`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `msg_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '留言内容',
  `msg_blog_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '留言博客名称',
  `msg_blog_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '留言博客链接',
  `msg_blog_contact` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '留言联系方式',
  `msg_ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '留言人ip',
  `msg_show` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示【1是2否】',
  `msg_type` tinyint(4) NULL DEFAULT 0 COMMENT '留言类型【1文章2视频3留言板块】',
  `foreign_id` int(11) NULL DEFAULT 0 COMMENT '所属类型主键id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 96 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of blog_message
-- ----------------------------
INSERT INTO `blog_message` VALUES (1, '的说三道四的所多所多', 'asd', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-08 07:24:31', '2019-10-08 07:24:31');
INSERT INTO `blog_message` VALUES (2, '的说三道四的所多所多电动车', 'asd', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-08 07:24:35', '2019-10-08 07:24:35');
INSERT INTO `blog_message` VALUES (3, '的说三道四的所多所多电动车从vcxvcxv', 'asd', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-08 07:24:38', '2019-10-08 07:24:38');
INSERT INTO `blog_message` VALUES (4, '的说三道四的所多所多电动车从vcxvcxv胜多负少的是多大的多多多多多多多多多多多多多多多多多多多多多多多多多多多', 'asd', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-08 07:24:42', '2019-10-08 07:24:42');
INSERT INTO `blog_message` VALUES (5, '的说三道四的所多所多电动车从vcxvcxv胜多负少的是多大的多多多多多多多多多多多多多多多多多多多多多多多多多多多，的说三道四的所多所多电动车从vcxvcxv胜多负少的是多大的多多多多多多多多多多多多多多多多多多多多多多多多多多多得到的说三道四的所多所多电动车从vcxvcxv胜多负少的是多大的多多多', 'asd', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-08 07:25:11', '2019-10-08 07:25:11');
INSERT INTO `blog_message` VALUES (6, '的说三道四的所多所多电动车从vcxvcxv胜多负少的是多大的多多多多多多多多多多多多多多多多多多多多多多多多多多多，的说三道四的所多所多电动车从vcxvcxv胜多负少的是多大的多多多多多多多多多多多多多多多多多多多多多多多多多多多得到的说三道四的所多所多电动车从vcxvcxv胜多负少的是多大的多多多', 'asd', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-08 07:25:34', '2019-10-08 07:25:34');
INSERT INTO `blog_message` VALUES (7, '的说三道四的所多所多电动车从vcxvcxv胜多负少的是多大的多多多多多多多多多多多多多多多多多多多多多多多多多多多，的说三道四的所多所多电动车从vcxvcxv胜多负少的是多大的多多多多多多多多多多多多多多多多多多多多多多多多多多多得到的说三道四的所多所多电动车从vcxvcxv胜多负少的是多大的多多多', 'asd', 'http://www.qqphp.com/messaged', '223', '59.41.117.32', 1, 3, 0, '2019-10-08 07:25:36', '2019-10-08 07:25:36');

-- ----------------------------
-- Table structure for blog_nav
-- ----------------------------
DROP TABLE IF EXISTS `blog_nav`;
CREATE TABLE `blog_nav`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nav_title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '导航名称',
  `nav_type` int(11) NOT NULL DEFAULT 0 COMMENT '导航类型【1文章2照片3音乐4视频5软件(分享1)6图书(分享2)】',
  `nav_open` tinyint(4) NOT NULL DEFAULT 1 COMMENT '导航是否启用【1启用2关闭】',
  `nav_sort` int(11) NOT NULL DEFAULT 100 COMMENT '导航排序',
  `nav_pid` int(11) NOT NULL DEFAULT 0 COMMENT '导航上级id',
  `nav_route` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '导航前端路由',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of blog_nav
-- ----------------------------
INSERT INTO `blog_nav` VALUES (1, '我的博文', 0, 1, 1, 0, '', '2019-08-27 04:14:32', '2019-09-03 03:08:53');
INSERT INTO `blog_nav` VALUES (3, 'PHP', 1, 1, 2, 1, 'article', '2019-08-27 04:33:43', '2019-09-25 04:25:32');
INSERT INTO `blog_nav` VALUES (5, '我的记录', 0, 1, 7, 0, '', '2019-08-27 08:38:41', '2019-10-08 09:03:51');
INSERT INTO `blog_nav` VALUES (6, '我的相册', 2, 1, 10, 5, 'photo', '2019-08-27 08:39:16', '2019-10-08 09:03:51');
INSERT INTO `blog_nav` VALUES (7, '我的音乐', 3, 1, 9, 5, 'music', '2019-08-27 08:39:24', '2019-10-08 09:03:51');
INSERT INTO `blog_nav` VALUES (8, '我的视频', 4, 1, 8, 5, 'video', '2019-08-27 08:39:33', '2019-10-08 09:03:51');
INSERT INTO `blog_nav` VALUES (9, '我的分享', 0, 1, 11, 0, '', '2019-08-27 08:39:48', '2019-09-25 04:36:33');
INSERT INTO `blog_nav` VALUES (10, 'Tp5扩展', 5, 1, 12, 9, 'card1', '2019-08-27 08:40:18', '2019-10-10 01:48:56');
INSERT INTO `blog_nav` VALUES (11, 'Laravel扩展', 5, 1, 13, 9, 'card1', '2019-08-27 08:40:37', '2019-10-10 01:49:04');
INSERT INTO `blog_nav` VALUES (12, '我的读书', 6, 1, 14, 9, 'card2', '2019-08-27 08:44:55', '2019-09-25 04:36:33');
INSERT INTO `blog_nav` VALUES (13, '我的电影', 6, 1, 15, 9, 'card2', '2019-08-27 08:45:07', '2019-09-25 04:36:33');
INSERT INTO `blog_nav` VALUES (15, '报错日记', 1, 1, 5, 1, 'article', '2019-10-08 06:30:13', '2019-10-16 01:56:22');
INSERT INTO `blog_nav` VALUES (16, '解决方案', 1, 1, 6, 1, 'article', '2019-10-08 06:31:32', '2019-10-08 09:03:58');
INSERT INTO `blog_nav` VALUES (17, '随想杂谈', 1, 1, 100, 1, 'article', '2019-10-16 01:57:50', '2019-10-16 01:57:50');
INSERT INTO `blog_nav` VALUES (18, '工具推荐', 5, 1, 100, 9, 'card1', '2019-10-16 08:26:55', '2019-10-16 08:26:55');

-- ----------------------------
-- Table structure for blog_nav_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_nav_article`;
CREATE TABLE `blog_nav_article`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `article_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章标题',
  `article_tag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '文章标签',
  `article_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '文章描述',
  `article_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章内容',
  `article_click` int(11) NOT NULL DEFAULT 0 COMMENT '点击量',
  `article_show` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示【1是2否】',
  `article_sort` int(11) NOT NULL DEFAULT 100 COMMENT '文章排序',
  `nav_id` int(11) NOT NULL DEFAULT 0 COMMENT '所属导航id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for blog_nav_music
-- ----------------------------
DROP TABLE IF EXISTS `blog_nav_music`;
CREATE TABLE `blog_nav_music`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `music_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '歌单标题',
  `music_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '歌单描述',
  `music_tag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '歌单标签',
  `music_json` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '歌单上传歌曲',
  `music_img` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '歌单封面',
  `music_click` int(11) NOT NULL DEFAULT 0 COMMENT '点击量',
  `music_show` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示【1是2否】',
  `music_play` tinyint(4) NOT NULL DEFAULT 1 COMMENT '添加播放列表【1是2否】',
  `music_sort` int(11) NOT NULL DEFAULT 100 COMMENT '歌单排序',
  `nav_id` int(11) NOT NULL DEFAULT 0 COMMENT '所属导航id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for blog_nav_photo
-- ----------------------------
DROP TABLE IF EXISTS `blog_nav_photo`;
CREATE TABLE `blog_nav_photo`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '相册标题',
  `photo_img` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '相册封面',
  `photo_tag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '相册标签',
  `photo_json` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '相册上传图片',
  `photo_click` int(11) NOT NULL DEFAULT 0 COMMENT '点击量',
  `photo_show` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示【1是2否】',
  `photo_sort` int(11) NOT NULL DEFAULT 100 COMMENT '相册排序',
  `nav_id` int(11) NOT NULL DEFAULT 0 COMMENT '所属导航id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for blog_nav_share1
-- ----------------------------
DROP TABLE IF EXISTS `blog_nav_share1`;
CREATE TABLE `blog_nav_share1`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `share_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分享标题',
  `share_icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'icon图标',
  `share_src` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分享封面',
  `share_intro` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '描述',
  `share_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '内容详情',
  `share_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '访问链接',
  `share_sort` int(11) NOT NULL DEFAULT 100 COMMENT '排序',
  `share_show` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示【1是2否】',
  `nav_id` int(11) NOT NULL DEFAULT 0 COMMENT '所属导航id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for blog_nav_share2
-- ----------------------------
DROP TABLE IF EXISTS `blog_nav_share2`;
CREATE TABLE `blog_nav_share2`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `share_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分享标题',
  `share_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分享描述',
  `share_note` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '分享副标题',
  `share_src` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分享封面',
  `share_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分享链接',
  `share_sort` int(11) NOT NULL DEFAULT 100 COMMENT '排序',
  `share_show` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示【1是2否】',
  `nav_id` int(11) NOT NULL DEFAULT 0 COMMENT '所属导航id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for blog_nav_video
-- ----------------------------
DROP TABLE IF EXISTS `blog_nav_video`;
CREATE TABLE `blog_nav_video`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `video_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '视频标题',
  `video_tag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '视频标签',
  `video_img` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '视频封面',
  `video_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '视频路径',
  `video_click` int(11) NOT NULL DEFAULT 0 COMMENT '点击量',
  `video_sort` int(11) NOT NULL DEFAULT 100 COMMENT '视频排序',
  `video_recommend` int(11) NOT NULL DEFAULT 2 COMMENT '是否推荐【1是2否】',
  `video_show` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示【1是2否】',
  `nav_id` int(11) NOT NULL DEFAULT 0 COMMENT '所属导航id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '视频描述',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for blog_notices
-- ----------------------------
DROP TABLE IF EXISTS `blog_notices`;
CREATE TABLE `blog_notices`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `notice_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公告标题',
  `notice_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公告内容',
  `notice_sort` int(11) NOT NULL DEFAULT 100 COMMENT '公告排序',
  `notice_show` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示【1是2否】',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for blog_subscribes
-- ----------------------------
DROP TABLE IF EXISTS `blog_subscribes`;
CREATE TABLE `blog_subscribes`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '申请邮箱',
  `ip` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '申请IP',
  `is_pass` tinyint(4) NOT NULL DEFAULT 1 COMMENT '审核状态【1待审核2审核通过3冻结封禁】',
  `add_mode` tinyint(4) NOT NULL DEFAULT 1 COMMENT '申请方式【1申请添加2后台添加】',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `aid` int(11) NULL DEFAULT 0 COMMENT '文章id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of blog_subscribes
-- ----------------------------
INSERT INTO `blog_subscribes` VALUES (1, '1549684884@qq.com', NULL, 2, 2, '2019-10-08 09:19:57', '2019-10-10 03:18:24', 0);

-- ----------------------------
-- Table structure for blog_tags
-- ----------------------------
DROP TABLE IF EXISTS `blog_tags`;
CREATE TABLE `blog_tags`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_content` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标签内容',
  `tag_click` int(11) NOT NULL DEFAULT 0 COMMENT '点击量',
  `a_id` int(11) NOT NULL DEFAULT 0 COMMENT '文章id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for blog_upload_files
-- ----------------------------
DROP TABLE IF EXISTS `blog_upload_files`;
CREATE TABLE `blog_upload_files`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `img_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件名称',
  `img_src` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件路径',
  `img_suffix` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件后缀',
  `img_type` int(11) NOT NULL COMMENT '文件类型【1EditorMD编辑器文件2Simditor编辑器文件】',
  `img_ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '上传ip',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 135 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (108, '2019_08_24_022201_create_blog_nav_table', 2);
INSERT INTO `migrations` VALUES (109, '2019_08_24_025115_create_blog_nav_article_table', 2);
INSERT INTO `migrations` VALUES (110, '2019_08_24_025134_create_blog_nav_photo_table', 2);
INSERT INTO `migrations` VALUES (111, '2019_08_24_025151_create_blog_nav_music_table', 2);
INSERT INTO `migrations` VALUES (112, '2019_08_24_025209_create_blog_nav_video_table', 2);
INSERT INTO `migrations` VALUES (113, '2019_08_24_025230_create_blog_nav_share1_table', 2);
INSERT INTO `migrations` VALUES (114, '2019_08_24_025240_create_blog_nav_share2_table', 2);
INSERT INTO `migrations` VALUES (115, '2019_08_25_102118_create_blog_message_table', 2);
INSERT INTO `migrations` VALUES (116, '2019_08_25_131502_create_blog_friends_table', 2);
INSERT INTO `migrations` VALUES (117, '2019_08_26_021306_create_blog_apply_table', 2);
INSERT INTO `migrations` VALUES (118, '2019_08_26_021945_create_blog_about_table', 2);
INSERT INTO `migrations` VALUES (119, '2019_08_26_104822_create_blog_upload_files_table', 2);
INSERT INTO `migrations` VALUES (120, '2017_07_17_040159_create_config_table', 3);
INSERT INTO `migrations` VALUES (121, '2019_08_29_042857_create_blog_notices_table', 4);
INSERT INTO `migrations` VALUES (125, '2019_08_29_140729_create_blog_about_articles_table', 5);
INSERT INTO `migrations` VALUES (126, '2019_08_29_140755_create_blog_about_card_ones_table', 5);
INSERT INTO `migrations` VALUES (127, '2019_08_29_140807_create_blog_about_card_twos_table', 5);
INSERT INTO `migrations` VALUES (130, '2019_09_15_132631_create_blog_subscribes_table', 6);
INSERT INTO `migrations` VALUES (131, '2019_09_27_084944_create_blog_tags_table', 7);
INSERT INTO `migrations` VALUES (133, '2019_10_07_060955_create_jobs_table', 8);
INSERT INTO `migrations` VALUES (134, '2019_10_07_071533_create_failed_jobs_table', 9);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;

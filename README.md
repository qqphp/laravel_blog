# Laravel诗词博客
> Laravel诗词博客-匠心编程，热爱生活。

> 感謝各位朋友的支持，很开心和你分享我的代码，希望大家也能多写博客，提高自己能力的同时又能以后回顾所学的知识。
  饮水思源，你的 **Star** 就是对我最好的支持。
  
> 本博客会一直维护和更新，已有基础上做调整，最大程度上确保原有用户可以 pull 代码，获取最佳体验。

![Laravel诗词博客](http://qqphp.com/uploads/images/20b108da69c0da1a1d83c1ab8cfebb15.png)

#### 简介
1. 采用 Laravel5.8 版本框架搭建
2. 前端使用 Bootstrap4 框架，适配移动、PC
3. 管理后台使用 Laravel-admin1.73 版本
4. 使用 Pjax 异步无刷新加载
5. 各个板块可自定义、扩展性强、注重细节、性能优秀
6. 写作支持 MarkDown 语法编辑器、Simditor 编辑器
7. 完美支持音乐播放、相册管理、视频播放
8. 支持邮箱订阅，发布文章，队列邮件通知
9. 支持多种 Live2D 看板娘动画
10. 可能是世界上最漂亮的博客之一！！！

#### 如何搭建此博客？
- ##### 1.前往码云获取项目clone地址
> GitHub项目地址 :`https://github.com/qqphp-com/laravel-blog-poetry-all`

> 码云项目地址 :`https://gitee.com/leiyong3/laravel_blog`

- ##### 2.使用git，克隆项目到所需存放目录
 - 示例语法：`git clone https://gitee.com/leiyong3/laravel_blog.git hqj_blog`

- ##### 3.克隆完成后，进入项目的框架目录
 - **注意**： `.../code/laravel_blog` 目录下

- ##### 4.复制.env.example示例文件，创建.env文件
 - Linux 复制命令： `cp .env.example .env`
 
- ##### 5.在 `.env` 文件中，配置数据库连接等配置
 - 关闭调试模式，配置站点URL
 ```
 APP_DEBUG=false
 APP_URL=https://qqphp.com(你的域名)
 ```
 - 数据库配置
 ```
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=laravel_blog
 DB_USERNAME=laravel_blog
 DB_PASSWORD=密码
 ```
 - 配置队列运行方式
 ```
 QUEUE_CONNECTION=database
 ```

 - ***注意***： `QUEUE_CONNECTION=sync` ，需要配置成【 `database` 、`redis` 】，否则代码会同步执行，队列将不会生效。本项目使用 `database`，也可以使用 Redis ，但需安装扩展 `predis/predis ~1.0`，同时 PHP 也需要添加 Redis 扩展支持。

- ##### 5.导入初始化演示数据
 - 将 `.../code/laravel_blog/sql/qqphp_com.sql` 文件数据，导入数据库。
 - 然后生成应用密钥 、执行 ` php artisan key:generate`

- ##### 6.执行 composer install 获取安装框架所需扩展
进入项目目录，也就是 laravel_blog 目录下，存在 `composer.lock` 的目录,执行 `composer install` ,执行后，会生成一个 `vendor` 目录，里面包含了此博客需要的所有扩展。
 - **注意**：如果执行报错，有可能是 PHP 扩展缺失，必要扩展 `fileinfo` , PHP 版本需要 >= 7.1.3。

- ##### 7.登录博客后台，配置网站设置
博客后台访问网址： `域名/admin` ,默认管理员账号 `admin`,密码 `admin` 。

#### 鸣谢
 `Laravel诗词博客` 本博客致谢开源作者们开发的优秀插件或服务。  
 - [Laravel](https://laravel.com)
 - [Laravel-admin](https://github.com/z-song/laravel-admin)
 - [Jquery-pjax](https://github.com/defunkt/jquery-pjax)
 - [APlayer](http://aplayer.js.org)
 - [DPlayer ](http://dplayer.js.org)
 - [Toc-helper](https://gitee.com/itlangz/toc-helper)
 - [Simditor](https://simditor.tower.im)
 - [Font Awesome](https://fontawesome.com)
 - [Composer](https://getcomposer.org)
 - [Creative-Tim](https://www.creative-tim.com)
 - [Bootstrap](https://getbootstrap.com)

#### 执照
Laravel诗词博客根据 [MIT许可证（MIT）](https://github.com/z-song/laravel-admin/blob/master/LICENSE)获得许可。
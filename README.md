![Laravel诗词博客](http://qiniu.qqphp.com/uugai.com_1573111132577.png)

> Laravel诗词博客-匠心编程，热爱生活。

> 感謝各位朋友的支持，很开心和你分享我的代码，希望大家也能多写博客，提高自己能力的同时又能以后回顾所学的知识。饮水思源，你的 **Star** 就是对我最好的支持。

> 本博客会一直维护和更新，已有基础上做调整，最大程度上确保原有用户可以 pull 代码，获取最佳体验。如果你在安装过程中遇到了问题，请提交 `Issue` ,我将会为你提供帮助。

![Laravel诗词博客](http://qiniu.qqphp.com/QQ%E6%88%AA%E5%9B%BE20191018102559.png)

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
10. 支持七牛云对象存储文件上传
11. 可能是世界上最漂亮的博客之一

#### 服务器要求
 - 安装 Nginx/Apache
 - 安装 MySQL
 - 安装 PHP >= 7.1.3 【推荐版本7.2】
 > PHP必要扩展
 ```
  DOM PHP 扩展
  OpenSSL PHP 拓展
  PDO PHP 拓展
  Mbstring PHP 拓展
  Tokenizer PHP 拓展
  XML PHP 拓展
  Ctype PHP 拓展
  JSON PHP 拓展
  BCMath PHP 拓展
  FileInfo PHP 扩展
 ```

#### 如何搭建此博客？
> 博客开源发布以来，受到了很多人的认同和赞美，同时也收到了很多大家给出的有效建议，在此很感谢大家支持。不过在安装过程中由于大家安装环境不同，部分朋友可能遇到个别小问题难以解决，请提交 `Issue` ,我将会为你提供帮助，**务必仔细查阅** ，都由作者经过多次实际操作，写的较为详尽。

- ##### Laravel 诗词博客开源地址
 > GitHub项目地址： `https://github.com/qqphp-com`

 > 码云项目地址: `https://gitee.com/qqphp`

 > 如果你喜欢此博客，或者对你有帮助，可以 **Star** 支持，十分感谢。安装教程写的比较详情，请仔细查阅。

- ##### 在 `.env` 文件中，配置数据库连接等配置
 ```
 APP_DEBUG=false
 APP_URL=https://qqphp.com(你的域名)
 QUEUE_CONNECTION=database
 ```

- 数据库配置

 ```
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=数据库名
 DB_USERNAME=帐号
 DB_PASSWORD=密码
 ```

- ##### 导入初始化演示数据
  - 将 `.../code/laravel_blog/sql/qqphp.sql` 文件数据，导入 MySQL 数据库。

- ##### 设置文件目录软链接
  - 执行命令： php artisan aetherupload:groups 会自动在配置文件的 groups 下新增分组
  - Linux系统下赋予 `storage`,`public` 目录读写权限，执行 `chmod -R 777 storage`,`chmod -R 777 public`
  - Linux系统下执行创建软链接 `ln -s /www/wwwroot/项目目录/storage/ /www/wwwroot/项目目录/public/`

- 配置文件上传,可上传本地或者七牛云

上传本地存储需在 `.env` 文件中加入 `UPLOAD_TYPE=admin`

上传到七牛云需在 `.env` 文件中加入 `UPLOAD_TYPE=qiniu`

```
    //如果需要上传七牛云，需在 `config/filesystems.php` 文件中加入以下配置。
    'qiniu' => [
            'driver'  => 'qiniu',
            'domains' => [
                'default'   => 'qiniu.qqphp.com', //你的七牛域名【融合 CDN 加速域名*必填】
                'https'     => '',         //你的HTTPS域名
                'custom'    => '',                //你的自定义域名
            ],
            'access_key'=> 'Yne-lN5CK1a0**********duEEylaoUjQAI',  //AccessKey【*必填】
            'secret_key'=> 'I2AecMg_MHUxEj**********zZo9hSWykRx3NO',  //SecretKey【*必填】
            'bucket'    => 'leiyong-blog',  //Bucket名字【实例名称*必填】
            'notify_url'=> '',  //持久化处理回调地址
            'url'       => '',  // 填写文件访问根url
            'access'    => '',  //空间访问控制 public 或 private
        ],
```

- ##### 登录博客后台，配置网站设置
博客后台访问网址： `域名/admin` ,默认管理员账号 `admin`,密码 `admin` ，开始愉快博客写作之旅。

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

#### 常见问题
- 1.执行 `composer install` 命令,报错无法下载扩展?
 > 首先确保MySQL数据库能正常连接，然后检查 PHP 扩展、再次确认 PHP >= 7.1.3 版本。Linux 可以执行 `php -m` 查看已有扩展。

- 2.无法上传大视频或者歌曲文件？
 > **确认上传文件目录 `public` 和 `storage` 有增删权限**, 且设置了软连接。然后配置 PHP 配置文件 `php.ini` 的上传文件配置。在配置文件中找到如下参数修改:

```
file_uploads = on ;是否允许通过HTTP上传文件的开关。
upload_max_filesize = 1024m ;允许上传文件大小的最大值。
post_max_size = 1024m ;指通过表单 POST 给 PHP 的所能接收的最大值。
max_execution_time = 600 ;每个 PHP 页面运行的最大时间值(秒)。
memory_limit = 128m ;每个 PHP 页面所吃掉的最大内存。
```

- 3.音乐、视频无法播放，HTTP 异步请求报 206 或 416 状态码？
 > 安装好后，音乐、视频无法播放， HTTP 异步请求 出现 **416 、206** 的状态码。是由于缺失 PHP 必要扩展，检查 PHP 扩展是否包含安装教程中所罗列的必要扩展。

- 4.文章内容无法显示或显示后又自动隐藏？
 > 是由于 `Composer install` 时执行过程中出现错误，导致部分扩展未能下载造成，如 Pjax 扩展，可以删除 `Vendor` 目录，检查 PHP 扩展，确认操作环境无误后，重新执行 `Composer install` 下载扩展，删除浏览器缓存，重新查看文章。

- 5.以上步骤配置执行完后，访问域名报 500 的错误？
 > 确保入口文件,也就是运行目录指向 `.../public/` 目录下。检查是否已经配置 Laravel 的伪静态设置,确保请求引导至 `index.php` 前端控制器。参考 Laravel5.8  中文文档配置 : `https://learnku.com/docs/laravel/5.8/installation/3879`。配置好伪静态，重启web服务器访问即可。

- 6.composer install时出现 `Warning: putenv() has been disabled for security reasons` 的问题？
 > 是由于 PHP 可能在安装后会自动禁用一些函数，去除禁用函数即可。

- 7.网站安装好后，访问出现 `Warning: require(/www/wwwroot/blog/code/laravel_blog/vendor/autoload.php): failed to open stream: Operation not permitted in /www/wwwroot/blog/code/laravel_blog/public/index.php on line 24`的问题？
 > 是由于站点开启了防跨站攻击（open_basedir）的设置，关闭该设置后重启 PHP 服务即可。

- 8.上传文件出现 `stream_copy_to_stream(): read of 8192 bytes failed with errno=21 Is a directory` 报错？
 > 是由于 PHP 配置中默认上传文件大小为 2M，修改 php.ini 文件中 `upload_max_filesize = 2M`的配置，调整到你需到的大小即可。


#### 执照
Laravel 诗词博客根据 [MIT许可证（MIT）](https://github.com/qqphp-com)获得许可。

#### 博客修复与调整日志
 - *2019年10月01日* 博客第一个版本正式上线与开源
 - *2019年11月07日* 新增七牛云存储文件上传功能与配置
 - *2020年01月03日* 修复文章详情刷新后内容不见BUG，修复视频详情刷新后无法再次播放问题。
 - *2020年09月09日* 修复顶级导航下无子导航时页面报错Bug，简化安装逻辑。

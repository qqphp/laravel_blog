<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{processing_files($configs['base.website_icon'])}}">
    <link rel="icon" type="image/png" href="{{processing_files($configs['base.website_icon'])}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{$configs['base.website_seo_title']}}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{$configs['base.website_keyword']}}">
    <meta name="description" content="{{$configs['base.website_desc']}}">
    <!--     字体和图标     -->
    <link href="{{__STATIC_HOME__}}/assets/css/fonts-googleapis.css" rel="stylesheet" />
    <link href="{{__STATIC_HOME__}}/fontawesome-free-5.10.1-web/css/all.min.css" rel="stylesheet">
    <link href="{{__STATIC_HOME__}}/fontawesome-free-5.10.1-web/css/v4-shims.min.css" rel="stylesheet">
    <!-- CSS文件 -->
    <link href="{{__STATIC_HOME__}}/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{__STATIC_HOME__}}/assets/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
    <!--引入自己CSS-->
    <link href="{{__STATIC_HOME__}}/assets/css/my_settings.css" rel="stylesheet" />
    <!--谷歌统计代码-->
    {!! $configs['base.new_key_here'] !!}
</head>

<body class="index-page sidebar-collapse">
<!-- 导航栏开始 -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{url('article')}}" rel="tooltip" data-placement="bottom">
                {{$configs['base.website_title']}}
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{url('article')}}">
                        <button type="button" class="btn btn-sm btn-info btn-round">
                            <i class="fa fa-heart"></i>进入博客
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- 导航栏结束 -->
<div class="page-header section-dark" style="background-image: url('{{__STATIC_HOME__}}/assets/img/trisomy.jpg')">
    <div class="filter"></div>
    <div class="content-center">
        <div class="container">
            <div class="title-brand">
                <h1 class="presentation-title">偶成</h1>
                <div class="fog-low">
                    <img src="{{__STATIC_HOME__}}/assets/img/fog-low.png" alt="">
                </div>
                <div class="fog-low right">
                    <img src="{{__STATIC_HOME__}}/assets/img/fog-low.png" alt="">
                </div>
            </div>
            <h2 class="presentation-subtitle text-center">少年易老学难成，一寸光阴不可轻。</h2>
            <h2 class="presentation-subtitle text-center">未觉池塘春草梦，阶前梧叶已秋声。 </h2>
        </div>
    </div>
    <div class="moving-clouds" style="background-image: url('{{__STATIC_HOME__}}/assets/img/clouds.png'); "></div>
    <h6 class="category category-absolute">{{$configs['base.website_keep']}}</h6>
</div>
</body>
<!--   核心JS文件   -->
<script src="{{__STATIC_HOME__}}/assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="{{__STATIC_HOME__}}/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="{{__STATIC_HOME__}}/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  开关插件，完整的文档如下：http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{__STATIC_HOME__}}/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Sliders插件，完整文档如下：http://refreshless.com/nouislider/ -->
<script src="{{__STATIC_HOME__}}/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  pplugin用于日期选取器，完整文档如下：https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="{{__STATIC_HOME__}}/assets/js/plugins/moment.min.js"></script>
<script src="{{__STATIC_HOME__}}/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- 工具箱控制中心：视差效果、示例页面脚本等 -->
<script src="{{__STATIC_HOME__}}/assets/js/paper-kit.js?v=2.2.0" type="text/javascript"></script>


</html>
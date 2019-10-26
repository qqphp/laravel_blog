@extends('home.main')
@section('title','文章列表')
@section('content')
    <div class="container pt-5">
        <div class="title">
            <blockquote class="blockquote text-right">
                <p class="mb-0">行路难！行路难！多歧路，今安在？长风破浪会有时，直挂云帆济沧海。</p>
                <footer class="blockquote-footer">《行路难》
                    <cite title="Source Title">李白</cite>
                </footer>
            </blockquote>
        </div>
        <div class="container">
            <!--最新发布开始-->
            <div class="row">
                <div class="col-md-9 ml-auto mr-auto ">
                    <div class="title">
                        <h3>猜你喜欢
                            <br>
                            <small>
                                杨花落尽子规啼，闻道龙标过五溪。我寄愁心与明月，随君直到夜郎西。--《闻王昌龄左迁龙标遥有此寄》(李白)
                            </small>
                        </h3>
                    </div>
                    <div class="row ">
                        @foreach($random_article as $k => $v)
                            <div class="col-md-6">
                                <div class="card" data-color="{{$background_color[$k]}}" data-background="color">
                                    <div class="card-body text-center">
                                        <h6 class="card-category">
                                            <i class="fa fa-tree" aria-hidden="true"></i>
                                            {{$configs['base.website_title']}} -- {{$v->nav_name->nav_title}}
                                        </h6>
                                        <h5 class="card-title" style="height: 60px;">
                                            <a href="{{url('article_details',['id'=>$v->id])}}">
                                                {{$v->article_title}}
                                            </a>
                                        </h5>
                                        <p class="card-description" style="height: 70px;">
                                            {{str_limit($v->article_describe,80)}}
                                        </p>
                                        <div class="card-footer text-center">
                                            <a href="javascript:void(0);" rel="tooltip" title="书签"
                                               class="btn btn-outline-neutral btn-round btn-just-icon"
                                               onclick="addBookmark('http://qqphp.com')"><i
                                                        class="fa fa-bookmark-o"></i></a>
                                            <a href="{{url('article_details',['id'=>$v->id])}}"
                                               class="btn btn-neutral btn-round"><i class="fa fa-newspaper-o"></i>
                                                阅读</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3 mr-auto ml-auto stats">
                    <div class="col-sm-12 p-0">
                        <h5 class="title">
                            本站统计
                        </h5>
                        <ul class="list-unstyled">
                            <li>
                                <b>{{$show_article->total()}}</b>篇文章
                            </li>
                            <li>
                                <b>{{$article_click}}</b>次阅读
                            </li>
                            <li>
                                <b>{{$total_msg}}</b>条留言
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="col-sm-12 p-0">
                        <div class="input-group">
                            <input type="text" name="search_title" class="form-control" placeholder="搜索本站文章">
                            <div class="input-group-append" onclick="search_article()">
                                <span class="input-group-text" style="cursor:pointer;">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-sm-12 p-0">
                        <div class="sentence"><strong>每日一句</strong>
                            <h2>{{date('Y年m月d日')}} {{$week_list[date('w')]}}</h2>
                            <p id="hitokoto"></p>
                        </div>
                    </div>
                    <div class="col-sm-12 border p-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="输入邮箱订阅我">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mt-1">
                                <button class="btn btn-sm btn-primary btn-round float-right" onclick="subscribe_me()">
                                    <i class="fa fa-heart"></i> 订阅
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-2 p-0">
                        <h5>博客公告</h5>
                        <div class="row">
                            <div class="col-sm-12">
                                @foreach($notice_list as $k => $v)
                                    <div class="alert alert-success alert-with-icon" data-notify="container"
                                         style="cursor: pointer;" data-toggle="modal" data-target="#notice{{$v->id}}">
                                        <div class="container">
                                            <div class="alert-wrapper" data-toggle="modal"
                                                 data-target="#notice{{$v->id}}">
                                                <div class="message">
                                                    <i class="fas fa-lightbulb"></i>
                                                    {{$v->notice_title}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--最新发布结束-->
            <!--所有文章开始-->
            <div class="row">
                <div class="col-md-9 ml-auto mr-auto">
                    <div class="title">
                        <h3>所有文章
                            <br>
                            <small>结庐在人境，而无车马喧。问君何能尔？心远地自偏。采菊东篱下，悠然见南山。山气日夕佳，飞鸟相与还。此中有真意，欲辨已忘言。--《饮酒》(陶渊明)</small>
                        </h3>
                    </div>
                    <div class="row collections">
                        @foreach($show_article as $k => $v)
                            <div class="col-md-12">
                                <div class="card" data-background="color" data-color="{{$background_color[$k]}}"
                                     data-radius="none">
                                    <div class="card-body text-center">
                                        <h6 class="card-category">
                                            <i class="fa fa-tree"
                                               aria-hidden="true"></i>{{$configs['base.website_title']}}
                                            -- {{$v->nav_name->nav_title}}
                                        </h6>
                                        <h4 class="card-title">
                                            <a href="{{url('article_details',['id'=>$v->id])}}">{{$v->article_title}}</a>
                                        </h4>
                                        <p class="card-description" style="height: 50px;">{{str_limit($v->article_describe,100)}}</p>
                                        <a href="javascript:void(0);" rel="tooltip" title="书签"
                                           class="btn btn-outline-neutral btn-round btn-just-icon"
                                           onclick='addBookmark("{{url('article_details',['id'=>$v->id])}}")'><i
                                                    class="fa fa-bookmark-o"></i></a>
                                        <a href="{{url('article_details',['id'=>$v->id])}}"
                                           class="btn btn-neutral btn-round"><i class="fa fa-newspaper-o"></i>阅读</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--分页开始-->
                    <div class="pagination-area">
                        {{$show_article->onEachSide(1)->appends(['search_title'=>$search_title])->links('vendor.pagination.default')}}
                    </div>
                    <!--分页结束-->
                </div>
                <div class="col-md-3 mr-auto ml-auto stats">
                    <div class="col-sm-12 mt-2 p-0">
                        <p class="h5">标签云</p>
                        @foreach($tag_result as $v)
                            <a href="javascript:void(0)" class="badge badge-{{$tag_color[$v->tag_color]}}  badge-pill" onclick="tag_article('{{$v->tag_content}}')">{{$v->tag_content}}({{$v->article_count}})</a>
                        @endforeach
                    </div>
                    <h5 class="title">
                        热门文章
                    </h5>
                    <ul class="list-unstyled">
                        @foreach($hot_article as $k => $v)
                            <li>
                                <h5>
                                    <a href="{{url('article_details',['id'=>$v->id])}}"
                                       class="text-muted">{{$v->article_title}}</a>
                                </h5>
                                <a href="javascript:void(0);" class="btn btn-sm {{$button_color[$k]}} btn-link" onclick='addBookmark("{{url('article_details',['id'=>$v->id])}}")'>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i> {{$v->article_like}}
                                </a>
                                <a href="javascript:void(0);" class="btn btn-sm {{$button_color[$k]}} btn-link">
                                    <i class="far far fa-kiss-beam" aria-hidden="true"></i> {{$v->article_click}}
                                </a>
                                <hr>
                            <li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!--所有文章结束-->
        </div>
    </div>
    <!-- 公告弹出 modal -->
    @foreach($notice_list as $k => $v)
        <div class="modal fade" id="notice{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-notice">
                <div class="modal-content">
                    <div class="modal-header no-border-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title" id="myModalLabel">{{$v->notice_title}}</h5>
                    </div>
                    <div class="modal-body">
                        {!! $v->notice_content !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-link" data-dismiss="modal">知晓</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- 一言插件 -->
    <script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto&v={{time()}}" defer></script>
    {{--收藏--}}
    <script type="text/javascript">
        function addBookmark(url, title) {
            if (!url) {
                url = window.location
            }
            if (!title) {
                title = document.title
            }
            var browser = navigator.userAgent.toLowerCase();
            if (window.sidebar) { // Mozilla, Firefox, Netscape
                window.sidebar.addPanel(title, url, "");
            } else if (window.external) { // IE or chrome
                if (browser.indexOf('chrome') == -1) { // ie
                    window.external.AddFavorite(url, title);
                } else { // chrome
                    layer.msg('请按ctrl+d（或macs的command+d）将此页加入书签。');
                }
            } else if (window.opera && window.print) { // Opera - automatically adds to sidebar if rel=sidebar in the tag
                return true;
            } else if (browser.indexOf('konqueror') != -1) { // Konqueror
                layer.msg('请按ctrl+b将此页加入书签。');
            } else if (browser.indexOf('webkit') != -1) { // safari
                layer.msg('请按ctrl+b（或macs的command+d）将此页加入书签。');
            } else {
                layer.msg('您的浏览器无法使用此链接添加书签。请手动添加此链接。')
            }
        }
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function subscribe_me() {
            var email_name = $("input[name='email']").val();
            if (email_name == '' || email_name == undefined || email_name == null) {
                layer.msg('订阅邮箱号不能为空!');
                return false;
            }
            var pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if (pattern.test(email_name) !== true) {
                layer.msg('订阅邮箱格式错误!');
                return false;
            }
            var url = "{{url('subscribe')}}";
            $.ajax({
                url: url,
                dataType: "json",
                data: {email_name: email_name},
                type: "post",
                beforeSend: function () {
                    var index = layer.load(1, {
                        shade: [0.1, '#fff'] //0.1透明度的白色背景
                    });
                },
                success: function (data) {
                    layer.closeAll();
                    layer.msg(data.msg);
                },
                error: function (data) {
                    layer.closeAll();
                    if(data.responseJSON.errors){
                        var get_name = ['email_name'];
                        var lenght = get_name.length;
                        var err_msg = data.responseJSON.errors;
                        for(var i = 0;i<lenght;i++){
                            var err_name = get_name[i];
                            if(err_msg[err_name]){
                                layer.msg(err_msg[err_name][0]);
                                break;
                            }
                        }
                    }else{
                        layer.msg('订阅失败,请重试');
                    }
                }
            });
        }

        function search_article(){
            // 取得要提交页面的URL地址
            var url = "{{{url()->current()}}}";
            // 取得要提交的参数
            var search_title = $("input[name='search_title']").val();

            // 创建Form
            var form = $('<form id="search_form"></form>');
            form.attr('action', url);        // 设置Form表单的action属性
            form.attr('method', 'post');        // 设置Form表单的method属性
            var csrf = '@csrf';
            form.append(csrf);
            // 创建input
            var input_title = $('<input type="text" name="search_title" />');
            input_title.attr('value', search_title);     // 设置input的value属性

            // 把input添加到表单中
            form.append(input_title);
            // 把表单添加到document.body中（不然在谷歌浏览器中会报错）
            $(document.body).append(form);

            // 提交表单（当然也可以通过AJAX来提交了，只要你喜欢）
            form.submit();
            $("#search_form").remove();
            return false;
        }
        
        function tag_article($tag_content) {
            // 取得要提交页面的URL地址
            var url = "{{{url()->current()}}}";

            // 创建Form
            var form = $('<form id="tag_form"></form>');
            form.attr('action', url);        // 设置Form表单的action属性
            form.attr('method', 'post');        // 设置Form表单的method属性
            var csrf = '@csrf';
            form.append(csrf);
            // 创建input
            var input_tag = $('<input type="text" name="tag_content" />');
            input_tag.attr('value', $tag_content);     // 设置input的value属性

            // 把input添加到表单中
            form.append(input_tag);

            // 把表单添加到document.body中（不然在谷歌浏览器中会报错）
            $(document.body).append(form);

            // 提交表单（当然也可以通过AJAX来提交了，只要你喜欢）
            form.submit();
            $("#tag_form").remove();
            return false;
        }
    </script>
@endsection
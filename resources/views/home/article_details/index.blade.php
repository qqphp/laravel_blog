@extends('home.main')
@section('title','文章详情')
@section('content')
    <div class="container pt-5">
        <div class="title">
            <blockquote class="blockquote text-right">
                <p class="mb-0">床前明月光，疑是地上霜。 举头望明月，低头思故乡。</p>
                <footer class="blockquote-footer">《静夜思》
                    <cite title="Source Title">李白</cite>
                </footer>
            </blockquote>
        </div>
        <!--右侧边栏开始-->
        <div class="row">
            <div class="col-sm-9" data-parallax="true" style="background-color: #f7f7f9">
                <div class="row">
                    <main class="col-sm-12 bd-content pb-4">
                        <h4 class="bd-title">{{$article_result->article_title}}</h4>
                        <blockquote class="blockquote text-right">
                            <p class="mb-0">最后更新时间：{{$article_result->updated_at}}</p>
                        </blockquote>
                        <div class="col-sm-12 m-2">
                            @php
                                $tags = explode(',',$article_result->article_tag);
                            @endphp
                            @foreach($tags as $k => $tag)
                                <span class="badge badge-{{$badge_arr[$k]}} badge-pill">{{$tag}}</span>
                            @endforeach
                        </div>
                        <div class="col-sm-12 p-0">
                            <div id="test-editor" data-toc="#toc">
                                <textarea style="display:none;">{{$article_result->article_content}}</textarea>
                            </div>
                        </div>
                    </main>
                </div>
                <div class="container mb-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <button type="button" class="btn btn-primary btn-round btn-sm" onclick="addBookmark('{{$article_url}}','buffer now')"><i class="fa fa-bookmark-o"></i>
                                    书签
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mr-auto ml-auto">
                <div class="row">
                    <div id="toc"></div>
                </div>
            </div>
        </div>
        <!--右侧边栏结束-->
        <div class="row">
            <div class="col-sm-9 mt-3">
                <div class="bd-example" data-example-id="">
                    <div class="card">
                        <div class="card-body">
                            <blockquote class="blockquote blockquote-primary mb-0">
                                <p>您必须遵守 署名-非商业性使用-相同方式共享 <a href="https://creativecommons.org/licenses/by-nc-sa/4.0" class="btn btn-link btn-success p-0" target="_blank">CC BY-NC-SA</a> 使用这篇文章</p>
                                <p>本文链接：<a href="{{$article_url}}" class="text-info" target="_blank">{{$article_url}}</a></p>
                                <footer class="blockquote-footer">转载注明出处：{{$configs['base.website_title']}}</footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <a href="{{url('article_details',['a_id'=>$previousPostID])}}">
                            <div class="pull-left">
                                <button class="btn btn-sm btn-success btn-round" type="button">
                                    <i class="fa fa-angle-left"></i>上一篇
                                </button>
                            </div>
                        </a>
                        <a href="{{url('article_details',['a_id'=>$nextPostID])}}">
                            <div class="pull-right">
                                <button class="btn btn-sm btn-success btn-round" type="button">
                                    下一篇<i class="fa fa-angle-right"></i>
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleFormControlTextarea1">给我留言</label>
                    <textarea class="form-control textarea-limited" id="msg_content" placeholder="读书不觉已春深，一寸光阴一寸金。" rows="3" maxlength="150"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-3" style="margin-bottom: 5px;">
                        <div class="input-group">
                            <input type="text" name="msg_blog_name" class="form-control" placeholder="博客名称">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="nc-icon nc-paper" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3" style="margin-bottom: 5px;">
                        <div class="input-group">
                            <input type="text" name="msg_blog_link" class="form-control" placeholder="博客网址">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="nc-icon nc-planet" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3" style="margin-bottom: 5px;">
                        <div class="input-group">
                            <input type="text" name="msg_blog_contact" class="form-control" placeholder="微信/QQ/邮箱">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="nc-icon nc-chat-33" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3" style="margin-bottom: 5px;">
                        <div class="input-group">
                            <button class="btn btn-primary btn-round" id="submit_msg">
                                <i class="fa fa-heart"></i>提 交
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="media-area">
                                <h3 class="mt-0" id="msg_record">留言条数·{{$article_message->total()}}</h3>
                                <input type="hidden" name="msg_total" value="{{$article_message->total()}}">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="msg_board">
                        @foreach($article_message as $k => $v)
                            <div class="col-sm-12 ml-auto">
                                <div class="card" data-background="color" data-color="{{$bg_arr[$k]}}">
                                    <div class="card-body">
                                        <div class="author">
                                            <a href="{{$v->msg_blog_link}}" target="_blank">
                                                <img src="{{asset(__STATIC_HOME__)}}/assets/img/qqhead.png" alt="..." class="avatar img-raised">
                                                <span>{{$v->msg_blog_name}}</span>
                                            </a>
                                        </div>
                                        <span class="category-social pull-right">
                                            <i class="fa fa-quote-right"></i>
                                        </span>
                                        <div class="clearfix"></div>
                                        <p class="card-description">“{{$v->msg_content}}”</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="pagination-area mt-3">
                        {{$article_message->onEachSide(1)->links('vendor.pagination.default')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $(function () {
            markdown();
        });
        function markdown() {
            var testEditor;
            $(function() {
                testEditor = editormd.markdownToHTML("test-editor", { //注意：这里是上面DIV的id
                    htmlDecode: "style,script,iframe",
                    emoji: true,
                    taskList: true,
                    tocm: true,
                    markdownSourceCode: false, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
                    flowChart: true, // 默认不解析
                    sequenceDiagram: true, // 默认不解析
                    codeFold: true
                });
            });
            $(document).ready(function() {
                new TocHelper({
                    top: 100,
                    tocFixed: false
                }).reset();
            });
        }
        
        $("#submit_msg").click(function(){
            var msg_content = $("#msg_content").val();
            var msg_blog_name = $("input[name='msg_blog_name']").val();
            var msg_blog_link = $("input[name='msg_blog_link']").val();
            var msg_blog_contact = $("input[name='msg_blog_contact']").val();
            var foreign_id = "{{$article_result->id}}";
            var url = "{{url('article_msg')}}";
            $.ajax({
                url: url,
                dataType: "json",
                data: {msg_content: msg_content,msg_blog_name:msg_blog_name,msg_blog_link:msg_blog_link,msg_blog_contact:msg_blog_contact,foreign_id:foreign_id,msg_type:1},
                type: "post",
                beforeSend: function () {
                    var index = layer.load(1, {
                        shade: [0.1, '#fff'] //0.1透明度的白色背景
                    });
                },
                success: function (data) {
                    layer.closeAll();
                    layer.msg(data.msg);
                    var msg_div = data.result;
                    append_msg_content(msg_div);
                },
                error: function (data) {
                    layer.closeAll();
                    if(data.responseJSON.errors){
                        var get_name = ['msg_content','msg_blog_name','msg_blog_link','msg_blog_contact'];
                        var lenght = get_name.length;
                        var err_msg = data.responseJSON.errors;

                        // console.log(err_msg);return false;
                        for(var i = 0;i<lenght;i++){
                            var err_name = get_name[i];
                            if(err_msg[err_name]){
                                layer.msg(err_msg[err_name][0]);
                                break;
                            }
                        }
                    }else{
                        layer.msg('提交失败,请重试');
                    }
                }
            });
        });

        function append_msg_content(msg_div){
            var msg_board = $("#msg_board");
            msg_board.prepend(msg_div);
            //留言条数增加
            var msg_total = $("input[name='msg_total']").val();
            var total_number = parseInt(msg_total) + 1;
            $("input[name='msg_total']").val(total_number);
            var msg_record = "留言条数·"+total_number;
            $("#msg_record").html(msg_record);
        }

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
    <script type="text/javascript">
        var ua = navigator.userAgent.toLowerCase();
        var copy_url = "{{$article_url}}";
        var author = "{{$configs['user_info.full_name']}}";
        var site_name = "{{$configs['base.website_title']}}";
        if (window.ActiveXObject) {  /* 兼容IE */
            document.body.oncopy = function () {
                event.returnValue = false;
                var selectedText = document.selection.createRange().text;
                var pageInfo = '<br>---------------------<br>著作权归作者所有。<br>'
                    + '商业转载请联系作者获得授权，非商业转载请注明出处。<br>'
                    + '作者：'+ author +'<br> 源地址：' + copy_url
                    + '<br>来源：'+site_name+'<br>© 本文为' + site_name + '「'+ author + '」的原创文章，遵循 CC BY-NC-SA 版权协议，转载请附上原文出处链接及本声明。';
                clipboardData.setData('Text', selectedText.replace(/\n/g, '<br>') + pageInfo);
            }
        }
        else {
            function addCopyRight() {
                var body_element = document.getElementsByTagName('body')[0];
                var selection = window.getSelection();
                var pageInfo = '<br>---------------------<br>著作权归作者所有。<br>'
                    + '商业转载请联系作者获得授权，非商业转载请注明出处。<br>'
                    + '作者：'+ author +'<br> 源地址：' + copy_url
                    + '<br>来源：'+site_name+'<br>© 本文为' + site_name + '「'+ author + '」的原创文章，遵循 CC BY-NC-SA 版权协议，转载请附上原文出处链接及本声明。';
                var copyText = selection.toString().replace(/\n/g, '<br>') + pageInfo;  // Solve the line breaks conversion issue
                var newDiv = document.createElement('div');
                newDiv.style.position = 'absolute';
                newDiv.style.left = '-99999px';
                body_element.appendChild(newDiv);
                newDiv.innerHTML = copyText;
                selection.selectAllChildren(newDiv);
                window.setTimeout(function () {
                    body_element.removeChild(newDiv);
                }, 0);
            }
            document.oncopy = addCopyRight;
        }
    </script>
@endsection

@extends('home.main')
@section('title','视频详情')
@section('content')
    <!-- Dplay 视频播放插件-->
    <link rel="stylesheet" href="{{asset(__STATIC_HOME__)}}/assets/dplay/DPlayer.min.css">
    <div class="container pt-5">
        <div class="title">
            <blockquote class="blockquote text-right">
                <p class="mb-0">草长莺飞二月天，拂堤杨柳醉春烟。儿童散学归来早，忙趁东风放纸鸢。</p>
                <footer class="blockquote-footer">《村居》
                    <cite title="Source Title">高鼎</cite>
                </footer>
            </blockquote>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="title">
                    <h3>视频详情
                        <br>
                        <small>红豆生南国,春来发几枝？愿君多采撷,此物最相思。--《相思》(王维)</small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9 mb-2">
                <div id="dplayer"></div>
            </div>
            <div class="col-sm-3">
                <h5>{{$video_result->video_title}}</h5>
                <div class="col-sm-12 m-2">
                    @php
                        $tags = explode(',',$video_result->video_tag);
                    @endphp
                    @foreach($tags as $k => $tag)
                        <label class="badge badge-pill badge-{{$badge_arr[$k]}}">{{$tag}}</label>
                    @endforeach
                </div>
                <blockquote class="blockquote text-left">
                    <p class="mb-0">{{$video_result->video_describe}}</p>
                    <footer class="blockquote-footer text-right">{{date_conversion($video_result->created_at)}}</footer>
                </blockquote>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-9">
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
            <div class="col-md-12 mb-2">
                <div class="media-area">
                    <h3 class="mt-0" id="msg_record">留言条数·{{$video_message->total()}}</h3>
                    <input type="hidden" name="msg_total" value="{{$video_message->total()}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9" id="msg_board">
                @foreach($video_message as $k => $v)
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
            <div class="col-sm-9">
                <div class="pagination-area mt-3">
                    {{$video_message->onEachSide(1)->links('vendor.pagination.default')}}
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="video_url" value="{{asset('storage/'.str_replace('_','/',$video_result->video_link))}}">
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#submit_msg").click(function(){
            var msg_content = $("#msg_content").val();
            var msg_blog_name = $("input[name='msg_blog_name']").val();
            var msg_blog_link = $("input[name='msg_blog_link']").val();
            var msg_blog_contact = $("input[name='msg_blog_contact']").val();
            var foreign_id = "{{$video_result->id}}";
            var url = "{{url('article_msg')}}";
            $.ajax({
                url: url,
                dataType: "json",
                data: {msg_content: msg_content,msg_blog_name:msg_blog_name,msg_blog_link:msg_blog_link,msg_blog_contact:msg_blog_contact,foreign_id:foreign_id,msg_type:2},
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
    </script>
@endsection

@extends('home.main')
@section('title','留言列表')
@section('content')
    <div class="container pt-5">
        <div class="title">
            <blockquote class="blockquote text-right">
                <p class="mb-0">折花逢驿使，寄与陇头人。 江南无所有，聊赠一枝春。</p>
                <footer class="blockquote-footer">《赠范晔诗》
                    <cite title="Source Title">陆凯</cite>
                </footer>
            </blockquote>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">留言内容</label>
                    <textarea class="form-control textarea-limited" id="msg_content" placeholder="读书不觉已春深，一寸光阴一寸金。" rows="3" maxlength="150"></textarea>
                </div>
            </div>
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
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="media-area">
                    <h3 class="mt-0" id="msg_record">留言条数·{{$result_list->total()}}</h3>
                    <input type="hidden" name="msg_total" value="{{$result_list->total()}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 ml-auto">
                <div class="card-group" id="msg_board">
                    @foreach($result_list as $k => $v)
                        <div class="card" data-background="color" data-color="{{$bg_arr[$k]}}">
                                <div class="card-body">
                                    <div class="author">
                                        <a href="{{$v->msg_blog_link}}" target="_blank">
                                            <img src="{{asset(__STATIC_HOME__)}}/assets/img/qqhead.png" alt="..."
                                                 class="avatar img-raised">
                                            <span>
                                            {{$v->msg_blog_name}}
                                            </span>
                                        </a>
                                    </div>
                                    <span class="category-social pull-right">
                                        <i class="fa fa-quote-right"></i>
                                    </span>
                                    <div class="clearfix"></div>
                                    <p class="card-description">
                                        “{{$v->msg_content}}”
                                    </p>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-12">
                <div class="pagination-area">
                    {{$result_list->onEachSide(1)->links('vendor.pagination.default')}}
                </div>
            </div>
        </div>
    </div>
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
            var foreign_id = 0;
            var url = "{{url('article_msg')}}";
            $.ajax({
                url: url,
                dataType: "json",
                data: {msg_content: msg_content,msg_blog_name:msg_blog_name,msg_blog_link:msg_blog_link,msg_blog_contact:msg_blog_contact,foreign_id:foreign_id,msg_type:3},
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
            //判断留言条数，如果小于6，则追加，大于6则去除最后一个
            console.log(msg_board.children().length);
            if(msg_board.children().length >= 6){
                msg_board.children("div:last").remove();
            }
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
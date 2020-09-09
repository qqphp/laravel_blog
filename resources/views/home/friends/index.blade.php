@extends('home.main')
@section('title','优秀博客')
@section('content')
    <style type="text/css">
        .btn {
            margin: 0px 0px 5px 5px;
        }
    </style>
    <div class="container pt-5">
        <div class="title">
            <blockquote class="blockquote text-right">
                <p class="mb-0">送客南昌尉，离亭西候春。野花看欲尽，林鸟听犹新。别酒青门路，归轩白马津。相知无远近，万里尚为邻。</p>
                <footer class="blockquote-footer">《送韦城李少府》
                    <cite title="Source Title">张九龄</cite>
                </footer>
            </blockquote>
        </div>
    </div>
    <div class="container">
        <div class="title">
            <h3>
                提交友链<br>
                <small>人生得意须尽欢，莫使金樽空对月。天生我材必有用，千金散尽还复来。--《将进酒》(李白)</small>
            </h3>
        </div>
        <div class="row">
            <div class="col-sm-3" style="margin-bottom: 5px;">
                <div class="input-group">
                    <input type="text" name="friends_title" class="form-control" placeholder="博客名称">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="nc-icon nc-paper" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3" style="margin-bottom: 5px;">
                <div class="input-group">
                    <input type="text" name="friends_link" class="form-control" placeholder="博客网址">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="nc-icon nc-planet" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3" style="margin-bottom: 5px;">
                <div class="input-group">
                    <input type="text" name="friends_contact" class="form-control" placeholder="微信/QQ/邮箱">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="nc-icon nc-chat-33" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3" style="margin-bottom: 5px;">
                <div class="input-group">
                    <button class="btn btn-primary btn-round" onclick="send_blog()">
                        <i class="fa fa-heart"></i>提 交
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="title">
            <h3>博主推荐
                <br>
                <small>十年磨一剑,霜刃未曾试。今日把示君，谁有不平事。--《剑客·述剑》(贾岛)</small>
            </h3>
        </div>
        <div class="container">
            <div class="row">
                @foreach($recommend_list as $vo)
                    <div class="col-sm-2 mb-2">
                        <a href="{{$vo->friends_link}}" class="btn btn-outline-default btn-round m-0" role="button" aria-disabled="true" style="width: 100%;" target="_blank"><i class="fas fa-battery-full"></i> {{$vo->friends_title}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        <div class="title">
            <h3>优秀推荐
                <br>
                <small>碧玉妆成一树高，万条垂下绿丝绦。不知细叶谁裁出，二月春风似剪刀。--《咏柳》(贺知章)</small>
            </h3>
        </div>
        <div class="container">
            <div class="row">
                @foreach($normal_list as $vo)
                    <div class="col-sm-2 mb-2">
                        <a href="{{$vo->friends_link}}" class="btn btn-outline-success btn-round m-0" role="button" aria-disabled="true" style="width: 100%;" target="_blank"><i class="fas fa-battery-three-quarters"></i> {{$vo->friends_title}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function send_blog() {
            var friends_title = $("input[name='friends_title']").val();
            var friends_link = $("input[name='friends_link']").val();
            var friends_contact = $("input[name='friends_contact']").val();
            var url = "{{url('friends_store')}}";
            $.ajax({
                url:url,
                dataType:"json",
                data:{friends_title:friends_title,friends_link:friends_link,friends_contact:friends_contact},
                type:"post",
                beforeSend:function(){
                    var index = layer.load(1, {
                        shade: [0.1,'#fff'] //0.1透明度的白色背景
                    });
                },
                success:function(data){
                    layer.closeAll();
                    layer.msg(data.msg);
                },
                error:function (data) {
                    layer.closeAll();
                    if(data.responseJSON.errors){
                        var get_name = ['friends_title','friends_link','friends_contact'];
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
        }
    </script>
@endsection
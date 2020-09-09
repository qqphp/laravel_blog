@extends('home.main')
@section('title','视频列表')
@section('content')
    <div class="container pt-5">
        <div class="title">
            <blockquote class="blockquote text-right">
                <p class="mb-0">篱落疏疏一径深，树头花落未成阴。儿童急走追黄蝶，飞入菜花无处寻。</p>
                <footer class="blockquote-footer">《宿新市徐公店》
                    <cite title="Source Title">杨万里</cite>
                </footer>
            </blockquote>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="title">
                    <h3>视频列表
                        <br>
                        <small>千山鸟飞绝，万径人踪灭。孤舟蓑笠翁，独钓寒江雪。--《江雪》(柳宗元)</small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="card page-carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($recommended_video as $k=>$v)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}" @if($k == 0)class="active" @endif ></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            @foreach ($recommended_video as $k=>$v)
                            <div class="carousel-item  @if($k == 0)active @endif > ">
                                <img class="d-block img-fluid" src="{{processing_files($v->video_img)}}" alt="{{$v->video_title}}">
                                <div class="carousel-caption d-none d-md-block">
                                    <p>{{$v->video_title}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="left carousel-control carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="fa fa-angle-left"></span>
                            <span class="sr-only">上一个</span>
                        </a>
                        <a class="right carousel-control carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="fa fa-angle-right"></span>
                            <span class="sr-only">下一个</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <p class="bd-lead">精选推荐</p>
                <div class="list-group">
                    @foreach ($recommended_video as $k=>$v)
                        <a href="{{url('video_details',['vid'=>$v->id])}}" class="list-group-item list-group-item-action list-group-item-light">
                            <span class="badge badge-pill badge-primary">{{$k+1}}</span>{{$v->video_title}}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-3">
            @foreach($video_result as $v)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="video-img" data-background="image" style="background-image: url('{{processing_files($v->video_img)}}');"></div>
                        <div class="card-body">
                            <h5 class="card-title">{{$v->video_title}}</h5>
                            <hr>
                            <div class="card-footer text-center">
                                <a href="{{url('video_details',['vid'=>$v->id])}}" class="btn btn-sm btn-success btn-round">
                                    <i class="far fa-play-circle" aria-hidden="true"></i>
                                    播放视频
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="pagination-area">
                    {{$video_result->onEachSide(1)->links('vendor.pagination.default')}}
                </div>
            </div>
        </div>
    </div>
@endsection
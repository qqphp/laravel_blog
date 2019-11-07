@extends('home.main')
@section('title','我的分享')
@section('content')
    <div class="container pt-5">
        <div class="title">
            <blockquote class="blockquote text-right">
                <p class="mb-0">红豆生南国，春来发几枝。愿君多采撷，此物最相思。</p>
                <footer class="blockquote-footer">《相思》
                    <cite title="Source Title">王维</cite>
                </footer>
            </blockquote>
        </div>
        <div class="row">
            @foreach($result_list as $key => $v)
                <div class="col-sm-3">
                    <div class="card card-pricing" data-background="image" style="background-image: url('{{processing_files($v->share_src)}}');position:relative;">
                        <div class="card-body" style="width: 100%;">
                            <h6 class="card-category">
                                <i class="fas fa-share-alt"></i>
                                {{$v->nav_name->nav_title}}
                            </h6>
                            <div class="card-icon">
                                <i class="@if(strpos($v->share_icon,' ')) {{$v->share_icon}} @else fa {{$v->share_icon}} @endif"></i>
                            </div>
                            <h3 class="card-title">
                                {{$v->share_title}}
                            </h3>
                            <p class="card-description" style="height: 70px;">
                                {{str_limit($v->share_intro,80)}}
                            </p>
                            <div class="card-footer">
                                <a href="javascript:void(0);" class="btn btn-info btn-round card-link" data-toggle="modal" data-target="#myModal{{$v->id}}" style="position: absolute;bottom: 10px;left: 50%;transform: translate(-50%);">
                                    查看详情
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- 软件弹出分享详情start -->
        @foreach($result_list as $k => $v)
        <div class="modal fade" id="myModal{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h5 class="modal-title text-center" id="exampleModalLabel">{{$v->share_title}}</h5>
                    </div>
                    <div class="modal-body">
                        {!! $v->share_describe !!}
                    </div>
                    <div class="modal-footer">
                        <div class="right-side">
                            <a href="{{$v->share_link}}" target="_blank"><button type="button" class="btn btn-success btn-link">链接</button></a>
                        </div>
                        <div class="divider"></div>
                        <div class="left-side">
                            <button type="button" class="btn btn-default btn-link" data-dismiss="modal">关闭</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- 软件弹出分享详情end -->
        <div class="col-sm-12">
            <div class="pagination-area mt-3">
                {{$result_list->onEachSide(1)->links('vendor.pagination.default')}}
            </div>
        </div>
    </div>
@endsection
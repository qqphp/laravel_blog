@extends('home.main')
@section('title','我的分享')
@section('content')
    <div class="container pt-5">
        <div class="title">
            <blockquote class="blockquote text-right">
                <p class="mb-0">好雨知时节，当春乃发生。随风潜入夜，润物细无声。野径云俱黑，江船火独明。晓看红湿处，花重锦官城。</p>
                <footer class="blockquote-footer">《春夜喜雨》
                    <cite title="Source Title">杜甫</cite>
                </footer>
            </blockquote>
        </div>
        <div class="row">
            @foreach($result_list as $k => $v)
            <div class="col-sm-3">
                <div class="card" data-background="image" style="background-image: url('{{__STATIC_UPLOADS__}}/{{$v->share_src}}')">
                    <div class="card-body" style="width: 100%;">
                        <h6 class="card-category">
                            <i class="fas fa-shapes"></i>
                            {{$v->nav_name->nav_title}}
                        </h6>
                        <a href="{{$v->share_link}}" target="_blank">
                            <h5 class="card-title">{{$v->share_title}}</h5>
                        </a>
                        <p class="card-description" style="min-height: 220px">
                            {{str_limit($v->share_describe,240)}}
                        </p>
                        <div class="card-footer">
                            <div class="author"><span>{{$v->share_note}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-sm-12">
            <div class="pagination-area mt-3">
                {{$result_list->onEachSide(1)->links('vendor.pagination.default')}}
            </div>
        </div>
    </div>
@endsection
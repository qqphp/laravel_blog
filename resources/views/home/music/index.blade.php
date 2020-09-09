@extends('home.main')
@section('title','歌单列表')
@section('content')
    <div class="container pt-5">
        <div class="title">
            <blockquote class="blockquote text-right">
                <p class="mb-0">谁家玉笛暗飞声，散入春风满洛城。 此夜曲中闻折柳，何人不起故园情。</p>
                <footer class="blockquote-footer">《春夜洛阳城闻笛》
                    <cite title="Source Title">李白</cite>
                </footer>
            </blockquote>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="title">
                    <h3>音乐列表
                        <br>
                        <small>日暮苍山远,天寒白屋贫。柴门闻犬吠,风雪夜归人。--《逢雪宿芙蓉山主人》(刘长卿)</small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($music_result as $v)
                <div class="col-sm-3">
                    <div class="card" data-background="image" style="background-image: url('{{asset(__STATIC_HOME__)}}/assets/img/noah-wetering.jpg')" style="height: 200px;">
                        <div class="card-body">
                            <div style="height: 200px;">
                                <a href="{{url('music_details',['mid'=>$v->id])}}">
                                    <h5 class="card-title">{{$v->music_title}}</h5>
                                </a>
                                <p class="card-description">
                                    {{str_limit($v->music_describe,160)}}
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="{{url('music_details',['mid'=>$v->id])}}" class="btn btn-sm btn-success btn-round">
                                    <i class="fa fa-music" aria-hidden="true"></i>播放歌单
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
                    {{$music_result->onEachSide(1)->links('vendor.pagination.default')}}
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('home.main')
@section('title','相册列表')
@section('content')
    <div class="container pt-5">
        <div class="title">
            <blockquote class="blockquote text-right">
                <p class="mb-0">枯藤老树昏鸦，小桥流水人家，古道西风瘦马。夕阳西下，断肠人在天涯。</p>
                <footer class="blockquote-footer">《天净沙·秋思》
                    <cite title="Source Title">马致远</cite>
                </footer>
            </blockquote>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="title">
                    <h3>相册列表
                        <br>
                        <small>折戟沉沙铁未销,自将磨洗认前朝。东风不与周郎便,铜雀春深锁二乔。--《赤壁》(唐/杜牧)</small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($photo_result as $v)
                <div class="col-sm-3">
                    <div class="card mb-3">
                        <a href="{{url('photo_details',['pid'=>$v->id])}}">
                            <div class="photo-img" data-background="image"
                                 style="background-image: url('{{__STATIC_UPLOADS__.'/'.$v->photo_img}}');"></div>
                            <div class="card-body">
                                <h5 class="card-title">{{$v->photo_title}}</h5>
                                <p class="card-text">
                                    <small class="text-muted">更新时间：{{$v->updated_at}}</small>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

            <!--            <div class="col-sm-3">-->
            <!--                <div class="card mb-3">-->
            <!--                    <a href="photo_detail.html">-->
            <!--                        <img class="card-img-top" style="height: 160px;" src="{{asset(__STATIC_HOME__)}}/assets/img/trisomy.jpg" alt="Card image cap">-->
            <!--                        <div class="card-body">-->
            <!--                            <h5 class="card-title">九嶷山旅游</h5>-->
            <!--                            <p class="card-text"><small class="text-muted">发布时间：2018-02-05</small></p>-->
            <!--                        </div>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="pagination-area">
                    {{$photo_result->onEachSide(1)->links('vendor.pagination.default')}}
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('home.main')
@section('title','关于我')
@section('content')
    <div class="container pt-5">
        <div class="title">
            <blockquote class="blockquote text-right">
                <p class="mb-0">明月几时有？把酒问青天。不知天上宫阙，今夕是何年。我欲乘风归去，又恐琼楼玉宇，高处不胜寒。起舞弄清影，何似在人间。</p>
                <footer class="blockquote-footer">《水调歌头·明月几时有》
                    <cite title="Source Title">苏轼</cite>
                </footer>
            </blockquote>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="card card-profile">
                    <div class="card-cover" style="background-image: url('{{processing_files($configs['user_info.background'])}}')">
                    </div>
                    <div class="card-avatar border-white">
                        <a href="javascript:void(0);">
                            <img src="{{processing_files($configs['user_info.portrait'])}}" alt="...">
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            {{$configs['user_info.full_name']}}
                        </h4>
                        <h6 class="card-category">
                            {{$configs['user_info.occupation']}}
                        </h6>
                        <p class="card-description">
                            {{$configs['user_info.motto']}}
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="javascript:void(0);" class="btn btn-just-icon btn-outline-info" data-html="true" data-toggle="tooltip" data-placement="top"  data-clipboard-action="copy" data-clipboard-text="{{$configs['user_info.user_qq']}}" id="copy_qq">
                            <i class="fa fa-qq" aria-hidden="true"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-just-icon btn-outline-success" data-html="true" data-toggle="tooltip" data-placement="top" data-clipboard-action="copy" data-clipboard-text="{{$configs['user_info.user_wechat']}}" id="copy_wx">
                            <i class="fa fa-wechat" aria-hidden="true" data-clipboard-action="copy" data-clipboard-target="#copy_wx"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                            @foreach($about_data as $key => $about)
                                <li class="nav-item">
                                    <a class="nav-link @if($key == 0) active @endif" data-toggle="tab" href="#a{{$about->id}}" role="tab">{{$about->about_title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="my-tab-content" class="tab-content">
                    @foreach($about_data as $key => $about)
                        @if($about->about_type == 1)
                            <div class="tab-pane @if($key == 0) active @endif" id="a{{$about->id}}" role="tabpanel">
                                @if($about->about_describe)
                                    <div class="container">
                                        <div class="bd-callout">
                                            <p>
                                                {{$about->about_describe}}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                <div class="description">
                                    @if(isset($about->article->articles_content))
                                        {!! $about->article->articles_content !!}
                                    @endif
                                </div>
                            </div>
                        @elseif($about->about_type == 2)
                            <div class="tab-pane @if($key == 0) active @endif" id="a{{$about->id}}" role="tabpanel">
                                @if($about->about_describe)
                                    <div class="container">
                                        <div class="bd-callout">
                                            <p>
                                                {{$about->about_describe}}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    @foreach($about->card1 as $card_key1 => $card1)
                                        <div class="col-md-4 mb-2">
                                            <div class="info border">
                                                <div class="icon icon-primary">
                                                    <i class="@if(strpos($card1->card_icon,' ')) {{$card1->card_icon}} @else fa {{$card1->card_icon}} @endif"></i>
                                                </div>
                                                <div class="description">
                                                    <h4 class="info-title">{{$card1->card_title}}</h4>
                                                    <p>
                                                        {{$card1->card_content}}
                                                    </p>
                                                </div>
                                                <div class="container">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @elseif($about->about_type == 3)
                            <div class="tab-pane @if($key == 0) active @endif" id="a{{$about->id}}" role="tabpanel">
                                @if($about->about_describe)
                                    <div class="container">
                                        <div class="bd-callout">
                                            <p>
                                                {{$about->about_describe}}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    @foreach($about->card2 as $card_key2 => $card2)
                                        <div class="col-md-3 mb-2">
                                            <div class="card card-pricing" data-background="image" style="background-image: url('{{processing_files($card2->card_background)}}')">
                                                <div class="card-body" style="min-height: 0px;padding-top: 0px;padding-bottom: 0px;">
                                                    <div class="card-icon">
                                                        <i class="@if(strpos($card2->card_icon,' ')) {{$card2->card_icon}} @else fa {{$card2->card_icon}} @endif"></i>
                                                    </div>
                                                    <h3 class="card-title">
                                                        {{$card2->card_title}}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
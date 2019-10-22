@if ($paginator->hasPages())
    <ul class="pagination pagination-primary pagination-no-border justify-content-center">
        {{-- 上一页链接 --}}
        {{--@if ($paginator->onFirstPage())--}}
            {{--<li class="page-item">--}}
                {{--<a href="javascript:void(0);" class="page-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>--}}
            {{--</li>--}}
        {{--@else--}}
            {{--<li class="page-item">--}}
                {{--<a href="{{ $paginator->previousPageUrl() }}" class="page-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>--}}
            {{--</li>--}}
        {{--@endif--}}

        {{-- 分页的元素 --}}
        @foreach ($elements as $element)
            {{-- 分页中间的省略号 --}}
            {{--@if (is_string($element))--}}
                {{--<li class="page-item">--}}
                    {{--<a href="javascript:void(0);" class="page-link">{{ $element }}</a>--}}
                {{--</li>--}}
            {{--@endif--}}

            {{-- 数组的链接 --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a href="javascript:void(0);" class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        {{--@if ($paginator->hasMorePages())--}}
            {{--<li class="page-item">--}}
                {{--<a href="{{ $paginator->nextPageUrl() }}" class="page-link"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>--}}
            {{--</li>--}}
        {{--@else--}}
            {{--<li class="page-item">--}}
                {{--<a href="javascript:void(0);" class="page-link"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>--}}
            {{--</li>--}}
        {{--@endif--}}
    </ul>
@endif

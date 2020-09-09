<div {!! $attributes !!} >
    @foreach($rows as $row)
        <div class="row">
        @foreach($row->geFields() as $item)
            <div class="col-md-{!! $row->getSpan($item->column()) !!} div-table-col">{!! $item->render() !!}</div>
        @endforeach
        </div>
    @endforeach
</div>
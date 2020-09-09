<table {!! $attributes !!}>
    @if(count($headers))
    <thead>
    <tr>
        @foreach($headers as $header)
            @if($headers_th)
            <th>{!! $header !!}</th>
            @else
            <td>{!! $header !!}</td>
            @endif
        @endforeach
    </tr>
    </thead>
    @endif
    <tbody>
    @foreach($rows as $row)
    <tr>
        @foreach($row->geFields() as $item)
        <td colspan="{!! $row->getSpan($item->column()) !!}">{!! $item->render() !!}</td>
        @endforeach
    </tr>
    @endforeach
    </tbody>
</table>
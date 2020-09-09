<div class="col-sm-3">
    <div class="row">
        <a style="padding:3px 5px;float:right;margin-right:10px;" href="?do=backup" class="btn btn-default"><i class="fa fa-floppy-o"></i>&nbsp;{!! $saveTitle !!}</a>
    </div>
    <div class="row">
        @foreach($tree as $title => $fields)
        <label class="control-label">
            <i class="fa fa-plus-square-o"></i>&nbsp;{!! $title !!}
            @if($tabsEdit)
            <a href='{!! $tabsEdit !!}' style='margin-left:5px;' title='{!! $editTitle !!}'>
                <i class='fa fa-edit'></i>
            </a>
            @endif
        </label>

        <div class="dd">
            <ol class="dd-list" style="left:2%;">
                @foreach($fields as $field)
                @if(isset($field['options']) && array_get($field['options'],'divide') =='befor')
                <li style="margin:5px 0;text-align:center;"><i class="fa fa-scissors"></i> - - - - - - - - - - - - - -</li>
                @endif
                <li title="{!! $field['name'] !!}" style="border:1px dashed #c1c1c1;padding:5px;margin-bottom:5px;color:#666;overflow:hidden;" class="dd-item configx-{!! $field['id'] !!}" data-id="{!! $field['id'] !!}">
                    <span class="dd-drag"><i class="fa fa-arrows"></i>&nbsp;{!! $field['label'] !!}-</span><b>[{!! $field['type_name'] !!}]</b>
                    <span class="pull-right dd-nodrag">
                        <a title="{!! $editTitle !!}" href="{!! $field['href'] !!}"><i class="fa fa-edit"></i></a>
                        @if($field['id'] != $current_id)
                        <a style="margin-left:5px;" title="{!! $editTitle !!}" onclick="delConfig({!! $field['id'] !!});" href="javascript:;"><i class="fa fa-trash-o"></i></a>
                        @else
                        <a style="margin-left:5px;cursor: not-allowed;" title="{!! $editTitle !!}" href="javascript:;"><i class="fa fa-trash-o"></i></a>
                        @endif
                    </span>
                    @if(isset($field['tds']) && count($field['tds']))
                    <ul class="dd-list">
                        @foreach($field['tds'] as $td)
                        <li title="{!! $td['name'] !!}" style="border-bottom:1px dashed #c1c1c1;padding:2px;margin-bottom:4px;overflow:hidden;" class="configx-{!! $td['id'] !!}"><span>{!! $td['label'] !!}</span>-<b>[{!! $td['type_name'] !!}]</b>
                            <a class="pull-right dd-nodrag" title="{!! $editTitle !!}" href="{!! $td['href'] !!}"><i class="fa fa-edit"></i></a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @if(isset($field['options']) && array_get($field['options'],'divide') =='after')
                <li style="margin:5px 0;text-align:center;"><i class="fa fa-scissors"></i> - - - - - - - - - - - - - -</li>
                @endif
                @endforeach
            </ol>
        </div>
        @endforeach
    </div>
</div>
<script>
    $(function() {
        var current_id = parseInt('{!! $current_id !!}');

        if(current_id > 0)
        {
            $('li.configx-' + current_id).addClass('configx-active').css({'color':'green','border-color':'green'});
        }

        $('.dd').nestable({
            handleClass: 'dd-drag'
        }).on('change', function() {
            var data = $(this).nestable('serialize');
            $.ajax({
                url: '{{$call_back}}',
                type: "POST",
                data: {
                    data: data,
                    _token: LA.token,
                    _method: 'PUT'
                },
                success: function(data) {
                    toastr.success(data.message);
                }
            });
        });
        $('.input-group .input-group-btn').siblings().dblclick(function() {
            return false; //block numbox click
        });
    });

    function delConfig(id) {
        swal({
            title: "{{$deleteConfirm}}",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "{{$confirm}}",
            showLoaderOnConfirm: true,
            cancelButtonText: "{{$cancel}}",
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                        method: 'post',
                        url: '{{$del_url}}/' + id,
                        data: {
                            _method: 'delete',
                            _token: LA.token,
                        },
                        success: function(data) {
                            $.pjax.reload('#pjax-container');

                            resolve(data);
                        }
                    });
                });
            }
        }).then(function(result) {
            var data = result.value;
            if (typeof data === 'object') {
                if (data.status) {
                    swal(data.message, '', 'success');
                } else {
                    swal(data.message, '', 'error');
                }
            }
        });
    }
</script>

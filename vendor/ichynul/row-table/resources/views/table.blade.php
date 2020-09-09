<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'table-has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">
        {!! $table !!}
        
        @include('row-table::error')

        @include('admin::form.help-block')

    </div>
</div>
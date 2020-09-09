<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">
    <label for="{{$id}}"
           class="{{config('admin.extensions.editormd.wideMode')? 'col-sm-12'.' editormd-wide-mode-label' : $viewClass['label'].' control-label' }}">{{$label}}</label>
    <div class="{{config('admin.extensions.editormd.wideMode') ? 'col-sm-12' : $viewClass['field'] }}">
        @include('admin::form.error')
        @if(config('admin.extensions.editormd.dynamicMode'))
            <div id="editormd-create-btn-{{$id}}" class="editormd-create-btn">
                点击展开 {{$name}} 编辑器
            </div>
        @endif
        <div id="{{$name}}">
            <textarea {!! $attributes !!} style="display:none;">{{ old($column, $value) }}</textarea>
        </div>
        @include('admin::form.help-block')
    </div>
</div>

<style>

    .editormd-create-btn {
        padding: 10px;
        border: 1px solid #eee;
        border-radius: 4px;
        color: #666;
        cursor: pointer;
        text-align: center;
        width: 240px;
        margin: 0 auto;
        box-shadow: 0 0 6px rgba(177, 177, 177, .5) inset;
    }

    .editormd-fullscreen {
        z-index: 9999 !important;
    }

    .editormd-wide-mode-label {
        text-align: center;
        margin-bottom: 10px;
    }

</style>
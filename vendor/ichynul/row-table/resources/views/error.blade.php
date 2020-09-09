@if(is_array($errorKey))
    @foreach($errorKey as $key => $col)
        @if($errors->has($col.$key))
            @foreach($errors->get($col.$key) as $message)
                <label class="control-label table-error" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
            @endforeach
        @endif
    @endforeach
@else
    @if($errors->has($errorKey))
        @foreach($errors->get($errorKey) as $message)
            <label class="control-label table-error" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
        @endforeach
    @endif
@endif
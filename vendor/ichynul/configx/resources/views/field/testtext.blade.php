<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-hand-o-right fa-fw"></i></span>

            <input {!! $attributes !!} />

            <span class="input-group-addon clearfix"><i class="fa fa-hand-o-left fa-fw"></i></span>

        </div>

        @include('admin::form.help-block')
        <br />
        <pre>
This is a demo.
//Create App/Admin/Extensions/MyText.php
--------------------
&lt;?php

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field\Text;

class MyText extends Text
{
    protected $icon = 'fa-github-alt';

    protected $view = 'myview::mytext';

    public function prepare($value)
    {
        // do something
        return $value;
    }

    public function render()
    {
        // do something

        return parent::render();
    }

    public function fill($data)
    {
        // do something
    }
}
--------------------
//Extend element in Admin/bootstrap.php :
Encore\Admin\Form::extend('mytext', App/Admin/Extensions/MyText::class);
--------------------
//Useage
__element__ : mytext
</pre>
        <a target="_blank" href="https://github.com/ichynul/configx">
            <img style="max-width:200px;" src="https://raw.githubusercontent.com/ichynul/configx/master/resources/assets/images/timg.jpg" />
            <span><i class="fa fa-github-alt"></i>&nbsp;Github Configx</span>
        </a>
    </div>
</div>

<?php

namespace Ichynul\RowTable;

use Encore\Admin\Extension;

class TableExtension extends Extension
{
    public $name = 'row-table';

    public $views = __DIR__ . '/../resources/views';
    
    public $assets = __DIR__ . '/../resources/assets';
}
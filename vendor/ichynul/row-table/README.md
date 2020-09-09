# laravel-admin row-table

## Installation

Run :

```
$ composer require ichynul/row-table
```

Then run:

```
$ php artisan vendor:publish --tag=row-table

```

## Update it

After `composer update` , if version of this extension changed :

Run

```
php artisan vendor:publish --tag=row-table --force
```

This will override css and js fiels to `/public/vendor/laravel-admin-ext/row-table/`

Or you can and a script in `composer.json` :

```json
"scripts": {
    "post-update-cmd": "php artisan vendor:publish --tag=row-table --force",
}
```

## Usage

```php
protected function form()
{
        $form = new Form(new Task);

        $headers = ['备注', '服务费用', '服务评分'];
        $tableRow = new TableRow();

        $tableRow->text('status', '任务状态')->options(Task::$statusMap)->attribute(['readonly' => 'readonly']);
        $tableRow->text('fee', '服务费用')->rules('required');
        $tableRow->number('rating', '服务评分', 2)->max(5)->min(1);//这个表少了一列，这里设置colspan=2 ,其他可以不写默认1
        /*************************************/
        $headers2 = ['地址', '评价', '图片'];
        $tableRow2 = new TableRow();
        $tableRow2->text('address', '地址')->rules('required');
        $tableRow2->text('comment', '评价');
        $tableRow2->text('username', '姓名');
        $tableRow2->text('viwe', '查看');

        $form->rowtable('任务信息1')
            ->setHeaders($headers)//使用table时设置，div设置无效
            //->setRows($tableRow)//设置 一个row
            ->setRows([$tableRow, $tableRow2])
            ->useDiv(true); //使用div显示，默认 table
            //->headersTh(true);//使用table时 头部使用<th></th>，默认使用<td></td>样式有些差别
            //->getTableWidget()//extends Encore\Admin\Widgets\Table
            //->offsetSet("style", "width:1000px;");

        // 另外一种代码风格 Another code style
         $form->rowtable('任务信息2', function ($table) {
            $table->row(function ($row) {
                $row->text('text1', 'label1')->rules('required');
                $row->text('text2', 'label2');
                $row->text('text3', 'label3');
            });
            $table->row(function ($row) {
                $row->text('text4', 'label4');
                $row->text('text5', 'label5');
                $row->text('text6', 'label6');
            });
            $table->row(function ($row) {
                $row->text('text7', 'label7');
                $row->text('text8', 'label8');
                $row->text('text9', 'label9');
            });
            //$table->useDiv(false);
            //$table->setHeaders(['h1','h2']);
            //$table->useDiv(false);
            //$table->headersTh(true);//使用table时 头部使用<th></th>，默认使用<td></td>样式有些差别
            //$table->getTableWidget()//extends Encore\Admin\Widgets\Table
            //->offsetSet("style", "width:1000px;");
        });

        $form->textarea('remark', '备注')->rules('required');
        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));

        /**
         * $tableRow-element($column, $label, $width); //div 时 class="col-sm-$width"
         *
         * $tableRow-element($column, $colspan); // table 时 colspan="$width"
         *
         * $element: 理论上可以是任何 form 元素 (不考虑布局效果)
         *
         * $width :
         *         table模式 时 为 colspan="width" , 多行且每行元素数量不同时很有用
         *
         *         div模式   时 为 class="col-sm-width" . 排列不下时自动换行
         *
         *         div模式 若一个tableRow中所有元素都未设置 $width ,将会自适应 (columns >=4 每行4个并自动换行，小于4则全部在一行)
         */

        return $form;
}
```

License

---

Licensed under [The MIT License (MIT)](LICENSE).

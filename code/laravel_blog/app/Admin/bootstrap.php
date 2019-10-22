<?php

use Encore\Admin\Form;
use Encore\Admin\Admin;
/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
Encore\Admin\Form::forget(['map', 'editor']);
Form::init(function (Form $form) {

    $form->disableEditingCheck();

    $form->disableCreatingCheck();

    $form->disableViewCheck();

    $form->tools(function (Form\Tools $tools) {
        $tools->disableDelete();
        $tools->disableView();
    });
});

use Encore\Admin\Grid;

Grid::init(function (Grid $grid) {
    $grid->actions(function (Grid\Displayers\Actions $actions) {
        $actions->disableView();
    });
    $grid->filter(function ($filter){
        // 去掉默认的id过滤器
        $filter->disableIdFilter();
    });
    //禁用导出
    $grid->disableExport();
});

/*
 * 大文件上传引入
 */
Encore\Admin\Form::extend('largefile', \Encore\LargeFileUpload\LargeFileField::class);
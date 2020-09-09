<?php


namespace Encore\LargeFileUpload;
use Encore\Admin\Form\Field;

class LargeFileField extends Field
{
    public $view = 'large-file-field::large_file_upload';
    protected $group = 'file';
    public function group($group)
    {
        $this->group = $group;
        return $this;
    }
    public function render()
    {
        $name = $this->formatName($this->column);
        $this->script = <<<SRC
        $('#{$name}-resource').bootstrapFileInput();
        $('#{$name}-resource').change(function(){
            aetherupload('{$name}', this).setGroup('{$this->group}').setSavedPathField('#{$name}-savedpath').setPreprocessRoute('/aetherupload/preprocess').setUploadingRoute('/aetherupload/uploading').setLaxMode(false).success().upload('{$name}')
        });
       
SRC;
        return parent::render();
    }
}
